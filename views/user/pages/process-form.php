<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $jsonData = file_get_contents("php://input");
    $formData = json_decode($jsonData, true);

    $firstName = $formData['firstName'];
    $lastName = $formData['lastName'];
    $address = $formData['address'];
    $contactNumber = "09" . $formData['contactNumber'];
    $itemNames = @implode(", ", $formData['item_name']);
    $totalQty = array_sum($formData['total_qty']); //I've just add this
    $itemBoxes = @implode(", ", $formData['item_boxes']);
    $totalAmount = array_sum($formData['total_amount']); 

    $mysql_hostname = "localhost";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "im101-pastry";

    $conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $insertQuery = "INSERT INTO treiven_orders (treiven_id, trv_category_name, trv_total_amounts, shipping_address, shipping_method, payment_method, trv_createdAt, trv_item_boxes, trv_customer_name, trv_contact_number, trv_ref_number, trv_order_number, trv_status_id, trv_item_names, trv_total_qty) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);

    $stmt->bind_param(
        "iisssssssssssss", $treiven_id, $trv_category_name, $trv_total_amounts, $shipping_address,
        $shipping_method, $payment_method, $trv_createdAt, $trv_item_boxes, $trv_customer_name,
        $trv_contact_number, $trv_ref_number, $trv_order_number, $trv_status_id, $trv_item_names, $trv_total_qty
    );
    
    $treiven_id = 10;
    $trv_category_name = null;
    $trv_total_amounts = $totalAmount;
    $shipping_address = $address;
    $shipping_method = "COD";
    $payment_method = "COD";
    $trv_createdAt = date("Y-m-d H:i:s");
    $trv_item_boxes = $itemBoxes;
    $trv_customer_name = $firstName . ' ' . $lastName;
    $trv_contact_number = $contactNumber;
    $trv_ref_number = mt_rand(100000, 999999);
    $trv_order_number = mt_rand(100000, 999999);
    $trv_status_id = 1;
    $trv_item_names = $itemNames;
    $trv_total_qty = $totalQty;
    
    $stmt->execute();
    $stmt->close();

    $deleteQuery = "DELETE FROM treiven_cart_items";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Next transaction again with Treiven";
    } else {
        echo "Error deleting values: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    http_response_code(200);
    echo json_encode(["message" => "Form submitted successfully"]);
} else {
    http_response_code(405);
    echo json_encode(["error" => "Method Not Allowed"]);
}
?>
