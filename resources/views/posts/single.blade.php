@extends('layouts.app')
@section('content')
     <div class="content">

        <h2 class="headings"><a href= {{action('PostsController@show', $post->id)}}>

        {{$post->title}}</a></h2>

        <p ><i>{{$post->created_at->format("F j, Y")}}</i></p>

         <div class="paragraphs"><p>{!!$post->body!!}</p> </div>

        <hr>
        <h4>Discussion:</h4>
        @foreach($post->comments as $comment) 
                <div class="comment">
                
                <p>{!!$comment->comment!!}</p>
                <p ><i>{{$comment->created_at->format("F j, Y")}}</i></p>

                </div>
        @endforeach
        

        @error('msg')
            <div class="alert alert-primary"> Your post is sent!</div>
        @enderror

        @component('posts.includes.comment')

            @slot('action')
                {{route('send-comment')}}
            @endslot

            @slot('method')
                @method('POST')
            @endslot

            @slot('post_id')
                <input type="hidden" name="post_id" value="{{$post->id}}">
            @endslot

        @endcomponent
    </div>
 
@endsection 