<?php

require_once '../../Controllers/NewsControllers.php';
require_once '../../Models/news.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Redirect if user is not logged in
if (!isset($_SESSION["userId"])) {
    header("Location: pages-login.php");
    exit;
}

// Initialize variables
$errMsg = "";
$successMsg = "";
$newscontrollers = new NewsControllers;
$categories = $newscontrollers->getcategories();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate form data
    $date = $_POST['date'];
    $title = $_POST['title'];
    $newsDesc = $_POST['newsDesc'];
    $categorie = $_POST['categories'];
    
    if (empty($date) || empty($title) || empty($newsDesc)) {
        $errMsg = "All fields are required!";
    } else {
        // Handle file upload
        if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES['img']['tmp_name'];
            $img_name = $_FILES['img']['name'];
            $location = "../images/" . date("h-i-s") . $img_name;
            
            if (move_uploaded_file($tmp_name, $location)) {
                // Create News object
                $news = new News;
                // $news->setUserId($_SESSION["userId"]);
                $news->setDate($date);
                $news->setTitle($title);
                $news->setNewsDesc($newsDesc);
                $news->setCategories($categorie);
                $news->setImg($location);
                
                // Add news to database
                try {
                    if ($newscontrollers->addNews($news)) {
                        $successMsg = "News added successfully!";
                        header("Location: index.php");
                        exit;
                    } else {
                        $errMsg = "Failed to add news. Please try again.";
                    }
                } catch (Exception $e) {
                    $errMsg = "Error: " . $e->getMessage();
                }
            } else {
                $errMsg = "Failed to upload image.";
            }
        } else {
            $uploadError = $_FILES['img']['error'];
            if ($uploadError !== UPLOAD_ERR_OK) {
                $errMsg = "Failed to upload image. Error code: $uploadError";
            }

        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
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
      <h1>Form Elements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section ">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Add News</h5>

              <!-- General Form Elements -->
              <form  class="text-center" method="post" enctype="multipart/form-data">
                <?php if ($errMsg != "") { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-1"></i>
                        <?php echo $errMsg; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="row mb-3">
                  <label for="inputTitle" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" class="form-control">
                  </div>
                </div>
                
                
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" name="img" type="file" id="formImage">
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" name ="date" class="form-control">
                  </div>
                </div>

                

                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="newsDesc" style="height: 100px"></textarea>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Categories</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="categories">
                      <option selected>Categories</option>
                        <?php 
                            foreach($categories as $categorie)
                            {
                              ?>
                                <option value="<?php echo $categorie["name"] ?>"><?php echo $categorie["name"] ?></option>
                              <?php
                            }
                        ?>
                    </select>
                  </div>
                </div>
                  
                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

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