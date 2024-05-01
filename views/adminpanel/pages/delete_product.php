<!-- inside the delete_product_php -->

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

    // Delete associated records in treiven_cart_items table
    $delete_cart_items_query = "DELETE FROM treiven_cart_items WHERE trv_product_id = '$product_id'";
    mysqli_query($conn, $delete_cart_items_query);

    // Then, delete the product from treiven_products table
    $delete_query = "DELETE FROM treiven_products WHERE trv_product_id = '$product_id'";

    if (mysqli_query($conn, $delete_query)) {
        echo 'OK that item got deleted.';
        header("Refresh: 2; URL=product-manage.php");
        exit;
    } else {
        echo '<div class="product-added-error">
                Unable to delete the item.
            </div>';
    }
}

?>