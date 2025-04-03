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

    $queryTodo = "SELECT * FROM takenlijst WHERE status = 'todo' AND user_id = :user_id";
    $queryDoing = "SELECT * FROM takenlijst WHERE status = 'doing' AND user_id = :user_id";
    $queryDone = "SELECT * FROM takenlijst WHERE status = 'done' AND user_id = :user_id";

    $statementTodo = $conn->prepare($queryTodo);
    $statementTodo->execute([
        ':user_id' => $userID
    ]);

    $tableTodo = $statementTodo->fetchAll(PDO::FETCH_ASSOC);

    $statementDoing = $conn->prepare($queryDoing);
    $statementDoing->execute([
        ':user_id' => $userID
    ]);
    $tableDoing = $statementDoing->fetchAll(PDO::FETCH_ASSOC);

    $statementDone = $conn->prepare($queryDone);
    $statementDone->execute([
        ':user_id' => $userID
    ]);
    $tableDone = $statementDone->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <main class="tasksOverview">
        <div class="wrapper">
            <div class="filterBar">
                <div class="links">
                    <a href="<?php echo $base_url ?>/tasks/create.php"><i class="fa-solid fa-circle-plus plus"></i>Maak
                        nieuwe taak</a>
                    <a href="<?php echo $base_url ?>/tasks/done.php">Afgeronde taken<i
                            class="fa-solid fa-circle-arrow-right arrow"></i></a>
                </div>
                <div class="filters">
                    <h3>Filter</h3>
                    <div class="afdeling filter">
                        <label for="afdeling">Afdeling: </label>
                        <select name="department" id="department">
                            <option value="">- Kies een afdeling -</option>
                            <option value="personeel">personeel</option>
                            <option value="horeca">horeca</option>
                            <option value="techniek">techniek</option>
                            <option value="inkoop">inkoop</option>
                            <option value="klantenservice">klantenservice</option>
                            <option value="groen">groen</option>
                            <option value="attracties">attracties</option>
                        </select>
                    </div>
                    <div class="deadline filter">

                    </div>
                </div>
            </div>

            <div class="tables">
                <table class="table todo">
                    <thead>
                        <tr>
                            <th>To do</th>
                        </tr>
                    </thead>
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
                                    <a href="create.php"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <table class="table doing">
                    <thead>
                        <tr>
                            <th>Doing</th>
                        </tr>
                    </thead>
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
                                    <a href="create.php"><i class="fa-solid fa-pen"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <table class="table done">
                    <thead>
                        <tr>
                            <th>Done</th>
                        </tr>
                    </thead>
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
                                    <a href="create.php"><i class="fa-solid fa-pen"></i></a>

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