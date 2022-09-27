<?php

require_once "db.php";

require_once "function.php";

session_start();


$lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 1);

setcookie('lang', $lang, time() + (86400 * 30), "/");


$page = isset($_GET['page']) ? $_GET['page'] : getAdminMainPage($lang, $conn);


$langchooseactive = isset($_COOKIE['langchooseactive']) ? $_COOKIE['langchooseactive'] : "langchooseactive";

setcookie($langchooseactive, $langchooseactive, time() + (86400 * 30), "/");


if (!isset($_SESSION["username"]) ||  isset($_REQUEST["action"]) && $_REQUEST["action"] == "Sign Out") {
    session_unset();
    session_destroy();

    $lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 1);

    setcookie('lang', $lang, time() + (86400 * 30), "/");

    header("Location: index.php");
    die();
}

if ($_SESSION["username"] != "admin" || $_SESSION["password"] != $_SESSION['password'] ) {


    $lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 1);

    setcookie('lang', $lang, time() + (86400 * 30), "/");

    header("Location: index.php");
    die();
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
            try {

                $sql = "SELECT * FROM `content` 
            INNER JOIN `menu` ON menu.id=content.menuId 
            INNER JOIN `language` ON menu.languageId=language.id 
            WHERE menu.languageId='{$lang}' AND `menuId`='{$page}'";

                $result = mysqli_query($conn, $sql);
            } catch (mysqli_sql_exception $e) {
                echo (var_dump($e));
                exit;
            }

            if (mysqli_num_rows($result) > 0) {




                while ($row = mysqli_fetch_assoc($result)) {

                    echo ($row["title"]);
                }
            }
            ?></title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="admin/assets/css/style.css?v=<?php echo time(); ?>">
    <script src="./paquetes/jquery/node_modules/jquery/dist/jquery.min.js"></script>


    <script>
        function selected() {

            document.getElementById("sortingform").submit();

        }



        function stopautosubmitafterreloadpage() {



            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }

        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }



        function showFileName(fileInput) {
            var files = ((typeof fileInput === 'string' && (fileInput = fileInput.match(/[^\\\/]+$/)) && fileInput[0]) || '')
            document.getElementById("file-chosen").innerHTML = "&nbsp &nbsp " + files.substring(0, 25);
        }


        function madd() {
            document.getElementById("modal").style.display = "block";
        }

        function modalcolse() {
            document.getElementById("modal").style.display = "none";
        }



        function getParameterByName() {

            const val =window.location.search;

            const urlpar = new URLSearchParams(val);

          return urlpar;
        }
    </script>




</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="rocket-outline"></ion-icon>
                        </span>
                        <span class="title">Dans</span>

                    </a>
                </li>

                <?php


            $sql = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `ordermenu`>=10 ORDER BY`ordermenu`";

            $result = mysqli_query($conn, $sql);

            if (is_numeric($lang)) {

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($row["id"] == 23 || $row["id"] == 28) {
                            $icon = "home";
                            $href = '?page=' . $row["id"] . '';
                        }
                        if ($row["id"] == 24 || $row["id"] == 29) {
                            $icon = "basket";
                            $href = '?page=' . $row["id"] . '';
                        }
                        if ($row["id"] == 27 || $row["id"] == 30) {
                            $icon = "document-text";
                            $href = '?page=' . $row["id"] . '';
                        }
                        if ($row["id"] == 31 || $row["id"] == 33) {
                            $icon = "log-out";
                            $href = "?action=Sign Out";
                        }




                        echo ('<li><a class="nav-link" href="' . $href . '">
                        <span class="icon">
                            <ion-icon name="' . $icon . '-outline"></ion-icon>
                        </span>
                        <span class="title">' . $row["name"] . '</span>
                        </a></li>');
                    }
                }
            }


                ?>


                <br> <br> <br> <br>

                <?php
                try {
                    $sql = "SELECT * FROM `language` WHERE `status`=1 ORDER BY `short`";
                    $result = mysqli_query($conn, $sql);
                } catch (mysqli_sql_exception $e) {
                    echo (var_dump($e));
                    exit;
                }
                if (mysqli_num_rows($result) > 0) {



                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($lang == $row["id"]) {

                            echo (' <a style="color: orange;"  href="?lang=' . $row["id"] . '">  <span class="icon">
                                <ion-icon name="language-outline"></ion-icon>
                        </span>' . ucfirst($row["short"]) . '</a> <br>');
                        } else {


                            echo ('<a style="color: white;"   href="?lang=' . $row["id"] . '">  <span class="icon">
                                <ion-icon name="language-outline"></ion-icon>
                            </span>' . ucfirst($row["short"]) . '</a> <br>');
                        }
                    }
                } 




                ?>




            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>




                <div class="user">
                    <h2>
                        <?php echo ($_SESSION["username"]) ?>
                        <ion-icon name="person-outline"></ion-icon>
                    </h2>
                </div>
            </div>


            <?php

            getAdminContent($page, $lang, $conn);

            ?>





        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="./admin/assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->


    <script type="module" src="./paquetes/ionicons/node_modules/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="./paquetes/ionicons/node_modules/ionicons/dist/ionicons/ionicons.js"></script>
</body>

</html>