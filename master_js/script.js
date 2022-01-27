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

// delete verfication

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


var targetNode = document.querySelector(".content");
var config = { attributes: true, childList: true };
var callback = function() {
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
let editBtn = document.querySelectorAll("#edit");
for (let i = 0; i < editBtn.length; i++) {
    editBtn[i].addEventListener('click',function(e){
        let noteID = e.currentTarget.parentNode.getAttribute("noteId")
        let title_input = e.currentTarget.parentNode.parentNode.querySelector(".title_note input")
        let body_input = e.currentTarget.parentNode.parentNode.querySelector(".main_note textarea")
        let editLogo=e.currentTarget.querySelector("img");
        let edit=editLogo.getAttribute("edit")
        if(edit == "false"){
            editLogo.src = "../assets/done_black_24dp.svg"
            title_input.removeAttribute('disabled')
            body_input.removeAttribute('disabled')
            editLogo.setAttribute("edit","true");
        }else if(edit == "true") {
            let title = title_input.value
            let body = body_input.value
            $(function(){
            $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"update"+'&noteId='+noteID+'&titleNote='+title+'&bodyNote='+body+'&userId='+userID
              }).done(function (res){
                if(res){
                    $(".content").html(res);
                 
                }
                 
             })  
        })
    }
     
          
    })
    
}

};
var observer = new MutationObserver(callback);
observer.observe(targetNode, config);


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
// for the search

let search = document.querySelector("#search");
search.addEventListener("keyup",function(){
    let title = search.value;
    $(function(){
        if(title.length>0){
            
            $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"search"+'&title='+title+'&userId='+userID
              }).done(function (res){
                $(".content").empty();
                $(".content").html(res);
                 
             })  
}else{
    $.ajax({
        type: 'POST',
        url:'../auth/userFun.inc.php',
        data:'what='+"display"+'&userId='+userID
      }).done(function (res){
        $(".content").empty();
        $(".content").html(res);
         
     })  

}})
}
)

// for edit button
let editBtn = document.querySelectorAll("#edit");
for (let i = 0; i < editBtn.length; i++) {
    editBtn[i].addEventListener('click',function(e){
        let noteID = e.currentTarget.parentNode.getAttribute("noteId")
        let title_input = e.currentTarget.parentNode.parentNode.querySelector(".title_note input")
        let body_input = e.currentTarget.parentNode.parentNode.querySelector(".main_note textarea")
        let editLogo=e.currentTarget.querySelector("img");
        let edit=editLogo.getAttribute("edit")
        if(edit == "false"){
            editLogo.src = "../assets/done_black_24dp.svg"
            title_input.removeAttribute('disabled')
            body_input.removeAttribute('disabled')
            editLogo.setAttribute("edit","true");
        }else if(edit == "true") {
            let title = title_input.value
            let body = body_input.value
            $(function(){
            $.ajax({
                type: 'POST',
                url:'../auth/userFun.inc.php',
                data:'what='+"update"+'&noteId='+noteID+'&titleNote='+title+'&bodyNote='+body+'&userId='+userID
              }).done(function (res){
                if(res){
                    $(".content").html(res);
                 
                }
                 
             })  
        })
    }
     
          
    })
    
}
let allFav = document.querySelector('#favoritesOnly');
allFav.addEventListener('click',function(){
   $(function(){
    $.ajax({
        type: 'POST',
        url:'../auth/userFun.inc.php',
        data:'what='+"allFav"+'&userId='+userID
      }).done(function (res){
        if(res){
            $(".content").empty();
            $(".content").html(res);
         
        }
         
     })  
   })
})
let allArch = document.querySelector("#archivedOnly");
allArch.addEventListener('click',function(){
    $(function(){
        $.ajax({
            type: 'POST',
            url:'../auth/userFun.inc.php',
            data:'what='+"allArchived"+'&userId='+userID
          }).done(function (res){
            if(res){
                $(".content").empty();
                $(".content").html(res);
             
            }
             
         })  
       })
})

let allNotes = document.querySelector("#allNotes");
allNotes.addEventListener('click',function(){
    $(function(){
        $.ajax({
            type: 'POST',
            url:'../auth/userFun.inc.php',
            data:'what='+"allNotes"+'&userId='+userID
          }).done(function (res){
            if(res){
                $(".content").empty();
                $(".content").html(res);
             
            }
             
         })  
       })

})
let settings = document.querySelector("#ss");
settings.addEventListener('click',function(){
    // let btnAdd = document.querySelector('.toAdd');
    // btnAdd.classList.add('ff');
    $(function(){
        $.ajax({
            type: 'POST',
            url:'../auth/userFun.inc.php',
            data:'what='+"settings"+'&userId='+userID
          }).done(function (res){
            if(res){
                $(".content").empty();
                $(".content").html(res);
                let submitt = document.querySelector("#submit");
                submitt.addEventListener('click',function(){
                $(function(){
                let username = document.querySelector("#userName").value;
                let lastname = document.querySelector("#lastName").value;
                let firstname = document.querySelector("#firstName").value;
                let email = document.querySelector("#email").value;
                let fd = new FormData();
                let img = $("#photo")[0].files[0];
                if(img){
                    fd.append('file',img)
                }
                fd.append('userName',username)
                    fd.append('firstName',firstname)
                    fd.append('lastName',lastname)
                    fd.append('email',email)
                    fd.append('userId',userID)
                    fd.append('what',"updateUserInfo")
                $.ajax({
                    type: 'POST',
                    url:'../auth/userFun.inc.php',
                    data:fd,
                    contentType: false,
                    processData: false
                    
                }).done(function (res2){
                    if(res2){
                        $(".content").html(res2);
                    }
                })
            
                })
            })
             
            }
             
         })  
       })
      

})

