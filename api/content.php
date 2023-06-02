<?php
require_once '../import/database.php';
$contentPrepare = $db->prepare('SELECT content.delta FROM content where id=?');

if(!isset($_GET['id'])){
    header("HTTP/1.1 404 Not Found");
    die();
}

$contentPrepare->execute([$_GET['id']]);

$result = $contentPrepare->fetch();

if(is_bool($result)){
    header("HTTP/1.1 404 Not Found");
    die();
}

echo $result['delta'];
