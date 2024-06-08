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

    public function alterar(Modelo $modelo){
        try{
            $sql= "UPDATE modelo SET descricao = :descricao, tamanho = :tamanho, marca = :marca WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":descricao", $modelo->getDescricao());
            $p->bindValue(":tamanho", $modelo->getTamanho());
            $p->bindValue(":marca", $modelo->getMarca());
            $p->bindValue(":id", $modelo->getId());
            return $p->execute();

        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM modelo WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM modelo";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM modelo WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}
