@extends('layouts.app')

@section('content')
    <a href="{{route ('posts.index')}}" class="btn btn-primary">BacK</a>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>

        </tr>
        </thead>
        <tbody>
{{--        @foreach($posts as $post)--}}
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->description}} </td>

            </tr>
        {{--@endforeach--}}


        </tbody>

    </table>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Creator Name</th>
            <th scope="col">Creator Email</th>

            <th scope="col">Created At</th>


        </tr>
        </thead>

        <tbody>
        {{--        @foreach($posts as $post)--}}
        <tr>
            <td>{{isset($post->user)?$post->user->name:"Not found"}}</td>
            <td>{{isset($post->user)?$post->user->email:"Not found"}}</td>

            <td>{{$post->human_readable_date}}</td>
        </tr>
        {{--@endforeach--}}


        </tbody>

    </table>

    <tbody>



    </tbody>

@endsection