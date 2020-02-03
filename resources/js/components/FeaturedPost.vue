<template>
    <div class="card">  
            <div class="card_img-contianer">
                <a v-bind:href="link">   
                    <img :src="image" alt="Card image cap">
                </a>
            </div>
    
            <div class="card__text">
               <transition appear> <p class="card__text__date">{{formatDate(post.created_at)}} </p></transition>  
                
                <transition appear><h2><a v-bind:href="link">{{post.title}} </a></h2></transition>  
                
                <transition appear><p v-html="text"> </p></transition>  
                <transition appear> <a v-bind:href="link"> <button> Прочитај</button> </a></transition>  
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

.v-enter-active, .v-leave-active {
    transition: all 0.5s ease-out 0.1s; 
}

.v-enter, .v-leave-to {
    opacity: 0;
    transform: translate(2vw);
}

.card {
    margin: 0.3em; 
    border-radius: 10px;
    padding:1em;
    box-shadow: 0 0px 5px rgba(0,0,0,0.1), 0 0px 5px rgba(0,0,0,0.1);
    background-color: var(--background-color);
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
    margin: auto 0;

}

  /* 600px
    768px
    900px
    1024px
    1200px */

 @media (min-width: 600px) { 

 }

 
@media (min-width: 768px) { 
    .card {
        display: flex;
        margin: 1em 0.5em;
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

 @media (min-width: 900px) { 
     
 }

  @media (min-width: 1024px) { 
     
 }

  @media (min-width: 1200px) {
        .card {
            padding: 3.3em;
            margin: 0;
            margin-top: 1em; 
        }

        h2 {
            font-size: 3.3em;
        }
}

</style>

