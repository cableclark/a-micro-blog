<template>
    <div>
        <div @click="active = !active" class="search">
            <p>ПРЕБАРАЈ</p>
            <img class="search" src="/images/search.svg"/>
        </div>
        <transition>
            <div class="search--form" :class="{ searchActive:active}" ref="search">
            <form method="POST" action="">
                <input type="text" name="search">
                <label for="search">Барај</label>
            </form>
            </div>
         </transition>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                active: false
            }
        },
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
    background-color: var(--background-color);
    width: 100vw;
    height: 200px;
    margin:0;
    padding: 0;
    left: 0px;
    top: 0px;
    display: none;
}

.searchActive {
    display: block;
    display: flex;
    align-items: center;
    justify-content: center;
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