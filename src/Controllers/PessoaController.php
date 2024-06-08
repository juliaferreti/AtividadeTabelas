<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\PessoaDAO;
use Php\Primeiroprojeto\Models\Domain\Pessoa;

class PessoaController{

    public function index($params){
        $pessoaDAO = new PessoaDAO();
        $resultado = $pessoaDAO->consultarTodos();
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
        require_once("../src/Views/pessoa/pessoa.php");
    }
    
    public function inserir($params){
        require_once("../src/Views/pessoa/inserir_pessoa.html");
    }

    public function novo($params){
        $pessoa = new Pessoa(0,$_POST['nome'],$_POST['cpf'],$_POST['telefone']);
        $pessoaDAO = new PessoaDAO();
        if ($pessoaDAO->inserir($pessoa)){
            return "Pessoa inserida com sucesso!";
        } else {
            return "Erro ao inserir a pessoa";
        }
    }

    public function alterar($params){
        $pessoaDAO = new PessoaDAO();
        $resultado = $pessoaDAO->consultar($params[1]);
        require_once("../src/Views/pessoa/alterar_pessoa.php");
    }

    public function excluir($params){
        $pessoaDAO = new PessoaDAO();
        $resultado = $pessoaDAO->consultar($params[1]);
        require_once("../src/Views/pessoa/excluir_pessoa.php");
    }

    public function editar($params){
        $pessoa = new Pessoa($_POST['id'], $_POST['nome'], $_POST['cpf'], $_POST['telefone']);
        $pessoaDAO = new PessoaDAO();
        if ($pessoaDAO->alterar($pessoa)){
            header("location: /pessoa/alterar/true");
        } else {
            header("location: /pessoa/alterar/false");
        }
    }

    public function deletar($params){
        $pessoaDAO = new PessoaDAO();
        if ($pessoaDAO->excluir($_POST['id'])){
            header("location: /pessoa/excluir/true");
        } else {
            header("location: /pessoa/excluir/false");
        }   
    }
}
