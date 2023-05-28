<?php
session_start();
require_once('./import/database.php');
$stmt = $db->prepare('select * from badgeInfo');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo 'yo';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    for ($i = 0; $i < count($result); $i++) {

        $badge_id = $result[$i]['id'];

        if (!isset($_POST[$badge_id]))
            continue;
        $amount = (int)$_POST[$badge_id];

        $getOrginalResult = $db->prepare('SELECT amount from inventory where user_id = ? and badge_id=?');
        $getOrginalResult->execute([$_SESSION['userid'], $badge_id]);
        $orginalAmount = $getOrginalResult->fetch();
        if (is_array($orginalAmount)) {
            $updateStmt = $db->prepare('UPDATE inventory SET amount=? where user_id=? and badge_id = ?');
            $updateStmt->execute([$amount + (int)$orginalAmount['amount'], $_SESSION['userid'], $badge_id]);
        } else {//not exist
            $insertStmt = $db->prepare('INSERT into inventory(amount,user_id,badge_id) values (?,?,?)');
            $insertStmt->execute([$amount, $_SESSION['userid'], $badge_id]);
        }


    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./import/basic.php');
    include('./import/adblock.php');
    include('./import/good.php');
    ?>
</head>

<script>

    let total = 0;

    $(function () {
        $("#buy").on("click", function () {
            $('#submit').trigger('click');
        })

        $("#clear").on("click", function () {
            $("input[type=text]").each(function () {
                $(this).val("0")
            })
        })

        $(".add").on("click", function () {
            let temp = $(this).siblings('input')
            temp.val(Number(temp.val()) + 1);
            total += Number(temp.attr('price'))
            $('#price').text("總共" + total + "元");
        })

        $(".sub").on("click", function () {
            let temp = $(this).siblings('input')
            total -= (temp.val() === "0") ? 0 : Number(temp.attr('price'));
            temp.val((Number(temp.val()) > 0) ? Number(temp.val()) - 1 : 0);
            $('#price').text("總共" + total + "元");

        })
    })


</script>


<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "購買badge";
include('./import/nav.php');
?>

<div class="container-xxl">

    <br>
    <h1 class="text-center fw-bold"> 購買方案</h1>
    <p class="text-center">任何獲得獎章的人將會獲得經驗值獎勵</p>
    <hr>

    <form method="post" action="./buy.php">

        <div class="text-center row row-cols-1 row-cols-md-2 row-cols-lg-4 vip-info">

            <?php

            for ($i = 0; $i < count($result); $i++) { ?>
                <div class=" p-2 col">
                    <div class="container rounded shadow  purchase-card ">
                        <img src="./img/good/<?php echo $result[$i]['id'] ?>.png" alt="">
                        <h1><?php echo $result[$i]['name'] ?></h1>
                        <p><?php echo $result[$i]['description'] ?></p>
                        <p>$<?php echo $result[$i]['price'] ?></p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control" value="0"
                                       name="<?php $result[$i]['id'] ?>" price="<?php echo $result[$i]['price'] ?>"
                                       readonly>
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            unset($db);
            ?>

        </div>

        <hr>

        <div class="d-flex justify-content-end align-items-center">
            <h2 class="align-self-center me-auto" id="price">總共0元</h2>
            <h2 class=" align-self-center btn btn-danger me-2" type="button" id="clear">清除</h2>
            <h2 class=" align-self-center btn btn-primary" type="button" id="buy">結帳</h2>
            <button class="d-none" type="submit" id="submit"></button>
        </div>

    </form>


</div>

<br>


</body>

</html>