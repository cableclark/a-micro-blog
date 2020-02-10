@extends("layouts.login")

@section('content')
<div class="login--container">
    <div class="login--card">
        <div class="login--card--header">{{ __('Логирај се') }}</div>

        <form class="login--card--body" method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" >{{ __('Емејл адреса:') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        

            <label for="password" class="">{{ __('Лозинка:') }}</label>

        
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            

    
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Запамти ме') }}
            </label>
                    

            
            <button type="submit" class="">
                {{ __('Продолжи') }}
            </button>

            @if (Route::has('password.request'))
                <a class="" href="{{ route('password.request') }}">
                    {{ __(' Си ја заборави лозинката ...пак?') }}
                </a>
            @endif
                
        </form>
    
    </div>
       
</div>
@endsection
