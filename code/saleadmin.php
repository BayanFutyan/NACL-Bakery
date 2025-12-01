
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0 ">
    <title> NACL BAKERY </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="cssHeader.css">
    <link rel="stylesheet" href="sale.css">

</head>
<body>


<header>
    <!-- اسم المحل -->

    <img src="images/Picture1.jpg" alt="logo" width="180px" >

    <!--TAPS-->
    <nav class="tap">
        <a  onclick="setActiveTab(event)"  href="homeadmain.php">HOME</a>
        <a  onclick="setActiveTab(event)" class="active" href="phpShopadmin.php"><B>SHOP</B></a>
        <a onclick="setActiveTab(event)"  href="contactAdmain.php"><B>CONTACT</B></a>
    </nav>
    <!-- ICONS -->
    <div class="icon">
        <i   class="fas fa-bars" id="bars"></i>
        <!--        <i onclick="toggleSearch()" class="fas fa-search" id="search-icon"   ></i>-->
        <a href="favadmin.php" class="fas fa-heart"></a>
        <a href="cartadmin.php" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user" id="userIcon"></a>
        <a href="phpLogin.php" class="fas fa-sign-out-alt" ></a>

    </div>
</header>
<h1> WELCOM IN OUR SALES ^_^</h1>
<a href="phpshopadmin.php" id="add23"> Back to shop </a>

<div class="type">
    <a href="#Sale1" onclick="setActiveNewSale(event, 'sale50')" class="Sale1">50% Sale Off</a>
    <a href="#Sale2" onclick="setActiveNewSale(event, 'sale25')" class="Sale2">25% Sale Off</a>
</div>
</div>

<div class="pppp">
    <section class="prodocts">
        <div class="box-container" id="sale50" style="display: flex;">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'secws');
            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM img WHERE sale50 = '1'";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>">
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <div class="price1"> $<?php echo $row->price*0.5 ; ?></div>
                            <div class="price"> $<?php echo  $row->price; ?></div>

                        </div>
                    </div>
                    <?php
                }
            }
            $conn->close();
            ?>
        </div>

        <div class="box-container" id="sale25" style="display: none;">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'secws');
            if ($conn->connect_error) {
                die("فشل الاتصال: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM img WHERE sale25 = '1'";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_object()) {
                    ?>
                    <div class="box">
                        <div class="image-features">
                            <img src="<?php echo $row->path; ?>" alt="Avatar" id="<?php echo $row->id; ?>">
                        </div>
                        <div class="content-features">
                            <h2><?php echo $row->name; ?></h2>
                            <div class="price1"> $<?php echo $row->price*0.75 ; ?></div>
                            <div class="price"> $<?php echo  $row->price; ?></div>
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



<script src="jsHome.js"></script>
</body>
</html>