<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DecoracaoDAO;
use Php\Primeiroprojeto\Models\Domain\Decoracao;

class DecoracaoController{

    public function index($params){
        $decoracaoDAO = new DecoracaoDAO();
        $resultado = $decoracaoDAO->consultarTodos();
        $acao = $params[1] ?? "";
        $status = $params[2] ?? "";
        if($acao == "inserir" && $status == "true")
         $mensagem = "Registro inserido com sucesso!";
        elseif($acao == "inserir" && $status == "false")
         $mensagem = "Erro ao inserir!";
        elseif($acao == "alterar" && $status == "true")
         $mensagem = "Registro alterado com sucesso!";
        elseif($acao == "alterar" && $status == "false")
         $mensagem = "Erro ao alterar!";
        elseif($acao == "excluir" && $status == "true")
         $mensagem = "Registro excluído com sucesso!";
        elseif($acao == "excluir" && $status == "false")
         $mensagem = "Erro ao excluir!";
        else 
         $mensagem = "";
        require_once("../src/Views/decoracao/decoracao.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/decoracao/inserir_decoracao.html");
    }

    public function novo($params){
        $decoracao = new Decoracao(0,$_POST['descricao'],$_POST['cobertura'],$_POST['fruta']);
        $decoracaoDAO = new DecoracaoDAO();
        if ($decoracaoDAO->inserir($decoracao)){
            header("location: /decoracao/inserir/true");
        } else {
            header("location: /decoracao/inserir/false");
        }
    }
    
    public function alterar($params){
        $decoracaoDAO = new DecoracaoDAO();
        $resultado = $decoracaoDAO->consultar($params[1]);
        require_once("../src/Views/decoracao/alterar_decoracao.php");
    }

    public function excluir($params){
        $decoracaoDAO = new DecoracaoDAO();
        $resultado = $decoracaoDAO->consultar($params[1]);
        require_once("../src/Views/decoracao/excluir_decoracao.php");
    }

    public function editar($params){
        $decoracao = new Decoracao($_POST['id'], $_POST['descricao'], $_POST['cobertura'], $_POST['fruta']);
        $decoracaoDAO = new DecoracaoDAO();
        if ($decoracaoDAO->alterar($decoracao)){
            header("location: /decoracao/alterar/true");
        } else {
            header("location: /decoracao/alterar/false");
        }
    }

    public function deletar($params){
        $decoracaoDAO = new DecoracaoDAO();
        if ($decoracaoDAO->excluir($_POST['id'])){
            header("location: /decoracao/excluir/true");
        } else {
            header("location: /decoracao/excluir/false");
        }   
    }
}
