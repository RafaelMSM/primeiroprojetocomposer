<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\MarcasDAO;
use Php\Primeiroprojeto\Models\Domain\Marcas;

class MarcasController{

    public function index($params){
        $MarcasDAO = new MarcasDAO();
        $resultado = $MarcasDAO->consultarTodos();
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
        require_once("../src/Views/marcas/marcas.php");
    }

    public function inserir($params){
        require_once("../src/Views/marcas/inserir_marcas.html");
    }

    public function novo($params){
        $Marcas = new Marcas(0, $_POST['nome']);
        $MarcasDAO = new MarcasDAO();
        if ($MarcasDAO->inserir($Marcas)){
            header("location: /marcas/inserir/true");
        } else {
            header("location: /marcas/inserir/false");
        }
    }

    public function alterar($params){
        $MarcasDAO = new MarcasDAO();
        $resultado = $MarcasDAO->consultar($params[1]);
        require_once("../src/Views/marcas/alterar_marcas.php");
    }

    public function excluir($params){
        $MarcasDAO = new MarcasDAO();
        $resultado = $MarcasDAO->consultar($params[1]);
        require_once("../src/Views/marcas/excluir_marcas.php");
    }

    public function editar($params){
        $Marcas = new Marcas($_POST['id'], $_POST['nome']);
        $MarcasDAO = new MarcasDAO();
        if ($MarcasDAO->alterar($Marcas)) {
            header("location: /marcas/alterar/true");
        } else {
            header("location: /marcas/alterar/false");
        }
    }

    public function deletar(){

        $id = $_POST['id'];

        // echo '<pre>';
        // var_dump($id);
        // echo '</pre>';
        // die();

        $MarcasDAO = new MarcasDAO();
        if ($MarcasDAO->excluir($id)) {
            header("location: /marcas/excluir/true");
        } else {
            header("location: /marcas/excluir/false");
        }
    }
}
