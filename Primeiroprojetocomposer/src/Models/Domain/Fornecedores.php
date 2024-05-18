<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Fornecedores{

    private $id;
    private $nome;
    private $endereco;

    public function __construct($id, $nome, $endereco){
        $this->setId($id);
        $this->setNome($nome);
        $this->setEndereco($endereco);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
}
