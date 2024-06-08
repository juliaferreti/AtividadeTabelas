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

$r->get('/categoria', 'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\CategoriaController@index');

$r->get('/categoria/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\CategoriaController@alterar');

$r->get('/categoria/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\CategoriaController@excluir');

$r->post('/categoria/editar', 'Php\Primeiroprojeto\Controllers\CategoriaController@editar');

$r->post('/categoria/deletar', 'Php\Primeiroprojeto\Controllers\CategoriaController@deletar');

//chamando o formulário para inserir decoracao

$r->get('/decoracao/inserir', 'Php\Primeiroprojeto\Controllers\DecoracaoController@inserir');

$r->post('/decoracao/novo', 'Php\Primeiroprojeto\Controllers\DecoracaoController@novo');

$r->get('/decoracao', 'Php\Primeiroprojeto\Controllers\DecoracaoController@index');

$r->get('/decoracao/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\DecoracaoController@index');

$r->get('/decoracao/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\DecoracaoController@alterar');

$r->get('/decoracao/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\DecoracaoController@excluir');

$r->post('/decoracao/editar', 'Php\Primeiroprojeto\Controllers\DecoracaoController@editar');

$r->post('/decoracao/deletar', 'Php\Primeiroprojeto\Controllers\DecoracaoController@deletar');

//chamando o formulário para inserir mercadoria

$r->get('/mercadoria/inserir', 'Php\Primeiroprojeto\Controllers\MercadoriaController@inserir');

$r->post('/mercadoria/novo', 'Php\Primeiroprojeto\Controllers\MercadoriaController@novo');

$r->get('/mercadoria', 'Php\Primeiroprojeto\Controllers\MercadoriaController@index');

$r->get('/mercadoria/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\MercadoriaController@index');

$r->get('/mercadoria/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\MercadoriaController@alterar');

$r->get('/mercadoria/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\MercadoriaController@excluir');

$r->post('/mercadoria/editar', 'Php\Primeiroprojeto\Controllers\MercadoriaController@editar');

$r->post('/mercadoria/deletar', 'Php\Primeiroprojeto\Controllers\MercadoriaController@deletar');

//chamando o formulário para inserir modelo

$r->get('/modelo/inserir', 'Php\Primeiroprojeto\Controllers\ModeloController@inserir');

$r->post('/modelo/novo', 'Php\Primeiroprojeto\Controllers\ModeloController@novo');

$r->get('/modelo', 'Php\Primeiroprojeto\Controllers\ModeloController@index');

$r->get('/modelo/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\ModeloController@index');

$r->get('/modelo/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\ModeloController@alterar');

$r->get('/modelo/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\ModeloController@excluir');

$r->post('/modelo/editar', 'Php\Primeiroprojeto\Controllers\ModeloController@editar');

$r->post('/modelo/deletar', 'Php\Primeiroprojeto\Controllers\ModeloController@deletar');

//chamando o formulário para inserir pessoa

$r->get('/pessoa/inserir', 'Php\Primeiroprojeto\Controllers\PessoaController@inserir');

$r->post('/pessoa/novo', 'Php\Primeiroprojeto\Controllers\PessoaController@novo');

$r->get('/pessoa', 'Php\Primeiroprojeto\Controllers\PessoaController@index');

$r->get('/pessoa/{acao}/{status}', 'Php\Primeiroprojeto\Controllers\PessoaController@index');

$r->get('/pessoa/alterar/id/{id}', 'Php\Primeiroprojeto\Controllers\PessoaController@alterar');

$r->get('/pessoa/excluir/id/{id}', 'Php\Primeiroprojeto\Controllers\PessoaController@excluir');

$r->post('/pessoa/editar', 'Php\Primeiroprojeto\Controllers\PessoaController@editar');

$r->post('/pessoa/deletar', 'Php\Primeiroprojeto\Controllers\PessoaController@deletar');

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
