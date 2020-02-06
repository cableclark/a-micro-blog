@auth

<nav class="dashboard--navbar">

    <ul >

        <a href="{{route('admin')}}"> <li>Dashboard</li></a>
        
        <a   href="{{route('show-images')}}"> <li>Images</li></a>

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <li> {{ __('Logout') }}</li>
        </a>

        <form  id='logout-form' action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </ul >            

</nav>

@endauth   
