<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantDatabaseCreateRequest;
use App\Models\Tenant;
use App\Services\TenantDatabaseService;
use Illuminate\Http\JsonResponse;

class TenantDatabaseController extends Controller
{
    private TenantDatabaseService $tenantDatabaseService;

    public function __construct(TenantDatabaseService $tenantDatabaseService)
    {
        $this->tenantDatabaseService = $tenantDatabaseService;
    }

    public function index(Tenant $tenant): JsonResponse
    {
        $tenantDB = $this->tenantDatabaseService->getTenantDB($tenant);
        return response()->json($tenantDB);
    }

    public function store(TenantDatabaseCreateRequest $tenantDatabaseCreateRequest, string $domain): JsonResponse
    {
        $tenantDB = $this->tenantDatabaseService->createTenantDB($tenantDatabaseCreateRequest->validated(), $domain);
        return response()->json($tenantDB, 201);
    }
}
