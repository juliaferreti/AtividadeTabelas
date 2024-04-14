<?php

namespace Php\Primeiroprojeto\Controllers;

use Php\Primeiroprojeto\Models\DAO\ModeloDAO;
use Php\Primeiroprojeto\Models\Domain\Modelo;

class ModeloController{
    
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
}
