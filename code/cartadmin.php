
<?php
session_start();
?>
<?php
if(isset($_GET['email'])) {
    $conn = new mysqli('localhost', 'root', '', 'secws');
    $email = $_GET['email'];
    $sql1 = "DELETE FROM `cart` WHERE `emailcart` = '$email'";
    $result1 = $conn->query($sql1);
    $conn->commit();
    $conn->close();
}
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


<table class="table-cart">


    <tbody>
    <?php
    // الاتصال بقاعدة البيانات
    $dbb = new mysqli('localhost', 'root', '', 'secws');

    // التحقق من الاتصال
    if ($dbb->connect_error) {
        die("Connection failed: " . $dbb->connect_error);
    }

    // استعلام SQL لاسترجاع البيانات مرتبة حسب emailcart
    $sql = "SELECT * FROM cart WHERE pay='1' ORDER BY emailcart";
    $res = $dbb->query($sql);

    if ($res->num_rows > 0) {
        $current_email = null; // متغير لتخزين البريد الإلكتروني الحالي

        while ($row = $res->fetch_assoc()) {
            $email = $row['emailcart'];

            // إذا تغير البريد الإلكتروني، أغلق الجدول الحالي وابدأ جدول جديد
            if ($email != $current_email) {
                // إذا كانت هذه ليست المجموعة الأولى، أغلق الجدول السابق
                if ($current_email !== null) {
                    echo "</tbody></table><br>";

                    ?>

                    <a href="cartadmin.php?email=<?php echo $current_email ?>" class="DONE"> DONE ^_^ </a>



                    <?php
                }

                // بدء جدول جديد للمجموعة الجديدة
                echo "<table class='table-cart'>";
                echo "<thead>
                     <tr>
                     <th> $email</th>
                     <th></th>
                     <th></th>
                
                     </tr>
                     </thead>";

                echo "<thead>
                     <tr>
                     <th>Product image</th>
                     <th>Product name</th>
                     <th>Product price</th>
                     </tr>
                     </thead>";

                echo "<tbody>";

                // تحديث البريد الإلكتروني الحالي إلى البريد الإلكتروني الجديد
                $current_email = $email;
            }

            // عرض صف البيانات داخل الجدول
            echo "<tr>";
            echo "<td><img src='" . $row['imagecart'] . "' alt='Product image'></td>";
            echo "<td>" . $row['namecart'] . "</td>";
            echo "<td>" . $row['pricecart'] . " $</td>";
//            echo "<td>" . $email . "</td>";
            echo "</tr>";

        }


        // أغلق الجدول الأخير بعد الانتهاء من الحلقة
        echo "</tbody></table>";
        ?>
        <br>
        <a href="cartadmin.php?email=<?php echo $current_email ?>" class="DONE"> DONE ^_^ </a>


        <?php

    }

    // إغلاق الاتصال بقاعدة البيانات
    $dbb->close();
    ?>

    </tbody>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script src="jsShop.js"></script>
<script src="admin.js"></script>
</body>
</html>

<style>
    .table-cart {
        width: 70%; /* تعيين عرض الجدول */
        margin: 50px auto; /* توسيط الجدول بين الهوامش العلوية والسفلية */
        border-collapse: collapse; /* دمج الحدود بين الخلايا */
        border: 2px solid #ddd; /* حدود للجدول */
    }

    .table-cart th, .table-cart td {
        padding: 12px; /* هوامش داخلية للخلايا */
        text-align: left; /* محاذاة النص إلى اليسار */
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


    .DONE {
        display: block;
        width: 100px;
        height: auto;
        /*margin: 0 auto; !* توسيط الزر في الوسط *!*/
        margin-left: auto;
        margin-right: auto;
        margin-top: -50px;
        padding: 10px;
        background-color: rgba(190, 35, 39, 0.89); /* لون خلفية الزر */
        color: white; /* لون النص */
        font-size: 16px;
        text-align: center;
        border: none;
        cursor: pointer;
        border-radius: 5px; /* زوايا مدورة */
        text-decoration: none; /* إزالة تزيين النص (إذا كان هذا ضروريًا) */
    }

    .DONE:hover {
        background-color:  #BE2327; /* لون خلفية الزر عند تحويم الماوس */
    }
</style>