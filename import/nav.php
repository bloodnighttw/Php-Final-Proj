<nav class="navbar bg-body-tertiary fixed-top bg-dark">
    <div class="container-xxl ">

        <div>
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link navbar-brand" aria-current="page" href="./index.php"><img src="./img/icon.png"
                            alt="Bootstrap" width="35" height="35"></a>
                </li>
            </ul>
        </div>

        <div class="center-text" ST>
            <p class="title"><?php echo isset($page_func) ? $page_func : "NODEFINED"?></p>
        </div>




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
                        <a class="nav-link active" aria-current="page" href="./editprofile.php">個人檔案</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">登出</a>
                    </li>



                    <hr>
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            我的最愛
                        </a>
                        <ul class="dropdown-menu border-0">
                            <li><a class="dropdown-item" href="#">list1</a></li>
                            <li><a class="dropdown-item" href="#">list2</a></li>
                            <li>

                            </li>
                            <li><a class="dropdown-item" href="#">list3</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>


        <div class="" data-bs-toggle="offcanvas" data-bs-target="#search" aria-controls="offcanvasNavbar"
            aria-label="Toggle navigation">

            <img src="./img/search.svg" alt="search" height="25" width="auto">

        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="search" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title float-start" id="offcanvasNavbarLabel">搜尋&nbsp;</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">

                <form class="d-flex mt-3" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

                <br>

                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">link1</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">link2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">link3</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>

<br>
<br>
<br>
