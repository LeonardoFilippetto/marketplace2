<?php 
require_once('..\bd\gerenciador_de_conexoes.php');
require_once('UsuarioDTO.php');

class UsuarioDAO{
    private $con;

    function __construct(){
        $this->con = GerenciadorDeConexoes::obter_conexao();
    }

    function inserir($usuario){
        $result = $this->con->query("INSERT INTO usuarios (cpf,cnpj,data_nasc,celular,email,senha,nome,razao_social,tributo,nome_fantasia,telefone_empresa,cep,logradouro,numero,complemento,bairro,cidade,referencia) VALUES ('" . $usuario->get_cpf() . "', '" . $usuario->get_cnpj() . "', '" . $usuario->get_data_nasc() . "', '" . $usuario->get_celular() . "', '" . $usuario->get_email() . "', '" . $usuario->get_senha() . "', '" . $usuario->get_nome() . "', '" . $usuario->get_razao_social() . "', '" . $usuario->get_tributo() . "' , '" . $usuario->get_nome_fantasia() . "', '" . $usuario->get_telefone_empresa() . "', '" . $usuario->get_cep() . "', '" . $usuario->get_logradouro() . "', '" . $usuario->get_numero() . "', '" . $usuario->get_complemento() . "', '" . $usuario->get_bairro() . "', '" . $usuario->get_cidade() . "', '" . $usuario->get_referencia() . "')");

        if ($result->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function alterar($usuario){
        $result = $this->con->query("UPDATE usuarios SET cpf = '" . $usuario->get_cpf() . "', cnpj = '" . $usuario->get_cnpj() . "', data_nasc = '" . $usuario->get_data_nasc() . "', celular = '" . $usuario->get_celular() . "', email = '" . $usuario->get_email() . "', senha = '" . $usuario->get_senha() . "', nome = '" . $usuario->get_nome() . "', razao_social = '" . $usuario->get_razao_social() . "', tributo = '" . $usuario->get_tributo() . "', nome_fantasia = '" . $usuario->get_nome_fantasia() . "', telefone_empresa = '" . $usuario->get_telefone_empresa() . "', cep = '" . $usuario->get_cep() . "', logradouro = '" . $usuario->get_logradouro() . "', numero = '" . $usuario->get_numero() . "', complemento = '" . $usuario->get_complemento() . "', bairro = '" . $usuario->get_bairro() . "', cidade = '" . $usuario->get_cidade() . "', referencia = '" . $usuario->get_referencia() . " WHERE (id_usuario = '" . $usuario->get_id_usuario() . "') ");

        if ($result->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function excluir($id){
        $result = $this->con->query("DELETE FROM usuarios WHERE (id_usuario = '" . $id . "')");

        if ($result->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function obter($id){
        $result = $this->con->query("SELECT * FROM usuarios WHERE (id_usuario = " . $id . ");");
        if ($result->rowCount() > 0){
            
            $row = $result->fetch(PDO::FETCH_ASSOC);

            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_cpf($row['cpf']);
            $u->set_cnpj($row['cnpj']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_celular($row['celular']);
            $u->set_email($row['email']);
            $u->set_senha($row['senha']);
            $u->set_nome($row['nome']);
            $u->set_razao_social($row['razao_social']);
            $u->set_tributo($row['tributo']);
            $u->set_nome_fantasia($row['nome_fantasia']);
            $u->set_telefone_empresa($row['telefone_empresa']);
            $u->set_cep($row['cep']);
            $u->set_logradouro($row['logradouro']);
            $u->set_numero($row['numero']);
            $u->set_complemento($row['complemento']);
            $u->set_bairro($row['bairro']);
            $u->set_cidade($row['cidade']);
            $u->set_referencia($row['referencia']);

            return $u;
        }
        else{
            return false;
        }
    }

    function obter_por_email($email){
        $result = $this->con->query("SELECT * FROM usuarios WHERE (email = '" . $email . "');");

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $u = new Usuario();
        $u->set_id_usuario($row['id_usuario']);
        $u->set_cpf($row['cpf']);
        $u->set_cnpj($row['cnpj']);
        $u->set_data_nasc($row['data_nasc']);
        $u->set_celular($row['celular']);
        $u->set_email($row['email']);
        $u->set_senha($row['senha']);
        $u->set_nome($row['nome']);
        $u->set_razao_social($row['razao_social']);
        $u->set_tributo($row['tributo']);
        $u->set_nome_fantasia($row['nome_fantasia']);
        $u->set_telefone_empresa($row['telefone_empresa']);
        $u->set_cep($row['cep']);
        $u->set_logradouro($row['logradouro']);
        $u->set_numero($row['numero']);
        $u->set_complemento($row['complemento']);
        $u->set_bairro($row['bairro']);
        $u->set_cidade($row['cidade']);
        $u->set_referencia($row['referencia']);

        return $u;
    }

    function obter_todos(){
        $lista = [];
        $result = $this->con->query("SELECT * FROM produtos;");

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $u = new Usuario();
            $u->set_id_usuario($row['id_usuario']);
            $u->set_cpf($row['cpf']);
            $u->set_cnpj($row['cnpj']);
            $u->set_data_nasc($row['data_nasc']);
            $u->set_celular($row['celular']);
            $u->set_email($row['email']);
            $u->set_senha($row['senha']);
            $u->set_nome($row['nome']);
            $u->set_razao_social($row['razao_social']);
            $u->set_tributo($row['tributo']);
            $u->set_nome_fantasia($row['nome_fantasia']);
            $u->set_telefone_empresa($row['telefone_empresa']);
            $u->set_cep($row['cep']);
            $u->set_logradouro($row['logradouro']);
            $u->set_numero($row['numero']);
            $u->set_complemento($row['complemento']);
            $u->set_bairro($row['bairro']);
            $u->set_cidade($row['cidade']);
            $u->set_referencia($row['referencia']);
            array_push($lista, $u);
        }

        return $lista;
    }
}

?>