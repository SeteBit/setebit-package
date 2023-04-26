<?php

namespace Setebit\Package\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait TenantScope
{
    protected static function booted(): void
    {
        static::creating(function (Model $model) {
            $model->tenant_id = tenant()->id;
        });

        static::addGlobalScope('tenant', function (Builder $builder) {
            $builder->where('tenant_id', tenant()->id);
        });
    }
}
