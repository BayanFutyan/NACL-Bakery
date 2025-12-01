<?php
session_start();

if (isset($_POST['emailUserLogin']) && isset($_POST['passUserLogin'])) {
    $emali = $_POST['emailUserLogin'];
    $pass = $_POST['passUserLogin'];
    $tag = 1;


    try {
        $db = new mysqli('localhost', 'root', '', 'secws');
        $qryStr = "SELECT * FROM log";
        $res = $db->query($qryStr);

        for ($i = 0; $i < $res->num_rows; $i++) {
            $row = $res->fetch_object();
            if ($row->loginEmail == $emali && $pass == $row->LoginPASS) {

                if($row->loginEmail == "NACLBAKERY@gmail.com"){
                    $_SESSION['emailUserLogin'] = $emali;
                    header('Location: homeadmain.php');
                    exit();
                }
                $_SESSION['emailUserLogin'] = $emali;
                header('Location: phpHome.php');
                exit();
            } else {
                $tag = 0;
            }
        }

        if ($tag == 0) {
            ?>
            <div class="error1">
                <img src="images/warning.png">
                <p>This email or password are not valid <br> Please try again or sign up</p>
            </div>
            <?php
        }

        $db->close();
    } catch (Exception $e) {

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="cssLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<form action="phpLogin.php" method="post">
    <img src="images/user.jpg" alt="user">
    <h2>Login</h2>
    <div class="input-container">
        <input type="email" placeholder="Enter Email" name="emailUserLogin">
        <span id="uu" class="icon"><i class="fas fa-envelope"></i></span>
    </div>
    <div class="input-container">
        <input type="password" placeholder="Enter password" name="passUserLogin" id="password">
        <span id="pp" class="icon"><i class="fas fa-lock"></i></span>
        <span id="togglePassword" class="fas fa-eye" onclick="showPassword()"></span>
    </div>
    <input type="submit" value="Login">
    <a href="phpSignup.php">Sign up</a>
    <p>Forget password ?</p>
</form>

<script>
    function showPassword() {
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        // تبديل نوع الإدخال بين كلمة السر والنص
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        // تبديل أيقونة العين
        togglePassword.classList.toggle('fa-eye');
        togglePassword.classList.toggle('fa-eye-slash');
    }
</script>
<!--<script src="jsLogin.js"></script>-->
</body>
</html>
