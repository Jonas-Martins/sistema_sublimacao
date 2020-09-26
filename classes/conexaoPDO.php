<?php

define('HOST', 'localhost');
define('DBNAME', 'jumirimm_sublimacao');
define('USER', 'root');
define('PASS', '');

class ConexaoPDO {
    private function connect() {
        try {
            return new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASS);
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }
    
    function consult($cmdSql) {
        $result = $this->connect()->prepare($cmdSql);
        $result->execute();
        $countRows = $result->rowCount();
        if($countRows > 0)
        {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    function insert($cmdSql) {
        $result = $this->connect()->prepare($cmdSql);
        $result->execute();
        if($result)
        {
            $last_id = $this->connect()->prepare('SELECT LAST_INSERT_ID() as id');
            $last_id->execute();
            $this->lastInsertId = $last_id->fetchAll()[0];
            return true;
        }
        return false;
    }
    
    public function deletar($cmdSql){
        return $this->connect()->exec($cmdSql);
    }
    
    public function alterar($cmdSql){
        return $this->connect()->exec($cmdSql);
    }
}
