<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Marcas;

class MarcasDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Marcas $marca){
        try{
            $sql ="INSERT INTO marcas (nome) VALUES (:nome)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $marca->getNome());
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }
    }

    public function alterar(Marcas $marca){
        try {
            $sql = "UPDATE marcas SET nome = :nome WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $marca->getNome());
            $p->bindValue(":id", $marca->getId());
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }           
    }

    public function excluir($id){
        try {
            $sql = "DELETE FROM marcas WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }  
    }    

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM marcas ORDER BY nome ASC";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return false;
        }  
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM marcas WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return false;
        }            
    }
}
