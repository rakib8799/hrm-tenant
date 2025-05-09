<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            [
                'id' => 1,
                'name' => 'Hrm',
                'domain' => 'hrm.mkrdev.xyz',
                'workspace' => 'hrm',
                'allowed_domains' => ['hrm.mkrdev.xyz' => 'hrm.mkrdev.xyz'],
                'is_active' => true
            ]
        ];

        foreach ($tenants as $tenant) {
            Tenant::updateOrCreate(['id' => $tenant['id']], $tenant);
        }
    }
}
