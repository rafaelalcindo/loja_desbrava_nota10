<?php

  abstract class Produtos
  {

    protected $titulo;
    protected $quantidade;
    protected $preco;

    function __construct()
    {

    }

    protected function setTitulo($titulo){
      $this->titulo = $titulo;
    }

    protected function getTitulo(){
      return $this->titulo;
    }

    protected function setQuantidade($quantidade){
      $this->quantidade = $quantidade;
    }

    protected function getQuantidade(){
      return $this->quantidade;
    }

    protected function setPreco($preco){
      $this->preco = $preco;
    }

    protected function getPreco(){
      return $this->preco;
    }


  }


 ?>
