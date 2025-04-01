<?php require_once("../config/conn.php") ?>
<?php require_once("../config/config.php") ?>
<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="en">


<?php require_once '../public/resources/views/components/head.php'; ?>


<body>
    <?php
    if (!isset($_SESSION['user_id'])) {
        $msg = 'Je moet eerst inloggen';
        header("Location: ../login.php?msg=$msg");
        exit;
    }
    ?>

    <?php require_once "../public/resources/views/components/header.php" ?>

    <?php

    $userID = $_SESSION['user_id'];

    $queryTodo = "SELECT * FROM takenlijst WHERE status = 'todo'";
    $queryDoing = "SELECT * FROM takenlijst WHERE status = 'doing'";
    $queryDone = "SELECT * FROM takenlijst WHERE status = 'done'";

    $statementTodo = $conn->prepare($queryTodo);
    $statementTodo->execute();
    $tableTodo = $statementTodo->fetchAll(PDO::FETCH_ASSOC);

    $statementDoing = $conn->prepare($queryDoing);
    $statementDoing->execute();
    $tableDoing = $statementDoing->fetchAll(PDO::FETCH_ASSOC);

    $statementDone = $conn->prepare($queryDone);
    $statementDone->execute();
    $tableDone = $statementDone->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <main class="tasksOverview">
        <div class="wrapper">
            <div class="filterBar">
                <a href="<?php echo $base_url ?>/tasks/create.php">Maak nieuwe taak</a>
                <a href="<?php echo $base_url ?>/tasks/done.php">Afgeronde taken</a>
            </div>

            <div class="tables">
                <table class="table todo">
                    <tbody>
                        <?php foreach ($tableTodo as $item): ?>
                            <tr>
                                <td>
                                    <div class="deadline">
                                        <p>Deadline </p>
                                        <p><?php echo $item['deadline'] ? $item['deadline'] : ''; ?></p>
                                    </div>

                                    <div class="taskCard">
                                        <h2><?php echo $item['title']; ?></h2>
                                        <p class="description"><?php echo $item['beschrijving']; ?></p>
                                        <p class="department"><?php echo $item['afdeling']; ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <table class="table doing">
                    <tbody>
                        <?php foreach ($tableDoing as $item): ?>
                            <tr>
                                <td>
                                    <div class="deadline">
                                        <p>Deadline </p>
                                        <p><?php echo $item['deadline'] ? $item['deadline'] : ''; ?></p>
                                    </div>

                                    <div class="taskCard">
                                        <h2><?php echo $item['title']; ?></h2>
                                        <p class="description"><?php echo $item['beschrijving']; ?></p>
                                        <p class="department"><?php echo $item['afdeling']; ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <table class="table done">
                    <tbody>
                        <?php foreach ($tableDone as $item): ?>
                            <tr>
                                <td>
                                    <div class="deadline">
                                        <p>Deadline </p>
                                        <p><?php echo $item['deadline'] ? $item['deadline'] : ''; ?></p>
                                    </div>

                                    <div class="taskCard">
                                        <h2><?php echo $item['title']; ?></h2>
                                        <p class="description"><?php echo $item['beschrijving']; ?></p>
                                        <p class="department"><?php echo $item['afdeling']; ?></p>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <?php require_once "../public/resources/views/components/footer.php" ?>
</body>



</html>