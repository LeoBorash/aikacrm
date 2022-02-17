<?php
function iwatchAlim() {
    global $conn;
    ?>
    <div class="col-md-6">
        <h3>iWatch+3</h3>
        <div class="divkago">
            <table class="table table-bordered ">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Цена</th>
                </tr>
                </thead>

                <tbody class="">
                <?php
                $query = $conn->query("SELECT * FROM clients WHERE client_product in('iwatch-3','iwatch-3-alim') AND client_status in ('Подтвержден','В Пути','Вручено','Вручено Ал','Отказ2')");
                $row = mysqli_fetch_assoc($query);
                $index = 1;
                $price = 2500;
                while ($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <th style="width: 5px"><?= $index++ ?></th>
                        <td><?= $row['client_name'] ?></td>
                        <td><?= $row['client_phone'] ?></td>
                        <td><?= $price ?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="table-container-footer">
            <table class="table table-striped table-hover table-condensed table-bordered">
                <tfoot>
                <tr>
                    <?php
                    $query = $conn->query("SELECT count(*) as totalff FROM clients WHERE client_product in('iwatch-3','iwatch-3-alim') AND client_status in ('Подтвержден','В Пути','Вручено','Вручено Ал','Отказ2')");
                    $row = mysqli_fetch_assoc($query);
                    ?>
                    <th>Количество заявок: <?=( $row['totalff'])?></th>
                    <?php
                    $query = $conn->query("SELECT count(*) as total122 FROM clients WHERE client_product in('iwatch-3','iwatch-3-alim') AND client_status in ('Подтвержден','В Пути','Вручено','Вручено Ал','Отказ2')");
                    $row = mysqli_fetch_assoc($query);
                    ?>
                    <th>Общ сумма: <?=$_SESSION['iwatch-3-a'] = ($row['total122']) * 2500 ?></th>
                </tr>
                </tfoot>
            </table>
            <hr>
        </div>

    </div>
<?php }
