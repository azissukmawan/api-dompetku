<?php
    include '../connection.php';

    $id_history = $_POST['id_history'];

    $sql_check = "DELETE FROM history WHERE id_history = '$id_history'";

    $result = $connect->query($sql_check);

    if($result) {
        echo json_encode(array(
            "success" => true,
        ));
    } else {
        echo json_encode(array(
            "success" => false,
        ));
    }
?>