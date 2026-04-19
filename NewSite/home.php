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
  <nav class="navbar navbar-expand-lg navbar-light lms-topbar fixed-top px-3">
    <div class="container-fluid gap-2">
      <a class="navbar-brand d-flex align-items-center" href="home.php">
        <span class="brand-mark" aria-hidden="true">◆</span>
        MyLMS
      </a>
      <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#lmsTopNav" aria-controls="lmsTopNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="lmsTopNav">
        <form class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center ms-lg-auto gap-2 my-2 my-lg-0 lms-search" role="search">
          <button type="button" class="btn btn-lms-ghost">+ Class code</button>
          <input class="form-control" type="search" placeholder="Search courses…" aria-label="Search courses">
          <button class="btn btn-lms-primary" type="submit">Search</button>
        </form>
        <div class="dropdown ms-lg-3">
          <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">👤<?php echo $user['first_name'] ?? '';?></a>
          <ul class="dropdown-menu dropdown-menu-end">
            
            <li><a class="dropdown-item" href="./assets/pages/account_settings.php">Profile</a></li>
            <li><a class="dropdown-item" href="#">Preferences</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="login.php">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- SIDEBAR -->
  <aside class="sidebar lms-sidebar" aria-label="Primary navigation">
    <p class="sidebar-label">Learn</p>
    <a class="is-active" href="home.php"><span class="nav-ico" aria-hidden="true">⌂</span> Home</a>
    <a href="#"><span class="nav-ico" aria-hidden="true">▤</span> My courses</a>
    <a href="#"><span class="nav-ico" aria-hidden="true">◎</span> Progress</a>
    <a href="#"><span class="nav-ico" aria-hidden="true">✎</span> Assignments</a>
    <a href="#"><span class="nav-ico" aria-hidden="true">★</span> Certificates</a>
    <p class="sidebar-label" style="margin-top:1rem">Account</p>
    <a href="#"><span class="nav-ico" aria-hidden="true">⚙</span> Settings</a>
  </aside>

  <!-- MAIN -->
  <main class="main lms-main">
    <div class="hero lms-hero">
      <h2>Welcome Back <?php echo isset($user) ? $user['first_name']." ".$user['last_name'] : ""?>👋</h2>
      <p>Continue where you left off—your next lesson is a click away.</p>
      <div class="hero-meta">
        <span class="lms-pill">This week: 3 due dates</span>
        <span class="lms-pill">Streak: 5 days</span>
      </div>
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