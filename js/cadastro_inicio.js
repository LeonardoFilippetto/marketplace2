document.getElementById("submit_fis").onclick=async (e)=>{
    // await promiseExample();
    
    e.preventDefault();

    document.querySelectorAll("input").forEach((elemento)=>{
        if(elemento.type!="radio")
            elemento.style.border="none";
    });

    document.querySelectorAll(".mens").forEach((elemento)=>{
        elemento.innerHTML="";
    });

    const nome = document.querySelector("#fis_nome");
    const cpf = document.querySelector("#fis_cpf");
    const senha = document.querySelector("#fis_senha");
    const confSenha = document.querySelector("#fis_conf_senha");
    const cel = document.querySelector("#fis_celular");
    const email = document.querySelector("#fis_email");
    const data_nasc = document.querySelector("#fis_data_nasc");

    let ret = true;

    if(verifEmpty(nome, "fis_mens_nome")){
        ret=false;
    }

    if(verifEmpty(senha, "fis_mens_senha")){
        ret=false;
    }

    if(verifEmpty(confSenha, "fis_mens_conf_senha")){
        ret=false;
    }

    if(verifEmpty(data_nasc, "fis_mens_data_nasc")){
        ret=false;
    }

    if(!nome.value.includes(" ")){
        document.querySelector("#fis_mens_nome").innerHTML="Inserir nome completo!";
        nome.style.border="1px solid #ff0000";
        ret = false;
    }
    if(cpf.value.length!=11||!testaCPF(cpf.value)){
        document.querySelector("#fis_mens_cpf").innerHTML="CPF inválido!";
        cpf.style.border="1px solid #ff0000";
        ret = false;
    }
    if(senha.value!=confSenha.value){
        document.querySelector("#fis_mens_senha").innerHTML="Senhas fornecidas são diferentes!";
        senha.style.border="1px solid #ff0000";
        document.querySelector("#fis_mens_conf_senha").innerHTML="Senhas fornecidas são diferentes!";
        confSenha.style.border="1px solid #ff0000";
        ret = false;
    }
    if(cel.value.length!=15){
        document.querySelector("#fis_mens_cel").innerHTML="Celular inválido!";
        cel.style.border="1px solid #ff0000";
        ret = false;
    }

    if(!email.value.includes("@")||!email.value.includes(".")){
        document.querySelector("#fis_mens_email").innerHTML="Endereço de email inválido!";
        email.style.border="1px solid #ff0000";
        ret = false;
    }else if(await verificarEmailBd(email.value)){
        document.querySelector("#fis_mens_email").innerHTML="Email já cadastrado!";
        email.style.border="1px solid #ff0000";
        ret = false;
        console.log(ret);
    }

    console.log(ret);

    if(ret){
        document.querySelector("#form_cpf").submit();
    }else{
        alert("Campos inválidos");
    }

}

document.getElementById("submit_jur").onclick=async (e)=>{
    // await promiseExample();

    e.preventDefault();

    document.querySelectorAll("input").forEach((elemento)=>{
        if(elemento.type!="radio")
            elemento.style.border="none";
    });

    document.querySelectorAll(".mens").forEach((elemento)=>{
            elemento.innerHTML="";
    });

    const nome = document.querySelector("#jur_nome");
    const cnpj = document.querySelector("#jur_cnpj");
    const raz = document.querySelector("#jur_raz_soc");
    const nome_fant = document.querySelector("#jur_nome_fant");
    const senha = document.querySelector("#jur_senha");
    const confSenha = document.querySelector("#jur_conf_senha");
    const cel = document.querySelector("#jur_celular");
    const tel = document.querySelector("#jur_tel");
    const email = document.querySelector("#jur_email");
    const data_nasc = document.querySelector("#jur_data_nasc");
    const tributo = document.querySelector("#jur_tributo");

    let ret = true;

    if(verifEmpty(nome, "jur_mens_nome")){
        ret=false;
    }

    if(verifEmpty(senha, "jur_mens_senha")){
        ret=false;
    }

    if(verifEmpty(confSenha, "jur_mens_conf_senha")){
        ret=false;
    }

    if(verifEmpty(data_nasc, "jur_mens_data_nasc")){
        ret=false;
    }

    if(verifEmpty(tributo, "jur_mens_tributo")){
        ret=false;
    }

    if(verifEmpty(raz, "jur_mens_raz_soc")){
        ret=false;
    }

    if(verifEmpty(nome_fant, "jur_mens_nome_fant")){
        ret=false;
    }



    if(!nome.value.includes(" ")){
        document.querySelector("#jur_mens_nome").innerHTML="Inserir nome completo";
        ret = false;
    }
    if(cnpj.value.length!=14||!testaCNPJ(cnpj.value)){
        document.querySelector("#jur_mens_cnpj").innerHTML="CNPJ inválido!";
        cnpj.style.border="1px solid #ff0000";
        ret = false;
    }
    if(senha.value!=confSenha.value){
        document.querySelector("#jur_mens_senha").innerHTML="Senhas fornecidas são diferentes!";
        senha.style.border="1px solid #ff0000";
        document.querySelector("#jur_mens_conf_senha").innerHTML="Senhas fornecidas são diferentes!";
        confSenha.style.border="1px solid #ff0000";
        ret = false;
    }
    if(cel.value.length!=15){
        document.querySelector("#jur_mens_cel").innerHTML="Celular inválido!";
        cel.style.border="1px solid #ff0000";
        ret = false;
    }
    if(tel.value.length!=10&&tel.value.length!=0){
        document.querySelector("#jur_mens_tel").innerHTML="Telefone inválido!";
        tel.style.border="1px solid #ff0000";
        ret = false;
    }

    if(!email.value.includes("@")||!email.value.includes(".")){
        document.querySelector("#jur_mens_email").innerHTML="Endereço de email inválido!";
        email.style.border="1px solid #ff0000";
        ret = false;
    }else if(await verificarEmailBd(email.value)){
        document.querySelector("#jur_mens_email").innerHTML="Email já cadastrado!";
        email.style.border="1px solid #ff0000";
        ret = false;
        console.log(ret);
    }

    console.log(ret);

    if(ret){
        document.querySelector("#form_cnpj").submit();
    }else{
        alert("Campos inválidos");
    }
}

function testaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;

  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}

function testaCNPJ(cnpj) {
    if(cnpj == '') return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

function cadastroFisica(e){
    e.preventDefault();
    const formCpf = document.querySelector("#form_cpf");
    const formCnpj = document.querySelector("#form_cnpj");

    formCnpj.style.display="none";
    formCpf.style.display="block";
}

function cadastroJuridica(e){
    e.preventDefault();
    const formCpf = document.querySelector("#form_cpf");
    const formCnpj = document.querySelector("#form_cnpj");

    formCpf.style.display="none";
    formCnpj.style.display="block";
}

const handlePhone = (event) => {
    let input = event.target
    input.value = phoneMask(input.value)
  }
  
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }

async function verificarEmailBd(email) {
    let httpRequest = new XMLHttpRequest();
    let url = "http://localhost/marketplace2/controller/ajax_verificar_email_bd.php?email=" + email;
  
    let promise = new Promise((resolve, reject) => {
      httpRequest.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          let resposta = this.responseText;
          console.log(`email resposta: ${resposta}`);
          if (resposta == email) {
            console.log("correspondência!!!!");
            console.log("return true!");
            resolve(true);
          } else {
            console.log("return false!");
            resolve(false);
          }
        }
      };
    });
  
    console.log(`email enviado: ${email}`);
    console.log(`URL: ${url}`);
  
    httpRequest.open("GET", url, true);
    httpRequest.send();
  
    let corres = await promise;
    return corres;
  }

function verifEmpty(input, id_mens){
    if(input.value==""){
        input.style.border="1px solid #ff0000";
        let id="#"+id_mens;
        document.querySelector(id).innerHTML="Este campo deve ser preenchido!";
        return true;
    }
    return false;
}