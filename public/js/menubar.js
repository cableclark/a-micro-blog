const menubtn=document.querySelector(".dashboard--button");
const menubar=document.querySelector(".dashboard--navbar");

menubtn.addEventListener("click",  function () {
     menubar.classList.toggle("dashboard--navbar__active")
})