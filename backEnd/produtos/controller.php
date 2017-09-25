<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require_once 'arganelPerso.class.php';
require_once 'arganel.class.php';
require_once 'lencos.class.php';
require_once 'chaveiro.class.php';
require 'carrinho.class.php';


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
//$app = new \Slim\App;

// ============================ Adicionar Produtos ====================================

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

$app->post('/adicionar/lenco', function(Request $request, Response $response){
    $request_array = $request->getParsedBody();

    $titulo        = $request_array['titulo'];
    $quantidade    = $request_array['quantidade'];
    $preco         = $request_array['preco'];
    $tipo          = $request_array['tipo'];
    $categoria     = $request_array['categoria'];

    $lenco = new Lencos();
    $lenco->setTitulo($titulo);
    $lenco->setQuantidade($quantidade);
    $lenco->setPreco($preco);

    $lenco->setTipo($tipo);
    $lenco->setCategoria($categoria);

    $carrinho = new CarrinhoCompras();
    $carrinho->addLencos($lenco);

    echo 'true';
});

$app->post('/adicionar/chaveiro', function(Request $request, Response $response){
  $request_array = $request->getParsedBody();

  $titulo     = $request_array['titulo'];
  $quantidade = $request_array['quantidade'];
  $preco      = $request_array['preco'];
  $tipo       = $request_array['tipo'];
  $categoria   = $request_array['categoria'];

  $chaveiro = new Chaveiro();
  $chaveiro->setTitulo($titulo);
  $chaveiro->setQuantidade($quantidade);
  $chaveiro->setPreco($preco);
  $chaveiro->setTipo($tipo);
  $chaveiro->setCategoria($categoria);

  $carrinho = new CarrinhoCompras();
  $carrinho->addChaveiro($chaveiro);

  echo 'true';

});

$app->get('/quantItens', function(Request $request, Response $response){
    $carrinho = new CarrinhoCompras();
    $resultado = $carrinho->quantidadeItens();
    echo $resultado;
});


$app->post('/finalizar/pagar', function (Request $request, Response $response){
    $request_array = $request->getParsedBody();
    $dados_cliente = array();
    $dados_cliente['cliente_nome']  = $request_array['nome_cliente'];
    $dados_cliente['cliente_email'] = $request_array['email_cliente'];
    $todosPedidos = new CarrinhoCompras();
    $resultado = $todosPedidos->finalizarPedido($dados_cliente);
    echo $resultado;
});

$app->get('/pegarCarrinho', function(Request $request, Response $response){

    $pegarCarrinho = new CarrinhoCompras();
    $resultado = $pegarCarrinho->montarCestaTotal();

    if(is_array($resultado)){
      foreach ($resultado as $value) {
          echo $value;
      }
    }else{ echo ""; }


});

$app->get('/pegarCarrinho/Total', function(Request $request, Response $response){

    $pegarCarrinho = new CarrinhoCompras();
    $resultado = $pegarCarrinho->montarValorTotalDaCesta();
    echo $resultado;

});

$app->post('/pegarCarrinho/Remove', function(Request $request, Response $response){

    $request_array = $request->getParsedBody();
    $chave = $request_array['chave'];
    $pegarCarrinho = new CarrinhoCompras();
    $resultado = $pegarCarrinho->RemoveitemCarrinho($chave);
    echo $resultado;

});

$app->get('/pegarCarrinho/EnviarEmail', function(Request $request, Response $response){

    $pegarCarrinho = new CarrinhoCompras();
    $resultado = $pegarCarrinho->EnviarEmailDetalhes();
    if($resultado){
      setcookie("meus_cliente","",time() -3600, "/");
      setcookie("meus_produtos","",time() -3600, "/");
      echo "true";
    }else{ echo "false"; }

});


$app->run();

 ?>
