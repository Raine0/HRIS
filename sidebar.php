<?php
include "db_conn.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- Boxicons CSS -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  </head>
  <body>
    <nav class="bg-dark">
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name" style="color: #fff;">Human Resource Information System</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-menu menu-icon" style="color: #333;"></i>
          <span class="logo-name"><b>HRIS</b></span>
        </div>
        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="index.php" class="nav-link">
                <i class="bx bx-user-circle icon"></i>
                <span class="link">Profiles</span>
              </a>
            </li>
            <li class="list">
              <a href="insert_profile.php" class="nav-link">
                <i class="bx bx-user-plus icon"></i>
                <span class="link">Add Profiles</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>
    <section class="overlay"></section>
    <script src="sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>