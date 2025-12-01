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
if (isset($_GET['id'])) {
    $ID = $_GET['id'];
    $sql = "DELETE FROM `fav` WHERE `id` = '$ID'";
    $result = $conn->query($sql);
    $conn->commit();
    $conn->close();
}


if (isset($_GET['id2'])) {
    $ID1 = $_GET['id2'];
    $sql1 = "SELECT * FROM img WHERE id = '$ID1'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_object();
    $namee1 = $row1->name;
    $pricee1 = $row1->price;
    $path1 = $row1->path;
    $email = $_SESSION['emailUserLogin'];


    $qryStr = "INSERT INTO `cart` (`imagecart`, `namecart`, `pricecart`, `emailcart`, `idcart`, `id`) VALUES ('".$path1."', '".$namee1."', '".$pricee1."', '".$email."', '".$ID1."', '');";

    $rs = $conn->query($qryStr);

}

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





<h1 class="head" >Favorite</h1>

<div class="product_display">
    <table class="product_display_table" border="1">
        <thead >
        <tr>
            <td>Remove</td>
            <td>Prodect image</td>
            <td>Product name</td>
            <td>Unit Price</td>
            <td>Add to cart</td>

        </tr>
        </thead>
        <?php
        $conn = new mysqli('localhost', 'root', '', 'secws');
        $email = $_SESSION['emailUserLogin'];
        $sql = "SELECT * FROM fav WHERE emailfav = '$email'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_object()) {

            ?>

            <tr>
                <td><a href="fav.php ? id=<?php echo $row->id ?>"  class="fas fa-times"></a></td>
                <td><img id="image_cart" src="<?php echo $row->pathfav ?>" alt="Avatar" id="<?php echo $row->idcart; ?>"> </td>
                <td><?php echo $row->namefav; ?></td>
                <td> $ <?php echo $row->pricefav; ?> </td>
                <td><a href="fav.php ? id2=<?php echo $row->idfav ?>">ADD TO CART</a></td>

            </tr>

            <?php

        }
        $conn->close();
        ?>
    </table>

</div>

</body>
</html>

