{{--  Recieves three parameters $title, $action, $method $title_value, $body_value, $route --}}

<div class="content">


    <div class="title m-b-md">
        <h2>{{$title }}</h2>
    </div>
                
    <form action="{{$action }}" method="POST">

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
            {{-- <textarea class="form-control" name="body" id="editor" rows="10">.</textarea> --}}
            
            <editor title="{{$body_value}}"></editor>
            
        </div>

        @if ($errors->has('body')) 
            @foreach ($errors->get("body") as $message) 
                    <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>              
            @endforeach      
        @endif    
        
        <div class="form-group">
            <button type="submit" name ="published" class="btn btn-primary" value = "1">Publish</button>
            <button type="submit" name ="published" class="btn btn-primary" value = "0">Save Draft</button>
            <a href= "{{$route}}"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>

    </form>  
  

    

</div>        