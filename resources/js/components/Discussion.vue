<template>
    <div class="discussion">
       <a href="#dicussion"> 
           <button @click="open=!open"> {{comments}} Коментари </button>
        </a>

        <transition name = "fade">
            <div id="dicussion" v-if="open">
                <slot ></slot>
            </div>
        </transition>
       
    </div>
</template>

<script>
    export default {
        props: [
            "comments"
        ],

        data: function () {
            return {
                open: false
            }    
        },

    }
</script>

<style scoped>

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}


</style>
