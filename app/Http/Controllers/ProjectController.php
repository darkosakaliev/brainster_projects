<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\OwnershipRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Academy;
use App\Models\Application;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->where('created_by', auth()->user()->id)->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $academies = Academy::all();
        return view('projects.create', compact('academies'));
    }

    public function store(CreateProjectRequest $request)
    {
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->user()->id,
        ]);
        $project->academies()->attach($request->academies);

        return redirect()->route('projects');
    }

    public function edit($id)
    {
        $project = Project::find($id);
        if ($project->created_by == auth()->user()->id) {
            $academies = Academy::all();
            return view('projects.edit', compact('project', 'academies'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function update(CreateProjectRequest $request, $id)
    {
        $project = Project::find($id);
        if ($project->created_by == auth()->user()->id) {
            $project->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            $project->academies()->sync($request->academies);

            return redirect()->route('projects');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        if ($project->created_by == auth()->user()->id) {
            $project->academies()->detach();

            Application::where('project_id', $id)->each(function ($product, $key) {
                $product->delete();
            });

            $project->delete();

            return redirect()->route('projects');
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function applicants($id)
    {
        $project = Project::find($id);
        if ($project->created_by == auth()->user()->id) {
            $applications = Application::where('project_id', $id)->get();

            return view('projects.applicants', compact('applications', 'project'));
        } else {
            abort(403, 'Unauthorized');
        }
    }

    public function assemble($id) {
        $project = Project::find($id);

        $project->is_assembled = 1;

        $project->save();

        Application::where('project_id', $id)->where('is_accepted', null)->each(function ($product, $key) {
            $product->is_accepted = 0;
            $product->save();
        });

        return redirect()->route('projects')->with(['message' => 'Project successfully assembled!']);
    }
}
