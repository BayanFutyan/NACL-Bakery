<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-N2zPBjZVZD5qvz9TNVH7VRMGa2D2bOLyV5cV5BCOwFbYg2+dtHFN/qN3R6qW2XkS" crossorigin="anonymous">

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
    <link rel="stylesheet" href="cart.css">

</head>
<body >
<?php

$conn = new mysqli('localhost', 'root', '', 'secws');
//
if(isset($_GET['id'])){
$ID = $_GET['id'];
$sql = "DELETE FROM `cart` WHERE `id` = '$ID'";
$result = $conn->query($sql);

}
if(isset($_GET['id100'])){
    $ID100 = $_GET['id100'];
    $sql1 = "SELECT * FROM cart WHERE id = '$ID100'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_object();
    $num100 = $row1->num;
    $num1000= $num100+1;

    $sql100 = "UPDATE cart SET num = '$num1000' WHERE id = '$ID100'";
    $result100 = $conn->query($sql100);

}

if(isset($_GET['id99'])){
    $ID99 = $_GET['id99'];
    $sql99 = "SELECT * FROM cart WHERE id = '$ID99'";
    $result99 = $conn->query($sql99);
    $row99 = $result99->fetch_object();
    $num99 = $row99->num;
    $num999= $num99-1;

    $sql100 = "UPDATE cart SET num = '$num999' WHERE id = '$ID99'";
    $result100 = $conn->query($sql100);

}

if (isset($_POST['location10']) && isset($_POST['email10'])){
    $email2 = $_SESSION['emailUserLogin'];
    $sql88 = "UPDATE `cart` SET `pay` = '1' WHERE emailcart = '$email2'";
    $result88 = $conn->query($sql88);

}

$conn->commit();
$conn->close();



?>

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
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user" id="userIcon"></a>
    </div>

</header>





<h1 class="head"> cart </h1>

<div class="product_display">
    <table class="product_display_table" border="1">
        <thead>
        <tr>
            <td>Remove</td>
            <td>Images</td>
            <td>Product</td>
            <td>Unit Price</td>
            <td>Quantity</td>
            <td>Total</td>
        </tr>
        </thead>
        <tbody>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'secws');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $email = $_SESSION['emailUserLogin'];
        $sql = "SELECT * FROM cart WHERE emailcart = '$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $ic = $row->idcart;
                $sql2 = "SELECT * FROM img WHERE id = '$ic'";
                $result2 = $conn->query($sql2);
                $row155 = $result2->fetch_object();

                ?>
                <tr>
                    <td><a href="cart.php?id=<?php echo $row->id ?>" class="fas fa-times"></a></td>
                    <td><img id="image_cart" src="<?php echo $row->imagecart; ?>" alt="Avatar" id="<?php echo $row->idcart; ?>"></td>
                    <td><?php echo $row->namecart; ?></td>
                    <td>
                        <?php
                        if ($row155->sale25 == '0' && $row155->sale50 == '1') {
                            ?>
                            <div class="price"> $<?php echo $row155->price * 0.5; ?></div>
                            <div class="price12"> $<?php echo $row155->price; ?></div>
                            <?php
                        } elseif ($row155->sale25 == '1' && $row155->sale50 == '0') {
                            ?>
                            <div class="price"> $<?php echo $row155->price * 0.75; ?></div>
                            <div class="price12"> $<?php echo $row155->price; ?></div>
                            <?php
                        } else {
                            ?>
                            <div class="price">$ <?php echo $row155->price; ?></div>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <div class="nummm">
                            <a href="cart.php?id99=<?php echo $row->id ?>" class="fas fa-minus"></a>
                            <span> <?php echo $row->num; ?> </span>
                            <a href="cart.php?id100=<?php echo $row->id ?>" class="fas fa-plus"></a>
                        </div>
                    </td>
                    <td><?php
                        $num1 = $row->num;
                        $num2 = $row->pricecart;
                        if ($row155->sale25 == '0' && $row155->sale50 == '1') {
                            $num2 = $row->pricecart * 0.5;
                        } elseif ($row155->sale25 == '1' && $row155->sale50 == '0') {
                            $num2 = $row->pricecart * 0.75;
                        } else {
                            $num2 = $row->pricecart;
                        }

                        $num3 = $num1 * $num2;
                        echo $num3;
                        ?>
                        </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='6'>No items in the cart</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>



<img src="images/cart4.jpg" class="img-cart">





<div class="row1">
    <p id="pp1">Checkout</p>
    <form action="cart.php" method="post">
        <div class="form-group">
            <label for="Cart Subtotal">Cart Subtotal:</label>
            <input type="text" id="Cart Subtotal" class="boxxx" value=" <?php

            $conn = new mysqli('localhost', 'root', '', 'secws');

            // تحقق من الاتصال بقاعدة البيانات
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $email = $_SESSION['emailUserLogin'];
            $sql = "SELECT * FROM cart WHERE emailcart = '$email'";
            $result = $conn->query($sql);

            $ww = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_object()) {

                    $ic = $row->idcart;
                    $sql2 = "SELECT * FROM img WHERE id = '$ic'";
                    $result2 = $conn->query($sql2);
                    $row155 = $result2->fetch_object();

                    if ($row155->sale25 == '0' && $row155->sale50 == '1') {
                        $num2 = $row->pricecart * 0.5;
                    } elseif ($row155->sale25 == '1' && $row155->sale50 == '0') {
                        $num2 = $row->pricecart * 0.75;
                    } else {
                        $num2 = $row->pricecart;
                    }

                    $ww += ($row->num * $num2);
                }
                echo $ww." $";
            } else {
                echo "No items in cart";
            }

            $conn->close();


            ?>"  readonly >
        </div>
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" class="boxxx" name="location10">
        </div>
        <div class="form-group">
            <label for="phone">phone :</label>
            <input type="text" id="email" class="boxxx" name="email10">
        </div>
        <input type="submit" value="Pay" class="btn1" id="payButton" onclick="showThankYouMessage()">

        <?php

        $conn = new mysqli('localhost', 'root', '', 'secws');

        $email = $_SESSION['emailUserLogin'];
        $sql22 = "SELECT * FROM cart WHERE emailcart = '$email'";
        $result22 = $conn->query($sql22);
        $row1 = $result22->fetch_object();
        $pay=2;
        if ($result->num_rows > 0){
        $pay = $row1->pay;
        }
        if($pay==1){
            ?>
            <p id="done">This order has been ordered and will arrive to you as soon as possible ^_^</p>
        <?php
        }elseif ($pay==0){
            ?>
            <p id="done">Click on bay to send the order ^_^</p>
        <?php
        }else{
            ?>
            <p id="done">There are no products to order, please select the products you want</p>
            <?php
        }
        ?>

    </form>
</div>

<br>
<br>
<br>



<!-- النافذة المنبثقة الخاصة برسالة الشكر -->
<div id="thankYouPopup">
    <p>Thank you for choosing us. We hope you had a great time shopping!!</p>
</div>



<script >
    function showThankYouMessage() {

// محو قيم حقول النص
        document.getElementById('Cart Subtotal').value = '0$';
        document.getElementById('Order Total').value = '0$';
        document.getElementById('location').value = '';
        document.getElementById('email').value = '';
        event.preventDefault(); // منع إرسال النموذج
        document.getElementById('thankYouPopup').style.display = 'block'; // عرض رسالة الشكر

        // تحديد وقت ظهور رسالة الشكر لمدة 5 ثوانٍ ثم إخفائها
        setTimeout(function() {
            document.getElementById('thankYouPopup').style.display = 'none';
        }, 5000); // 5000 ميلي ثانية = 5 ثوانٍ
    }
</script>
</body>
</html>

