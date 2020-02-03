<template>

    <footer>
        <p> Copyright &copy; {{year}} Miss Albini</p>
    </footer>

</template>    

<script>
export default {
    computed: {
        year () {
            let data  = new Date();
            return data.getFullYear();
        }
    }
}
</script>

<style scoped>

    footer {
        background-color: var(--headings-color);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        height: 100px;
    }
    
</style>   