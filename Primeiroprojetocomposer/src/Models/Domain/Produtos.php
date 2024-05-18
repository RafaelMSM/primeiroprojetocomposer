<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Produtos {
    private $id;
    private $nome;
    private $valor;
    private $categoria_id;

    public function __construct($id, $nome, $valor, $categoria_id) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setValor($valor);
        $this->setCategoriaId($categoria_id);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }
}
?>
