<?php

global $conn;

$query = $conn->query("
SELECT count(client_price) as total21 FROM clients 
WHERE client_status in('Вручено','Вручено Ал') AND
MONTH (client_date) = MONTH(NOW()) AND 
YEAR (client_date) = YEAR(NOW())");
$row = mysqli_fetch_assoc($query);
$_SESSION['c_vrucheno'] = $row['total21'];

$query = $conn->query("
SELECT count(client_price) as total24 FROM clients 
WHERE client_status = 'Дубль'");
$row = mysqli_fetch_assoc($query);
$_SESSION['c_dubl'] = $row['total24'];


