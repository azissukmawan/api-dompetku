<?php
include '../connection.php';

$id_user = $_POST['id_user'] ?? null;
$type = $_POST['type'] ?? null;
$date = $_POST['date'] ?? null;

$sql_check = "SELECT * FROM history
                WHERE
                id_user = '$id_user' AND date = '$date' AND type = '$type'
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
