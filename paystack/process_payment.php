<?php
// Assuming you have a database connection
$yourDBConnection = mysqli_connect('your_host', 'your_username', 'your_password', 'your_database');

if (!$yourDBConnection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Assuming you have obtained and sanitized user input
$firstname = mysqli_real_escape_string($yourDBConnection, $_POST['firstname']);
$lastname = mysqli_real_escape_string($yourDBConnection, $_POST['lastname']);
$matricNumber = mysqli_real_escape_string($yourDBConnection, $_POST['matric_number']);
$academicLevel = mysqli_real_escape_string($yourDBConnection, $_POST['academic_level']);
$amount = mysqli_real_escape_string($yourDBConnection, $_POST['amount']);
$phonenumber = mysqli_real_escape_string($yourDBConnection, $_POST['phone_number']);
// Save user details to the database
$sqlUserDetails = "INSERT INTO users (firstname, lastname, matric_number, academic_level, phone_number) VALUES ('$firstname', '$lastname' ,'$matricNumber', '$academicLevel', '$phonenumber)";
$resultUserDetails = mysqli_query($yourDBConnection, $sqlUserDetails);

if (!$resultUserDetails) {
    echo "Error saving user details: " . mysqli_error($yourDBConnection);
    mysqli_close($yourDBConnection);
    exit();
}

// Generate a unique reference for the payment
$transactionReference = uniqid('paystack_ref_');

// Close the database connection (temporarily)
mysqli_close($yourDBConnection);

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
                key: 'your_public_key', // Replace with your Paystack public key
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
