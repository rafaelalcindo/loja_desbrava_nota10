<?php

function montarCesta($carrinho){
    //echo 'Meus pedidos: '.print_r($carrinho);

    $cestaMontada = array();
    $valTop = 0;

    foreach ($carrinho as $key => $valores) {
      foreach ($valores as $itens) {
        //echo '<br/> titulo: '.$itens['titulo']. ' Quantidade: '.$itens['quantidade'].' Preco: '.$itens['preco'].' Subtotal: '.$itens['preco'] * $itens['quantidade'] .'  Chave: '.$key;

        // ================================== Inicio da Página ==========================


        $cestaMontada [] = "<div class='clearfix grpelem' id='u15366' style='border-bottom: 2px solid #1a1a1a; margin-top: ".$valTop."%;   '><!-- group -->
         <div class='museBGSize grpelem shared_content' id='u14947' data-content-guid='u14947_content'><!-- simple frame --></div>
         <!-- m_editable region-id='editable-static-tag-U14952-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem shared_content' id='u14952-4' data-muse-uid='U14952' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14952-4_content'><!-- content -->
          <p>".$itens['titulo']."</p>
         </div>
         <!-- /m_editable -->
         <div class='clearfix grpelem shared_content' id='u14950' data-content-guid='u14950_content1'><!-- group -->
          <!-- m_editable region-id='editable-static-tag-U14953-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
          <div class='clearfix grpelem shared_content' id='u14953-4' data-muse-uid='U14953' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14953-4_content'><!-- content -->
           <p>".$itens['quantidade']."</p>
          </div>
          <!-- /m_editable -->
         </div>
         <!-- m_editable region-id='editable-static-tag-U14949-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem shared_content' id='u14949-4' data-muse-uid='U14949' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14949-4_content'><!-- content -->
          <p>R$</p>
         </div>
         <!-- /m_editable -->
         <!-- m_editable region-id='editable-static-tag-U14948-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem shared_content' id='u14948-4' data-muse-uid='U14948' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14948-4_content'><!-- content -->
          <p>".number_format($itens['preco'],2,',','.' )."</p>
         </div>
         <!-- /m_editable -->
         <!-- m_editable region-id='editable-static-tag-U14954-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem shared_content' id='u14954-4' data-muse-uid='U14954' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14954-4_content'><!-- content -->
          <p>R$</p>
         </div>
         <!-- /m_editable -->
         <!-- m_editable region-id='editable-static-tag-U14951-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem shared_content' id='u14951-4' data-muse-uid='U14951' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14951-4_content'><!-- content -->
          <p>". number_format($itens['preco'] * $itens['quantidade'], 2, ',','.')."</p>
         </div>
         <!-- /m_editable -->
         <!-- m_editable region-id='editable-static-tag-U14946-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
         <div class='clearfix grpelem shared_content' id='u14946-4' style='cursor: pointer;' onclick='removeItem(".$key.")' data-muse-uid='U14946' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u14946-4_content'><!-- content -->
          <p>X</p>
         </div>
         <!-- /m_editable -->
        </div>
        ";

              $valTop += 9;


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

      $TotalMontada = "<div class='clearfix colelem shared_content' id='pu13029-6' data-content-guid='pu13029-6_content'><!-- group -->
       <!-- m_editable region-id='editable-static-tag-U13029-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
       <div class='clearfix grpelem shared_content' id='u13029-6' data-muse-uid='U13029' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u13029-6_content'><!-- content -->
        <p id='u13029-2'>OBS: Para sua tranquilidade e segurança nosso sistema de pagamento é gerenciado pelo Mercado Pago.</p>
        <p id='u13029-4'>Para calcular o frete basta clicar em finalizar compra para inserir seu CEP e escolher a melhor opção.</p>
       </div>
       <!-- /m_editable -->
       <!-- m_editable region-id='editable-static-tag-U12829-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
       <div class='clearfix grpelem shared_content' id='u12829-4' data-muse-uid='U12829' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u12829-4_content'><!-- content -->
        <p>Total:</p>
       </div>
       <!-- /m_editable -->
       <!-- m_editable region-id='editable-static-tag-U12832-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
       <div class='clearfix grpelem shared_content' id='u12832-4' data-muse-uid='U12832' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u12832-4_content'><!-- content -->
        <p>".number_format($totalPagar,2,',','.')."</p>
       </div>
       <!-- /m_editable -->
      </div>
      <div class='colelem shared_content' id='u12835' data-content-guid='u12835_content'><!-- simple frame --></div>
      <!-- m_editable region-id='editable-static-tag-U12838-BP_infinity' template='carrinho.html' data-type='html' data-ice-options='disableImageResize,link,txtStyleTarget' -->
      <div class='clearfix colelem shared_content' id='u12838-4' style='cursor: pointer' onclick='finalizarCompra()'  data-muse-uid='U12838' data-muse-type='txt_frame' data-IBE-flags='txtStyleSrc' data-content-guid='u12838-4_content'><!-- content -->
       <p>FINALIZAR COMPRA</p>
      </div>";

      return $TotalMontada;

}

?>
