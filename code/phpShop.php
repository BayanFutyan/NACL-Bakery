<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> NACL BAKERY</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="cssHeader.css">
    <link rel="stylesheet" href="cssShop.css">

</head>
<body onload="first()">

<?php

$conn = new mysqli('localhost', 'root', '', 'secws');


// insert a product to *cart* when I click in Cart
if(isset($_GET['id1'])){
    $ID = $_GET['id1'];
    $sql = "SELECT * FROM img WHERE id = '$ID'";
    $result = $conn->query($sql);
    $row = $result->fetch_object();
    $namee = $row->name;
    $pricee = $row->price;
    $path = $row->path;
    $email = $_SESSION['emailUserLogin'];

    $qryStr = "INSERT INTO `cart` (`imagecart`, `namecart`, `pricecart`, `emailcart`, `idcart`, `id`) VALUES ('".$path."', '".$namee."', '".$pricee."', '".$email."', '".$ID."', '');";
    $rs = $conn->query($qryStr);
    $conn->commit();
}

// insert a product to *FAV * when I click in HIRT

if(isset($_GET['id2'])){
    $ID1 = $_GET['id2'];
    $sql1 = "SELECT * FROM img WHERE id = '$ID1'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_object();
    $namee1 = $row1->name;
    $pricee1 = $row1->price;
    $path1 = $row1->path;
    $email = $_SESSION['emailUserLogin'];

    $qryStr1 = "INSERT INTO `fav` (`id`,`idfav`, `namefav`, `pricefav`, `pathfav`,`emailfav`) VALUES ('','".$ID1."', '".$namee1."', '".$pricee1."', '".$path1."','".$email."');";
    $rs = $conn->query($qryStr1);
    $conn->commit();
}
$conn->close();
?>

<header>
    <!-- اسم المحل -->

    <img src="images/Picture1.jpg" alt="logo" width="180px" >

    <!--TAPS-->
    <nav class="tap">
        <a  onclick="setActiveTab(event)"  href="phpHome.php">HOME</a>
        <a  onclick="setActiveTab(event)" class="active" href="phpShop.php"><B>SHOP</B></a>
        <a onclick="setActiveTab(event)"   href="phpContact.php"><B>CONTACT</B></a>
    </nav>
    <!-- ICONS -->
    <div class="icon">

        <i   class="fas fa-bars" id="bars"></i>
        <i onclick="toggleSearch()" class="fas fa-search" id="search-icon"   ></i>
        <a href="fav.php" class="fas fa-heart " ></a>
        <a href="#" class="fas fa-shopping-cart copyclass"></a>
        <a href="#" class="fas fa-user" id="userIcon"></a>
        <a href="phpLogin.php" class="fas fa-sign-out-alt"></a>

        <span id="spanshop"><?php

            $conn = new mysqli('localhost', 'root', '', 'secws');
            $email = $_SESSION['emailUserLogin'];
            $sql1 = "SELECT * FROM cart WHERE emailcart='$email'";
            $result1 = $conn->query($sql1);
            $num=$result1->num_rows;
            echo $num;
            ?>
        </span>

        <span  id="spanshopfav"><?php

            $sql1 = "SELECT * FROM fav WHERE emailfav='$email'";
            $result1 = $conn->query($sql1);
            $num=$result1->num_rows;
            echo $num;
            ?>
        </span>

    </div>



    <div class="search-form" id="search-form">
        <input type="search"  id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>




</header>


<!-- start cart-->
<div class="cartTab" >
    <h1>Shopping Cart</h1>
    <div class="ListCart">
        <table id="table">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'secws');
            $email = $_SESSION['emailUserLogin'];
            $sql = "SELECT * FROM cart WHERE emailcart = '$email'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_object()) {

                ?>

                <tr>
                    <td  style=" width: 110px" ><img id="image_cart" src="<?php echo $row->imagecart; ?>" alt="Avatar" id="<?php echo $row->idcart; ?>"> </td>
                    <td  style=" width: 150px" ><?php echo $row->namecart; ?></td>
                    <td  style=" width: 70px" > $ <?php echo $row->pricecart; ?> </td>
                    <td  style=" width: 70px" >
                        <span class="minus" > &lt; </span>
                        <span ><?php echo $row->num; ?></span>
                        <span class="plus" >&gt;</span>

                    </td>

                </tr>

                <?php
            }
            ?>
        </table>

    </div>

    <div class="btt">
        <a href="cart.php"><button class="View cart">View cart </button></a>
        <br>


    </div>

    <div id="cart-box">
        <i class="fas fa-times close-btn" onclick="hideCartBox()" ></i>

    </div>

</div>
<!--end cart-->


<section class="shop-page">

    <div class="text-shop">
        <h1 style="font-size: 90px">  Welcome</h1>
        <p style="font-size: 25px " >On our products</p>
        <br>
        <br>
        <br>
        <p style=" font-size: 25px ;color: #222A35" >I hope you enjoy</p>
    </div>

    <div class="image-shop">
        <img src="images/shopp.jpg" width="400"  height="auto" alt="Shop Image">
    </div>

</section>

<select class="sortby" onchange="sortProducts(this)">
    <option disabled selected>Sort by</option>
    <option value="low_to_high">Low to high</option>
    <option value="high_to_low">High to low</option>
    <option value="name_asc">Product name: A to Z</option>
    <option value="name_desc">Product name: Z to A</option>
</select>


<div class="filter">
    <h1>*FILTER*</h1>
    <br>
    <P>FILTER BY TYPE :</P>
    <br>
    <input type="radio" name="filtername" id="All" checked setActiveNewProduct(event) ><label for="All">All</label>
    <br>
    <input type="radio" name="filtername" id="Bread" setActiveNewProduct(event)><label for="Bread">Breads</label>
    <br>
    <input type="radio" name="filtername" id="pp"setActiveNewProduct(event)><label for="pp">Pastries and pizza</label>
    <br>
    <input type="radio" name="filtername" id="cake"setActiveNewProduct(event)><label for="cake">Cake</label>
    <br>
    <input type="radio" name="filtername" id="cor"setActiveNewProduct(event)><label for="cor">Croissant</label>
    <br><br><br>
    <P>FILTER BY PRICE :</P>

    <div class="range">
        <div class="slider">
            <div class="pogress"></div>
        </div>
        <div class="range-input">
            <input type="range" class="range-min"  min="0" max="100" value="0" step="1">
            <input type="range" class="range-max"  min="0" max="100" value="500" step="1">
        </div>

    </div>

    <div class="price-input">
                <pre>
                <p>Price :  </p>
                </pre>
        <div class="field">
            <span class="currency">$</span>
            <input readonly type="number" class="input-min" id="input-min" value="0" >
        </div>
        <div class="separator">-</div>
        <div class="field">
            <span class="currency">$</span>
            <input readonly type="number" class="input-max" value="100">
        </div>

    </div>

    <a href="sale.php" id="add12">Go To Sale  ^_^ </a>

</div>



<div class="pppp" >
    <section class="prodocts">
        <div class="box-container" id="cakee">

            <?php

            global $id; // تحديد المتغير $id كمتغير عام
            $cake = 'cake';
            $conn = new mysqli('localhost', 'root', '', 'secws');

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            // قراءة المعلمة من URL
            $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

            // بناء جملة SQL بناءً على خيار الترتيب

            switch ($sort) {

                case 'low_to_high':
                    $sql = "SELECT * FROM img WHERE type = '$cake' ORDER BY price ASC ";
                    break;
                case 'high_to_low':
                    $sql = "SELECT * FROM img WHERE type = '$cake' ORDER BY price DESC";
                    break;
                case 'name_asc':
                    $sql = "SELECT * FROM img WHERE type = '$cake' ORDER BY name ASC ";
                    break;
                case 'name_desc':
                    $sql = "SELECT * FROM img WHERE type = '$cake' ORDER BY name DESC";
                    break;
                default:
                    $sql = "SELECT * FROM img WHERE type = '$cake'";
            }





            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>">
                            <div class="icon2">
                                <a href="phpShop.php ? id2=<?php echo $row->id ?>" class="fas fa-heart"></a>
                                <a href="phpShop.php ? id1=<?php echo $row->id ?>" class="fas fa-shopping-cart" onclick="setTimeout()" ></a>
                            </div>
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <?php
                            if($row->sale25 =='0' && $row->sale50 =='1'){
                            ?>
                                <div class="price"> $<?php echo $row->price*0.5 ; ?></div>
                                <div class="price12"> $<?php echo  $row->price; ?></div>
                                <?php
                            }elseif ($row->sale25 =='1' && $row->sale50 =='0'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.75 ; ?></div>
                                <div class="price12"> $<?php echo  $row->price; ?></div>
                                <?php
                            }else{
                                ?>
                                <div class="price">$ <?php echo $row->price; ?></div>
                    <?php
                }
                        ?>

                        </div>
                    </div>
                    <?php
                }
            }

            $conn->close();
            ?>
        </div>
    </section>

    <script>
        function sortProducts(select) {
            const sortValue = select.value;
            const currentUrl = window.location.href.split('?')[0]; // الحصول على URL الأساسي
            const newUrl = currentUrl + "?sort=" + sortValue; // إنشاء URL جديد مع معلمة الترتيب
            window.location.href = newUrl; // إعادة تحميل الصفحة
        }
    </script>



    <section class="prodocts">
        <div class="box-container" id="breads">

            <?php

            global $id; // تحديد المتغير $id كمتغير عام
            $bread = 'bread';
            $conn = new mysqli('localhost', 'root', '', 'secws');

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            switch ($sort) {

                case 'low_to_high':
                    $sql = "SELECT * FROM img WHERE type = '$bread' ORDER BY price ASC ";
                    break;
                case 'high_to_low':
                    $sql = "SELECT * FROM img WHERE type = '$bread' ORDER BY price DESC";
                    break;
                case 'name_asc':
                    $sql = "SELECT * FROM img WHERE type = '$bread' ORDER BY name ASC ";
                    break;
                case 'name_desc':
                    $sql = "SELECT * FROM img WHERE type = '$bread' ORDER BY name DESC";
                    break;
                default:
                    $sql = "SELECT * FROM img WHERE type = '$bread'";
            }
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>"data-id="$i">
                            <div class="icon2">
                                <a href="phpShop.php ? id2=<?php echo $row->id ?>" class="fas fa-heart"></a>
                                <a href="phpShop.php ? id1=<?php echo $row->id ?>" class="fas fa-shopping-cart"  ></a>
                            </div>
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <?php
                            if($row->sale25 =='0' && $row->sale50 =='1'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.5 ; ?></div>
                                <div class="price12"> <?php echo  $row->price; ?></div>
                                <?php
                            }elseif ($row->sale25 =='1' && $row->sale50 =='0'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.75 ; ?></div>
                                <div class="price12"> <?php echo  $row->price; ?></div>
                                <?php
                            }else{
                                ?>
                                <div class="price">$ <?php echo $row->price; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }

            $conn->close();
            ?>
        </div>
    </section>



    <section class="prodocts">
        <div class="box-container" id="pp1">

            <?php

            global $id; // تحديد المتغير $id كمتغير عام
            $ppp2 = 'pp';
            $conn = new mysqli('localhost', 'root', '', 'secws');

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            switch ($sort) {
                case 'low_to_high':
                    $sql = "SELECT * FROM img WHERE type = '$ppp2' ORDER BY price ASC ";
                    break;
                case 'high_to_low':
                    $sql = "SELECT * FROM img WHERE type = '$ppp2' ORDER BY price DESC";
                    break;
                case 'name_asc':
                    $sql = "SELECT * FROM img WHERE type = '$ppp2' ORDER BY name ASC ";
                    break;
                case 'name_desc':
                    $sql = "SELECT * FROM img WHERE type = '$ppp2' ORDER BY name DESC";
                    break;
                default:
                    $sql = "SELECT * FROM img WHERE type = '$ppp2'";
            }
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>" data-id="$i">
                            <div class="icon2">
                                <a href="phpShop.php ? id2=<?php echo $row->id ?>" class="fas fa-heart"></a>
                                <a href="phpShop.php ? id1=<?php echo $row->id ?>" class="fas fa-shopping-cart"  ></a>
                            </div>
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <?php
                            if($row->sale25 =='0' && $row->sale50 =='1'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.5 ; ?></div>
                                <div class="price12"><?php echo  $row->price; ?></div>
                                <?php
                            }elseif ($row->sale25 =='1' && $row->sale50 =='0'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.75 ; ?></div>
                                <div class="price12"><?php echo  $row->price; ?></div>
                                <?php
                            }else{
                                ?>
                                <div class="price">$ <?php echo $row->price; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }

            $conn->close();
            ?>
        </div>
    </section>


    <section class="prodocts">
        <div class="box-container" id="corr">
            <?php

            global $id; // تحديد المتغير $id كمتغير عام
            $corr = 'cor';
            $conn = new mysqli('localhost', 'root', '', 'secws');

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            switch ($sort) {
                case 'low_to_high':
                    $sql = "SELECT * FROM img WHERE type = '$corr' ORDER BY price ASC ";
                    break;
                case 'high_to_low':
                    $sql = "SELECT * FROM img WHERE type = '$corr' ORDER BY price DESC";
                    break;
                case 'name_asc':
                    $sql = "SELECT * FROM img WHERE type = '$corr' ORDER BY name ASC ";
                    break;
                case 'name_desc':
                    $sql = "SELECT * FROM img WHERE type = '$corr' ORDER BY name DESC";
                    break;
                default:
                    $sql = "SELECT * FROM img WHERE type = '$corr'";
            }
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>" data-id="<?php $row->id?>">
                            <div class="icon2">
                                <a href="phpShop.php ? id2=<?php echo $row->id ?>" class="fas fa-heart"></a>
                                <a href="phpShop.php ? id1=<?php echo $row->id ?>" class="fas fa-shopping-cart"  ></a>
                            </div>
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <?php
                            if($row->sale25 =='0' && $row->sale50 =='1'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.5 ; ?></div>
                                <div class="price12"><?php echo  $row->price; ?></div>
                                <?php
                            }elseif ($row->sale25 =='1' && $row->sale50 =='0'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.75 ; ?></div>
                                <div class="price12"><?php echo  $row->price; ?></div>
                                <?php
                            }else{
                                ?>
                                <div class="price">$ <?php echo $row->price; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }

            $conn->close();
            ?>
        </div>
    </section>





    <section class="prodocts">
        <div class="box-container" id="ALL1">

            <?php

            global $id; // تحديد المتغير $id كمتغير عام
            $conn = new mysqli('localhost', 'root', '', 'secws');

            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }

            // قراءة المعلمة من URL
            $sort = isset($_GET['sort']) ? $_GET['sort'] : '';

            // بناء جملة SQL بناءً على خيار الترتيب

            switch ($sort) {
                case 'low_to_high':
                    $sql = "SELECT * FROM img ORDER BY price ASC ";
                    break;
                case 'high_to_low':
                    $sql = "SELECT * FROM img ORDER BY price DESC";
                    break;
                case 'name_asc':
                    $sql = "SELECT * FROM img ORDER BY name ASC ";
                    break;
                case 'name_desc':
                    $sql = "SELECT * FROM img ORDER BY name DESC";
                    break;
                default:
                    $sql = "SELECT * FROM img";
            }





            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>" data-id="$i">
                            <div class="icon2">
                                <a href="phpShop.php ? id2=<?php echo $row->id ?>" class="fas fa-heart"></a>
                                <a href="phpShop.php ? id1=<?php echo $row->id ?>" class="fas fa-shopping-cart"  ></a>
                            </div>
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <?php
                            if($row->sale25 =='0' && $row->sale50 =='1'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.5 ; ?></div>
                                <div class="price12"> <?php echo  $row->price; ?></div>
                                <?php
                            }elseif ($row->sale25 =='1' && $row->sale50 =='0'){
                                ?>
                                <div class="price"> $<?php echo $row->price*0.75 ; ?></div>
                                <div class="price12"> <?php echo  $row->price; ?></div>
                                <?php
                            }else{
                                ?>
                                <div class="price">$ <?php echo $row->price; ?></div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
            }

            $conn->close();
            ?>
        </div>
    </section>


</div>
<br>
<br>
<br>











<!--footer section start-->
<section class="footer">
    <div class="end-container">
        <div class="end">
            <h3>Quicl Links</h3>
            <ul type="disc">
                <a href="phpHome.php"> <li>Home</li> </a>
                <a href="phpShop.php"> <li> Shop</li> </a>
                <a href="phpContact.php"> <li>Contact</li> </a>
            </ul>
        </div>

        <div class="end">
            <h3>Extra Links</h3>
            <ul type="disc">
                <a href="#"> <li>My Account</li> </a>
                <a href="cart.php"> <li> My Order</li> </a>
                <a href="#"> <li>My Favorite</li> </a>
            </ul>
        </div>

        <div class="end">

            <h3>Locations</h3>
            <ul type="disc">
                <a href="#"> <li>First Branch :</li> </a>
                <p>Yafa street, Nablus, Palestine</p>
                <a href="#"> <li>Second Branch :</li> </a>
                <p>front of the Academy, rafeedia, Nablus, Palestine</p>
                <a href="#"> <li>Third Branch :</li> </a>
                <p>Second Floor, City Mall, Nablus, Palestine</p>
            </ul>
        </div>

        <div class="end">
            <h3>Contact Info</h3>
            <ul type="disc">
                <a href="#"> <li>the first number :</li> </a>
                <p>+972 59-565-2537</p>
                <a href="#"> <li>The second number :</li> </a>
                <p>+972 59-392-8384</p>
                <a href="#"> <li>First email :</li> </a>
                <p>s12112220@stu.najah.edu</p>
                <a href="#"> <li>Second email :</li> </a>
                <p>s12112270@stu.najah.edu</p>
            </ul>
        </div>
    </div>
    <div class="line">
    </div>

    <div class="created"> created by <span>Eng.Raghad and Eng.Bayan</span> | all rights reserve  </div>
</section>
<br>
<br>
<br>
<!--footer section end-->







<div class="account">
    <form class="account-content" action="phpHome.php" method="post" enctype="multipart/form-data">
        <img src="images/close.jpg" class="close2">
        <h2>Hello</h2>
        <div class="input-container">
            <input type="text" placeholder="User Name" name="User-Name" value="<?php
            if (isset($_SESSION['emailUserLogin'])) {
                $conn = new mysqli('localhost', 'root', '', 'secws');
                $email = $_SESSION['emailUserLogin'];
                $sql = "SELECT * FROM log WHERE loginEmail = '$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_object();
                echo $row->username;
            }
            ?>">
            <span id="i1" class="icon"><i class="fas fa-user"></i></span>
        </div>
        <div class="input-container">
            <input id="password"  type="password" placeholder="Enter password" name="password" value="<?php
            if (isset($_SESSION['emailUserLogin'])) {
                $conn = new mysqli('localhost', 'root', '', 'secws');
                $email = $_SESSION['emailUserLogin'];
                $sql = "SELECT * FROM log WHERE loginEmail = '$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_object();
                echo $row->LoginPASS;
            }
            ?>">
            <span id="i2" class="icon"><i class="fas fa-lock"></i></span>
            <span id="togglePassword" class="fas fa-eye" onclick="showPassword()"></span>
        </div>

        <div class="input-container">
            <input type="email" placeholder="Enter Email" name="Email" value="<?php
            if (isset($_SESSION['emailUserLogin'])) {
                $email = $_SESSION['emailUserLogin'];
                echo htmlspecialchars($email);
            } else {
                echo '';
            }
            ?>">
            <span id="i3" class="icon"><i class="fas fa-envelope"></i></span>
        </div>


        <div class="input-container">
            <input type="text" id="location" placeholder="Enter your location" name="location" value="<?php
            if (isset($_SESSION['emailUserLogin'])) {
                $conn = new mysqli('localhost', 'root', '', 'secws');
                $email = $_SESSION['emailUserLogin'];
                $sql = "SELECT * FROM log WHERE loginEmail = '$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_object();
                echo $row->location;
            }
            ?>">
            <span id="i4" class="icon"><i class="fas fa-map-marker-alt"></i></span>
        </div>


        <div class="input-container">
            <input type="text" id="phone" placeholder="Enter your phone number" name="phone" value="<?php
            if (isset($_SESSION['emailUserLogin'])) {
                $conn = new mysqli('localhost', 'root', '', 'secws');
                $email = $_SESSION['emailUserLogin'];
                $sql = "SELECT * FROM log WHERE loginEmail = '$email'";
                $result = $conn->query($sql);
                $row = $result->fetch_object();
                echo $row->phonenumber;
            }
            ?>">
            <span id="i5" class="icon"><i class="fas fa-phone"></i></span>
        </div>
        <input type="submit" value="EDIT">
    </form>
</div>




<?php
if (isset($_POST['User-Name']) && isset($_POST['password']) && isset($_POST['Email']) && isset($_POST['location']) && isset($_POST['phone'])) {
    $new_username = $_POST['User-Name'];
    $new_password = $_POST['password'];
    $new_email = $_POST['Email'];
    $new_location = $_POST['location'];
    $new_phone = $_POST['phone'];

    try {
        $con = new mysqli('localhost', 'root', '', 'secws');

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "UPDATE log SET username='$new_username', LoginPASS='$new_password', loginEmail='$new_email', location='$new_location', phonenumber='$new_phone' WHERE loginEmail='{$_SESSION['emailUserLogin']}'";
        $rs = $con->query($sql);

        if ($con->affected_rows > 0) {
            echo "Details updated successfully!";
        } else {
            echo "No changes were made.";
        }

        $con->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>



<script src="jsShop.js"></script>
</body>
</html>
