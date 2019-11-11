@extends('layouts.app')
@section('content')

    @foreach($posts as $post) 

        <div class="card mb-3">
                <div class="card-header">

                    <h2>  <a href= {{action('PostsController@show', $post->slug)}} >{{$post->title}}</a> </h2>

                </div>
                <div class="card-body">
            
                    <p class="card-text">

                        {{$post->body}}

                        <p><i>{{$post->created_at->format("F j, Y")}}</i></p>
                    <div class="d-flex">
                        <a href="{{action('PostsController@edit', $post->slug)}} " class="mr-3 btn btn-primary">Edit</a>

                        <form action="{{action('PostsController@destroy', $post->slug)}} " method= "post"> 
                        @csrf
                        @method('DELETE')
                            <button type ="submit" class="btn btn-danger"> Delete </button>
                        </form>
                    </div>
                </div> 
            </div>
    @endforeach
@endsection 