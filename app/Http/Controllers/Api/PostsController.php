<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){
        return PostResource::collection(Post::all());
    }

    public function show($post){

        $post=Post::findOrFail($post);
        return new PostResource($post);

    }

}
