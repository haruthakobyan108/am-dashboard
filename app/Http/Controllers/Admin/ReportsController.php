<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

/**
 * Class ReportsController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ReportsController extends Controller
{
    public function index()
    {
        return view('admin.reports', [
            'title' => 'Reports',
            'breadcrumbs' => [
                trans('backpack::crud.admin') => backpack_url('dashboard'),
                'Reports' => false,
            ],
            'page' => 'resources/views/reports.blade.php',
            'controller' => 'app/Http/Controllers/Admin/ReportsController.php',
        ]);
    }
}
