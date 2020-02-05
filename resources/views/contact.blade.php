@extends('layouts.app')
@section('content')

    <div class="wraper">
        
        <h2> Контакт</h2>

        <div class="comments-form">
                    
                <form action="contact.blade.php" method="POST">

                    @csrf

                    <div class="form-group">

                        <label for="email">{{ __('Име:') }}</label>
                        
                        <input id="email" type="text" class="form-control  @error('text') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="text" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>

                    <div class="form-group">

                        <label for="email">{{ __('Емејл адреса:') }}</label>
                        
                        <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>

                    <div class="form-group">

                        <label for="email">{{ __('Наслов:') }}</label>
                        
                        <input id="email" type="text" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="text" autofocus>

                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>

                    <div class="form-group">
                        <label for="body"> Порака:</label>
                        <textarea  class="form-control" name="body" id="" cols="30" rows="10"></textarea>
                    </div>

                    @if ($errors->has('body')) 
                        @foreach ($errors->get("body") as $message) 
                                <div class="alert alert-danger" role="alert">
                                {{$message}}
                                </div>              
                        @endforeach      
                    @endif    


                    <div class="form-group d-flex bd-highlight mb-3">
                        <button class="button-publish" type="submit" name ="published" class="btn btn-primary ml-auto p-2 bd-highlight">Прати</button>
                    </div>

            </form>  
        </div>    

    </div>

@endsection 
