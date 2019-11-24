@extends("layouts.app")

@section("content") 
        
                <div class="content">
        
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Images
                        </div>
                        <ul class="list-group list-group-flush">
                           @forelse ($images as $image) 
                                 <li class="list-group-item"><img class="img-thumbnail" src="{{asset("/storage/" . $image->path)}}" title = "{{$image->name}}">
                           
                             <form action="{{action('ImagesController@destroy', $image->id)}} " method="post"> 
                                @csrf
                                @method('DELETE')

                                <button type ="submit" class="btn btn-danger mt-2 mb-2"> Delete </button>
                                
                            </form>
                            </li>
                           @empty <li class="list-group-item">{{ "No images" }} </li>
                           @endforelse        
                    </div>       

                    <a href= "{{route('upload-image')}}"><button type="button" class="btn btn-success mt-2">Upload</button></a>

                </div>

        
@endsection

       