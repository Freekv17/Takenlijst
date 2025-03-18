<?php

session_start();
$action = $_POST['action'];

require "../../Takenlijst/config/conn.php";



if ($action === "create") {
    $afdeling = $_POST['department'] ?? null;
    $status = "TODO";
    $datetime = (new DateTime())->format('Y-m-d H:i:s');
    $beschrijving = $_POST['beschrijving'] ?? null;


    $query = "INSERT INTO takenlijst (afdeling, beschrijving, status, datetime) VALUES (:afdeling, :beschrijving, :status, :datetime)";
    $statement = $conn->prepare($query);
    $statement->execute([
        "afdeling" => $afdeling,
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
