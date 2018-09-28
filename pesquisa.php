<?php
session_start();
$pesquisa = filter_input(INPUT_GET, 's', FILTER_DEFAULT);
if ($pesquisa == "") {
  header("Location: filmes.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title> <?php echo $pesquisa; ?> | Pay For View</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Icon -->
  <link rel="shortcut icon" href="assets/img/oficial.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Glyphicon -->
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  <!-- Script's -->
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap-notify.js"></script>
  <script>
    $(document).ready(function(){
      $("#input_pesquisar").show();
      mostrar();
    });
    function plano(plano){
      switch (plano){
        case 1: 
        $.notify({
         title: '<strong>Não está incluso no seu plano!</strong><br>',
         message: 'Você não tem acesso a esse conteudo, assine o Premium para ter.'
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
         message: 'Você não tem acesso a esse conteudo, assine o Platina para ter.'
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
        data: {status: 1, id_user: <?php echo $_SESSION['id']; ?>}
      });
    }
    function notificacao() {
     var url="assets/connection/notify.php?l=pesquisa&s=<?php echo $pesquisa; ?>&id=<?php echo $_SESSION['id']; ?>";
     jQuery("#notificacao").load(url);
     status();
     $('#sino').addClass('btn-outline-danger');
     $('#sino').removeClass('btn-danger');
     $('#del').css({display: 'none'});
   }
   function cont_notify() {
     var url="assets/connection/cont_notify.php?id=<?php echo $_SESSION['id']; ?>";
     jQuery("#del").load(url);
   }
   window.setInterval('cont_notify()', 1);
   function like(id_filme){
    $.ajax({
      type: "POST",
      url: 'assets/connection/like.php',
      data: {id_filme: id_filme, id_user: <?php echo $_SESSION['id']; ?>},
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
      data: {id_filme: id_filme, id_user: <?php echo $_SESSION['id']; ?>},
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
      data: {id_filme: id_filme, comentario: comentario, id_user: <?php echo $_SESSION['id']; ?>},
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
 </script>
</head>
<body class="other bg-dark">
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
              <a style="color:#fff;" class="nav-link " href="filmes.php">Filmes</a>
            </li>
          </ul>
        </div>
        <div style="" class="col-md">
          <div class="btn-group dropright">
            <button type="button" class="btn btn-danger">
              <i class="fas fa-user fa-fw"></i>
              <?php echo $_SESSION['nome']; echo " "; echo $_SESSION['sobrenome'];  ?>
            </button>
            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <?php if($_SESSION['plano'] != 1){
          echo '<a style="margin-left: 1%;" href="conta.php?assinar=1" class="btn btn-danger">Adquira Premium</a>';
        } ?>
        <form id="form_buscar" action="pesquisa.php" method="GET" onmouseover="mostrar()" class="form-inline my-2 my-lg-0 col-md-6">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-search fa-fw"></i></div>
            </div>
            <input id="input_pesquisar" value="<?php echo $pesquisa; ?>" name="s" onkeypress="mostrar()" class="form-control mr-sm-2" type="search" placeholder="Pesquisar...">
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
  <div class="row" id="resultado">
    <?php

    include_once './assets/connection/connection.php';

    $conn = getConnection();
    
    $sql = "SELECT * FROM filme f JOIN plano_produtora pp ON f.produtora_fk = pp.id_produtora_fk JOIN produtora pr ON pr.id_produtora = pp.id_produtora_fk JOIN plano p ON pp.id_plano_fk = p.id_plano WHERE njunto LIKE '%$pesquisa%' OR titulo LIKE '%$pesquisa%' ORDER BY f.titulo, p.id_plano DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();
    $row = $stmt->rowCount();
    $antigo = 'Nada';
    if ($row > 0) {
      foreach ($resultSet as $rs){
      if ($antigo == $rs['id_filme']) {
        $antigo == $rs['id_filme'];
        continue;
      }else{
        if ($rs['id_plano'] >= $_SESSION['plano']) {
         echo '
         <div style="margin-top: 1%;" class="col-md-4 d-flex">
         <div class="card flex-fill">
         <a href="historico.php?s='.$pesquisa.'&l=pesquisa&id='.$rs['id_filme'].'"><img class="card-img-top" src="http://localhost/pay_for_view_root/assets/connection/bancodeimagens/'.$rs['capa_image'].'" alt="Card image cap"></a>
         <div class="card-body">
         <p class="card-text">'.$rs['titulo'].'
         <button class="btn btn-outline-dark float-right" type="button" data-toggle="collapse" data-target="#'.$rs['njunto'].'" aria-expanded="false" aria-controls="'.$rs['njunto'].'">
         Ver mais
         </button>
         </p>
         <div class="collapse" id="'.$rs['njunto'].'">
         <div>
         Nome produtora: '.$rs['nome_produtora'].'<br>
         Ano: '.$rs['ano'].'<br>Genero: ';
         $sql = "SELECT * FROM genero_filme gf JOIN genero g ON gf.id_genero_fk = g.id_genero  WHERE id_filme_fk = ?";

         $stmt = $conn->prepare($sql);
         $stmt->bindParam(1, $rs['id_filme']);

         $stmt->execute();

         $variable = $stmt->fetchAll();

         $nantigo = "Tanto Faz";

         foreach ($variable as $key) {
          if ($key['id_filme_fk'] == $nantigo) {
            echo ", ";
            echo $key['nome_genero'];
            $nantigo = $key['id_filme_fk'];
          }else{
            echo $key['nome_genero'];
            $nantigo = $key['id_filme_fk'];
          }
        }

        $sql = 'SELECT SUM(liked) as nl, SUM(desliked) as nd FROM avaliacao WHERE id_filme_fk = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $rs['id_filme']);
        $stmt->execute();
        $resultSet = $stmt->fetch();

        $sql = 'SELECT * FROM avaliacao WHERE id_filme_fk = ? AND id_user_fk = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $rs['id_filme']);
        $stmt->bindParam(2, $_SESSION['id']);
        $stmt->execute();
        $row = $stmt->rowCount();
        $res = $stmt->fetch();
        echo '
        <br>
        <div class="btn-group">
        <button class="btn btn-outline-primary" onclick="like('.$rs['id_filme'].')">
        <i id="like'.$rs['id_filme'].'" class="far fa-thumbs-up fa-fw"></i><span value="'.$resultSet['nl'].'" id="nl'.$rs['id_filme'].'">'.$resultSet['nl'].'</span></button>
        <button class="btn btn-outline-danger" onclick="deslike('.$rs['id_filme'].')">
        <i id="deslike'.$rs['id_filme'].'" class="far fa-thumbs-down fa-fw"></i><span value="'.$resultSet['nd'].'" id="nd'.$rs['id_filme'].'">'.$resultSet['nd'].'</span></button>
        </div>
        <button class="btn btn-outline-info float-right" onclick="comentar('.$rs['id_filme'].')"><i class="far fa-comment fa-fw"></i></button>';
        if($row > 0 && $res['liked'] == 1){
          echo '<script>$("#like'.$rs['id_filme'].'").addClass("fas");</script>';
        }elseif ($row > 0 && $res['desliked'] == 1) {
          echo '<script>$("#deslike'.$rs['id_filme'].'").addClass("fas");</script>';

        }
        echo '
        </div>
        </div>
        </div>
        </div>
        </div>';
      }else{
        echo '
        <div style="margin-top: 1%;" class="col-md-4 d-flex">
        <div class="card flex-fill">
        <img class="card-img-top" style="cursor: pointer; -webkit-filter: grayscale(100%);" onclick="plano('.$rs['id_plano'].')" src="http://localhost/pay_for_view_root/assets/connection/bancodeimagens/'.$rs['capa_image'].'" alt="Card image cap">
        <div class="card-body">
        <p class="card-text">'.$rs['titulo']; 
        
        if($rs['id_plano'] == 1){
          echo '<strong style="color: red;"> '.$rs['nome_plano'].'</strong>';
        }else{
          echo '<strong style="color: blue;"> '.$rs['nome_plano'].'</strong>';

        }

        echo '<button class="btn btn-outline-dark float-right" type="button" data-toggle="collapse" data-target="#'.$rs['njunto'].'" aria-expanded="false" aria-controls="'.$rs['njunto'].'">
        Ver mais
        </button>
        </p>
        <div class="collapse" id="'.$rs['njunto'].'">
        <div>
        Nome produtora: '.$rs['nome_produtora'].'<br>
        Ano: '.$rs['ano'].'<br>Genero: ';
        $sql = "SELECT * FROM genero_filme gf JOIN genero g ON gf.id_genero_fk = g.id_genero  WHERE id_filme_fk = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $rs['id_filme']);

        $stmt->execute();

        $variable = $stmt->fetchAll();

        $nantigo = "Tanto Faz";

        foreach ($variable as $key) {
          if ($key['id_filme_fk'] == $nantigo) {
            echo ", ";
            echo $key['nome_genero'];
            $nantigo = $key['id_filme_fk'];
          }else{
            echo $key['nome_genero'];
            $nantigo = $key['id_filme_fk'];
          }
        }

        $sql = 'SELECT SUM(liked) as nl, SUM(desliked) as nd FROM avaliacao WHERE id_filme_fk = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $rs['id_filme']);
        $stmt->execute();
        $resultSet = $stmt->fetch();

        $sql = 'SELECT * FROM avaliacao WHERE id_filme_fk = ? AND id_user_fk = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $rs['id_filme']);
        $stmt->bindParam(2, $_SESSION['id']);
        $stmt->execute();
        $row = $stmt->rowCount();
        $res = $stmt->fetch();
        echo '
        <br>
        <div class="btn-group">
        <button class="btn btn-outline-primary" onclick="like('.$rs['id_filme'].')">
        <i id="like'.$rs['id_filme'].'" class="far fa-thumbs-up fa-fw"></i><span value="'.$resultSet['nl'].'" id="nl'.$rs['id_filme'].'">'.$resultSet['nl'].'</span></button>
        <button class="btn btn-outline-danger" onclick="deslike('.$rs['id_filme'].')">
        <i id="deslike'.$rs['id_filme'].'" class="far fa-thumbs-down fa-fw"></i><span value="'.$resultSet['nd'].'" id="nd'.$rs['id_filme'].'">'.$resultSet['nd'].'</span></button>
        </div>
        <button class="btn btn-outline-info float-right" onclick="comentar('.$rs['id_filme'].')"><i class="far fa-comment fa-fw"></i></button>';
        if($row > 0 && $res['liked'] == 1){
          echo '<script>$("#like'.$rs['id_filme'].'").addClass("fas");</script>';
        }elseif ($row > 0 && $res['desliked'] == 1) {
          echo '<script>$("#deslike'.$rs['id_filme'].'").addClass("fas");</script>';

        }

        echo '</div>
        </div>
        </div>
        </div>
        </div>';
      }
      $antigo = $rs['id_filme'];
    }}
    }else{
        echo"<script>$.notify({
         title: '<strong>Nada foi encontrado!</strong><br>',
         message: 'Por favor, verifique se está tudo correto.'
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
    });</script>";
  }
?>
</div>
</div>
<div id="comentarios" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Comentários do filme</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card" id="com_body">
        </div>
        <form action="" style="margin-top: 1%;" class="form-control">
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-comment fa-fw"></i></div>
              </div>
              <textarea class="form-control" id="comentario" cols="50" rows="2"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="comenta()" class="btn btn-success">Comentar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
