<template>
    <div>
       <button> Insert Image</button>
       <div class="drawer">
        <slot>

        </slot>
       </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
