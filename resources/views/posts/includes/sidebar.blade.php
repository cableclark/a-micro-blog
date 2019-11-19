<div>
    <ul class="list-group">
        <h3> Latest blog posts: </h3>    
        @forelse($latests_posts as $post) 
            <a href= {{action('PostsController@show', $post->slug)}} >
            <p>{{$post->title}}</p> 
            </a>
        @empty 
            <p>No posts</p>
        @endforelse    
    </ul>
</div>