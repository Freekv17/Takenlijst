<?php require_once("../config/conn.php"); ?>
<?php require_once("../config/config.php"); ?>
<?php session_start() ?>

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


    <?php require_once "../public/resources/views/components/header.php"; ?>

    <main class="tasksOverview">


        <?php

        $id = $_GET['id'];

        $query = "SELECT * FROM takenlijst WHERE user_id = :user_id AND id = :id";
        $statement = $conn->prepare($query);
        $statement->execute([
            ":user_id" => $_SESSION['user_id'],
            ":id" => $id
        ]);

        $table = $statement->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="wrapper">

            <form class="edit" action="../backend/tasksController.php" method="POST">
                <h2>Bewerk taak</h2>
                <input type="hidden" name="action" value="edit">
                <div class="form-group">
                    <label for="titel">Titel: </label>
                    <input type="text" name="title" id="title" value="<?php echo $table['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="beschrijving">Beschrijving: </label>
                    <input type="text" name="beschrijving" id="beschrijving"
                        value="<?php echo $table['beschrijving'] ?>">
                </div>
                <div class=" form-group">
                    <label for="deadline">Deadline:</label>
                    <input type="date" name="deadline" id="deadline" value="<?php echo $table['deadline'] ?>">
                </div>
                <div class="form-group">
                    <label for="afdeling">Afdeling: </label>
                    <select name="department" id="department">
                        <option value="">- Kies een afdeling -</option>
                        <option value="personeel" <?php if ($table['afdeling'] == 'personeel')
                                                        echo 'selected'; ?>>
                            personeel</option>
                        <option value="horeca" <?php if ($table['afdeling'] == 'horeca')
                                                    echo 'selected'; ?>>horeca
                        </option>
                        <option value="techniek" <?php if ($table['afdeling'] == 'techniek')
                                                        echo 'selected'; ?>>techniek
                        </option>
                        <option value="inkoop" <?php if ($table['afdeling'] == 'inkoop')
                                                    echo 'selected'; ?>>inkoop
                        </option>
                        <option value="klantenservice" <?php if ($table['afdeling'] == 'klantenservice')
                                                            echo 'selected'; ?>>klantenservice</option>
                        <option value="groen" <?php if ($table['afdeling'] == 'groen')
                                                    echo 'selected'; ?>>groen</option>
                        <option value="attracties" <?php if ($table['afdeling'] == 'attracties')
                                                        echo 'selected'; ?>>
                            attracties</option>
                    </select>
                </div>


                <div class="form-group">
                    <label for="status">Status: </label>
                    <select name="status" id="status">
                        <option value="">- Kies een afdeling -</option>
                        <option value="todo" <?php if ($table['status'] == 'todo')
                                                    echo 'selected'; ?>>ToDo</option>
                        <option value="doing" <?php if ($table['status'] == 'doing')
                                                    echo 'selected'; ?>>Doing</option>
                        <option value="done" <?php if ($table['status'] == 'done')
                                                    echo 'selected'; ?>>Done</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" value="Edit taak">
                </div>
            </form>

            <form class="delete" action="../backend/tasksController.php" method="POST">
                <div class="form-group delete">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $table['id']; ?>">
                    <input type="submit" value="Verwijder taak!">
                </div>
            </form>

        </div>


    </main>


    <?php require_once '../public/resources/views/components/footer.php'; ?>

</body>

</html>