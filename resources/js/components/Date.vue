<template>
        <div class="meta-text">
            {{formatedDate}} 
        </div>
</template>

<script>
import moment from 'moment';

    export default {
        props: [
            'date'
        ],
        mounted() {
            window.console.log("hey");
        },
        computed: {
            formatedDate () {
                return moment(this.date).locale('mk').format('Do MMMM, YYYY');
            }
        }
    }
</script>