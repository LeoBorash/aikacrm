<?php

    global $conn;

        $query = $conn->query("
        SELECT count(client_price) as total1 FROM clients 
        WHERE client_status = 'Алматы'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['almaty'] = $row['total1'];


        $query = $conn->query("
        SELECT count(client_price) as total2 FROM clients 
        WHERE client_status = 'Подтвержден'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['podtverzhden'] = $row['total2'];
