<?php
session_start();
require_once './import/database.php';
$all = $db->prepare("SELECT * FROM content order by content.time DESC limit 25");
$all->execute();
$result = $all->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./import/basic.php');
    include('./import/adblock.php');
    ?>
</head>


<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "首頁";
include('./import/nav.php')
?>

<br>
<br>


<div class="container" id="body">

    <div class="row">


        <?php
        for ($i = 0; $i < count($result); $i++) {
            $delta = json_decode($result[$i]['delta'],true);
            $ops = $delta['ops'];

            $textpreview = "";
            for ($j = 0; $j < count($ops) && mb_strlen($textpreview) < 42 ; $j++) {
                $textpreview .= isset($ops[$j]['insert']['image']) ? '[img]' : $ops[$j]['insert'];
            }
            //echo strlen($textpreview);

            if($i % 8 == 0){?>
                <div class="col-lg-6 col-12 ">
                    <a href="https://google.com" class="preview-link">
                        <div class=" adbox container rounded shadow bg-danger  preview-box">
                            <h3 class="title-preview">廣告</h3>
                            <p class="content-preview">
                                載入中
                            </p>
                        </div>
                    </a>
                </div>
            <?php }?>

            <div class="col-lg-6 col-12">


                <a href="./content.php?id=<?php echo $result[$i]['id']?>" class="preview-link">
                    <div class="container rounded shadow bg-dark  preview-box">
                        <h3 class="title-preview"><?php echo $result[$i]['title'] ?></h3>
                        <p class="content-preview">
                            <?php echo $textpreview ?>
                        </p>
                    </div>
                </a>
            </div>
        <?php } ?>


    </div>
</div>


</body>

</html>