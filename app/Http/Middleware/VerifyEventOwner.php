<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;

class VerifyEventOwner
{
    public function handle($request, Closure $next)
    {
        $eventId = $request->route('id');
        $event = Event::findOrFail($eventId);

        if ($event->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}