<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Mercadoria{

    private $id;
    private $nome;
    private $numerodeserie;
    private $validade;

    public function __construct($id, $nome, $numerodeserie, $validade){
        $this->setId($id);
        $this->setNome($nome);
        $this->setNumerodeserie($numerodeserie);
        $this->setValidade($validade);
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
    
    public function getNumerodeserie(){
        return $this->numerodeserie;
    }

    public function setNumerodeserie($numerodeserie){
        $this->numerodeserie = $numerodeserie;
    }

    public function getValidade(){
        return $this->validade;
    }

    public function setValidade($validade){
        $this->validade = $validade;
    }
}