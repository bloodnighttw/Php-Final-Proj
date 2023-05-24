﻿<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('import/basic.php');
    include('import/adblock.php');
    include('import/good.php');
    ?>

</head>

<script>

    let total = 0;

    $(function () {
        $("#buy").click(function () {
            alert("buy")
        })

        $("#clear").click(function () {
            $("input[type=text]").each(function () {
                $(this).val("0")
            })
        })

        $(".add").click(function (e) {
            let temp = $(this).siblings('input')
            temp.val(Number(temp.val()) + 1);
            total += Number(temp.attr('price'))
            $('#price').text("總共"+total+"元");
        })

        $(".sub").click(function (e) {
            let temp = $(this).siblings('input')
            temp.val((Number(temp.val()) > 0) ? Number(temp.val()) - 1 : 0);
            total -= Number(temp.attr('price'))
            $('#price').text("總共"+total+"元");

        })
    })


</script>


<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "所以這是什麼，可以吃嗎?";
include('import/nav.php');
?>

<div class="container-xxl">

    <br>
    <h1 class="text-center fw-bold"> 購買方案</h1>
    <p class="text-center">任何獲得獎章的人將會獲得經驗值獎勵</p>
    <hr>

    <div class="text-center row row-cols-1 row-cols-md-2 row-cols-lg-4 vip-info">

        <?php
        require_once('import/database.php');
        $cmd = 'select * from badgeInfo';
        $result = $db->query("SELECT * FROM badgeinfo")->fetch_all();

        for ($i = 0; $i < count($result); $i++) {
            echo '<div class=" p-2 col">';
            echo '    <div class="container rounded shadow  purchase-card ">';
            echo '            <img src="./img/'.$result[$i][4].'" alt="">';
            echo '            <h1>' . $result[$i][1].'</h1>';
            echo '            <p>' . $result[$i][2].'</p>';
            echo '            <p>$ '.  $result[$i][3].'</p>';
            echo '            <div class="counter center-text">';
            echo '                <div class="input-group">';
            echo '                    <button class="btn btn-danger sub" type="button">-</button>';
            echo '                    <input type="text" class="form-control" placeholder="" value="0" name="' . $result[$i][0]. '" price='.$result[$i][3].'>';
            echo '                    <button class="btn btn-danger add" type="button">+</button>';
            echo '                </div>';
            echo '            </div>';
            echo '    </div>';
            echo '</div>';
        }
        $db->close();
        ?>

    </div>

    <hr>

    <div class="d-flex justify-content-end align-items-center">
        <h2 class="align-self-center me-auto" id="price">總共0元</h2>
        <h2 class=" align-self-center btn btn-danger me-2" type="button" id="clear">清除</h2>
        <h2 class=" align-self-center btn btn-primary" type="button" id="buy">結帳</h2>
    </div>

</div>

<br>


</body>

</html>