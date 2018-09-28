<?php
include './connection.php';

$conn = getConnection();

$id_user_fk = $_GET['id'];

$sql = 'SELECT * FROM notificacao WHERE id_user_fk = ? AND status = 0';
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $id_user_fk);
$stmt->execute();
$row = $stmt->rowCount();
if ($row > 0) {
    echo $row;
    echo '
    <script>
    $("#del").css({display: "inline"});
    $("#sino").removeClass("btn-outline-danger");
    $("#sino").addClass("btn-danger");
    </script>';
}else{
    echo '<script>
    $("#del").css({display: "none"});
    $("#sino").removeClass("btn-danger");
    $("#sino").addClass("btn-outline-danger");
    </script>';
}
?>