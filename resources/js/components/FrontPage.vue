<template>
    <div>
       <transition-group appear name="show">
           <div v-for="post in published.posts" v-bind:key="post.id">
              <PostCard :post="post"></PostCard>
           </div>
       </transition-group>
    </div>
</template>

<script>
    import axios from 'axios';
    import PostCard from './PostCard.vue';

    export default {
        components: {
            PostCard
        },
        data: function () {
            return {
                open: false,
                published: [],
                errors:[]
            }
        },
        created() {
            axios.get(`/getPosts`)
                .then(response => {
                // JSON responses are automatically parsed.
                window.console.log(response.data)
                this.published= response.data;
                })
                .catch(e => {
                    this.errors.push(e)
             })
     },
        methods: {

        }
    }

</script>

<style>
.drawer {
    background-color: rgba(12,12,12, 0.8);
    position: absolute;
    top: 0;
    left: 0vw;
    width: 100vw;
    height: 100vh;
    color:white;
    display: flex;
    z-index: 100000000;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
}

.drawer-image {
    width: 150px;
    margin: 1rem;
}

.show-enter-active, .show-leave-active {
  transition: transform .3s; 
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translate(100vw);
}

</style>

