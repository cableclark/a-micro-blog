@auth
<nav>
    <button class="dashboard--button">Menu</button>
    <div class="dashboard--navbar">
        <h3>Администраторски панел</h3> 
        <ul>
            <a href="{{route('admin')}}">  <li><img class="admin-icon" src="/images/home.svg"> ПОСТОВИ </li></a>
            <a href="{{route('show-images')}}"> <li> <img class="admin-icon" src="/images/images.svg"> СЛИКИ</li></a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <li> <img  class="admin-icon"src="/images/logout.svg"> Одлогирај се</li>
            </a>
            <form  id='logout-form' action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </ul>            

    </div>

</nav>

@endauth   
