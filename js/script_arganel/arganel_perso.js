

$(document).ready(function(){

  // ============== seleciona cores Fundo==================================
  $('#u2386').click(function(){ $('#cor_fundo').val('azul');  });
  $('#u2391').click(function(){ $('#cor_fundo').val('branco'); });
  $('#u2389').click(function(){ $('#cor_fundo').val('cinza'); });
  $('#u2384').click(function(){ $('#cor_fundo').val('preto'); });
  $('#u2383').click(function(){ $('#cor_fundo').val('vermelho'); });
  $('#u2382').click(function(){ $('#cor_fundo').val('Verde'); });
  $('#u2390').click(function(){ $('#cor_fundo').val('roxo'); });
  $('#u2385').click(function(){ $('#cor_fundo').val('rosa'); });
  $('#u2388').click(function(){ $('#cor_fundo').val('laranja'); });
  $('#u2387').click(function(){ $('#cor_fundo').val('amarelo'); });

  // =============== seleciona cores borda ================================

  $('#u2419').click(function(){ $('#cor_borda').val('azul claro'); });
  $('#u2417').click(function(){ $('#cor_borda').val('branco'); });
  $('#u2413').click(function(){ $('#cor_borda').val('cinza'); });
  $('#u2416').click(function(){ $('#cor_borda').val('cinza_escuro'); });
  $('#u2414').click(function(){ $('#cor_borda').val('preto'); });

  $('#u2412').click(function(){ $('#cor_borda').val('azul escuro'); });
  $('#u2424').click(function(){ $('#cor_borda').val('vermelho claro'); });
  $('#u2411').click(function(){ $('#cor_borda').val('vermelho'); });
  $('#u2420').click(function(){ $('#cor_borda').val('verde claro'); });
  $('#u2423').click(function(){ $('#cor_borda').val('verde escuro'); });
  $('#u2425').click(function(){ $('#cor_borda').val('roxo'); });
  $('#u2415').click(function(){ $('#cor_borda').val('rosa'); });
  $('#u2421').click(function(){ $('#cor_borda').val('laranja'); });
  $('#u2418').click(function(){ $('#cor_borda').val('amarelo claro'); });
  $('#u2422').click(function(){ $('#cor_borda').val('amarelo escuro'); });

  // =================== selecione cores logo ===================

  $('#u2469').click(function(){ $('#cor_logo').val('branco'); });
  $('#u2477').click(function(){ $('#cor_logo').val('preto'); });
  $('#u2474').click(function(){ $('#cor_logo').val('cinza'); });
  $('#u2465').click(function(){ $('#cor_logo').val('cinza_escuro'); });
  $('#u2471').click(function(){ $('#cor_logo').val('azul claro'); });

  $('#u2475').click(function(){ $('#cor_logo').val('azul escuro'); });
  $('#u2473').click(function(){ $('#cor_logo').val('vermelho claro'); });
  $('#u2476').click(function(){ $('#cor_logo').val('vermelho'); });
  $('#u2468').click(function(){ $('#cor_logo').val('verde claro'); });
  $('#u2464').click(function(){ $('#cor_logo').val('verde escuro'); });
  $('#u2467').click(function(){ $('#cor_logo').val('roxo'); });
  $('#u2466').click(function(){ $('#cor_logo').val('rosa'); });
  $('#u2478').click(function(){ $('#cor_logo').val('laranja'); });
  $('#u2470').click(function(){ $('#cor_logo').val('amarelo claro'); });
  $('#u2472').click(function(){ $('#cor_logo').val('amarelo'); });

  // ================== selecione cores espada ===============

  $('#u2493').click(function(){ $('#cor_espada').val('azul claro'); });
  $('#u2497').click(function(){ $('#cor_espada').val('branco'); });
  $('#u2500').click(function(){ $('#cor_espada').val('cinza'); });
  $('#u2494').click(function(){ $('#cor_espada').val('cinza_escuro'); });
  $('#u2499').click(function(){ $('#cor_espada').val('preto'); });

    $('#u2504').click(function(){ $('#cor_espada').val('azul escuro'); });
  $('#u2495').click(function(){ $('#cor_espada').val('vermelho claro'); });
  $('#u2502').click(function(){ $('#cor_espada').val('vermelho'); });
  $('#u2492').click(function(){ $('#cor_espada').val('verde claro'); });
  $('#u2505').click(function(){ $('#cor_espada').val('verde escuro'); });
  $('#u2503').click(function(){ $('#cor_espada').val('roxo'); });
  $('#u2498').click(function(){ $('#cor_espada').val('rosa'); });
  $('#u2496').click(function(){ $('#cor_espada').val('laranja'); });
  $('#u2491').click(function(){ $('#cor_espada').val('amarelo claro'); });
  $('#u2501').click(function(){ $('#cor_espada').val('amarelo escuro'); });

 // ================= Finalizar Pedido ================

 $('#u15523-4').click(function(){

   let cor_fundo  = " F: "+ $('#cor_fundo').val();
   let cor_borda  = " B: "+ $('#cor_borda').val();
   let cor_logo   = " L: "+ $('#cor_logo').val();
   let cor_espada = " E: "+ $('#cor_espada').val();
   let cores_juntas = cor_fundo+", ";
   cores_juntas += cor_borda+", ";
   cores_juntas += cor_logo+ ", ";
   cores_juntas += cor_espada;
  /* alert(cor_fundo);
   alert(cor_borda);
   alert(cor_logo);
   alert(cor_espada); */
   alert("O arganel Personalizado com as cores: "+cores_juntas+" foi acicionado ao carrinho");
   let quant_arganel = $('#quant_arganel').val();

   if($.isNumeric(quant_arganel)){
     if(quant_arganel >= 2 ){
       if(quant_arganel.trim() != ''){
           let data_test = new FormData();
           data_test.append('titulo', 'Arganel Personalizado '+cores_juntas);
           data_test.append('quantidade', quant_arganel);
           data_test.append('preco', 5.00);
           data_test.append('fundo', cor_fundo);
           data_test.append('borda', cor_borda);
           data_test.append('logo', cor_logo);
           data_test.append('espada', cor_espada);

            $.ajax({
                type: 'post',
                processData: false,
                contentType: false,
                data: data_test,
                url: 'backEnd/produtos/controller.php/adicionar/arganelPesonalizado',
                dataType: 'text',
                success: function(data){
                  //alert(data);
                  atualizarContCart();
                }
              });
         }// fim do if primeiro
     }else{ alert('Por favor, coloque no mínimo 2 arganeis!'); }
   }else{ alert('Por favor digite apenas números'); }



 });

  $('#finaPedido').click(function(){
    $.ajax({
      type: 'post',
      url: 'backEnd/produtos/controller.php/finalizar/pagar',
      dataType: 'text',
      success: function(data){
        alert(data);
        $MPC.openCheckout ({
            url: data,
            mode: 'modal',
            onreturn: function(data) {
                // execute_my_onreturn (Sólo modal)
              }
          });

        }

      });

  });







});

function atualizarContCart(){
  $.ajax({
    type: 'get',
    url: 'backEnd/produtos/controller.php/quantItens',
    dataType: 'text',
    success: function(data){
      //alert(data);
      if(data > 0){
        $('#u10666-4').children().remove();
        $('#u10666-4').append("<p>"+data+"</p>");
      }else{
        $('#u10666-4').children().remove();
        $('#u10666-4').append("<p>0</p>");
      }
    }
  });
}

function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}
