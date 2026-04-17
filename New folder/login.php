<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
session_start();
require_once "./vendor/autoload.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['signup'])){
            $data = [
                "username" => $_POST["username"],
                "first_name" => $_POST["first_name"] ?? '',
                "last_name" => $_POST["last_name"] ?? '',
                "email" => $_POST["email"] ?? '',
                "password" => $_POST["password"] ?? '',
                "confirm_password" => $_POST["confirm_password"] ?? ''
            ];
    } 

    if(isset($_POST['login'])){
        $data = [
            "user_username" => $_POST["user_username"],
            "user_password" => $_POST["user_password"] ?? ''
        ];
    }
    
    $_SESSION['data'] = $data;  
    
   /*  if ($result['success']) {
        $_SESSION['success'] = "User registered successfully!";
        $_SESSION['user_data'] = $result['data'];
    } else {
        $_SESSION['error'] = implode('<br>', $result['errors']);
    }
     */
    header('Location: dashboard.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

</head>
<style>
 
</style>
<body>
<button><a href="home.html">Home</a></button>
<div class="container">
<input type="checkbox" id="toggle" hidden>

<!-- LOGIN -->
<div class="panel leftPanel">
    <h2>Login</h2>
     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-box">
            <input type="text" name="user_username" required>
            <label>Username</label>
        </div>

        <div class="input-box">
            <input type="password" name="user_password" required>
            <label>Password</label>
        </div>

            <button type="submit" name="login">Login</button>
        <label for="toggle" class="switch">Create account</label>
    </form>
</div>

<!-- CENTER -->
<div class="panel midPanel">
    <h1>Welcome</h1>
    <p>Access your account or create a new one</p>

    <div class="social">
        <i class="fab fa-google"></i>
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-github"></i>
    </div>
</div>

<!-- SIGNUP -->
<div class="panel rightPanel">
    <h2>Sign Up</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="input-box">
            <input type="text" name="username" required>
            <label>Username</label>
        </div>

        <div class="input-box">
            <input type="text" name="first_name" required>
            <label>First Name</label>
        </div>

        <div class="input-box">
            <input type="text" name="last_name" required>
            <label>Last Name</label>
        </div>

        <div class="input-box">
            <input type="email" name="email" required>
            <label>Email</label>
        </div>

        <div class="input-box">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>

        <div class="input-box">
            <input type="password" name="confirm_password" required>
            <label>Confirm Password</label>
        </div>

        <button type="submit" name="signup">Register</button>
        <label for="toggle" class="switch">Already have account?</label>
    </form>
</div>

</div>
</body>
</html>
