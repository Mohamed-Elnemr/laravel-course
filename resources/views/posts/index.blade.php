@extends('layouts.app')

@section('content')

    <a href="{{ route('posts.create') }}" class="btn btn-success">Create posts</a>

<table class="table">
    <thead>
    <tr>
        <th scope="col">index</th>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>

        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>


        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($posts as $index =>$post)
    <tr>
        <th>{{$index}}</th>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->slug}}</td>

        <td>{{isset($post->user)?$post->user->name:"Not found" }}</td>
        <td>{{($post->created_at)->format('d/m/Y')}}</td>

        <td>
            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Show posts</a>
            <a href="{{ route('posts.edit',$post->id)}}"  class="btn btn-success">Edit posts</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-danger"  onclick="return confirm('are you sure?')">Delete User</button>
            </form>

        </td>


    </tr>
    @endforeach


    </tbody>
</table>
    {{$posts->links()}}

    @endsection