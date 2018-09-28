<!DOCTYPE html>
<html>
    <head>
        <title>Modal Evento | Recocicle</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Icon -->
        <link rel="shortcut icon" href="">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap-reboot.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/animate.css">
        <!-- Glyphicon -->
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <!-- Script's -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-notify.js"></script>

    </head>
  <body class="badge-dark">
    <div class="container center">
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target=".bd-example-modal-lg">Adicionar Evento</button>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header badge-success">
                        <label><h2><strong>Preencha dados do seu evento!</strong></h2></label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body badge-dark">
                        <form style="background-color: rgba(0,0,0, 0.3);" class="form-control text-center" action="assets/connection/login_user.php" method="POST">
                            <label style="color: #fff;"><h2><strong>Criar Evento</strong></h2></label>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Nome:</div>
                                </div>
                                <input class="form-control" type="text" name="nome_evento" placeholder="Nome" required/>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Conteúdo:</div>
                                </div>
                                <input class="form-control" type="text" name="conteudo" placeholder="Conteúdo" required/>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Profissionais:</div>
                                </div>
                                <input class="form-control" type="text" name="profissinais_evento" placeholder="Profissionais">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Imagens:</div>
                                </div>
                                <input class="form-control" type="file" name="profissinais_evento" placeholder="Profissionais">
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Data Evento:</div>
                                </div>
                                <input class="form-control" type="date" name="data_evento" placeholder="Data Evento" required/>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Horario:</div>
                                </div>
                                <input class="form-control" type="time" name="horario_evento" placeholder="Horario" required/>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text" id="btnGroupAddon">Resumo:</div>
                                </div>
                                <textarea class="form-control" name="resumo_evento" placeholder="Horario" required/></textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                            <div class="form-group">
                              <div class="input-group">
                                <button type="submit" class="btn btn-outline-success"><i class="fas fa-sign-in-alt fa-fw"></i><strong>Adicionar Evento</strong></button>
                              </div>
                              </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div> 
        </div>
      
    </div>