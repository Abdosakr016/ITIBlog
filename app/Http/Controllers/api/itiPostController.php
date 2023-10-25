<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    function index()
    {
        $post = Post::all();
        return $post;
    }

    function show($id)
    {
        $post = Post::findorfail($id);
        return $post;
    }
}
