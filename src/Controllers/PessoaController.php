<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\PessoaDAO;
use Php\Primeiroprojeto\Models\Domain\Pessoa;

class PessoaController{
    
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
}
