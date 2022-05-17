<?php

namespace App\Domains\Auth\Http\Middleware;

use App\Domains\Auth\Models\User;
use Closure;

/**
 * Class AdminCheck.
 */
class AdminCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($request->user() && ($user->isType(User::TYPE_ADMIN) || $user->isType(User::TYPE_USER))) {
            return $next($request);
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
    }
}
