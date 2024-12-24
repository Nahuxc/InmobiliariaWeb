
/* despliegue de la navegacion y dark mode */
const body = document.querySelector("body");
const modeToggle = body.querySelector(".mode-toggle");
const sidebarToggle = body.querySelector(".sidebar-toggle");
const sidebar = body.querySelector("nav");



const thumbnails = document.querySelectorAll(".thumbnail")


let getMode = localStorage.getItem("mode");
if(getMode && getMode === "dark"){
    body.classList.toggle("dark");
}


modeToggle.addEventListener("click", ()=>{
    body.classList.toggle("dark");
    if(body.classList.contains("dark")){
        localStorage.setItem("mode", "dark");
    }else{
        localStorage.setItem("mode", "light");
    }
});


sidebarToggle.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
});


thumbnails.forEach((thumb)=>{
    thumb.addEventListener("click", ()=>{
        /* cambiador de imagenes */
        const mainImg = document.querySelector(".mainImg");
        const imgActive = document.querySelector(".active");
        imgActive.classList.remove("active");
        thumb.classList.add("active");
        mainImg.src = thumb.src
    })
})