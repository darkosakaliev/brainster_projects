<?php

namespace App\Http\Controllers;

use App\Models\Academy;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index() {
        return view('index');
    }

    public function projects() {
        $projects = Project::where('is_assembled', '=', 0)->get();

        $output = '';

        foreach($projects as $project) {
            $output .= View::make('components.project-card')->with('project', $project)->render();
        }

        if(count($projects) > 0) {
            echo $output;
        } else {
            echo '<div class="text-semibold text-2xl text-center mt-6">There are no projects at the moment.</div>';
        }
    }

    public function academies() {
        $academies = Academy::all();

        $output = '';

        foreach($academies as $academy) {
            $output .= View::make('components.academy-card')->with('academy', $academy)->render();
        }

        if(count($academies) > 0) {
            echo $output;
        } else {
            echo '<div class="text-semibold text-2xl text-center mt-6">There are no filters at the moment.</div>';
        }
    }
}
