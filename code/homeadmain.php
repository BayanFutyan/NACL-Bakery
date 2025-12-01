<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0 ">
    <title> NACL BAKERY </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="cssHeader.css">
    <link rel="stylesheet" href="cssHome.css">

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
<?php

$conn1 = new mysqli('localhost', 'root', '', 'secws');

if(isset($_GET['id'])){
    $ID1 = $_GET['id'];
    $sql = "UPDATE `img` SET `fat` = '0' WHERE id = '$ID1'";
    $result = $conn1->query($sql);
    $conn1->commit();
    $conn1->close();
}

if(isset($_GET['id1'])){
    $ID1 = $_GET['id1'];
    $sql1 = "UPDATE `img` SET `best` = '0' WHERE id = '$ID1'";
    $result1 = $conn1->query($sql1);
    $conn1->commit();
    $conn1->close();
}

if(isset($_GET['id2'])){
    $ID2 = $_GET['id2'];
    $sql2 = "UPDATE `img` SET `new` = '0' WHERE id = '$ID2'";
    $result2 = $conn1->query($sql2);
    $conn1->commit();
    $conn1->close();
}



?>
<?php
if(isset($_GET['id44'])){
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            showDiv();
        });
    </script>
    <?php

}

if (isset($_POST['product_name']) && isset($_POST['product_salary'])){
    $conn = new mysqli('localhost', 'root', '', 'secws');
    $name22=$_POST['product_name'];
    $pricee22=$_POST['product_salary'];
    $ID60=$_GET['id44'];
    $sql = "UPDATE img SET name='$name22', price='$pricee22' WHERE id='$ID60'";
    $rs = $conn->query($sql);
    $conn->commit();
    $conn->close();
    header("Location: homeadmain.php");
    exit();
}
?>

<header>
    <!-- اسم المحل -->

    <img src="images/Picture1.jpg" alt="logo" width="180px" >

    <!--TAPS-->
    <nav class="tap">
        <a  onclick="setActiveTab(event)" class="active" href="homeadmain.php">HOME</a>
        <a  onclick="setActiveTab(event)" href="phpshopadmin.php"><B>SHOP</B></a>
        <a onclick="setActiveTab(event)"  href="contactAdmain.php"><B>CONTACT</B></a>
    </nav>
    <!-- ICONS -->
    <div class="icon">
        <i   class="fas fa-bars" id="bars"></i>
        <!--        <i onclick="toggleSearch()" class="fas fa-search" id="search-icon"   ></i>-->
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user" id="userIcon"></a>
        <a href="phpLogin.php" class="fas fa-sign-out-alt" ></a>

    </div>


</header>

<!--HOME SECTION START : -->
<section class="home" id="home">

    <div class ="slide">
        <div class="content">
            <h3> NACL BAKERY   </h3>
            <P > <font color="black" size="5rem"> Quality Products Bakery Items</font></P>
            <p><br></p>
            <a href="phpshopadmin.php"><button> GO TO SHOPING</button></a>

        </div>
        <div class="image">

            <img src="images/IMG15.jpg" width="540px" alt="صورة">


        </div>
    </div>

</section>


<div class="sec-text" >
    <p><br>OUR SECTIONS :</p>
</div>


<div class="conta">

    <div class="card">
        <img class="image1"src="images/bread1.jpg" alt="Avatar" onclick="selectImage19('Bread')">

        <div class="text-card">
            <h4>Breads</h4>
        </div>
    </div>



    <div class="card">
        <img class="image1"src="images/pp1.jpg" alt="Avatar" onclick="selectImage19('pp')">
        <div class="text-card">
            <h4>Pastries and pizza</h4>
        </div>
    </div>


    <div class="card">
        <img class="image1"src="images/cake.jpg" alt="Avatar" onclick="selectImage19('cake')" >
        <div class="text-card">
            <h4>Cake</h4>
        </div>
    </div>

    <div class="card">
        <img class="image1"src="images/cor1.jpg" alt="Avatar" onclick="selectImage19('cor')" >
        <div class="text-card">
            <h4>Croissant</h4>
        </div>
    </div>
</div>

<div class="sec-text" >
    <p><br></p>
</div>

<div class="sale">
    <h4 class="text2" ><br>OUR <br> SALES :</h4>
    <div class="style-img1">
        <img  class="sale1" src="images/sale1.jpg" alt="Avatar">
        <div class="img1-text">
            <p><i style="color:red">50% </i>Sale Off</p><br>
            <h1>Best Quality <br>Products</h1>
            <form action="saleadmin.php" >
                <input class="mybutton" type="submit" value="SHOP NOW">
            </form>
        </div>


    </div>

    <div class="style-img1">
        <img  class="sale1" src="images/sale2.jpg" alt="Avatar">
        <div class="img1-text">
            <p><i style="color:red">25% </i> Sale Off</p><br>
            <h1>Hot & Spicy <br>Pastry</h1>
            <form action="saleadmin.php">
                <input class="mybutton" type="submit" value="SHOP NOW">
            </form>
        </div>

    </div>
</div>

<section class="prodocts">
    <h1>New Products</h1>
    <br>
    <br>
    <div class="type">
        <a  onclick="setActiveNewProduct(event)"  href="#Our Features" class="OurFeatures" >Our Features</a>
        <a  onclick="setActiveNewProduct(event)" href="#Best Sellers" class="BestSellers">Best Sellers</a>
        <a   onclick="setActiveNewProduct(event)"  href="#New Items" class="NewItems">New Items</a>
    </div>
    <br>
    <div class="box-container" id="our-features">



        <?php
        $conn = new mysqli('localhost', 'root', '', 'secws');

        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM img WHERE fat = '1'";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                ?>
                <div class="box">
                    <div class="image-features">
                        <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>"data-id="$i">
                        <div class="icon2">
                            <a href="homeadmain.php?id=<?php echo $row->id ?>" class="fas fa-times"></a>
                            <a href="homeadmain.php?id44=<?php echo $row->id ?>" class="fas fa-edit" ></a>
                        </div>
                    </div>
                    <div class="content-features">
                        <h2><?php echo $row->name; ?></h2>
                        <div class="price">$ <?php echo $row->price; ?></div>
                    </div>
                </div>
                <?php
            }
        }

        $conn->close();
        ?>




    </div>







    <div class="box-container" id="best-sellers"  >
        <?php
        $conn = new mysqli('localhost', 'root', '', 'secws');

        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM img WHERE best = '1'";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                ?>
                <div class="box">
                    <div class="image-features">
                        <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>"data-id="$i">
                        <div class="icon2">
                            <a href="homeadmain.php?id1=<?php echo $row->id ?>" class="fas fa-times"></a>
                            <a href="homeadmain.php?id44=<?php echo $row->id ?>" class="fas fa-edit" ></a>
                        </div>
                    </div>
                    <div class="content-features">
                        <h2><?php echo $row->name; ?></h2>
                        <div class="price">$ <?php echo $row->price; ?></div>
                    </div>
                </div>
                <?php
            }
        }

        $conn->close();
        ?>
    </div>









    <div class="box-container" id="New-Items"  >
        <?php
        $conn = new mysqli('localhost', 'root', '', 'secws');

        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM img WHERE new = '1'";

        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                ?>
                <div class="box">
                    <div class="image-features">
                        <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>"data-id="$i">
                        <div class="icon2">
                            <a href="homeadmain.php?id2=<?php echo $row->id ?>" class="fas fa-times"></a>
                            <a href="homeadmain.php?id44=<?php echo $row->id ?>" class="fas fa-edit" ></a>
                        </div>
                    </div>
                    <div class="content-features">
                        <h2><?php echo $row->name; ?></h2>
                        <div class="price">$ <?php echo $row->price; ?></div>
                    </div>
                </div>
                <?php
            }
        }

        $conn->close();
        ?>
    </div>
</section>




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




<div class="pop" id="pop1">
    <form class="pop-content" action="" method="post" enctype="multipart/form-data">
        <img src="images/close.jpg" class="close">
        <h1>EDIT PRODUCT  ^_^ </h1>
        <input type="text" placeholder="Product name" name="product_name" id="b1" required value="<?php
        if(isset($_GET['id44'])) {
            $conn = new mysqli('localhost', 'root', '', 'secws');  // Changed $conn1 to $conn
            $id4 = $_GET['id44'];  // Corrected the assignment operator from = to =>
            $sql = "SELECT * FROM img WHERE id = '$id4'";
            $result = $conn->query($sql);
            if($result && $result->num_rows > 0) {  // Check if query was successful and returned at least one row
                $row = $result->fetch_object();
                echo $row->name ;
            } else {
                echo "No such record found";  // Handle case where no record matches the given id
            }
            $conn->close();  // Close database connection
        }

        ?>
">
        <input type="text" placeholder="Product salary" name="product_salary" id="b2" required value="<?php
        if(isset($_GET['id44'])) {
            $conn = new mysqli('localhost', 'root', '', 'secws');  // Changed $conn1 to $conn
            $id4 = $_GET['id44'];  // Corrected the assignment operator from = to =>
            $sql = "SELECT * FROM img WHERE id = '$id4'";
            $result = $conn->query($sql);
            if($result && $result->num_rows > 0) {  // Check if query was successful and returned at least one row
                $row = $result->fetch_object();
                echo $row->price . ' $';
            } else {
                echo "No such record found";  // Handle case where no record matches the given id
            }
            $conn->close();  // Close database connection
        }



        ?>
" >

        <div class="salee">
            <h1 style="color: black; font-size: 18px;">Has sale?</h1>
            <br>
            <input type="radio" name="sale" value="NO" id="no" checked><label for="no">NO</label>
            <input type="radio" name="sale" value="25%" id="25%"><label for="25%">25%</label>
            <input type="radio" name="sale" value="50%" id="50%"><label for="50%">50%</label>
        </div>

        <img id="edit7" src="<?php
        if(isset($_GET['id44'])) {
            $conn = new mysqli('localhost', 'root', '', 'secws');  // Changed $conn1 to $conn
            $id4 = $_GET['id44'];  // Corrected the assignment operator from = to =>
            $sql = "SELECT * FROM img WHERE id = '$id4'";
            $result = $conn->query($sql);
            if($result && $result->num_rows > 0) {  // Check if query was successful and returned at least one row
                $row = $result->fetch_object();
                echo $row->path ;
            } else {
                echo "No such record found";  // Handle case where no record matches the given id
            }
            $conn->close();  // Close database connection
        }
        ?>
        " alt="Avatar">
        <input type="submit" name="add" value="EDIT" onclick="dissDiv()">

    </form>
</div>


<!--footer section end-->
<script src="jsHome.js"></script>
</body>
</html>