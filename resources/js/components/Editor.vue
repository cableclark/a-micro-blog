<template>
  <div>
    <trumbowyg  
        :value="content" 
        :config="config" 
        v-model="content"
        class="form-control" 
        name="body">
        <slot> </slot>
     </trumbowyg>
  </div>
</template>

<script>  
  import Trumbowyg from 'vue-trumbowyg';
  import 'trumbowyg/dist/ui/trumbowyg.css';
  import { EventBus } from './EventBus.js';
   
  export default {    
    props: [
      "name",
      "value"
    ],
    data () {
      return {
        config: {
          // Get options from 
          // https://alex-d.github.io/Trumbowyg/documentation
        },
        content: this.value      
      }
    },
    components: {
      Trumbowyg
    },  
    mounted() {
        EventBus.$on('addImages', (name) => {
          this.content +=`<img src="${name}" class="img-fluid">`;
        })
      }
  }
</script>