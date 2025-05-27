<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class YoReportsController extends Controller
{
    public function index()
    {
        return view('reports.yoreports');
    }
}
