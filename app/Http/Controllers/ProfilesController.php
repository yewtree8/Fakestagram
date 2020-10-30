<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        return view('profiles.index', compact('user', 'follows'));
    }


    public function edit(User $user)
    {
        $this->authorize('update', $user->profile); //Block the page for editing complete.y
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);


        if(request('image')) { //If has image
            $filePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$filePath}"))->fit(1000, 1000);
            $image->save();
            $data = array_merge($data, ['image' => $filePath]); //add to the data array.
        }

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }



}
