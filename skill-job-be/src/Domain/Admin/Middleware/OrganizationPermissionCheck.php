<?php

namespace Domain\Admin\Middleware;

use Auth;
use Cache;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrganizationPermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return JsonResponse|RedirectResponse|Response
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        $permissions = Cache::get('admin-' . Auth::id() . '-organization-' . $request['organization_id'] . '-permissions',
            function () use ($request) {
                return Auth::user()->adminOrganizationRoles()->where('organization_id', request('organization_id'))
                    ->with('role', 'role.permissions')->get()->pluck('role.permissions')->collapse()->toArray();
            }
        );

        if (collect($permissions)->where('code', $permission)->count())
        {
            return $next($request);
        }

        return \response()->json(['message' => "you don't have permission to ".$permission, 'error' => 'permission'],403);
    }
}
