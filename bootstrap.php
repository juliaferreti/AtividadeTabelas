<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php/Primeiroprojeto\Router

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

//chamando o formulário para inserir categoria

$r->get('/categoria/inserir', 'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo', 'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

$r->get('/modelo/inserir', 'Php\Primeiroprojeto\Controllers\ModeloController@inserir');

$r->post('/modelo/novo', 'Php\Primeiroprojeto\Controllers\ModeloController@novo');

$r->get('/pessoa/inserir', 'Php\Primeiroprojeto\Controllers\PessoaController@inserir');

$r->post('/pessoa/novo', 'Php\Primeiroprojeto\Controllers\PessoaController@novo');

$r->get('/mercadoria/inserir', 'Php\Primeiroprojeto\Controllers\MercadoriaController@inserir');

$r->post('/mercadoria/novo', 'Php\Primeiroprojeto\Controllers\MercadoriaController@novo');

$r->get('/decoracao/inserir', 'Php\Primeiroprojeto\Controllers\DecoracaoController@inserir');

$r->post('/decoracao/novo', 'Php\Primeiroprojeto\Controllers\DecoracaoController@novo');

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller-> $resultado($r->getParams());
}