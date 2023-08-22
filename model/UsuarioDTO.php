<?php
class Usuario 
{
	private $id_usuario;
	private $cpf;
	private $cnpj;
	private $data_nasc;
	private $celular;
	private $email;
	private $senha;
	private $nome;
	private $razao_social;
	private $tributo;
	private $nome_fantasia;
	private $telefone_empresa;
	private $cep;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $referencia;

	// Métodos para atributo id_usuario
	function set_id_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	function get_id_usuario(){
		return $this->id_usuario;
	}

	// Métodos para atributo cpf
	function set_cpf($cpf){
		$this->cpf = $cpf;
	}

	function get_cpf(){
		return $this->cpf;
	}

	// Métodos para atributo cnpj
	function set_cnpj($cnpj){
		$this->cnpj = $cnpj;
	}

	function get_cnpj(){
		return $this->cnpj;
	}

	// Métodos para atributo data_nasc
	function set_data_nasc($data_nasc){
		$this->data_nasc = $data_nasc;
	}

	function get_data_nasc(){
		return $this->data_nasc;
	}

	// Métodos para atributo celular
	function set_celular($celular){
		$this->celular = $celular;
	}

	function get_celular(){
		return $this->celular;
	}

	// Métodos para atributo email
	function set_email($email){
		$this->email = $email;
	}

	function get_email(){
		return $this->email;
	}

	// Métodos para atributo senha
	function set_senha($senha){
		$this->senha = $senha;
	}

	function get_senha(){
		return $this->senha;
	}

	// Métodos para atributo nome
	function set_nome($nome){
		$this->nome = $nome;
	}

	function get_nome(){
		return $this->nome;
	}

	// Métodos para atributo razao_social
	function set_razao_social($razao_social){
		$this->razao_social = $razao_social;
	}

	function get_razao_social(){
		return $this->razao_social;
	}

	// Métodos para atributo tributo
	function set_tributo($tributo){
		$this->tributo = $tributo;
	}

	function get_tributo(){
		return $this->tributo;
	}

	// Métodos para atributo nome_fantasia
	function set_nome_fantasia($nome_fantasia){
		$this->nome_fantasia = $nome_fantasia;
	}

	function get_nome_fantasia(){
		return $this->nome_fantasia;
	}

	// Métodos para atributo telefone_empresa
	function set_telefone_empresa($telefone_empresa){
		$this->telefone_empresa = $telefone_empresa;
	}

	function get_telefone_empresa(){
		return $this->telefone_empresa;
	}

	// Métodos para atributo cep
	function set_cep($cep){
		$this->cep = $cep;
	}

	function get_cep(){
		return $this->cep;
	}

	// Métodos para atributo logradouro
	function set_logradouro($logradouro){
		$this->logradouro = $logradouro;
	}

	function get_logradouro(){
		return $this->logradouro;
	}

	// Métodos para atributo numero
	function set_numero($numero){
		$this->numero = $numero;
	}

	function get_numero(){
		return $this->numero;
	}

	// Métodos para atributo complemento
	function set_complemento($complemento){
		$this->complemento = $complemento;
	}

	function get_complemento(){
		return $this->complemento;
	}

	// Métodos para atributo bairro
	function set_bairro($bairro){
		$this->bairro = $bairro;
	}

	function get_bairro(){
		return $this->bairro;
	}

	// Métodos para atributo cidade
	function set_cidade($cidade){
		$this->cidade = $cidade;
	}

	function get_cidade(){
		return $this->cidade;
	}

	// Métodos para atributo referencia
	function set_referencia($referencia){
		$this->referencia = $referencia;
	}

	function get_referencia(){
		return $this->referencia;
	}
}

?>