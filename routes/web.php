<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;


Route::group(['middleware' => [ 'web', 'language' ]], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', function () {
        return view('dashboard')->with('page','dashboard_2');
    })->name('dashboard');

    Route::get('/test', function () {
        $value = 'Does not exist';
        if( Session::has( 'check')){
            $value = 'exists';
        } else {
            Session::put('check', 'Session value set');
        }
        return view('test')->with('check', $value);
    })->name('test');

    require __DIR__.'/auth.php';
});

