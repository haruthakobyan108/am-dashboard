<?php

use App\Http\Controllers\Admin\UserOrganizationsMapCrudController;
use App\Http\Controllers\Admin\OrganizationBuisnessModelCrudController;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
//    Route::crud('dashboard', 'DashboardController');
    Route::crud('user', 'UserCrudController');
    Route::crud('user-friendship', 'UserFriendshipCrudController');
    Route::crud('organisations', 'OrganisationsCrudController');
    Route::crud('user-organizations-map', 'UserOrganizationsMapCrudController');
    Route::crud('fs-roles', 'FsRolesCrudController');
    Route::crud('reports', 'ReportsController');
    Route::crud('events', 'EventControllerCrudController');
    Route::crud('organization-buisness-model', 'OrganizationBuisnessModelCrudController');
}); // this should be the absolute last line of this file
