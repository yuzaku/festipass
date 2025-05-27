<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function create()
    {
        return view('reports.reproblem');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'problem_type' => 'required|string|max:255',
            'details' => 'required|string',
            'attachment' => 'nullable|file|max:2048'
        ]);

        $path = $request->file('attachment') ? $request->file('attachment')->store('attachments') : null;

        Report::create([
            'name' => $validated['name'],
            'problem_type' => $validated['problem_type'],
            'details' => $validated['details'],
            'attachment' => $path
        ]);

        return redirect()->route('report.create')->with('success', 'Report submitted!');
    }
}
