<?php

use YuZhi\Routing\Route;

Route::get('home_index', '/', '\App\Controllers\Home\DefaultController@indexAction');
