<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\auth\UserAuthController;
use App\Http\Controllers\api\v1\auth\AdminAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//use token authentication
//using laravel passport or sanctum

Route::prefix('v1')->group(function () {

    //user auth
    Route::post('/user/register', [UserAuthController::class, 'register']);
    Route::post('/user/login', [UserAuthController::class, 'login']);

    //admin auth
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
    
    Route::group(['middleware' => ['auth:sanctum']], function () {

        Route::resource('/categories', CategoryController::class);
        
    });

});