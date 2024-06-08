<?php

namespace Php\Primeiroprojeto\Models\DAO;

use Php\Primeiroprojeto\Models\Domain\Pessoa;

class PessoaDAO{

    private Conexao $conexao;

    public function __construct(){
        $this->conexao = new Conexao();
    }

    public function inserir(Pessoa $pessoa){
        try{
            $sql ="INSERT INTO pessoa (nome, cpf, telefone) VALUES (:nome, :cpf, :telefone)";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $pessoa->getNome());
            $p->bindValue(":cpf", $pessoa->getCpf());
            $p->bindValue(":telefone", $pessoa->getTelefone());
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function alterar(Pessoa $pessoa){
        try{
            $sql= "UPDATE pessoa SET nome = :nome, cpf = :cpf, telefone = :telefone WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $pessoa->getNome());
            $p->bindValue(":cpf", $pessoa->getCpf());
            $p->bindValue(":telefone", $pessoa->getTelefone());
            $p->bindValue(":id", $pessoa->getId());
            return $p->execute();

        }catch(\Exception $e){
            return 0;
        }
    }

    public function excluir($id){
        try{
            $sql = "DELETE FROM pessoa WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultarTodos(){
        try{
            $sql = "SELECT * FROM pessoa";
            return $this->conexao->getConexao()->query($sql);
        } catch(\Exception $e){
            return 0;
        }
    }

    public function consultar($id){
        try{
            $sql = "SELECT * FROM pessoa WHERE id = :id";
            $p = $this->conexao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            $p->execute();
            return $p->fetch();
        } catch(\Exception $e){
            return 0;
        }
    }
}
