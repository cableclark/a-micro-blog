<template>
    <div>
       <button @click.prevent="open=!open" class="btn btn-primary mr-3 p-2 bd-highlight"> Insert Image </button>
       <transition name="show">
       <div v-if="open" class="drawer"> 

           <div class="image-container">
                <img 
                @click="addImages(image.path)" 
                v-for="image in images" 
                v-bind:key="image.name" 
                :src="image.path" 
                name="image.name" 
                class="drawer-image"> 
            </div>

            <button @click.prevent="open=!open"  class="btn btn-danger p-2 bd-highligh"  > Cancel </button>
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
                this.open=!this.open;

            }

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
  transition: transform .5s; 
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
  transform: translate(100vw);
}

</style>

