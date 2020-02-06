<template>
    <nav class="navbar">
            <div class=navbar__logo> <a href="/">Miss Albini's music diary</a></div>
            <div @click="open=!open" class="navbar__toggler">Мени</div>
            <transition name="menu">
                <ul @click="open=!open" :class="{ active:open}" class="navbar__menu" >
                    <li class="navbar__item navbar__menu__heading">Навигација</li>
                    <a class="navbar__item" href="/"> <li> БЛОГ</li> </a>
                    <a class="navbar__item" href="/about"> <li>ЗА МЕНЕ</li></a>
                    <a class="navbar__item" href="/contact"> <li>КОНТАКТ</li></a>
                    <search class="navbar__item "></search>
                </ul> 
            </transition>   
                
    </nav>
</template>    

<script>
import search from "./Search.vue";

    export default {
        components:{
            search
        },
        data : function () {
            return { 
                open: false
            }
        }      
    }
</script>

<style> 
.navbar {
    position: sticky;
    top:0;  
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5em;
    z-index: 150;
    height: 10px;
    background-color:white;
    z-index: 100;
    box-shadow: 0 0px 5px rgba(0,0,0,0.1), 0 0px 5px rgba(0,0,0,0.1);
}
.navbar__logo {
    color: var(--headings-color); 
    font-family: var(--headings-font)
}
.navbar__toggler {
    color: var(--headings-color); 
    font-family: var(--text-font);
    padding: 0.4em 1.3em;
    cursor: pointer;
    border-radius: 5px;
    border: 1px solid var(--headings-color); 
    background-color: var(--headings-color); 
    color: white;
}
.navbar__menu {
    position:absolute;
    list-style-type: none;
    width: 100%;
    height: 100vh;
    margin:0;
    padding: 0;
    top:0;
    left: 0;
    letter-spacing: 0.3em;
    background-color: var(--dark-background-color);
    display: none;
}
.active {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    z-index: 110;
}

.navbar__item {
    font-family: var(--text-font);
    margin: 2em;
    text-decoration: none;
    font-size: 1.3em;
    color: var(--background-color); 
    transition: all 0.3s ease-out;
    opacity: 0;
    animation: Navintro 0.3s ease-out forwards;
}

.navbar__item:nth-of-type(1) {
    animation-delay: 50ms;
}

.navbar__item:nth-of-type(2) {
    animation-delay: 100ms;
}

.navbar__item:nth-of-type(3) {
    animation-delay: 150ms;
}

@keyframes Navintro{
    0% {opacity: 0; transform: translate(20px)}
    100%{opacity:100;transform: translate(0px)}

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


@media screen and (min-width: 600px) { 
    .navbar__menu {
        font-size: 0.9em;
     }
}

@media (min-width: 868px) { 
    .navbar {
        justify-content: space-around;
        margin: 0 auto;
        position: sticky;
        top:0;  
        background-color:white;
        z-index: 100;
        height: 20px;
        box-shadow: 0 0px 5px rgba(0,0,0,0.1), 0 0px 5px rgba(0,0,0,0.1);
    }
    .navbar__logo {
        font-size: 1.3em;
      
    }
     .navbar__logo a {
        color: var(--headings-color); 
    }
    .navbar__toggler {
        display: none;
    } 
    .navbar__menu {
        font-size: 0.9em;
        position:unset;
        display: flex;
        flex-direction: row;
        list-style-type: none;
        flex-basis: 1;
        height: 20px;
        transform: translateY(2px);
        width:unset;
        margin:0;
        padding: 0;
        top:0;
        left: 0;
        align-items: center;
        background-color:white;
    }
    .navbar__item {
        font-family: var(--text-font); 
        font-weight: 100;
        margin: 0 0.4em ;
        text-decoration: none;
        font-size: 0.8em;
        color: var(--headings-color); 
        padding: 0.8em 1.2em;
        transition: all 0.3s ease-out;
    }


    .navbar__menu__heading {
        display:none;
    }

}

@media screen and (min-width: 900px) { 
    .navbar__menu {
        font-size: 1em;
    }
}

@media screen and (min-width: 1024px) { 

}
@media screen and (min-width: 1200px) { 
 
}

</style>