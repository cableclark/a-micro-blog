@auth

<nav class="dashboard--navbar">
    <h3>Администраторски панел</h3> 
    <ul>
        <a href="{{route('admin')}}"> <li>Постови </li></a>
        <a href="{{route('show-images')}}"> <li>Слики</li></a>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <li> Одлогирај се</li>
        </a>
        <form  id='logout-form' action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>            

</nav>

@endauth   
