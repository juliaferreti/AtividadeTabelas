<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ModeloDAO;
use Php\Primeiroprojeto\Models\Domain\Modelo;

class ModeloController{

    public function index($params){
        $modeloDAO = new ModeloDAO();
        $resultado = $modeloDAO->consultarTodos();
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
        require_once("../src/Views/modelo/modelo.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/modelo/inserir_modelo.html");
    }

    public function novo($params){
        $modelo = new Modelo(0,$_POST['descricao'],$_POST['tamanho'],$_POST['marca']);
        $modeloDAO = new ModeloDAO();
        if ($modeloDAO->inserir($modelo)){
            return "Modelo inserido com sucesso!";
        } else {
            return "Erro ao inserir o modelo";
        }
    }

    public function alterar($params){
        $modeloDAO = new ModeloDAO();
        $resultado = $modeloDAO->consultar($params[1]);
        require_once("../src/Views/modelo/alterar_modelo.php");
    }

    public function excluir($params){
        $modeloDAO = new ModeloDAO();
        $resultado = $modeloDAO->consultar($params[1]);
        require_once("../src/Views/modelo/excluir_modelo.php");
    }

    public function editar($params){
        $modelo = new Modelo($_POST['id'], $_POST['descricao'], $_POST['tamanho'], $_POST['marca']);
        $modeloDAO = new ModeloDAO();
        if ($modeloDAO->alterar($modelo)){
            header("location: /modelo/alterar/true");
        } else {
            header("location: /modelo/alterar/false");
        }
    }

    public function deletar($params){
        $modeloDAO = new ModeloDAO();
        if ($modeloDAO->excluir($_POST['id'])){
            header("location: /modelo/excluir/true");
        } else {
            header("location: /modelo/excluir/false");
        }   
    }
}
