@extends('layouts.app')
@section('content')

        <h2><a href= {{action('PostsController@show', $post->id)}} >{{$post->title}}</a></h2>
        <p>{{$post->body}}</p>
        <p><i>{{$post->created_at->format("F j, Y")}}</i></p>
 
@endsection 