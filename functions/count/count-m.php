<?php

    global $conn;

        $query = $conn->query("
        SELECT count(client_price) as total1 FROM clients 
        WHERE client_status = 'В Оброботке'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['obrobotke'] = $row['total1'];


        $query = $conn->query("
        SELECT count(client_price) as total2 FROM clients 
        WHERE client_status = 'Перезвон'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['perezvon'] = $row['total2'];


        $query = $conn->query("
        SELECT count(client_price) as total3 FROM clients 
        WHERE client_status = 'Ожидает'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['ozhidaet'] = $row['total3'];


        $query = $conn->query("
        SELECT count(client_price) as total4 FROM clients 
        WHERE client_status = 'Заберут'");
        $row = mysqli_fetch_assoc($query);
        $_SESSION['zaberut'] = $row['total4'];


