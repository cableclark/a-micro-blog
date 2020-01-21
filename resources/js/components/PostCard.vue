<template>
    <div class="card">
            <img class="card__image" :src="image" alt="Card image cap">
            <div class="card__text">
                <p class="card__text__date">{{formatDate(post.created_at)}} </p>
                <h2><a v-bind:href="link">{{post.title}}</a></h2>
                <div v-if="open" v-html="post.body"> </div>
                <a v-bind:href="link">
                    <img src="/images/more.svg" class="card__text__icon" alt="">
                </a>
            </div>
    </div>
</template>

<script>
import axios from 'axios';
import { EventBus } from './EventBus.js';
import moment from 'moment';

    export default {
        props: {
            post: Object
        },
        data: function () {
            return {
                open: false,

            }
        },

        computed: {
             image () {
                 return "/storage/" + this.post.featured_image;
             } ,
             link () {
                 return "/post/" + this.post.slug;
             }

        },

        methods: {
            formatDate (date) {
                   return moment(date).locale('mk').format('Do MMMM, YYYY');
            }
        }

    }

</script>

<style scoped>
.card {
    background-color: var(--background-color);
    margin-bottom: 1em; 
    border-radius: 5px;
}

.card__text {
    display: flex;
    flex-direction: column;
    padding: 1em;
    text-transform: uppercase;
}

.card__text__icon {
    float:right;
    width: 1.2em;
    padding-top:0.5em;
    cursor: pointer;
}

.card__text__date {
    font-family: var(--text-font);
    padding-left:0.3em;
    font-size: 0.7em;
}
.text {
    padding: 1em;
}

img {
    width: 100%;
     border-radius: 5px;
}

h2 {
    color: var(--headings-color); 
    font-family: var(--headings-font);
    font-size: 2em;
    padding: 0;
    margin:0;
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
    opacity:1;
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
   opacity: 0;
}

</style>

