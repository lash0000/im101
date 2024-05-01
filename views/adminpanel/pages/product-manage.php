<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$product_name = '';
$product_price = '';
$product_min_qty = '';
$product_max_qty = '';
$product_qty_stock = '';
$product_info = '';
$category_name = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if it's an edit request
    if (isset($_POST['edit_product'])) {
        // Retrieve form data
        $product_id = $_POST['trv_product_id'];
        $product_category_id = $_POST['product-category'];
        $product_name = $_POST['product-name'];
        $product_price = $_POST['product-price'];
        $product_min_qty = $_POST['product-min-quantity'];
        $product_max_qty = $_POST['product-max-quantity'];
        $product_info = $_POST['product-info'];

        // Update product in database
        $sql = "UPDATE `treiven_products`
                SET trv_category_id = ?, 
                    trv_product_name = ?, 
                    trv_product_price = ?, 
                    trv_minimum_stock = ?, 
                    trv_maximum_stock = ?, 
                    trv_product_info = ?
                WHERE trv_product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isddisi', $product_category_id, $product_name, $product_price, $product_min_qty, $product_max_qty, $product_info, $product_id);

        if ($stmt->execute()) {
            echo "Product updated successfully!";
            // Redirect to prevent form resubmission
            header("Location: product-manage.php?trv_product_id=$product_id");
            exit();
        } else {
            echo "Error updating product: " . mysqli_error($conn);
        }
    }
}

// Check if trv_product_id is provided
if (isset($_GET['trv_product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['trv_product_id']);
    
    // Fetch product details from the database
    $sql = "SELECT * FROM treiven_products WHERE trv_product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        // Assign retrieved values to variables
        $product_name = $product['trv_product_name'];
        $product_price = $product['trv_product_price'];
        $product_min_qty = $product['trv_minimum_stock'];
        $product_max_qty = $product['trv_maximum_stock'];
        $product_info = $product['trv_product_info'];
        $product_category_id = $product['trv_category_id'];
        $product_image = $product['trv_product_image'];
    } else {
        echo "Product not found!";
    }
}

//ADD FUNCTION BTCH!!

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_category_id = isset($_POST['product-category']) ? $_POST['product-category'] : 0;
    $product_name = isset($_POST['product-name']) ? mysqli_real_escape_string($conn, $_POST['product-name']) : '';
    $product_price = isset($_POST['product-price']) ? $_POST['product-price'] : 0;
    $product_min_qty = isset($_POST['product-min-quantity']) ? $_POST['product-min-quantity'] : 0;
    $product_max_qty = isset($_POST['product-max-quantity']) ? $_POST['product-max-quantity'] : 0;
    $product_available = isset($_POST['product-available']) ? $_POST['product-available'] : '';
    $product_info = isset($_POST['product-info']) ? mysqli_real_escape_string($conn, $_POST['product-info']) : '';

    $targetDir = "uploads/";
    $fileName = basename($_FILES["fileInput"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["fileInput"]["tmp_name"], $targetFilePath)) {
            $category_sql = "SELECT trv_category_name FROM treiven_category WHERE trv_category_id = '$product_category_id'";
            $category_result = mysqli_query($conn, $category_sql);
            $category_row = mysqli_fetch_assoc($category_result);
            $product_category_name = $category_row ? $category_row['trv_category_name'] : '';

            $sql = "INSERT INTO treiven_products (trv_category_id, trv_category_name, trv_product_name, trv_product_price, trv_minimum_stock, trv_maximum_stock, trv_product_qty_stock, trv_product_info, trv_product_image) 
            VALUES ('$product_category_id', '$product_category_name', '$product_name', '$product_price', '$product_min_qty', '$product_max_qty', '$product_available', '$product_info', '$fileName')";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="product-added-success">
                    The item has been added successfully!
                </div>';
            } else {
                echo '<div class="product-added-error">
                    Error: Unable to add the item. Please try again later.
                </div>';
            }
        } else {
            echo '<div class="product-added-error">
                Sorry, there was an error uploading your file.
            </div>';
        }
    } else {
        echo '<div class="product-added-error">
            Sorry, only JPG, JPEG, PNG & GIF files are allowed.
        </div>';
    }
} else if (isset($_GET['trv_product_id'])) {
    $product_id = mysqli_real_escape_string($conn, $_GET['trv_product_id']);
    $sql = "SELECT trv_category_name FROM treiven_products WHERE trv_product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $category_name = $row['trv_category_name'];
    } else {
        echo "Product not found!";
    }
}

// Display my products (MY DELETE FUNCTIONALITY CAN BE FIND DIFFERENTLY LOOOL)...
$query = "SELECT p.trv_product_id, p.trv_product_image, p.trv_product_name, c.trv_category_name, p.trv_product_price, p.trv_minimum_stock, p.trv_maximum_stock FROM treiven_products p INNER JOIN treiven_category c ON p.trv_category_id = c.trv_category_id";
$result = mysqli_query($conn, $query);

$products = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}

//For edit what???
$product_id = isset($product['trv_product_id']) ? $product['trv_product_id'] : '';
$product_name = isset($product['trv_product_name']) ? $product['trv_product_name'] : '';
$product_price = isset($product['trv_product_price']) ? $product['trv_product_price'] : '';
$product_min_qty = isset($product['trv_minimum_stock']) ? $product['trv_minimum_stock'] : '';
$product_max_qty = isset($product['trv_maximum_stock']) ? $product['trv_maximum_stock'] : '';
$product_info = isset($product['trv_product_info']) ? $product['trv_product_info'] : '';
$product_category_id = isset($product['trv_category_id']) ? $product['trv_category_id'] : '';
$product_image = isset($product['trv_product_image']) ? $product['trv_product_image'] : '';
$product_available = '';

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
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
    <title>Treiven - Product Management</title>
</head>

<body>
    <main class="product-manage-page">
        <div class="product-manage-wrapper">
            <header class="manage-head">
                <div class="left-head">
                    <span>Product List</span>
                </div>
                <div class="right-head">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <title>Create / Add New Item</title>
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M13.25,2H4.75c-1.517,0-2.75,1.233-2.75,2.75V13.25c0,1.517,1.233,2.75,2.75,2.75H13.25c1.517,0,2.75-1.233,2.75-2.75V4.75c0-1.517-1.233-2.75-2.75-2.75Zm-1,7.75h-2.5v2.5c0,.414-.336,.75-.75,.75s-.75-.336-.75-.75v-2.5h-2.5c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h2.5v-2.5c0-.414,.336-.75,.75-.75s.75,.336,.75,.75v2.5h2.5c.414,0,.75,.336,.75,.75s-.336,.75-.75,.75Z" fill="#212121"></path>
                        </g>
                    </svg>
                </div>
            </header>
            <section class="product-items-wrapper">
                <?php foreach ($products as $product) : ?>
                    <div class="product-item">
                        <div class="product-left-side">
                            <div class="product-hero">
                                <img src="./uploads/<?= $product['trv_product_image'] ?>" alt="" />
                            </div>
                            <div class="product-first-detail">
                                <span><?= $product['trv_product_name'] ?></span>
                                <p style="color: #A6A6A6;">Category / <?= $product['trv_category_name'] ?> / Item ID: <?= $product['trv_product_id'] ?></p>
                                <div class="product-flex">
                                    <p>Price: ₱<?= $product['trv_product_price'] ?></p>
                                    <p>Min Stock: <?= $product['trv_minimum_stock'] ?></p>
                                    <p>Max Stock: <?= $product['trv_maximum_stock'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="product-right-side">
                            <button class="edit-item">
                                Edit Item
                            </button>
                            <button class="delete-item" data-product-id="<?= $product['trv_product_id'] ?>">
                                Delete Item
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
            <div class="admin-session-wrapper">
                <a class="admin-session admin-option" href="../index.php">
                    options
                </a>
                <a class="admin-session" href="../../client/login/index.php">
                    log out
                </a>
            </div>
        </div>
    </main>

    <!-- confirmation modal to delete -->
    <div class="modal-container" id="delete-confirm" style="display: none; opacity: 0;">
        <div class="modal-wrapper">
            <header class="header-modal">
                <span>Delete Item</span>
                <button class="material-symbols-outlined" id="close-modal">
                    close
                </button>
            </header>
            <main class="header-body">
                <label id="modal-label">Are you sure? You're about to delete this item?</label>
            </main>
            <div class="header-options">
                <form action="delete_product.php" method="post">
                    <input type="hidden" name="delete_product_id" id="delete_product_id" value="">
                    <button id="submit-modal" class="proceed-active" type="submit">Proceed</button>
                </form>
                <button id="close-modal">Cancel</button>
            </div>
        </div>
    </div>

    <!-- Create / Add item modal -->
    <div class="create-item-wrapper" style="pointer-events: none; opacity: 0;">
        <div class="create-item-container">
            <div class="left-align">
                <header class="create-item-header">
                    <span>Create / Add New Item</span>
                    <p>Provide the input needed below...</p>
                </header>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-create" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="trv_product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                    <div class="form-create-group">
                        <label for="product-category">Product Category</label>
                        <select id="product-category" name="product-category">
                            <option>Please specify:</option>
                            <option value="1">Brownies</option>
                            <option value="2">Cakes</option>
                            <option value="3">Cookies</option>
                            <option value="4">Specials</option>
                        </select>
                    </div>
                    <div class="form-create-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" name="product-name" value="<?php echo $product_name; ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-price">Product Price</label>
                        <input type="number" id="product-price" name="product-price" step="0.01" value="<?php echo $product_price; ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-min-quantity">Product Quantity / Minimum Stocks</label>
                        <input type="number" id="product-min-quantity" name="product-min-quantity" value="<?php echo $product_min_qty; ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-max-quantity">Product Quantity / Maximum Stocks</label>
                        <input type="number" id="product-max-quantity" name="product-max-quantity" value="<?php echo $product_max_qty; ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label>Is the product still had some or had many stocks?</label>
                        <div class="">
                            <input type="radio" id="product-available-yes" name="product-available" value="yes" <?php if ($product_qty_stock == 'yes') echo 'checked'; ?> required>
                            <label for="product-available-yes">Yes</label>
                        </div>
                        <div class="m">
                            <input type="radio" id="product-available-no" name="product-available" value="no" <?php if ($product_qty_stock == 'no') echo 'checked'; ?> required>
                            <label for="product-available-no">No</label>
                        </div>
                    </div>
                    <div class="form-create-group">
                        <label for="product-info">Product Information</label>
                        <textarea id="product-info" name="product-info" maxlength="4000" required><?php echo $product_info; ?></textarea>
                    </div>
                    <button type="submit">Submit</button>
            </div>
            <div class="right-align">
                <div class="close-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <line x1="14" y1="4" x2="4" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <line x1="4" y1="4" x2="14" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                        </g>
                    </svg>
                </div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M13.194,8.384c-1.072-1.072-2.816-1.072-3.889,0L3.196,14.494c.367,.457,.923,.756,1.554,.756H13.25c1.105,0,2-.896,2-2v-2.811l-2.056-2.056Z" fill="#212121" data-color="color-2"></path>
                            <circle cx="6.25" cy="7.25" r="1.25" fill="#212121" data-color="color-2"></circle>
                            <path d="M13.25,16H4.75c-1.517,0-2.75-1.233-2.75-2.75V4.75c0-1.517,1.233-2.75,2.75-2.75H13.25c1.517,0,2.75,1.233,2.75,2.75V13.25c0,1.517-1.233,2.75-2.75,2.75ZM4.75,3.5c-.689,0-1.25,.561-1.25,1.25V13.25c0,.689,.561,1.25,1.25,1.25H13.25c.689,0,1.25-.561,1.25-1.25V4.75c0-.689-.561-1.25-1.25-1.25H4.75Z" fill="#212121"></path>
                        </g>
                    </svg>
                    <div class="text-content">
                        Provide the product image below.
                    </div>
                    <div class="form-create-group">
                        <input type="file" id="fileInput" name="fileInput" required>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    <!-- Edit Item A$$ -->

    <div class="edit-item-wrapper" style="pointer-events: none; opacity: 0;">
        <div class="edit-item-container">
            <div class="left-align">
                <header class="create-item-header">
                    <span>Update Item</span>
                    <p>Change the input needed field below.</p>
                </header>
                <form action="edit_product.php" class="form-create" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="trv_product_id" value="<?php echo htmlspecialchars($product_id); ?>">
                    <div class="form-create-group">
                        <label for="product-category">Product Category</label>
                        <select id="product-category" name="product-category">
                            <option value="1" <?php echo ($product_category_id == 1) ? 'selected' : ''; ?>>Brownies</option>
                            <option value="2" <?php echo ($product_category_id == 2) ? 'selected' : ''; ?>>Cakes</option>
                            <option value="3" <?php echo ($product_category_id == 3) ? 'selected' : ''; ?>>Cookies</option>
                            <option value="4" <?php echo ($product_category_id == 4) ? 'selected' : ''; ?>>Specials</option>
                        </select>
                    </div>
                    <div class="form-create-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" name="product-name" value="<?php echo htmlspecialchars($product_name); ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-price">Product Price</label>
                        <input type="number" id="product-price" name="product-price" step="0.01" value="<?php echo htmlspecialchars($product_price); ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-min-quantity">Product Quantity / Minimum Stocks</label>
                        <input type="number" id="product-min-quantity" name="product-min-quantity" value="<?php echo htmlspecialchars($product_min_qty); ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-max-quantity">Product Quantity / Maximum Stocks</label>
                        <input type="number" id="product-max-quantity" name="product-max-quantity" value="<?php echo htmlspecialchars($product_max_qty); ?>" required>
                    </div>
                    <div class="form-create-group">
                        <label>Is the product still had some or had many stocks?</label>
                        <div>
                            <input type="radio" id="product-available-yes" name="product-available" value="yes" <?php echo ($product_available == 'yes') ? 'checked' : ''; ?> required>
                            <label for="product-available-yes">Yes</label>
                        </div>
                        <div>
                            <input type="radio" id="product-available-no" name="product-available" value="no" <?php echo ($product_available == 'no') ? 'checked' : ''; ?> required>
                            <label for="product-available-no">No</label>
                        </div>
                    </div>
                    <div class="form-create-group">
                        <label for="product-info">Product Information</label>
                        <textarea id="product-info" name="product-info" maxlength="4000" required><?php echo htmlspecialchars($product_info); ?></textarea>
                    </div>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="right-align">
                <div class="close-edit-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <line x1="14" y1="4" x2="4" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <line x1="4" y1="4" x2="14" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                        </g>
                    </svg>
                </div>
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M13.194,8.384c-1.072-1.072-2.816-1.072-3.889,0L3.196,14.494c.367,.457,.923,.756,1.554,.756H13.25c1.105,0,2-.896,2-2v-2.811l-2.056-2.056Z" fill="#212121" data-color="color-2"></path>
                            <circle cx="6.25" cy="7.25" r="1.25" fill="#212121" data-color="color-2"></circle>
                            <path d="M13.25,16H4.75c-1.517,0-2.75-1.233-2.75-2.75V4.75c0-1.517,1.233-2.75,2.75-2.75H13.25c1.517,0,2.75,1.233,2.75,2.75V13.25c0,1.517-1.233,2.75-2.75,2.75ZM4.75,3.5c-.689,0-1.25,.561-1.25,1.25V13.25c0,.689,.561,1.25,1.25,1.25H13.25c.689,0,1.25-.561,1.25-1.25V4.75c0-.689-.561-1.25-1.25-1.25H4.75Z" fill="#212121"></path>
                        </g>
                    </svg>
                    <div class="text-content">
                        Provide the product image below.
                    </div>
                    <div class="form-create-group">
                        <input type="file" id="fileInput" name="fileInput" required>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.querySelector(".product-added-success");
            const errorMessage = document.querySelector(".product-added-error");
            const confirmationModal = document.querySelector(".modal-container");

            function hideElement(element) {
                gsap.to(element, {
                    duration: 0.3,
                    opacity: 0,
                    display: "none",
                    onComplete: function() {
                        element.style.display = "none";
                    }
                });
            }

            if (successMessage) {
                setTimeout(function() {
                    hideElement(successMessage);
                }, 3000);
            } else if (errorMessage) {
                setTimeout(function() {
                    hideElement(errorMessage);
                }, 3000);
            }

            const rightHead = document.querySelector(".right-head");
            const createItemWrapper = document.querySelector(".create-item-wrapper");
            const editItemButton = document.querySelectorAll(".edit-item");
            const editItemWrapper = document.querySelector(".edit-item-wrapper");

            // Function to update the URL
            function updateURL(productID) {
                const url = new URL(window.location.href);
                url.searchParams.set('trv_product_id', productID);
                history.pushState(null, '1', url.toString());
            }

            // Function to toggle the modal
            function toggleModal(modalWrapper) {
                if (modalWrapper.style.pointerEvents === "none") {
                    gsap.to(modalWrapper, {
                        duration: 0.3,
                        pointerEvents: "auto",
                        opacity: 1
                    });
                } else {
                    gsap.to(modalWrapper, {
                        duration: 0.3,
                        pointerEvents: "none",
                        opacity: 0
                    });
                    history.pushState(null, '', window.location.pathname);
                }
            }

            rightHead.addEventListener("click", function() {
                toggleModal(createItemWrapper);
            });


            const closeModalButtons = document.querySelectorAll(".close-modal");
            closeModalButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    toggleModal(createItemWrapper);
                });
            });

            const closeEditButtons = document.querySelectorAll(".close-edit-modal");
            closeEditButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    toggleModal(editItemWrapper);
                });
            });


            editItemButton.forEach(function(button) {
                button.addEventListener("click", function() {
                    toggleModal(editItemWrapper);
                });
            })
        });

        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".delete-item");
            const deleteConfirmModal = document.getElementById("delete-confirm");
            const closeModalButtons = document.querySelectorAll("#close-modal");
            const submitModalButton = document.getElementById("submit-modal");
            const deleteProductIdInput = document.getElementById("delete_product_id");

            function toggleModal() {
                if (deleteConfirmModal.style.display === "none" || deleteConfirmModal.style.opacity === "0") {
                    gsap.to(deleteConfirmModal, {
                        duration: 0.3,
                        display: "block",
                        opacity: 1
                    });
                } else {
                    gsap.to(deleteConfirmModal, {
                        duration: 0.3,
                        display: "none",
                        opacity: 0
                    });
                }
            }

            // Event listener for clicking delete buttons
            deleteButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    const productID = this.getAttribute("data-product-id");
                    deleteProductIdInput.value = productID;
                    toggleModal();
                });
            });

            // Event listener for clicking close buttons
            closeModalButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    toggleModal();
                });
            });

            // Event listener for clicking submit button
            submitModalButton.addEventListener("click", function() {
                // Perform delete action here
                toggleModal();
            });
        });
    </script>


</body>

</html>