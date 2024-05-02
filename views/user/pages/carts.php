<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

$query = "SELECT trv_cart_id, trv_item_name, trv_item_qty, trv_total_amount, trv_item_boxes FROM treiven_cart_items";
$result = mysqli_query($conn, $query);

$totalAmount = 0; // Initialize total amount

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
    <title>Treiven - Cart Section</title>
</head>

<body>
    <header class="user-nav-container">
        <div class="user-nav-wrapper">
            <ul class="user-link-wrapper">
                <li class="usr-links">
                    <a href="../onboard.php">Explore</a>
                </li>
                <li class="usr-links usr-active">
                    <a>Cart Section</a>
                </li>
                <li class="usr-links">
                    <a href="./orders.php">Orders</a>
                </li>
                <li class="usr-links">
                    <a href="./about.php">Abouts</a>
                </li>
            </ul>
            <div class="nav-logo">
                <a href="../onboard.php">
                    <img src="../../../public/trieven.svg" alt="" />
                </a>
            </div>
            <div class="right-column">
                <div class="user-search">
                    <input type="text" id="search-input" maxlength="60" placeholder="Search...">
                </div>
                <div class="user-wrapper">
                    <div class="user-option">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
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
                    <div class="user-option">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                            <g fill="#212121" class="nc-icon-wrapper">
                                <circle cx="9" cy="4.5" r="2.75" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></circle>
                                <path d="M13.762,15.516c.86-.271,1.312-1.221,.947-2.045-.97-2.191-3.159-3.721-5.709-3.721s-4.739,1.53-5.709,3.721c-.365,.825,.087,1.774,.947,2.045,1.225,.386,2.846,.734,4.762,.734s3.537-.348,4.762-.734Z" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <form action="" method="post" class="main-wrapper">
            <div class="cart-checkout-progress">
                <div class="cart-mode">
                    <div class="cart-logo session-active"></div>
                    <label>Carts</label>
                </div>
                <div class="cart-mode">
                    <div class="cart-logo"></div>
                    <label>Shipment</label>
                </div>
                <div class="cart-mode">
                    <div class="cart-logo"></div>
                    <label>Place Order</label>
                </div>
            </div>
            <div class="cart-catalog">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="cart-items">
                            <input type="hidden" name="trv_item_name[]" value="<?php echo $row['trv_item_name']; ?>">
                            <input type="hidden" name="trv_item_qty[]" value="<?php echo $row['trv_item_qty']; ?>">
                            <input type="hidden" name="trv_item_boxes[]" value="<?php echo $row['trv_item_boxes']; ?>">
                            <input type="hidden" name="trv_total_amount[]" value="<?php echo $row['trv_total_amount']; ?>">
                            <div class="cart-quantity">
                                <input type="number" value="<?php echo $row['trv_item_qty']; ?>" />
                            </div>
                            <div class="cart-image-hero">
                                <img src="../../../public/men-shopping.webp" alt="">
                            </div>
                            <div class="cart-details">
                                <span><?php echo $row['trv_item_name']; ?></span>
                                <div class="cart-divided">
                                    <p>Quantity: <?php echo $row['trv_item_qty']; ?></p>
                                    <p>(<?php echo $row['trv_item_boxes']; ?> / Price per head: <?php echo $row['trv_total_amount']; ?>)</p>
                                </div>
                                <span>Total Amount: ₱<?php echo $row['trv_total_amount']; ?></span>
                            </div>
                        </div>
                <?php
                        // Accumulate total amount
                        $totalAmount += $row['trv_total_amount'];
                    }
                } else {
                    // No items found
                    echo '<div class="cart-notice-empty">
                            <span>All of the items will be added here once you cart it.</span>
                        </div>';
                }
                ?>
            </div>
            <div class="cart-total-amount" id="cart-total-amount">
                <span>Total Amount: ₱<?php echo number_format($totalAmount, 2); ?> (0% discount applied)</span>
            </div>
            <div class="cart-checkout">
                <button class="cart-proceed">
                    Checkout
                </button>
            </div>
        </form>
    </main>

    <!-- confirmation modal -->
    <div class="modal-container" style="display: none; opacity: 0;">
        <div class="modal-wrapper">
            <header class="header-modal">
                <span>Notice</span>
                <button class="material-symbols-outlined" id="close-modal">
                    close
                </button>
            </header>
            <main class="header-body">
                <label id="modal-label">You're about to checkout your listing cart items will you confirm?</label>
            </main>
            <footer class="header-options">
                <button id="confirm-modal-button" class="proceed-active" type="submit">Proceed</button>
                <button id="close-modal">Cancel</button>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        const numberInputs = document.querySelectorAll('input[type="number"]');
        const closeButtons = document.querySelectorAll("#close-modal");
        const confirmationModal = document.querySelector(".modal-container");
        const submitFormButton = document.querySelector("#confirm-modal-button");
        const proceedButton = document.querySelector(".cart-proceed");
        const form = document.querySelector(".main-wrapper");

        numberInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                if (this.value < 0) {
                    this.value = 0;
                }
            });
        });

        function toggleModal(modal) {
            if (modal.style.display === "none") {
                gsap.to(modal, {
                    duration: 0.3,
                    display: "block",
                    opacity: 1
                });
            } else {
                gsap.to(modal, {
                    duration: 0.3,
                    display: "none",
                    opacity: 0
                });
            }
        }

        closeButtons.forEach(function(closeButton) {
            closeButton.addEventListener("click", function() {
                toggleModal(confirmationModal);
            });
        });

        proceedButton.addEventListener("click", function(e) {
            e.preventDefault();
            toggleModal(confirmationModal);
        });

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector(".main-wrapper");

            // Event listener for form submission
            submitFormButton.addEventListener("click", function(event) {
                event.preventDefault();

                // Collect form data
                const formData = new FormData(form);
                const formDataObject = {};

                // Convert FormData entries to arrays
                for (let [key, value] of formData.entries()) {
                    if (!formDataObject[key]) {
                        formDataObject[key] = [];
                    }
                    formDataObject[key].push(value);
                }

                // Save form data to local storage
                localStorage.setItem("cartFormData", JSON.stringify(formDataObject));

                // Redirect to the next page
                window.location.href = "./shipment.php";
            });
        });
    </script>
</body>

</html>