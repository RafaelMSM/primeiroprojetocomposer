<?php

namespace Php\Primeiroprojeto\Controllers;

class HomeController{

    public function olaMundo($params){
        return "Olá Mundo!"; 
    }

    public function formEx1($params){
        require_once("../src/views/exer1.html");
    }


}