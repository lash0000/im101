<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['delete_product_id']);
    $delete_query = "DELETE FROM treiven_products WHERE trv_product_id = '$product_id'";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: product-manage.php");
        exit;
    } else {
        echo '<div class="product-added-error">
                Unable to delete the item.
            </div>';
    }
}
?>
