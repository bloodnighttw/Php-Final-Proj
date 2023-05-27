<div class="" data-bs-toggle="offcanvas" data-bs-target="#profile" aria-controls="offcanvasNavbar"
     aria-label="Toggle navigation">

    <div class="img-box">
        <img src="./img/avatar/<?php echo $_SESSION['userid'] ?? 'guest'?>.png" alt="avatars" height="35" width="35"
             class="img">
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-dangerrounded-circle"></span>
    </div>

</div>
<div class="offcanvas offcanvas-end " tabindex="-1" id="profile" aria-labelledby="offcanvasNavbarLabel">

    <div class="offcanvas-header">
        <img src="./img/avatar/<?php echo $_SESSION['userid'] ?? 'guest'?>.png" alt="avatars" height="30" width="30"
             class="img rounded-circle">

        <h5 class="offcanvas-title float-start" id="offcanvasNavbarLabel">&nbsp;</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">


        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./vip.php">
                    <span>購買會員</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./buy.php">
                    <span>購買獎章</span>
                </a>

            </li>

            <hr>


            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./login.php">登入</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./signin.php">註冊</a>
            </li>


            <hr>

        </ul>
    </div>

</div>





