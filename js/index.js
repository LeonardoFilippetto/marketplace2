function pagAnunc(e){
    let id =""
    let element = e.target
    if(element.nodeName=="INPUT"){
        return
    }
    if(element.nodeName=="FORM"||element.nodeName=="SPAN"||element.className=="img_anunc"){
        id = element.parentNode.id
    }else if(element.nodeName=="IMG"){
        id = element.parentNode.parentNode.id
    }else if(element.nodeName=="DIV"){    
        id = element.id
    }
    console.log(id)
    if(id!="")
        window.location.href = "anuncio.php?id_anunc="+id;
}