<?php

require_once 'produtos.class.php';

class ArganelPerso extends Produtos
{

    private $fundo;
    private $borda;
    private $logo;
    private $espada;

    function __construct()
    {

    }

    function __destruct(){

    }

    public function setFundo($fundo){
      $this->fundo = $fundo;
    }

    public function getFundo(){
      return $this->fundo;
    }

    public function setBorda($borda){
      $this->borda = $borda;
    }

    public function getBorda(){
      return $this->borda;
    }

    public function setLogo($logo){
      $this->logo = $logo;
    }

    public function getLogo(){
      return $this->logo;
    }

    public function setEspada($espada){
      $this->espada = $espada;
    }

    public function getEspada(){
      return $this->espada;
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
