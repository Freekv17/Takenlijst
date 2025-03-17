<?php

session_start();

if ($_POST['action'] === "login") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require "../../Takenlijst/config/conn.php";

    $query = "SELECT * FROM users WHERE email= :email";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":email" => $email
    ]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($statement->rowCount() < 1) {
        die("Account bestaat niet");
    }

    if (!password_verify($password, $user['password'])) {
        die("Wachtwoord bestaat niet");
    }

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['fullname'];

    header("location: ../index.php");
} elseif ($_POST['action'] === "register") {

    require "../../Takenlijst/config/conn.php";

    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":fullname" => $fullName,
        ":email" => $email,
        ":password" => $password
    ]);

    header("location: ../index.php");
}

