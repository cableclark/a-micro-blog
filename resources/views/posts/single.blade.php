@extends('layouts.app')
@section('content')
     <div class="content">

        <h2 class="headings">

        {{$post->title}}</h2>

        <p ><i>{{$post->created_at->format("F j, Y")}}</i></p>

         <div class="paragraphs"><p>{!!$post->body!!}</p> </div>

        <hr>
        <h4>Discussion:</h4>
        @foreach($post->comments as $comment) 
                <div class="comment">
                    <h5>{!!$comment->title!!}</h5>
                    <p>{!!$comment->comment!!}</p>
                    <p> <i>Напишано на {{$comment->created_at->format("F j, Y")}} од {{$comment->name}}</i></p>   
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