<?php

session_start();
$action = $_POST['action'];

require "../../Takenlijst/config/conn.php";



if ($action === "create") {
    $afdeling = $_POST['department'] ?? null;
    $status = "TODO";
    $datetime = (new DateTime())->format('Y-m-d H:i:s');
    $beschrijving = $_POST['beschrijving'] ?? null;
    $userID = $_SESSION['user_id'];


    $query = "INSERT INTO takenlijst (afdeling, user_id, beschrijving, status, datetime) VALUES (:afdeling, :user_id, :beschrijving, :status, :datetime)";
    $statement = $conn->prepare($query);
    $statement->execute([
        "afdeling" => $afdeling,
        "user_id" => $userID,
        "beschrijving" => $beschrijving,
        "status" => $status,
        "datetime" => $datetime
    ]);
    $tasks = $statement->fetch(PDO::FETCH_ASSOC);

    header("location: ../tasks/index.php");
    exit();
}


if ($action === "edit") {
}

if ($action === "delete") {
}
