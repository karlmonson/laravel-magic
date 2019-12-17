<?php

Route::get('/login/magic', 'KarlMonson\Magic\Controllers\LoginController@magic')->middleware('web')->name('magic');
