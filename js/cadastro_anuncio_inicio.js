function mostrarUso(e){
    let input = e.target;
    if(input.id=="usado"){
        document.querySelector("#div_tempo_uso").style.display="block";
        document.querySelector("#sel_tempo_uso").required=true;
    } else{
        document.querySelector("#div_tempo_uso").style.display="none";
        document.querySelector("#sel_tempo_uso").required=false;
    }
}