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

    <div class="container container0padding shadow">
        <div id="caro" class="carousel slide ">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#caro" data-bs-slide-to="0" class="active" aria-current="true"
                        aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#caro" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#caro" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/login.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <p>
                            這是描述1這是描述1這是描述1這是描述1這是描述1這是描述1這是描述1這是描述1這是描述1這是描述1</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/login.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <p>這是描述2這是描述2這是描述2這是描述2這是描述2這是描述2這是描述2</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/login.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-md-block">
                        <p>這是描述3這是描述3這是描述3這是描述3這是描述3這是描述3這是描述3這是描述3</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#caro" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#caro" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <br>


    <div class="row">

        <div class="col-lg-6 col-12 ">
            <a href="https://google.com" class="preview-link">
                <div class=" adbox container rounded shadow bg-danger  preview-box">
                    <h3 class="title-preview">廣告</h3>
                    <p class="content-preview">
                        adsence沒辦法用Text ad ，只好另外找了。
                    </p>
                </div>
            </a>
        </div>
        <?php
        for ($i = 0; $i < count($result); $i++) {
            $delta = json_decode($result[$i]['delta'],true);
            $ops = $delta['ops'];

            $textpreview = "";
            for ($j = 0; $j < count($ops); $j++) {
                $textpreview .= isset($ops[$j]['insert']['image']) ? '[img]' : $ops[$j]['insert'];
            }
            ?>

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