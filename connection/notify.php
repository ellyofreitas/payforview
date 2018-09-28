<?php 
include './connection.php';
$conn = getConnection();
session_start();
if (isset($_POST['status']) && isset($_POST['id_user'])) {
    $id_user = $_POST['id_user'];
    $sql = 'UPDATE notificacao SET status = 1 WHERE id_user_fk = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id_user);
    $stmt->execute();    
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $l = $_GET['l'];
    $sql = 'SELECT * FROM notificacao n JOIN filme f ON n.id_filme_fk = f.id_filme JOIN plano_produtora pp ON f.produtora_fk = pp.id_produtora_fk WHERE n.id_user_fk = ? ORDER BY n.id_notificacao DESC, pp.id_plano_fk DESC';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $row = $stmt->rowCount();
    $resultSet = $stmt->fetchAll();
    $id_filme_fk = 'null';
    if ($row > 0) {
        foreach ($resultSet as $rs) {
            if ($id_filme_fk == $rs['id_filme_fk']) {
                $id_filme_fk = $rs['id_filme_fk'];
                continue;
            }else{
                $id_filme_fk = $rs['id_filme_fk'];
                if($rs['id_plano_fk'] >= $_SESSION['plano']){
                    if(isset($_GET['s'])){
                        $s = $_GET['s'];
                        if ($rs['status'] == 1) {
                            echo '
                            <a class="card alert badge-danger" href="historico.php?s='.$s.'&l='.$l.'&id='.$rs['id_filme'].'" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';
                        }else{
                            echo '
                            <a class="card alert badge-primary" href="historico.php?s='.$s.'&l='.$l.'&id='.$rs['id_filme'].'" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';

                        }
                    }else{
                        if ($rs['status'] == 1) {
                            echo '
                            <a class="card alert badge-danger" href="historico.php?l='.$l.'&id='.$rs['id_filme'].'" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';
                        }else{
                            echo '
                            <a class="card alert badge-primary" href="historico.php?l='.$l.'&id='.$rs['id_filme'].'" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';

                        }
                    }
                }else{
                    if(isset($_GET['s'])){
                        $s = $_GET['s'];
                        if ($rs['status'] == 1) {
                            echo '
                            <a class="card alert badge-secondary" href="#" onclick="plano('.$rs['id_plano_fk'].')" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';
                        }else{
                            echo '
                            <a class="card alert badge-primary" href="#" onclick="plano('.$rs['id_plano_fk'].')" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';

                        }
                    }else{
                        if ($rs['status'] == 1) {
                            echo '
                            <a class="card alert badge-danger" href="#" onclick="plano('.$rs['id_plano_fk'].')" style="width: 480px;" background-color:gold;>
                            <strong><i class="fas fa-lock fa-fw"></i></strong>
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';
                        }else{
                            echo '
                            <a class="card alert badge-primary" href="#" onclick="plano('.$rs['id_plano_fk'].')" style="width: 480px;">
                            Novo filme adicionado:<br>'.$rs['titulo'].'
                            </a>';

                        }
                    }
                }
            }
        }
    }else{
        echo '
        <div class="alert badge-danger" role="alert" style="width: 480px;">
        <center>Não há notificacoes :(</center>
        </div>';
    }
}


?>
