<?php
    include '../connection.php';

    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $created_at = $_POST['created_at'] ?? null;
    $updated_at = $_POST['updated_at'] ?? null;

    if ($password !== null) {
        $password = md5($password);
    }

    $sql_check = "SELECT * FROM users WHERE email = '$email'";

    $result = $connect->query($sql_check);

    if($result->num_rows > 0) {
        echo json_encode(array(
            "success" => false,
            "message" => "email",
        ));
    } else {
        $sql = "INSERT INTO users
               SET
               name = '$name',
               email = '$email',
               password = '$password',
               created_at = '$created_at',
               updated_at = '$updated_at' 
            ";

        $result = $connect->query($sql);

        if($result) {
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
?>