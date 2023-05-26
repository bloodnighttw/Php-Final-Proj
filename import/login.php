<link href="./css/login.css" rel="stylesheet">
<?php
    if(isset($_SESSION['userid']))
        echo '<script type="text/javascript">
        window.location = "index.php";
        </script>';
?>
