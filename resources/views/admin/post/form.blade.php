{{--  Recieves three parameters $title, $action, $method $title_value, $body_value, $route --}}

<div class="dash--container form">
  
    <h2>{{ $title }}</h2>
      
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">

        @csrf

        {{$method}}
        <div class="text-input">
            <label for="title"> Title: </label>
            <input class="form-control" type="text" name="title" value="{{$title_value}}"> 
        </div>
            
        @component('globalComponents.errors', ["error"=>"title"])                
        @endcomponent

       <div class="text-input">
            <label for="body"> Post: </label>
            <editor name="body" value= "{{$body_value}}">
            </editor>
        </div>
       
        @component('globalComponents.errors', ["error"=>"body"])                 
        @endcomponent

        <label for="FormControlFile"> Featured image: </label>
        <input type="file" name="image"  class="custom-file-input" id="customFile">
       
        
        <image-drawer>
        </image-drawer>  
       
        @component('globalComponents.errors', ["error"=>"image"])
        @endcomponent
        
        <button  type="submit" name ="published" value = "0">Save as Draft</button>
        <a href= "{{$route}}"><button type="buttonr" class=" button-danger">Cancel</button></a>
        <button type="submit" name ="published" value = "1">Publish</button>

    </form>  
  
</div>        