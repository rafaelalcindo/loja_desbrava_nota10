<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require_once 'arganelPerso.class.php';
require_once 'arganel.class.php';
require 'carrinho.class.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
//$app = new \Slim\App;

$app->post('/adicionar/arganelPesonalizado', function (Request $request, Response $response) {

  $request_array = $request->getParsedBody();

  $titulo = $request_array['titulo'];
  $quantidade = $request_array['quantidade'];
  $preco = $request_array['preco'];
  $fundo  = $request_array['fundo'];
  $borda  = $request_array['borda'];
  $logo   = $request_array['logo'];
  $espada = $request_array['espada'];

  $arganelPers = new ArganelPerso();

  $arganelPers->setTitulo($titulo);
  $arganelPers->setQuantidade($quantidade);
  $arganelPers->setPreco($preco);

  $arganelPers->setFundo($fundo);
  $arganelPers->setBorda($borda);
  $arganelPers->setLogo($logo);
  $arganelPers->setEspada($espada);

  $carrinho = new CarrinhoCompras();
  $carrinho->addArganelPer($arganelPers);

  echo  'true';


});

$app->post('/adicionar/arganel', function (Request $request, Response $response) {

  $request_array = $request->getParsedBody();
  $tipo          = $request_array['tipo'];
  $nomeCategoria = $request_array['nome_categoria'];

  $titulo     = $request_array['titulo'];
  $quantidade = $request_array['quantidade'];
  $preco      = $request_array['preco'];

  $arganel = new Arganel();
  $arganel->setTipo($tipo);
  $arganel->setNomeCategoria($nomeCategoria);
  $arganel->setTitulo($titulo);
  $arganel->setQuantidade($quantidade);
  $arganel->setPreco($preco);

  $carrinho = new CarrinhoCompras();
  $carrinho->addArganel($arganel);

  echo 'true';

});


$app->post('/finalizar/pagar', function (Request $request, Response $response){
    $todosPedidos = new CarrinhoCompras();
    $resultado = $todosPedidos->finalizarPedido();
    echo $resultado;
});





$app->run();

 ?>
