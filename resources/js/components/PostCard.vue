<template>
    <div class="card" style="width: 18rem;">
            <h2>{{post.title}}</h2>
             <img class="card-img-top" :src="image" alt="Card image cap">
            <p>{{post.created_at}} </p>
            <div v-if="open" v-html="post.body"> </div>
            <button @click="toggle()">{{button}}</button>
            
    </div>
</template>

<script>
import axios from 'axios';
import { EventBus } from './EventBus.js';

    export default {
        props: {
            post: Object
        },
        data: function () {
            return {
                open: false,
                button: "Read more..."
            }
        },

        computed: {
             image () {
                 return "http://127.0.0.1:8000/storage/" + this.post.featured_image;
             }   

        },
        methods: {
            
            toggle() {
                this.open = !this.open;
                this.open ? this.button = "Close": this.button = "Read more..."

            }

        }
    }

</script>

<style>


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
    opacity:1;
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
   opacity: 0;
}

</style>

