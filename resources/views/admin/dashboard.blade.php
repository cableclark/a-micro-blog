@extends('layouts.app')

@section('content')

<div class="dash-container">

    <a href="{{route('create-post')}}"> <button class="m-3 btn btn-primary" > Create new </button></a>

    @foreach($posts as $post) 

        <div class="card mb-3">
            
                <div class="card-body">
            
                    <div class="card-text">

                        <div class="post-img float-left mr-3 "> 

                            <img class="img"  src="{{asset("/storage/" . $post->featured_image)}}" title = "{{$post->slug}}">  

                        </div> 

                        <div class="d-flex flex-column"> 
                            
                                <h2 class= "bd-highlight mb-0"> <a href= {{action('PostsController@show', $post->slug)}}> {{$post->title}} </a> </h2>

                                <p class="pt-2 p-2 mr-3 text" >
                                    @if($post->published == 1)   
                                        {{"Published"}} 
                                    @else {{"Draft"}}  
                                    @endif    
                            
                                <i> {{$post->created_at->format("F j, Y")}} </i>
                                </p>

                                
                            
                        </div>

                        <div class="d-flex justify-content-start mt-auto p-2 bd-highlight">
                            
                                <a href="{{action('PostsController@edit', $post->slug)}}" class="mr-3 btn btn-primary"> Edit </a>

                                <form action="{{action('PostsController@destroy', $post->slug)}} " method="post"> 

                                    @csrf
                                    @method('DELETE')

                                    <button type ="submit" class="btn btn-danger"> Delete </button>
                                    
                                </form>
                                
                            

                        </div>  

                    </div> 

                </div>

            </div>
    @endforeach
 </div>   
@endsection 