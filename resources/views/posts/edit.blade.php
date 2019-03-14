@extends('layouts.app')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
            {{--<input type="hidden" name="post_id" value="{{$post->id}}">--}}
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Post Creator</label>
            <select class="form-control" name="user_id">
                    <option value="{{isset($post->user->id)?$post->user->id:0}}">{{isset($post->user->name)?$post->user->name:"Not Found"}}</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection