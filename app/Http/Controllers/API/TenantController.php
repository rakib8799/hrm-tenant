<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TenantCreateRequest;
use App\Services\TenantService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TenantController extends Controller
{
    private TenantService $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index(): JsonResponse
    {
        $tenants = $this->tenantService->getTenants();
        return response()->json($tenants);
    }

    public function store(TenantCreateRequest $tenantCreateRequest): JsonResponse
    {
        $validatedData = $tenantCreateRequest->validated();
        $tenant = $this->tenantService->createTenant($validatedData);
        return response()->json($tenant, 201);
    }

    public function getTenantByDomain(string $domain): JsonResponse
    {
        $tenant = $this->tenantService->getTenantWithDatabaseByDomain($domain);
        if($tenant === null) {
            return response()->json(['message' => 'Tenant not found'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($tenant);
    }
}
