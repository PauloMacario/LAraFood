<?php

Route::get('admin/plans', 'Admin\PlanController@index')->name('plans.index');
Route::get('admin/plans/create', 'Admin\PlanController@create')->name('plans.create');
Route::post('admin/plans', 'Admin\PlanController@store')->name('plans.store');
Route::get('admin/plans{id}', 'Admin\PlanController@show')->name('plans.show');
Route::get('admin/plans{id}/edit', 'Admin\PlanController@edit')->name('plans.edit');
Route::put('admin/plans{id}', 'Admin\PlanController@update')->name('plans.update');

Route::delete('admin/plans{id}', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::any('admin/plans/search', 'Admin\PlanController@search')->name('plans.search');

Route::get('admin', 'Admin\PlanController@index')->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
