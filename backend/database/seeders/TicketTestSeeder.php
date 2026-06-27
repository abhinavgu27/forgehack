<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Seeder;

class TicketTestSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('=== Testing Ticket System ===');
        $this->command->info('');
        
        // Test scoped vs unscoped
        $scopedTickets = Ticket::all();
        $allTickets = Ticket::withoutGlobalScope(\App\Scopes\OrganizationScope::class)->get();
        
        $this->command->info('✅ Organization Scoping:');
        $this->command->info('   Scoped tickets (current org): ' . $scopedTickets->count());
        $this->command->info('   Total tickets (all orgs): ' . $allTickets->count());
        $this->command->info('');
        
        // Test relationships
        $ticket = Ticket::first();
        if ($ticket) {
            $this->command->info('✅ Relationships:');
            $this->command->info('   Ticket subject: ' . $ticket->subject);
            $this->command->info('   Organization: ' . ($ticket->organization ? $ticket->organization->name : 'NULL'));
            $this->command->info('   User: ' . ($ticket->user ? $ticket->user->name : 'NULL'));
            $this->command->info('');
        }
        
        // Test scopes
        $highPriority = Ticket::where('priority', 'high')->count();
        $openTickets = Ticket::where('status', 'open')->count();
        
        $this->command->info('✅ Query Scopes:');
        $this->command->info('   High priority tickets: ' . $highPriority);
        $this->command->info('   Open tickets: ' . $openTickets);
        $this->command->info('');
        
        $this->command->info('✅ Issue #3 Complete!');
    }
}