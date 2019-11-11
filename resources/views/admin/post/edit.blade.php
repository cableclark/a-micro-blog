@extends("layouts.app")

@section("content") 
        
                <div class="content">
                    <div class="title m-b-md">
                        <h2>Edit post </h2>
                    </div>
                </div>
                 <form action="{{route('update-post', $post->slug)}}" method="POST">
                 @csrf
                 @method('PUT')
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Title</label>
                            <input class="form-control" type="text" name="title" value="{{$post->title}}"> 
                         </div>
                    
                               
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name = "body" rows="10">{{$post->body}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        
                            <a href= "{{route('index')}}"><button type="button" class="btn btn-danger">Cancel</button></a>
                        </div>
                 </form>        


        
@endsection
