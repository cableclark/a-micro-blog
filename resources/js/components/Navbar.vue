<template>
<nav class="navbar">

    <a href="/"><div class=navbar__logo> Miss Albini's music diary</div></a>

    <div @click="open=!open" class="navbar__toggler">Мени</div>

    <transition name="menu">
    
        <ul @click="open=!open" v-if="open" class="navbar__menu">
            <li class="navbar__item navbar__menu__heading">Навигација</li>
            
            <a class="navbar__item" href="/"> <li>Текстови</li></a>

            <a class="navbar__item" href="/about"> <li>За мене</li></a>
            
            <a class="navbar__item" href="/contact"> <li>Контакт</li></a>

        </ul >

     </transition>
            
</nav>

</template>    

<script>
    export default {
        data: function () {
            return {
                open: false,
            }
        }
    }
</script>

<style> 

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5em;
}
.navbar__logo {
    color: var(--headings-color); 
    font-family: var(--headings-font)
}

.navbar__toggler {
    border: 1px solid black; 
    font-family: var(--text-font);
    padding: 0.4em 1.3em;
    cursor: pointer;
    border-radius: 5px;
}

.navbar__menu {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    position:absolute;
    list-style-type: none;
    background-color: var(--background-color);
    width: 100vw;
    height: 100vh;
    margin:0;
    padding: 0;
    top:0;
    left: 0;
    background-color: var(--dark-background-color);
}

.navbar__item {
    font-family: var(--text-font);
    margin: 0.6em;
    text-decoration: none;
    font-size: 1.3em;
    color: var(--background-color);

}

.navbar__menu__heading {
    font-family: var(--text-font);
    color: var(--headings-color); 
    font-size: 1em;
    justify-self:left;
    flex-basis: 10em;
}

.menu-enter-active, .menu-leave-active {
  transition: opacity .5s;
}
.menu-enter, .menu-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

    
</style>