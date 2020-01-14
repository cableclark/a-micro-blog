@extends("layouts.app")

@section("content") 
        
<div class="content">

    <form action = {{route("save-image")}} method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="name">Image name</label>
            <input type= "text" name = "name" class="form-control" rows="3">
        </div>

        @component('globalComponents.errors', ["error"=>"name"])
        @endcomponent
        
        <div class="form-group">
            <label for="description">Image description</label>
            <textarea name ="description" class="form-control"  rows="3"></textarea>
        </div>

        @component('globalComponents.errors', ["error"=>"description"])
        @endcomponent 

        <div class="form-group">
            <label for="customFile">Choose a file: </label>
            <input type="file"  name="image"  class="custom-file-input" id="customFile">
        </div>

        @component('globalComponents.errors', ["error"=>"image"])   
        @endcomponent

        <div class="form-group">
            <button type="submit" class="btn btn-success mt-2">Upload</button>
        </div>

    </form>


</div>

        
@endsection