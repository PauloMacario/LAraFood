<?php

Route::prefix('admin')
    ->namespace('Admin')
    ->group(function() {

      
    /* Routes Home*/
    Route::get('/', 'PlanController@index')->name('admin.index');
     
    include_once 'adminRoutes/adminRoutesDetailsPlans.php';
    include_once 'adminRoutes/adminRoutesPermissions.php';
    include_once 'adminRoutes/adminRoutesPermissionsProfiles.php';
    include_once 'adminRoutes/adminRoutesPlans.php';
    include_once 'adminRoutes/adminRoutesProfiles.php';
    include_once 'adminRoutes/adminRoutesPlansProfiles.php';

});


Route::get('/', function () {
    return view('welcome');
});



































































// #############################################################################################################



    /* Routes Plans*/
   /*  Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::get('plans/{url}/edit', 'PlanController@edit')->name('plans.edit');
    Route::put('plans/{url}', 'PlanController@update')->name('plans.update');    
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');    
 */
     /* Routes Details Plans*/
   /* Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');
    Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
    Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
 */
    /* Routes Profiles*/
   /*  Route::any('profiles/search', 'Acl\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'Acl\ProfileController'); */

    /* Routes permissions*/
    /* Route::any('permissions/search', 'Acl\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'Acl\PermissionController');
    */

    /* Routes Permissions Profiles*//* 
    Route::get('profiles/{id}/permissions', 'Acl\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('permissions/{id}/profiles', 'Acl\PermissionProfileController@profiles')->name('permissions.profiles');
    Route::any('profiles/{id}/permissions/create', 'Acl\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::post('profiles/{id}/permissions', 'Acl\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permission/{idPermission}/detach', 'Acl\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
    Route::get('permission/{id}/profiles/{idPermission}/detach', 'Acl\PermissionProfileController@detachPermissionProfile')->name('permissions.profiles.detach'); */