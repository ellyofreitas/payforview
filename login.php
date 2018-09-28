<!DOCTYPE html>
<html>
<head>
  <title>Login | Pay For View</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'css.html'; ?>
</head>
<body class="bg-dark">
  <!-- Navbar -->
  <div id="navbar" style="background-color: transparent;" class="navbar navbar-inverse fixed-top bg-inverse">
   <div class="col-md-12">
    <nav class="navbar navbar-fixed-top headroom navbar-expand-lg">
     <!-- Logo -->
     <div class="col-md-2">
       <a class="" href="./"><img class="img-fluid" src="assets/img/oficialBW.png" style="width: 40%; background-color: transparent;">
       </a>
     </div>
     <!-- Logo End -->
   </div>
 </nav>
</div>
</div>
<!-- Navbar End -->
<div class="container center" style="padding-top: 100px;">
  <form style="background-color: rgba(0,0,0, 0.5);" class="form-control text-center" onsubmit="return false;" name="form">
    <label style="color: #fff;"><h2><strong>Faça seu login</strong></h2></label>

    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-envelope fa-fw"></i></div>
        </div>
        <input id="email" name="email" class="form-control" type="email" onblur="validarEmail()" placeholder="E-mail" required/>
        <div class="invalid-feedback">Por favor, insira um e-mail válido!</div>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key fa-fw"></i></div>
        </div>
        <input id="pass" class="form-control" type="password" onblur="validarSenha()" placeholder="Senha" required/>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon" onclick="show()"><i id="eye" class="fas fa-eye fa-fw"></i></div>
        </div>
        <div class="invalid-feedback">Senha inválida!</div>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <button class="btn btn-outline-danger" id="button" type="button"><i class="fas fa-sign-in-alt fa-fw"></i><strong style="color: #fff;">Entrar</strong></button>
      </div>
    </div>
  </form>
</div>
<div class="fixed-bottom">
  <button class="btn btn-danger float-right mb-3 mr-3" href="cadastro.php" data-toggle="modal" data-target="#cadastro">Ainda não tem cadastro? <strong> Cadastre-se agora!</strong></button>
</div>
<?php include 'modal_cadastro.html'; ?>
<?php include 'script.html'; ?>
</body>
</html>
