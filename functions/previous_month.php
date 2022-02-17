<?php
// WHERE DATE(created_at) BETWEEN '2008-08-14' AND '2008-08-23';

$rowse = [];

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE 
    MONTH(client_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rowse[$row['date']] ['last_total'] = $row['count'];
    $rowse[$row['date']]['last_success'] = 0;
    $rowse[$row['date']]['last_otkaz'] = 0;
    $rowse[$row['date']]['last_vruch'] = 0;
}

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE  client_status 
    IN('Подтвержден','В Пути') AND
    MONTH(client_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rowse[$row['date']]['last_success'] = $row['count'];
}

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE  client_status 
    IN('Вручено','Вручено Ал') AND
    MONTH(client_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rowse[$row['date']]['last_vruch'] = $row['count'];
}

$query = $conn->query("
    SELECT count(*) as `count`, DATE(client_date) AS `date`
    FROM clients 
    WHERE  client_status 
    IN('Отказ') AND
    MONTH(client_date) = MONTH(DATE_ADD(NOW(), INTERVAL -1 MONTH)) AND 
    YEAR(client_date) = YEAR (NOW())
    GROUP BY `date` DESC
");

while ($row = mysqli_fetch_assoc($query)) {
    $rowse[$row['date']]['last_otkaz'] = $row['count'];
}

