<?php

require_once '../../Controllers/UserController.php';
require_once '../../Models/donor.php';



error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Initialize variables
$errMsg = "";
$successMsg = "";
$userController = new UserController;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];

    $postalCode = $_POST['postalCode'];
    $location = $_POST['location'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    // Determine the selected payment method
    $paymentMethod = $_POST['DonationPayment'];

    // Initialize variables
    $creaditCard = null;
    $expirtDate = null;
    $CCV = null;
    $paypalEmail = null;
    $paypalPassord = null;

    // Based on the selected payment method, set relevant fields
    switch ($paymentMethod) {
        case 'creditCard':
            $creaditCard = $_POST['creaditCard'];
            $expirtDate = $_POST['expirtDate'];
            $CCV = $_POST['CCV'];
            break;
        case 'paypal':
            $paypalEmail = $_POST['paypalEmail'];
            $paypalPassord = $_POST['paypalPassord'];
            break;
        case 'cash':
            // No additional fields needed for cash payment
            break;
        default:
            // Handle default case or throw an error
            break;
    }

    if (empty($name) || empty($email) || empty($amount)) {
        $errMsg = "These fields are required!";
    } else {
        $donor = new Donor();
        $donor->setName($name);
        $donor->setEmail($email);
        $donor->setCity($city);
        if (!empty($phone) && ctype_digit($phone)) {
            $donor->setPhone($phone);
        } else {
            $errMsg = "Please provide a valid phone number.";
        }
        $donor->setLocation($location);
        if (!empty($postalCode) && ctype_digit($postalCode)) {
            $donor->setPostalCode($postalCode);
        } else {
            // Handle the case where the postal code is empty or not a valid integer
            $errMsg = "Please provide a valid postal code.";
        }
        $donor->setAmount($amount);
        $donor->setPaypalEmail($paypalEmail);
        $donor->setPaypalPassord($paypalPassord);
        $donor->setCreaditCard($creaditCard);
        $donor->setExpirtDate($expirtDate);
        $donor->setCCV($CCV);
        $date = date("Y-m-d");
        $donor->setDate($date);
        
        try {
            if ($userController->addDonor($donor)) {
                header("Location: index.php");
                exit;
            } else {
                $errMsg = "Failed to Add Donor info. Please try again.";
            }
        } catch (Exception $e) {
            $errMsg = "Error: " . $e->getMessage();
        }
    }
}


?>



<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Kind Heart Charity - Donation</title>

        <!-- CSS FILES -->        
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/templatemo-kind-heart-charity.css" rel="stylesheet">
<!--

TemplateMo 581 Kind Heart Charity

https://templatemo.com/tm-581-kind-heart-charity

-->
    </head>
    
    <body>

        <header class="site-header">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-8 col-12 d-flex flex-wrap">
                        <p class="d-flex me-4 mb-0">
                            <i class="bi-geo-alt me-2"></i>
                            Akershusstranda 20, 0150 Oslo, Norway
                        </p>

                        <p class="d-flex mb-0">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:info@company.com">
                                info@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-12 ms-auto d-lg-block d-none">
                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-youtube"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </header>

        <nav class="navbar navbar-expand-lg bg-light shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="images/logo.png" class="logo img-fluid" alt="">
                    <span>
                        Kind Heart Charity
                        <small>Non-profit Organization</small>
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_1">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_2">About</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_3">Causes</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="index.php#section_4">Volunteer</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll dropdown-toggle" href="index.php#section_5" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">News</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="news.php">News Listing</a></li>

                                <li><a class="dropdown-item" href="news-detail.php">News Detail</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="contact.php">Contact</a>
                        </li>

                        <li class="nav-item ms-3">
                            <a class="nav-link custom-btn custom-border-btn btn" href="donate.php">Donate</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>

            <section class="donate-section">
                <div class="section-overlay"></div>
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mx-auto">

                            <form class="custom-form donate-form" action="#" method="post" role="form">
                            <?php if ($errMsg != "") { ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <i class="bi bi-exclamation-triangle me-1"></i>
                                        <?php echo $errMsg; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <h3 class="mb-4">Make a donation</h3>

                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <h5 class="mb-3">Donation Frequency</h5>
                                    </div>

                                    <div class="col-lg-6 col-6 form-check-group form-check-group-donation-frequency">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="DonationFrequency" id="DonationFrequencyOne" checked>
                                            
                                            <label class="form-check-label" for="DonationFrequencyOne">
                                                One Time
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-6 form-check-group form-check-group-donation-frequency">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="DonationFrequency" id="DonationFrequencyMonthly">
                                            
                                            <label class="form-check-label" for="DonationFrequencyMonthly">
                                                Monthly
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <h5 class="mt-2 mb-3">Select an amount</h5>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault1" value="10">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                $10
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault2" value="15">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                $15
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault3" value="20">
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                $20
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault4" value="30">
                                            <label class="form-check-label" for="flexRadioDefault4">
                                                $30
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault5" value="45">
                                            <label class="form-check-label" for="flexRadioDefault5">
                                                $45
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 col-6 form-check-group">
                                        <div class="form-check form-check-radio">
                                            <input class="form-check-input" type="radio" name="amount" id="flexRadioDefault6" value="50">
                                            <label class="form-check-label" for="flexRadioDefault6">
                                                $50
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12 form-check-group">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">$</span>
                                            
                                            <input type="text" name="amount" class="form-control" placeholder="Custom amount" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <h5 class="mt-1">Personal Info</h5>
                                    </div>

                                    <div class="col-lg-6 col-12 mt-2">
                                        <input type="text" name="name" id="donation-name" class="form-control" placeholder="Jack Doe" required>
                                    </div>

                                    <div class="col-lg-6 col-12 mt-2">
                                        <input type="email" name="email" id="donation-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Jackdoe@gmail.com" required>
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <h5 class="mt-4 pt-1">Choose Payment</h5>
                                    </div>

                                    <div class="col-lg-12 col-12 mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="DonationPayment" value="creditCard" id="flexRadioDefault9" onclick="showCreditCardForm()">
                                            <label class="form-check-label" for="flexRadioDefault9">
                                                <i class="bi-credit-card custom-icon ms-1"></i>
                                                Debit or Credit card
                                            </label>
                                        </div>
                                    
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="DonationPayment" value="paypal" id="flexRadioDefault10" onclick="showPaypalForm()">
                                            <label class="form-check-label" for="flexRadioDefault10">
                                                <i class="bi-paypal custom-icon ms-1"></i>
                                                Paypal
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="DonationPayment" value="cash" id="flexRadioDefault10" onclick="showcashForm()">
                                            <label class="form-check-label" for="flexRadioDefault10">
                                                <i class="bi-cash custom-icon ms-1"></i>
                                                Cash
                                            </label>
                                        </div>
                                    

                                        
                                            <!-- Credit Card Form Fields -->
                                            <div id="creditCardForm" style="display: none;">
                                                <div class="form-group">
                                                    <label for="creditCardNumber">Credit Card Number</label>
                                                    <input type="text" name="creaditCard" class="form-control" id="creditCardNumber" placeholder="Enter your credit card number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="expiryDate">Expiry Date</label>
                                                    <input type="date" name="expirtDate" class="form-control" id="expiryDate" placeholder="MM/YY">
                                                </div>
                                                <div class="form-group">
                                                    <label for="cvv">CVV</label>
                                                    <input type="text" name="CCV" class="form-control" id="cvv" placeholder="CVV">
                                                </div>
                                            </div>
                                    

                                            <!-- PayPal Form Fields -->
                                            <div id="paypalForm" style="display: none;">
                                                <div class="form-group">
                                                    <label for="paypalEmail">PayPal Email</label>
                                                    <input type="email" name="paypalEmail" class="form-control" id="paypalEmail" placeholder="Enter your PayPal email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="paypalPassword">Password</label>
                                                    <input type="password" name="paypalPassord" class="form-control" id="paypalPassword" placeholder="Enter your PayPal password">
                                                </div>
                                            </div>
                                            <!-- PayPal Form Fields -->
                                            <div id="cashForm" style="display: none;">
                                                <div class="form-group">
                                                    <label for="City">City</label>
                                                    <input type="text" name="city" class="form-control" id="City" placeholder="Enter your City">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Address">Address Line</label>
                                                    <input type="text" name="location" class="form-control" id="Address" placeholder="Enter your Address">
                                                </div>
                                                <div class="form-group">
                                                    <label for="PostalCode<">Postal Code </label>
                                                    <input type="text" name="postalCode" class="form-control" id="PostalCode<" placeholder="Enter your Postal Code">
                                                </div>
                                                <div class="form-group">
                                                    <label for="PhoneNumber">Phone Number</label>
                                                    <input type="text" name="phone" class="form-control" id="PhoneNumber" placeholder="Enter your Phone Number">
                                                </div>
                                            </div>

                                        <button type="submit" class="form-control mt-4">Submit Donation</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-12 mb-4">
                        <img src="images/logo.png" class="logo img-fluid" alt="">
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                        <h5 class="site-footer-title mb-3">Quick Links</h5>

                        <ul class="footer-menu">
                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Our Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Newsroom</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Causes</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Become a volunteer</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Partner with us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 col-12 mx-auto">
                        <h5 class="site-footer-title mb-3">Contact Infomation</h5>

                        <p class="text-white d-flex mb-2">
                            <i class="bi-telephone me-2"></i>

                            <a href="tel: 120-240-9600" class="site-footer-link">
                                120-240-9600
                            </a>
                        </p>

                        <p class="text-white d-flex">
                            <i class="bi-envelope me-2"></i>

                            <a href="mailto:donate@charity.org" class="site-footer-link">
                                donate@charity.org
                            </a>
                        </p>

                        <p class="text-white d-flex mt-3">
                            <i class="bi-geo-alt me-2"></i>
                            Akershusstranda 20, 0150 Oslo, Norway
                        </p>

                        <a href="#" class="custom-btn btn mt-3">Get Direction</a>
                    </div>
                </div>
            </div>

            <div class="site-footer-bottom">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-md-7 col-12">
                            <p class="copyright-text mb-0">Copyright © 2036 <a href="#">Kind Heart</a> Charity Org.
                        	Design: <a href="https://templatemo.com" target="_blank">TemplateMo</a></p>
                        </div>
                        
                        <div class="col-lg-6 col-md-5 col-12 d-flex justify-content-center align-items-center mx-auto">
                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-linkedin"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="https://youtube.com/templatemo" class="social-icon-link bi-youtube"></a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>

        <script>
            function showCreditCardForm() {
                var creditCardForm = document.getElementById("creditCardForm");
                var paypalForm = document.getElementById("paypalForm");
                var cashForm = document.getElementById("cashForm");
        
                creditCardForm.style.display = "block";
                paypalForm.style.display = "none";
                cashForm.style.display = "none";
            }
        
            function showPaypalForm() {
                var creditCardForm = document.getElementById("creditCardForm");
                var paypalForm = document.getElementById("paypalForm");
                var cashForm = document.getElementById("cashForm");
        
                creditCardForm.style.display = "none";
                paypalForm.style.display = "block";
                cashForm.style.display = "none";
            }
            function showcashForm() {
                var creditCardForm = document.getElementById("creditCardForm");
                var paypalForm = document.getElementById("paypalForm");
                var cashForm = document.getElementById("cashForm");
        
                creditCardForm.style.display = "none";
                paypalForm.style.display = "none";
                cashForm.style.display = "block";
            }
        </script>
        <!-- JAVASCRIPT FILES -->

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>