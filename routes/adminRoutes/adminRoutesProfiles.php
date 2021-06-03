<?php

 /* Routes Profiles*/
 
 Route::get('profiles/', 'Acl\ProfileController@index')->name('profiles.index');
 Route::post('profiles/', 'Acl\ProfileController@store')->name('profiles.store');
 Route::get('profiles/create', 'Acl\ProfileController@create')->name('profiles.create');
 Route::any('profiles/search', 'Acl\ProfileController@search')->name('profiles.search');
 Route::get('profiles/{profile}', 'Acl\ProfileController@show')->name('profiles.show');
 Route::put('profiles/{profile}', 'Acl\ProfileController@update')->name('profiles.update');
 Route::delete('profiles/{profile}', 'Acl\ProfileController@destroy')->name('profiles.destroy');
 Route::get('profiles/{profile}/edit', 'Acl\ProfileController@edit')->name('profiles.edit');
 