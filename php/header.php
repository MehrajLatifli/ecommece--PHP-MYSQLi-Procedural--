<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <!-- Boxicons -->
    <link href="./paquetes/boxicons/node_modules/boxicons/css/boxicons.css?v=<?php echo time(); ?>" rel="stylesheet" />
    <!-- Glide js -->
    <link rel="stylesheet" href="./paquetes/glidejs/node_modules/@glidejs/glide/dist/css/glide.core.css">
    <link rel="stylesheet" href="./paquetes/glidejs/node_modules/@glidejs/glide/dist/css/glide.theme.css">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css?v=<?php echo time(); ?>" />
    
    <script src="./paquetes/jquery/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./paquetes/boxicons/node_modules/boxicons/dist/boxicons.js"></script>
    
    <title>ecommerce Website</title>

    <script>
        function hide(section) {
            document.getElementById(section).style.display = "none";

        }


        function selected() {

            document.getElementById("sortingform").submit();

        }



        function wishlistsubmit() {

            document.getElementById("wishlistform").submit();


        }


        function stopautosubmitafterreloadpage() {



            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        }


        function removeclasses(class1, class2, class3) {



            var element1 = document.getElementById(class1);
            element1.classList.remove(class1);

            var element2 = document.getElementById(class2);
            element2.classList.remove(class2);

            var element3 = document.getElementById(class3);
            element3.id = "";


        }

        function tagdinamycwidth() {

            console.log(window.getComputedStyle(document.getElementsByTagName("body")[0]).width);

        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }

        function startTime(t) {

            var today = new Date('<?php print date("F d, Y H:i:s", time()) ?>');


          var s=  setInterval(() => {

                today.setSeconds(today.getSeconds() + 1)
                var year = today.getFullYear();
                var month = today.getMonth();
                var day = today.getDate();
                var hour = today.getHours();
                var minute = today.getMinutes();
                var second = today.getSeconds();
                minute = checkTime(minute);
                second = checkTime(second);
                month = checkTime(month);
                var time = year + "-" + month + "-" + day + " " + hour + ":" + minute + ":" + second;
                console.log(time);

                document.getElementById("time").innerHTML=time;
                if(second==00)
                {
    
                    window.location.reload();
                }
            }, 1000);



        }



        function attentiontextclose() {

            setTimeout(() => {

                document.getElementById("attentiontext").innerText = "";



            }, 10000);

        }
    </script>
</head>

<body>



    <!-- Header -->
    <header class="header" id="header">
        <!-- Top Nav -->
        <div class="top-nav">
            <div id="langcontainer" class="container d-flex">

                <?php


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

                        echo ('<p>' . $row["title"] .   '</p>');

                        echo ('<p id="attentiontext">' . $row["title2"] .   '</p>');

                        $message = $row["title2"];

                        echo ("<script> attentiontextclose()</script>");
                    }
                }

                ?>


                <ul id="langlink" class="d-flex">

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

                                echo ('<li class="' . $langchooseactive . '" ><a href="?lang=' . $row["id"] . '">' . ucfirst($row["short"]) . '</a> </li>');
                            } else {


                                echo ('<li ><a href="?lang=' . $row["id"] . '">' . ucfirst($row["short"]) . '</a> </li>');
                            }
                        }
                        if (isset($_SESSION['username'])) {
                            $username = '&nbsp &nbsp <button style="border-radius:5px;   background-color: orange ;border-color: #8de02c;"> <a style="  color: white;" href="?action=logout">  &nbsp ' . $_SESSION["username"] . ' &nbsp </a> </button>';

                            echo ('<li > '  . $username . ' </li>');
                        }
                    } else {
                        echo "0 results";
                    }




                    ?>

                </ul>
            </div>


        </div>
        <div class="navigation">
            <div class="nav-center container d-flex">
                <a href="index.php" class="logo">
                    <h1>Dans</h1>
                </a>

                <ul class="nav-list d-flex">

                    <?php
                                if (is_numeric($lang)) {

                                    $sql = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `status`=1 AND `ordermenu`<4 ORDER BY`ordermenu`";

                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {

                                        while ($row = mysqli_fetch_assoc($result)) {

                                            echo ('<li class="nav-item"> <a class="nav-link" href="?page=' . $row["id"] . '">' . $row["name"] . '</a> </li>');
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                }

                    ?>


                    <li class="icons d-flex">


                        <?php


                        $sql = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `status`=1 AND `ordermenu`>3 ORDER BY`ordermenu`";

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_assoc($result)) {


                                $icon = "";
                                $countspan = "";
                                $countheart = 0;
                                $countbasket = 0;
                                $displaynone = "";


                                if (isset($_SESSION['username']) && $_SESSION['password']) {

                                    $sqlbasket = 'SELECT Count(*) as total FROM `basket` 
                                            INNER JOIN `product` ON product.idproduct = productId
                                             INNER JOIN `user` ON user.id = userId
                                           WHERE user.id=' . $_SESSION['userid'] . '';

                                    $resultbasket = mysqli_query($conn, $sqlbasket);

                                    if (mysqli_num_rows($resultbasket) > 0) {

                                        while ($rowbasket = mysqli_fetch_assoc($resultbasket)) {

                                            $countbasket = $rowbasket['total'];
                                        }
                                    }


                                    $sqlwish = 'SELECT Count(*) as total2 FROM `wishlist` 
                                             INNER JOIN `product` ON product.idproduct = productId
                                             INNER JOIN `user` ON user.id = userId
                                             WHERE user.id=' . $_SESSION['userid'] . '';

                                    $resultwish = mysqli_query($conn, $sqlwish);

                                    if (mysqli_num_rows($resultwish) > 0) {

                                        while ($rowwish = mysqli_fetch_assoc($resultwish)) {

                                            $countheart = $rowwish['total2'];
                                        }
                                    }


                                    if ($row["menutypeId"] == 3) {
                                        $icon = "user";

                                        if (isset($_SESSION['username'])) {
                                            $displaynone = "none";
                                        }
                                    }


                                    if ($row["menutypeId"] == 1) {
                                        $icon = "heart";
                                        $countspan = ' <span class="d-flex">' . $countheart . '</span>';
                                    }
                                    if ($row["menutypeId"] == 2) {
                                        $icon = "cart";
                                        $countspan = ' <span class="d-flex">' . $countbasket . '</span>';
                                    }
                                }

                                if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {

                                    if ($row["menutypeId"] == 3) {
                                        $icon = "user";

                                        if (isset($_SESSION['username'])) {
                                            $displaynone = "none";
                                        }
                                    }


                                    if ($row["menutypeId"] == 1) {
                                        $icon = "heart";
                                        $countspan = ' <span class="d-flex">0</span>';
                                    }
                                    if ($row["menutypeId"] == 2) {
                                        $icon = "cart";
                                        $countspan = ' <span class="d-flex">0</span>';
                                    }
                                }

                                echo ('<a style="display:' . $displaynone . '" class="icon" href="?page=' . $row["id"] . '"> <i class="bx bx-' . $icon . '"></i>' . $countspan . ' </a>');
                            }
                        } else {
                            echo "0 results";
                        }


                        ?>


                    </li>
                </ul>

                <div class="icons d-flex">

                    <?php


                    $sql = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `status`=1 AND `ordermenu`>3 ORDER BY`ordermenu`";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {


                            $icon = "";
                            $countspan = "";
                            $countheart = 0;
                            $countbasket = 0;
                            $displaynone = "";


                            if (isset($_SESSION['username']) && $_SESSION['password']) {

                                $sqlbasket = 'SELECT Count(*) as total FROM `basket` 
                                INNER JOIN `product` ON product.idproduct = productId
                                INNER JOIN `user` ON user.id = userId
                                 WHERE user.id=' . $_SESSION['userid'] . '';

                                $resultbasket = mysqli_query($conn, $sqlbasket);

                                if (mysqli_num_rows($resultbasket) > 0) {

                                    while ($rowbasket = mysqli_fetch_assoc($resultbasket)) {

                                        $countbasket = $rowbasket['total'];
                                    }
                                }


                                $sqlwish = 'SELECT Count(*) as total2 FROM `wishlist` 
                                INNER JOIN `product` ON product.idproduct = productId
                                INNER JOIN `user` ON user.id = userId
                                 WHERE user.id=' . $_SESSION['userid'] . '';

                                $resultwish = mysqli_query($conn, $sqlwish);

                                if (mysqli_num_rows($resultwish) > 0) {

                                    while ($rowwish = mysqli_fetch_assoc($resultwish)) {

                                        $countheart = $rowwish['total2'];
                                    }
                                }


                                if ($row["menutypeId"] == 3) {
                                    $icon = "user";

                                    if (isset($_SESSION['username'])) {
                                        $displaynone = "none";
                                    }
                                }


                                if ($row["menutypeId"] == 1) {
                                    $icon = "heart";
                                    $countspan = ' <span class="d-flex">' . $countheart . '</span>';
                                }
                                if ($row["menutypeId"] == 2) {
                                    $icon = "cart";
                                    $countspan = ' <span class="d-flex">' . $countbasket . '</span>';
                                }
                            }

                            if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {

                                if ($row["menutypeId"] == 3) {
                                    $icon = "user";

                                    if (isset($_SESSION['username'])) {
                                        $displaynone = "none";
                                    }
                                }


                                if ($row["menutypeId"] == 1) {
                                    $icon = "heart";
                                    $countspan = ' <span class="d-flex">0</span>';
                                }
                                if ($row["menutypeId"] == 2) {
                                    $icon = "cart";
                                    $countspan = ' <span class="d-flex">0</span>';
                                }
                            }

                            echo ('<a style="display:' . $displaynone . '" class="icon" href="?page=' . $row["id"] . '"> <i class="bx bx-' . $icon . '"></i>' . $countspan . ' </a>');
                        }
                    } else {
                        echo "0 results";
                    }



                    ?>

                </div>

                <div class="hamburger">
                    <i class="bx bx-menu-alt-left"></i>
                </div>
            </div>
        </div>

        <div class="hero" id="hero">
            <div class="glide" id="glide_1">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <div class="center" id="center">
                                <?php



                                getHeader1($page, $lang, $conn);



                                ?>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="center">
                                <?php


                                getHeader2($page,  $lang, $conn);

                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>