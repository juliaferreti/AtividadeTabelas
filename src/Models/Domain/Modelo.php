<?php

namespace Php\Primeiroprojeto\Models\Domain;

class Modelo{

    private $id;
    private $descricao;
    private $tamanho;
    private $marca;

    public function __construct($id, $descricao, $tamanho, $marca){
        $this->setId($id);
        $this->setDescricao($descricao);
        $this->setTamanho($tamanho);
        $this->setMarca($marca);
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
    
    public function getTamanho(){
        return $this->tamanho;
    }

    public function setTamanho($tamanho){
        $this->tamanho = $tamanho;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }
}