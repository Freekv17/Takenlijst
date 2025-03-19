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

    <main>
        <div class="wrapper">
            <div class="filterBar">
                <a href="<?php echo $base_url ?>/tasks/create.php">Maak nieuwe taak</a>
                <a href="<?php echo $base_url ?>/tasks/done.php">Afgeronde taken</a>
            </div>

            <?php

            require("../config/conn.php");

            $userID = $_SESSION['user_id'];

            $query = "SELECT * FROM takenlijst";

            $statement = $conn->prepare($query);
            $statement->execute();

            $table = $statement->fetchAll(PDO::FETCH_ASSOC);

            ?>
            <div class="tables">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Afdeling</th>
                        <th>Beschrijving</th>
                        <th>Status</th>
                        <th>Deadline</th>
                    </tr>
                    <tbody>
                        <?php foreach ($table as $item): ?>
                            <tr>
                                <td><?php echo $item['title']; ?></td>
                                <td><?php echo $item['afdeling']; ?></td>
                                <td><?php echo $item['beschrijving']; ?></td>
                                <td><?php echo $item['status']; ?></td>
                                <td><?php echo $item['deadline'] ? $item['deadline'] : 'geen deadline'; ?></td>
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