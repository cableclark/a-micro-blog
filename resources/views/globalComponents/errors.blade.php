 
 @if ($errors->has($error)) 
    @foreach ($errors->get($error) as $message) 
            <div class="alert alert-danger" role="alert">
            {{ $message }}
            </div>              
    @endforeach      
@endif    
