<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$orders = [];
$orderDetails = []; // Initialize orderDetails array

$selectQuery = "SELECT trv_order_id, trv_total_amounts, shipping_address, treiven_id, trv_order_number, trv_ref_number, trv_customer_name, trv_contact_number, trv_total_qty, trv_createdAt FROM treiven_orders";
$result = mysqli_query($conn, $selectQuery);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $orders[] = $row;
    }
    mysqli_free_result($result);
} else {
    echo "Error fetching orders: " . mysqli_error($conn);
}

// Check if trv_order_id is set
if (isset($_GET['trv_order_id'])) {
    $trv_order_id = mysqli_real_escape_string($conn, $_GET['trv_order_id']);

    // Fetch order details for the specified trv_order_id
    $selectQuery = "SELECT trv_order_id, trv_total_amounts, shipping_address, treiven_id, trv_order_number, trv_ref_number, trv_customer_name, trv_contact_number, trv_total_qty, trv_createdAt FROM treiven_orders WHERE trv_order_id = $trv_order_id";
    $result = mysqli_query($conn, $selectQuery);

    if ($result) {
        // Check if any row is fetched
        if (mysqli_num_rows($result) > 0) {
            $orderDetails = mysqli_fetch_assoc($result);
        } else {
            echo "Order not found";
        }
        mysqli_free_result($result);
    } else {
        echo "Error fetching order details: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../views/modules/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../public/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../public/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../../public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <title>Treiven - Order Management</title>
</head>

<body>
    <main class="product-manage-page">
        <div class="product-manage-wrapper">
            <header class="manage-head">
                <div class="left-head">
                    <span>Ordering List</span>
                </div>
                <div class="right-head">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <title>sliders</title>
                        <g fill="#212121" class="nc-icon-wrapper">
                            <line x1="13.25" y1="5.25" x2="16.25" y2="5.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                            <line x1="1.75" y1="5.25" x2="8.75" y2="5.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                            <circle cx="11" cy="5.25" r="2.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                            <line x1="4.75" y1="12.75" x2="1.75" y2="12.75" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <line x1="16.25" y1="12.75" x2="9.25" y2="12.75" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <circle cx="7" cy="12.75" r="2.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></circle>
                        </g>
                    </svg>
                </div>
            </header>
            <section class="product-items-wrapper">
                <?php foreach ($orders as $order) : ?>
                    <div class="product-item">
                        <div class="product-left-side">
                            <div class="product-hero">
                                <img src="../../../public/chad.PNG" alt="" />
                            </div>
                            <div class="product-first-detail">
                                <span>Order Item <?php echo $order['trv_order_id']; ?></span>
                                <p style="color: #A6A6A6;">Total_QTY: <?php echo $order['trv_total_qty']; ?> (Ordered by user_id: <?php echo $order['treiven_id']; ?>)</p>
                                <p>Total Amount: ₱<?php echo $order['trv_total_amounts']; ?> (no discount)</p>
                            </div>
                        </div>
                        <div class="product-right-side">
                            <span>Status: Order recieved...</span>
                            <button class="view-item" style="color: black;">
                                View Item
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <div class="admin-session-wrapper">
                <a class="admin-session admin-option" href="../index.php">
                    options
                </a>
                <div class="admin-session">
                    log out
                </div>
            </div>
        </div>
    </main>

    <!-- View Modal -->
    <div class="view-item-wrapper" style="opacity: 0; pointer-events: none;">
        <div class="view-item-container">
            <header class="view-item-header">
                <div class="view-item-detail">
                    <span>View Item</span>
                    <p>Here are the following details.</p>
                </div>
                <div class="order-close-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" class="close-icon">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <line x1="14" y1="4" x2="4" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <line x1="4" y1="4" x2="14" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                        </g>
                    </svg>
                </div>
            </header>
            <ul class="view-details">
                <li class="generated-number">
                    <span>Order number</span>
                    <p style="color: #8e8e8e;"><?php echo isset($orderDetails['trv_order_number']) ? '#' . $orderDetails['trv_order_number'] : ''; ?></p>
                </li>
                <li class="generated-number">
                    <span>Reference tracking number</span>
                    <p style="color: #8e8e8e;"><?php echo isset($orderDetails['trv_ref_number']) ? '#' . $orderDetails['trv_ref_number'] : ''; ?></p>
                </li>
                <li class="generated-number">
                    <span>Customer's Name</span>
                    <p style="color: #8e8e8e;"><?php echo isset($orderDetails['trv_customer_name']) ? $orderDetails['trv_customer_name'] : ''; ?></p>
                </li>
                <li class="generated-number">
                    <span>Customer's Address</span>
                    <p style="color: #8e8e8e;"><?php echo isset($orderDetails['shipping_address']) ? $orderDetails['shipping_address'] : ''; ?></p>
                </li>
                <li class="generated-number">
                    <span>Customer's Phone Number</span>
                    <p style="color: #8e8e8e;"><?php echo isset($orderDetails['trv_contact_number']) ? $orderDetails['trv_contact_number'] : ''; ?></p>
                </li>
                <li class="generated-number">
                    <span>Date ordered</span>
                    <p style="color: #8e8e8e;"><?php echo isset($orderDetails['trv_createdAt']) ? date('d/m/Y \a\t H:i:s', strtotime($orderDetails['trv_createdAt'])) : ''; ?></p>
                </li>
            </ul>
            <div class="view-item-options">
                <a class="update-item">
                    <button>Update Item</button>
                </a>
                <a class="view-cancel">
                    <button>Cancel</button>
                </a>
            </div>
        </div>
    </div>



    <!-- Another Modal lool -->

    <div class="update-item-wrapper" style="pointer-events: none; opacity: 0;">
        <div class="update-item-container">
            <header class="view-item-header">
                <div class="view-item-detail">
                    <span>Update Item</span>
                    <p>Tell us what's going in...</p>
                </div>
                <div class="order-close-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" class="close-icon">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <line x1="14" y1="4" x2="4" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <line x1="4" y1="4" x2="14" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                        </g>
                    </svg>
                </div>
            </header>
            <form class="view-details">
                <div class="view-form-group">
                    <label for="order-status">Order Status</label>
                    <select id="order-status" name="order-status" required>
                        <option value="order-recieved">Order recieved</option>
                        <option value="wait-shipping">Waiting to be shipped</option>
                        <option value="delivery">Delivery</option>
                        <option value="item-recieved">Item recieved</option>
                    </select>
                </div>
                <div class="view-form-group">
                    <label for="order-status">Ready to ship?</label>
                    <select id="order-status" name="order-status" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="view-item-options">
                    <a href="" class="update-item">
                        <button>Proceed</button>
                    </a>
                    <a href="" class="update-item-cancel">
                        <button>Cancel</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const viewItemButtons = document.querySelectorAll(".view-item");
            const closeIcons = document.querySelectorAll(".close-icon");
            const updateButton = document.querySelector(".update-item");
            const viewCancelButton = document.querySelectorAll(".view-cancel");
            const updateCancelButton = document.querySelector(".update-item-cancel");

            const viewItemWrapper = document.querySelector(".view-item-wrapper");
            const updateItemWrapper = document.querySelector(".update-item-wrapper");

            function toggleModal(modalWrapper) {
                const modalOpacity = modalWrapper.style.opacity === "0" ? "1" : "0";
                const modalPointerEvents = modalWrapper.style.pointerEvents === "none" ? "auto" : "none";

                gsap.to(modalWrapper, {
                    duration: 0.2,
                    pointerEvents: modalPointerEvents,
                    opacity: modalOpacity
                });
            }

            viewItemButtons.forEach(function(viewItemButton) {
                viewItemButton.addEventListener("click", function() {
                    toggleModal(viewItemWrapper);
                });
            });

            closeIcons.forEach(function(closeIcon) {
                closeIcon.addEventListener("click", function() {
                    const modalWrapper = closeIcon.closest('.view-item-wrapper') || closeIcon.closest('.update-item-wrapper');
                    toggleModal(modalWrapper);
                });
            });

            updateButton.addEventListener("click", function() {
                toggleModal(updateItemWrapper);
                toggleModal(viewItemWrapper);
            });

            viewCancelButton.forEach(function(button) {
                button.addEventListener("click", function() {
                    toggleModal(viewItemWrapper);
                });
            });

            updateCancelButton.addEventListener("click", function(event) {
                event.preventDefault();
                toggleModal(updateItemWrapper);

                const form = updateItemWrapper.querySelector("form");
                form.reset();
            });
        });
    </script>

</body>

</html>