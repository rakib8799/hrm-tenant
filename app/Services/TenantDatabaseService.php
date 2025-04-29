<?php

namespace App\Services;

use App\Models\Tenant;
use App\Models\TenantDatabase;

class TenantDatabaseService extends BaseModelService
{
    private TenantService $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function model(): string
    {
        return TenantDatabase::class;
    }

    public function getTenantDB(Tenant $tenant)
    {
        $db = $this->model()::where('tenant_id', $tenant->id)->first();
        $dbCredentials = [
            'db_name' => $db->db_name,
            'db_username' => $db->db_username,
            'db_password' => $db->db_password,
            'db_host' => $db->db_host,
            'db_port' => $db->db_port,
        ];
        return $dbCredentials;
    }

    public function createTenantDB(array $validatedData, string $domain)
    {
        $tenantByDomain = $this->tenantService->getTenantByDomain($domain);
        $validatedData['tenant_id'] = $tenantByDomain->id;
        $tenant = $this->create($validatedData);
        return $this->getTenantDB(Tenant::find($tenant->tenant_id));
    }
}
