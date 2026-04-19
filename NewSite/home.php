<?php
session_start();

$user = null;

if(isset($_SESSION['user_data'])){
$user = $_SESSION['user_data'];
}else{
   header('Location: login.php');
   $_SESSION['error'] = 'You need to Login';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/home.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <style>
    
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="navbar navbar-dark bg-dark px-3 fixed-top">
    <a class="navbar-brand fw-bold" href="#" style="color:black">📘 EduRift</a> <!-- Endless rift of learnings -->
    
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
        <li><a class="dropdown-item" href="#"><?php echo $user['first_name'] ?? '';?></a></li>
        <li><a class="dropdown-item" href="./assets/pages/account_settings.php">Account Settings</a></li>
        <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <h5 class="text-white mb-3">Dashboard</h5>
    <a href="#">🏠 Home</a>
    <a href="#">📚 My Courses</a>
    <a href="#">📊 Progress</a>
    <a href="#">📝 Assignments</a>
    <a href="#">🏆 Certificates</a>
    <a href="#">⚙️ Settings</a>
  </div>

  <!-- MAIN -->
  <div class="main">
    <!-- HERO - Now properly framed -->
    <div class="hero">
      <h2>Welcome Back <?php echo isset($user) ? $user['first_name']." ".$user['last_name'] : ""?>👋</h2>
      <p class="fs-5 mb-0">Continue your learning journey today</p>
    </div>

    <!-- STATS -->
    <div class="row g-3 mb-4">
      <div class="col-md-3 stat-box">
        <div class="card p-3 text-center shadow-sm">
          <h3>6</h3>
          <p>Active Courses</p>
        </div>
      </div>
      <div class="col-md-3 stat-box">
        <div class="card p-3 text-center shadow-sm">
          <h3>78%</h3>
          <p>Average Progress</p>
        </div>
      </div>
      <div class="col-md-3 stat-box">
        <div class="card p-3 text-center shadow-sm">
          <h3>12</h3>
          <p>Assignments</p>
        </div>
      </div>
      <div class="col-md-3 stat-box">
        <div class="card p-3 text-center shadow-sm">
          <h3>3</h3>
          <p>Certificates</p>
        </div>
      </div>
    </div>

    <!-- COURSES -->
    <h4 class="mb-3">📚 My Courses</h4>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card p-3 shadow-sm">
          <h5>Web Development</h5>
          <p>HTML, CSS, JavaScript</p>
          <div class="progress mb-2">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <button class="btn btn-primary btn-sm">Continue</button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3 shadow-sm">
          <h5>Mobile Apps</h5>
          <p>Flutter & React Native</p>
          <div class="progress mb-2">
            <div class="progress-bar bg-success" style="width: 45%"></div>
          </div>
          <button class="btn btn-primary btn-sm">Continue</button>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3 shadow-sm">
          <h5>UI/UX Design</h5>
          <p>Figma & Prototyping</p>
          <div class="progress mb-2">
            <div class="progress-bar bg-warning" style="width: 90%"></div>
          </div>
          <button class="btn btn-primary btn-sm">Continue</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function isInViewport(el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top <= window.innerHeight * 0.85 &&
        rect.bottom >= 0
      );
    }

    function handleScroll() {
      document.querySelectorAll(".card, .stat-box").forEach(el => {
        if (isInViewport(el)) {
          el.classList.add("animate-up");
        }
      });
    }

    window.addEventListener("scroll", handleScroll);
    window.addEventListener("load", handleScroll);
  </script>
</body>
</html>