<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\MercadoriaDAO;
use Php\Primeiroprojeto\Models\Domain\Mercadoria;

class MercadoriaController{
    
    public function inserir($params){
        require_once("../src/Views/mercadoria/inserir_mercadoria.html");
    }

    public function novo($params){
        $mercadoria = new Mercadoria(0,$_POST['nome'],$_POST['numerodeserie'],$_POST['validade']);
        $mercadoriaDAO = new MercadoriaDAO();
        if ($mercadoriaDAO->inserir($mercadoria)){
            return "Mercadoria inserida com sucesso!";
        } else {
            return "Erro ao inserir a mercadoria";
        }
    }
}
