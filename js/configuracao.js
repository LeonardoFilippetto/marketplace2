function selecionarPeca(checkbox){
    let maxQuant=document.querySelector("#max_quant_anunc").value
    if(checkbox.checked){
        if(maxQuant==1){
            document.querySelector("#input_id_anuncio_0").value=checkbox.id.replace("check_", "")
            document.querySelectorAll("input[type='checkbox']").forEach(checkboxInput =>{
                checkboxInput.checked=false;
            })
            checkbox.checked=true;
            document.querySelector("#submit_avancar").value="AVANÇAR"

            let indiceAnuncio = checkbox.id.replace("check", "preco")

            document.querySelector("#preco_anunc").value=stringNumero(document.querySelector(indiceAnuncio).value)
            document.querySelector("#subtotal").value=numeroString(stringNumero(document.querySelector("#subtotal").value)+stringNumero(document.querySelector(indiceAnuncio).value))

        }

        
    } else{
        if(maxQuant==1){
            document.querySelector("#input_id_anuncio_0").value=""
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
        }
    }
    document.querySelector("#submit_avancar").disabled=!checkbox.checked
}

function numeroString(n){
    
}

function stringNumero(s){
    s = text.replace(/./g, "")
    return parseFloat(text.replace(/,/g, "."))   
}