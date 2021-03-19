document.querySelectorAll(".modal-container img").forEach(el=>{
    el.addEventListener("click",function(ev){
        ev.stopPropagation();
        this.parantNode.classList.add("active");
    })
});

document.querySelectorAll(".modal-container img").forEach(el=>{
    el.addEventListener("click",function(ev){
        this.classList.remove("active");
        console.log("Click");
    })
})