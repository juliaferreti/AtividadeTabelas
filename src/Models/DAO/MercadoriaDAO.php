<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Mercadoria;

class MercadoriaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Mercadoria $mercadoria){
        try{
            $sql ="INSERT INTO mercadoria (nome, numerodeserie, validade) VALUES (:nome, :numerodeserie, :validade)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $mercadoria->getNome());
            $p->bindValue(":numerodeserie", $mercadoria->getNumerodeserie());
            $p->bindValue(":validade", $mercadoria->getValidade());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}

