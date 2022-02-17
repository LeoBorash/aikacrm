<?php
$rows = [];

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE 
    MONTH(client_date) = MONTH (NOW()) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rows[$row['date']] ['total'] = $row['count'];
    $rows[$row['date']]['success'] = 0;
    $rows[$row['date']]['otkaz'] = 0;
    $rows[$row['date']]['vruch'] = 0;
}

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE  client_status 
    IN('Подтвержден','В Пути') AND
    MONTH(client_date) = MONTH (NOW()) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rows[$row['date']]['success'] = $row['count'];
}

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE  client_status 
    IN('Вручено','Вручено Ал') AND
    MONTH(client_date) = MONTH (NOW()) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rows[$row['date']]['vruch'] = $row['count'];
}

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE  client_status 
    IN('Отказ') AND
    MONTH(client_date) = MONTH (NOW()) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rows[$row['date']]['otkaz'] = $row['count'];
}

