<?php

class Connect {

public function connect(){

    $host = 'mysql:host=localhost;dbname=imoveis';
    $user = 'root';
    $password = '';
    
    try {
        
        $conexao = new PDO($host, $user, $password);
    
        return $conexao;
    } catch (PDOException $e) {
    
        print "Erro: {$e->getMessage()}<br>";
    }
}

public function disconnect(){
	
        $this->conn = null;

}


    
}


