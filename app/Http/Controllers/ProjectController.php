<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Academy;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::where('created_by', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('projects.index', compact('projects'));
    }

    public function create() {
        $academies = Academy::all();
        return view('projects.create', compact('academies'));
    }

    public function store(CreateProjectRequest $request) {
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
        ]);
        $project->academies()->attach($request->academies);

        return redirect()->route('projects');
    }

    public function edit($id) {
        $project = Project::find($id);
        $academies = Academy::all();
        return view('projects.edit', compact('project', 'academies'));
    }

    public function update(CreateProjectRequest $request, $id) {
        $project = Project::find($id);
        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $project->academies()->sync($request->academies);

        return redirect()->route('projects');
    }

    public function destroy($id) {
        $project = Project::find($id);

        $project->academies()->detach();

        $project->delete();

        return redirect()->route('projects');
    }
}
