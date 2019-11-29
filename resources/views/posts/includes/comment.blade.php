<div class="content">
        
    <form action="{{$action }}" method="POST">

        @csrf

        {{$method}}
        
        <div class="form-group row">

            <label for="email" class=" col-form-label ">{{ __('E-Mail Address') }}</label>
            
            <input id="email" type="email" class="form-control p-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1"> Post: </label>
            <editor title=""></editor>
        </div>

        @if ($errors->has('body')) 
            @foreach ($errors->get("body") as $message) 
                    <div class="alert alert-danger" role="alert">
                    {{$message}}
                    </div>              
            @endforeach      
        @endif    

        <div class="form-group d-flex bd-highlight mb-3">
            <button type="submit" name ="published" class="btn btn-primary ml-auto p-2 bd-highlight">Publish</button>
        </div>

    </form>  
  

    

</div>        