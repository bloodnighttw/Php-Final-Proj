<?php
session_start();
$canGetProfile = false;
if (isset($_GET['id'])) {
    include 'import/database.php';
    $stmt = 'select user.id,username,email,badge_id,description,password from user left join profile on user.id = profile.id where user.id=?';
    $pre1 = $db->prepare($stmt);
    if ($pre1->execute([$_GET['id']])) {
        $result = $pre1->fetch();
        if ($result) {
            $id = $result['id'];
            $description = $result['description'];
            $badge_id = $result['badge_id'];
            $email = $result['email'];
            $user = $result['username'];
            $password = $result['password'];
            $canGetProfile = true;
        }
    }

    $canChangeProfile = isset($_GET['id']) && $_GET['id'] == $_SESSION['userid'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('import/basic.php');
    include('import/adblock.php');
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

    <?php
    if (isset($_FILES['avatar-upload']) && isset($_SESSION['userid'])
        && move_uploaded_file($_FILES['avatar-upload']['tmp_name'], './img/avatar/' . $_SESSION['userid'] . '.png')) {
        echo '<div class="alert alert-success container profile-edit  text-center" role="alert">成功上傳大頭照</div>';
    }

    if ($canChangeProfile && $_SERVER['REQUEST_METHOD'] == 'POST' && $canGetProfile) {

        if (isset($_POST['description']) && $_POST['description'] != "_NO_CHANGE_" && $description != strip_tags(($_POST['description']),'<br>')) {
            $pre3 = $db->prepare('UPDATE profile SET description=? WHERE id= ?');
            if (!$pre3->execute([(($_POST['description'])), $_SESSION['userid']]))
                echo '<div class="alert alert-danger" role="alert">資料庫錯誤 請稍號在試(error code:db006)</div>';
            else {
                echo '<div class="alert alert-success container profile-edit  text-center" role="alert">' . '成功修改你的自我介紹'. '</div>';
                $description =(($_POST['description']));
            }
        }

        if (isset($_POST['badge-id']) && $badge_id != $_POST['badge-id']) {
            $pre4 = $db->prepare('UPDATE profile SET badge_id=? WHERE id= ?');
            if (!$pre4->execute([$_POST['badge-id'], $_SESSION['userid']]))
                echo '<div class="alert alert-danger" role="alert">資料庫錯誤 請稍號在試(error code:db007)</div>';
            else {
                echo '<div class="alert alert-success container profile-edit  text-center" role="alert">成功修改你的獎牌</div>';
                $badge_id = $_POST['badge-id'];
            }
        }


    }

    ?>

    <div class="rounded container shadow  text-center profile-edit">


        <?php if ($canGetProfile){ ?>
        <form method="post" action="profile.php?id=<?php echo $_SESSION['userid'] ?>" onsubmit="return getContent()"
              enctype="multipart/form-data">


            <img src="img/avatar/<?php echo $id ?>.png" alt="avatars" height="200" width="200"
                 class="img" id="avatar">

            <div class="d-none">
                <input class="" type="file" name="avatar-upload" id="avatar-upload" accept="image/png">
                <input type="text" id="badge-id" name="badge-id" value="<?php echo $badge_id ?>">
                <textarea id="textarea-description" name="description"></textarea>
            </div>
            <div>
                <img id="badge" src="img/badge/<?php echo $badge_id ?>.png" height="50" width="auto">
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
                        <img src="img/badge/0.png" alt="" class="badge-list" height="128" width="auto">
                        <img src="img/badge/1.png" alt="" class="badge-list" height="128" width="auto">
                    </div>
                </div>
                <div class="">
                    <input type="text" class="form-control-plaintext rounded" id="username" value="<?php echo $user ?>"
                           name="username"
                           placeholder="使用者名稱" <?php if (!$canChangeProfile) echo 'readonly' ?>>
                </div>

                <div class="editable-margin">
                    <div data-placeholder="自我介紹"
                        <?php if ($canChangeProfile) echo 'contentEditable="true"' ?> id="description" >
                        <?php echo nl2br($description)?>
                    </div>
                </div>


                <div class="">
                    <label for="staticEmail" class=" col-form-label">電子郵件</label>

                    <input type="email" class="form-control-plaintext rounded" id="staticEmail"
                           value="<?php echo $email ?>" readonly>
                </div>
            </div>
            <?php if ($canChangeProfile) { ?>
                <div>
                    <label for="password1" class="col-form-label rounded">密碼</label>
                    <div class="col">
                        <input type="password" class="form-control-plaintext rounded" id="password1"
                               value="<?php echo $password ?>">
                    </div>
                </div>
                <div id="password2">
                    <label for="password2" class="col-form-label rounded">重複密碼</label>
                    <div class="col">
                        <input type="password" class="form-control-plaintext rounded" value="">
                    </div>
                </div>

                <div class="mb-3 row btn-margin">
                    <button type="submit" class="btn btn-primary">更新個人檔案</button>
                </div>
            <?php } ?>

            <br>

            <?php } else { ?>


            <?php } ?>

        </form>


    </div>


</div>

</body>

</html>