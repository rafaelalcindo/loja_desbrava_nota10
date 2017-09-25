<?php


  class Chaveiro extends Produtos
  {

    private $tipo;
    private $categoria;

    function __construct()
    {

    }

    function __destruct(){

    }

    public function getTipo(){
      return $this->tipo;
    }

    public function setTipo($tipo){
      $this->tipo = $tipo;
    }

    public function getCategoria(){
      return $this->categoria;
    }

    public function setCategoria($categoria){
      $this->categoria = $categoria;
    }

    public function getTitulo(){
      return parent::getTitulo();
    }

    public function setTitulo($titulo){
      parent::setTitulo($titulo);
    }

    public function getQuantidade(){
      return parent::getQuantidade();
    }

    public function setQuantidade($quantidade){
      return parent::setQuantidade($quantidade);
    }

    public function getPreco(){
      return parent::getPreco();
    }

    public function setPreco($preco){
      parent::setPreco($preco);
    }

  }
