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
            <p class="title"><?php echo $page_func ?? "DEFINED" ?></p>
        </div>

        <?php
            if(isset($_SESSION['userid'])){
                include 'import/avatar.php';
            }else
                include "import/logout.php";

        ?>

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
