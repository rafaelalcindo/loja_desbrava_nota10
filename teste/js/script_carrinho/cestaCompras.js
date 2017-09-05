$(document).ready(function(){
    $('#u15372').children().remove();
    $('#u15360').children().remove();
    //$('#u12080').hide();
    //alert('entrou cesta');

    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho',
      dataType: 'text',
      success: function(data){
        //alert(data);
          $('#u15372').append(data);
          $('#u15372').css('padding','5%');
      }
    });

    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho/Total',
      dataType: 'text',
      success: function(data){
        //alert(data);
          $('#u15360').append(data);
      }
    });



});


function removeItem(chave){


    let key = new FormData();
    key.append('chave',chave);

    $.ajax({
      type: 'post',
      processData: false,
      contentType: false,
      data: key,
      url: 'backEnd/produtos/controller.php/pegarCarrinho/Remove',
      dataType: 'text',
      success: function(data){
          if(data == 'true'){

            RecarregarItens();
          }
      }
    });
  }

  function RecarregarItens(){

    $('#u15372').children().remove();
    $('#u15360').children().remove();



    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho',
      dataType: 'text',
      success: function(data){

          $('#u15372').append(data);
          $('#u15372').css('padding','5%');
      }
    });

    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho/Total',
      dataType: 'text',
      success: function(data){

          $('#u15360').append(data);
      }
    });

    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/quantItens',
      dataType: 'text',
      success: function(data){

        if(data > 0){
          $('#u10666-4').children().remove();
          $('#u10666-4').append("<p>"+data+"</p>");
        }
      }
    });

}

function finalizarCompra(){
  $.ajax({
    type: 'post',
    beforeSend: function(){
      $('#u12838-4').removeAttr('onclick');
      $('#u12838-4').children().remove();
      $('#u12838-4').append("<p>Carregando...</p>");
    },
    url: 'backEnd/produtos/controller.php/finalizar/pagar',
    dataType: 'text',
    success: function(data){
      $('#u12838-4').attr('onclick','finalizarCompra()');
      $('#u12838-4').children().remove();
      $('#u12838-4').append("<p>FINALIZAR COMPRA</p>");
      $MPC.openCheckout ({
          url: data,
          mode: 'modal',
          onreturn: function(data) {
              // execute_my_onreturn (Sólo modal)
            }
        });

      }

    });
}
