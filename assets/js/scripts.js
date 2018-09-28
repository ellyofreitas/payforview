    $(document).ready(function(){
      $("#input_pesquisar").show();
      mostrar();
    });
    var intervalo = window.setInterval(esconder, 5000);

    function esconder(){
      $("#input_pesquisar").hide("slow");
    };
    function mostrar(){
      $("#input_pesquisar").show("slow");
      clearTimeout(intervalo);
      intervalo = window.setInterval(esconder, 5000);
    };
    function status(){
      $.ajax({
        type: "POST",
        url: 'assets/connection/notify.php',
        data: {status: 1, id_user: <?php echo $session['id_user']; ?>}
      });
    }
    function notificacao() {
     var url="assets/connection/notify.php?l=homepage&id=<?php echo $session['id_user']; ?>";
     jQuery("#notificacao").load(url);
     status();
     $('#sino').addClass('btn-outline-danger');
     $('#sino').removeClass('btn-danger');
     $('#del').css({display: 'none'});
   }
   function cont_notify() {
     var url="assets/connection/cont_notify.php?id=<?php echo $session['id_user']; ?>";
     jQuery("#del").load(url);
   }
   window.setInterval('cont_notify()', 1);

   function comentarios(id) {
     var dir="assets/connection/comentarios.php?id=";
     url = dir.concat(id);
     jQuery("#com_body").load(url);
   }
   function comentar(id){
    comentarios(id);
    $('#comentarios').modal('show');
    $('#comentarios').val(id);
  }
  function comenta(){
    var comentario = $('#comentario').val();
    var id_filme = $('#comentarios').val();
    $('#comentario').val('');
    $.ajax({
      type: "POST",
      url: 'assets/connection/comentar.php',
      data: {id_filme: id_filme, comentario: comentario, id_user: <?php echo $session['id_user']; ?>},
      success: function(){
        var dir="assets/connection/comentarios.php?id=";
        url = dir.concat(id_filme);
        jQuery("#com_body").load(url);
      }
    })
  }
  function apagar_comentario(id) {
    $.ajax({
      type: "POST",
      url: 'assets/connection/del_comentario.php',
      data: {id: id}
    })
    var id = "#com".concat(id);
    $(id).remove();
  }
  function like(id_filme){
    $.ajax({
      type: "POST",
      url: 'assets/connection/like.php',
      data: {id_filme: id_filme, id_user: <?php echo $session['id_user']; ?>},
      success: function(){
        var url="assets/connection/cont_avaliacao.php?t=like&id=";
        var nurl = url.concat(id_filme);
        var id = "#nl".concat(id_filme);
        var i = "#like".concat(id_filme);
        $(id).load(nurl);
        $(i).removeClass("far");
        $(i).addClass("fas");

        url="assets/connection/cont_avaliacao.php?t=deslike&id=";
        nurl = url.concat(id_filme);
        id = "#nd".concat(id_filme);
        i = "#deslike".concat(id_filme);
        $(id).load(nurl);
        $(i).removeClass("fas");
        $(i).addClass("far");
      }
    });
  }
  function deslike(id_filme){
    $.ajax({
      type: "POST",
      url: 'assets/connection/deslike.php',
      data: {id_filme: id_filme, id_user: <?php echo $session['id_user']; ?>},
      success: function(){
        var url="assets/connection/cont_avaliacao.php?t=like&id=";
        var nurl = url.concat(id_filme);
        var id = "#nl".concat(id_filme);
        var i = "#like".concat(id_filme);
        $(id).load(nurl);
        $(i).addClass("far");
        $(i).removeClass("fas");

        url="assets/connection/cont_avaliacao.php?t=deslike&id=";
        nurl = url.concat(id_filme);
        id = "#nd".concat(id_filme);
        i = "#deslike".concat(id_filme);
        $(id).load(nurl);
        $(i).addClass("fas");
        $(i).removeClass("far");
      }
    })
  }
