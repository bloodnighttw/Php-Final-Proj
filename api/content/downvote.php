<?php

session_start();
header('Content-Type: application/json; charset=utf-8');


require_once '../../import/database.php';
if (!isset($_SESSION['userid']) || !isset($_GET['id'])) {
    header("HTTP/1.1 404 Not Found");
    die();
}

$checkExist = $db->prepare('SELECT 1 FROM content where id=?');
$checkExist->execute([$_GET['id']]);
if (!$checkExist->fetch()) {
    header("HTTP/1.1 404 Not Found");
    die();
}

$delPrepare = $db->prepare('DELETE FROM content_vote where contentid=? and userid=?');
$addupvote = $db->prepare('INSERT INTO content_vote(userid, contentid, vote) values(?,?,-1)');
$delPrepare->execute([$_GET['id'], $_SESSION['userid']]);
$addupvote->execute([$_SESSION['userid'], $_GET['id']]);

$findlast = $db->prepare('SELECT SUM(VOTE) FROM content_vote where contentid=?');
$findlast->execute([$_GET['id']]);
$count = ($result = $findlast->fetch()) ? $result[0] : 0;

echo '{"count":' . ($count) . '}';



