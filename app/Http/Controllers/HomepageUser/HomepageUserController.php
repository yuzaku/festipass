<?php

namespace App\Http\Controllers\HomepageUser;

use Illuminate\Http\Request;
use App\Models\Events;

class HomepageUserController extends \App\Http\Controllers\Controller
{
    public function index(Request $request)
    {
        $query = Events::query();

        // Search filter
        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('location', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $now = now();

        $nowShowing = (clone $query)->whereDate('event_date', '<=', $now)
                                    ->orderBy('event_date', 'desc')
                                    ->take(5)
                                    ->get();

        $comingSoon = (clone $query)->whereDate('event_date', '>', $now)
                                    ->orderBy('event_date', 'asc')
                                    ->take(5)
                                    ->get();

        return view('dashboard.dashboard', compact('nowShowing', 'comingSoon'));
    }
}
