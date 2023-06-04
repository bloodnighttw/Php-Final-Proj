<?php
header('Content-Type: application/json; charset=utf-8');
session_start();

if (!isset($_SESSION['userid'])) {
    header("HTTP/1.1 401 Unauthorized");
    die();
}
$data = json_decode(file_get_contents('php://input'),true);


if (!isset($data['delta']['ops']) || !isset($data['id']) ) {
    header("HTTP/1.1 404 Not Found");
    die();
}

$timestampNow =  date("Y-m-d H:i:s");

require_once '../import/database.php';
$insertPrepare = $db->prepare('INSERT Into comment(userid,time,delta,contentid) values (?,?,?,?)');
$insertPrepare->execute([$_SESSION['userid'], $timestampNow, json_encode($data['delta']), $data['id']]);
die();