<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{

    function __construct()
    {
        // $this->middleware('CheckAdmin')->except(["index"]);
        // $this->middleware('auth')->only(["store", "destroy", "edit", "show", "create", "update"]);
        $this->middleware('CheckPost')->only(['store', 'update']);
    }

    function listPosts()
    {
        // dump(Auth::id());
        $posts = Post::paginate(5);
        // return $posts;
        return view("DB-post.index", ['data' => $posts], compact('posts'));
    }
    function show($id)
    {
        $user = Auth::user();
        $post = Post::findorfail($id);

        if (auth()->user()->id == $post->user_id) {
            $post = Post::findorfail($id);
            $categories = Category::all();
            return view("DB-post.show", ['data' => $post, "category" => $categories]);
        }
        return abort(403);
    }
    function destroy($id)
    {
        if (Gate::allows('is_admin')) {
            $post = Post::findorfail($id);
            $post = $post->delete();
            return to_route("DB-post.listPosts");
        }
        return abort(403);
    }
    function create()
    {
        $categories = Category::all();
        return view("DB-post.create", ['data' => $categories]);
    }
    function store()
    {
        request()->validate([
            "title" => "required|min:3",
            "description" => "required",
            "image" => "required"
        ]);

        $request_data = request()->all();

        $request_data['user_id'] = Auth::id();
        $post = Post::create($request_data);
        return to_route("DB-post.listPosts");
    }
    function edit($id)
    {
        $post = Post::findorfail($id);
        return view("DB-post.edit", ['data' => $post]);
    }
    function update($id, Post $post)
    {
        $post = Post::findorfail($id);
        if (auth()->user()->id == $post->user_id) {

            request()->validate([
                "title" => "required|min:3",
                "description" => "required",
                "image" => "required"
            ]);
            $post = Post::findorfail($id);
            $post->title = request("title");
            $post->description = request("description");
            $post->image = request("image");
            $post->update();
            return to_route("DB-post.listPosts", ['data' => $post]);
        };
        abort(403);
    }
}
