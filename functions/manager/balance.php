<?php

    global $conn;
    $query = $conn->query("
    SELECT count(client_status) as obr,SUM(client_price) as sobr FROM clients 
    WHERE client_status IN('В Оброботке','Перезвон','Ожидает','Заберут','Алматы') ");
    $row = mysqli_fetch_assoc($query);
    $neobrobot = $row['obr'];
    $sneobrobot = $row['sobr'];


//------------------------------------------ Необроботанные заявки

$query = $conn->query("
    SELECT count(client_status) as postu, SUM(client_price) as spostu FROM clients 
    WHERE client_status IN('Подтвержден','В Пути')  AND
    MONTH(client_date) = MONTH(NOW()) AND 
    YEAR (client_date) = YEAR(NOW())");
$postu = mysqli_fetch_assoc($query);

$query = $conn->query("
    SELECT count(client_status) as otkaz, SUM(client_price) as sotkaz FROM clients 
    WHERE client_status IN('Отказ','13.Получили') AND
    MONTH(client_date) = MONTH(NOW()) AND 
    YEAR (client_date) = YEAR(NOW())");
$otkaz = mysqli_fetch_assoc($query);

$query = $conn->query("
    SELECT count(client_status) as usp, SUM(client_price) as susp FROM clients 
    WHERE client_status IN('Вручено Ал','Вручено') AND
    MONTH(client_date) = MONTH(NOW()) AND 
    YEAR (client_date) = YEAR(NOW())");
$usp = mysqli_fetch_assoc($query);

$c_pod = $postu['postu'] ;
$c_vru = $usp['usp'];
$c_otk = $otkaz['otkaz'];

$s_pod = $postu['spostu'] ;
$s_vru = $usp['susp'];
$s_otk = $otkaz['sotkaz'];
