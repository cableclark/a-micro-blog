@extends("layouts.dashboard")

@section("content") 
        
                <div class="content">
                    <div class="title m-b-md">
                        Dashboard
                    </div>
                    <div class="card" style="width: 18rem;">
                        <div class="card-header">
                            Featured
                        </div>
                        <ul class="list-group list-group-flush">
                           @foreach ($posts as $post) 
                                <li class="list-group-item"><a href="{{action("AdminController@edit", $post->id) }}"> {{$post->title}}</a></li>
                           @endforeach        
                    </div>              
                </div>

        
@endsection

       