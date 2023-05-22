<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include('import/basic.php');
        include('import/adblock.php'); 
        include('import/good.php');
    ?>

</head>

<script>

    $(function () {
        $("#buy").click(function () {
            alert("buy")
        })

        $("#clear").click(function () {
            $("input[type=text]").each(function(){
                $(this).val("0")
            })
        })

        $(".add").click(function (e) {
            let temp = $(this).siblings('input')
            temp.val(Number(temp.val())+1);
        })

        $(".sub").click(function (e) {
            let temp = $(this).siblings('input')
            temp.val((Number(temp.val()) > 0) ? Number(temp.val()) - 1 : 0 );
        })
    })




</script>



<body class="bg-dark" data-bs-theme="dark">

    <?php
        $page_func="所以這是什麼，可以吃嗎?";
        include('import/nav.php');
    ?>

    <div class="container-xxl">

        <br>
        <h1 class="text-center fw-bold"> 購買方案</h1>
        <p class="text-center">任何獲得獎章的人將會獲得經驗值獎勵</p>
        <hr>

        <div class="text-center row row-cols-1 row-cols-md-2 row-cols-lg-4 vip-info">


            <div class=" p-2 col ">
                    <div class="container rounded shadow  purchase-card ">
                        <img src="img/login.jpg" alt="">
                        <h1>實用獎章</h1>
                        <p>購買此獎章以獎勵你覺得非常實用的文章</p>
                        <p>$30</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-30" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>


            </div>


            <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card ">
                        <img src="img/login.jpg" alt="">

                        <h1>XX獎章</h1>
                        <p>(這是描述)</p>
                        <p>$30</p>

                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-30" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>
            </div>


            <div class=" p-2 col ">
                    <div class=" container rounded shadow purchase-card ">
                        <img src="img/login.jpg" alt="">
                        <h1>火箭獎章</h1>
                        <p>獲得此獎章的人將會獲得一個禮拜的會員</p>
                        <p>$100</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-100" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>
            </div>

            <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card  ">
                        <img src="img/login.jpg" alt="">
                        <h1 class="">感謝獎章</h1>
                        <p>購買此獎章以獎勵你覺得感謝的文章</p>
                        <p>$30</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-30" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>


            </div>

            <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card  ">
                        <img src="img/login.jpg" alt="">
                        <h1 class="">浣熊獎章</h1>
                        <p>$15</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-15" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>


            </div>

            <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card  ">
                        <img src="img/login.jpg" alt="">
                        <h1 class="">水獺獎章</h1>
                        <p>$15</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-15" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>


            </div>

            <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card  ">
                        <img src="img/login.jpg" alt="">
                        <h1 class="">黑熊獎章</h1>
                        <p>$15</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-15" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>
            </div>

            <div class=" p-2 col ">
                    <div class="container rounded shadow purchase-card  ">
                        <img src="img/login.jpg" alt="">
                        <h1 class="">狗狗獎章</h1>
                        <p>$15</p>
                        <div class="counter center-text">
                            <div class="input-group">
                                <button class="btn btn-danger sub" type="button">-</button>
                                <input type="text" class="form-control price-15" placeholder="" value="0">
                                <button class="btn btn-danger add" type="button">+</button>
                            </div>
                        </div>

                    </div>


            </div>




        </div>

        <hr>

        <div class="d-flex justify-content-end align-items-center">
            <h2 class="align-self-center me-auto">總共20元</h2>
            <h2 class=" align-self-center btn btn-danger me-2" type="button" id="clear">清除</h2>
            <h2 class=" align-self-center btn btn-primary" type="button" id="buy">結帳</h2>
        </div>




    </div>

    <br>







</body>

</html>