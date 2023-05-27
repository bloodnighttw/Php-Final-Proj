<div class="" data-bs-toggle="offcanvas" data-bs-target="#profile" aria-controls="offcanvasNavbar"
     aria-label="Toggle navigation">

    <div class="img-box">
        <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="35" width="35"
             class="img">
        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger   rounded-circle">

                </span>
    </div>

</div>
<div class="offcanvas offcanvas-end " tabindex="-1" id="profile" aria-labelledby="offcanvasNavbarLabel">

    <div class="offcanvas-header">
        <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="30" width="30"
             class="img" class="rounded-circle">

        <h5 class="offcanvas-title float-start" id="offcanvasNavbarLabel">李弘唯&nbsp;</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>


    <div class="offcanvas-body">


        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./vip.php">
                    <span>你的會員還剩下</span>
                    <span class="float-end badge bg-danger justify-content-center badge-center">
                                30天
                            </span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./buy.php">
                    <span>購買獎章</span>
                    <span class="float-end badge bg-danger justify-content-center badge-center">
                                你尚未結帳
                            </span>
                </a>

            </li>

            <hr>




            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./profile.php?id=<?php echo $_SESSION['userid']?>">個人檔案</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./logout.php">登出</a>
            </li>



            <hr>
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    我的最愛
                </a>
                <ul class="dropdown-menu border-0">
                    <li><a class="dropdown-item" href="#"><?php echo session_id()?></a></li>
                    <li><a class="dropdown-item" href="#">list2</a></li>
                    <li>

                    </li>
                    <li><a class="dropdown-item" href="#">list3</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>






