@extends('layouts.app')
@section('content')
    <div class="main-post">

    <div>
        @foreach($posts as $post) 
            <h2><a href= {{action('PostsController@show', $post->slug)}} >{{$post->title}}</a></h2>
            <p>{!!$post->body!!}</p>
            <p><i>{{$post->created_at->format("F j, Y")}}</i></p>
        @endforeach
    </div>

    @include('posts.includes.sidebar')    

    </div>
@endsection 