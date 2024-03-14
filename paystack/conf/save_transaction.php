<?php
// Include your database connection logic
require_once 'config.php';

// Check if all required POST parameters are present
if(isset($_POST['matricNumber'], $_POST['amountPaid'], $_POST['paymentStatus'], $_POST['transactionID'])) {
    // Retrieve data from the POST request
    $matricNumber = $_POST['matricNumber'];
    $amountPaid = $_POST['amountPaid'];
    $paymentStatus = $_POST['paymentStatus'];
    $transactionID = $_POST['transactionID'];

    try {
        // Prepare the SQL statement
        $sql = "INSERT INTO transactions (matric_number, amount_paid, payment_status, transaction_id, transaction_date) 
                VALUES (?, ?, ?, ?, NOW())";

        $stmt = $yourDBConnection->prepare($sql);
        
        // Bind parameters
        $stmt->bind_param("ssss", $matricNumber, $amountPaid, $paymentStatus, $transactionID);
        
        // Execute the SQL statement
        if ($stmt->execute()) {
            // Transaction saved successfully
            echo "Transaction saved successfully!";
        } else {
            // Error occurred while saving the transaction
            echo "Error saving transaction: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Handle any exceptions
        echo "Error: " . $e->getMessage();
    }
} else {
    // Return an error response if required parameters are missing
    echo "Error: Required parameters are missing.";
}

// Close the database connection
$yourDBConnection->close();
?>
