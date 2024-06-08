<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\MercadoriaDAO;
use Php\Primeiroprojeto\Models\Domain\Mercadoria;

class MercadoriaController{

    public function index($params){
        $mercadoriaDAO = new MercadoriaDAO();
        $resultado = $mercadoriaDAO->consultarTodos();
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
        require_once("../src/Views/mercadoria/mercadoria.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/mercadoria/inserir_mercadoria.html");
    }

    public function novo($params){
        $mercadoria = new Mercadoria(0,$_POST['nome'],$_POST['numerodeserie'],$_POST['validade']);
        $mercadoriaDAO = new MercadoriaDAO();
        if ($mercadoriaDAO->inserir($mercadoria)){
            header("location: /mercadoria/inserir/true");
        } else {
            header("location: /mercadoria/inserir/false");
        }
    }

    public function alterar($params){
        $mercadoriaDAO = new MercadoriaDAO();
        $resultado = $mercadoriaDAO->consultar($params[1]);
        require_once("../src/Views/mercadoria/alterar_mercadoria.php");
    }

    public function excluir($params){
        $mercadoriaDAO = new MercadoriaDAO();
        $resultado = $mercadoriaDAO->consultar($params[1]);
        require_once("../src/Views/mercadoria/excluir_mercadoria.php");
    }

    public function editar($params){
        $mercadoria = new Mercadoria($_POST['id'], $_POST['nome'], $_POST['numerodeserie'], $_POST['validade']);
        $mercadoriaDAO = new MercadoriaDAO();
        if ($mercadoriaDAO->alterar($mercadoria)){
            header("location: /mercadoria/alterar/true");
        } else {
            header("location: /mercadoria/alterar/false");
        }
    }

    public function deletar($params){
        $mercadoriaDAO = new MercadoriaDAO();
        if ($mercadoriaDAO->excluir($_POST['id'])){
            header("location: /mercadoria/excluir/true");
        } else {
            header("location: /mercadoria/excluir/false");
        }   
    }
}
