<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', auth()->user()->id)->with('project', 'project.user', 'project.academies', 'project.applicants')->orderBy('id', 'DESC')->get();
        return view('applications.index', compact('applications'));
    }

    public function apply(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        Application::insert([
            'description' => $request->description,
            'user_id' => auth()->user()->id,
            'project_id' => $request->project_id
        ]);

        return response()->json([
            'status' => 200,
            'success' => true,
        ]);
    }
}
