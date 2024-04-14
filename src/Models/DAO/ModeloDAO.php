<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Modelo;

class ModeloDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Modelo $modelo){
        try{
            $sql ="INSERT INTO modelo (descricao, tamanho, marca) VALUES (:descricao, :tamanho, :marca)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $modelo->getDescricao());
            $p->bindValue(":tamanho", $modelo->getTamanho());
            $p->bindValue(":marca", $modelo->getMarca());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}

