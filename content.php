<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('import/basic.php');
    include('import/adblock.php');
    include('import/content.php');
    ?>

</head>

<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "所以這是什麼，可以吃嗎?";
include('import/nav.php')
?>

<div class="container" id="body">

    <div class="container rounded shadow bg-dark content">

        <div>
            <div class="d-flex align-items-center">
                <div class=".padding-left0 p-2 me-auto ">
                    <div class="">
                        <h2 contenteditable="false" id="title">所以這是什麼，可以吃嗎? </h2>
                    </div>
                </div>
                <div class="p-2 vote">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path
                                d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                </div>
                <div class="p-2 vote">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </div>

                <div class="p-2">

                    <!-- Default dropstart button -->
                    <div class="btn-group dropstart">

                        <div type="button" class="func-menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                 class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>

                        </div>
                        <ul class="dropdown-menu">
                            <li><a href="" class="dropdown-item" id="edit">編輯</a></li>
                            <li><a href="" class="dropdown-item bg-danger" id="del">刪除</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <div class="by">

                <div class="d-flex ">
                    <div class="padding-left0  flex-grow-1"><p class="padding-left0"> by <img
                                    src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="24"
                                    width="auto" class="img rounded-circle"> bloodnighttw </p></div>

                    <div class="badge-list">
                        <img src="img/badge/0.png" class="badge-img" alt="badge1">
                        <div class="badge-content shadow bg-dark rounded border-5"><h6>榮譽獎章</h6>
                            <p>你可以在此處購買獎章獎勵你喜歡的文章</p></div>
                    </div>
                    <div class="badge-list">
                        <img src="img/badge/0.png" class="badge-img" alt="badge1">
                        <div class="badge-content shadow bg-dark rounded border-5"><h6>榮譽獎章</h6>
                            <p>你可以在此處購買獎章獎勵你喜歡的文章</p></div>
                    </div>
                    <div class="badge-list">
                        <img src="img/badge/0.png" class="badge-img" alt="badge1">
                        <div class="badge-content shadow bg-dark rounded border-5"><h6>榮譽獎章</h6>
                            <p>你可以在此處購買獎章獎勵你喜歡的文章</p></div>
                    </div>

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

    <div id="comment">

        <div class="container rounded shadow bg-dark content">

            <div>

                <div class="d-flex  align-items-center comme">
                    <div class=".padding-left0 p-2 me-auto ">
                        <div class="">
                            <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="30"
                                 width="auto" class="img rounded-circle">
                        </div>
                    </div>
                    <div class="p-2 me-auto">
                        <h6>bloodnighttw</h6>

                    </div>
                    <div class="p-2 vote">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                    </div>
                    <div class="p-2 vote">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                    d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                        </svg>
                    </div>


                    <div class="p-2">

                        <!-- Default dropstart button -->
                        <div class="btn-group dropstart">

                            <div type="button" class="func-menu" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                     class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>

                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item bg-danger" id="del">刪除</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="comment-editor">
                <p>你可以嘗試反白這段文字，這是一個所見及所得的編輯器，使用quill</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>
        </div>
        <br>
    </div>


    <script src="./js/editor.js"></script>


</body>

</html>