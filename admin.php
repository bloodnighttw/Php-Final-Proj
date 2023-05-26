<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('import/basic.php')
    ?>
    <script src="./js/admin.js"></script>
    <link rel="stylesheet" href="./css/admin.css">
</head>

<body class="bg-dark" data-bs-theme="dark">

<?php
$page_func = "ADMIN";
include('import/nav.php');
?>

<div class="container-xxl">


</div>

<div class="container">

    <div class="row">

        <div class="col-sm-6 h-100">
            <div class="container rounded shadow text-center">
                <h1>使用者名單</h1>
                <div class="d-flex  align-items-center">
                    <div class=".padding-left0 p-2 me-auto ">
                        <div class="">
                            <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="40"
                                 width="auto"
                                 class="img rounded-circle">
                        </div>
                    </div>
                    <div class="p-2 me-auto">
                        <h3>bloodnighttw</h3>

                    </div>

                    <div class="p-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                             class="bi bi-sign-stop-fill" viewBox="0 0 16 16">
                            <path
                                    d="M10.371 8.277v-.553c0-.827-.422-1.234-.987-1.234-.572 0-.99.407-.99 1.234v.553c0 .83.418 1.237.99 1.237.565 0 .987-.408.987-1.237Zm2.586-.24c.463 0 .735-.272.735-.744s-.272-.741-.735-.741h-.774v1.485h.774Z"/>
                            <path
                                    d="M4.893 0a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146A.5.5 0 0 0 11.107 0H4.893ZM3.16 10.08c-.931 0-1.447-.493-1.494-1.132h.653c.065.346.396.583.891.583.524 0 .83-.246.83-.62 0-.303-.203-.467-.637-.572l-.656-.164c-.61-.147-.978-.51-.978-1.078 0-.706.597-1.184 1.444-1.184.853 0 1.386.475 1.436 1.087h-.645c-.064-.32-.352-.542-.797-.542-.472 0-.77.246-.77.6 0 .261.196.437.553.522l.654.161c.673.164 1.06.487 1.06 1.11 0 .736-.574 1.228-1.544 1.228Zm3.427-3.51V10h-.665V6.57H4.753V6h3.006v.568H6.587Zm4.458 1.16v.544c0 1.131-.636 1.805-1.661 1.805-1.026 0-1.664-.674-1.664-1.805V7.73c0-1.136.638-1.807 1.664-1.807 1.025 0 1.66.674 1.66 1.807ZM11.52 6h1.535c.82 0 1.316.55 1.316 1.292 0 .747-.501 1.289-1.321 1.289h-.865V10h-.665V6.001Z"/>
                        </svg>
                    </div>


                    <div class="p-2">

                        <!-- Default dropstart button -->
                        <div class="btn-group dropstart">

                            <div type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                     class="bi bi-list stop" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>

                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item bg-danger" id="del">刪除此使用者</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-sm-6 h-100">
            <div class="container rounded shadow text-center">
                <h1>會員名單</h1>
                <div class="d-flex  align-items-center">
                    <div class=".padding-left0 p-2 me-auto ">
                        <div class="">
                            <img src="https://avatars.githubusercontent.com/u/44264182" alt="avatars" height="40"
                                 width="auto"
                                 class="img rounded-circle">
                        </div>
                    </div>
                    <div class="p-2 me-auto">
                        <h3>bloodnighttw</h3>

                    </div>

                    <div class="p-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                             class="bi bi-sign-stop-fill" viewBox="0 0 16 16">
                            <path
                                    d="M10.371 8.277v-.553c0-.827-.422-1.234-.987-1.234-.572 0-.99.407-.99 1.234v.553c0 .83.418 1.237.99 1.237.565 0 .987-.408.987-1.237Zm2.586-.24c.463 0 .735-.272.735-.744s-.272-.741-.735-.741h-.774v1.485h.774Z"/>
                            <path
                                    d="M4.893 0a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146A.5.5 0 0 0 11.107 0H4.893ZM3.16 10.08c-.931 0-1.447-.493-1.494-1.132h.653c.065.346.396.583.891.583.524 0 .83-.246.83-.62 0-.303-.203-.467-.637-.572l-.656-.164c-.61-.147-.978-.51-.978-1.078 0-.706.597-1.184 1.444-1.184.853 0 1.386.475 1.436 1.087h-.645c-.064-.32-.352-.542-.797-.542-.472 0-.77.246-.77.6 0 .261.196.437.553.522l.654.161c.673.164 1.06.487 1.06 1.11 0 .736-.574 1.228-1.544 1.228Zm3.427-3.51V10h-.665V6.57H4.753V6h3.006v.568H6.587Zm4.458 1.16v.544c0 1.131-.636 1.805-1.661 1.805-1.026 0-1.664-.674-1.664-1.805V7.73c0-1.136.638-1.807 1.664-1.807 1.025 0 1.66.674 1.66 1.807ZM11.52 6h1.535c.82 0 1.316.55 1.316 1.292 0 .747-.501 1.289-1.321 1.289h-.865V10h-.665V6.001Z"/>
                        </svg>
                    </div>


                    <div class="p-2">

                        <!-- Default dropstart button -->
                        <div class="btn-group dropstart">

                            <div type="button" class="" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                     class="bi bi-list stop" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>

                            </div>
                            <ul class="dropdown-menu">
                                <li><a href="" class="dropdown-item bg-danger" id="del">刪除此使用者</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


</body>

</html>