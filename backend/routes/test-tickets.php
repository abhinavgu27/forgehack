<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;

// Ticket testing routes
Route::get('/api/test/tickets', function () {
    // Set organization context for testing
    $org = Organization::first();
    if ($org) {
        app()->instance('current_organization_id', $org->id);
    }

    // Test scoped tickets
    $scopedTickets = Ticket::all();
    
    // Test unscoped tickets
    $allTickets = Ticket::withoutGlobalScope(\App\Scopes\OrganizationScope::class)->get();

    return response()->json([
        'organization_context' => $org ? $org->id : 'none',
        'scoped_tickets_count' => $scopedTickets->count(),
        'all_tickets_count' => $allTickets->count(),
        'scoped_tickets' => $scopedTickets,
        'test_result' => $scopedTickets->count() > 0 ? '✅ Tickets scoped by organization' : '⚠️ No tickets in this organization',
    ]);
});

Route::get('/api/test/tickets/create-sample', function () {
    // Set organization context
    $org = Organization::first();
    $user = User::first();
    
    if (!$org || !$user) {
        return response()->json(['error' => 'Organization or user not found'], 404);
    }

    app()->instance('current_organization_id', $org->id);

    // Create sample tickets
    $tickets = [
        [
            'subject' => 'Login Issue',
            'description' => 'User cannot login to the platform',
            'status' => 'open',
            'priority' => 'high',
            'organization_id' => $org->id,
            'user_id' => $user->id,
        ],
        [
            'subject' => 'Feature Request',
            'description' => 'Add dark mode support',
            'status' => 'open',
            'priority' => 'medium',
            'organization_id' => $org->id,
            'user_id' => $user->id,
        ],
        [
            'subject' => 'Server Error',
            'description' => '500 error on dashboard',
            'status' => 'in_progress',
            'priority' => 'urgent',
            'organization_id' => $org->id,
            'user_id' => $user->id,
        ],
    ];

    $createdTickets = [];
    foreach ($tickets as $ticketData) {
        $createdTickets[] = Ticket::create($ticketData);
    }

    return response()->json([
        'message' => 'Sample tickets created',
        'tickets_count' => count($createdTickets),
        'tickets' => $createdTickets,
    ]);
});

Route::get('/api/test/tickets/relationships', function () {
    $ticket = Ticket::first();
    
    if (!$ticket) {
        return response()->json(['error' => 'No tickets found'], 404);
    }

    return response()->json([
        'ticket' => $ticket,
        'organization' => $ticket->organization,
        'user' => $ticket->user,
        'relationships_test' => '✅ Organization and User relationships working',
    ]);
});