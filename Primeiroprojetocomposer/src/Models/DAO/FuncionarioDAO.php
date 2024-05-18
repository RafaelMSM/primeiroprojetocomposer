<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Funcionario;

class FuncionarioDAO
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = new Conexao();
    }

    public function inserir(Funcionario $funcionario)
    {
        try {
            $sql = "INSERT INTO funcionarios (nome, cargo) VALUES (:nome, :cargo)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $funcionario->getNome());
            $p->bindValue(":cargo", $funcionario->getCargo());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function alterar(Funcionario $funcionario)
    {
        try {
            $sql = "UPDATE funcionarios SET nome = :nome, cargo = :cargo WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $funcionario->getNome());
            $p->bindValue(":cargo", $funcionario->getCargo());
            $p->bindValue(":id", $funcionario->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function excluir($id)
    {
        try {
            $sql = "DELETE FROM funcionarios WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function consultarTodos()
    {
        try {
            $sql = "SELECT * FROM funcionarios ORDER BY nome ASC";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function consultar($id)
    {
        try {
            $sql = "SELECT * FROM funcionarios WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }
}
