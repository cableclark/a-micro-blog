@extends('layouts.app')

@section('content')
    <a href="{{route('create-post')}}"> <button class="m-3 btn btn-primary" > Create new </button></a>

    @foreach($posts as $post) 

      
        <div class="card mb-3">
                
            
                <div class="card-header d-flex">

                    <h2 class= "flex-grow-1 bd-highlight mb-0">  <a href= {{action('PostsController@show', $post->slug)}}> {{$post->title}} </a> </h2>
                    @if($post->published == 1)   
                         <div class="pt-2 p-2 mr-3 border border-primary text-primary rounded">{{"Published"}} </div>
                    @else <div class=" pt-2 p-2 mr-3 border border-secondary rounded">{{"Draft"}} </div>

                    @endif    

                </div>

                <div class="card-body">
            
                    <div class="card-text ">

                        <div class="post-img float-left mr-4 "> 
                            <img class="img"  src="{{asset("/storage/" . $post->featured_image)}}" title = "{{$post->slug}}">  
                        </div> 

                        <div class="d-flex flex-column"> 
                            <div>
                                {!!$post->summary!!}

                                <i> {{$post->created_at->format("F j, Y")}} </i>
                            
                            </div>

                            <div class="d-flex justify-content-end mt-auto p-2 bd-highlight">
                            
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

            </div>
    @endforeach
@endsection 