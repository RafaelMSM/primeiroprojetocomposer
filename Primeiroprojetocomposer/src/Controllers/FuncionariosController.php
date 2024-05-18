<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\FuncionarioDAO;
use Php\Primeiroprojeto\Models\Domain\Funcionario;

class FuncionariosController
{
    public function index($params = [])
    {
        $funcionarioDAO = new FuncionarioDAO();
        $resultado = $funcionarioDAO->consultarTodos();
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
        require_once("../src/Views/funcionarios/funcionarios.php");
    }

    public function inserir($params = [])
    {
        require_once("../src/Views/funcionarios/inserir_funcionarios.html");
    }

    public function novo($params = [])
    {
        $funcionario = new Funcionario(0, $_POST['nome'], $_POST['cargo']);
        $funcionarioDAO = new FuncionarioDAO();
        if ($funcionarioDAO->inserir($funcionario)) {
            header("Location: /funcionarios/inserir/true");
        } else {
            header("Location: /funcionarios/inserir/false");
        }
    }

    public function alterar($params = [])
    {
        $funcionarioDAO = new FuncionarioDAO();
        $resultado = $funcionarioDAO->consultar($params[1] ?? 0);
        if ($resultado) {
            require_once("../src/Views/funcionarios/alterar_funcionarios.php");
        } else {
            echo "Funcionário não encontrado!";
        }
    }

    public function excluir($params = [])
    {
        $funcionarioDAO = new FuncionarioDAO();
        $resultado = $funcionarioDAO->consultar($params[1] ?? 0);
        if ($resultado) {
            require_once("../src/Views/funcionarios/excluir_funcionarios.php");
        } else {
            echo "Funcionário não encontrado!";
        }
    }

    public function editar($params = [])
    {
        $funcionario = new Funcionario($_POST['id'], $_POST['nome'], $_POST['cargo']);
        $funcionarioDAO = new FuncionarioDAO();
        if ($funcionarioDAO->alterar($funcionario)) {
            header("Location: /funcionarios/alterar/true");
        } else {
            header("Location: /funcionarios/alterar/false");
        }
    }

    public function deletar($params = [])
    {
        $id = $_POST['id'];
        $funcionarioDAO = new FuncionarioDAO();
        if ($funcionarioDAO->excluir($id)) {
            header("Location: /funcionarios/excluir/true");
        } else {
            header("Location: /funcionarios/excluir/false");
        }
    }
}
