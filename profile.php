<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('import/basic.php');
    include('import/adblock.php');
    ?>

</head>

<script>

    $(function () {
        $("#password1").on("keydown", function () {
            $("#password2").fadeIn();
        })

        $("#avatar").on("click", function () {
            $("#avatar-upload").trigger('click');
        })


        $("#badge").on("click", function () {
            $("#change-badge").trigger('click');
        })

        $(".badge-list").on("click", function () {
            $('#badge').attr("src", $(this).attr('src'))
            $('#off-close').trigger('click');
        })

    })


</script>

<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "修改個人資料";
include('import/nav.php');
?>

<div class="container" id="body">

    <div class="adbox  rounded container shadow  text-center profile-edit bg-danger ">
        <a href="google.com" class="preview-link">
            <div class=" preview-box">
                <h3 class="title-preview">廣告</h3>
                <p class="content-preview">
                    adsence沒辦法用Text ad ，只好另外找了。
                </p>
            </div>
        </a>
    </div>

    <div class="rounded container shadow  text-center profile-edit">

        <form>


            <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="200" width="200"
                 class="img" id="avater">

            <div class="mb-3 d-none">
                <input class="form-control" type="file" id="avater-upload">
            </div>
            <div>
                <img id="badge" src="./img/badge2.png" height="50" width="auto">
            </div>


            <div class="mb-1 row ">

                <button class="btn d-none" id="change-badge"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#selectmenu"
                        aria-controls="offcanvasBottom" aria-expanded="false"></button>

                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="selectmenu"
                     aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasBottomLabel">選擇Badge</h5>
                        <button type="button" id="off-close" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body small">
                        <img src="./img/badge1.png" alt="" class="badge-list" height="512" width="auto">
                        <img src="./img/badge2.png" alt="" class="badge-list" height="512" width="auto">
                    </div>
                </div>
                <div class="">
                    <input type="text" class="form-control-plaintext rounded" id="username" value="bloodnighttw"
                           placeholder="使用者名稱">
                </div>

                <div></div>


                <div class="editable-margin">
                    <div contentEditable="true" class="con editable editable-css" data-placeholder="自我介紹">
                        他沒有寫什麼在這邊。
                    </div>
                </div>


                <div class="">
                    <label for="staticEmail" class=" col-form-label">電子郵件</label>

                    <input type="email" class="form-control-plaintext rounded" id="staticEmail"
                           value="email@example.com" readonly>
                </div>
            </div>
            <div class="">
                <label for="password1" class="col-form-label rounded">密碼</label>
                <div class="col">
                    <input type="password" class="form-control-plaintext rounded" id="password1"
                           value="ouo123ouo123">
                </div>
            </div>
            <div class="" id="password2">
                <label for="password2" class="col-form-label rounded">重複密碼</label>
                <div class="col">
                    <input type="password" class="form-control-plaintext rounded" value="ouo123ouo123">
                </div>
            </div>

            <div class="mb-3 row btn-margin">
                <button type="button" class="btn btn-primary">更新個人檔案</button>
            </div>


            <br>


        </form>


    </div>


</div>

</body>

</html>