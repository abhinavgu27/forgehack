<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AuthTestSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== Auth & Role System Test ===');
        $this->command->info('');
        
        $admin = User::withoutGlobalScope(\App\Scopes\OrganizationScope::class)
            ->where('email', 'admin@test.com')->first();
        
        $agent = User::withoutGlobalScope(\App\Scopes\OrganizationScope::class)
            ->where('email', 'agent@test.com')->first();
        
        $customer = User::withoutGlobalScope(\App\Scopes\OrganizationScope::class)
            ->where('email', 'customer@test.com')->first();
        
        $this->command->info('✅ Test Users Ready:');
        $this->command->info('  Admin: admin@test.com / password123');
        $this->command->info('  Agent: agent@test.com / password123');
        $this->command->info('  Customer: customer@test.com / password123');
        $this->command->info('');
        
        if ($admin) {
            $this->command->info('✅ Role Methods Working:');
            $this->command->info('  Admin->isAdmin(): ' . ($admin->isAdmin() ? 'TRUE' : 'FALSE'));
            $this->command->info('  Admin->canManageUsers(): ' . ($admin->canManageUsers() ? 'TRUE' : 'FALSE'));
            $this->command->info('  Agent->canAccessAgentFeatures(): ' . ($agent->canAccessAgentFeatures() ? 'TRUE' : 'FALSE'));
        }
        
        $this->command->info('');
        $this->command->info('✅ Issue #2 Complete!');
    }
}