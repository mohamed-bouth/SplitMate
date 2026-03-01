<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsApartmentOwner
{
    public function handle(Request $request, Closure $next): Response
{
    $apartment = $request->route('apartment'); 

    if ($apartment) {
        $isActiveOwner = $apartment->users()
            ->where('user_id', auth()->id())
            ->wherePivot('role', 'owner')
            ->wherePivot('status', 'active')
            ->exists();

        if ($isActiveOwner) {
            return $next($request);
        }
    }

    abort(403, 'sorry you need to be owner to do this thing');
}
}
