<template>
    <div class="card">
            <a v-bind:href="link">
                <div class="card_img-contianer">
                    <img :src="image" alt="Card image cap">
                </div>
             </a>
            <div class="card__text">
                <p class="card__text__date">{{formatDate(post.created_at)}} </p>
                <a v-bind:href="link">
                    <h2>{{post.title}}</h2>
                    <div v-if="open" v-html="post.body"> </div>
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
                 return "/storage/" + this.post.tumbnail;
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
    padding-left:0.3em;
    font-size: 0.7em;
}
.text {
    padding: 1em;
}

.card_img-contianer {
    overflow: hidden;
    border-radius: 5px;
}

.show-enter-active, .show-leave-active {
    opacity:1;
}

.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
   opacity: 0;
}

</style>

