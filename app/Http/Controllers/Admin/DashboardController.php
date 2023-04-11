<?php

namespace App\Http\Controllers\Admin;


use App\Models\Report;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class DashboardController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;
    public function setup()
    {
        CRUD::setModel(Report::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/dashboard');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/dashboard');
        CRUD::setEntityNameStrings('admin', 'admin');

        $this->data =
            [
                'widgets' =>
                    [
                        'before_content' =>
                            [
                                [
                                    'type' => 'div',
                                    'class' => 'row',
                                    'content' => [
                                        [
                                            'type'        => 'progress_white',
                                            'class'       => 'card mb-2',
                                            'value'       => '11.456',
                                            'description' => 'Registered users.',
                                            'progress'    => 57, // integer
                                            'progressClass' => 'progress-bar bg-primary',
                                            'hint'        => '8544 more until next milestone.',
                                        ],
                                        [
                                            'type'        => 'progress_white',
                                            'class'       => 'card mb-2',
                                            'value'       => '89.9%',
                                            'description' => 'Of quota achieved.',
                                            'progress'    => 89, // integer
                                            'progressClass' => 'progress-bar bg-warning',
                                            'hint'        => 'Sold 671 products this month.',
                                        ],
                                        [
                                            'type'        => 'progress_white',
                                            'class'       => 'card mb-2',
                                            'value'       => '$237',
                                            'description' => 'Average sale price.',
                                            'progress'    => 75, // integer
                                            'progressClass' => 'progress-bar bg-success',
                                            'hint'        => 'Out of 671 sales.',
                                        ],
                                        [
                                            'type'        => 'progress_white',
                                            'class'       => 'card mb-2',
                                            'value'       => '8.7%',
                                            'description' => 'Churn.',
                                            'progress'    => 9, // integer
                                            'progressClass' => 'progress-bar bg-danger',
                                            'hint'        => '1000 users stopped paying so far.',
                                        ],
                                    ]]
                            ]
                    ]
            ];
    }
}
