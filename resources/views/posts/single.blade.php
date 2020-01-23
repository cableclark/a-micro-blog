@extends('layouts.app')
@section('content')

     <div class="content">
        
        <img src="/storage/{{$post->tumbnail}}" alt="Featured image">
        <h2>{{$post->title}}</h2>
        <span class="meta-text"> Напишано на {{$post->created_at->locale('uk')->format("F j, Y")}}</></span>
        <div><p>{!!$post->body!!}</p> </div>

        <button id="comment-toggler">Дискусија</button>
        @foreach($post->comments as $comment) 
                <div class="comment">
                    <h4>{!!$comment->title!!}</h4> 
                    <p>{!!$comment->comment!!}
                    <span class="meta-text">Напишано на {{$comment->created_at->format("F j, Y")}} од {{$comment->name}}</span></p> 
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