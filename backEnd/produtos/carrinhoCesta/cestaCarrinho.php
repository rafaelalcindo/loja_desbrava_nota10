<?php

function montarCesta($carrinho){
    //echo 'Meus pedidos: '.print_r($carrinho);

    $cestaMontada = array();
    $valTop = 7;
    $caminhoImg = '';

    foreach ($carrinho as $key => $valores) {
      foreach ($valores as $itens) {
        //echo '<br/> titulo: '.$itens['titulo']. ' Quantidade: '.$itens['quantidade'].' Preco: '.$itens['preco'].' Subtotal: '.$itens['preco'] * $itens['quantidade'] .'  Chave: '.$key;

        // ================================== Inicio da Página ==========================
        $caminhoImg = imagemProduto($itens['titulo']);


        $cestaMontada[] = "<div class='clearfix colelem' id='u27505' style='margin-top: ".$valTop."% ' ><!-- column -->
         <div class='clearfix colelem' id='pu26504'><!-- group -->
          <div class='rounded-corners clearfix grpelem' id='u26504'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U26519-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='rounded-corners clearfix grpelem' id='u26519-4' data-muse-uid='U26519' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>".$itens['titulo']."</p>
           </div>
           <!-- /m_editable -->
           <div class='museBGSize rounded-corners grpelem' style='background-image: url(images/".$caminhoImg.".png )' id='u14947'><!-- simple frame --></div>
          </div>
          <div class='clearfix grpelem' id='u26906'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U14946-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='rounded-corners clearfix grpelem' id='u14946-4' style='cursor: pointer;' onclick='removeItem(".$key.")' data-muse-uid='U14946' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>X</p>
           </div>
           <!-- /m_editable -->
           <!-- m_editable region-id='editable-static-tag-U12225-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u12225-4' data-muse-uid='U12225' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>PRODUTO</p>
           </div>
           <!-- /m_editable -->
          </div>
         </div>
         <div class='clearfix colelem' id='pu26459'><!-- group -->
          <div class='clearfix grpelem' id='u26459'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U26468-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u26468-4' data-muse-uid='U26468' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>DESCRIÇÃO</p>
           </div>
           <!-- /m_editable -->
          </div>
          <div class='clearfix grpelem' id='u26507'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U14952-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u14952-4' data-muse-uid='U14952' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>".$itens['nome_categoria']."</p>
           </div>
           <!-- /m_editable -->
          </div>
         </div>
         <div class='clearfix colelem' id='pu26498'><!-- group -->
          <div class='clearfix grpelem' id='u26498'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U26471-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u26471-4' data-muse-uid='U26471' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>QUANTIDADE</p>
           </div>
           <!-- /m_editable -->
          </div>
          <div class='clearfix grpelem' id='u26513'><!-- group -->
           <div class='clearfix grpelem' id='u14950'><!-- group -->
            <!-- m_editable region-id='editable-static-tag-U14953-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
            <div class='clearfix grpelem' id='u14953-4' data-muse-uid='U14953' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
             <p>".$itens['quantidade']."</p>
            </div>
            <!-- /m_editable -->
           </div>
          </div>
         </div>
         <div class='clearfix colelem' id='pu26465'><!-- group -->
          <div class='clearfix grpelem' id='u26465'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U26474-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u26474-4' data-muse-uid='U26474' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>PREÇO</p>
           </div>
           <!-- /m_editable -->
          </div>
          <div class='clearfix grpelem' id='u26501'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U14949-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u14949-4' data-muse-uid='U14949' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>R$</p>
           </div>
           <!-- /m_editable -->
           <!-- m_editable region-id='editable-static-tag-U14948-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u14948-4' data-muse-uid='U14948' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>".number_format($itens['preco'],2,',','.' )."</p>
           </div>
           <!-- /m_editable -->
          </div>
         </div>
         <div class='clearfix colelem' id='pu26477'><!-- group -->
          <div class='rounded-corners clearfix grpelem' id='u26477'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U26480-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u26480-4' data-muse-uid='U26480' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>SUBTOTAL</p>
           </div>
           <!-- /m_editable -->
          </div>
          <div class='rounded-corners clearfix grpelem' id='u26510'><!-- group -->
           <!-- m_editable region-id='editable-static-tag-U14954-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u14954-4' data-muse-uid='U14954' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>R$</p>
           </div>
           <!-- /m_editable -->
           <!-- m_editable region-id='editable-static-tag-U14951-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
           <div class='clearfix grpelem' id='u14951-4' data-muse-uid='U14951' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
            <p>".number_format($itens['preco'] * $itens['quantidade'], 2, ',','.')."</p>
           </div>
           <!-- /m_editable -->
          </div>
         </div>
        </div>";



        //====================================== Fim da Pagina ======================

      }
    }

    //$cestaMontada[] =  '';

    return $cestaMontada;

}






function mostrarCestaTotal($carrinho){
      $TotalMontada;
      $totalPagar = 0;
      $SubTotal = 0;

      foreach ($carrinho as $key => $valores) {
        foreach ($valores as $itens) {
          $SubTotal = $itens['quantidade'] * $itens['preco'];
          $totalPagar += $SubTotal;
        }
      }

      $TotalMontada = "
      <div class='clearfix colelem' id='u15363'><!-- group -->
       <div class='clearfix grpelem' id='u15360'><!-- column -->
        <!-- m_editable region-id='editable-static-tag-U13029-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
        <div class='clearfix colelem' id='u13029-6' data-muse-uid='U13029' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
         <p id='u13029-2'>OBS: Para sua tranquilidade e segurança nosso sistema de pagamento é gerenciado pelo Mercado Pago.</p>
         <p id='u13029-4'>Para calcular o frete basta clicar em finalizar compra para inserir seu CEP e escolher a melhor opção.</p>
        </div>
        <!-- /m_editable -->
        <div class='clearfix colelem' id='pu12829-4'><!-- group -->
         <!-- m_editable region-id='editable-static-tag-U12829-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem' id='u12829-4' data-muse-uid='U12829' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
          <p>Total:  </p>
         </div>
         <!-- /m_editable -->
         <!-- m_editable region-id='editable-static-tag-U12832-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem' id='u12832-4' data-muse-uid='U12832' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
          <p> &nbsp&nbspR$ ".number_format($totalPagar,2,',','.')."</p>
         </div>
         <!-- /m_editable -->
        </div>
        <div class='colelem' id='u12835'><!-- simple frame --></div>
        <!-- m_editable region-id='editable-static-tag-U12838-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
        <div class='clearfix colelem' id='u12838-4' style='cursor: pointer' onclick='finalizarCompra()' data-muse-uid='U12838' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc'><!-- content -->
         <p>FINALIZAR COMPRA</p>
        </div>
        <!-- /m_editable -->
       </div>
      </div>";

      return $TotalMontada;

}




function imagemProduto($titulo){
    $caminho = '';
    if($titulo == 'Arganel de Amigo'){ return $caminho = 'argamigo'; }
    else if( $titulo == 'Arganel de Companheiro'){ return $caminho = 'argcompa'; }
    else if( $titulo == 'Arganel de Pesquisador'){ return $caminho = 'argpesq'; }
    else if( $titulo == 'Arganel de Pioneiro'){ return $caminho = 'argpion'; }
    else if( $titulo == 'Arganel de Excurcionista'){ return $caminho = 'argexcu'; }
    else if( $titulo == 'Arganel de Guia'){ return $caminho = 'argguia'; }
    else if( $titulo == 'Arganel de Lider Master'){ return $caminho = 'arglimaster'; }
    else if( $titulo == 'Arganel de Lider Master Avançado'){ return $caminho = 'arglimastav'; }
    else{ return $caminho = 'imgqualquer'; }
}

?>
