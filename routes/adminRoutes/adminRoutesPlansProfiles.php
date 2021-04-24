<?php

/* Routes Plans Profiles*/
/* Route::get('plans/{id}/profile/{idPprofile}/detach', 'Acl\PlanProfileController@detachPlanProfile')->name('plans.profiles.detach');
Route::post('plans/{id}/profiles', 'Acl\PlanProfileController@attachPlanProfile')->name('plans.profiles.attach');
Route::any('plans/{id}/profiles/create', 'Acl\PlanProfileController@profilesAvailable')->name('plans.profiles.available');
Route::get('plans/{id}/profiles', 'Acl\PlanProfileController@profiles')->name('plans.profiles');
Route::get('profiles/{id}/plans', 'Acl\PlanProfileController@plans')->name('profiles.plans');


 */

Route::get('plans/{id}/profiles/{idPlans}/detach', 'Acl\PlanProfileController@detachProfilePlans')->name('plans.profiles.detach');
Route::post('profiles/{id}/plans', 'Acl\PlanProfileController@attachProfilePlans')->name('plans.profiles.attach');
Route::any('plans/{id}/profiles/create', 'Acl\PlanProfileController@profileAvailable')->name('profiles.plans.available');
Route::get('plans/{id}/profiles', 'Acl\PlanProfileController@profiles')->name('plans.profiles');
Route::get('profiles/{id}/plans', 'Acl\PlanProfileController@plans')->name('profiles.plans');









/* Routes Permissions Profiles*/
/* Route::get('profiles/{id}/permissions', 'Acl\PermissionProfileController@permissions')->name('profiles.permissions');
Route::get('permissions/{id}/profiles', 'Acl\PermissionProfileController@profiles')->name('permissions.profiles');
Route::any('profiles/{id}/permissions/create', 'Acl\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
Route::post('profiles/{id}/permissions', 'Acl\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
Route::get('profiles/{id}/permission/{idPermission}/detach', 'Acl\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
Route::get('permission/{id}/profiles/{idPermission}/detach', 'Acl\PermissionProfileController@detachPermissionProfile')->name('permissions.profiles.detach');



 */

