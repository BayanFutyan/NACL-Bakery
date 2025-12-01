<?php
if(isset($_POST['Email']) && isset($_POST['passUserLogin']) && isset($_POST['phone']) && isset($_POST['User-Name'])){
    $email = $_POST['Email'];
    $pass = $_POST['passUserLogin'];
    $phone = $_POST['phone'];
    $userName = $_POST['User-Name'];
    $location = $_POST['location'];

    try {
        $db = new mysqli('localhost', 'root', '', 'secws');
        if ($db->connect_error) {
            throw new Exception("Connection failed: " . $db->connect_error);
        }

        $qryStr = $db->prepare("INSERT INTO `log` (`loginEmail`, `LoginPASS`, `UserLevel`, `LastLogin`, `phonenumber`, `location`, `username`) VALUES (?, ?, '0', '', ?, ?, ?)");
        $qryStr->bind_param('sssss', $email, $pass, $phone, $location, $userName);

        if ($qryStr->execute()) {
            header('Location: phpLogin.php');
        } else {
            echo "This Email is used, choose another";
        }

        $qryStr->close();
        $db->close();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="cssSignup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<form action="phpSignup.php" method="post">
    <img src="images/user.jpg" alt="user">
    <h2>Signup</h2>

    <div class="input-container">
        <input type="email" placeholder="Enter Email" name="Email" required>
        <span id="i1" class="icon"><i class="fas fa-envelope"></i></span>
    </div>

    <div class="input-container">
        <input type="password" placeholder="Enter password" name="passUserLogin" id="password" required>
        <span id="i2" class="icon"><i class="fas fa-lock"></i></span>
        <span id="togglePassword" class="fas fa-eye" onclick="showPassword()"></span>
    </div>

    <div class="input-container">
        <input type="text" placeholder="User Name" name="User-Name" id="user" required>
        <span id="i3" class="icon"><i class="fas fa-user"></i></span>
    </div>

    <div class="input-container">
        <input type="text" id="location" placeholder="Enter your location" name="location" required>
        <span id="i4" class="icon"><i class="fas fa-map-marker-alt"></i></span>
    </div>

    <div class="input-container">
        <input type="text" id="phone" placeholder="Enter your phone number" name="phone" required>
        <span id="i5" class="icon"><i class="fas fa-phone"></i></span>
    </div>
    <input type="submit" value="Signup">
    <a href="phpLogin.php">Login</a>
</form>

<script>
    function showPassword() {
        const password = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        togglePassword.classList.toggle('fa-eye');
        togglePassword.classList.toggle('fa-eye-slash');
    }
</script>
</body>
</html>
