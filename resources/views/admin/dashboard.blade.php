@extends('layouts.dashboard')

@section('content')

<div class="dash--container">
    <a href="{{route('create-post')}}"> <button class="" > Create new </button></a>
    <div class="card--container">
        
        @foreach($posts as $post) 

            <div class="card">
                
                <img src="{{asset("/storage/" . $post->featured_image)}}" title = "{{$post->slug}}">  
                
                <h2> <a href= {{action('PostsController@show', $post->slug)}}> {{$post->title}} </a> </h2>
        
                <p>
                    @if($post->published == 1)   
                        {{"Објавено на:"}} 
                    @else {{"Во драфт:"}}  
                    @endif    
            
                <i> {{$post->created_at->format("F j, Y")}} </i>
                </p>
                
                <button><a href="{{action('PostsController@edit', $post->slug)}}"> Промени </a> </button>  
                    
                <form class="card--button" action="{{action('PostsController@destroy', $post->slug)}} " method="post"> 

                    @csrf
                    @method('DELETE')

                    <button class="button-danger" type ="submit" > Избриши </button>
                    
                </form>
                
    

            </div>  
        @endforeach
        
     </div> 

 </div>   
@endsection 