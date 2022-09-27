<?php

$action = $sqlaction = $sql2 = $username = $password = $userid = $submitlogin = $message = $sorting = $productid = $orderdatetime = $wishlistid = $wishliststatus = $basketid = $searchtext = $producttypeId= $menuId = $newcollection =$price= $oldprice = $currency=$designerchoose= $detail = $title = $measurement = $productimage =$updatesubmit=$deletesubmit=$createsubmit="";
getrequest();








if ($submitlogin !== null) {
    if ($username === '' || $password === '') {
    } elseif ($username !== 'admin' || $password !== 'admin') {

        $sql2 = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='".hash('sha256',$password)."'";
        $result2 = mysqli_query($conn, $sql2);

        $count = mysqli_num_rows($result2);

        if ($rowuser = mysqli_fetch_assoc($result2)) {



            if (mysqli_num_rows($result2) > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['userid'] = $rowuser['id'];
                header("Location: index.php");
                die();
            }
        }
    } elseif ($username === 'admin' || $password === $_SESSION['password'] ) {

        $sql2 = "SELECT * FROM `user` WHERE `username`='$username' AND `password`='".hash('sha256',$password)."'";
        $result2 = mysqli_query($conn, $sql2);

        $count = mysqli_num_rows($result2);

        if ($rowuser = mysqli_fetch_assoc($result2)) {



            if (mysqli_num_rows($result2) > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = hash('sha256',$password);
                $_SESSION['userid'] = $rowuser['id'];
                print_r($_SESSION);
                header("Location: admin.php");
                die();
            }
        }
    }
}


if(isset($_FILES["productimage"]))
{


    $extarr=["jpg","png","jpeg","gif"];
    $dir="images/products/";
    $name=$dir.$_FILES["productimage"]["name"];
    $imagefiletype=strtolower(pathinfo($name,PATHINFO_EXTENSION));
    $path=$dir.uniqid().".".$imagefiletype;
    $productimage=str_replace('.images/products/', '', "$path");

   



        if (!file_exists($path) && $_FILES["productimage"]["size"] < 10000000 && in_array($imagefiletype, $extarr)) {

            move_uploaded_file($_FILES["productimage"]["tmp_name"], $path);
        } 
        else {
            $sqlproduct = "SELECT * FROM `product` 
        INNER JOIN `menu` ON menu.id = menuId
        INNER JOIN `producttype` ON producttype.id = producttypeId
        WHERE menu.id!=1 AND menu.id!=3";

            $resultproduct = mysqli_query($conn, $sqlproduct);



            if (mysqli_num_rows($resultproduct) > 0) {

                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {
                    if ($productid == $rowproduct["idproduct"]) {

                        $productimage = $rowproduct["image"];

                        move_uploaded_file($_FILES["productimage"]["tmp_name"], $path);
                    }
                }
            }
        
    

   }

    

    

    
    
    if(!file_exists($path) && $_FILES["productimage"]["size"]<10000000 && in_array($imagefiletype,$extarr))
    {
    
        move_uploaded_file($_FILES["productimage"]["tmp_name"], $path);
    }


}

switch ($action) {
    case 'adduser':
        try {

            $sqlaction = "INSERT INTO `user` (`username`,`password`) VALUES ('$username','".hash('sha256',$password)."')";
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }
        break;
    case 'wishlistadd':
        try {

            $sqlaction = "INSERT INTO `wishlist` (`productId`,`userId`,`orderdatetime`) VALUES ('$productid','$userid','$orderdatetime')";
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }

        break;
    case 'wishlistdelete':

        $sqlaction = "DELETE FROM `wishlist` WHERE `idwish`=$wishlistid AND `productId`=$productid AND `userId`=$userid";

        break;
    case 'basketadd':
        try {

            $sqlaction = "INSERT INTO `basket` (`productId`,`userId`,`orderdatetime`) VALUES ('$productid','$userid','$orderdatetime')";
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }

        break;
    case 'basketdelete':
        try {

            $sqlaction = "DELETE FROM `basket` WHERE `idbasket`=$basketid AND `productId`=$productid AND `userId`=$userid";
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }

        break;
    case 'productadd':
        try {

            if ($productimage != '') {

                $sqlaction = "INSERT INTO `product` (`producttypeId`,`menuId`,`newcollection`,`price`,`oldprice`,`currency`,`designerchoose`,`detail`,`title`,`measurement`,`image`) VALUES ('$producttypeId ','$menuId','$newcollection','$price','$oldprice','$currency','$designerchoose','$detail','$title','$measurement','$productimage')";
            } else {
                $sqlaction = "INSERT INTO `product` (`producttypeId`,`menuId`,`newcollection`,`price`,`oldprice`,`currency`,`designerchoose`,`detail`,`title`,`measurement`,`image`) VALUES ('$producttypeId ','$menuId','$newcollection','$price','$oldprice','$currency','$designerchoose','$detail','$title','$measurement','images/products/defaultimage.png')";
            }
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }

        break;
    case 'productedit':
        try {

                $sqlaction = "UPDATE `product` SET `producttypeId`='$producttypeId',`menuId`='$menuId',`newcollection`='$newcollection',`price`='$price',`oldprice`='$oldprice',`currency`='$currency',`designerchoose`='$designerchoose',`detail`='$detail',`title`='$title',`measurement`='$measurement',`image`='$productimage' WHERE `idproduct`=$productid";
    
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }

        break;
    case 'productdelete':
        try {

            $sqlaction = "DELETE FROM `product` WHERE `idproduct`=$productid";
        } catch (mysqli_sql_exception $e) {
            echo (var_dump($e));
        }

        break;
}

if ($sqlaction != '') {
    mysqli_query($conn, $sqlaction);
}


function getrequest()
{

    foreach ($_REQUEST as $key => $value) {

        $GLOBALS[$key] = $value;
    }
}

function getMainPage($lang, $conn)
{
    if (is_numeric($lang)) {
        $sql = "SELECT *FROM `menu` WHERE `languageId`=$lang ORDER BY `ordermenu` LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                return $row['id'];
            }
        }
    }
}



function getHeader1($page, $lang, $conn)
{

    
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



    if (getcontenttypeid($conn, $page) == "as Home page") {

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $menuid = "";

                $sqlmenu = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `status`=1 AND `ordermenu`=2  ORDER BY`ordermenu`";

                $resultmenu = mysqli_query($conn, $sqlmenu);

                if (mysqli_num_rows($resultmenu) > 0) {

                    while ($rowmenu = mysqli_fetch_assoc($resultmenu)) {

                        $menuid = $rowmenu["id"];
                    }
                }

                echo ('<div class="left">
              <span class="">' . $row["text1"] . '</span>
              <h1 class="">' . $row["text2"] . '</h1>
              <p>' . $row["text3"] . '</p>
              <a href="?page=' . $menuid . '" class="hero-btn">' . $row["textbtn1"] . '</a>
            </div>

            <div class="right">
              <img class="img1" src="' . $row["image1"] . '" alt="">
            </div>'

                );
            }
        } else {
            echo ("<h2> Error 404</h2>
            <p> Page not found....</p>");
        }
    }

    if (getcontenttypeid($conn, $page) == "as About page") {

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo ('<div class="left">
                <h1 class="">' . $row["title"] . '</h1>
              <p class="">' . $row["text1"] . '</p>

            </div>
            
            <br> 
            <div class="right">
              <img class="img1" src="' . $row["image1"] . '" alt="">
            </div>'

                );
            }
        } else {
            echo ("<h2> Error 404</h2>
            <p> Page not found....</p>");
        }
    }

    if (getcontenttypeid($conn, $page) == "as Contact page") {

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo ('<div class="left">
                <h1 class="">' . $row["title"] . '</h1>
              <p class="">' . $row["text1"] . '</p>
              <p class="">' . $row["text2"] . '</p>
              <p class="">' . $row["text3"] . '</p>

            </div>
            
            <br> 
            <div class="right">
              <img class="img1" src="' . $row["image2"] . '" alt="">
            </div>'

                );
            }
        } else {
            echo ("<h2> Error 404</h2>
            <p> Page not found....</p>");
        }
    }


    if (getcontenttypeid($conn, $page) == "as Log in page") {


        $GLOBALS["action"] = "adduser";
        $user = "";
        $psw = "";

        if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {


                echo ('<script> removeclasses("hero","center","glide_1")  </script>');


                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

                    if (isset($_REQUEST['submitlogin'])) {

                        $u = $GLOBALS['username'];
                        $p = $GLOBALS['password'];
                        $i = $GLOBALS['userid'];

                        $GLOBALS["action"] = "adduser";

                        $GLOBALS["userid"] = "";
                        $GLOBALS["username"] = "";
                        $GLOBALS["password"] = "";


                        $sql2 = "SELECT * FROM `user` WHERE `username`='$u' AND `password`='$p'";
                        $result2 = mysqli_query($conn, $sql2);

                        $count = mysqli_num_rows($result2);

                        if ($rowuser = mysqli_fetch_assoc($result2)) {



                            if (mysqli_num_rows($result2) > 0) {
                                $GLOBALS["action"] = "";
                                $GLOBALS["userid"] = $rowuser["id"];
                                $GLOBALS["username"] = $rowuser["username"];
                                $GLOBALS["password"] = $rowuser["password"];

                                echo ($GLOBALS["action"]);
                            }
                        }
                    }
                }

                if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
                    echo ('    <div class="container">
                <div class="login-form">
                  <form id="loginform" name="loginform" action="" method="POST" enctype="multipart/form-data">
                    <h1>' . $row["title"] . '</h1>
                    <p>
                    ' . $row["text1"] . '
                      <a href="">' . $row["text7"] . '</a>
                    </p>

                    <input type="hidden" name="action" value="' . htmlspecialchars($GLOBALS["action"]) . '" />
                    
                    <input type="hidden" id="userid" name="userid" value="' . htmlspecialchars($GLOBALS["userid"]) . '">

                    <label for="email">' . $row["text2"] . '</label>
                    <input type="text" placeholder="Enter username" id="username" name="username" required value="' . htmlspecialchars($GLOBALS["username"]) . '"/>
          
                    <label for="psw">' . $row["text3"] . '</label>
                    <input
                      type="password"
                      placeholder="Enter password"
                      name="password"
                      id="password"
                      value="' . htmlspecialchars($GLOBALS["password"]) . '"
                      required
                    />
          

          
                    <div class="buttons">
                      <button  type="submit" id="submitlogin" name="submitlogin" class="signupbtn" >' . $row["textbtn1"] . '</button>
                    
                 

                      </div>
                  </form>
                </div>
              </div>'

                    );

                    echo ('<script> stopautosubmitafterreloadpage()  </script>');
                } else {
                    echo ('<script> window.location.replace("index.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("index.php");  </script>');
        }
    }

    $idprod = "";
    $prodtitle = "";

    if (getcontenttypeid($conn, $page) == "as Shop page") {




        if (mysqli_num_rows($result) > 0) {


            while ($row = mysqli_fetch_assoc($result)) {

                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

                    $sortingtypes = array($row["text7"], $row["text2"], $row["text3"], $row["text4"], $row["text5"], $row["text6"]);

                    $stype = "";

                    $option = "";

                    $c = "";
                    $c = count($sortingtypes);


                    echo ('<script> removeclasses("hero","center","glide_1")  </script>');

                    echo ('
                    <section class="section all-products" id="products">
                    <div class="top container">
                        <h1>' . $row["text1"] . '</h1>
                        <br>

                        <form  action="" method="POST" id="searchform">
                        <input type="text" id="searchtext" name="searchtext">
                        <input id="serchbtn" type="submit" value="Search" /> 
                        </form>


                        <form  action="" method="POST" id="sortingform">
                            <select name="sorting" id="sorting" onchange="selected()">');

                    foreach ($sortingtypes as $value) {

                        $c = $c - 1;
                        $stype = $value;

                        if (isset($_POST['sorting']) && $_POST['sorting'] == $stype) {
                            echo ('<option id="' . $c . '" selected>' . $stype . '</option>');
                        } else {
                            echo ('<option id="' . $c . '" >' . $stype . '</option>');
                        }
                    }
                    echo ('
                            </select>
                            <span><i class="bx bx-chevron-down"></i></span>

                   

                        </form>
                    </div>
                    </section>');






                    if (isset($_POST['sorting'])) {

                        if ($_POST['sorting'] == $row["text2"]) {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        WHERE menu.languageId=$lang AND menu.id=$page AND newcollection=1";
                        }
                        if ($_POST['sorting'] == $row["text3"]) {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        WHERE menu.languageId=$lang AND menu.id=$page ORDER BY price";
                        }
                        if ($_POST['sorting'] == $row["text4"]) {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        INNER JOIN `producttype` ON producttype.id = producttypeId
                        WHERE menu.languageId=$lang AND menu.id=$page AND 
                        producttypeId = 1 ";
                        }
                        if ($_POST['sorting'] == $row["text5"]) {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        INNER JOIN `producttype` ON producttype.id = producttypeId
                        WHERE menu.languageId=$lang AND menu.id=$page AND 
                        producttypeId = 2 ";
                        }
                        if ($_POST['sorting'] == $row["text6"]) {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        INNER JOIN `producttype` ON producttype.id = producttypeId
                        WHERE menu.languageId=$lang AND menu.id=$page AND 
                        producttypeId = 3 ";
                        }
                        if ($_POST['sorting'] == $row["text7"]) {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        WHERE menu.languageId=$lang AND menu.id=$page";
                        }
                    } elseif (!isset($_POST['sorting'])) {

                        if (isset($_POST['searchtext'])) {

                            $filtervalue = $_POST['searchtext'];
                            $sql2 = "SELECT * FROM `product` 
                            INNER JOIN `menu` ON menu.id = menuId
                            WHERE menu.languageId=$lang AND menu.id=$page AND title LIKE '%$filtervalue%'";
                        } else {

                            $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        WHERE menu.languageId=$lang AND menu.id=$page";
                        }
                    }




                    $result2 = mysqli_query($conn, $sql2);

                    $count = mysqli_num_rows($result2);

                    if (mysqli_num_rows($result2) > 0) {
                        while ($rowproduct = mysqli_fetch_assoc($result2)) {

                            $idprod = $rowproduct['idproduct'];
                            $prodtitle = $rowproduct['title'];
                            $prodid = $rowproduct['idproduct'];


                            $producttypeId = $rowproduct['producttypeId'];

                            $rowproductId = $rowproduct['id'];

                            $sql3 = "SELECT * FROM `producttype` WHERE `id`='$producttypeId'";
                            $result3 = mysqli_query($conn, $sql3);


                            while ($rowproducttype = mysqli_fetch_assoc($result3)) {
                                $percent = (number_format((float)100 - ($rowproduct["price"] * 100 / $rowproduct["oldprice"]), 2, '.', ''));

                                if ($percent > 0) {
                                    $discountcolor = "discount";
                                    $discountarrow = "↓";
                                }
                                if ($percent <= 0) {
                                    $discountcolor = "negdiscount";
                                    $discountarrow = "↑";
                                }
                                if ($percent == 0) {
                                    $discountcolor = "nediscount";
                                    $discountarrow = "";
                                }


                                $sqlq = 'SELECT *FROM `user` WHERE id=' . $_SESSION['userid'] . '';
                                $uid = "";
                                $status = 1;

                                $resultses = mysqli_query($conn, $sqlq);
                                if ($rows = mysqli_fetch_assoc($resultses)) {
                                    if (mysqli_num_rows($resultses) > 0) {
                                        $uid = $rows["id"];
                                    }
                                }






                                echo ('<script> tagdinamycwidth()  </script>');
                                $r = $rowproduct['idproduct'];
                                echo ('
                            
                            
                                    <div class="product-center cards">
                                
                                    <div class="product-item ">
                                    <div class="overlay">
                                    <a href="" class="product-thumb">
                                    <img id="cardimage" src="' . $rowproduct['image'] . '" alt="" />
                                    </a>
                                    <span class=' . $discountcolor . '>' . $discountarrow . ' ' . $percent . ' % </span>
                                    </div>
                                    <div class="product-info">
                                    <span>' . $rowproducttype["producttypename"] . '</span>
                                    <a href="">' . $rowproduct['title'] . '</a>
                                                <h4>' . $rowproduct['price'] . ' ' . $rowproduct["currency"] . '</h4>
                                                </div>
                                                <ul class="icons">');


                                $sqlwish = 'SELECT * FROM `wishlist`
                                INNER JOIN `product` ON product.idproduct=productId
                                WHERE userId=' . $uid . ' AND productId=' . $rowproduct['idproduct'] . '';

                                $resultwish = mysqli_query($conn, $sqlwish);
                                $wishlistaction = "wishlistadd";
                                $stylewish = "";
                                $wishliststatus = 1;

                                $wishId = "";

                                while ($rowwish = mysqli_fetch_assoc($resultwish)) {
                                    if (mysqli_num_rows($resultses) > 0) {



                                        $wishId = $rowwish["idwish"];

                                        $wishlistaction = "wishlistdelete";

                                        $stylewish = "color: red;";
                                    }
                                }


                                echo ('
                                               
                                               <li>

                                               <i style="' . $stylewish . '" class="bx bx-heart" >

                                               <form id="wishlistform" name="wishlistform" action="" method="POST" enctype="multipart/form-data">
                                               <input type="hidden" name="action" value="' . $wishlistaction . '" />  
                                               <input type="hidden" id="productid" name="productid" value="' . $rowproduct['idproduct'] . '">
                                               <input type="hidden" id="wishlistid" name="wishlistid" value="' . $wishId . '" >
                                               <input type="hidden" id="userid" name="userid" value="' . $uid . '">
                                               <input type="hidden" id="orderdatetime" name="orderdatetime" value="' . htmlspecialchars((new \DateTime())->format('Y-m-d H:i:s')) . '">
                                               
                                               <input type="submit"  value="' . $row["text8"] . '" style="border-color: transparent; 
                                               cursor: pointer; background-color: transparent; value="a"">
                                               
                                               </form>

                                               </i>

                                               </li>');


                                echo ('<script> stopautosubmitafterreloadpage()  </script>');



                                echo ('
                                               
                                   <li>

                                   <i class="bx bx-cart" >

                                   <form id="basketform" name="basketform" action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="basketadd" />  
                                        <input type="hidden" id="productid" name="productid" value="' . $rowproduct['idproduct'] . '">
                                        <input type="hidden" id="basketid" name="basketid" >
                                        <input type="hidden" id="userid" name="userid" value="' . $uid . '">
                                        <input type="hidden" id="orderdatetime" name="orderdatetime" value="' . htmlspecialchars((new \DateTime())->format('Y-m-d H:i:s')) . '">
                                        <input type="submit"  value="' . $row["text9"] . '" style="border-color: transparent; cursor: pointer; background-color: transparent; value="a"">
                                   </form>

                                   </i>

                                   </li>');



                                echo ('<script> stopautosubmitafterreloadpage()  </script>');



                                $sqlmenu = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `ordermenu`=9";

                                $resultmenu = mysqli_query($conn, $sqlmenu);

                                if (mysqli_num_rows($resultmenu) > 0) {

                                    while ($rowmenu = mysqli_fetch_assoc($resultmenu)) {

                                        echo (' <li>
                                                    <i class="bx bx-search">
                                                        <a href="?page=' . $rowmenu["id"] . '&idproduct=' . $rowproduct['idproduct'] . '&userid=' . $uid . '" style="border-color: transparent; cursor: pointer; background-color: transparent; font-size:17px">' . $row["text10"] . ' </a>
                                                    </i>
                                                </li>');
                                        echo ('</ul> </div> </div> ');
                                    }
                                }
                            }
                        }
                    }
                } else {
                    echo ('<script> window.location.replace("index.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("index.php");  </script>');
   
        }
    }

    if (getcontenttypeid($conn, $page) == "as Detail page") {


        if (mysqli_num_rows($result) > 0) {



            while ($row = mysqli_fetch_assoc($result)) {

                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

                    echo ('<script> removeclasses("hero","center","glide_1")  </script>');


                    // echo($_GET["idproduct"]);


                    $sqlproduct = 'SELECT * FROM `product`          
                    WHERE idproduct=' . $_REQUEST["idproduct"] . '';



                    $resultproduct = mysqli_query($conn, $sqlproduct);

                    $count = mysqli_num_rows($resultproduct);

                    if (mysqli_num_rows($resultproduct) > 0) {
                        while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {


                            echo ('    <!-- Product Details -->
                            <section class="section product-detail">
                              <div class="details container">
                                <div class="left image-container">
                                  <div class="main">
                                    <img src="' . $rowproduct["image"] . '" id="zoom" alt="" />
                                  </div>
                                </div>
                                <div class="right">
                                  <h1>' . $rowproduct["title"] . '</h1>
                                  <div class="price">' . $rowproduct["price"] . ' ' . $rowproduct["currency"] . '</div>

                                  <p>' . $row["text1"] . ': ' . $rowproduct["measurement"] . '</p>
                                  <br>


                                  <form class="form" id="basketform" name="basketform" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="action" value="basketadd" />  
                                    <input type="hidden" id="productid" name="productid" value="' . $rowproduct['idproduct'] . '">
                                    <input type="hidden" id="basketid" name="basketid" >
                                    <input type="hidden" id="userid" name="userid" value="' . $_REQUEST["userid"] . '">
                                    <input type="hidden" id="orderdatetime" name="orderdatetime" value="' . htmlspecialchars((new \DateTime())->format('Y-m-d H:i:s')) . '">
                                    <input type="submit"  value="' . $row["textbtn1"] . '" style="border-color: green; background-color: orange; color:white; width:25%; cursor: pointer;">
                                 
                                    </form>
                                    

                                    
                                    <br>
                                    <br>

                        

                                  <h3>' . $row["text2"] . '</h3>
                                  <p>
                                  ' . $rowproduct["detail"] . '
                                  </p>
                                </div>
                              </div>
                            </section>');

                            echo ('<script> stopautosubmitafterreloadpage()  </script>');
                        }
                    }
                } else {
                    echo ('<script> window.location.replace("index.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("index.php");  </script>');
            die();
        }
    }


    if (getcontenttypeid($conn, $page) == "as Wishlist page") {


        if (mysqli_num_rows($result) > 0) {



            while ($row = mysqli_fetch_assoc($result)) {

                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

                    echo ('<script> removeclasses("hero","center","glide_1")  </script>');

                    $sqlwish = 'SELECT * FROM `wishlist` 
                    INNER JOIN `product` ON product.idproduct = productId
                    INNER JOIN `user` ON user.id = userId
                    WHERE user.id=' . $_SESSION['userid'] . '';

                    $resultwish = mysqli_query($conn, $sqlwish);


                    if (mysqli_num_rows($resultwish) > 0) {

                        echo ('<div class="container cart">
                        <table>
                        <thead>
                          <tr>
                          <th>' . $row['text5'] . '</th>
                          <th>' . $row['text6'] . '</th>
                          </tr>
                          </thead>
                          <tbody>');

                        while ($rowwish = mysqli_fetch_assoc($resultwish)) {


                            $sqlproduct = 'SELECT * FROM `product`
                            WHERE Idproduct=' . $rowwish["productId"] . '';

                            $resultproduct = mysqli_query($conn, $sqlproduct);


                            if (mysqli_num_rows($resultproduct) > 0) {

                                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {

                                    echo ('        
                              
                              <tr>
                              <td>
                              <div class="cart-info">
                              <img src="' . $rowproduct['image'] . '" alt="" />
                              <div>
                                  <p>' . $row['text1'] . ': ' . $rowproduct['title'] . '</p>
                                  <span>' . $row['text2'] . ': ' . $rowproduct['price'] . ' ' . $rowproduct["currency"] . '</span> <br />
                                  <a>
                                  <form id="wishlistform" name="wishlistform" action="" method="POST" enctype="multipart/form-data">
                                  <input type="hidden" name="action" value="wishlistdelete" />  
                                  <input type="hidden" id="userid" name="userid" value="' . $rowwish['userId'] . '">
                                  <input type="hidden" id="productid" name="productid" value="' . $rowwish['productId'] . '">
                                  <input type="hidden" id="wishlistid" name="wishlistid" value="' . $rowwish['idwish'] . '" >

                                  <input type="submit"  value="' . $row['textbtn1'] . '" style="width: 100px; color: white; border-color: transparent; 
                                  cursor: pointer; background-color: red; value="a"">
                                  
                                  </form>
                                  </a>
                                </div>
                              </div>
                            </td>
                            <td>
                            <div>

                            <form class="form" id="basketform" name="basketform" action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="basketadd" />  
                            <input type="hidden" id="productid" name="productid" value="' . $rowproduct['idproduct'] . '">
                            <input type="hidden" id="basketid" name="basketid" >
                            <input type="hidden" id="userid" name="userid" value="' . $rowwish['userId'] . '">
                            <input type="hidden" id="orderdatetime" name="orderdatetime" value="' . htmlspecialchars((new \DateTime())->format('Y-m-d H:i:s')) . '">
                            <input type="submit" value="' . $row['textbtn2'] . '" style="border-color: orange; background-color: green; color:white; width:100%; cursor: pointer;" >
                            </form>
                            </div>
                            </td>
                          </tr>');


                                    echo ('<script> stopautosubmitafterreloadpage()  </script>');
                                }
                            }
                        }

                        echo ('
                        </tbody>
                      </table>');
                    }
                } else {
                    echo ('<script> window.location.replace("index.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("index.php");  </script>');
            die();
        }
    }

    if (getcontenttypeid($conn, $page) == "as Basket page") {


        if (mysqli_num_rows($result) > 0) {



            while ($row = mysqli_fetch_assoc($result)) {

                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

                    echo ('<script> removeclasses("hero","center","glide_1")  </script>');

                    $sqlbasket = 'SELECT * FROM `basket` 
                    INNER JOIN `product` ON product.idproduct = productId
                    INNER JOIN `user` ON user.id = userId
                    WHERE user.id=' . $_SESSION['userid'] . '';

                    $resultbasket = mysqli_query($conn, $sqlbasket);


                    if (mysqli_num_rows($resultbasket) > 0) {

                        echo ('<div class="container cart">
                        <table>
                        <thead>
                          <tr>
                          <th>' . $row['text5'] . '</th>
                          <th>' . $row['text6'] . '</th>
                          </tr>
                          </thead>
                          <tbody>');

                        while ($rowbasket = mysqli_fetch_assoc($resultbasket)) {

                            $t = date("H:i:s", time());

                            echo ('    <span id="time"> </span> <br />');


                            echo ("<script> 
                            startTime ();
                           </script>");

                            $sqlproduct = 'SELECT * FROM `product`
                            WHERE Idproduct=' . $rowbasket["productId"] . '';

                            $resultproduct = mysqli_query($conn, $sqlproduct);

                            $displaybtn = "none";

                            if (mysqli_num_rows($resultproduct) > 0) {

                                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {






                                    echo ('        
                              
                              <tr>
                              <td>
                              <div class="cart-info">
                              <img src="' . $rowproduct['image'] . '" alt="" />
                              <div>
                                  <p>' . $row['text1'] . ': ' . $rowproduct['title'] . '</p>
                                  <span>' . $row['text2'] . ': ' . $rowproduct['price'] . ' ' . $rowproduct["currency"] . '</span> <br />
                                  <span>' . $rowbasket['orderdatetime'] . ' </span> <br />
                              

                      
                                  
                                  </div>
                                  </div>
                                  </td>
                                  <td>');

                                    if (date("H", strtotime($rowbasket['orderdatetime'])) > date("H", time())) {



                                        echo ('
                                        
                                        <div id="refusetoorder" style="display:block">
      
                                        ');
                                    }
                                    if (date("H", strtotime($rowbasket['orderdatetime'])) < date("H", time())) {

                                        echo ('
                                        
                                        <div id="refusetoorder" style="display:none">
      
                                        ');
                                    }


                                    echo ('
                                  
                                  <form class="form" id="basketform" name="basketform" action="" method="POST" enctype="multipart/form-data">
                                  <input type="hidden" name="action" value="basketdelete" />  
                                  <input type="hidden" id="productid" name="productid" value="' . $rowproduct['idproduct'] . '">
                                  <input type="hidden" id="basketid" name="basketid" value="' . $rowbasket['idbasket'] . '" >
                                  <input type="hidden" id="userid" name="userid" value="' . $rowbasket['userId'] . '">
                                  <input type="hidden" id="orderdatetime" name="orderdatetime" value="' . htmlspecialchars((new \DateTime())->format('Y-m-d H:i:s')) . '">
                                  <input type="submit" value="' . $row['textbtn1'] . '" style="border-color: orange; background-color: green; color:white; width:100%; cursor: pointer;" >
                                  </form>
                                  
                                  </div>
                                  
                                  

                                  </td>
                                </div>
                     
                            </td>
                            </tr>');


                                    echo ('<script> stopautosubmitafterreloadpage()  </script>');
                                }
                            }
                        }

                        echo ('
                        </tbody>
                      </table>');
                    }
                } else {
                    echo ('<script> window.location.replace("index.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("index.php");  </script>');
            die();
        }
    }
}


function getHeader2($page, $lang, $conn)
{
    if (getcontenttypeid($conn, $page) == "as Home page") {
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

        $menuid = "";

        $sqlmenu = "SELECT * FROM `menu` WHERE `languageId`=$lang AND `status`=1 AND `ordermenu`=2  ORDER BY`ordermenu`";

        $resultmenu = mysqli_query($conn, $sqlmenu);

        if (mysqli_num_rows($resultmenu) > 0) {

            while ($rowmenu = mysqli_fetch_assoc($resultmenu)) {

                $menuid = $rowmenu["id"];
            }
        }


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                echo ('<div class="left">
              <span class="">' . $row["text1"] . '</span>
              <h1 class="">' . $row["text2"] . '</h1>
              <p>' . $row["text3"] . '</p>
              <a href="?page=' . $menuid . '" class="hero-btn">' . $row["textbtn1"] . '</a>
            </div>

            <div class="right">
              <img class="img2" src="' . $row["image2"] . '" alt="">
            </div>'

                );
            }
        } else {
            echo ("<h2> Error 404</h2>
    <p> Page not found....</p>");
        }
    }
}




function getcontenttypeid($conn, $page)
{


    $sql = "SELECT * FROM `content` WHERE `menuId`=$page";


    $result = mysqli_query($conn, $sql);

    if (is_numeric($page)) {


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

                $contenttypeId = $row['contenttypeId'];

                $sql2 = "SELECT * FROM `contenttype` WHERE `id`=$contenttypeId";
                $result2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($result2) > 0) {

                    if ($row2 = mysqli_fetch_assoc($result2)) {

                        if ($row['contenttypeId'] == $row2['id']) {

                            return $row2['contenttypename'];
                        }
                    }
                }
            }
        }
    }
    else{


    }


}


function getAdminMainPage($lang, $conn)
{


        if (isset($lang)) {

            $sql = "SELECT *FROM `menu` WHERE `languageId`=$lang AND `ordermenu`=10";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {

                    return $row['id'];
                }
            }
        } 


}

function getAdminContent($page, $lang, $conn)
{
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


    if (getcontenttypeid($conn, $page) == "as Dashboard page") {


        if (mysqli_num_rows($result) > 0) {



            while ($row = mysqli_fetch_assoc($result)) {

                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {


                    $sqluser = 'SELECT Count(*) as totaluser FROM `user` 
                    WHERE user.id!=' . $_SESSION['userid'] . '';

                    $countalluser = '';

                    $resultuser = mysqli_query($conn, $sqluser);

                    if (mysqli_num_rows($resultuser) > 0) {
                        while ($rowuser = mysqli_fetch_assoc($resultuser)) {
                            $countalluser = $rowuser['totaluser'];
                        }
                    }




                    $sqlbasket = 'SELECT Count(*) as totalsales FROM `basket` 
                    WHERE userId!=' . $_SESSION['userid'] . '';

                    $countallbasket = '';

                    $resultbasket = mysqli_query($conn, $sqlbasket);

                    if (mysqli_num_rows($resultbasket) > 0) {
                        while ($rowbasket = mysqli_fetch_assoc($resultbasket)) {
                            $countallbasket = $rowbasket['totalsales'];
                        }
                    }




                    $sqlwish = 'SELECT Count(*) as totalwish FROM `wishlist` 
                    WHERE userId!=' . $_SESSION['userid'] . '';

                    $countallwish = '';

                    $resultwish = mysqli_query($conn, $sqlwish);

                    if (mysqli_num_rows($resultwish) > 0) {
                        while ($rowwish = mysqli_fetch_assoc($resultwish)) {
                            $countallwish = $rowwish['totalwish'];
                        }
                    }





                    $sqlproductprice1 = "SELECT Sum(price) as totalprice1 FROM `product` 
                    INNER JOIN `basket` ON basket.productId=idproduct
                    WHERE currency='CAD'";

                    $countallproductprice1 = '';

                    $resultproductprice1 = mysqli_query($conn, $sqlproductprice1);

                    if (mysqli_num_rows($resultproductprice1) > 0) {
                        while ($rowproduct1 = mysqli_fetch_assoc($resultproductprice1)) {
                            $countallproductprice1 = $rowproduct1['totalprice1'];
                            
                    
                        }
                    }




                    $sqlproductprice2 = "SELECT Sum(price) as totalprice2 FROM `product` 
                    INNER JOIN `basket` ON basket.productId=idproduct
                    WHERE currency='AZN'";

                    $countallproductprice2 = '';

                    $resultproductprice2 = mysqli_query($conn, $sqlproductprice2);

                    if (mysqli_num_rows($resultproductprice2) > 0) {
                        while ($rowproduct2 = mysqli_fetch_assoc($resultproductprice2)) {
                            $countallproductprice2 = $rowproduct2['totalprice2'];

       
                        }
                    }

                    $sum = "";
                    $cur = "";

                    //USD
                    if ($lang == 7) {
                        $sum = $countallproductprice1+($countallproductprice2/1.24283);
                        $cur = $row["text5"];
                    }

                    //AZN
                    if ($lang == 1) {
                        $sum =  $countallproductprice2+($countallproductprice1/0.804525);
                        $cur = $row["text5"];
                    }



                    echo ('<div class="cardBox">

                                <div class="card">
                                    <div>
                                      <div class="numbers">' .  $countalluser . '</div>
                                      <div class="cardName">' . $row["text1"] . '</div>
                                    </div>
  
                                    <div class="iconBx">
                                       <ion-icon name="people-outline"></ion-icon>
                                    </div>
                                </div>

                                <div class="card">
                                    <div>
                                        <div class="numbers">' .  $countallbasket . '</div>
                                        <div class="cardName">' . $row["text2"] . '</div>
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </div>
                                </div>

                                <div class="card">
                                    <div>
                                        <div class="numbers">' .  $countallwish . '</div>
                                        <div class="cardName">' . $row["text3"] . '</div>
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </div>
                                </div>

                                <div class="card">
                                    <div>
                                        <div class="numbers">' . number_format((float)$sum, 2, '.', '') . '<span> ' . $cur . '</span></div>
                                        <div class="cardName">' . $row["text4"] . '</div>
                                        
                                    </div>

                                    <div class="iconBx">
                                        <ion-icon name="cash-outline"></ion-icon>
                                    </div>
                                </div>

                            </div>');


                    $sortingtypes = array($row["text10"], $row["text11"], $row["text12"], $row["text13"]);

                    $stype = "";

                    $option = "";

                    $c = "";
                    $c = count($sortingtypes);



                    echo ('<div class="details">
                    <div class="recentOrders" >
                        <div class="cardHeader">
                            <h2>' . $row['text6'] . '</h2>
                            <form action="" method="POST" id="sortingform">
                            <select name="sorting" id="sorting" onchange="selected()">');

                    foreach ($sortingtypes as $value) {

                        $c = $c - 1;
                        $stype = $value;

                        if (isset($_POST['sorting']) && $_POST['sorting'] == $stype) {
                            echo ('<option id="' . $c . '" selected>' . $stype . '</option>');
                        } else {
                            echo ('<option id="' . $c . '" >' . $stype . '</option>');
                        }
                    }

                    if (isset($_POST['sorting'])) {
                        if ($_POST['sorting'] == $row["text11"] || $_POST['sorting'] == $row["text12"]) {

                            $texttitle= $row['text16'];
                        }
                        else
                        {
                            $texttitle="";
                        }
                    }

                    echo ('</select>
                            <span><i class="bx bx-chevron-down"></i></span>
                           </form>
                        </div>
                        <table>
                        <thead>
                            <tr>
                                <td>' . $row['text7'] . '</td>
                                <td>' . $row['text8'] . '</td>
                                <td>' . $row['text9'] . '</td>
                                <td>' .  $texttitle . '</td>
                            </tr>
                        </thead>

                        <tbody>');




                    if (isset($_POST['sorting'])) {

                        if ($_POST['sorting'] == $row["text10"]) {

                            
                            $sql2 = "SELECT * FROM `product` 
                            INNER JOIN `menu` ON menu.id = menuId
                            INNER JOIN `producttype` ON producttype.id = producttypeId
                            WHERE menu.id!=1 AND menu.id!=3";
  
                            $resultproduct = mysqli_query($conn, $sql2);



                            if (mysqli_num_rows($resultproduct) > 0) {

                                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {
                                    echo ('

                            <tr>
                            <td><img style="width:50px" src="' . $rowproduct['image'] . '" alt="" /></td>
                            <td>' . $rowproduct['title'] . '</td>
                            <td>' . $rowproduct['price'] . ' ' . $rowproduct['currency'] . '</td>
                            </tr>
                            </div>
                            </div>');
                                }
                            }
                        
                        }


                        if ($_POST['sorting'] == $row["text11"]) {


                            $sqluser = 'SELECT * FROM `user`';

                            $resultuser = mysqli_query($conn, $sqluser);


                            if (mysqli_num_rows($resultuser) > 0) {

                                while ($rowuser = mysqli_fetch_assoc($resultuser)) {



                                    $sql2 = 'SELECT * FROM `basket` 
                            INNER JOIN `product` ON product.idproduct = productId
                            INNER JOIN `user` ON user.id = userId
                            WHERE user.id=' . $rowuser['id'] . '';


                                    $result2 = mysqli_query($conn, $sql2);


                                    if (mysqli_num_rows($result2) > 0) {

                                        while ($rowsort = mysqli_fetch_assoc($result2)) {



                                            $sqlproduct = 'SELECT * FROM `product`
                                    WHERE Idproduct=' . $rowsort["productId"] . '';

                                            $resultproduct = mysqli_query($conn, $sqlproduct);


                                            if (mysqli_num_rows($resultproduct) > 0) {

                                                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {



                                                    echo ('

                                            <tr>
                                            <td><img style="width:50px" src="' . $rowproduct['image'] . '" alt="" /></td>
                                            <td>' . $rowproduct['title'] . '</td>
                                            <td>' . $rowproduct['price'] . ' ' . $rowproduct['currency'] . '</td>
                                            <td>' . $rowuser['username'] . '</td>
                                            </tr>
                                            </div>
                                            </div>');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }

                 

                        if ($_POST['sorting'] == $row["text12"]) {

                            
                            $sqluser = 'SELECT * FROM `user`';

                            $resultuser = mysqli_query($conn, $sqluser);


                            if (mysqli_num_rows($resultuser) > 0) {

                                while ($rowuser = mysqli_fetch_assoc($resultuser)) {



                                    $sql2 = 'SELECT * FROM `wishlist` 
                                    INNER JOIN `product` ON product.idproduct = productId
                                    INNER JOIN `user` ON user.id = userId
                                    WHERE user.id=' . $rowuser['id'] . '';


                                    $result2 = mysqli_query($conn, $sql2);


                                    if (mysqli_num_rows($result2) > 0) {

                                        while ($rowsort = mysqli_fetch_assoc($result2)) {



                                            $sqlproduct = 'SELECT * FROM `product`
                                            WHERE Idproduct=' . $rowsort["productId"] . '';

                                            $resultproduct = mysqli_query($conn, $sqlproduct);


                                            if (mysqli_num_rows($resultproduct) > 0) {

                                                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {



                                                    echo ('

                                            <tr>
                                            <td><img style="width:50px" src="' . $rowproduct['image'] . '" alt="" /></td>
                                            <td>' . $rowproduct['title'] . '</td>
                                            <td>' . $rowproduct['price'] . ' ' . $rowproduct['currency'] . '</td>
                                            <td>' . $rowuser['username'] . '</td>
                                            </tr>
                                            </div>
                                            </div>');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if ($_POST['sorting'] == $row["text13"]) {

                            
                            $sql2 = "SELECT * FROM `product` 
                            INNER JOIN `menu` ON menu.id = menuId
                            INNER JOIN `producttype` ON producttype.id = producttypeId
                            WHERE menu.id!=1 AND menu.id!=3 AND 
                            newcollection = 1";
  
                            $resultproduct = mysqli_query($conn, $sql2);



                            if (mysqli_num_rows($resultproduct) > 0) {

                                while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {
                                    echo ('

                            <tr>
                            <td><img style="width:50px" src="' . $rowproduct['image'] . '" alt="" /></td>
                            <td>' . $rowproduct['title'] . '</td>
                            <td>' . $rowproduct['price'] . ' ' . $rowproduct['currency'] . '</td>
                            </tr>
                            </div>
                            </div>');
                                }
                            }
                        
                        }

                        echo ('</tbody>
                        </table>');
                    } elseif (!isset($_POST['sorting'])) {

                        $sql2 = "SELECT * FROM `product` 
                        INNER JOIN `menu` ON menu.id = menuId
                        INNER JOIN `producttype` ON producttype.id = producttypeId
                        WHERE menu.id!=1 AND menu.id!=3";

                        $resultproduct = mysqli_query($conn, $sql2);



                        if (mysqli_num_rows($resultproduct) > 0) {

                            while ($rowproduct = mysqli_fetch_assoc($resultproduct)
                            ) {
                                echo ('

                                <tr>
                                <td><img style="width:50px" src="' . $rowproduct['image'] . '" alt="" /></td>
                                <td>' . $rowproduct['title'] . '</td>
                                <td>' . $rowproduct['price'] . ' ' . $rowproduct['currency'] . '</td>
                                </tr>
                                </div>
                                </div>');
                            }
                        }
                    }


                    echo ('</tbody>
                    </table>
                    </div> </div>');


                    $sqluser = 'SELECT * FROM `user` 
                    WHERE user.id!=' . $_SESSION['userid'] . '';

                    echo('<div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>'.$row['text16'].'</h2>
                            
                        </div>
    
                        <table id="userlist">
                            <thead>
                                <tr>
                                    <td>'.$row['text14'].'</td>
                                    <td>'.$row['text15'].'</td>
                                    
                                </tr>
                            </thead>
    
                            <tbody>');

                            

                    $resultuser = mysqli_query($conn, $sqluser);

                    if (mysqli_num_rows($resultuser) > 0) {

                        while ($rowuser = mysqli_fetch_assoc($resultuser)) {

                            echo('                   <tr>
                            <td>'.$rowuser['username'].'</td>
                            <td>'.$rowuser['password'].'</td>
                        </tr>');

                        }
                    }


                    echo('</tbody>
                    </table>
                    </div> </div>');






                    echo ('<script> stopautosubmitafterreloadpage()  </script>');
                } else {
                    echo ('<script> window.location.replace("admin.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("admin.php");  </script>');
            die();
        }
    }


    if (getcontenttypeid($conn, $page) == "as Product CRUD page") {


        if (mysqli_num_rows($result) > 0) {


            
            while ($row = mysqli_fetch_assoc($result)) {

                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

                    $sqlproduct = "SELECT * FROM `product` 
                    INNER JOIN `menu` ON menu.id = menuId
                    INNER JOIN `producttype` ON producttype.id = producttypeId
                    WHERE menu.id!=1 AND menu.id!=3 ORDER BY idproduct";

                    $resultproduct = mysqli_query($conn, $sqlproduct);

                    echo ('<button class="createbtn"  onclick="madd()">' . $row["textbtn1"] . '</button>');

                    echo('<div class="cardBox2">
                    
                    ');

                    if (mysqli_num_rows($resultproduct) > 0) {

                        while ($rowproduct = mysqli_fetch_assoc($resultproduct)) {



                            
                            echo('<div class="card2">
                            <form id="productcrud" name="productcrud" action="" method="POST" enctype="multipart/form-data">
                                <div>

                                    <br>
                                    
                                    <div class="cardName2">
                                        <input type="hidden" name="action" value="productedit">
                                    </div>

                                    <br>

                                    <div class="cardName2">
                                      <input type="hidden" name="productid" value="'.$rowproduct['idproduct'].'">
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text1"].':
                                    <br>
                                    <span style="color:red;">1) '.$row["text2"].' </span>
                                    <br>
                                    <span style="color:red;">2) '.$row["text3"].' </span>
                                    <br>
                                    <span style="color:red;">3) '.$row["text4"].' </span>
                                      <input type="number" class="numbers4" min="1" max="3" onkeypress="return isNumber(event)" name="producttypeId" value="'.$rowproduct['producttypeId'].'">
                                    </div>

                                    <br>
                                    
                                    <div class="cardName2">'.$row["text5"].':
                                    <br>
                                    <span style="color:red;">19) '.$row["text6"].' </span>
                                    <br>
                                    <span style="color:red;">20) '.$row["text7"].' </span>
                                    <br>
                                      <input type="number" class="numbers4" min="19" max="20" onkeypress="return isNumber(event)" name="menuId" value="'.$rowproduct['menuId'].'">
                                    </div>

                                    <br>

                                    <div class="cardName2" style="padding-right:50px">'.$row["text8"].':
                                        <textarea style="resize:none" class="numbers2" name="title">' . $rowproduct['title'] . '</textarea>
                                    </div>

                                    <br>
                                    
                                    <div class="cardName2">'.$row["text9"].':
                                        <textarea style="resize:none" class="numbers3" name="detail">' . $rowproduct['detail'] . '</textarea>
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text10"].':
                                       <textarea style="resize:none" class="numbers2" name="measurement">' . $rowproduct['measurement'] . '</textarea>
                                    </div>

                                    <br>

                                    
                                    <div class="cardName2">'.$row["text11"].':

                                       <input class="numbers4" type="number" step="0.0000001" name="price" onkeypress="return isNumber(event)" max="1000000000" value="'.$rowproduct['price'].'">
                           
                                    </div>

                                    <br>
                                    
                                    <div class="cardName2">'.$row["text12"].':

                                      <input class="numbers4" type="number" step="0.0000001" max="1000000000" onkeypress="return isNumber(event)" name="oldprice" value="'.$rowproduct['oldprice'].'">
                        
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text13"].':
                                       <input class="numbers4" name="currency" value=' . $rowproduct['currency'] . '>
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text14"].':

                                       <input class="numbers4" type="number" min="0" max="1" name="newcollection" onkeypress="return isNumber(event)" value="'.$rowproduct['newcollection'].'">
                                    
                                    </div>
                                    <br>

                                    <div class="cardName2">'.$row["text15"].':

                                    <input class="numbers4" type="number"  min="0" max="1" name="designerchoose" onkeypress="return isNumber(event)" value="'.$rowproduct['designerchoose'].'">
                                    
                                    </div>

                                    <br>
                                    

                                    <br>
                                </div>
            
                                <br>

                                <div >
                                    <img style="width:100px" src="' . $rowproduct['image'] . '" alt="" />
                                    <br>
                                    <br>
                                    
                                    <input  id="fileinput" class="numbers4" type="file" name="productimage"  accept="image/*"">
                                    
                                </div>

                                <br>

                                <div >
                                    <input class="ubtbtn" type="submit" name="updatesubmit" value="'.$row["textbtn2"].'">
                                    <br>
                                    <br>
                                    
         
                                     <a class="delbtn"  href="?action=productdelete&productid='.$rowproduct['idproduct'].'&producttypeId='.$rowproduct['producttypeId'].'&menuId='.$rowproduct['menuId'].'&deletesubmit=Delete">
                                     '.$row["textbtn3"].'   
                                 
                                    <script> stopautosubmitafterreloadpage()  </script>
                                    
                                     </a>
                                    
                                 </div>
                            </form>

                            </div>');

                            
                            
                        }
                    }
                    
                    echo('</div>');

                    echo ('<div id="modal" class="modal">

                    
                    <div class="modal-content">
                    
                    <span class="close" onclick="modalcolse()"> <ion-icon name="close-outline"></ion-icon> </span>
                    <br>
                    <br>
                      
                    <div class="card3">
                            <form id="productcrud" name="productcrud" action="" method="POST" enctype="multipart/form-data">
                                <div>

                                    <br>
                                    
                                    <div class="cardName2">
                                        <input type="hidden" name="action" value="productadd">
                                    </div>

                                    <br>

                                    <div class="cardName2">
                                      <input type="hidden" name="productid">
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text1"].':
                                    <br>
                                    <span style="color:red;">1) '.$row["text2"].' </span>
                                    <br>
                                    <span style="color:red;">2) '.$row["text3"].' </span>
                                    <br>
                                    <span style="color:red;">3) '.$row["text4"].' </span>
                                      <input type="number" class="numbers4" min="1" max="3" onkeypress="return isNumber(event)" name="producttypeId">
                                    </div>

                                    <br>
                                    
                                    <div class="cardName2">'.$row["text5"].':
                                    <br>
                                    <span style="color:red;">19) '.$row["text6"].' </span>
                                    <br>
                                    <span style="color:red;">20) '.$row["text7"].' </span>
                                    <br>
                                      <input type="number" class="numbers4" min="19" max="20" onkeypress="return isNumber(event)" name="menuId">
                                    </div>

                                    <br>

                                    <div class="cardName2" style="padding-right:50px">'.$row["text8"].':
                                        <textarea style="resize:none" class="numbers2" name="title"></textarea>
                                    </div>

                                    <br>
                                    
                                    <div class="cardName2">'.$row["text9"].':
                                        <textarea style="resize:none" class="numbers3" name="detail"></textarea>
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text10"].':
                                       <textarea style="resize:none" class="numbers2" name="measurement"></textarea>
                                    </div>

                                    <br>

                                    
                                    <div class="cardName2">'.$row["text11"].':

                                       <input class="numbers4" type="number" step="0.0000001" name="price" onkeypress="return isNumber(event)" max="1000000000" >
                           
                                    </div>

                                    <br>
                                    
                                    <div class="cardName2">'.$row["text12"].':

                                      <input class="numbers4" type="number" step="0.0000001" max="1000000000" onkeypress="return isNumber(event)" name="oldprice" >
                        
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text13"].':
                                       <input class="numbers4" name="currency">
                                    </div>

                                    <br>

                                    <div class="cardName2">'.$row["text14"].':

                                       <input class="numbers4" type="number" min="0" max="1" name="newcollection" onkeypress="return isNumber(event)">
                                    
                                    </div>
                                    <br>

                                    <div class="cardName2">'.$row["text15"].':

                                    <input class="numbers4" type="number"  min="0" max="1" name="designerchoose" onkeypress="return isNumber(event)" >
                                    
                                    </div>

                                    <br>
                                    

                                    <br>
                                </div>
            
                                <br>

                                <div >
                                    <img style="width:100px"  alt="" />
                                    <br>
                                    <br>
                                    
                                    <input  id="fileinput" class="numbers4" type="file" name="productimage"  accept="image/*"">
                                    
                                </div>

                                <br>

                                <div >
                                    <input class="createbtn" type="submit" name="createsubmit" value="'.$row["textbtn1"].'">
                                    <br>
                                    <br>
                                    
         
                                     
                                    
                                 </div>
                            </form>

                            </div>
                    </div>
                  
                  </div>');

                    echo ('<script> stopautosubmitafterreloadpage();  </script>');
                }
                else {
                    echo ('<script> window.location.replace("admin.php");  </script>');
                }
            }
        } else {
            echo ('<script> window.location.replace("admin.php");  </script>');
            die();
        }
    }
}
