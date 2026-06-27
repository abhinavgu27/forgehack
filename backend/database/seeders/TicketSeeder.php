<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        // Get organization and user
        $org = Organization::first();
        $user = User::first();

        if (!$org || !$user) {
            $this->command->error('Organization or User not found. Run RoleSeeder first.');
            return;
        }

        // Set organization context
        app()->instance('current_organization_id', $org->id);

        // Create sample tickets
        $tickets = [
            [
                'subject' => 'Login Issue',
                'description' => 'User cannot login to the platform after password reset',
                'status' => 'open',
                'priority' => 'high',
                'organization_id' => $org->id,
                'user_id' => $user->id,
            ],
            [
                'subject' => 'Feature Request: Dark Mode',
                'description' => 'Please add dark mode support to the dashboard',
                'status' => 'open',
                'priority' => 'medium',
                'organization_id' => $org->id,
                'user_id' => $user->id,
            ],
            [
                'subject' => 'Server Error 500',
                'description' => 'Getting 500 error when loading reports page',
                'status' => 'in_progress',
                'priority' => 'urgent',
                'organization_id' => $org->id,
                'user_id' => $user->id,
            ],
            [
                'subject' => 'Mobile Responsiveness',
                'description' => 'Tables don\'t display correctly on mobile devices',
                'status' => 'open',
                'priority' => 'medium',
                'organization_id' => $org->id,
                'user_id' => $user->id,
            ],
        ];

        foreach ($tickets as $ticketData) {
            Ticket::create($ticketData);
        }

        $this->command->info('✅ Ticket system seeded successfully.');
        $this->command->info('   Created ' . count($tickets) . ' sample tickets');
        $this->command->info('   All tickets belong to organization: ' . $org->name);
    }
}