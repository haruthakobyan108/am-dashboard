<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserOrganizationsMapRequest;
use App\Models\FsRoles;
use App\Models\Organizations;
use App\Models\UserFriendship;
use App\Models\UserOrganizationsMap;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserOrganizationsMapCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class UserOrganizationsMapCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(UserOrganizationsMap::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user-organizations-map');
        CRUD::setEntityNameStrings('Add user to organization', 'Add user to organization');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        $this->crud->setValidation(UserOrganizationsMapRequest::class);


        $this->crud->addFilter(
            [ // select2 filter
                'name' => 'id',
                'type' => 'select2',
                'label'=> 'Organizations',
                'entity' => 'organizations',
                'attribute' => 'name',
                'model' => 'App\Models\Organizations'],
            function() {
                return Organizations::select('name','id')->distinct()->get()->pluck('name', 'id')->toArray();
            },
            function($value) {
                $this->crud->addClause('where', 'organization_id', $value);
            }
        );

        $this->crud->addFilter(
                [ // select2 filter
                    'name' => 'user',
                    'type' => 'select2',
                    'label'=> 'User',
                    'entity' => 'userFriendship',
                    'attribute' => 'email',
                    'model' => 'App\Models\Organizations'],
                function() {
                    return UserFriendship::select('email','id')->distinct()->get()->pluck('email', 'id')->toArray();
                },
                function($value) {
                    $this->crud->addClause('where', 'user_id', $value);
                }
        );
        $this->crud->addFilter(
                [ // select2 filter
                    'name' => 'role',
                    'type' => 'select2',
                    'label'=> 'Role',
                    'entity' => 'role',
                    'attribute' => 'name',
                    'model' => 'App\Models\Organizations'],
                function() {
                    return FsRoles::select('name','id')->distinct()->get()->pluck('name', 'id')->toArray();
                },
                function($value) {
                    $this->crud->addClause('where', 'role_id', $value);
                }
        );



        $this->crud->addColumn([
            'label' => 'Name',
            'name' => 'organizations', // the relationship name in your Model
            'entity' => 'organizations', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);

        $this->crud->addColumn([
            'label' => 'Email',
            'name' => 'userFriendship', // the relationship name in your Model
            'entity' => 'userFriendship', // the relationship name in your Model
            'attribute' => 'email', // attribute on Article that is shown to admin
        ]);
        $this->crud->addColumn([
            'label' => 'Role',
            'name' => 'role.name', // the relationship name in your Model
            'entity' => 'role.name', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);

        $this->crud->addColumn([
            'label' => 'Active',
            'name' => 'active'
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation(): void
    {
        $this->crud->setValidation(UserOrganizationsMapRequest::class);

        $this->crud->addField([
            'label' => 'Organization',
            'type' => 'select2',
            'placeholder' => "Select Organization",
            'name' => 'organization_id',
            'attribute' => 'name',
            'model' => Organizations::class
        ]);

        $this->crud->addField([
            'label' => 'User',
            'type' => 'select2',
            'placeholder' => "Select User",
            'name' => 'user_id',
            'attribute' => 'email',
            'model' => UserFriendship::class
        ]);

        $this->crud->addField([
            'label' => 'Role',
            'type' => 'select2',
            'placeholder' => "Select Role",
            'name' => 'role',
            'attribute' => 'name',
            'entity' =>'role',
            'model' => FsRoles::class
        ]);

        $this->crud->addField([
            'label' => 'Active',
            'type'    => 'select_from_array',
            'placeholder' => "Active",
            'name' => 'active',
            'attribute' => 'active',
            'options' => ['1' => 'Active', '0' => 'Inactive']
        ]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
