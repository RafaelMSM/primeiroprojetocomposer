<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ProdutosDAO;
use Php\Primeiroprojeto\Models\Domain\Produtos;

class ProdutosController {
    public function index($params) {
        $produtosDAO = new ProdutosDAO();
        $resultado = $produtosDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if ($acao == "inserir" && $status == "true") {
            $mensagem = "Registro inserido com sucesso!";
        } elseif ($acao == "inserir" && $status == "false") {
            $mensagem = "Erro ao inserir!";
        } elseif ($acao == "alterar" && $status == "true") {
            $mensagem = "Registro alterado com sucesso!";
        } elseif ($acao == "alterar" && $status == "false") {
            $mensagem = "Erro ao alterar!";
        } elseif ($acao == "excluir" && $status == "true") {
            $mensagem = "Registro excluído com sucesso!";
        } elseif ($acao == "excluir" && $status == "false") {
            $mensagem = "Erro ao excluir!";
        } else {
            $mensagem = "";
        }
        require_once("../src/Views/Produtos/produtos.php");
    }

    public function inserir($params) {
        require_once("../src/Views/Produtos/inserir_produtos.html");
    }

    public function novo($params) {
        $produto = new Produtos(0, $_POST['nome'], $_POST['valor'], $_POST['categoria_id']);
        $produtosDAO = new ProdutosDAO();
        if ($produtosDAO->inserir($produto)) {
            header("location: /produtos/inserir/true");
        } else {
            header("location: /produtos/inserir/false");
        }
    }

    public function alterar($params) {
        $produtosDAO = new ProdutosDAO();
        $resultado = $produtosDAO->consultar($params[1]);
        require_once("../src/Views/Produtos/alterar_produtos.php");
    }

    public function excluir($params) {
        $produtosDAO = new ProdutosDAO();
        $resultado = $produtosDAO->consultar($params[1]);
        require_once("../src/Views/Produtos/excluir_produtos.php");
    }

    public function editar($params) {
        $produto = new Produtos($_POST['id'], $_POST['nome'], $_POST['valor'], $_POST['categoria_id']);
        $produtosDAO = new ProdutosDAO();
        if ($produtosDAO->alterar($produto)) {
            header("location: /produtos/alterar/true");
        } else {
            header("location: /produtos/alterar/false");
        }
    }

    public function deletar() {
        $id = $_POST['id'];
        $produtosDAO = new ProdutosDAO();
        if ($produtosDAO->excluir($id)) {
            header("location: /produtos/excluir/true");
        } else {
            header("location: /produtos/excluir/false");
        }
    }
}
?>
