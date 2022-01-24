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
//  for favorite traitement
let favBtn = document.querySelectorAll("#fav");
for(let i = 0;i < favBtn.length;i++){
favBtn[i].addEventListener('click',function(e){
 let noteID = e.currentTarget.parentNode.getAttribute("noteID");  
 let favLogo=e.currentTarget.querySelector("img");
let fav=favLogo.getAttribute("favorite");
$(function(){
        if(fav == "false"){
        
            $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"fav"+'&noteId='+noteID
              }).done(function (res){
                  if(res){      
                       favLogo.src = "../assets/favorite_black_24dp.svg";
                       favLogo.setAttribute("favorite","true");
                   }
                 
             })  
        }else if(fav == "true"){
                    $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"unfav"+'&noteId='+noteID
              }).done(function (res2){
                  if(res2){      
                       favLogo.src = "../assets/favorite_border_black_24dp.svg";
                       favLogo.setAttribute("favorite","false");
                    }
                 
             })  
        }
      })
})}

// for delete btn
let delBtn = document.querySelectorAll("#del");
for(let i = 0;i < delBtn.length;i++){
    delBtn[i].addEventListener('click',function(e){
       let noteID = e.currentTarget.parentNode.getAttribute("noteID");  
        overlay2.classList.add('to_display');
             delete_note.classList.add('to_display');
           let in_his = document.querySelector('#to_be_delete');
           in_his.setAttribute('value', noteID);

    })
    
    }
// for archived btn
let archBtn = document.querySelectorAll('#arch');
for (let i = 0; i < archBtn.length; i++) {
   archBtn[i].addEventListener('click',function(e){
    let noteID = e.currentTarget.parentNode.getAttribute("noteID");
    let archiLogo=e.currentTarget.querySelector("img");
    let arch=archiLogo.getAttribute("archieved");
    $(function(){
        if(arch == "false"){
            $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"arch"+'&noteId='+noteID
              }).done(function (res){
                  if(res){      
                       archiLogo.src = "../assets/unarchive_black_24dp.svg";
                       archiLogo.setAttribute("archieved","true");
                   }
                 
             })  
        }else if(arch == "true"){
            $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"unarch"+'&noteId='+noteID
              }).done(function (res2){
                  if(res2){      
                       archiLogo.src = "../assets/archive_black_24dp.svg";
                       archiLogo.setAttribute("archieved","false");
                    }
                 
             })  
        }
   })
    
})
}