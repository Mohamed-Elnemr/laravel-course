<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post ;
use App\User;

class PostsController extends Controller
{
    public function index(){


            return view ('posts.index',[
                'posts'=>Post::paginate(2)
            ]);

    }
    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }
    public function store(StorePostRequest $request){
        Storage::putFile('posts', $request->file('logo'));
        Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'user_id'=>$request->user_id,
            'file_upload'=>$request->file('logo')->hashName(),

        ]);
        return redirect()->route('posts.index');


    }
    public function edit(POST $post){

        return view('posts.edit',[
            'post'=>$post,
        ]);
    }
    public function show($post){
        $post=Post::find($post);


        return view('posts.show',[
            'post'=>$post,
            ]);
    }

    public function destroy($post){
        Post::destroy($post);
        return redirect()->route('posts.index');


    }
    public function update(UpdatePostRequest $request,Post $post){

        $data=request()->all();
        Post::find($post->id)->update([
            'title'=>$data['title'],
            'description'=>$data['description'],
        ]);
        return redirect()->route('posts.index');


    }

}
