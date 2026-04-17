<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/home.css">
  <style>
    
  </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3 fixed-top">
  <div class="container-fluid">
    <div class="d-flex align-items-center">
      <a class="navbar-brand fw-bold me-3" href="#">📘 MyLMS</a>
      <button class="toggle-btn d-none d-md-block" id="toggleSidebar">☰</button>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navContent">
      <form class="d-flex ms-auto me-lg-3 my-2 my-lg-0">
        <button class="btn btn-outline-light btn-sm me-2 text-nowrap" type="button">+ Class Code</button>
        <input class="form-control me-2 search-input" type="search" placeholder="Search courses...">
        <button class="btn btn-success" type="submit">Search</button>
      </form>

      <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          👤 User
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item text-danger" href="#">Logout</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <h5 class="text-white logo-text mb-0">Dashboard</h5>
  </div>
  <a href="#"><span>🏠</span><span class="link-text ms-3">Home</span></a>
  <a href="#"><span>📚</span><span class="link-text ms-3">My Courses</span></a>
  <a href="#"><span>📊</span><span class="link-text ms-3">Progress</span></a>
  <a href="#"><span>📝</span><span class="link-text ms-3">Assignments</span></a>
  <a href="#"><span>🏆</span><span class="link-text ms-3">Certificates</span></a>
  <a href="#"><span>⚙️</span><span class="link-text ms-3">Settings</span></a>
</div>

<div class="main" id="main">

  <div class="hero">
    <h2>Welcome Back 👋</h2>
    <p class="mb-0">Continue your learning journey today</p>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3 stat-box">
      <div class="card p-3 text-center">
        <h3 class="mb-1">6</h3>
        <p class="text-muted mb-0 small">Active Courses</p>
      </div>
    </div>
    <div class="col-6 col-md-3 stat-box">
      <div class="card p-3 text-center">
        <h3 class="mb-1">78%</h3>
        <p class="text-muted mb-0 small">Avg Progress</p>
      </div>
    </div>
    <div class="col-6 col-md-3 stat-box">
      <div class="card p-3 text-center">
        <h3 class="mb-1">12</h3>
        <p class="text-muted mb-0 small">Assignments</p>
      </div>
    </div>
    <div class="col-6 col-md-3 stat-box">
      <div class="card p-3 text-center">
        <h3 class="mb-1">3</h3>
        <p class="text-muted mb-0 small">Certificates</p>
      </div>
    </div>
  </div>

  <h4 class="mb-3">📚 My Courses</h4>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card p-3">
        <h5>Web Development</h5>
        <p class="text-muted small">HTML, CSS, JavaScript</p>
        <div class="progress mb-3">
          <div class="progress-bar" style="width: 70%"></div>
        </div>
        <button class="btn btn-primary btn-sm w-100">Continue Course</button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3">
        <h5>Mobile Apps</h5>
        <p class="text-muted small">Flutter & React Native</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width: 45%"></div>
        </div>
        <button class="btn btn-primary btn-sm w-100">Continue Course</button>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3">
        <h5>UI/UX Design</h5>
        <p class="text-muted small">Figma & Prototyping</p>
        <div class="progress mb-3">
          <div class="progress-bar bg-warning" style="width: 90%"></div>
        </div>
        <button class="btn btn-primary btn-sm w-100">Continue Course</button>
      </div>
    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Desktop Toggle
  const toggleBtn = document.getElementById("toggleSidebar");
  const sidebar = document.getElementById("sidebar");
  const main = document.getElementById("main");

  toggleBtn?.addEventListener("click", () => {
    sidebar.classList.toggle("collapsed");
    main.classList.toggle("expanded");
  });

  // Mobile Swipe/Click logic
  // Automatically shows content under nav on mobile due to CSS media query margin-left: 0

  // Scroll Animation
  function handleScroll() {
    document.querySelectorAll(".card").forEach(el => {
      const rect = el.getBoundingClientRect();
      if (rect.top <= window.innerHeight * 0.9) {
        el.classList.add("animate-up");
      }
    });
  }

  window.addEventListener("scroll", handleScroll);
  window.addEventListener("load", handleScroll);
</script>

</body>
</html>