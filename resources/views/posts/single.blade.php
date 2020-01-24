@extends('layouts.app')
@section('content')

     <div class="content">
        
        <img src="/storage/{{$post->tumbnail}}" alt="Featured image">
        <Date date="{{$post->created_at}}"> </Date>
        <h2>{{$post->title}}</h2>

        <div><p>{!!$post->body!!}</p> </div>


        <Discussion comments="{{count($post->comments)}}">
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
         </Discussion>
    </div>
   
@endsection 
