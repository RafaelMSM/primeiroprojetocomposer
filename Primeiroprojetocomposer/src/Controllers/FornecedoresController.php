<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\FornecedoresDAO;
use Php\Primeiroprojeto\Models\Domain\Fornecedores;

class FornecedoresController{

    public function index($params){
        $fornecedoresDAO = new FornecedoresDAO();
        $resultado = $fornecedoresDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true"){
            $mensagem = "Registro inserido com sucesso!";
        } elseif($acao == "inserir" && $status == "false"){
            $mensagem = "Erro ao inserir!";
        } elseif($acao == "alterar" && $status == "true"){
            $mensagem = "Registro alterado com sucesso!";
        } elseif($acao == "alterar" && $status == "false"){
            $mensagem = "Erro ao alterar!";
        } elseif($acao == "excluir" && $status == "true"){
            $mensagem = "Registro excluído com sucesso!";
        } elseif($acao == "excluir" && $status == "false"){
            $mensagem = "Erro ao excluir!";
        } else {
            $mensagem = "";
        }
        require_once("../src/Views/Fornecedores/fornecedores.php");
    }

    public function inserir($params){
        require_once("../src/Views/Fornecedores/inserir_fornecedores.html");
    }

    public function novo($params){
        $fornecedor = new Fornecedores(0, $_POST['nome'], $_POST['endereco']);
        $fornecedoresDAO = new FornecedoresDAO();
        if ($fornecedoresDAO->inserir($fornecedor)){
            header("location: /fornecedores/inserir/true");
        } else {
            header("location: /fornecedores/inserir/false");
        }
    }

    public function alterar($params){
        $fornecedoresDAO = new FornecedoresDAO();
        $resultado = $fornecedoresDAO->consultar($params[1]);
        require_once("../src/Views/Fornecedores/alterar_fornecedores.php");
    }

    public function excluir($params){
        $fornecedoresDAO = new FornecedoresDAO();
        $resultado = $fornecedoresDAO->consultar($params[1]);
        require_once("../src/Views/Fornecedores/excluir_fornecedores.php");
    }

    public function editar($params){
        $fornecedor = new Fornecedores($_POST['id'], $_POST['nome'], $_POST['endereco']);
        $fornecedoresDAO = new FornecedoresDAO();
        if ($fornecedoresDAO->alterar($fornecedor)) {
            header("location: /fornecedores/alterar/true");
        } else {
            header("location: /fornecedores/alterar/false");
        }
    }

    public function deletar(){
        $id = $_POST['id'];
        $fornecedoresDAO = new FornecedoresDAO();
        if ($fornecedoresDAO->excluir($id)) {
            header("location: /fornecedores/excluir/true");
        } else {
            header("location: /fornecedores/excluir/false");
        }
    }
}
