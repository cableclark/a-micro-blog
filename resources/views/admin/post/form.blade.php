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

        <div class="images-flex">
            <input type="file" name="image" class="custom-file-input">
            <image-drawer>
            </image-drawer>  
       </div>
        @component('globalComponents.errors', ["error"=>"image"])
        @endcomponent
        <div class="images-flex">
            <button  type="submit" name ="published" value = "0">Save as Draft</button>
            <a href= "{{$route}}"><button type="buttonr" class="button-danger">Cancel</button></a>
            <button type="submit" name ="published" value = "1">Publish</button>
        </div>

    </form>  
  
</div>        