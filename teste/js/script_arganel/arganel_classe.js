$(document).ready(function(){

  // arganel de amigo
  $('#u16807-4').click(function(){
      var arganelAmigo = new Object();
      arganelAmigo.titulo = "Arganel de Amigo";
      arganelAmigo.quantidade = "";
      arganelAmigo.preco = 5;
      arganelAmigo.descricao = "Arganel de Amigo";
      arganelAmigo.tipo = "amigo";

      console.log(arganelAmigo);

  });

  // arganel de companheiro
  $('#u16855-4').click(function(){
    var arganelCompanheiro = new Object();
      arganelCompanheiro.titulo = "Arganel de Companheiro";
      arganelCompanheiro.quantidade = "";
      arganelCompanheiro.preco = 5;
      arganelCompanheiro.descricao = "Arganel de Companheiro";
      arganelCompanheiro.tipo = "companheiro";

      console.log(arganelCompanheiro);

  });

  // arganel de pesquisador
  $('#u16875-4').click(function(){
    var arganelPesquisador = new Object();
      arganelPesquisador.titulo = "Arganel de Pesquisador";
      arganelPesquisador.quantidade = "";
      arganelPesquisador.preco = 5;
      arganelPesquisador.descricao = "Arganel de Pesquisador";
      arganelPesquisador.tipo = "Pesquisador";

      console.log(arganelPesquisador);
  });

  // arganel de Pioneiro
  $('#u16935-4').click(function(){
    var arganelPioneiro = new Object();
      arganelPioneiro.titulo = "Arganel de Pioneiro";
      arganelPioneiro.quantidade = "";
      arganelPioneiro.preco = 5;
      arganelPioneiro.descricao = "Arganel de Pioneiro";
      arganelPioneiro.tipo = "Pioneiro";

      console.log(arganelPioneiro);

  });

  // arganel de excursionista
  $('#u16898-4').click(function(){

    var arganelExcursionista = new Object();
      arganelExcursionista.titulo = "Arganel de Excurcionista";
      arganelExcursionista.quantidade = "";
      arganelExcursionista.preco = 5;
      arganelExcursionista.descricao = "Arganel de Excurcionista";
      arganelExcursionista.tipo = "Excursionista";

      console.log(arganelExcursionista);

  });

  // arganel de guia
  $('#u16895-4').click(function(){
    var arganelGuia = new Object();
      arganelGuia.titulo = "Arganel de Guia";
      arganelGuia.quantidade = "";
      arganelGuia.preco = 5;
      arganelGuia.descricao = "Arganel de Guia";
      arganelGuia.tipo = "Guia";

      console.log(arganelGuia);
  });

  // arganel de Lider Master
  $('#u16958-4').click(function(){
    var arganelLiderMaster = new Object();
      arganelLiderMaster.titulo = "Arganel de Lider Master";
      arganelLiderMaster.quantidade = "";
      arganelLiderMaster.preco = 5;
      arganelLiderMaster.descricao = "Arganel de Lider Master";
      arganelLiderMaster.tipo = "Lider Master";

      console.log(arganelLiderMaster);

  });

  // arganel de Lider Master Avançado
  $('#u16955-4').click(function(){
    var arganelLiderMasterAvan = new Object();
      arganelLiderMasterAvan.titulo = "Arganel de Lider Master Avançado";
      arganelLiderMasterAvan.quantidade = "";
      arganelLiderMasterAvan.preco = 5;
      arganelLiderMasterAvan.descricao = "Arganel de Lider Master Avançado";
      arganelLiderMasterAvan.tipo = "Lider Master Avançado";

      console.log(arganelLiderMasterAvan);

  });

});


function addChartArganel(obj){
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
