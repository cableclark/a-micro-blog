<template>
  <div>
    <trumbowyg  :config="config" class="form-control" name="body" v-html="title">
      {{title}}
      </trumbowyg>
  </div>
</template>

<script>  
  // Import this component
  import Trumbowyg from 'vue-trumbowyg';
  
  // Import editor css
  import 'trumbowyg/dist/ui/trumbowyg.css';
   
  export default {    
    props: [
      "title"
    ],
    data () {
      return {
        content: "",
        config: {
          // Get options from 
          // https://alex-d.github.io/Trumbowyg/documentation
        }       
      }
    },
    components: {
      Trumbowyg
    }
  }
</script>