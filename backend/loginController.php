<?php

session_start();

require "../../Takenlijst/config/conn.php";


if ($_POST['action'] === "login") {
    $email = $_POST['email'];
    $password = $_POST['password'];

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

    header("location: ../tasks/index.php");
}

if ($_POST['action'] === "register") {
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $checkEmailQuery = "SELECT * FROM users WHERE email = :email";
    $checkEmailStmt = $conn->prepare($checkEmailQuery);
    $checkEmailStmt->execute([
        ":email" => $email
    ]);

    if ($checkEmailStmt->rowCount() > 0) {
        die("Email bestaat al. Gebruik een ander emailadres.");
    }

    $query = "INSERT INTO users (fullname, email, password) VALUES (:fullname, :email, :password)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":fullname" => $fullName,
        ":email" => $email,
        ":password" => $hashedPassword
    ]);

    header("location: ../login.php?msg=account gemaakt!");
}

