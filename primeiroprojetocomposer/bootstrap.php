<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

# ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
});

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
});

$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $numero = $_POST["numero"]; 
    if ($numero > 0) {
        return "Valor Positivo";
    } elseif ($numero < 0) {
        return "Valor Negativo";
    } else {
        return "Igual a Zero";
    }
});

$r->get('/exer2/formulario', function(){
    include("exer2.html");
});

$r->post('/exer2/resposta', function(){
    $numeros = $_POST["numeros"];
    $menor = min($numeros);
    $posicao = array_search($menor, $numeros) + 1;
    return "Menor valor: $menor, posição: $posicao";
});

$r->get('/exer3/formulario', function(){
    include("exer3.html");
});

$r->post('/exer3/resposta', function(){
    $valor1 = $_POST["valor1"];
    $valor2 = $_POST["valor2"];
    $soma = $valor1 + $valor2;
    if ($valor1 == $valor2) {
        return "O triplo da soma é: " . ($soma * 3);
    } else {
        return "A soma é: $soma";
    }
});

$r->get('/exer4/formulario', function(){
    include("exer4.html");
});

$r->post('/exer4/resposta', function(){
    $numero = $_POST["numero"];
    $tabuada = "";
    for ($i = 0; $i <= 10; $i++) {
        $tabuada .= "$numero X $i = " . ($numero * $i) . "\n";
    }
    return $tabuada;
});

$r->get('/exer5/formulario', function(){
    include("exer5.html");
});

$r->post('/exer5/resposta', function(){
    $numero = $_POST["numero"];
    $fatorial = 1;
    for ($i = $numero; $i >= 1; $i--) {
        $fatorial *= $i;
    }
    return "Fatorial de $numero é $fatorial";
});

$r->get('/exer6/formulario', function(){
    include("exer6.html");
});

$r->post('/exer6/resposta', function(){
    $a = $_POST["a"];
    $b = $_POST["b"];
    if ($a < $b) {
        return "$a $b";
    } elseif ($a > $b) {
        return "$b $a";
    } else {
        return "Números iguais: $a";
    }
});

$r->get('/exer7/formulario', function(){
    include("exer7.html");
});

$r->post('/exer7/resposta', function(){
    $metros = $_POST["metros"];
    $centimetros = $metros * 100;
    return "O valor em centímetros é: $centimetros";
});

$r->get('/exer8/formulario', function(){
    include("exer8.html");
});

$r->post('/exer8/resposta', function(){
    $area = $_POST["area"];
    $litros_tinta = ceil($area / 3);
    $latas = ceil($litros_tinta / 18);
    $preco_total = $latas * 80;
    return "Quantidade de latas de tinta necessárias: $latas. Preço total: R$ $preco_total";
});

$r->get('/exer9/formulario', function(){
    include("exer9.html");
});

$r->post('/exer9/resposta', function(){
    $ano_nascimento = $_POST["ano_nascimento"];
    $ano_atual = date("Y");
    $idade = $ano_atual - $ano_nascimento;
    $dias_vividos = $idade * 365;
    $idade_2025 = 2025 - $ano_nascimento;
    return "Idade: $idade anos. Dias vividos: $dias_vividos dias. Idade em 2025: $idade_2025 anos";
});

$r->get('/exer10/formulario', function(){
    include("exer10.html");
});

$r->post('/exer10/resposta', function(){
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];
    $imc = $peso / ($altura ** 2);
    if ($imc < 18.5) {
        return "Seu IMC é $imc, você está abaixo do peso.";
    } elseif ($imc >= 18.5 && $imc < 25) {
        return "Seu IMC é $imc, você está com peso normal.";
    } elseif ($imc >= 25 && $imc < 30) {
        return "Seu IMC é $imc, você está acima do peso.";
    } else {
        return "Seu IMC é $imc, você está obeso.";
    }
});

# ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());
