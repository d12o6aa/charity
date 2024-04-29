<?php

require_once '../../Controllers/NewsControllers.php';
require_once '../../Models/news.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Redirect if user is not logged in
if (!isset($_SESSION["userId"])) {
    header("Location: pages-login.php");
    exit;
}

// Initialize variables
$errMsg = "";
$successMsg = "";
$newscontrollers = new NewsControllers;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate form data
    $date = $_POST['date'];
    $title = $_POST['title'];
    $newsDesc = $_POST['newsDesc'];
    
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
                $news->setDate($date);
                $news->setTitle($title);
                $news->setNewsDesc($newsDesc);
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

<!-- HTML form -->
<form method="post" enctype="multipart/form-data">
    <input type="date" name="date" required><br>
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="newsDesc" placeholder="News Description" required></textarea><br>
    <input type="file" name="img"><br>
    <button type="submit">Submit</button>
</form>

<!-- Display error/success messages -->
<?php if (!empty($errMsg)) : ?>
    <div style="color: red;"><?php echo $errMsg; ?></div>
<?php endif; ?>
<?php if (!empty($successMsg)) : ?>
    <div style="color: green;"><?php echo $successMsg; ?></div>
<?php endif; ?>
