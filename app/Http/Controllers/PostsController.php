<?php

namespace App\Http\Controllers;


use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    /**
     * Authenticating user session
     */

    public function __construct()
    {
       $this->middleware('auth');
    }


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

       $filePath = request('image')->store('uploads', 'public');

       $image = Image::make(public_path("storage/{$filePath}"))->fit(960, 960);
       $image->save();

        auth()->user()->post()->create([
            'caption' => $data['caption'],
            'image' => $filePath,
        ]);

        $id = auth()->user()->id;

        return redirect('/profile/' . $id); //Authenticates redirect if id matches

    }

    public function show(\App\Post$post) //FETCH POST DATA AUTOMATICALLY
    {
        return view('posts.show', compact('post')); //pass post into view
    }


}
