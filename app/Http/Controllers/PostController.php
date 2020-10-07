<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // show following posts
        $users = auth()->user()->following()->pluck('profiles.user_id');

        // with(relationship)
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(1);
        // $post = Post::whereIn('user_id' ,$user)->orderBy('created_at','DESC')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
          'image'=> ['required','image'],
          'caption'=> ['required','string']
        ]);

        $attributes['image'] = $request->file('image')->store('uploads');
        // dd($attributes);
        auth()->user()->posts()->create($attributes);
        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        //
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
