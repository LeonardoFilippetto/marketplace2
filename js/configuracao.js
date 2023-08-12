function selecionarPeca(checkbox){
    let maxQuant=document.querySelector("#max_quant_anunc").value
    let quantAnunc = document.querySelector("#quant_anunc").value
    if(checkbox.checked){
        if(maxQuant==1||quantAnunc==0){
            document.querySelector("#input_id_anuncio_0").value=checkbox.id.replace("check_", "")
            document.querySelectorAll("input[type='checkbox']").forEach(checkboxInput =>{
                checkboxInput.checked=false;
            })
            checkbox.checked=true;
            document.querySelector("#submit_avancar").value="AVANÇAR"

            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_0").value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=1
        }else{
            if(quantAnunc==maxQuant){
                checkbox.checked=false
                alert("Essa seleção excede o número máximo possível de peças dessa categoria na configuração atual. Para selecionar mais componentes desse tipo, deselecione um ou mais itens já selecionados.")
            }else{
                document.querySelector("#quant_anunc").value=quantAnunc+1
                quantAnunc=quantAnunc+1
                criarInputs(quantAnunc)
                document.querySelector("#input_id_anuncio_"+quantAnunc).value=checkbox.id.replace("check_", "")

                let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
                document.querySelector("#preco_anunc_"+quantAnunc).value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
                document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            }
        }

        
    } else{
        if(maxQuant==1||quantAnunc==1){
            document.querySelector("#input_id_anuncio_0").value=""
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
            
            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_0").value-=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)-stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=0
        }else{
            removerInputs(quantAnunc)
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
            
            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_0").value-=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)-stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=quantAnunc-1
        }
    }
    
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

function criarInputs(n){
    // Create the input elements
    let inputIdAnuncio = document.createElement("input");
    inputIdAnuncio.type = "hidden";
    inputIdAnuncio.name = "id_anuncio_"+n;
    inputIdAnuncio.id = "input_id_anuncio_"+n;
    inputIdAnuncio.value = "";

    let inputQuantidade = document.createElement("input");
    inputQuantidade.type = "hidden";
    inputQuantidade.name = "quantidade_"+n;
    inputQuantidade.id = "quantidade_"+n;
    inputQuantidade.value = "1";

    let inputPrecoAnunc = document.createElement("input");
    inputPrecoAnunc.type = "hidden";
    inputPrecoAnunc.name = "preco_anunc_"+n;
    inputPrecoAnunc.id = "preco_anunc_"+n;
    inputPrecoAnunc.value = "0";

    // Find the element with the ID "preco_anunc_0"
    let targetElement = document.querySelector("#preco_anunc_"+(n-1));

    // Append the created input elements after the target element
    targetElement.parentNode.insertBefore(inputIdAnuncio, targetElement.nextSibling);
    targetElement.parentNode.insertBefore(inputQuantidade, targetElement.nextSibling);
    targetElement.parentNode.insertBefore(inputPrecoAnunc, targetElement.nextSibling);
}

function removerInputs(n){
    let inputIdAnuncio = document.getElementById("input_id_anuncio_"+n);
    let inputQuantidade = document.getElementById("quantidade_"+n);
    let inputPrecoAnunc = document.getElementById("preco_anunc_"+n);

    inputIdAnuncio.parentNode.removeChild(inputIdAnuncio);
    inputQuantidade.parentNode.removeChild(inputQuantidade);
    inputPrecoAnunc.parentNode.removeChild(inputPrecoAnunc);
}
