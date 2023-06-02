<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./import/basic.php');
    include('./import/adblock.php');
    include('./import/content.php');
    ?>

</head>


<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "新增文章?";
include('./import/nav.php')
?>

<div class="container" id="body">


    <div class="container rounded shadow bg-dark content">

        <div id="content">
            <div class="d-flex align-items-center">
                <div class=".padding-left0 p-2 me-auto ">
                    <div >
                        <h2 contenteditable="true" id="title1">所以這是什麼，可以吃嗎? </h2>
                    </div>
                </div>

                <div class="p-2 vote">
                    <div class="btn btn-primary" id="create">送出</div>
                </div>

            </div>
        </div>

        <div id="editor">
            <p>你可以嘗試反白這段文字，這是一個所見及所得的編輯器，使用quill</p>
            <p>Some initial <strong>bold</strong> text</p>
            <p><br></p>
        </div>
    </div>

    <br>

    <div class="adbox">
        <a href="google.com" class="preview-link">
            <div class="container rounded shadow bg-danger  preview-box">
                <h3 class="title-preview">廣告</h3>
                <p class="content-preview">
                    這邊會插入廣告OUO，想用google adsence，再給我時間研究。
                </p>
            </div>
        </a>
    </div>




    <script src="./js/editor.js"></script>


</body>

<script>
    quill.enable();

</script>

</html>