<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrganizationScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        if (!$model->getConnection()->getSchemaBuilder()->hasColumn($model->getTable(), 'organization_id')) {
            return;
        }

        try {
            $organizationId = app('current_organization_id');
        } catch (\Exception $e) {
            return;
        }

        if ($organizationId) {
            $builder->where('organization_id', $organizationId);
        }
    }
}