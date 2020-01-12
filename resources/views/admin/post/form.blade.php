{{--  Recieves three parameters $title, $action, $method $title_value, $body_value, $route --}}

<div class="content">

    <div class="title m-b-md">
        <h2>{{$title }}</h2>
    </div>
                
    <form action="{{$action}}" method="POST" enctype="multipart/form-data">

        @csrf

        {{$method}}
        
        <div class="form-group">
            <label for="exampleFormControlFile1">Title</label>
            <input class="form-control" type="text" name="title" value="{{$title_value}}"> 
        </div>
            
        @if ($errors->has('title')) 
            @foreach ($errors->get("title") as $message) 
                    <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>              
            @endforeach      
        @endif    

        <div class="form-group">
            <label for="exampleFormControlTextarea1"> Post: </label>
            <editor name="body" value= '{{$body_value}}'>
            </editor>
        </div>

        @if ($errors->has('body')) 
            @foreach ($errors->get("body") as $message) 
                    <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>              
            @endforeach      
        @endif    

        
            
        
       <div class="form-group">
            <div class="custom-file">
                <label for="FormControlFile"> Featured image:</label>
                <input type="file"  name="image"  class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        
        <div class="form-group"> 
            <image-drawer>
              
            </image-drawer>  
        </div>

           @if ($errors->has('image')) 
            @foreach ($errors->get("image") as $message) 
                    <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>              
            @endforeach      
        @endif   

        <div class="form-group d-flex bd-highlight mb-3">
            <button  type="submit" name ="published" class="btn btn-primary mr-3 p-2 bd-highlight" value = "0">Make Draft</button>
            <a href= "{{$route}}"><button type="button" class="btn btn-danger p-2 bd-highlight">Cancel</button></a>

            <button type="submit" name ="published" class="btn btn-primary ml-auto p-2 bd-highlight" value = "1">Publish</button>
        </div>
    </form>  
  


</div>        