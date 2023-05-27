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
    if ($canChangeProfile)
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
        <?php {

            echo $_FILES['fileToUpload']['name'];
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'],'D:\\xampp\\upload\\' . $_FILES['fileToUpload']['name']);
        } ?>

        <form method="post" action="test.php" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="ouo">


            <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="200" width="200"
                 class="img" id="avatar">

            <div>
                <img id="badge" src="./img/badge2.png" height="50" width="auto">
            </div>


            <div class="mb-3 row btn-margin">
                <button type="submit" class="btn btn-primary">更新個人檔案</button>
            </div>


            <br>


        </form>


    </div>


</div>

</body>

</html>