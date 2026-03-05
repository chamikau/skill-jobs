<?php

namespace Domain\Admin\Middleware;

use App\Models\Organization;
use Auth;
use Cache;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrganizationAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse|RedirectResponse|Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request['organization_id']) {
            return response()->json([
                'message' => 'Organization ID is required.'
            ], 403);
        }

        $request->merge([
            'organization' => Cache::get('admin-' . Auth::id() . '-organization-' . $request['organization_id'],
                function () use ($request) {
                    return Organization::adminOrganizations(Auth::id())->findOrFail($request['organization_id']);
                })
        ]);

        return $next($request);
    }
}
