<!DOCTYPE html>
<html>
<head>
  <title>Cadastro | Pay For View</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Icon -->
  <link rel="shortcut icon" href="assets/img/oficial.png">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/pretty-checkbox.min.css">
  <!-- Script's -->
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/mask.min.js"></script>
  <script src="assets/js/bootstrap-notify.min.js"></script>
  <script src="assets/js/validator.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
     $('.cpf').mask('000.000.000-00', {reverse: true});
     $('.money').mask('000.000.000.000.000,00', {reverse: true});
     $('[data-toggle="popover"]').popover();
     $('[data-toggle="tooltip"]').tooltip();
   });
    function validate(){

      var pass = document.getElementById("pass");
      var confirm = document.getElementById("confirm");

      if (pass.value != confirm.value){
        $('#modalConfirm').modal('toggle');
        $.notify({
          title: '<strong>Ops!</strong>',
          message: 'As senhas não estão iguais, por favor verifique'
        },{
          type: 'warning'
        });
        $(document).ready(function(){
          $("#pass").addClass("is-invalid");
          $("#confirm").addClass("is-invalid");
        });
        return false;
      }
      if(jQuery('input[type=checkbox][class=icheck]:checked').length == 0){
        $('#modalConfirm').modal('toggle');
        $.notify({
          title: '<strong>Ops!</strong>',
          message: 'Marque alguma opção de gênero'
        },{
          type: 'warning'
        });
        return false;
      }
      if(jQuery('input[type=radio][class=icheck]:checked').length == 0){
        $('#modalConfirm').modal('toggle');
        $.notify({
          title: '<strong>Ops!</strong>',
          message: 'Marque alguma opção em plano'
        },{
          type: 'warning'
        });
        return false;
      }
    }
  </script>
  <!-- Glyphicon -->
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
</head>
<body class="other" style="background: url('http://localhost/bancodeimagens/index9.jpg') no-repeat;">
  <div class="fixed-bottom">
    <a href="login.php" class="btn btn-danger float-right mb-3 mr-3">Já tem cadastro? <strong>Acesse já!</strong></a>
  </div>
  <!-- Navbar -->
  <div id="navbar" style="background-color: transparent;" class="navbar navbar-inverse fixed-top bg-inverse">
    <div class="col-md-12">
      <nav class="navbar navbar-fixed-top headroom navbar-expand-lg">
        <!-- Logo -->
        <div class="col-md-2">
          <a class="navbar-brand" href="index.php"><img class="img-fluid" src="assets/img/oficial.png" style="width: 40%; background-color: transparent;">
          </a>
        </div>
        <!-- Logo End -->
      </div>
    </nav>
  </div>
</div>
<!-- Navbar End -->
<div class="container">
  <form style="margin-top: 1%; background-color: rgba(0,0,0, 0.5);" class="form-control" action="assets/connection/cad_user.php" method="POST" onsubmit="return validate()">
    <label class=""><h3><strong style="color: #fff;">Preencha com seus dados: </strong></h3></label>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user fa-fw"></i></div>
        </div>
        <input style="margin-right: 5px; border-bottom-right-radius: 100px;" class="form-control" type="text" name="nome" placeholder="Nome" required/>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-user fa-fw"></i></div>
        </div>
        <input style="border-bottom-right-radius: 100px;" class="form-control" type="text" name="sobrenome" placeholder="Sobrenome" required/>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-credit-card fa-fw"></i></div>
        </div>
        <input style="border-bottom-right-radius: 100px;" class="form-control money" name="cartao" placeholder="Número do cartão" required/>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-envelope fa-fw"></i></div>
        </div>
        <input style="margin-right: 5px; border-bottom-right-radius: 100px;" class="form-control" type="email" name="email" placeholder="Email" required/>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-list-ol fa-fw"></i></div>
        </div>
        <input style="border-bottom-right-radius: 100px;" class="form-control cpf" name="cpf" placeholder="CPF" required/>
      </div>
    </div>

    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key fa-fw"></i></div>
        </div>
        <input id="pass" style="margin-right: 5px; border-bottom-right-radius: 100px;" class="form-control" type="password" placeholder="Senha" required/>
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon"><i class="fas fa-key fa-fw"></i></div>
        </div>
        <input id="confirm" style="border-bottom-right-radius: 100px;" class="form-control" type="password" name="senha" placeholder="Confirme a senha" required/>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Gênero:</div>
          <div class="card-body badge-light" style="border-bottom-right-radius: 100px; ">
            <?php
            include './assets/connection/connection.php';

            $conn = getConnection();

            $sql = "SELECT * FROM genero ORDER BY nome_genero ASC";

            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();

            foreach ($result as $value) {
              echo "<div class='pretty p-icon p-curve p-tada'>
              <input class='icheck' type='checkbox' name='genero".$value['id_genero']."'>
              <div class='state p-danger-o'>
              <i class='icon fas fa-check fa-fw'></i>
              <label>".$value['nome_genero']."</label>
              </div>
              </div>";
            }
            ?>
            <a data-toggle="popover" title="Introdução sobre gêneros: " data-content="Os gêneros que escolher vai nos ajudar a definir qual conteúdo será relevante lhe mostrar!"><i class="fas fa-info fa-fw"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text" id="btnGroupAddon">Plano:</div>
          <div class="card-body badge-light " style="border-bottom-right-radius: 100px; ">
            <?php
            include_once './assets/connection/connection.php';

            $conn = getConnection();

            $sql = "SELECT * FROM plano ORDER BY id_plano ASC";

            $stmt = $conn->prepare($sql);

            $stmt->execute();

            $result = $stmt->fetchAll();
            foreach ($result as $value) {
              echo "
              <div data-toggle='tooltip' title='".$value['nome_plano']."' class='pretty p-icon p-round p-rotate p-jelly'>
              <input class='icheck' autocomplete='off' type='radio' name='plano' value='".$value['id_plano']."''/>
              <div class='state p-danger'>
              <i class='icon fas fa-ticket-alt fa-fw'></i>
              <label>".$value['nome_plano']."</label>
              </div>
              </div>";
            }
            ?>
            <a data-toggle="popover" title="Introdução sobre planos: " data-content="Seu plano irá definir quais conteúdos você tem direito, então escolha o melhor que melhor encaixa em seu perfil! Obs: passe o mouse sobre cada plano para uma breve informação"><i class="fas fa-info fa-fw"></i></a>
          </div>
        </div>
      </div>
    </div>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirm">
      <i class="fas fa-sign-in-alt fa-fw"></i>Cadastrar
    </button>

    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deseja salvar suas informações?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required/>
              <label class="form-check-label" for="defaultCheck1">
                Concordo com todos os termos!
              </label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" type="button" class="btn btn-success">Salvar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
</body>
</html>
