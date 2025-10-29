<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

//Login
Route::get('/register', [AuthController::class, 'signUpPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'signInPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    //Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    //Rotas do Espaço(Place)
    Route::get('/places', [PlaceController::class, 'index']);
    Route::get('/places/new', [PlaceController::class, 'create']);
    Route::post('/places/new', [PlaceController::class, 'store']);
    Route::delete('/places/{id}', [PlaceController::class, 'destroy']);
    Route::get('/places/{id}/edit', [PlaceController::class, 'edit']);
    Route::put('/places/{id}/edit', [PlaceController::class, 'update']);

    //Rotas do Agendamento(Scheduling)
    Route::get('/scheduling', [SchedulingController::class, 'index']);
    Route::get('/scheduling/new', [SchedulingController::class, 'create']);
    Route::post('/scheduling/new', [SchedulingController::class, 'store']);
    Route::delete('/scheduling/{id}', [SchedulingController::class, 'destroy']);
    Route::get('/scheduling/{id}/edit', [SchedulingController::class, 'edit']);
    Route::put('/scheduling/{id}/edit', [SchedulingController::class, 'update']);
});

