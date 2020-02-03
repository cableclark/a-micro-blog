<template>
    <div class="container">
        <fullSpinner v-if="loading"></fullSpinner>  


       <transition-group appear name="show">
           
           <FeaturedPost  v-if="published.firstPost" :post="published.firstPost" v-bind:key="published.firstPost.id"></FeaturedPost>
           
            <div class="article-container" v-bind:key="divKey">
                <article v-for="post in published.posts"  v-bind:key="post.id">
                    <PostCard :post="post"></PostCard> 
                </article>
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

article  {
    border-radius: 5px;
    margin: 0.4em; 
    transition: all 0.3s ease-out;
    background-color: var(--background-color);
    box-shadow: 0 0px 5px rgba(0,0,0,0.1), 0 0px 5px rgba(0,0,0,0.1);
}


@media screen and (min-width: 600px) { 
}


@media (min-width: 768px) { 
    .container {
        max-width: 1024px;
        margin: 0 auto;
    }
    .article-container {
        border-radius: 5px;
        display: flex;
        flex-wrap: wrap;
        align-items:stretch;
        justify-content:space-around; 
    }
    article  {
        border-radius: 5px;
        margin: 1em 0.2em; 
        transition: all 0.3s ease-out;
    }

    article:hover {
        transform: scale(1.001);
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }

    .article-contianer, .article {
        margin: 0; 
    }
}


@media screen and (min-width: 900px) { 
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

