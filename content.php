<?php
session_start();
if(!isset($_GET['id'])){
    header("HTTP/1.1 404 Not Found");
    die();
}

require_once './import/database.php';
$infoPrepare = $db->prepare('SELECT user.id,username,title FROM content LEFT JOIN user ON user.id = userid WHERE content.id = ?');
$infoPrepare->execute([$_GET['id']]);
if( $result = $infoPrepare->fetch()){
    $title = $result['title'];
    $id = $result['id'];
    $username = $result['username'];
}else{
    header("HTTP/1.1 404 Not Found");
    die();
}

$findlast = $db->prepare('SELECT SUM(VOTE) FROM content_vote where contentid=?');
$findlast->execute([$_GET['id']]);
$result = $findlast->fetch();
$totalcount = ($result[0] != null) ? $result[0] : 0;

$pressPrepare = $db->prepare('SELECT vote FROM content_vote where userid=? and contentid=?');
$pressPrepare->execute([$_SESSION['userid'],$_GET['id']]);
$count = $pressPrepare->fetch();
if(!$count)
    $count = 0;
else
    $count = $count['vote'];


$commentPrepare = $db->prepare('SELECT comment.id,username,userid FROM comment left join user on userid = user.id where contentid=? order by time asc');
$commentPrepare->execute([$_GET['id']]);



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
$page_func = $title;
include('./import/nav.php')
?>

<div class="container" id="body">

    <div class="container rounded shadow bg-dark content">

        <div id="content" content-id="<?php echo $_GET['id']?>">
            <div class="d-flex align-items-center">
                <div class="padding-left0 p-2 me-auto ">
                    <div class="">
                        <h2 contenteditable="false" id="title"><?php echo $title?></h2>
                    </div>
                </div>
                <div class="p-2 vote">
                    <div class="btn btn-primary" id="update">更新</div>
                </div>

                <div class="p-2 vote cup <?php if($count == 1) echo 'press'?>" field="content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                        <path
                                d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                    </svg>
                </div>

                <div class="p-2 count">
                    <?php echo $totalcount?>
                </div>

                <div class="p-2 vote cdown <?php if($count == -1) echo 'press'?>">
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
                            <li><a href="" class="dropdown-item report">檢舉</a></li>
                            <?php if($_SESSION['userid'] == $id){ ?>
                                <li><a href="" class="dropdown-item" id="edit">編輯</a></li>
                                <li><a href="" class="dropdown-item bg-danger" id="del">刪除</a></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div>

                <div class="d-flex">
                    <div class="flex-grow-1">
                        <p class="p-2"> by
                            <a href="./profile.php?id=<?php echo $id?>" class="preview-link">
                                <img src="./img/avatar/<?php echo $id?>.png" alt="avatars" height="24"
                                     width="24" class="img rounded-circle"> <?php echo $username?> </p>
                            </a>

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
                    <div class="badge-list">
                        <img src="img/badge/0.png" class="badge-img" alt="badge1">
                        <div class="badge-content shadow bg-dark rounded border-5"><h6>榮譽獎章</h6>
                            <p>你可以在此處購買獎章獎勵你喜歡的文章</p></div>
                    </div>

                </div>
            </div>

        <div id="editor">
            載入中......
        </div>
    </div>


    <br>

    <div class="container rounded shadow bg-secondary content">

        <div>
            <div class="d-flex align-items-center">
                <div class=".padding-left0 p-2 me-auto ">
                    <div >
                        <h2 id="title1">留言 </h2>
                    </div>
                </div>

                <div class="p-2 vote">
                    <div class="btn btn-primary" id="create-comment" content-id="<?php echo $_GET['id']?>">送出</div>
                </div>

            </div>
        </div>

        <div id="comment-box" data-text="yo">
            <p>把這段文字刪除，並留點東西吧</p>
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

    <?php while($comment = $commentPrepare->fetch(PDO::FETCH_ASSOC)){
        $votePrepare = $db->prepare('SELECT SUM(vote) FROM comment_vote where commentid=?');
        $votePrepare->execute([$comment['id']]);
        $voteCount = $votePrepare->fetch(PDO::FETCH_COLUMN) ?? 0;

        ?>

    <div id="comment">

        <div class="container rounded shadow bg-dark content">

            <div>

                <div class="d-flex  align-items-center comme">
                    <div class=".padding-left0 p-2 me-auto ">
                        <div class="">
                            <img src="./img/avatar/<?php echo $comment['userid']?>.png" alt="avatars" height="30"
                                 width="30" class="img rounded-circle">
                        </div>
                    </div>
                    <div class="p-2 me-auto">
                        <h6><?php echo $comment['username']?></h6>

                    </div>
                    <div class="p-2 vote up" comment-id="<?php echo $comment['id']?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                             fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16">
                            <path
                                    d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                        </svg>
                    </div>
                    <div class="p-2 vote count"><?php echo $voteCount?>
                    </div>
                    <div class="p-2 vote down" comment-id="<?php echo $comment['id']?>">
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
                            <?php if($comment['userid'] == $_SESSION['userid']){?>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item bg-danger" id="del">刪除</a></li>
                            </ul>
                            <?php } ?>

                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item report">檢舉</a></li>
                            </ul>

                        </div>
                    </div>


                </div>
            </div>
            <div class="comment-editor" comment-id="<?php echo $comment['id']?>">
                <p>正在載入中.......</p>
            </div>
        </div>
        <br>
    </div>

    <?php } ?>


    <script src="./js/editor.js"></script>


</body>

</html>