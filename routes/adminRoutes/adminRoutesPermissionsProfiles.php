<?php

/* Routes Permissions Profiles*/
Route::get('profiles/{id}/permissions', 'Acl\PermissionProfileController@permissions')->name('profiles.permissions');
Route::get('permissions/{id}/profiles', 'Acl\PermissionProfileController@profiles')->name('permissions.profiles');
Route::any('profiles/{id}/permissions/create', 'Acl\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
Route::post('profiles/{id}/permissions', 'Acl\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
Route::get('profiles/{id}/permission/{idPermission}/detach', 'Acl\PermissionProfileController@detachPermissionProfile')->name('profiles.permissions.detach');
Route::get('permission/{id}/profiles/{idPermission}/detach', 'Acl\PermissionProfileController@detachPermissionProfile')->name('permissions.profiles.detach');