<?php

namespace App\Services;

use App\Models\Tenant;

class TenantService extends BaseModelService
{
    public function model(): string
    {
        return Tenant::class;
    }

    public function getTenants()
    {
        return $this->model()::with('tenantDb')->get();
    }

    public function createTenant(array $validatedData)
    {
        $validatedData['allowed_domains'] = json_decode($validatedData['allowed_domains'], true);
        $tenant = $this->create($validatedData);
        return $tenant;
    }

    public function getTenantByDomain(string $domain)
    {
        $tenant = $this->model()::whereJsonContains('allowed_domains', [$domain => $domain])->firstOrFail();
        return $tenant;
    }

    public function getTenantWithDatabaseByDomain(string $domain)
    {
        $tenant = $this->model()::whereJsonContains('allowed_domains', [$domain => $domain])->with('tenantDb')->firstOrFail();
        return $tenant;
    }
}
