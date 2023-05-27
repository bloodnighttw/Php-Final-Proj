<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('import/basic.php');
    include('import/adblock.php');
    $canChangeProfile = isset($_GET['id']) && $_GET['id'] == $_SESSION['userid'];
    if($canChangeProfile)
        include 'import/editProfile.php';
    ?>

</head>

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
                    <?php
                        echo $_SESSION['userid'];
                    ?>
                </p>
            </div>
        </a>
    </div>

    <div class="rounded container shadow  text-center profile-edit">
        <?php if(isset($_FILES['avatar-upload']) && isset($_SESSION['userid'])){
            if(move_uploaded_file($_FILES['avatar-upload']['tmp_name'],'./img/avatar/'.$_SESSION['userid'] .'.' . pathinfo($_FILES['avatar-upload']['name'],PATHINFO_EXTENSION)))
                echo "success";

         } ?>

        <form method="post" action="profile.php?id=<?php echo $_SESSION['userid']?>" onsubmit="return getContent()" enctype="multipart/form-data">


            <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="200" width="200"
                 class="img" id="avatar">

            <div class="d-none">
                <input class="" type="file" name="avatar-upload" id="avatar-upload">
                <input type="text" id="badge-id" name="badge-id">
                <textarea id="textarea-description" name="description"></textarea>
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
                        <img src="./img/badge1.png" alt="" class="badge-list" height="128" width="auto">
                        <img src="./img/badge2.png" alt="" class="badge-list" height="128" width="auto">
                    </div>
                </div>
                <div class="">
                    <input type="text" class="form-control-plaintext rounded" id="username" value="bloodnighttw" name="username"
                           placeholder="使用者名稱" <?php if(!$canChangeProfile)echo 'readonly'?>>
                </div>

                <div class="editable-margin">
                    <div data-placeholder="自我介紹" <?php if($canChangeProfile)echo 'contentEditable="true"'?> id="description">
                        他沒有寫什麼在這邊。
                    </div>
                </div>


                <div class="">
                    <label for="staticEmail" class=" col-form-label">電子郵件</label>

                    <input type="email" class="form-control-plaintext rounded" id="staticEmail"
                           value="email@example.com" readonly>
                </div>
            </div>
            <?php
                if($canChangeProfile) echo <<<'EOF'
                <div>
                    <label for="password1" class="col-form-label rounded">密碼</label>
                    <div class="col">
                        <input type="password" class="form-control-plaintext rounded" id="password1"
                               value="ouo123ouo123">
                    </div>
                </div>
                <div id="password2">
                    <label for="password2" class="col-form-label rounded">重複密碼</label>
                    <div class="col">
                        <input type="password" class="form-control-plaintext rounded" value="ouo123ouo123">
                    </div>
                </div>
    
                <div class="mb-3 row btn-margin">
                    <button type="submit" class="btn btn-primary">更新個人檔案</button>
                </div>
EOF;
            ?>


            <br>


        </form>


    </div>


</div>

</body>

</html>