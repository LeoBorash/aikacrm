<?php

function transaction_arbitraj(){
    global $conn;

    $query = $conn->query("SELECT * FROM transaction WHERE transaction_who = 'alimzhan'");
    while ($row = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td class="text-center"> <?= $row['transaction_date']?> </td>
            <td class="text-center"> <?= $row['transaction_summ']?> </td>
            <td class="text-center"> <?= $row['transaction_comment']?> </td>
            <td class="text-center"> <?= $row['transaction_who']?> </td>
        </tr>
    <?php }
}
function transaction_client(){
    global $conn;

    $query = $conn->query("SELECT * FROM transaction WHERE transaction_who = 'aika'");
    while ($row = mysqli_fetch_assoc($query)){ ?>
        <tr>
            <td class="text-center"> <?= $row['transaction_date']?> </td>
            <td class="text-center"> <?= $row['transaction_summ']?> </td>
            <td class="text-center"> <?= $row['transaction_comment']?> </td>
            <td class="text-center"> <?= $row['transaction_who']?> </td>
        </tr>
    <?php }
}