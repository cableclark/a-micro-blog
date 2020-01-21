@extends('layouts.app')
@section('content')



        <front-page> </front-page> 

        {{-- <div class="featured-post">
            <img class="featured-image"  src="{{asset("/storage/" . $firstPost->featured_image)}}" title = "{{$firstPost->slug}}">     
            <div>        
                <h2 class="headings "><a href= {{action('PostsController@show', $firstPost->slug)}} >{{$firstPost->title}}</a></h2>
                <p>Објавено на: <i>{{$firstPost->created_at->format("F j, Y")}}</i></p>
            </div> 
        </div>

        <div class="other-posts">
            @foreach($posts as $post) 
                <img class="img-fluid mb-5"  src="{{asset("/storage/" . $post->featured_image)}}" title = "{{$post->slug}}">              
                <h2 class="headings "><a href= {{action('PostsController@show', $post->slug)}} >{{$post->title}}</a></h2>
                <p>Објавено на: <i>{{$post->created_at->format("F j, Y")}}</i></p>
                <div class="paragraphs">{!!$post->summary!!}</div>
                <p><a  href= {{action('PostsController@show', $post->slug)}}>Прочитај повеќе...</a></p>
                <hr class="mb-5">
            @endforeach
        </div>
    </div> --}}


@endsection 