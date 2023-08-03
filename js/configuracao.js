function selecionarPeca(checkbox){
    if(checkbox.checked){
        document.querySelector("#input_id_anuncio").value=checkbox.id.replace("check_", "");
        document.querySelectorAll("input[type='checkbox']").forEach(checkboxInput =>{
            checkboxInput.checked=false;
        })
        checkbox.checked=true;
        document.querySelector("#submit_avancar").value="AVANÇAR"
    } else{
        document.querySelector("#input_id_anuncio").value=""
        document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
    }
    document.querySelector("#submit_avancar").disabled=!checkbox.checked
}