<?php

namespace App\Http\Controllers\HomepageUser;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class HomepageUserController extends Controller
{
    public function index()
    {
        // Data dummy sementara
        $nowShowing = [
            ['title' => 'Event A', 'description' => 'Deskripsi A'],
            ['title' => 'Event B', 'description' => 'Deskripsi B'],
        ];

        $comingSoon = [
            ['title' => 'Event C', 'description' => 'Deskripsi C'],
            ['title' => 'Event D', 'description' => 'Deskripsi D'],
        ];

        return view('dashboard.dashboard', compact('nowShowing', 'comingSoon'));
    }
}
