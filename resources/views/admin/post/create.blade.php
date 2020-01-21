@extends("layouts.dashboard")

@section("content") 
    
    @component('admin.post.form')
          @slot('title')
            {{"Create post"}}
        @endslot

        @slot('action')
            {{route('save-post')}}
        @endslot

        @slot('method')
        @endslot

        @slot('title_value')
            {{old('title') ?? ""}}
        @endslot

        @slot( 'body_value' )
            {{old('body') ?? ""}}
        @endslot

        @slot( 'route' )
            {{route('admin')}}
        @endslot

    @endcomponent

@endsection
