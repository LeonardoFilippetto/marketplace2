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

            let indiceAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_0").value=stringNumero(document.querySelector(indiceAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector(indiceAnuncio).innerHTML))

        }else{
            
        }

        
    } else{
        if(maxQuant==1){
            document.querySelector("#input_id_anuncio_0").value=""
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
            
            let indiceAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_0").value-=stringNumero(document.querySelector(indiceAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)-stringNumero(document.querySelector(indiceAnuncio).innerHTML))

        }
    }
    document.querySelector("#submit_avancar").disabled=!checkbox.checked
}

function numeroString(n){
    let formattedNumber = n.toLocaleString('en-US', {
        style: 'decimal',
        useGrouping: true,
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
      });
    
    return "R$"+formattedNumber.replace(/\./g, ';').replace(/,/g, '.').replace(/;/g, ',');
}

function stringNumero(s){
    s = s.replace(/R\$/g, "").trim()
    s = s.replace(/\./g, "")
    return parseFloat(s.replace(/,/g, "."))   
}