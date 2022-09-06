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

    public function cancel($id) {
        $application = Application::find($id);

        $application->delete();

        return redirect()->route('applications')->with(['message' => 'Application successfully canceled!']);
    }

    public function accept($id) {
        $application = Application::find($id);

        $application->is_accepted = 1;

        if($application->save()) {
            return response()->json([
                'status' => 200,
                'success' => true,
            ]);
        };
    }
}
