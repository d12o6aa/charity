<?php

require_once '../../Controllers/UserController.php';
require_once '../../Models/donor.php';

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}


$usercontroller = new UserController;

$donors = $usercontroller->getDonor();



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  
  <?php  include 'header.php'?>

  <!-- ======= Sidebar ======= -->
  <?php  include 'sidebar.php'?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Donor Table</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">


          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Donor Table</h5>
              <!-- Bordered Table -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Location</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($donors as $donor)
                    {
                      ?>
                        <tr>
                          <th scope="row"> <?php echo $donor['id'] ?> </th>
                          <td><?php echo $donor['name'] ?></td>
                          <td>D<?php echo $donor['email'] ?></td>
                          <td><?php echo $donor['city'] ?></td>
                          <td><?php echo $donor['phone'] ?></td>
                          <td><?php echo $donor['location'] ?></td>
                          <td><?php echo $donor['postalCode'] ?></td>
                          <td><?php echo $donor['amount'] ?></td>
                          <td><?php echo $donor['date'] ?></td>
                        </tr>
                      <?php
                    }
                  ?>
                  
                  
                </tbody>
              </table>
              <!-- End Bordered Table -->
            </div>
          </div>


        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>