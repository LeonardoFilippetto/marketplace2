function selecionarPeca(checkbox){
    let maxQuant=document.querySelector("#max_quant_anunc").value
    if(checkbox.checked){
        if(maxQuant==1){
            document.querySelector("#input_id_anuncio_0").value=checkbox.id.replace("check_", "");
            document.querySelectorAll("input[type='checkbox']").forEach(checkboxInput =>{
                checkboxInput.checked=false;
            })
            checkbox.checked=true;
            document.querySelector("#submit_avancar").value="AVANÇAR"
        }

        
    } else{
        if(maxQuant==1){
            document.querySelector("#input_id_anuncio_0").value=""
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
        }
    }
    document.querySelector("#submit_avancar").disabled=!checkbox.checked
}