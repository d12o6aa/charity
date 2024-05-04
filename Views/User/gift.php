<?php
// Capture gift message from form
$giftMessage = $_POST['gift_message'];

// Process donation and store in database
// Replace this with your actual database code
$donationAmount = $_POST['amount'];
// Assuming you have a function to save donation details
saveDonation($donationAmount, $giftMessage);

// Display confirmation page with gift message
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Confirmation</title>
</head>
<body>
    <h1>Thank You for Your Donation!</h1>
    <p>Your gift message: <?php echo $giftMessage; ?></p>
    <p>We appreciate your generosity.</p>
</body>
</html>
