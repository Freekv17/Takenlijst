<?php require_once("../config/conn.php") ?>
<?php require_once("../config/config.php") ?>
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

    <?php require_once "../public/resources/views/components/header.php" ?>

    <?php
    $userID = $_SESSION['user_id'];

    $selectedDepartment = isset($_GET['department']) ? $_GET['department'] : '';

    $queryTodo = "SELECT * FROM takenlijst WHERE status = 'todo' AND user_id = :user_id";
    $queryDoing = "SELECT * FROM takenlijst WHERE status = 'doing' AND user_id = :user_id";
    $queryDone = "SELECT * FROM takenlijst WHERE status = 'done' AND user_id = :user_id";

    $filter = [':user_id' => $userID];
    if (!empty($selectedDepartment)) {
        $queryTodo .= " AND afdeling = :afdeling";
        $queryDoing .= " AND afdeling = :afdeling";
        $queryDone .= " AND afdeling = :afdeling";

        $filter[':afdeling'] = $selectedDepartment;
    }

    $statementTodo = $conn->prepare($queryTodo);
    $statementTodo->execute($filter);
    $tableTodo = $statementTodo->fetchAll(PDO::FETCH_ASSOC);

    $statementDoing = $conn->prepare($queryDoing);
    $statementDoing->execute($filter);
    $tableDoing = $statementDoing->fetchAll(PDO::FETCH_ASSOC);

    $statementDone = $conn->prepare($queryDone);
    $statementDone->execute($filter);
    $tableDone = $statementDone->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <main class="tasksOverview">
        <div class="wrapper">
            <div class="bar">
                <div class="links">
                    <a href="<?php echo $base_url ?>/tasks/create.php"><i class="fa-solid fa-circle-plus plus"></i>Maak
                        nieuwe taak</a>
                    <a href="<?php echo $base_url ?>/tasks/done.php">Afgeronde taken<i
                            class="fa-solid fa-circle-arrow-right arrow"></i></a>
                </div>
                <div class="filterBar">
                    <h3>Filter</h3>
                    <form method="GET" action="">
                        <select name="department" id="department" onchange="this.form.submit()">
                            <option value="">- Kies een afdeling -</option>
                            <option value="personeel">personeel</option>
                            <option value="horeca">horeca</option>
                            <option value="techniek">techniek</option>
                            <option value="inkoop">inkoop</option>
                            <option value="klantenservice">klantenservice</option>
                            <option value="groen">groen</option>
                            <option value="attracties">attracties</option>
                        </select>
                        <button type="submit" name="department" value="">Reset Filter</button>
                    </form>
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
                                    <?php
                                    $deadline = $item['deadline'];
                                    $isOverdue = $deadline && $deadline < date('Y-m-d');
                                    ?>

                                    <?php if ($isOverdue): ?>
                                        <div class="dueDate overdue">
                                            <p>Deadline gemist!</p>
                                            <p><?php echo $deadline; ?></p>
                                        </div>
                                    <?php else: ?>
                                        <div class="dueDate onTime">
                                            <p>Deadline:</p>
                                            <?php echo $deadline; ?>
                                        </div>
                                    <?php endif; ?>

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
                                    <?php
                                    $deadline = $item['deadline'];
                                    $isOverdue = $deadline && $deadline < date('Y-m-d');
                                    ?>

                                    <?php if ($isOverdue): ?>
                                        <div class="dueDate overdue">
                                            <p>Deadline gemist!</p>
                                            <p><?php echo $deadline; ?></p>
                                        </div>
                                    <?php else: ?>
                                        <div class="dueDate onTime">
                                            <p>Deadline:</p>
                                            <?php echo $deadline; ?>

                                        </div>
                                    <?php endif; ?>

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
                                    <div class="dueDate completed">
                                        <p>Deadline gehaald!</p>
                                    </div>
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
        </div>
    </main>


    <?php require_once "../public/resources/views/components/footer.php" ?>
</body>



</html>