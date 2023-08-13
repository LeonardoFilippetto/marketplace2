function selecionarPeca(checkbox){
    let maxQuant=document.querySelector("#max_quant_anunc").value
    let quantAnunc = document.querySelector("#quant_anunc").value
    if(checkbox.checked){
        if(maxQuant==1||quantAnunc==0){
            document.querySelector("#input_id_anuncio_0").value=checkbox.id.replace("check_", "")
            document.querySelector("#input_id_anuncio_0").id="input_id_anuncio_"+checkbox.id.replace("check_", "")
            document.querySelectorAll("input[type='checkbox']").forEach(checkboxInput =>{
                checkboxInput.checked=false;
            })
            checkbox.checked=true;
            document.querySelector("#submit_avancar").value="AVANÇAR"

            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_0").value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=numeroString(sessionStorage.getItem('subtotal')+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=1
            document.querySelector("#preco_anunc_0").id="#preco_anunc_"+checkbox.id.replace("check_", "")
            document.querySelector("#quantidade_0").id="#preco_anunc_"+checkbox.id.replace("check_", "")

        }else{
            if(quantAnunc==maxQuant){
                checkbox.checked=false
                alert("Essa seleção excede o número máximo possível de peças dessa categoria na configuração atual. Para selecionar mais componentes desse tipo, deselecione um ou mais itens já selecionados.")
            }else{
                document.querySelector("#quant_anunc").value=quantAnunc+1
                quantAnunc=quantAnunc+1
                criarInputs(quantAnunc, checkbox.id.replace("check_", ""), "#prox_et")
                document.querySelector("#input_id_anuncio_"+checkbox.id.replace("check_", "")).value=checkbox.id.replace("check_", "")

                let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
                document.querySelector("#preco_anunc_"+checkbox.id.replace("check_", "")).value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
                document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            }
        }

        
    } else{
        if(maxQuant==1||quantAnunc==1){
            document.querySelector("#input_id_anuncio_"+checkbox.id.replace("check_", "")).value=""
            document.querySelector("#input_id_anuncio_"+checkbox.id.replace("check_", "")).id="#input_id_anuncio_0"
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
            
            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_"+checkbox.id.replace("check_", "")).value-=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
            document.querySelector("#subtotal").innerHTML=sessionStorage.getItem('subtotal')


            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=0

            document.querySelector("#preco_anunc_"+checkbox.id.replace("check_", "")).id="#preco_anunc_0"
            document.querySelector("#quantidade_"+checkbox.id.replace("check_", "")).id="#quantidade_0"
        }else{
            removerInputs(checkbox.id.replace("check_", ""))
            
            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)-stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            
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

function criarInputs(name, id, parentId){
    // Create the input elements
    let inputIdAnuncio = document.createElement("input");
    inputIdAnuncio.type = "hidden";
    inputIdAnuncio.name = "id_anuncio_"+name;
    inputIdAnuncio.id = "input_id_anuncio_"+id;
    inputIdAnuncio.value = "";

    let inputQuantidade = document.createElement("input");
    inputQuantidade.type = "hidden";
    inputQuantidade.name = "quantidade_"+name;
    inputQuantidade.id = "quantidade_"+id;
    inputQuantidade.value = "1";

    let inputPrecoAnunc = document.createElement("input");
    inputPrecoAnunc.type = "hidden";
    inputPrecoAnunc.name = "preco_anunc_"+name;
    inputPrecoAnunc.id = "preco_anunc_"+id;
    inputPrecoAnunc.value = "0";

    // Find the element with the ID "preco_anunc_0"
    let parent = document.querySelector(parentId);

    // Append the created input elements after the target element
    parent.appendChild(inputIdAnuncio);
    parent.appendChild(inputQuantidade);
    parent.appendChild(inputPrecoAnunc);
}

function removerInputs(n){
    let inputIdAnuncio = document.getElementById("input_id_anuncio_"+n);
    let inputQuantidade = document.getElementById("quantidade_"+n);
    let inputPrecoAnunc = document.getElementById("preco_anunc_"+n);

    inputIdAnuncio.parentNode.removeChild(inputIdAnuncio);
    inputQuantidade.parentNode.removeChild(inputQuantidade);
    inputPrecoAnunc.parentNode.removeChild(inputPrecoAnunc);
}
