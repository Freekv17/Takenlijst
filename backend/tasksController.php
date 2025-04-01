<?php

session_start();
$action = $_POST['action'];

require "../../Takenlijst/config/conn.php";

$userID = $_SESSION['user_id'];

$title = $_POST['title'];
if (empty($title)) {
    $errors[] = "Titel kan niet leeg zijn!";
}

$afdeling = $_POST['department'] ?? null;
if (empty($afdeling)) {
    $errors[] = "Kies een afdeling!";
}

$status = "TODO";
$datetime = (new DateTime())->format('Y-m-d H:i:s');

$beschrijving = $_POST['beschrijving'] ?? null;
if (empty($beschrijving)) {
    $errors[] = "Beschrijving kan niet leeg zijn!";
}

$deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : null;

if ($action === "create") {


    $query = "INSERT INTO takenlijst (title, afdeling, user_id, beschrijving, status, datetime, deadline) VALUES (:title,:afdeling, :user_id, :beschrijving, :status, :datetime, :deadline)";
    $statement = $conn->prepare($query);
    $statement->execute([
        "title" => $title,
        "afdeling" => $afdeling,
        "user_id" => $userID,
        "beschrijving" => $beschrijving,
        "status" => $status,
        "datetime" => $datetime,
        "deadline" => $deadline,
    ]);
    $tasks = $statement->fetch(PDO::FETCH_ASSOC);

    if (isset($errors)) {
        var_dump($errors);
        die();
    }

    header("location: ../tasks/index.php");
    exit();
}


if ($action === "edit") {

    $id = $_POST['id'];

    $query = "UPDATE takenlijst 
              SET title = :title, beschrijving = :beschrijving, afdeling = :afdeling, deadline = :deadline 
              WHERE user_id = :user_id";

    $statement = $conn->prepare($query);
    $statement->execute([
        ":title" => $title,
        ":beschrijving" => $beschrijving,
        ":afdeling" => $afdeling,
        ":deadline" => $deadline,
        ":user_id" => $userID,
    ]);

    header("location: ../tasks/index.php");
    exit();
}


if ($action === "delete") {
}
