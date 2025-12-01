<?php
    // التحقق من وجود بيانات مرسلة
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['number']) && isset($_POST['message'])) {
        // استخراج البيانات من النموذج
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $message=$_POST['message'];

try {
    $db = new mysqli('localhost', 'root', '', 'secws');
    $qry="INSERT INTO `contact` (`idcontact`, `name`, `email`, `number`, `massage`) VALUES ('','".$name."', '".$email."', '".$number."', '". $message."');";
    $rs=$db->query($qry);
    $db->commit();
    $db->close();
    if ($rs==1) {
        echo " تمت إضافة البيانات بنجاح!";
    } else {
        echo "حدث خطأ أثناء إضافة البيانات: ";
    }
}catch (Exception $e){

}
    }

?>
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
    <link rel="stylesheet" href="cssContant.css">
</head>
<body onload="first()">
<header>
    <!-- اسم المحل -->

    <img src="images/Picture1.jpg" alt="logo" width="180px" >

    <!--TAPS-->
    <nav class="tap">
        <a  onclick="setActiveTab(event)"  href="phpHome.php">HOME</a>
        <a  onclick="setActiveTab(event)"  href="phpShop.php"><B>SHOP</B></a>
        <a onclick="setActiveTab(event)"  class="active" href="phpContact.php"><B>CONTACT</B></a>
    </nav>
    <!-- ICONS -->
    <div class="icon">
        <i   class="fas fa-bars" id="bars"></i>
        <a href="fav.php" class="fas fa-heart"></a>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user" id="userIcon"></a>
        <a href="phpLogin.php" class="fas fa-sign-out-alt" ></a>

        <span id="spanhome"><?php

            $conn = new mysqli('localhost', 'root', '', 'secws');
            $email = $_SESSION['emailUserLogin'];
            $sql1 = "SELECT * FROM cart WHERE emailcart='$email'";
            $result1 = $conn->query($sql1);
            $num=$result1->num_rows;
            echo $num;
            ?>
        </span>

        <span id="spanhomefav"><?php

            $sql1 = "SELECT * FROM fav WHERE emailfav='$email'";
            $result1 = $conn->query($sql1);
            $num=$result1->num_rows;
            echo $num;
            ?>
        </span>
    </div>



</header>
<section class="contact-page">
    <div class="text-contact">

        <h1> We Are Here For Help You! </h1>
        <pre><h2>         Please Contact Us</h2></pre>


    </div >
    <div class="image-contact">
        <img src="images/contact.jpg"  alt="contact img">
    </div>

</section>

<div class="row">
    <p>Send A Quest</p>
    <form action="phpContact.php" method="post">
        <input type="text" placeholder="name" name="name" class="boxx">
        <br>
        <input type="text" placeholder="email" name="email" class="boxx">
        <br>
        <input type="text" placeholder="number"  name="number" class="boxx">
        <br>
        <textarea  placeholder="message" class="boxx"  name="message"  cols="30" rows="10">
                    </textarea>
        <br>
        <input type="submit" value="send message" class="btn">
    </form>
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



<script src="jsContant.js"></script>
</body>
</html>
