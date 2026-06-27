<?php

namespace App\Models\Traits;

use App\Scopes\OrganizationScope;

trait HasOrganizationScope
{
    protected static function bootHasOrganizationScope(): void
    {
        static::addGlobalScope(new OrganizationScope());
    }

    public function organization()
    {
        return $this->belongsTo(\App\Models\Organization::class);
    }

    public function scopeForOrganization($query, $organizationId)
    {
        return $query->where('organization_id', $organizationId);
    }

    public function scopeWithoutOrganizationScope($query)
    {
        return $query->withoutGlobalScope(OrganizationScope::class);
    }

    public function scopeGlobalScope($query)
    {
        return $query->withoutGlobalScope(OrganizationScope::class);
    }
}