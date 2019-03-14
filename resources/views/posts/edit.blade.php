@extends('layouts.app')
@section('content')
    <a href="{{route ('posts.index')}}" class="btn btn-primary">BacK</a>

    <form action="{{route ('posts.update',$post->id) }}" method="POST">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text"name="title" value="{{ $post->title }} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <input type="text"name="description" value="{{ $post->description }} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Post Creator</label>
            <select class="form-control" name="user_id">
                {{--@foreach($users as $user)--}}
                    <option value="{{isset($post->user->id)?$post->user->id:0}}">{{isset($post->user->name)?$post->user->name:"Not Found"}}</option>
                {{--@endforeach--}}
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection