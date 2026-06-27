<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Create organization
        $org = Organization::create([
            'name' => 'Test Organization',
            'slug' => 'test-org',
            'domain' => 'test.example.com',
            'settings' => ['timezone' => 'Asia/Kolkata', 'locale' => 'en'],
            'is_active' => true,
        ]);

        // Create users with roles
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'organization_id' => $org->id,
        ]);

        User::create([
            'name' => 'Agent User',
            'email' => 'agent@test.com',
            'password' => Hash::make('password123'),
            'role' => 'agent',
            'organization_id' => $org->id,
        ]);

        User::create([
            'name' => 'Customer User',
            'email' => 'customer@test.com',
            'password' => Hash::make('password123'),
            'role' => 'customer',
            'organization_id' => $org->id,
        ]);

        $this->command->info('✅ Role system seeded.');
        $this->command->info('   Organization: ' . $org->name);
    }
}