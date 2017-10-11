$(document).ready(function(){
    $('#pu27505').children().remove();
    $('#u15360').children().remove();
    //$('#u12080').hide();
    //alert('entrou cesta');

    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho',
      dataType: 'text',
      success: function(data){
        //alert(data);
          $('#pu27505').append(data);
          //$('#u15372').css('padding','5%');
      },
      complete: function(){
        $.ajax({
            type: 'get',
            url: 'backEnd/produtos/controller.php/pegarCarrinho/Total',
            dataType: 'text',
            success: function(data){
              //alert(data);
                $('#pu27505').append(data);
            }
          });
      }
    });



    $('#u9728').css('margin-top', '60px');
    var corpoModal = modalCorpo();
    //alert(corpoModal);
    $('body').append(corpoModal);

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

    $('#pu27505').children().remove();
    $('#u15360').children().remove();



    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho',
      dataType: 'text',
      success: function(data){

          $('#pu27505').append(data);
        //  $('#u15372').css('padding','5%');
      },
      complete: function(){
          $.ajax({
            type: 'get',
            url: 'backEnd/produtos/controller.php/pegarCarrinho/Total',
            dataType: 'text',
            success: function(data){

                $('#pu27505').append(data);
            }
          });
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

  $('#finalizarPedido').modal('show');

  /*
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
    }); */
}


function comprar_pedido(){
  $('#finalizarPedido').modal('hide');
  let email_cliente = $('#email_cliente').val();
  let nome_cliente  = $("#nome_cliente").val();

  let data_fina = new FormData();
  data_fina.append('email_cliente', email_cliente);
  data_fina.append('nome_cliente', nome_cliente);

  if(email_cliente.trim() != '' && nome_cliente.trim() != ''){
      $.ajax({
        type: 'post',
        processData: false,
				contentType: false,
        data: data_fina,
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
                if (data.collection_status=='approved'){
                  $.ajax({
                        type: 'get',
                        url: 'backEnd/produtos/controller.php/pegarCarrinho/EnviarEmail',
                        dataType: 'text',
                        success: function(data){
                          if(data == 'true'){
                            window.location.href = 'obrigado.html';
                          }
                        }
                      });
                  }else if(data.collection_status=='in_process'){
                    $.ajax({
                          type: 'get',
                          url: 'backEnd/produtos/controller.php/pegarCarrinho/EnviarEmail',
                          dataType: 'text',
                          success: function(data){
                            if(data == 'true'){
                              window.location.href = 'obrigado.html';
                            }
                          }
                        });
                  }else if(data.collection_status=='pending'){
                    $.ajax({
                          type: 'get',
                          url: 'backEnd/produtos/controller.php/pegarCarrinho/EnviarEmail',
                          dataType: 'text',
                          success: function(data){
                            if(data == 'true'){
                              window.location.href = 'obrigado.html';
                            }
                          }
                        });
                  }
                }
            });

          }

        });
  }else{
    alert('Porfavor digite todos os campos!');
  }

}









// ============================ modal ==============================


function modalCorpo(){
  let modalBody = "<div class='modal' id='finalizarPedido'>";
  modalBody += "<div class='modal-dialog' role='document'>";
  modalBody += "<div class='modal-content'>";
  modalBody += "<div class='modal-header'>";
  modalBody += "<h5 class='modal-title'>Preencha os dados abaixo</h5>";
  modalBody += "<button type='button' class='close' data-dismiss='modal' aria-label='Clos'>";
  modalBody += "<span aria-hidden='true'>&times;</span>";
  modalBody += "</button>";
  modalBody += "</div>";
  modalBody += "<div class='modal-body'>";
  modalBody += "<h3>Falta Pouco</h3>";
  modalBody += "<h4>Por favor digite os campos abaixo.</h4>";
  modalBody += "<div class='form-group'>";
  modalBody += "<label for='email_cliente'>Digite seu email:</label>";
  modalBody += "<input type='email' class='form-control' id='email_cliente' aria-describedby='emailHelp' placeholder='Email'>";
  modalBody += "</div>";
  modalBody += "<div class='form-group'>";
  modalBody += "<label for='nome_cliente'>Nome</label>";
  modalBody += "<input type='text' class='form-control' id='nome_cliente' placeholder='Nome'>";
  modalBody += "</div>";
  modalBody += "</div>";
  modalBody += "<div class='modal-footer'>";
  modalBody += "<button type='button' id='comprar_pedido' onclick='comprar_pedido()'  class='btn btn-primary'>Finalizar Pedido</button>";
  modalBody += "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>";
  modalBody += "</div>";
  modalBody += "</div>";
  modalBody += "</div>";
  modalBody += "</div>";

  return modalBody;

}
