<?php

session_start();

require "../../Takenlijst/config/conn.php";

$afdeling = $_POST['department'] ?? null;
$status = "TODO";
$datetime = (new DateTime())->format('Y-m-d H:i:s');


$query = "INSERT INTO takenlijst (afdeling, status, datetime) VALUES (:afdeling, :status, :datetime)";
$statement = $conn->prepare($query);
$statement->execute([
    "afdeling" => $afdeling,
    "status" => $status,
    "datetime" => $datetime
]);
$tasks = $statement->fetch(PDO::FETCH_ASSOC);



header("location: ../index.php");
