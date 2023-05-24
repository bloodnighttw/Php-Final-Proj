<link href="./css/login.css" rel="stylesheet">
<?php
    if(isset($_COOKIE['PHPSESSID']) || session_id() != '')
        echo '<script type="text/javascript">
        window.location = "index.php";
        </script>';
?>
