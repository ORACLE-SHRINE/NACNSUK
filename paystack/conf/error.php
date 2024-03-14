<?php
// success.php

session_start();

// Check if payment data is available in the session
if (isset($_SESSION['payment_data'])) {
    // Retrieve payment data
    $transactionReference = $_SESSION['payment_data']['transactionReference'];
    $email = $_SESSION['payment_data']['email'];
    $matricNumber = $_SESSION['payment_data']['matricNumber'];
    $amount = $_SESSION['payment_data']['amount'];

    // Clear payment data from the session
    unset($_SESSION['payment_data']);
} else {
    // Redirect to an error page or home page if payment data is not available
    header('Location: error.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Unsuccessful</title>
    <!-- Add your CSS styles or include external stylesheets here -->
</head>
<body>
    <div>
        <h1>Payment Failed!</h1>
        <p>Please retry transaction.</p>
        <p>Transaction Reference: <?php echo $transactionReference; ?></p>
        <p>Email: <?php echo $email; ?></p>
        <p>Matric Number: <?php echo $matricNumber; ?></p>
       
        <!-- You can customize this page with additional details or a link to a dashboard, etc. -->
    </div>
    <!-- Add your HTML content or include additional scripts here -->
</body>
</html>
