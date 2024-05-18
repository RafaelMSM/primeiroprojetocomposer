<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Produtos;
use PDO;

class ProdutosDAO {
    private Conexao $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir(Produtos $produto) {
        try {
            $sql = "INSERT INTO produtos (nome, valor, categoria_id) VALUES (:nome, :valor, :categoria_id)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":valor", $produto->getValor());
            $p->bindValue(":categoria_id", $produto->getCategoriaId());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function alterar(Produtos $produto) {
        try {
            $sql = "UPDATE produtos SET nome = :nome, valor = :valor, categoria_id = :categoria_id WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $produto->getNome());
            $p->bindValue(":valor", $produto->getValor());
            $p->bindValue(":categoria_id", $produto->getCategoriaId());
            $p->bindValue(":id", $produto->getId());
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function excluir($id) {
        try {
            $sql = "DELETE FROM produtos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function consultarTodos() {
        try {
            $sql = "SELECT * FROM produtos ORDER BY nome ASC";
            return $this->conexao->getConexao()->query($sql);
        } catch (\Exception $e) {
            return false;
        }
    }

    public function consultar($id) {
        try {
            $sql = "SELECT * FROM produtos WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }
}
?>
