<?php
session_start();
$success = isset($_POST['email']) ;
if(isset($_SESSION['userid'])){
    header('Location: '.'./index.php');
    die();
}

if ($success && isset($_POST['pwd'])) { // if successful
    echo 'debug';
    include './import/database.php';
    $stmt = $db->prepare('SELECT id,username,email,password FROM User where email=? or username = ? and password=?');
    if(!$stmt->execute([$_POST['email'],$_POST['email'],$_POST['pwd']]))
        echo '<h1>資料庫連線錯誤</h1>';
    $result = $stmt->fetch();
    if(is_array($result)){
        $_SESSION['userid']=$result['id'];
        header('Location: '.'./index.php');
        die();
    }else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo '<h1>錯誤的email或密碼</h1>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./import/basic.php');
    include('./import/login.php');
    ?>
</head>

<body class="bg-dark" data-bs-theme="dark">


<div class="vc login-box">
    <div class="container ct shadow-lg p-3 mb-5 bg-dark rounded">

        <h1 class="center">登入</h1>
        <hr>

        <!--use js to post , not form-->
        <form name="form1" action="./login.php" method="POST">

            <div class="mb-3">
                <label for="emails" class="form-label">電子郵件</label>
                <input type="text" class="form-control" id="emails" placeholder="name@example.com" name='email'>
            </div>
            <label for="pw" class="form-label">密碼</label>
            <input type="password" id="pw" class="form-control" aria-labelledby="passwordHelpBlock" name='pwd'>
            <br>
            <div class="col-auto ">

                <div class="form-check float-start checkbox-vc">
                    <input class="form-check-input" type="checkbox" value="" id="remember">
                    <label class="form-check-label" for="remember">
                        記住密碼
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mb-3 float-end btn-padding">登入</button>

                <!--need to perform like url here-->
                <a href="./forget.php" class="btn btn-danger mb-3 float-end btn-padding">忘記密碼</a>
            </div>

        </form>


    </div>
</div>


</body>

</html>