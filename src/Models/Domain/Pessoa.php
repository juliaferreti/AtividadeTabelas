<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Pessoa{

    private $id;
    private $nome;
    private $cpf;
    private $telefone;

    public function __construct($id, $nome, $cpf, $telefone){
        $this->setId($id);
        $this->setNome($nome);
        $this->setCpf($cpf);
        $this->setTelefone($telefone);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
}