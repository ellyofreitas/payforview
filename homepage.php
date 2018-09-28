<?php
include 'aut.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Home | Pay For View</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'css.html'; ?>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,400italic' rel='stylesheet' type='text/css'>
</head>
<body class="other bg-dark">
  <!-- Navbar -->
  <div id="navbar" class="navbar navbar-inverse fixed-top bg-inverse">
    <div class="">
      <nav style="background-color: rgba(0,0,0, 0.3);" class="navbar navbar-fixed-top headroom navbar-expand-lg">
        <!-- Logo -->
        <div class="col-md-1">
          <a class="" href="#">
            <img class="img-fluid" src="assets/img/oficialBW.png" style="width: 100%; background-color: transparent;">
            
          </a>
        </div>
        <!-- Logo End -->

        <!-- Base Nav-->
        <div class="col-md-4">
          <ul class="nav nav-tabs nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link active bg-danger" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a style="color:#fff;" class="nav-link" href="filmes.php">Filmes</a>
            </li>
          </ul>
        </div>
        <div class="dropdown mr-3">
          <div class="btn-group">
            <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-user fa-fw"></i>
              <?php print $session['nome'].' '.$session['sobrenome'];  ?>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="conta.php">Conta</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">Sair</a>
            </div>
          </div>
        </div>
        <div class="dropdown mr-3">
          <button id="sino" class="btn btn-outline-danger" onclick="notificacao()" data-toggle="dropdown" type="button">
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
        <?php if($session['id_plano'] != 2){
          print '<a href="conta.php?assinar=1" class="btn btn-danger mr-3">Adquira Premium</a>';
        } ?>
        <form id="form_buscar" action="pesquisa.php" method="GET" onmouseover="" class="form-inline">
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-search fa-fw"></i></div>
            </div>
            <input id="input_pesquisar" name="s" onkeyup="" class="form-control" type="search" placeholder="Pesquisar..." aria-label="Search">
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

</div>



<ul id="cd-gallery-items" class="cd-container">
  <?php 
  include 'connection/functionsObj.php'; 
  $filmes = $functionsObj->homepage();
  foreach ($filmes as $rs) {    
  ?>
  <li>
    <ul class="cd-item-wrapper">
      <li class="cd-item-front"><a href="#0"><img src="../pay_for_view_root/assets/connection/bancodeimagens/<?php print $rs['capa_image']; ?>" alt="Preview image"></a></li>
    </ul> <!-- cd-item-wrapper -->

    <div class="cd-item-info">
      <b><?php print $rs['titulo']; ?></b>
    </div> <!-- cd-item-info -->

    <nav>
      <ul class="cd-item-navigation">
        <li><a class="cd-img-replace" href="#0">Prev</a></li>
        <li><a class="cd-img-replace" href="#0">Next</a></li>
      </ul>
    </nav>

    <!--<a class="cd-3d-trigger cd-img-replace" href="a">Open</a>-->
  </li>
  <?php } ?>
</ul> <!-- cd-gallery-items -->
<?php include 'script.html'; ?>
</body>
</html>
