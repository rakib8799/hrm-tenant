<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenantDatabase extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'db_name',
        'db_username',
        'db_password',
        'db_host',
        'db_port',
        'db_type',     // mysql, postgresql, sqlite, sqlserver
        'is_active'
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
