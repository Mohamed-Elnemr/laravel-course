<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;
use App\Post ;
use App\User;

class PostsController extends Controller
{
    public function index(){

//            $posts=Post::all();
//            dd($posts);
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
//    public function store(Request $request){
    public function store(StorePostRequest $request){

//        $request=request();
//        dd($request->all());

//        $request->validate([
//            'title'=>'required |min:3',
//            'description'=>'required',
//        ],[
//            'title.required'=>' ay haga',
//            'title.min'=>'minimum required',
//        ]);


//        $data=request()->all();
//        Post::create([
//            'title'=>$data['title'],  // from the name of html
//            'description'=>$data['description'], //from the name of html
//        ]);
        Post::create(request()->all());

        return redirect()->route('posts.index');


    }
    public function edit(POST $post){
//        $post=Post::where('id',$post)->get()->first();
//        $post=Post::where('id',$post)->first();   //select * from posts where id=1 limit1;
//        $post=Post::find($post);
//        $post=Post::findOrFail($post);
//        dd($post);
        return view('posts.edit',[
            'post'=>$post,
        ]);
    }
    public function show($post){
//        dd($post->user->name);
        $posts=Post::find($post);
//        dd($data);
//        dd(Post::where('id',$post)->first()->user->name);
//        if (Post::where('id',$post)->first()->user->name){
//            $name=Post::where('id',$post)->first()->user->name;
//        }else{
//            $name="Not Found";
//        }


        return view('posts.show',[
            'post'=>$posts,
            ]);
    }

    public function destroy($post){
//        dd($post);
        Post::destroy($post);
        return redirect()->route('posts.index');


    }
    public function update($post){
        $data=request()->all();
        Post::where('id',$post)->update([
            'title'=>$data['title'],
            'description'=>$data['description'],
        ]);
        return redirect()->route('posts.index');


    }

}
