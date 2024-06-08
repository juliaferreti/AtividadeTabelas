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

    public function alterar(Decoracao $decoracao){
        try{
            $sql= "UPDATE decoracao SET descricao = :descricao, cobertura = :cobertura, fruta = :fruta WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $decoracao->getDescricao());
            $p->bindValue(":cobertura", $decoracao->getCobertura());
            $p->bindValue(":fruta", $decoracao->getFruta());
            $p->bindValue(":id", $decoracao->getId());
            return $p->execute();

        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM decoracao WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM decoracao";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM decoracao WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}
