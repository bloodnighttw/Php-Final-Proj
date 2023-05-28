<?php
session_start();
require '../import/database.php';
$all = $db->prepare('select * from badgeInfo');
$all->execute();
$result = $all->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $del = $db->prepare('DELETE FROM badgeinfo where id=?');
    $del2 = $db->prepare('DELETE FROM inventory where badge_id=?');
    $updatePrice = $db->prepare('UPDATE badgeinfo SET price=? where id=?');
    $new = $db->prepare('INSERT into badgeinfo(badgeinfo.name,description,price) values(?,?,?)');

    if (isset($_POST['name']) && $_POST['name'] !="" && isset($_POST['description']) && isset($_POST['price'])) {
        $new->execute([$_POST['name'], $_POST['description'], $_POST['price']]);
        if(isset($_FILES['good-img']))
            if(!move_uploaded_file($_FILES['good-img']['tmp_name'], '../img/good/' . ($db->lastInsertId() ?? 0) .'.png'))
                echo 'error when moveing file';
    }

    if (is_array($result)) {
        for ($i = 0; $i < count($result); $i++) {
            if (isset($_POST['badge_' . $result[$i]['id']])) {
                if ($_POST['badge_' . $result[$i]['id']] == "REMOVE") {
                    $del->execute([$result[$i]['id']]);
                    $del2->execute([$result[$i]['id']]);
                } else {
                    $updatePrice->execute([$_POST['badge_' . $result[$i]['id']], $result[$i]['id']]);
                }
            }
        }
    }


    header('Location: '.'./new-badge.php');

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../import/basic.php');
    ?>
</head>
<style>

    .vip-info h1 {
        padding: 15px;
    }

    .vip-info p {
        padding: 10px;
    }

    .vip-info img {
        height: 300px;
        width: 100%;
        padding: 0;
        object-fit: cover;
    }

    .container {
        padding: 0 0 5px;
    }

</style>

<script>

    let total = 0;

    $(function () {


        $("#clear").on("click", function () {
            $("input[type=text]").each(function () {
                $(this).val("0")
            })
        })

        $(".remove").on("click", function () {
            let temp = $(this).siblings('input')
            temp.val("REMOVE");
        })

        $(".reset").on("click", function () {
            let temp = $(this).siblings('input')
            temp.val("0");
        })

        $('#newimg').on("click",function (){
            $('#good-img').trigger('click');
        })

    })


</script>


<body class="bg-dark" data-bs-theme="dark">


<div class="container-xxl">

    <br>
    <h1 class="text-center fw-bold"> 新增徽章</h1>
    <hr>
    <form method="post" enctype="multipart/form-data" action="./new-badge.php">

        <div class="text-center row row-cols-1 row-cols-md-2 row-cols-lg-4 vip-info">


            <?php
            require_once('../import/database.php');


            for ($i = 0; $i < count($result); $i++) { ?>

                <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card  ">
                        <img class="yowtf" src="../img/good/<?php echo $result[$i]['id'] ?>.png" alt="">
                        <h1 class=""><?php echo $result[$i]['name'] ?></h1>
                        <p>$<?php echo $result[$i]['price'] ?></p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger reset" type="button">歸0</button>
                                <input type="text" class="form-control" placeholder=""
                                       value="<?php echo $result[$i]['price'] ?>"
                                       name="badge_<?php echo $result[$i]['id'] ?>">
                                <button class="btn btn-danger remove" type="button">移除</button>
                            </div>
                        </div>

                    </div>


                </div>
            <?php } ?>

            <div class=" p-2 col ">
                <div class="container-xxl rounded shadow purchase-card  ">
                    <img src="" id="newimg">
                    <input class="d-none" type="file" name="good-img"
                           accept="image/png" id = good-img onchange="document.getElementById('newimg').src = window.URL.createObjectURL(this.files[0])">
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                               name="name">
                        <label for="floatingInput">商品名稱</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" placeholder="name@example.com"
                               name="price">
                        <label for="floatingInput">價格</label>
                    </div>
                    <hr>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                  name="description"></textarea>
                        <label for="floatingTextarea">描述</label>
                    </div>


                </div>


            </div>


        </div>
        <div class="d-flex justify-content-end align-items-center">
            <button class=" align-self-center btn btn-primary" type="submit" id="buy">送出修改</button>
        </div>

    </form>


</div>

<br>


</body>

</html>