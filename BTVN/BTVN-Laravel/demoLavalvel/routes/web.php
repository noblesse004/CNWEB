<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExampleController;

Route::get('/example', [ExampleController::class, 'show']);
