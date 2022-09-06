<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Academy;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function edit() {
        $skills = Skill::all();
        $academies = Academy::all();
        return view('users.edit', compact('skills', 'academies'));
    }

    public function update(UpdateUserRequest $request) {
        $user = User::find(auth()->user()->id);
        if($request->profile_image) {
            $oldImageName = auth()->user()->profile_image;
            $newImageName = time() . '-' . $request->name . $request->surname . '.' . $request->profile_image->extension();
            $request->profile_image->move(public_path('profile-images'), $newImageName);
            $user->profile_image = $newImageName;
            File::delete(public_path('profile-images/' . $oldImageName));
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->bio = $request->bio;
        $user->email = $request->email;
        $user->academy_id = $request->academy_id;
        $user->skills()->sync($request->skills);
        $user->is_complete = 1;
        $user->save();

        return redirect()->route('profile');
    }

    public function show($id) {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
}
