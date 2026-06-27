<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Show the authenticated user's organization.
     * Tenant scope will automatically scope this by organization_id.
     */
    public function show(Request $request): JsonResponse
    {
        $organization = Organization::where('id', $request->user()->organization_id)
            ->firstOrFail();

        return response()->json([
            'organization' => $organization,
        ]);
    }

    /**
     * Update the authenticated user's organization.
     */
    public function update(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'domain' => ['sometimes', 'nullable', 'string', 'max:255'],
            'settings' => ['sometimes', 'array'],
            'is_active' => ['sometimes', 'boolean'],
        ]);

        $organization = Organization::where('id', $request->user()->organization_id)
            ->firstOrFail();

        $organization->update($validated);

        return response()->json([
            'organization' => $organization,
        ]);
    }
}
