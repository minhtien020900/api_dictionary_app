<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\PersonalVocabularyController;
use App\Http\Controllers\Api\v1\TopicController;
use App\Http\Controllers\Api\v1\WordController;
use Illuminate\Support\Facades\Route;

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


Route::prefix('v1')->group(function () {

    // Route authentication
    Route::prefix('auth')->group(function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    });

    // Get all Word
    Route::get('/get-all-word', [WordController::class, 'getAllWord']);

    // Route can guard with auth:sanctum
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/me', function () {
            return auth()->user();
        });

        //Route for vocabulary
        Route::prefix('vocabulary')->group(function () {

            //Route for vocabulary
            Route::prefix('topic')->group(function () {

                Route::prefix('user')->group(function () {
                    Route::get('/get-topic', [TopicController::class, 'getUserTopic']);
                    Route::post('/add-topic', [TopicController::class, 'addTopic']);
                    Route::put('/edit-topic', [TopicController::class, 'editTopic']);
                    Route::post('/delete-topic', [TopicController::class, 'deleteTopic']);
                });
            });

            Route::prefix('personal-word')->group(function () {
                Route::post('/get', [PersonalVocabularyController::class, 'index']);
                Route::post('/add', [PersonalVocabularyController::class, 'store']);
                Route::put('/edit', [PersonalVocabularyController::class, 'update']);
                Route::post('/delete', [PersonalVocabularyController::class, 'destroy']);


            });
        });

    });


});

