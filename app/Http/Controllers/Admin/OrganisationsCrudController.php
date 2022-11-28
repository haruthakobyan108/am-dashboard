<?php

namespace App\Http\Controllers\Admin;


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
 * Class OrganisationsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrganisationsCrudController extends CrudController
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
        CRUD::setModel(Organizations::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/organisations');
        CRUD::setEntityNameStrings('organisations', 'organisations');

    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation(): void
    {
        $this->crud->removeButton('create','top');
        $this->crud->removeButton('delete');

        $this->crud->addFilter([ // select2 filter
            'name' => 'id',
            'type' => 'select2',
            'label'=> 'Organizations',
        ],
            function() {
                return Organizations::select('name','id')->distinct()->get()->pluck('name', 'id')->toArray();
            },
            function($value) {
                $this->crud->addClause('where', 'id', $value);
            });

        $this->crud->setColumns([
            'client_id',
            'name',
            'active',
            'partner_id',
            'approve_status',
            'email',
            'is_api_partner',
            'payment_status',
            'bme_status'
        ]);


        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return false
     */
    protected function setupCreateOperation(): bool
    {
        return false;
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
            'label' => 'ClientId',
            'type' => 'text',
                'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'client_id', // the relationship name in your Model
            'attribute' => 'client_id', // attribute on Article that is shown to admin
        ]);
        $this->crud->addField([
            'label' => 'ClientId',
            'type' => 'text',
            'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'name', // the relationship name in your Model
            'attribute' => 'name', // attribute on Article that is shown to admin
        ]);

        $this->crud->addField([
            'label' => 'active',
            'type' => 'text',
                'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'active', // the relationship name in your Model
            'attribute' => 'active', // attribute on Article that is shown to admin
        ]);

        $this->crud->addField([
            'label' => 'created_at',
            'type' => 'text',
                'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'created_at', // the relationship name in your Model
            'attribute' => 'created_at', // attribute on Article that is shown to admin
        ]);
        $this->crud->addField([
            'label' => 'Partner ID',
            'type' => 'text',
                'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'partner_id', // the relationship name in your Model
            'attribute' => 'partner_id', // attribute on Article that is shown to admin
        ]);
        $this->crud->addField([
            'label' => 'Payment Type',
            'type' => 'text',
                'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'payment_type', // the relationship name in your Model
            'attribute' => 'payment_type', // attribute on Article that is shown to admin
        ]);
        $this->crud->addField([
            'label' => 'Balance',
            'type' => 'text',
                'attributes' => [
                'placeholder' => 'Some text when empty',
                'class' => 'form-control some-class',
                'readonly'  => 'readonly',
                'disabled'  => 'disabled',
            ],
            'name' => 'balance', // the relationship name in your Model
            'attribute' => 'balance', // attribute on Article that is shown to admin
        ]);
        $this->crud->addField([
            'label' => 'Approve Status',
            'type'    => 'select_from_array',
            'placeholder' => "Approve Status",
            'name' => 'approve_status',
            'attribute' => 'approve_status',
            'options' => ['1' => 'Active', '0' => 'Inactive','2' => 'pending']
        ]);
        $this->crud->addField([
            'label' => 'Is Enabled',
            'type'    => 'select_from_array',
            'placeholder' => "Is Enabled",
            'name' => 'is_enabled',
            'attribute' => 'is_enabled',
            'options' => ['1' => 'Active', '0' => 'Inactive']
        ]);
        $this->crud->addField([
            'label' => 'Is Test',
            'type'    => 'select_from_array',
            'placeholder' => "Is Enabled",
            'name' => 'is_test',
            'attribute' => 'is_test',
            'options' => ['1' => 'Yes', '0' => 'No']
        ]);

        $this->crud->addField([
            'label' => 'BME Status',
            'type'    => 'select_from_array',
            'placeholder' => "BME Status",
            'name' => 'bme_status',
            'attribute' => 'bme_status',
            'options' => ['1' => 'Yes', '0' => 'No']
        ]);
    }
}
