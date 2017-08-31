$(document).ready(function(){
  // ============== seleciona cores Fundo==================================
  $('#u2386').click(function(){ $('#cor_fundo').val('azul'); });
  $('#u2391').click(function(){ $('#cor_fundo').val('branco'); });
  $('#u2389').click(function(){ $('#cor_fundo').val('cinza'); });
  $('#u2384').click(function(){ $('#cor_fundo').val('preto'); });
  $('#u2383').click(function(){ $('#cor_fundo').val('vermelho'); });

  // =============== seleciona cores borda ================================

  $('#u2419').click(function(){ $('#cor_borda').val('azul'); });
  $('#u2417').click(function(){ $('#cor_borda').val('branco'); });
  $('#u2413').click(function(){ $('#cor_borda').val('cinza'); });
  $('#u2416').click(function(){ $('#cor_borda').val('cinza_escuro'); });
  $('#u2414').click(function(){ $('#cor_borda').val('preto'); });

  // =================== selecione cores logo ===================

  $('#u2469').click(function(){ $('#cor_logo').val('branco'); });
  $('#u2477').click(function(){ $('#cor_logo').val('preto'); });
  $('#u2474').click(function(){ $('#cor_logo').val('cinza'); });
  $('#u2494').click(function(){ $('#cor_logo').val('cinza_escuro'); });
  $('#u2499').click(function(){ $('#cor_logo').val('preto'); });

  // ================== selecione cores espada ===============

  $('#u2493').click(function(){ $('#cor_espada').val('azul'); });
  $('#u2497').click(function(){ $('#cor_espada').val('branco'); });
  $('#u2500').click(function(){ $('#cor_espada').val('cinza'); });
  $('#u2494').click(function(){ $('#cor_espada').val('cinza_escuro'); });
  $('#u2499').click(function(){ $('#cor_espada').val('preto'); });

 // ================= Finalizar Pedido ================

 $('#addPersoArgPedido').click(function(){
   let cor_fundo  = $('#cor_fundo').val();
   let cor_borda  = $('#cor_borda').val();
   let cor_logo   = $('#cor_logo').val();
   let cor_espada = $('#cor_espada').val();
   let cores_juntas = cor_fundo+", ";
   cores_juntas += cor_borda+", ";
   cores_juntas += cor_logo+ ", ";
   cores_juntas += cor_espada;
   alert(cor_fundo);
   alert(cor_borda);
   alert(cor_logo);
   alert(cor_espada);
   alert(cores_juntas);
   let quant_arganel = $('#quant_arganel').val();

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
     }// fim do if

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
      alert(data);
      if(data > 0){
        $('#u10666-4').children().remove();
        $('#u10666-4').append("<p>"+data+"</p>");
      }
    }
  });
}
