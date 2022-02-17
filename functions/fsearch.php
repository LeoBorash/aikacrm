<?php
function searchManager()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients WHERE 
        client_phone LIKE '%$_POST[search]%' OR 
        client_name LIKE '%$_POST[search]%' OR  
        client_status LIKE '%$_POST[search]%' OR 
        client_confirm LIKE '%$_POST[search]%' OR
        client_product LIKE '%$_POST[search]%' OR
        client_track LIKE '%$_POST[search]%'
    ");

    while ($row = mysqli_fetch_assoc($query)) {
        if (
            $row['client_status'] == 'В Оброботке' or
            $row['client_status'] == 'Перезвон' or
            $row['client_status'] == 'Ожидает' or
            $row['client_status'] == 'Заберут'
        ) {
            ?>
            <div class="status-div-log">

            <div class="float-left">
                <?php echo $_SESSION['c_se_man']?>
                <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
                <span><?= $row['client_product'] ?></span> <br>
                <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
                <span><?= $row['client_price'] ?>тг</span> <br>
                <span><?= $row['client_status'] ?></span>

            </div>
            <?php include "modal/tasks-modal.php"; ?>
            <?php
        }
    }
}

function searchOtpravka()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients WHERE 
        client_phone LIKE '%$_POST[search]%' OR 
        client_name LIKE '%$_POST[search]%' OR  
        client_status LIKE '%$_POST[search]%' OR 
        client_confirm LIKE '%$_POST[search]%' OR 
        client_product LIKE '%$_POST[search]%' OR
        client_track LIKE '%$_POST[search]%'
    ");

while ($row = mysqli_fetch_assoc($query)) {
if (
    $row['client_status'] == 'Алматы' or
    $row['client_status'] == 'Подтвержден'
) {
    ?>
    <div class="status-div-log">

    <div class="float-left">

        <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
        <span><?= $row['client_product'] ?></span> <br>
        <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
        <span><?= $row['client_price'] ?>тг</span> <br>
        <span><?= $row['client_status'] ?></span>

    </div>
    <?php include "modal/tasks-modal.php"; ?>
    <?php
}
}
}

function searchLogistik()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients WHERE 
        client_phone LIKE '%$_POST[search]%' OR 
        client_name LIKE '%$_POST[search]%' OR 
        client_status LIKE '%$_POST[search]%' OR 
        client_confirm LIKE '%$_POST[search]%' OR 
        client_product LIKE '%$_POST[search]%' OR
        client_track LIKE '%$_POST[search]%'
    ");

while ($row = mysqli_fetch_assoc($query)) {
if (
    $row['client_status'] == 'В Пути' or
    $row['client_status'] == 'Отказ'
) {
    ?>
    <div class="status-div-log">

    <div class="float-left">

        <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
        <span><?= $row['client_product'] ?></span> <br>
        <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
        <span><?= $row['client_price'] ?>тг</span> <br>
        <span><?= $row['client_status'] ?></span>

    </div>
    <?php include "modal/tasks-modal.php"; ?>
    <?php
        }
    }
}

function searchSuccess()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients WHERE 
        client_phone LIKE '%$_POST[search]%' OR 
        client_name LIKE '%$_POST[search]%' OR 
        client_status LIKE '%$_POST[search]%' OR 
        client_confirm LIKE '%$_POST[search]%' OR 
        client_product LIKE '%$_POST[search]%' OR
        client_track LIKE '%$_POST[search]%'
    ");

    while ($row = mysqli_fetch_assoc($query)) {
        if (
            $row['client_status'] == 'Вручено Ал' or
            $row['client_status'] == 'Вручено' or
            $row['client_status'] == 'Дубль'
        ) {
            ?>
            <div class="status-div-log">

            <div class="float-left">

                <span><?= substr($row['client_date'], 5, -3) ?> </span><br>
                <span><?= $row['client_product'] ?></span> <br>
                <a href="edit.php?id=<?= $row['client_id'] ?>"><?= mb_substr($row['client_name'], 0, 18) ?></a> <br>
                <span><?= $row['client_price'] ?>тг</span> <br>
                <span><?= $row['client_status'] ?></span>

            </div>
            <?php include "modal/tasks-modal.php"; ?>
            <?php
        }
    }
}