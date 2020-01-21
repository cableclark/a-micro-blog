@extends("layouts.dashboard")

@section("content") 

    @component('admin.post.form')
        @slot('title')
            {{'Edit post'}}
        @endslot
            
        @slot('action')
            {{route('update-post', $post->slug)}}
        @endslot

        @slot('method')
            @method('PUT')
        @endslot

        @slot('title_value')
            {{$post->title}}
        @endslot

        @slot( 'body_value' )
            {!!$post->body!!}
        @endslot

        @slot( 'route' )
            {{route('admin')}}
        @endslot

    @endcomponent


        
@endsection
