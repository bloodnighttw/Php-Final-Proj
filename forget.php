<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'import/basic.php';
    include 'import/login.php'
    ?>
</head>

<body class="bg-dark" data-bs-theme="dark">

<div class="vc login-box">
    <div class="container ct shadow-lg p-3 mb-5 bg-dark rounded">

        <h1 class="center">忘記密碼</h1>
        <hr>

        <form method="post" action="./forget.php">

            <div class="mb-3">
                <label for="resend-email" class="form-label">你的電子郵件</label>
                <input type="email" class="form-control" id="resend-email"
                       placeholder="name@example.com" name="email">
            </div>

            <div class="col-auto ">
                <p class="small float-start">
                    我們將會發送一個重設密碼的連結到你的信箱
                </p>
                <button type="submit" class="btn btn-primary mb-3 float-end btn-padding">確認</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>