<?php
include("../config/dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $registration_date = date('Y-m-d');

    $sql = "INSERT INTO treiven_user_accounts (retrieval_id, trv_user_email, trv_user_pwd, trv_user_active, trv_registration_date) VALUES (NULL, NULL, '$email', '$password', 'T', '$registration_date')";
    if (mysqli_query($conn, $sql)) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
