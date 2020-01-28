<template>
    <div class="card">  
            <div class="card_img-contianer">
                <a v-bind:href="link">   
                    <img :src="image" alt="Card image cap">
                </a>
            </div>
    
            <div class="card__text">
                <p class="card__text__date">{{formatDate(post.created_at)}} </p>
                <h2><a v-bind:href="link">{{post.title}} </a></h2>
                <p v-html="text"> </p>
                <a v-bind:href="link"> <button> Прочитај</button> </a>
            </div>
    </div>
</template>

<script>
import moment from 'moment';
    export default {
        props: {
            post: Object
        },
        computed: {
             image () {
                 return "/storage/" + this.post.tumbnail;
             } ,
             link () {
                 return "/post/" + this.post.slug;
             },
            text () {
                return this.post.body.replace(/(<([^>]+)>)/ig,"").slice(0, 300) + "...";
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
    padding:0.5em;
}

.card__text {
    display: flex;
    flex-direction: column;
    padding: 1em;
    align-self:center;
}

.card__text__date {
    padding-left:0.3em;
    font-size: 0.7em;
    text-transform: uppercase; 
}
.text {
    padding: 1em;
}

.card_img-contianer {
    overflow: hidden;
    border-radius: 5px;
}


@media (min-width: 768px) { 
    .card {
        display: flex;
        margin: 0 auto;
        padding:1em;
        margin-bottom: 1em;
        transition: all 0.3s ease-out;
    }

    h2 {
        font-size: 2.6em;
        margin-bottom: 5px;
    }
    .card__text {
      flex-grow: 1;
      max-width: 500px;
      padding:initial;
      padding-left: 15px;
      margin: 1em;
    }
    .card_img-contianer {
        flex-grow: 5;
    }
    .card__text__date {
        font-size: 0.8em;
    }

}

</style>

