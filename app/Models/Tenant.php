<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'domain',
        'workspace',
        'allowed_domains',
        'is_active'
    ];

    protected $casts = [
        'allowed_domains' => 'array'
    ];

    public function tenantDb(): HasOne
    {
        return $this->hasOne(TenantDatabase::class);
    }
}
