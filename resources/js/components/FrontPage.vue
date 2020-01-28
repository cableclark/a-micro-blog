<template>
    <div class="container">
       <transition-group appear name="show">
           <FeaturedPost :post="published.firstPost" v-bind:key="published.firstPost.id"></FeaturedPost>
            <div class="article-container" v-bind:key="divKey">
            <article v-for="post in published.posts"  v-bind:key="post.id">
                <PostCard :post="post"></PostCard> 
            </article>
            </div>
       </transition-group>
    </div>
</template>

<script>
    import axios from 'axios';
    import PostCard from './PostCard.vue';
    import FeaturedPost from './FeaturedPost.vue';

    export default {
        components: {
            PostCard,
            FeaturedPost
        },
        data: function () {
            return {
                open: false,
                published: [],
                errors:[],
                divKey:"heyholetsgo"
            }
        },
        created() {
            axios.get(`/getPosts`)
                .then(response => {
                // JSON responses are automatically parsed.
                this.published= response.data;
                })
                .catch(e => {
                    this.errors.push(e)
             })
        }
    }
</script>

<style>

.show-enter-active, .show-leave-active {
  transition: transform .3s; 
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translate(100vw);
}

@media (min-width: 768px) { 
    .container {
        max-width: 1024px;
        margin: 0 auto;
    }

    .article-container {
        margin: 0 auto;
        display: flex;
        flex-direction: row;
        align-items: stretch;
        justify-content:space-evenly;
        flex-wrap: wrap;
        
    }
    article  {
        background-color: var(--background-color);
        margin-bottom: 1em; 
        transition: all 0.3s ease-out;
    }

    article:hover {
        transform: scale(1.001);
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
}

</style>

