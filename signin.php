<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include './import/basic.php';
    include './import/login.php';
    ?>
</head>

<script>

    function check_password_same() {
        return $("#password1").val() === $("#password2").val();

    }

    function email_vaild(email) {
        return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
    }

    $(function () {

        $("#form").on("submit", function (e) {
            if ($("#username").val() === "") {
                e.preventDefault();
                alert("使用者名稱不能為空")
            } else if (email_vaild($("#mail").val())) {
                alert("email格式不正確")
            } else if ($("#password1").val().length <= 8) {
                e.preventDefault();
                alert("密碼要有八位")
            } else if ($("#password2").val() !== $("#password1").val()) {
                e.preventDefault();
                alert("重複密碼不正確")
            }
        });
    })


</script>

<body class="bg-dark" data-bs-theme="dark">

<div class="vc login-box">
    <div class="container ct shadow-lg p-3 mb-5 bg-dark rounded">

        <h1 class="center">註冊</h1>
        <?php

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['pw']) && isset($_POST['username']) && strlen($_POST['pw']) >= 8 && strlen($_POST['pw']) <= 16) {
            include './import/database.php';
            $checkExistStatmnt = $db->prepare('SELECT id from user where username = ? or email = ?');
            $stmt1 = $db->prepare('INSERT INTO user(username,email,password) values(?,?,?)');
            $stmt2 = $db->prepare('INSERT INTO profile(id) values(?)');


            if(!$checkExistStatmnt->execute([$_POST['username'], $_POST['email']])){
                echo '<div class="alert alert-danger" role="alert">資料庫錯誤 請稍號在試(error code:db001)</div>';
            }else{
                if(!$checkExistStatmnt->execute([$_POST['username'], $_POST['email']])){
                    echo '<div class="alert alert-danger" role="alert">資料庫錯誤 請稍號在試(error code:db002)</div>';
                }else{
                    $result = $checkExistStatmnt->fetch();
                }

                if(!is_array($result))
                    if(!$stmt1->execute([$_POST['username'], $_POST['email'],$_POST['pw']])) {
                        echo '<div class="alert alert-danger" role="alert">資料庫錯誤 請稍號在試(error code:db003)</div>';
                    }else{
                        if($stmt2->execute([$db->lastInsertId()])){
                            echo '<div class="alert alert-success" role="alert">成功註冊 請重新登入</div>';
                        }else
                            echo '<div class="alert alert-danger" role="alert">資料庫錯誤 請稍號在試(error code:db004)</div>';
                    }
                else{
                    echo '<div class="alert alert-danger" role="alert">重複的username或email</div>';
                }
            }



            $createNewProfile = $db->prepare('INSERT INTO user(username,email,password) values(?,?,?)');


        } else if($_SERVER['REQUEST_METHOD'] == 'POST')
            echo "<h1>你的輸入格式有錯誤 請重新輸入</h1>"

        ?>


        <hr>

        <form id="form" method="post" action="./signin.php">
            <div class="mb-3">
                <label for="username" class="form-label">使用者名稱</label>

                <input id="username" class="form-control" type="text" placeholder="username"
                       aria-label=".form-control-lg" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">電子郵件</label>
                <input type="email" class="form-control" id="email"
                       placeholder="name@example.com" name="email">
            </div>

            <div class="mb-3">

                <label for="password1" class="form-label">密碼</label>
                <input type="password" id="password1" class="form-control" aria-labelledby="passwordHelpBlock"
                       name="pw">

            </div>


            <div class="mb-3">

                <label for="password2" class="form-label">重複密碼</label>
                <input type="password" id="password2" class="form-control" aria-labelledby="passwordHelpBlock">

            </div>
            <div class="col-auto ">

                <button type="submit" id="signin-btn" class="btn btn-primary mb-3 float-end btn-padding">註冊</button>

            </div>
        </form>
    </div>
</div>

</body>

</html>