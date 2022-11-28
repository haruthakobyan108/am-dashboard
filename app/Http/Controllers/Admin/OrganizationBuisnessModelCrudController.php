<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrganizationBusinessModels;
use App\Models\Organizations;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrganizationBuisnessModelCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrganizationBuisnessModelCrudController extends CrudController
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
    public function setup(): void
    {
        CRUD::setModel(OrganizationBusinessModels::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/organization-buisness-model');
        CRUD::setEntityNameStrings('organization buisness model', 'organization buisness models');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        $this->crud->addClause('whereCurrent', 1);
        $this->crud->removeButtons(['delete','create'],'line');
        $this->crud->removeButtons(['create','delete'],'top');

        $this->crud->addFilter([ // select2 filter
            'name' => 'organization_id',
            'type' => 'select2',
            'label'=> 'Organizations',
            'entity' => 'organization',
            'attribute' => 'name',
            'model' => 'App\Models\Organizations'],
            function() {
                return Organizations::select('name','id')->distinct()->get()->pluck('name', 'id')->toArray();
            },
            function($value) {
                $this->crud->addClause('where', 'organization_id', $value);
            });

        $this->crud->addFilter([ // select2 filter
            'name' => 'id',
            'type' => 'select2',
            'label'=> 'BM',
        ],
            function() {
                return OrganizationBusinessModels::TYPE;
            },
            function($value) {
                $this->crud->addClause('where', 'business_model', $value);
            });

        $this->crud->addColumn([
                'label' => 'ID',
                'name' => 'id',

        ]);
        $this->crud->addColumn([
                'label' => 'Name',
                'name' => 'name',
                'entity' => 'organization',
                'attribute' => 'name',
                'model' => 'App\Models\Organizations',
        ]);


        $this->crud->addColumn([
            'label' => 'Buisness Model',
            'name' => 'business_model',
            'type'  => 'enum',
            'options' => OrganizationBusinessModels::TYPE
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
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(): void
    {
        $this->crud->addField([
            'label' => 'Organization',
            'type' => 'relationship',
            'ajax' => true,
            'name' => 'organization.name',
            'attribute' => 'organization.name',
            'class' => 'form-group col-md-2',
            'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'subfields' => [
                    [
                        'name' => 'name',
                        'type' => 'text',
                    ]
            ]
        ]);

        $this->crud->addField([
           'label' => 'Buisness Model',
           'type' => 'select_from_array',
           'name' => 'business_model',
           'options' => OrganizationBusinessModels::TYPE
        ]);
    }

}
