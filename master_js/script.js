var add_note = document.querySelector(".toAdd button");
var overlay = document.querySelector(".overlay");
var writenote = document.querySelector(".write-note");
add_note.addEventListener('click',function(){
    if(overlay.classList.contains("add-note-interface") == true && writenote.classList.contains("add-note-interface") == true){
        overlay.classList.remove("add-note-interface");
        writenote.classList.remove("add-note-interface");
    }else{
        overlay.classList.add("add-note-interface");
        writenote.classList.add("add-note-interface");
    }
})
overlay.addEventListener('click',function(){
    overlay.classList.remove("add-note-interface");
    writenote.classList.remove("add-note-interface");
})

// delete verficztion

let overlay2 = document.querySelector(".overlay2");
let cancel = document.querySelector(".cancel");
let delete_note = document.querySelector(".delete-note");

overlay2.addEventListener('click',function(){
    overlay2.classList.remove("to_display");
    delete_note.classList.remove("to_display");
})
cancel.addEventListener('click',function(){
    overlay2.classList.remove("to_display");
    delete_note.classList.remove("to_display");
})

let note = document.querySelectorAll(".note");
note.forEach(element => {
    let e = element.addEventListener("mouseenter", function(e){
        e.target.querySelector(".note_header").style.opacity = "1";
});
})
note.forEach(element => {
    element.addEventListener("mouseleave", function(e){
    e.target.querySelector(".note_header").style.opacity = "0";
});
})

let favBtn = document.querySelectorAll("#fav");
for(let i = 0;i < favBtn.length;i++){
    favBtn[i].addEventListener('click',function(e){
       let noteID = e.currentTarget.parentNode.getAttribute("noteID");  
        let url = "../auth/userFun.inc.php";
        let data = {
            what : "true",
            ID : noteID
        }
        const otherpram = {
            body : data,
            method : "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
              }
        }
        fetch(url,otherpram)
        .then(res =>console.log(res.text));
        })
}
