@extends('layouts.app')
@section('content')

     <div class="content">
        
        <img class="mobile-image" src="/storage/{{$post->tumbnail}}" alt="Featured image">
        
        <div class="img--container">
            <img class="desktop-image" src="/storage/{{$post->featured_image}}" alt="Featured image">
        </div>

        <div class="headings">
            <Date class="date" date="{{$post->created_at}}"> </Date>
            <h2>{{$post->title}}</h2>
        </div>
        <div class="text">  
            <div class="post"><p>{!!$post->body!!}</p> </div>

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
    </div>

@endsection 
