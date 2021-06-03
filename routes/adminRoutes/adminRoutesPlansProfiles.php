<?php

Route::get('plans/{id}/profiles/{idPlans}/detach', 'Acl\PlanProfileController@detachProfilePlans')->name('plans.profiles.detach');
Route::post('profiles/{id}/plans', 'Acl\PlanProfileController@attachProfilePlans')->name('plans.profiles.attach');
Route::any('plans/{id}/profiles/create', 'Acl\PlanProfileController@profileAvailable')->name('profiles.plans.available');
Route::get('plans/{id}/profiles', 'Acl\PlanProfileController@profiles')->name('plans.profiles');
Route::get('profiles/{id}/plans', 'Acl\PlanProfileController@plans')->name('profiles.plans');
