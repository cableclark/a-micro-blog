<template>
    <div>
       <button @click.prevent="open=!open"> Insert Image </button>
       <transition name="show">
       <div v-if="open" class="drawer" > 
            <img 
            @click="addImages(image.path)" 
            v-for="image in images" 
            v-bind:key="image.name" 
            :src="image.path" 
            name="image.name" 
            class="drawer-image"> 
       </div>
       </transition>
    </div>
</template>

<script>
import axios from 'axios';
import { EventBus } from './EventBus.js';

    export default {
        data: function () {
            return {
                open: false,
                images: []
            }
        },
        created() {
            axios.get(`http://127.0.0.1:8000/getimages`)
                .then(response => {
                // JSON responses are automatically parsed.
                response.data.forEach ((item) => {
                    item.path = "/storage/" + item.path;
                })
                this.images = response.data
                // console.log(response)
                })
                .catch(e => {
                    this.errors.push(e)
             })
     },
        methods: {
            insert (path) {
                window.console.log(path);
            },
          
            addImages(image) {
            // Send the event on a channel (i-got-clicked) with a payload (the click count.) 
                EventBus.$emit('addImages', image);
            }

        }
    }

</script>

<style>
.drawer {
    background-color:black;
    position: absolute;
    top: 0;
    left: 90vw;
    width: 10vw;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color:white;
}

.drawer-image {
    width: 90%;
    margin: 1rem;
}

.show-enter-active, .show-leave-active {
  transition: transform .5s; 
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translate(30vw);
}

</style>

