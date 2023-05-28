<?php
session_start();
require_once('./import/database.php');
$stmt = $db->prepare('select user_id,badge_id,amount,name,description,price from inventory left join badgeinfo on badge_id = badgeinfo.id where user_id=?');
$stmt->execute([$_SESSION['userid']]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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




</script>


<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "購買badge";
include('./import/nav.php');
?>

<div class="container-xxl">

    <br>
    <h1 class="text-center fw-bold"> 你的倉庫</h1>
    <hr>


        <div class="text-center row row-cols-1 row-cols-md-2 row-cols-lg-4 vip-info">

            <?php

            for ($i = 0; $i < count($result); $i++) {
                if($result[$i]['amount']==0)
                    continue;
                ?>
                <div class=" p-2 col">
                    <div class="container rounded shadow  purchase-card ">
                        <img src="./img/good/<?php echo $result[$i]['badge_id'] ?>.png" alt="">
                        <h1><?php echo $result[$i]['name'] ?></h1>
                        <p><?php echo $result[$i]['description'] ?></p>
                        <p>$<?php echo $result[$i]['price'] ?></p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo $result[$i]['amount'] ?>" price="<?php echo $result[$i]['price'] ?>"
                                       readonly>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
            unset($db);
            ?>

        </div>

        <hr>



</div>

<br>


</body>

</html>