$(document).ready(function(){
  $.ajax({
    type: 'get',
    url: 'backEnd/produtos/controller.php/quantItens',
    dataType: 'text',
    success: function(data){

      if(data > 0){
        $('#u10666-4').children().remove();
        $('#u10666-4').append("<p>"+data+"</p>");
      }else{
        $('#u10666-4').children().remove();
        $('#u10666-4').append("<p>0</p>");
      }

    }
  });
});