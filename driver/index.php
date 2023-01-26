<?php
require_once '../config/config.php';
if (!isset($_SESSION["login"]) && !isset($_SESSION["driver"])) {
  header("Location: ../index.php");
} elseif (empty($_SESSION["driver"])) {
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Dashboard | Ranisa Chicken</title>
  <link rel="shortcut icon" href="images/logo ranisa.webp">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="../assets/style/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/vendor/DataTables/datatables.min.css" />
</head>

<body>
  <?php
  if (isset($_GET["page"])) {
    $page = $_GET["page"];
  }
  ?>
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- sidebar -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="../images/logo ranisa.webp" alt="" class="my-4 w-50" />
        </div>
        <div class="list-group list-group-flush">
          <a href="?page=dashboard" class="list-group-item list-group-item-action<?= $page == 'dashboard' ? ' active' : ''; ?> <?= $page == '' ? ' active' : ''; ?>">
            Dashboard
          </a>
          <a href="?page=pickup" class="list-group-item list-group-item-action<?= $page == 'pickup' ? ' active' : ''; ?> <?= $page == 'pickup-receiver' ? ' active' : ''; ?> <?= $page == 'pickup-details' ? ' active' : ''; ?>">
            Pickup
          </a>
          <a href="?page=logout" class="list-group-item list-group-item-action<?= $page == 'logout' ? ' active' : ''; ?>">
            Sign Out
          </a>
        </div>
      </div>

      <!-- page content -->
      <div id="page-content-wrapper">
        <?php

        if (isset($page)) {
          if ($page == 'dashboard') {
            include 'dashboard-drivers.php';
          } elseif ($page == 'pickup') {
            include 'pickup/dashboard-drivers-pickup.php';
          } elseif ($page == 'pickup-receiver') {
            include 'pickup/dashboard-drivers-receiver.php';
          } elseif ($page == 'pickup-details') {
            include 'pickup/dashboard-drivers-pickup-details.php';
          } elseif ($page == 'logout') {
            include '../logout.php';
          } else {
            echo "Halaman Tidak Ditemukan";
          }
        } else {
          include 'dashboard-drivers.php';
        }


        ?>
      </div>
    </div>
  </div>




  <!-- Bootstrap core JavaScript -->
  <script src="../assets/vendor/jquery/jquery.slim.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace("editor");
  </script>
  <script type="text/javascript" src="../assets/vendor/DataTables/datatables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#table').DataTable();
    });
  </script>
</body>

</html>