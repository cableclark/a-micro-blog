@extends('layouts.app')
@section('content')
    <div class="main-post">

    <div>
        @foreach($posts as $post) 
           
            <img class="img-fluid mb-5"  src="{{asset("/storage/" . $post->featured_image)}}" title = "{{$post->slug}}">              
            <h2 class="headings "><a href= {{action('PostsController@show', $post->slug)}} >{{$post->title}}</a></h2>
            <div class="paragraphs">{!!$post->summary!!}</div>
            <p> <a  href= {{action('PostsController@show', $post->slug)}}>Прочитај повеќе...</a></p>
            <p><i>{{$post->created_at->format("F j, Y")}}</i></p>
            

            <hr class="mb-5">
        @endforeach
    </div>

@include('posts.includes.sidebar')    

    </div>
@endsection 