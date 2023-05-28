let busca = document.querySelector("#busca");
let lupa = document.querySelector("#lupa");

busca.addEventListener("keyPress",(e)=>{
    if(e.key=="Enter" && busca.value!=""){
        document.querySelector("#frm_busca").submit();
    }
})
lupa.addEventListener("click",(e)=>{
    if(busca.value!=""){
        document.querySelector("#frm_busca").submit();
    }
})