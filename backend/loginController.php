<?php

session_start();


$fullName = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

require "../../Takenlijst/config/conn.php";


$query = "SELECT * FROM users WHERE fullname = :fullname AND email = :email";
$statement = $conn->prepare($query);
$statement->execute([
    ":fullname" => $fullName,
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
