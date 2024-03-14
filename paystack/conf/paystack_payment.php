<?php
session_start();
require_once 'config.php'; // Ensure this file includes database connection logic

// Retrieve data from session or any storage
$transactionReference = $_SESSION['payment_data']['transactionReference'];
$email = $_SESSION['payment_data']['email'];
$amount = $_SESSION['payment_data']['amount'];
$matricNumber = $_SESSION['payment_data']['matricNumber'];

// Destroy the session data as it's no longer needed

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary meta tags, styles, etc. -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystack Payment</title>
    <!-- Include Paystack Inline JS -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
</head>
<body>
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

                    // Save transaction details to the database
                    var matricNumber = '<?php echo $matricNumber; ?>'; // Echo out PHP variable
                    
                    // Convert JavaScript variables to JSON
                    var jsonData = {
                        matricNumber: matricNumber,
                        amountPaid: amountPaid,
                        paymentStatus: paymentStatus,
                        transactionID: transactionID
                    };
                    
                    // Send the data to the server using AJAX
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "save_transaction.php", true);
                    xhr.setRequestHeader("Content-Type", "application/json");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Handle the response or redirect here
                            alert("Payment successful. Redirecting...");
                            window.location.href = "success_page.php";
                        }
                    };
                    xhr.send(JSON.stringify(jsonData));
                }
            });

            // Open Paystack payment iframe
            handler.openIframe();
        });
    </script>
</body>
</html>
