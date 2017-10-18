$(document).ready(function(){

  // arganel de amigo
  $('#u16807-4').click(function(){
      var arganelAmigo = new Object();
      arganelAmigo.titulo = "Arganel de Amigo";
      arganelAmigo.quantidade = $('#argamigo').val();
      arganelAmigo.preco = 5;
      arganelAmigo.descricao = "Arganel de Amigo";
      arganelAmigo.tipo = "amigo";

      console.log(arganelAmigo);
      addChartArganel(arganelAmigo);


  });

  $('#u16807-4').css('cursor','pointer');

  // arganel de companheiro
  $('#u16855-4').click(function(){
    var arganelCompanheiro = new Object();
      arganelCompanheiro.titulo = "Arganel de Companheiro";
      arganelCompanheiro.quantidade = $('#argcompanheiro').val();
      arganelCompanheiro.preco = 5;
      arganelCompanheiro.descricao = "Arganel de Companheiro";
      arganelCompanheiro.tipo = "companheiro";

      console.log(arganelCompanheiro);
      addChartArganel(arganelCompanheiro);
  });

  $('#u16855-4').css('cursor','pointer');

  // arganel de pesquisador
  $('#u16875-4').click(function(){
    var arganelPesquisador = new Object();
      arganelPesquisador.titulo = "Arganel de Pesquisador";
      arganelPesquisador.quantidade = $('#argpesquisador').val();
      arganelPesquisador.preco = 5;
      arganelPesquisador.descricao = "Arganel de Pesquisador";
      arganelPesquisador.tipo = "Pesquisador";

      console.log(arganelPesquisador);
      addChartArganel(arganelPesquisador);
  });

  $('#u16875-4').css('cursor','pointer');

  // arganel de Pioneiro
  $('#u16935-4').click(function(){
    var arganelPioneiro = new Object();
      arganelPioneiro.titulo = "Arganel de Pioneiro";
      arganelPioneiro.quantidade = $('#argpioneiro').val();
      arganelPioneiro.preco = 5;
      arganelPioneiro.descricao = "Arganel de Pioneiro";
      arganelPioneiro.tipo = "Pioneiro";

      console.log(arganelPioneiro);
      addChartArganel(arganelPioneiro);

  });

  $('#u16935-4').css('cursor','pointer');

  // arganel de excursionista
  $('#u16898-4').click(function(){

    var arganelExcursionista = new Object();
      arganelExcursionista.titulo = "Arganel de Excurcionista";
      arganelExcursionista.quantidade = $('#argexcursionista').val();
      arganelExcursionista.preco = 5;
      arganelExcursionista.descricao = "Arganel de Excurcionista";
      arganelExcursionista.tipo = "Excursionista";

      console.log(arganelExcursionista);
      addChartArganel(arganelExcursionista);

  });

  $('#u16898-4').css('cursor','pointer');

  // arganel de guia
  $('#u16895-4').click(function(){
    var arganelGuia = new Object();
      arganelGuia.titulo = "Arganel de Guia";
      arganelGuia.quantidade = $('#argguia').val();
      arganelGuia.preco = 5;
      arganelGuia.descricao = "Arganel de Guia";
      arganelGuia.tipo = "Guia";

      console.log(arganelGuia);
      addChartArganel(arganelGuia);
  });

  $('#u16895-4').css('cursor','pointer');

  // arganel de Lider Master
  $('#u16958-4').click(function(){
    var arganelLiderMaster = new Object();
      arganelLiderMaster.titulo = "Arganel de Lider Master";
      arganelLiderMaster.quantidade = $('#argLM').val();
      arganelLiderMaster.preco = 5;
      arganelLiderMaster.descricao = "Arganel de Lider Master";
      arganelLiderMaster.tipo = "Lider Master";

      console.log(arganelLiderMaster);
      addChartArganel(arganelLiderMaster);
  });

  $('#u16958-4').css('cursor','pointer');

  // arganel de Lider Master Avançado
  $('#u16955-4').click(function(){
    var arganelLiderMasterAvan = new Object();
      arganelLiderMasterAvan.titulo = "Arganel de Lider Master Avançado";
      arganelLiderMasterAvan.quantidade = $('#argLMA').val();
      arganelLiderMasterAvan.preco = 5;
      arganelLiderMasterAvan.descricao = "Arganel de Lider Master Avançado";
      arganelLiderMasterAvan.tipo = "Lider Master Avançado";

      console.log(arganelLiderMasterAvan);
      addChartArganel(arganelLiderMasterAvan);
  });

  $('#u16955-4').css('cursor','pointer');

});


function addChartArganel(obj){

  if($.isNumeric(obj.quantidade)){
    if(obj.quantidade > 0){
          var arganelAdd = new FormData();
          arganelAdd.append('titulo', obj.titulo);
          arganelAdd.append('nome_categoria', obj.descricao);
          arganelAdd.append('preco', obj.preco);
          arganelAdd.append('quantidade', obj.quantidade);
          arganelAdd.append('tipo', obj.tipo );

          $.ajax({
              type: 'post',
              processData: false,
              contentType: false,
              data: arganelAdd,
              url: 'backEnd/produtos/controller.php/adicionar/arganel',
              dataType: 'text',
              success: function(data){
                  atualizarContCart();
              }
          });
    }else{ alert('Por favor coloque números positivos'); }
  }else{ alert('Por favor digite apenas números'); }



}



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
