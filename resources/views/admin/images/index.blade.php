@extends("layouts.app")

@section("content") 
        
                <div class="content">
        
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Images
                        </div>
                        <ul class="list-group list-group-flush">
                           @forelse ($images as $image) 
                                 <img src= "{{$image->filepath}}" title = "{{$image->title}}"}}</></li>
                           @empty <li class="list-group-item">{{ "No images" }} </li>
                           @endforelse        
                    </div>       

                    <a href= "{{route('upload-image')}}"><button type="button" class="btn btn-success mt-2">Upload</button></a>

                </div>

        
@endsection

       