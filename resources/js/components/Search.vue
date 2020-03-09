<template>
    <div>
        <div @click="active = !active, passive = !passive" class="search">
            <p>ПРЕБАРАЈ</p>
            <img class="search" src="/images/search.svg"/>
        </div>
        <transition>
            <div class="search--form" @click.self="passive = !passive, active = !active" :class="{ searchActive:active, searchPassive:passive}" ref="search">
            <form method="POST" action="/search">
                <input type="hidden"  name="_token" :value="csrf">
                <input type="text" name="search" autofocus>
                <button for="search">Барај</button>
            </form>
            </div>
         </transition>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                active: false,
                passive: true,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
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
    align-items: center;
    justify-content:space-between;
    border: 1px solid var(--headings-color);
    padding: 1.3em;
    transform: translateX(-0.17em);
}

.search img {
    display:none;
}

.search--form {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    background-color: var(--background-color);
    width: 100vw;
    height: 100vh;
    margin:0;
    padding: 0;
    left: 0px;
    top: 0px;
    opacity: 0;
    transition: all 1s ease-in;
}

.search--form form {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    
}

.search--form input {
    border-radius: 5px;
    border: 1px solid var(--headings-color); 
    width: 350px;
    height: 50px;
    margin-bottom: 20px;
}

.search p {
    margin: 0;
    transform: translateX(-0.17em);
    
}

.searchActive {
    z-index: 111;
    opacity: 1;
    transition: all 0.5s ease-out;
}

.searchPassive {
    z-index: -111;
    transform: translateY(-100vh);
    opacity: 0;
    transition: all 0.5s ease-in;
}

@media screen and (min-width: 600px) { 
}

@media (min-width: 768px) { 
.search {
    border: 1px solid var(--headings-color);
    border-radius: 5px;
    transform: translateX(0em);
    transition: all 0.5s ease-out;
    padding: 0.5em 1em ;
}

.search p {
     margin-left: 1.1em;
}

.search:hover {
    cursor: pointer;
}

.search img {
    display: block;
    width: 13px;
    border:unset;
    box-shadow: unset;
}

.search--form {

}

}

@media screen and (min-width: 900px) { 
}

@media screen and (min-width: 1024px) { 

}
@media screen and (min-width: 1200px) { 
 
}

</style>