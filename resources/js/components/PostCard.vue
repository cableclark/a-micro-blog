<template>
    <transition-group appaer name="show">
        <div class="card" v-bind:key="post.id">
            <div class="card_img-contianer">
                <a v-bind:href="link"> <img :src="image" alt="Card image cap"> </a>
            </div>
            <div class="card__text">
                <p class="card__text__date">{{formatDate(post.created_at)}} </p>
                <a v-bind:href="link">
                    <h2>{{post.title}}</h2>
                    <div v-if="open" v-html="post.body"> </div>
                </a>
            </div>
        </div>
    </transition-group>
</template>

<script>

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
.show-enter-active, .show-leave-active {
    transition: all .2s ease-in; 
}
.show-enter, .show-leave-to /* .fade-leave-active below version 2.1.8 */ {
    opacity: 0;
    transform: translate(15vw);
}
.card {
    background-color: var(--background-color);
    margin-bottom: 1em; 
    border-radius: 10px;
    margin: 0.3em; 
    padding:1.3em 1em; 
    display: flex;
    flex-direction: column;
}
img {
    width: 100%;
} 
.card__text {
    display: flex;
    flex-direction: column;
    padding: 1em;
    text-transform: uppercase;
}
.card__text__date {
    font-size: 0.7em;
    margin-top: 1.5em; 
}
.text {
    padding: 1em;
}

h2 {
    font-size: 2em;
}
.card_img-contianer {
    overflow: hidden;
    border-radius: 5px;
}

@media (min-width: 600px) { 
    .card {
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        padding: 1.2em;

    }
    h2 {
        font-size: 1.4em;
        margin-bottom: 5px;
    }
    .card__text {
      padding:initial;
    }
    .card_img-contianer {
        margin: 0;
    }
    button {
        float: right;
    }
}

@media screen and (min-width: 768px) { 
    
}

@media screen and (min-width: 900px) { 
}

@media screen and (min-width: 1024px) { 

}
@media screen and (min-width: 1200px) { 
    
}

</style>

