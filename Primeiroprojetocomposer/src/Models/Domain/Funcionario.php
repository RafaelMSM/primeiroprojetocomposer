<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Funcionario {
    private $id;
    private $nome;
    private $cargo;

    public function __construct($id, $nome, $cargo) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setCargo($cargo);
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

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }
}
