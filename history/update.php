<?php
include '../connection.php';

$id_history = $_POST['id_history'] ?? null;
$id_user = $_POST['id_user'] ?? null;
$type = $_POST['type'] ?? null;
$date = $_POST['date'] ?? null;
$total = $_POST['total'] ?? null;
$details = $_POST['details'] ?? null;
$updated_at = $_POST['updated_at'] ?? null;

$sql_check = "SELECT * FROM history WHERE id_user = '$id_user' AND date = '$date' AND type = '$type'";

$result = $connect->query($sql_check);

if ($result->num_rows > 0) {
    echo json_encode(array(
        "success" => false,
        "message" => "date",
    ));
} else {
    $sql = "UPDATE history
               SET
               id_user = '$id_user',
               type = '$type',
               date = '$date',
               total = '$total',
               details = '$details',
               updated_at = '$updated_at'
               WHERE
               id_history = '$id_history' 
            ";

    $result = $connect->query($sql);

    if ($result) {
        echo json_encode(array(
            "success" => true,
        ));
    } else {
        echo json_encode(array(
            "success" => false,
            "message" => "gagal",
        ));
    }
}
