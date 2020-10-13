<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $users = auth()->user()->following()->pluck('profiles.user_id');
        // $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(10);
        // return view('post.index', compact('posts'));
        return view('post.index', [
            'posts' => Post::latest()->paginate(20)
        ]);
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
        $request->user()->posts()->create($attributes);

        return redirect('/profile/' . $request->user()->id);
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'caption' => 'required|min:5'
            ]);

            $post->update($attributes);
            return redirect('/profile/' . $post->user->id);
        }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
