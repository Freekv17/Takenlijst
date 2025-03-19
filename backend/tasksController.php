<?php

session_start();
$action = $_POST['action'];

require "../../Takenlijst/config/conn.php";



if ($action === "create") {
    $title = $_POST['title'];
    $afdeling = $_POST['department'] ?? null;
    $status = "TODO";
    $datetime = (new DateTime())->format('Y-m-d H:i:s');
    $beschrijving = $_POST['beschrijving'] ?? null;
    $userID = $_SESSION['user_id'];
    $deadline = $_POST['deadline'] ?? null;


    $query = "INSERT INTO takenlijst (title, afdeling, user_id, beschrijving, status, datetime, deadline) VALUES (:title,:afdeling, :user_id, :beschrijving, :status, :datetime, :deadline)";
    $statement = $conn->prepare($query);
    $statement->execute([
        "title" => $title,
        "afdeling" => $afdeling,
        "user_id" => $userID,
        "beschrijving" => $beschrijving,
        "status" => $status,
        "datetime" => $datetime,
        "deadline" => $deadline
    ]);
    $tasks = $statement->fetch(PDO::FETCH_ASSOC);

    header("location: ../tasks/index.php");
    exit();
}


if ($action === "edit") {
}

if ($action === "delete") {
}
