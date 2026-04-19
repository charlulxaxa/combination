<?php
session_start();
if(!isset($_SESSION["user_data"])){
  header('Location: ../../logout.php');
  exit();
  return;
}

$user = $_SESSION['user_data'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <style>
        .sidebar a.active{
            background-color: grey;
            color: white;
        }
        
        .dropdown-menu li:nth-child(2) a{
            background-color: grey;
        }
        .dropdown-menu li:nth-child(2) a:hover{
            background-color: grey;
            color:black;
        }
    </style>
</head>

<body>
    
    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-dark px-3 fixed-top">
        <a class="navbar-brand fw-bold" href="../../home.php" style="color:black">📘 EduRift</a> <!-- Endless rift of learnings -->

        <form class="d-flex ms-auto">
            <button style="text-wrap:nowrap;">+Class Code</button>  
            <input class="form-control me-2" type="search" placeholder="Search courses...">
            <button class="btn btn-success">Search</button>

        </form>
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle text-center justify-content-center align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                👤
            </a>

            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><?php echo $user['first_name'];?></a></li>
                <li><a class="dropdown-item" href="#">Account Details</a></li>
                <li><a class="dropdown-item" href="../../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    <!-- SIDEBAR -->
    <div class="sidebar">
        <h5 class="text-white mb-3">Dashboard</h5>
        <a href="#" >Account Details</a>
        <a href="#">Terms and Condition</a>
        <a href="#">Preferences</a>
    </div>

    <!-- MAIN -->
    <div class="main">
        <!-- HERO - Now properly framed -->
        <div class="hero">
            <h2>Account Details👋</h2>
        </div>
    </div>
    <script> 
        const links = document.querySelectorAll('.sidebar a');

        links.forEach(link => {
            link.addEventListener('click', function() {
                links.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

</body>
</html>