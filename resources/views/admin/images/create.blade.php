@extends("layouts.app")

@section("content") 
        
                <div class="content">
        
                   <form action = {{route("save-image")}} method="POST" enctype="multipart/form-data">
                         @csrf

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Image name</label>
                            <input type= "text" name = "name" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Image description</label>
                            <textarea name = "description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Example file input</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-2">Upload</button>
                        </div>
                    </form>


                </div>

        
@endsection