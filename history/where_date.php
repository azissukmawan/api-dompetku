<?php
include '../connection.php';

$id_history = $_POST['id_history'] ?? null;
$id_user = $_POST['id_user'] ?? null;
$date = $_POST['date'] ?? null;

$sql_check = "SELECT * FROM history
                WHERE
                id_user = '$id_user' AND date = '$date' AND id_history = '$id_history'
                ORDER BY date DESC";

$result = $connect->query($sql_check);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode(array(
        "success" => true,
        "data" => $data[0]
    ));
} else {
    echo json_encode(array(
        "success" => false,
    ));
}
