<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'conf/config.php'; // Include your database connection logic

// Collect user details
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$matricNumber = filter_input(INPUT_POST, 'matric_number', FILTER_SANITIZE_SPECIAL_CHARS);
$phoneNumber = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_SPECIAL_CHARS);
$academiclevel = filter_input(INPUT_POST, 'academic_level', FILTER_SANITIZE_SPECIAL_CHARS);


$items = $_POST['items'] ?? [];
$totalAmount = 0;

// Define the prices for each item
$itemPrices = [
    'tshirt' => 3200.00,
    'idcard' => 1500.00,
    'both' => 4800.00,
];

// Sum up the prices for selected items
foreach ($items as $item) {
    if (isset($itemPrices[$item])) {
        $totalAmount += $itemPrices[$item];
    }
}

// Validate the email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Error: Invalid email address.";
    exit();
}


// Save user details to the database
$sqlUserDetails = "INSERT INTO users (firstname, lastname, matric_number, academic_level, phone_number, email) VALUES (?, ?, ?, ?, ?, ?)";
$stmtUserDetails = mysqli_prepare($yourDBConnection, $sqlUserDetails);
mysqli_stmt_bind_param($stmtUserDetails, "sssiss", $firstname, $lastname, $matricNumber, $academiclevel, $phoneNumber, $email);
$resultUserDetails = mysqli_stmt_execute($stmtUserDetails);

if (!$resultUserDetails) {
    echo "Error saving user details: " . mysqli_error($yourDBConnection);
    mysqli_close($yourDBConnection);
    exit();
}

// Generate a unique reference for the payment
$transactionReference = uniqid('paystack_ref_');

// Store necessary data in session for later use
$_SESSION['payment_data'] = [
    'transactionReference' => $transactionReference,
    'email' => $email,
    'matricNumber' => $matricNumber,
    'amount' => $totalAmount,  // Use the calculated total amount
];

// Redirect user to Paystack payment page
header('Location: conf/paystack_payment.php');
exit();
?>
