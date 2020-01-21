@auth

<nav class="navbar" id="navig">

    <ul class="navbar-nav ml-auto">

        <a class="p-2" href="{{route('admin')}}"> <li>Dashboard</li></a>
        
        <a  class="p-2" href="{{route('show-images')}}"> <li>Images</li></a>

        <a  class="p-2" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <li> {{ __('Logout') }}</li>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

    </ul >            

</nav>

@endauth   
