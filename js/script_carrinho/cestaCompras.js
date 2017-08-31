$(document).ready(function(){
    $('#pu13603').children().remove();
    //$('#u12080').hide();

    $.ajax({
      type: 'get',
      url: 'backEnd/produtos/controller.php/pegarCarrinho',
      dataType: 'text',
      success: function(data){
        alert(data);
          $('#pu13603').append(data);
          $('#pu13603').css('padding','5%');
      }
    });

});
