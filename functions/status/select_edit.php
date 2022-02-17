<?php
function select_edit(){
    global $row;
//                        5.В Пути
    if ($row['client_status'] == 'В Пути') { ?>
        <option value="В Пути">В Пути</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ2">Отказ!</option>
    <?php }

//                        1.В Оброботке
    elseif($row['client_status'] == 'В Оброботке') { ?>
        <option value="В Оброботке">В Оброботке</option>
        <option value="Подтвержден">Подтвержден</option>
        <option value="Алматы">Алматы</option>
        <option value="Перезвон">Перезвон</option>
        <option value="Ожидает">Ожидает</option>
        <option value="Заберут">Заберут</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ">Отказ</option>
        <option value="Дубль">Дубль</option>
    <?php }
//                        2.Подтвержден
    elseif($row['client_status'] == 'Подтвержден') { ?>
        <option value="Подтвержден">Подтвержден</option>
        <option value="В Пути">В Пути</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ2">Отказ!</option>
    <?php }
//                        2,1.Алматы
    elseif($row['client_status'] == 'Алматы') { ?>
        <option value="Алматы">Алматы</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ">Отказ</option>
    <?php }

//                        3.Перезвон
    elseif ($row['client_status'] == 'Перезвон') { ?>
        <option value="Перезвон">Перезвон</option>
        <option value="Подтвержден">Подтвержден</option>
        <option value="Ожидает">Ожидает</option>
        <option value="Алматы">Алматы</option>
        <option value="Заберут">Заберут</option>
        <option value="В Пути">В Пути</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ">Отказ</option>
    <?php }
//                        4.Ожидает
    elseif ($row['client_status'] == 'Ожидает') { ?>
        <option value="Ожидает">Ожидает</option>
        <option value="Подтвержден">Подтвержден</option>
        <option value="Перезвон">Перезвон</option>
        <option value="Алматы">Алматы</option>
        <option value="Заберут">Заберут</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ">Отказ</option>
    <?php }
    // Заберут
    elseif ($row['client_status'] == 'Заберут') { ?>
        <option value="Заберут">Заберут</option>
        <option value="Алматы">Алматы</option>
        <option value="Ожидает">Ожидает</option>
        <option value="Вручено">Вручено</option>
        <option value="Отказ">Отказ</option>
    <?php }
//                        7.Отказ
    elseif ($row['client_status'] == 'Отказ') { ?>
        <option value="Отказ">Отказ</option>
    <?php }
//                        8.Отказ
    elseif ($row['client_status'] == 'Отказ2') { ?>
        <option value="Отказ2">Отказ!</option>
    <?php }

    //                        Дубль

    elseif($row['client_status'] == 'Дубль') { ?>
        <option value="Дубль">Дубль</option>
    <?php }

//                        6.Вручено
    elseif ($row['client_status'] == 'Вручено') { ?>
        <option value="Вручено">Вручено</option>
        <option value="Отказ2">Отказ!</option>
    <?php }
}
