<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\DecoracaoDAO;
use Php\Primeiroprojeto\Models\Domain\Decoracao;

class DecoracaoController{
    
    public function inserir($params){
        require_once("../src/Views/decoracao/inserir_decoracao.html");
    }

    public function novo($params){
        $decoracao = new Decoracao(0,$_POST['descricao'],$_POST['cobertura'],$_POST['fruta']);
        $decoracaoDAO = new DecoracaoDAO();
        if ($decoracaoDAO->inserir($decoracao)){
            return "Decoração inserida com sucesso!";
        } else {
            return "Erro ao inserir decoração";
        }
    }
}
