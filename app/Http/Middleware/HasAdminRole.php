<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Utilities\Result;
use Closure;
use Illuminate\Http\Request;

class HasAdminRole
{
    /** @var Result */
    protected Result $result;

    public function __construct(Result $result)
    {
        $this->result = $result;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        $hasAdminRole = $user->roles()->where('role_id', User::USER_ROLE_ADMIN)->exists();

        if ($hasAdminRole) {
            return $next($request);
        }

        return $this->result->success(null, "Unauthorized Action", false, 401);
    }
}
