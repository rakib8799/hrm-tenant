<?php

use App\Http\Controllers\API\HealthCheckController;
use App\Http\Controllers\API\TenantController;
use App\Http\Controllers\API\TenantDatabaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('tenants')->group(function () {
        Route::get('/', [TenantController::class, 'index']);
        Route::post('/', [TenantController::class, 'store']);
        Route::get('/{domain}', [TenantController::class, 'getTenantByDomain']);
    });
    Route::prefix('tenant-databases')->group(function () {
        Route::get('/{domain}', [TenantDatabaseController::class, 'index']);
        Route::post('/{domain}', [TenantDatabaseController::class, 'store']);
    });

    Route::get('/health-check', [HealthCheckController::class, 'index']);
    Route::get('/health-check-test', [HealthCheckController::class, 'index']);
});
