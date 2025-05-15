<?php

namespace Database\Seeders;

use App\Models\TenantDatabase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenants = [
            [
                'id' => 1,
                'tenant_id' => 1,
                'db_name' => 'admin_hrm',
                'db_username' => 'admin_hrm_user',
                'db_password' => 'Admin123@',
                'db_host' => env('DB_HOST', '127.0.0.1'),
                'db_port' => '3306',
                'db_type' => 'mysql',
                'is_active' => true
            ]
        ];

        foreach ($tenants as $tenant) {
            TenantDatabase::updateOrCreate(['id' => $tenant['id']], $tenant);
        }
    }
}
