<?php require_once("../config/conn.php") ?>
<?php require_once("../config/config.php") ?>
<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="en">

<?php require_once '../public/resources/views/components/head.php'; ?>

<body>
    <?php require_once "../public/resources/views/components/header.php" ?>

    <main class="tasksOverview">
        <?php

        $userID = $_SESSION['user_id'];

        $queryDone = "SELECT * FROM takenlijst WHERE status = 'done' AND user_id = :user_id";

        $statementDone = $conn->prepare($queryDone);
        $statementDone->execute([
            ':user_id' => $userID
        ]);
        $tableDone = $statementDone->fetchAll(PDO::FETCH_ASSOC);

        ?>

        <div class="wrapper">
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
                                <div class="taskCard">
                                    <h2><?php echo $item['title']; ?></h2>
                                    <p class="description"><?php echo $item['beschrijving']; ?></p>

                                    <div class="tags">
                                        <p class="department"><?php echo $item['afdeling']; ?></p>
                                        <a href="./edit.php?id=<?php echo $item['id']; ?>">Bewerk <i
                                                class="fa-solid fa-pen"></i></a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php require_once "../public/resources/views/components/footer.php" ?>

</body>

</html>