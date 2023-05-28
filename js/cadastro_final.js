function verificarFis(){

    const cep = document.querySelector("#cep");

    let ret = true;

    if(cep.value.length!=8){
        alert("CEP inválido!");
        ret = false;
    }
    if(!ret){
        return false;
    }

    return true;
}