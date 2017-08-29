<?php

  require_once "lib/mercadopago.php";

  class CarrinhoCompras
  {
    private $arganelPersonalizado;
    private $arganel;

    function __construct()
    {

    }

    public function addArganelPer($argPerso){
      $argPerso_array = array();
      $this->arganelPersonalizado['titulo']         = $argPerso->getTitulo();
      $this->arganelPersonalizado['quantidade']     = $argPerso->getQuantidade();
      $this->arganelPersonalizado['preco']          = $argPerso->getPreco();
      $this->arganelPersonalizado['fundo']          = $argPerso->getFundo();
      $this->arganelPersonalizado['borda']          = $argPerso->getBorda();
      $this->arganelPersonalizado['logo']           = $argPerso->getLogo();
      $this->arganelPersonalizado['espada']         = $argPerso->getEspada();
      $this->arganelPersonalizado['nome_categoria'] = 'Arganel Personalizados';

      $argPerso_array['argPerso'] = $this->arganelPersonalizado;
    //  print_r($this->arganelPersonalizado);
      ///echo "<br/><br/>";
      //print_r($argPerso_array);
      AddCookie($argPerso_array);

    }

    public function addArganel($arganel){
      $arganel_array = array();
      $this->arganel['tipo']           = $arganel->getTipo();
      $this->arganel['nome_categoria'] = $arganel->getNomeCategoria();
      $this->arganel['titulo']         = $arganel->getTitulo();
      $this->arganel['quantidade']     = $arganel->getQuantidade();
      $this->arganel['preco']          = $arganel->getPreco();
      $this->arganel['nome_categoria'] = $arganel->getNomeCategoria();

      $arganel_array['arganel'] = $this->arganel;
    /*  print_r($this->arganel);
      echo "<br/><br/>";
      print_r($arganel_array); */
      AddCookie($arganel_array);
    }

    public function mostrarArganelPer(){
    /*  foreach ($this->arganelPersonalizado as $produto ) {
        echo "<br/> Titulo: ". $produto->getTitulo();
        echo "<br/> Espada: ". $produto->getEspada();
      } */
    }

    public function finalizarPedido(){
      $itens =  array();
      $produto = array();
      $produto_add = array();
      if(isset($_COOKIE['meus_produtos'])){
        $meus_array = isset($_COOKIE['meus_produtos'])? $_COOKIE['meus_produtos'] : "";
        $meus_array = unserialize($meus_array);
        //echo "meus array: ".print_r($meus_array);
        foreach ($meus_array as $key => $valores) {
            //echo "<br/>Chave: ".$key;
            foreach ($valores as $resu) {
              //echo "<br/>resu dentro for each : ".print_r($resu);
            //  echo "<br/> imprimindo titulo: ".$resu['titulo'];
              $produto['title']       = $resu['titulo'];
              $produto['description'] = $resu['nome_categoria'];
              $produto['quantity']    = (int) $resu['quantidade'];
              $produto['currency_id'] = "BRL";
              $produto['unit_price']  = (float) $resu['preco'];
              $produto_add[] = $produto;
              $itens['items'] = $produto_add;
              unset($produto);
            }
        }

        //echo "<br/><br/>Resultado do items Array: ".print_r($itens);
        $mercadoPagoResu = addMecardoPago($itens);
        return $mercadoPagoResu;

      }else{
        //echo "cookie not set";
      }
    }



  }

  function AddCookie($array_produto){

    $meus_produtos = array();

    if(isset($_COOKIE['meus_produtos'])){
        $meu_array = isset($_COOKIE['meus_produtos'])? $_COOKIE['meus_produtos'] : "";
        $meu_array = unserialize($meu_array);
        $meu_array[] = $array_produto;
        //print_r($meu_array);
        $meu_array = serialize($meu_array);
        setcookie("meus_produtos",$meu_array,time()+60*60*24*100, "/");


    }else{
      //echo "<br/> array add cookie: ".print_r($array_produto);
      $meus_produtos[] = $array_produto;
      $meus_produtos = serialize($meus_produtos);
      setcookie("meus_produtos",$meus_produtos,time()+60*60*24*100, "/");

      //print_r(unserialize($meus_produtos));
    }

  }


  // ======================== Mercado Pago API ==================================

  function addMecardoPago($itens){
    $mp = new MP("8490968281337074", "15DAhJ8qRdIvq96ins2luqblE4wbmgKr");
    //echo "itens: ".print_r($itens);
    $pesoItens = calTamanhoPacote($itens);
    $itens['shipments'] = array(
                        		"mode" => "me2",
                        		"dimensions" => "5x11x16,".$pesoItens,
                            "local_pickup" => false

                        	);
    //echo "<br/>Intens completos: ".print_r($itens);

    //$mp->sandbox_mode(TRUE);
    $preference = $mp->create_preference($itens);
    //echo "<br/><br/> preference resu: ".print_r($preference);
    return $preference["response"]["init_point"];

  }

  function calTamanhoPacote($itens){
    $valorTotal = 0;
    $valorPesoArgael = 3;
    foreach ($itens as $key => $valores) {
        //echo "<br/>Chave: ".$key;
        foreach ($valores as $resu) {
          $valorTotal += $resu['quantity'];
        }
      }

      $valorPeso = $valorPesoArgael * $valorTotal;
    //  echo "<br/>Valor Total: ".$valorTotal;
      //echo "<br/>Valor Peso: ".$valorPeso;
      //echo "<br/>";
      return $valorPeso;

  }



 ?>
