<?php
class GerenciadorDeConexoes {
    public static $instancia_unica;
 
    private function __construct() {
        
    }
 
    public static function obter_conexao() {
        if (!isset(self::$instancia_unica)) {
            self::$instancia_unica = GerenciadorDeConexoes::criar_conexao();
        }
 
        return self::$instancia_unica;
    }

    private static function criar_conexao(){
    	$username = 'root';
		$password = '';
		$host = 'localhost';
		$db_name ='marketplace';
        $porta= '3306';

        $str_con = 'mysql:host=' . $host . ';port='. $porta .';dbname=' . $db_name;
        
		
    	try{
			$pdo = new PDO($str_con, $username, $password);
  			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
  			return $pdo;
		}
		catch(PDOException $e){
			throw new Exception("Erro ao conectar-se com a base de dados: [" . $e->getMessage() . "]");
		}
    }
}

?>