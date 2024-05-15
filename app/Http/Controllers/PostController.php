<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("posts.create", compact("categories"));

    }

    /**
     * Store a newly created resource in storage.
     */
    /* public function store(Request $request)
    {
        $request->validate([
            "title" => ['required'],
            'text' => ['required'],
            'category_id' => ['required'],
        ]);

        Post::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id')
        ]);
        return redirect()->route('posts.index');
    } */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        if ($post instanceof Model) {
            toastr()->success('Post successfully created!');
            return redirect()->route('posts.index');
        }
        toastr()->error('An error has occurred please try again later.');

        return back();

    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category_id')
        ]);
        if ($post instanceof Model) {
            toastr()->info('Post successfully updated!', [], 'Updated');

            return redirect()->route('posts.index');
        }
        toastr()->error('An error has occurred please try again later.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        toastr()->error('Post has been deleted successfully!', [], 'Deleted');
        return redirect()->route('posts.index');
    }
}
