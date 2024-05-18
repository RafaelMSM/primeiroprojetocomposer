<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Fornecedores;

class FornecedoresDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Fornecedores $fornecedor){
        try{
            $sql ="INSERT INTO fornecedores (nome, endereco) VALUES (:nome, :endereco)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $fornecedor->getNome());
            $p->bindValue(":endereco", $fornecedor->getEndereco());
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }
    }

    public function alterar(Fornecedores $fornecedor){
        try {
            $sql = "UPDATE fornecedores SET nome = :nome, endereco = :endereco WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $fornecedor->getNome());
            $p->bindValue(":endereco", $fornecedor->getEndereco());
            $p->bindValue(":id", $fornecedor->getId());
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }           
    }

    public function excluir($id){
        try {
            $sql = "DELETE FROM fornecedores WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return false;
        }  
    }    

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM fornecedores ORDER BY nome ASC";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return false;
        }  
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM fornecedores WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return false;
        }            
    }
}
