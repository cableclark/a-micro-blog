<template>
  <div>
    <trumbowyg  
        :value="content" 
        :config="config" 
        class="form-control" 
        name="body">
     </trumbowyg>
  </div>
</template>

<script>  
  // Import this component
  import Trumbowyg from 'vue-trumbowyg';
  // Import editor css
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
          this.content = this.content + `<img src="${name}">`;
        })
    
      }
  }
</script>