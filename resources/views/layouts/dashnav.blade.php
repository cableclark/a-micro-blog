@auth
<nav>
    <button class="dashboard--button">Menu</button>
    <div class="dashboard--navbar">
        <h3>Администраторски панел</h3> 
        <ul>
            <a href="{{route('admin')}}"> <li>ПОСТОВИ </li></a>
            <a href="{{route('show-images')}}"> <li>СЛИКИ</li></a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <li> Одлогирај се</li>
            </a>
            <form  id='logout-form' action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>            

    </div>

</nav>

@endauth   
