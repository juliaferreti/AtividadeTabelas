<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Decoracao;

class DecoracaoDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Decoracao $decoracao){
        try{
            $sql ="INSERT INTO decoracao (descricao, cobertura, fruta) VALUES (:descricao, :cobertura, :fruta)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $decoracao->getDescricao());
            $p->bindValue(":cobertura", $decoracao->getCobertura());
            $p->bindValue(":fruta", $decoracao->getFruta());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }
}

