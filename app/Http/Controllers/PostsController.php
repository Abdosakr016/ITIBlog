<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostsController extends Controller
{
    function listPosts()
    {
        $posts = Post::paginate(5);
        return view("DB-post.index", ['data' => $posts], compact('posts'));
    }
    function show($id)
    {
        $post = Post::findorfail($id);
        $categories = Category::all();
        return view("DB-post.show", ['data' => $post, "category" => $categories]);
    }
    function destroy($id)
    {
        $post = Post::findorfail($id);
        $post = $post->delete();

        return to_route("DB-post.listPosts");
    }
    function create()
    {
        $categories = Category::all();
        return view("DB-post.create", ['data' => $categories]);
    }
    function store()
    {
        $data = request();
        $title = request()->get('title');
        $description = request()->get('description');
        $image = request()->get('image');
        $category_id = request()->get('category_id');
        request()->validate([
            "title" => "required|min:3",
            "description" => "required",
            "image" => "required"
        ]);
        $posts = new Post;
        $posts->title = $title;
        $posts->description = $description;
        $posts->image = $image;
        $posts->category_id = $category_id;
        $posts->save();
        return to_route("DB-post.listPosts");
    }
    function edit($id)
    {
        $post = Post::findorfail($id);
        return view("DB-post.edit", ['data' => $post]);
    }
    function update($id)
    {
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
    }
}
