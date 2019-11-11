@extends("layouts.app")

@section("content") 
        
                <div class="content">
                    <div class="title m-b-md">
                        <h2>Edit post </h2>
                    </div>
                </div>
                 <form method= "POST" action="{{route('save-post')}}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Title</label>
                            <input class="form-control" type="text" name="title"> 
                         </div>
                    
                               
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                 </form>        


        
@endsection
