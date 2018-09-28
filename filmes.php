<?php
include 'aut.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Filmes | Pay For View</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'css.html'; ?>
  <script>

    $(document).ready(function(){
      $("#input_pesquisar").show();
      mostrar();
    });
    var intervalo = window.setInterval(esconder, 5000);
    function plano(plano){
      switch (plano){
        case 1: 
        $.notify({
         title: '<strong>Não está incluso no seu plano!</strong><br>',
         message: 'Você não tem acesso a esse conteudo, assine o Premium para obter.'
       },
       {
        placement: {
         from: 'top',
         align: 'right',

       },offset: {
        x: 5,
        y: 100
      },
      type: 'info',
      animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
      },
    });
        break;
        case 2: 
        $.notify({
         title: '<strong>Não está incluso no seu plano!</strong><br>',
         message: 'Você não tem acesso a esse conteudo, assine o Platina para obter.'
       },
       {
        placement: {
         from: 'top',
         align: 'right',

       },offset: {
        x: 5,
        y: 100
      },
      type: 'info',
      animate: {
        enter: 'animated fadeInRight',
        exit: 'animated fadeOutRight'
      },
    });
        break;
      }
    }
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
        data: {status: 1, id_user: }
      });
    }
    function notificacao() {
     var url="assets/connection/notify.php?l=filmes&id=";
     jQuery("#notificacao").load(url);
     status();
     $('#sino').addClass('btn-outline-danger');
     $('#sino').removeClass('btn-danger');
     $('#del').css({display: 'none'});
   }
   function cont_notify() {
     var url="assets/connection/cont_notify.php?id=";
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
      data: {id_filme: id_filme, comentario: comentario, id_user: },
      success: function(){
        var dir="assets/connection/comentarios.php?id=";
        var url = dir.concat(id_filme);
        jQuery("#com_body").load(url);
      }
    })
  }
  function apagar_comentario(id) {
    $.ajax({
      type: "POST",
      url: 'assets/connection/del_comentario.php',
      data: {id: id},
      success: function(){
        var dir="assets/connection/comentarios.php?id=";
        var url = dir.concat(id);
        $("#com_body").load(url);
      }
    })
    var id = "#com".concat(id);
    $(id).remove();
  }
  function like(id_filme){
    $.ajax({
      type: "POST",
      url: 'assets/connection/like.php',
      data: {id_filme: id_filme, id_user: },
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
      data: {id_filme: id_filme, id_user: },
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
</script>
</head>
<body class="other bg-dark" id="body">
  <!-- Navbar -->
  <div id="navbar" class="navbar navbar-inverse fixed-top bg-inverse">
    <div class="col-md-12">
      <nav style="background-color: rgba(0,0,0, 0.3);" class="navbar navbar-fixed-top headroom navbar-expand-lg">
        <!-- Logo -->
        <div class="col-md-1">
          <a class="" href="homepage.php">
            <img class="img-fluid" src="assets/img/oficialBW.png" style="width: 100%; background-color: transparent;">
          </a>
        </div>
        <!-- Logo End -->

        <!-- Base Nav-->
        <div class="col-md-4">
          <ul class="nav nav-tabs nav-pills nav-fill">
            <li class="nav-item">
              <a style="color:#fff;" class="nav-link" href="homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active bg-danger" href="filmes.php">Filmes</a>
            </li>
          </ul>
        </div>
        <div class="dropdown col-md">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user fa-fw"></i>
              <?php echo $_SESSION['nome']; echo " "; echo $_SESSION['sobrenome'];  ?>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="conta.php">Conta</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
          </div>
        </div>
        <div class="dropdown">
          <button id="sino" class="btn btn-outline-danger" onclick="notificacao()" data-toggle="dropdown" type="button" style="margin-left:3%;">
            <i class="far fa-bell fa-fw"></i>
            <span id="del" style="display: none;" class="badge badge-danger"></span>
          </button>
          <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuButton" style="height:4px; padding-top: 0;">
            <div class="card">
              <div class="card-header badge-danger" align="center">Notificações</div>
              <div id="notificacao" class="card-body bg-dark" style="height: 450px; overflow: auto;"></div>
            </div>
          </div>
        </div>
        <?php if($_SESSION['id_plano'] != 1){
          echo '<a style="margin-left: 1%;" href="conta.php?assinar=1" class="btn btn-danger">Adquira Premium</a>';
        } ?>
        <form id="form_buscar" action="pesquisa.php" method="GET" onmouseover="mostrar()" class="form-inline my-2 my-lg-0 col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-search fa-fw"></i></div>
            </div>
            <input id="input_pesquisar" name="s" onkeypress="mostrar()" class="form-control mr-sm-2" type="search" placeholder="Pesquisar..." aria-label="Search">
          </div>

        </form>
        <!-- Base Nav End -->
      </div>
    </nav>
  </div>
</div>
<!-- Navbar End -->

<!-- Container -->
<div class="container-fluid">
  <ul id="cd-gallery-items" class="cd-container">
    <?php 
    include 'connection/filmeObj.php';
    include 'connection/generoObj.php';
    $generos = $generoObj->selectGeneros(); 
    foreach ($generos as $result) {
      $filmes = $filmeObj->selectFilmesByGenero($result);
      if ($filmes == 0) {
        continue;
      }
      ?>
      <li>
        <ul class="cd-item-wrapper">
          <?php 
          shuffle($filmes);
          $filmes = $filmeObj->selectFilmes($filmes);
          $c = 0;
          $class = array(
            0 => 'cd-item-front',
            1 => 'cd-item-middle',
            2 => 'cd-item-back',
            3 => 'cd-item-out',
          );
          foreach ($filmes as $rs) {
            ?>
            <li class="<?php print $class[$c]; ?>"><a href="#0"><img src="../pay_for_view_root/assets/connection/bancodeimagens/<?php print $rs['capa_image']; ?>" alt="Preview image"></a></li>
            <?php
            if ($c >= 3) {
              $c = 3;
            }else{
              $c++;
            }
          } ?>
        </ul> <!-- cd-item-wrapper -->

        <div class="cd-item-info">
          <b><?php print $result['nome_genero']; ?></b>
        </div> <!-- cd-item-info -->

        <nav>
          <ul class="cd-item-navigation">
            <li><a class="cd-img-replace" href="#0">Prev</a></li>
            <li><a class="cd-img-replace" href="#0">Next</a></li>
          </ul>
        </nav>
      </li>
      <?php 
    }
    ?>
  </ul>
</div>
<script>$('#like').removeClass('far');</script>
<?php include 'script.html'; ?>
</body>
</html>
