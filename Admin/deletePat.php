<?php 
include("conn.php");

// Get the ID from the query string and validate it
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Prepare the DELETE statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM `ppatients` WHERE patient_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Optionally, you can add a success message or perform a check here
        header("Location: view-patient.php?message=Item deleted successfully");
    } else {
        // Optionally, you can redirect with an error message
        header("Location: view-patient.php?error=Could not delete item");
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If the ID is invalid or missing, redirect to the cart with an error message
    header("Location: view-patient.php?error=Invalid item ID");
}
?>
