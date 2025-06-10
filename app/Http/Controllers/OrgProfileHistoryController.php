<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class OrgController extends Controller
{
    public function index()
    {
        // Fetch all events ordered by date
        $event = Org::orderBy('date', 'asc')->get();

        // Pass to the view
        return view('profile.orgprofilehistory', compact('events'));
    }
}
