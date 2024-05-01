<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $product_id = $_POST['trv_product_id'];
    $product_category_id = $_POST['product-category'];
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $product_min_qty = $_POST['product-min-quantity'];
    $product_max_qty = $_POST['product-max-quantity'];
    $product_info = $_POST['product-info'];

    // Check if a new image is uploaded
    if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === UPLOAD_ERR_OK) {
        // File upload path
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);

        // Move uploaded file to destination
        if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $target_file)) {
            $product_image = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    $sql = "UPDATE `treiven_products`
            SET trv_category_id = ?, 
                trv_product_name = ?, 
                trv_product_price = ?, 
                trv_minimum_stock = ?, 
                trv_maximum_stock = ?, 
                trv_product_info = ?, 
                trv_product_image = ? 
            WHERE `treiven_products`.`trv_product_id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isddissi', $product_category_id, $product_name, $product_price, $product_min_qty, $product_max_qty, $product_info, $product_image, $product_id);

    if ($stmt->execute()) {
        echo "GOODS UPDATED";
        var_dump($_POST);
        exit();
    } else {
        // Handle error if update fails
        echo "Error updating product: " . mysqli_error($conn);
    }
}
?>
