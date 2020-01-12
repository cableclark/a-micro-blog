@extends("layouts.app")

@section("content") 
        
<div class="content">
    <div>
        <div>
            <h1>Images</h1> 
        </div>
         <a href= "{{route('upload-image')}}"><button type="button" class="btn btn-success mt-2">Upload</button></a>
        <div class= "d-flex flex-row flex-wrap">
        
            @forelse ($images as $image) 

            <div class="pr-2 pt-2 d-flex flex-column justify-content-between ">
                <img class="img" src="{{asset("/storage/" . $image->path)}}" title = "{{$image->name}}">
            
                <form action="{{action('ImagesController@destroy', $image->id)}} " method="post"> 
                    @csrf
                    @method('DELETE')

                    <button type ="submit" class="btn btn-danger mt-2 mb-2"> Delete </button>
                    
                </form>
            </div>
            @empty
            
            <div class="list-group-item">{{ "No images" }} </div>

            @endforelse        
    </div>       

   

</div>

        
@endsection

       