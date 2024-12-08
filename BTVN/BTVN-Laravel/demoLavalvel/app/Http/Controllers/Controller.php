<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
}
use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;
Route::get('/example', [ExampleController::class, 'show']);
