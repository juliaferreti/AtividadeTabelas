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

    public function alterar(Mercadoria $mercadoria){
        try{
            $sql= "UPDATE mercadoria SET nome = :nome, numerodeserie = :numerodeserie, validade = :validade WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $mercadoria->getNome());
            $p->bindValue(":numerodeserie", $mercadoria->getNumerodeserie());
            $p->bindValue(":validade", $mercadoria->getValidade());
            $p->bindValue(":id", $mercadoria->getId());
            return $p->execute();

        } catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM mercadoria WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM mercadoria";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM mercadoria WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}
