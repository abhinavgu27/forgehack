<?php

namespace App\Providers;

use App\Models\TenantScope;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Global tenant scope — add this to any model that needs organization isolation
        // \Illuminate\Database\Eloquent\Model::addGlobalScope(new TenantScope);
    }
}
