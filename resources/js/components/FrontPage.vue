<template>
    <div class="container">

        <fullSpinner v-if="loading"></fullSpinner>  

        <transition-group class="grided" appear name="show">
           
           <FeaturedPost class="featured" v-if="published.firstPost" :post="published.firstPost" v-bind:key="published.firstPost.id"></FeaturedPost>
           
            <div v-for="post in published.posts" v-bind:key="post.id">
                <PostCard :post="post"></PostCard> 
            </div>
        
        </transition-group>

        <InfinteScroll></InfinteScroll> 

    </div>
</template>

<script>
    import axios from 'axios';
    import PostCard from './PostCard.vue';
    import FeaturedPost from './FeaturedPost.vue';
    import InfinteScroll from './InfiniteScroll.vue';
    import fullSpinner from './FullSpinner.vue';
  
    export default {
        components: {
            PostCard,
            FeaturedPost,
            InfinteScroll,
            fullSpinner
        },
        data: function () {
            return {
                open: false,
                published: {},
                errors:[],
                divKey:"heyholetsgo1",
                postToggler: false,
                spinner: false,
                loading: true
            }
        },
        beforeCreate() {
            axios.get(`/getPosts`)
                .then(response => {
                // JSON responses are automatically parsed.
                console.log(response.data)
                this.published = response.data;
                this.loading= false;
                })
                .catch(e => {
                    this.errors.push(e)
             })
        }
      
    }
</script>

<style>

.show-enter-active, .show-leave-active {
    transition: all .4s ease-out; 
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    transform: translate(5vw);
}



@media screen and (min-width: 600px) { 
    .grided{
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-gap: 1em;;
    }
     .featured {
        grid-column:1/-1;    
    }
    
    .article{
        transition: all 0.3s ease-out;
    }

    .article:nth-last-of-type(2) {
        grid-column: 2;   
    }

    .article:hover {
        transform: scale(1.001);
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
}


@media (min-width: 778px) { 
    .container {
        max-width: 1024px;
        margin: 0 auto;
    }


}


@media screen and (min-width: 900px) { 

  .grided{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }
     .featured {
        grid-column:1/-1;    
    }
    .article{
        grid-column: 1;   
    }

    .article:nth-last-of-type(2) {
        grid-column: 2;   
    }

    .article:nth-last-of-type(3) {
        grid-column: 3;   
    }

}

@media screen and (min-width: 1024px) { 

}
@media screen and (min-width: 1200px) { 

}

@media (min-width: 1800px) {
    .container {
            margin: 0 auto;
            max-width: 1224px;
    }

    
}

</style>

