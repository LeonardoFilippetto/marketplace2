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
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal_inicial").value)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=1
            document.querySelector("#preco_anunc_0").id="preco_anunc_"+checkbox.id.replace("check_", "")
            document.querySelector("#quantidade_0").id="quantidade_"+checkbox.id.replace("check_", "")

        }else{
            if(quantAnunc==maxQuant){
                checkbox.checked=false
                alert("Essa seleção excede o número máximo possível de peças dessa categoria na configuração atual. Para selecionar mais componentes desse tipo, deselecione um ou mais itens já selecionados.")
            }else{
                document.querySelector("#quant_anunc").value=quantAnunc+1
                quantAnunc=quantAnunc+1
                criarInputs(quantAnunc, checkbox.id.replace("check_", ""), "#prox_et")

                let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
                document.querySelector("#preco_anunc_"+checkbox.id.replace("check_", "")).value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
                document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            }
        }

        
    } else{
        if(maxQuant==1||quantAnunc==1){
            document.querySelector("#input_id_anuncio_"+checkbox.id.replace("check_", "")).value=""
            document.querySelector("#input_id_anuncio_"+checkbox.id.replace("check_", "")).id="input_id_anuncio_0"
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
            
            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            document.querySelector("#preco_anunc_"+checkbox.id.replace("check_", "")).value-=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)

            document.querySelector("#subtotal").innerHTML=document.querySelector("#subtotal_inicial").value


            document.querySelector("#submit_avancar").disabled=!checkbox.checked
            document.querySelector("#quant_anunc").value=0

            document.querySelector("#preco_anunc_"+checkbox.id.replace("check_", "")).id="preco_anunc_0"
            document.querySelector("#quantidade_"+checkbox.id.replace("check_", "")).id="quantidade_0"
        }else{
            removerInputs(checkbox.id.replace("check_", ""))

            let indicePrecoAnuncio = '#'+checkbox.id.replace("check", "preco")
            
            document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)-stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
            
            document.querySelector("#quant_anunc").value=quantAnunc-1
        }
    }
    let indice = 0
    document.querySelectorAll(".id_anunc").forEach(input=>{
        let id=input.id.replace("input_id_anuncio_", "")
        console.log(id)
        input.name="id_anuncio_"+indice
        document.querySelector("#quantidade_"+id).name="quantidade_"+indice
        document.querySelector("#preco_anunc_"+id).name="preco_anunc_"+indice
        indice++
    })
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
    inputIdAnuncio.value = id;

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

function adicionar_ram(e){
    let idBtn = e.id
    let idAnunc = idBtn.replace(/adicionar_/g, "")

    let ramUsada = parseInt(document.querySelector("#ram_usada").innerHTML.replace("GB", "")) 
    let ramLimite = parseInt(document.querySelector("#capacidade_ram").innerHTML.replace("GB", "").replace("/", "")) 
    let slotsUsados = parseInt(document.querySelector("#slots_usados").innerHTML) 
    let limiteSlots = parseInt(document.querySelector("#slots_totais").innerHTML.replace("/", "")) 
    let thisRam = parseInt(document.querySelector("#ram_total_"+idAnunc).value)
    let thisPentes = parseInt(document.querySelector("#quantidade_pentes_"+idAnunc).value)

    if(((ramUsada+thisRam)>ramLimite)||((slotsUsados+thisPentes)>limiteSlots)){
        alert("Não é possível adicionar este item por exceder os limites presentes na configuração atual. Retire um ou mais itens da etapa atual ou altere as seleções das etapas anteriores caso persistir a necessidade de adição deste item.")
        return
    }
    
    document.querySelector("#ram_usada").innerHTML=(ramUsada+thisRam)+"GB"
    document.querySelector("#slots_usados").innerHTML=slotsUsados+thisPentes

    if((document.querySelector("#ram_usada").innerHTML==ramLimite) || (document.querySelector("#slots_usados").innerHTML==limiteSlots)){
        document.querySelectorAll(".btn_adicionar").forEach(btn => {
            btn.disabled=true
            btn.classList.add('disabled')
        });
    }

    if(document.querySelector("#input_id_anuncio_0")){
        document.querySelector("#input_id_anuncio_0").value=idAnunc
        document.querySelector("#input_id_anuncio_0").id="input_id_anuncio_"+idAnunc

        let indicePrecoAnuncio = '#'+idBtn.replace("adicionar", "preco")
        document.querySelector("#preco_anunc_0").value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
        document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal_inicial").value)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
        document.querySelector("#submit_avancar").value="AVANÇAR"
        document.querySelector("#submit_avancar").disabled=false
        document.querySelector("#quant_anunc").value=1
        document.querySelector("#preco_anunc_0").id="preco_anunc_"+idAnunc
        document.querySelector("#quantidade_0").id="quantidade_"+idAnunc
    }else if(document.querySelector("#input_id_anuncio_"+idAnunc)){
        document.querySelector("#quantidade_"+idAnunc).value=parseInt(document.querySelector("#quantidade_"+idAnunc).value)+1
        document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector("#preco_anunc_"+idAnunc).value))
    }else{
        document.querySelector("#quant_anunc").value=document.querySelector("#quant_anunc").value+1
        quantAnunc=document.querySelector("#quant_anunc").value
        criarInputs(quantAnunc, idAnunc, "#prox_et")

        let indicePrecoAnuncio = '#'+e.id.replace("adicionar", "preco")
        document.querySelector("#preco_anunc_"+idAnunc).value=stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML)
        document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)+stringNumero(document.querySelector(indicePrecoAnuncio).innerHTML))
    }
    document.querySelector("#retirar_"+idAnunc).disabled=false
    document.querySelector("#retirar_"+idAnunc).style.opacity=1
    document.querySelector("#retirar_"+idAnunc).classList.remove('disabled')
}

function retirar_ram(e){
    let idBtn = e.id
    let idAnunc = idBtn.replace(/retirar_/g, "")

    let ramUsada = parseInt(document.querySelector("#ram_usada").innerHTML.replace("GB", "")) 
    let ramLimite = parseInt(document.querySelector("#capacidade_ram").innerHTML.replace("GB", "").replace("/", "")) 
    let slotsUsados = parseInt(document.querySelector("#slots_usados").innerHTML) 
    let limiteSlots = parseInt(document.querySelector("#slots_totais").innerHTML.replace("/", "")) 
    let thisRam = parseInt(document.querySelector("#ram_total_"+idAnunc).value)
    let thisPentes = parseInt(document.querySelector("#quantidade_pentes_"+idAnunc).value)

    document.querySelector("#ram_usada").innerHTML=(ramUsada-thisRam)+"GB"
    document.querySelector("#slots_usados").innerHTML=slotsUsados-thisPentes

    if(ramUsada==ramLimite||slotsUsados==limiteSlots){
        document.querySelectorAll(".btn_adicionar").forEach(btn => {
            btn.disabled=false
            btn.classList.remove('disabled')
        });
    }

    document.querySelector("#subtotal").innerHTML=numeroString(stringNumero(document.querySelector("#subtotal").innerHTML)-document.querySelector("#preco_anunc_"+idAnunc).value)

    if(document.querySelector("#quant_anunc").value==1){
        if(document.querySelector("#quantidade_"+idAnunc).value==1){
            document.querySelector("#input_id_anuncio_"+idAnunc).value=""
            document.querySelector("#input_id_anuncio_"+idAnunc).id="input_id_anuncio_0"
            document.querySelector("#submit_avancar").value="SELECIONE UM PRODUTO"
            document.querySelector("#submit_avancar").disabled=true

            document.querySelector("#preco_anunc_"+idAnunc).value=0
            document.querySelector("#preco_anunc_"+idAnunc).id="preco_anunc_0"

            document.querySelector("#quant_anunc").value=0

            document.querySelector("#quantidade_"+idAnunc).value=1
            document.querySelector("#quantidade_"+idAnunc).id="quantidade_0"

            e.classList.add("disabled")
            e.style.opacity=0
            e.disabled=true

        }else{
            document.querySelector("#quantidade_"+idAnunc).value=parseInt(document.querySelector("#quantidade_"+idAnunc).value)-1
        }
    }else{
        if(document.querySelector("#quantidade_"+idAnunc).value==1){
            removerInputs(idAnunc)

            document.querySelector("#quant_anunc").value=parseInt(document.querySelector("#quant_anunc").value)-1

            e.classList.add("disabled")
            e.style.opacity=0
            e.disabled=true

        }else{
            document.querySelector("#quantidade_"+idAnunc).value=parseInt(document.querySelector("#quantidade_"+idAnunc).value)-1
        }
    }
}