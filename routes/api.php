<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\NotController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\NutritionistController;
use App\Http\Controllers\UserDetController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [UserController::class, 'login']);

//Routes for user details

Route::post('/userd', [UserDetController::class, 'create']);
Route::get('/userd', [UserDetController::class, 'read']);
Route::get('/userd/{userd}', [UserDetController::class, 'show']);
Route::put('/userd/{userd}', [UserDetController::class, 'update']);
Route::delete('/userd/{userd}', [UserDetController::class, 'destroy']);

//Routes for food

Route::post('/foods', [FoodController::class, 'create']);
Route::get('/foods', [FoodController::class, 'read']);
Route::get('/foods/{food}', [FoodController::class, 'show']);
Route::put('/foods/{food}', [FoodController::class, 'update']);
Route::delete('/foods/{food}', [FoodController::class, 'destroy']);

//Routes for workout

Route::post('/workouts', [WorkoutController::class, 'create']);
Route::get('/workouts', [WorkoutController::class, 'read']);
Route::get('/workouts/{workouts}', [WorkoutController::class, 'show']);
Route::put('/workouts/{workouts}', [WorkoutController::class, 'update']);
Route::delete('/workouts/{workouts}', [WorkoutController::class, 'destroy']);

//Routes for notifications

Route::post('/notifications', [NotController::class, 'create']);
Route::get('/notifications', [NotController::class, 'read']);
Route::get('/notifications/{notification}', [NotController::class, 'show']);
Route::put('/notifications/{notification}', [NotController::class, 'update']);
Route::delete('/notifications/{notification}', [NotController::class, 'destroy']);

//Routes for learn

Route::post('/learn', [LearnController::class, 'create']);
Route::get('/learn', [LearnController::class, 'read']);
Route::get('/learn/{learn}', [LearnController::class, 'show']);
Route::put('/learn/{learn}', [LearnController::class, 'update']);
Route::delete('/learn/{learn}', [LearnController::class, 'destroy']);

//Routes for training

Route::post('/training', [TrainingController::class, 'create']);
Route::get('/training', [TrainingController::class, 'read']);
Route::get('/training/{training}', [TrainingController::class, 'show']);
Route::put('/training/{training}', [TrainingController::class, 'update']);
Route::delete('/training/{training}', [TrainingController::class, 'destroy']);

//Routes for NutriTrainer

Route::post('/nutritrain', [NutritionistController::class, 'create']);
Route::get('/nutritrain', [NutritionistController::class, 'read']);
Route::get('/nutritrain/{nutritrain}', [NutritionistController::class, 'show']);
Route::put('/nutritrain/{nutritrain}', [NutritionistController::class, 'update']);
Route::delete('/nutritrain/{nutritrain}', [NutritionistController::class, 'destroy']);

//Routes for NutriTrainer

Route::post('/pricechart', [PricechartController::class, 'create']);
Route::get('/pricechart', [PricechartController::class, 'read']);
Route::get('/pricechart/{pricechart}', [PricechartController::class, 'show']);
Route::put('/pricechart/{pricechart}', [PricechartController::class, 'update']);
Route::delete('/pricechart/{pricechart}', [PricechartController::class, 'destroy']);