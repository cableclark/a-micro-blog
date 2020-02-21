@extends("layouts.dashboard")

@section("content") 
        
<div class="dash--container">
    <div>
        <div>
            <h1>Images</h1> 
        </div>
         <a href= "{{route('upload-image')}}"><button type="button" class="btn btn-success mt-2">Upload</button></a>
        <div class= "card--container">
        
            @forelse ($images as $image) 

            <div class="card">
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

       