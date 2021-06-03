<?php

/* Routes permissions*/
Route::any('permissions/search', 'Acl\PermissionController@search')->name('permissions.search');
Route::resource('permissions', 'Acl\PermissionController');
   