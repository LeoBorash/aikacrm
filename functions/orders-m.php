<?php
include "includes/db.php";

function obrobotke()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = 'В Оброботке' 
    ORDER BY client_date DESC");

    while ($row = mysqli_fetch_assoc($query)) {
        $rows = [];
        $query1 = $conn->query("
        SELECT client_phone FROM clients 
        WHERE client_status = 'В Оброботке' AND
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

function perezvon()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = 'Перезвон' 
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

function ozhidaet()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = 'Ожидает' 
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

function zaberut()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = 'Заберут' 
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

