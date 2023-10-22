<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    private $posts = [
        ["id" => "1", "title" => "Post1", "desc" => "description of post 1", "image" => "44OIP.jpg"],
        ["id" => "2", "title" => "Post1", "desc" => "description of post 2", "image" => "html.png"],
        ["id" => "3", "title" => "Post1", "desc" => "description of post 3", "image" => "R.jpg"],
    ];

    function post_list()
    {
        return view("landing.posts", ["posts" => $this->posts]);
    }

    function post_show($id)
    {
        foreach ($this->posts as $post) {
            if ($post["id"] == $id) {
                return view("landing.post", ["post" => $post]);
            };
        }
        return abort("404");
    }

    function home()
    {
        return view("landing.home");
    }
}
