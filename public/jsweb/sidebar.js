document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)
    
    // Validate that all variables exist, en español:
    // 
    if(toggle && nav&& bodypd && headerpd ){ // si todos los elementos existen
    toggle.addEventListener('click', ()=>{ // si se hace click
    // show navbar
    nav.classList.toggle('show') // mostrar o ocultar la barra de navegación en el caso de que la barra de navegación no exista
    // change icon
    toggle.classList.toggle('bx-x') // cambiar el icono 
    // add padding to body
    bodypd.classList.toggle('body-pd') // agregar padding al body
    // add padding to header
    headerpd.classList.toggle('body-pd') // agregar padding al header
    })
    }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header') // mostrar la barra de navegación
    
    /*===== LINK ACTIVE =====*/
    const linkColor = document.querySelectorAll('.nav_link')
    
    function colorLink(){
    if(linkColor){
    linkColor.forEach(l=> l.classList.remove('active'))
    this.classList.add('active')
    }
    }
    linkColor.forEach(l=> l.addEventListener('click', colorLink))
    
     // Your code to run since DOM is loaded and ready
    });