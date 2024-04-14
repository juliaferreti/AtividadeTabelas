<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Decoracao{

    private $id;
    private $descricao;
    private $cobertura;
    private $fruta;

    public function __construct($id, $descricao, $cobertura, $fruta){
        $this->setId($id);
        $this->setDescricao($descricao);
        $this->setCobertura($cobertura);
        $this->setFruta($fruta);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    
    public function getCobertura(){
        return $this->cobertura;
    }

    public function setCobertura($cobertura){
        $this->cobertura = $cobertura;
    }

    public function getFruta(){
        return $this->fruta;
    }

    public function setFruta($fruta){
        $this->fruta = $fruta;
    }
}