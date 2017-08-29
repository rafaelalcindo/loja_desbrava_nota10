<?php
require_once 'produtos.class.php';

class Arganel extends Produtos
{

  private $tipo;
  private $nome_categoria;


  function __construct()
  {

  }

  function __destruct(){

  }

  public function setTipo($tipo){
    $this->tipo = $tipo;
  }

  public function getTipo(){
    return $this->tipo;
  }

  public function setNomeCategoria($nome_categoria){
    $this->nome_categoria = $nome_categoria;
  }

  public function getNomeCategoria(){
    return $this->nome_categoria;
  }

  public function setTitulo($titulo){
    parent::setTitulo($titulo);
  }

  public function getTitulo(){
    return parent::getTitulo();
  }

  public function setQuantidade($quantidade){
    parent::setQuantidade($quantidade);
  }

  public function getQuantidade(){
    return parent::getQuantidade();
  }

  public function setPreco($preco){
    parent::setPreco($preco);
  }

  public function getPreco(){
    return parent::getPreco();
  }

}

 ?>
