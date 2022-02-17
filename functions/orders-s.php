<?php
include "includes/db.php";

function vrucheno()
{
    global $conn;

    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status in('Вручено','Вручено Ал') 
    ORDER BY client_date DESC");

    while ($row = mysqli_fetch_assoc($query)) {
    ?>

    <div class="status-div-log">
        <div class="float-left">
            <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
            <span><?= $row['client_leo'] ?></span> <br>
            <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
            <span><?= $row['client_price'] ?>тг</span> <br>
            <span>
        <?php
        if ($row['client_oplata'] != '0') {
            echo '<i class="fas fa-hand-holding-usd"></i>' . ' ' . $row['client_oplata'];
        }
        ?>
        </span> <br>
            <span><?= $row['client_track'] ?></span>
        </div>
        <?php include "functions/modal/tasks-modal.php"; ?>

        <?php }
}

function success()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = '12.Успешные' 
    ORDER BY client_date DESC");
while ($row = mysqli_fetch_assoc($query)) {
    ?>

    <div class="status-div-man">
    <div class="float-left">
        <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
        <span><?= $row['client_leo'] ?></span> <br>
        <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
        <span><?= $row['client_price'] ?>тг</span> <br>

    </div>
    <?php include "functions/modal/tasks-modal.php"; ?>

<?php }
}

function poluchili()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = '13.Получили' 
    ORDER BY client_date DESC");
    while ($row = mysqli_fetch_assoc($query)) {
        ?>

        <div class="status-div-man">
        <div class="float-left">
            <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
            <span><?= $row['client_leo'] ?></span> <br>
            <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
            <span><?= $row['client_price'] ?>тг</span> <br>

        </div>
        <?php include "functions/modal/tasks-modal.php"; ?>

    <?php }
}

function dubl()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = 'Дубль' 
    ORDER BY client_date DESC");

    while ($row = mysqli_fetch_assoc($query)) {
        $rows = [];
        $query1 = $conn->query("
        SELECT client_phone FROM clients 
        WHERE 
        client_phone = '" . $row['client_phone'] . "' ");
        if ($query1->num_rows > 1) {
            $rows[] = 'text-danger';
        }
        ?>

        <div class="status-div-man">

        <div class="float-left">
            <?php foreach ($rows as $dss): ?>
                <span class='<?= $dss ?>'>Дубль</span>
            <?php endforeach; ?>
            <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
            <span><?= $row['client_leo'] ?></span> <br>
            <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
            <span><?= $row['client_price'] ?>тг</span> <br>

        </div>
        <?php include "functions/modal/tasks-modal.php"; ?>

    <?php }
}