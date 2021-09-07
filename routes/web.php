<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaController;


Route::redirect('/', '/spa');

Route::get('/spa{any}', [SpaController::class, 'index'])->where('any', '.*');
