<template>
    <div>
        <div class="search">
            <p>ПРЕБАРАЈ</p>
            <img class="search" src="/images/search.svg"/>
        </div>
        <div class="search--form" ref="search">
        <form method="POST" action="">
            <input type="text" name="search">
            <label for="search">Барај</label>
        </form>
        </div>
    </div>
</template>

<script>
    export default {
          mounted() {
            document.body.appendChild(this.$refs.search);
        } 
    }
</script>

<style>
.search {
    display: flex;
    width: 130px;
    align-items: center;
    justify-content:space-between;
    border: 1px solid var(--headings-color);
    padding: 1em;
}

.search img {
    display:none;
}

.search p {
    margin: 0;
    transform: translateX(-0.2em);
}

.search--form {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content:center;
    background-color: var(--background-color);
    width: 100vw;
    height: 200px;
    margin:0;
    padding: 0;
    left: 0px;
    top: 0px;
    z-index: 111;
}

@media screen and (min-width: 600px) { 
}

@media (min-width: 768px) { 
.search {
    border: 1px solid var(--headings-color);
    border-radius: 5px;
   
    transition: all 0.3s ease-out;
    padding: 0.5em;
}

.search:hover {
    transform: scale(1.001);
    cursor: pointer;
}

.search img {
    display: block;
    width: 13px;
    border:unset;
    box-shadow: unset;
}

}

@media screen and (min-width: 900px) { 
}

@media screen and (min-width: 1024px) { 

}
@media screen and (min-width: 1200px) { 
 
}

</style>