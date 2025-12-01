
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
    <link rel="stylesheet" href="contactAdmin.css">

</head>
<body onload="first1()">

<header>
    <!-- اسم المحل -->

    <img src="images/Picture1.jpg" alt="logo" width="180px" >

    <!--TAPS-->
    <nav class="tap">
        <a  onclick="setActiveTab(event)"  href="homeadmain.php">HOME</a>
        <a  onclick="setActiveTab(event)" class="active" href="phpshopadmin.php"><B>SHOP</B></a>
        <a onclick="setActiveTab(event)"   href="contactAdmain.php"><B>CONTACT</B></a>
    </nav>
    <!-- ICONS -->
    <div class="icon">

        <i   class="fas fa-bars" id="bars"></i>
        <i onclick="toggleSearch()" class="fas fa-search" id="search-icon"   ></i>
        <a href="fav.php" class="fas fa-heart" ></a>

        <a href="cartadmin.php" class="fas fa-shopping-cart"></a>
        <a href="#" class="fas fa-user" id="userIcon"></a>
        <a href="phpLogin.php" class="fas fa-sign-out-alt"></a>
    </div>



    <div class="search-form" id="search-form">
        <input type="search"  id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>


</header>

<?php
// connect to database
$dbb = new mysqli('localhost', 'root', '', 'secws');
if ($dbb->connect_error) {
    die("Connection failed: " . $dbb->connect_error);
}

// query to select distinct records based on namefav and count occurrences
$sql = "SELECT namefav, pathfav, pricefav, COUNT(*) AS count_fav FROM fav GROUP BY namefav ORDER BY COUNT(*) desc ";
$res = $dbb->query($sql);

if ($res->num_rows > 0) {
    echo '<table class="table-cart">
            <thead>
                <tr>
                    <td>Product image</td>
                    <td>Product name</td>
                    <td>Product price</td>
                    <td>Number of occurrences</td>
                </tr>
            </thead>
            <tbody>';

    while ($row = $res->fetch_assoc()) {
        echo '<tr>
                <td class="centered"><img src="' . $row['pathfav'] . '" alt="Product Image"></td>
                <td class="centered">' . $row['namefav'] . '</td>
                <td class="centered">' . $row['pricefav'] . ' $</td>
                <td class="centered">' . $row['count_fav'] . ' <p style="color: brown; display: inline-block">&#10084;</p> </td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo "0 results";
}

$dbb->close();
?>


<script src="jsShop.js"></script>
<script src="admin.js"></script>
</body>
</html>



<style>
    .table-cart {
        width: 90%; /* تعيين عرض الجدول */
        margin: 100px auto; /* توسيط الجدول بين الهوامش العلوية والسفلية */
        border-collapse: collapse; /* دمج الحدود بين الخلايا */
        border: 2px solid #ddd; /* حدود للجدول */
    }

    .table-cart th, .table-cart td {
        padding: 12px; /* هوامش داخلية للخلايا */
        text-align: center; /* محاذاة النص إلى اليسار */
        border-bottom: 1px solid #ddd; /* حدود سفلية للصفوف */
        font-size: 18px;
    }

    .table-cart thead {
        background-color: #f2f2f2; /* لون خلفية العنوان */
    }

    .table-cart tbody tr:hover {
        background-color: #f5f5f5; /* تغيير لون الخلفية عند التحويم */
    }

    .table-cart img {
        max-width: 100px; /* ضبط أقصى عرض للصورة */
        height: auto; /* الحفاظ على نسبة العرض إلى الارتفاع */
    }



</style>