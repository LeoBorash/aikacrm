<?php
include "includes/db.php";

function almaty()
{
global $conn;
$query = $conn->query("
SELECT * FROM clients 
LEFT JOIN tasks
ON client_id = task_client_id
WHERE client_status = 'Алматы' 
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

function podtverzhden()
{
    global $conn;
    $query = $conn->query("
    SELECT * FROM clients 
    LEFT JOIN tasks
    ON client_id = task_client_id
    WHERE client_status = 'Подтвержден' 
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

?>

