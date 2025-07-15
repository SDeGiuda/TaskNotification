<?php

declare(strict_types=1);

use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employees\App\Controllers\ListEmployeesController;
use Lightit\Backoffice\Employees\App\Controllers\StoreEmployeesController;
use Lightit\Backoffice\Tasks\App\Controllers\FindTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\ListTasksController;
use Lightit\Backoffice\Tasks\App\Controllers\UpsertTaskController;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController;
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;
use Lightit\Backoffice\Users\App\Controllers\UpdateUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')
    ->get('/me', function (#[CurrentUser] $user) {
        return response()->json([
            'data' => $user,
        ]);
    });

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function (): void {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)
            ->withTrashed()
            ->whereNumber('user');
        Route::post('/', StoreUserController::class);
        Route::put('/{user}', UpdateUserController::class)
            ->whereNumber('user');
        Route::delete('/{user}', DeleteUserController::class)
            ->whereNumber('user');
    });
Route::prefix('employees')->name('employees.')->group(function (): void {
    Route::post('/', StoreEmployeesController::class)->name('store');
    Route::get('/', ListEmployeesController::class)->name('index');
});

Route::prefix('tasks')->name('tasks.')->group(function (): void {
    Route::post('/', UpsertTaskController::class)->name('store');
    Route::get('/', ListTasksController::class)->name('index');
    Route::get('/{task}', FindTaskController::class)->name('show');
});
