<?php
header('Content-Type: application/json; charset=utf-8');

session_start();
if (!isset($_SESSION['userid'])) {
    header("HTTP/1.1 401 Unauthorized");
    die();
}
$data = json_decode(file_get_contents('php://input'),true);


if (!isset($data['delta']['ops']) ) {
    header("HTTP/1.1 404 Not Found");
    echo 'delta not found';
    die();
}

if (!isset($data['title'])) {
    header("HTTP/1.1 404 Not Found");
    echo 'title not found';
    die();
}



$timestampNow =  date("Y-m-d H:i:s");

require_once '../import/database.php';
$insertPrepare = $db->prepare('INSERT Into content(userid,time,delta,title) values (?,?,?,?)');
$insertPrepare->execute([$_SESSION['userid'], $timestampNow, json_encode($data['delta']), $data['title']]);

echo '{"id":' . $db->lastInsertId() . '}';

die();