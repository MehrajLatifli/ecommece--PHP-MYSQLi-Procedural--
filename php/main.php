  <!-- Categories Section -->

  

  <section id="section1" class="section category">
    <div class="cat-center">

      <?php

      $sql = "SELECT * FROM `content` WHERE `menuId`=$page";


      $result = mysqli_query($conn, $sql);

      if (getcontenttypeid($conn,$page) == "as Home page") {
        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {


            echo ('
            <div class="cat">
  
              <img src=' . $row["image3"] . ' alt="" />
  
              <div>
                <p>' . $row["text4"] . '</p>
              </div>
  
            </div>
  
            <div class="cat">
  
              <img src=' . $row["image4"] . ' alt="" />
  
              <div>
                <p>' . $row["text5"] . '</p>
              </div>
  
            </div>
  
            <div class="cat">
  
              <img src=' . $row["image5"] . ' alt="" />
  
              <div>
                <p>' . $row["text6"] . '</p>
              </div>
  
            </div>'



            );
          }
        } else {
          echo ("<h2> Error 404</h2>
                  <br>
                  <p> Page not found....</p>");
        }
      }
      else{

        echo(
          '
          <script>
          hide("section1")
          </script>
          '
        );
      }

      ?>
    </div>
  </section>



  <!-- New Arrivals -->
  <section id="section2" class="section new-arrival">
    <div class="title">
      <?php
      if (getcontenttypeid($conn,$page) == "as Home page") {
        $sql = "SELECT * FROM `content` WHERE `menuId`=$page";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
            echo ('<h1>' . $row["text7"] . '</h1>
           <p>' . $row["text8"] . '</p>');
          }
        } else {
          echo ("<h2> Error 404</h2>
            <br>
            <p> Page not found....</p>");
        }
      }
      else
      {
        echo(
          '
          <script>
          hide("section2")
          </script>
          '
        );
      }
      ?>

    </div>

    <div id="product-center" class="product-center">

      <?php
        if (getcontenttypeid($conn, $page) == "as Home page") {
          $sql = "SELECT * FROM `product` WHERE `newcollection`=1 AND `menuId`=$page";
          $result = mysqli_query($conn, $sql);




          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
              $producttypeId = $row['producttypeId'];

              $sql2 = "SELECT * FROM `producttype` WHERE `id`='$producttypeId'";
              $result2 = mysqli_query($conn, $sql2);

              if (mysqli_num_rows($result2) > 0) {

                if ($row2 = mysqli_fetch_assoc($result2)) {

                  $percent = (number_format((float)100 - ($row["price"] * 100 / $row["oldprice"]), 2, '.', ''));

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
                  echo ('<div class="product-item">
                      <div class="overlay">
                        <a href="" class="product-thumb">
                          <img src="./' . $row["image"] . '" alt="" />
                        </a>
                        <span class=' . $discountcolor . '>' . $discountarrow . ' ' . $percent . ' % </span>
                      </div>
  
                      <div class="product-info">
                        <span>' . $row2["producttypename"] . '</span>
                        <a href="">' . $row["title"] . '</a>
                        <h4>' . $row["price"] . ' '. $row["currency"].'</h4>
                      </div>

                    </div>');
                }
              }
            }
          } else {
            echo ("<h2> Error 404</h2>
                  <br>
                  <p> Page not found....</p>");
          }
        } else {
          echo ('
            <script>
            hide("product-center")
            </script>
            '
          );
        }
      ?>


  </section>


  <!-- Promo -->

  <section id="section3" class="section banner">

    <?php
    if (getcontenttypeid($conn,$page) == "as Home page") {
      $sql = "SELECT * FROM `content` WHERE `menuId`=$page";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          echo ('<div class="left">
                <span class="trend">' . $row["text10"] . '</span>
                <h1>' . $row["text2"] . '</h1>
                <p>' . $row["text11"] . '</p>
                <a href="#" class="btn btn-1">' . $row["textbtn2"] . '</a>
              </div>
              <div class="right">
                <img src="' . $row["image6"] . '" alt="">
              </div>');
        }
      } else {
        echo ("<h2> Error 404</h2>
      <br>
      <p> Page not found....</p>");
      }
    }
    else
    {
      echo(
        '
        <script>
        hide("section3")
        </script>
        '
      );
    }

    ?>

  </section>


  <!-- Featured -->

  <section class="section new-arrival">
    <div class="title">

      <?php
      if (getcontenttypeid($conn,$page) == "as Home page") {
        $sql = "SELECT * FROM `content` WHERE `menuId`=$page";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_assoc($result)) {
            echo ('  <h1>' . $row["text9"] . '</h1>
      <p>' . $row["text8"] . '</p>
    </div>');
          }
        }
      }

      ?>
      <div id="product-center" class="product-center">




        <?php
        if (getcontenttypeid($conn,$page) == "as Home page") {


          $sql = "SELECT * FROM `product` WHERE `designerchoose`=1 AND `menuId`=$page";
          $result = mysqli_query($conn, $sql);


          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
              $producttypeId = $row['producttypeId'];

              $sql2 = "SELECT * FROM `producttype` WHERE `id`='$producttypeId'";
              $result2 = mysqli_query($conn, $sql2);

              if (mysqli_num_rows($result2) > 0) {

                if ($row2 = mysqli_fetch_assoc($result2)) {

                  $percent = (number_format((float)100 - ($row["price"] * 100 / $row["oldprice"]), 2, '.', ''));

                  if ($percent > 0) {
                    $discountcolor = "discount";
                    $discountarrow = "↓";
                  }
                  if ($percent < 0) {
                    $discountcolor = "negdiscount";
                    $discountarrow = "↑";
                  }

                  if ($percent == 0) {
                    $discountcolor = "nediscount";
                    $discountarrow = "";
                  }

                  echo ('<div class="product-item">
                        <div class="overlay">
                          <a href="" class="product-thumb">
                            <img src="' . $row["image"] . '" alt="" />
                          </a>
                          <span class=' . $discountcolor . '>' . $discountarrow . ' ' . $percent . ' % </span>
                        </div>
                        <div class="product-info">
                          <span>' . $row2["producttypename"] . '</span>
                          <a href="">' . $row["title"] . '</a>
                          <h4>' . $row["price"] . ' '. $row["currency"].'</h4>
                        </div>

                      </div>'
                  );
                }
              }
            }
          } 
          else {
            echo ("<h2> Error 404</h2>
                   <br>
                 <p> Page not found....</p>");
          }
        }
        else
        {
          echo(
            '
            <script>
            hide("product-center")
            </script>
            '
          );
        }
        ?>
      </div>


  </section>