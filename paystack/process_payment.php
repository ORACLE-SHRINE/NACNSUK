<?php
// Assuming you have a database connection
$yourDBConnection = mysqli_connect('localhost', 'root', '60813322', 'nacos');

if (!$yourDBConnection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Assuming you have obtained and sanitized user input
$firstname = isset($_POST['firstname']) ? mysqli_real_escape_string($yourDBConnection, $_POST['firstname']) : '';
$lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($yourDBConnection, $_POST['lastname']) : '';
$matricNumber = isset($_POST['matric_number']) ? mysqli_real_escape_string($yourDBConnection, $_POST['matric_number']) : '';
$academicLevel = isset($_POST['academic_level']) ? mysqli_real_escape_string($yourDBConnection, $_POST['academic_level']) : '';
$amount = isset($_POST['amount']) ? mysqli_real_escape_string($yourDBConnection, $_POST['amount']) : 0; // Set a default value if not provided
$phonenumber = isset($_POST['phone_number']) ? mysqli_real_escape_string($yourDBConnection, $_POST['phone_number']) : '';
$email = isset($_POST['email']) ? mysqli_real_escape_string($yourDBConnection, $_POST['email']) : '';
// Check if required fields are not empty
if (empty($firstname) || empty($lastname) || empty($matricNumber) || empty($academicLevel) ||  empty($phonenumber) || empty($email) ) {
    echo "Error: Required fields are empty.";
    mysqli_close($yourDBConnection);
    exit();
}

// Save user details to the database using prepared statement
$sqlUserDetails = "INSERT INTO users (firstname, lastname, matric_number, academic_level, phone_number, email) VALUES (?, ?, ?, ?, ?, ?)";
$stmtUserDetails = mysqli_prepare($yourDBConnection, $sqlUserDetails);
mysqli_stmt_bind_param($stmtUserDetails, "sssiss", $firstname, $lastname, $matricNumber, $academicLevel, $phonenumber, $email);
$resultUserDetails = mysqli_stmt_execute($stmtUserDetails);

if (!$resultUserDetails) {
    echo "Error saving user details: " . mysqli_error($yourDBConnection);
    mysqli_close($yourDBConnection);
    exit();
}



// Generate a unique reference for the payment
$transactionReference = uniqid('paystack_ref_');

// Close the database connection (temporarily)

// Continue with the Paystack payment initiation logic
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystack Payment</title>
</head>
<body>
    <!-- Include Paystack Inline JS -->
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Paystack payment
            var handler = PaystackPop.setup({
                key: 'pk_test_db74d1cc3b27b4a3d2f6e3923867f99cf20468ab', // Replace with your Paystack public key
                email: '<?php echo $email; ?>', // Assuming you have user's email
                amount: <?php echo $amount * 100; ?>, // Amount in kobo
                currency: 'NGN',
                ref: '<?php echo $transactionReference; ?>', // Unique reference
                onClose: function(){
                    // Handle payment window closure
                    alert('Payment window closed.');
                },
                callback: function(response){
                    // Handle successful payment callback
                    var transactionID = response.reference;
                    var amountPaid = response.amount / 100; // Convert amount back to Naira
                    var paymentStatus = response.status;

                    // Reconnect to the database
                    var reconnectDB = <?php echo json_encode(mysqli_connect('localhost', 'root', '60813322', 'nacos')); ?>;
                    if (reconnectDB) {
                        // Save transaction details to the database
                        var sqlTransactionDetails = "INSERT INTO transactions (user_id, amount_paid, payment_status, reference_code, transaction_date) VALUES ((SELECT user_id FROM users WHERE matric_number = '<?php echo $matricNumber; ?>'), '" + amountPaid + "', '" + paymentStatus + "', '" + transactionID + "', NOW())";
                        var resultTransactionDetails = mysqli_query(reconnectDB, sqlTransactionDetails);

                        if (!resultTransactionDetails) {
                            alert("Error saving transaction details: " + mysqli_error(reconnectDB));
                        }

                        // Save selected items to the database
                        <?php
                        if (isset($_POST['items']) && is_array($_POST['items'])) {
                            foreach ($_POST['items'] as $selectedItem) {
                                $sqlInsertItem = "INSERT INTO selected_items (user_id, item) VALUES ((SELECT user_id FROM users WHERE matric_number = '$matricNumber'), '$selectedItem')";
                                $resultInsertItem = mysqli_query(reconnectDB, $sqlInsertItem);

                                if (!$resultInsertItem) {
                                    alert("Error saving selected item: " . mysqli_error(reconnectDB));
                                }
                            }
                        }
                        ?>

                        // Close the database connection
                        mysqli_close(reconnectDB);

                        // Redirect user or display a success message
                        alert("Payment successful. Redirect or display success message.");
                    } else {
                        alert("Error reconnecting to the database.");
                    }
                }
            });

            // Open Paystack payment iframe
            handler.openIframe();
        });
    </script>
</body>
</html>
