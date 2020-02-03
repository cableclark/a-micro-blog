<template>
    <div>
       <div v-if="spinner" class="spinner"></div>
        <div class="article-container">
            <article v-for="post in pages" v-bind:key="post.id">
                <PostCard :post="post"></PostCard> 
            </article>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import PostCard from './PostCard.vue';
  
    export default {
        components:{
            PostCard
        },
        data: function () {
            return {
                page: 1,
                spinner: false,
                pages:[]
            }
        },
        methods: {
            scroll () {
                window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

                if (bottomOfWindow && this.page) {
                    this.spinner = true
                            
                    axios.get(`/ajaxPosts/` + this.page)
                    .then((response) => {
                        if (response.data.posts.length && this.page) {
                            this.pages.push(...response.data.posts);
                            this.page +=2; 
                            this.spinner = false;
                            setTimeout(
                               this.addClass, 0
                            )
                        } else {
                            this.spinner = false;
                            this.page = false;
                            } 
                        });
                    }
                };
            },
            addClass() {
                this.postToggler = true;
            }
         },
        mounted() {
            this.scroll();
        }
    }
</script>

<style>

.spinner {
    border: 1px solid var(--headings-color);
    border-left: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    margin: 0 auto;
    animation: rotate 500ms ease-out 0s infinite forwards;
}

@keyframes rotate {
    from {transform: rotate(0deg)}
    to {transform: rotate(360deg)}
}

</style>

