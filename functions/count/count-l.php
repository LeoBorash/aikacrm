<?php


        $query = $conn->query("
        SELECT count(client_price) as total1 FROM clients 
        WHERE client_status = 'В Пути'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['vputi'] = $row['total1'];

        $query = $conn->query("
        SELECT count(client_price) as total5 FROM clients 
        WHERE client_status = 'Отказ'AND
        MONTH (client_date) = MONTH(NOW()) AND
        YEAR (client_date) = YEAR(NOW())");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['otkaz'] = $row['total5'];


