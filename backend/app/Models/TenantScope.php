<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * Automatically scopes all queries by organization_id.
     * If no organization is set in the context, it will scope to 0 to prevent data leakage.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $organizationId = app()->bound('organization_id') ? app('organization_id') : null;

        if ($organizationId !== null) {
            $builder->where($model->getTable() . '.organization_id', $organizationId);
        } else {
            // Safety fallback to prevent cross-tenant data leakage in unauthenticated contexts
            // Alternatively: $builder->whereNull($model->getTable() . '.organization_id');
            $builder->where($model->getTable() . '.organization_id', 0);
        }
    }
}
