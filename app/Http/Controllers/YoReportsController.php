<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class YoReportsController extends Controller
{
    public function index()
    {
        // Ambil semua laporan dari database, urut berdasarkan tanggal terbaru
        $reports = Report::orderBy('created_at', 'desc')->get();

        return view('yoreports', compact('reports'));
    }
}
