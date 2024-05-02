<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];
    $query = "SELECT * FROM treiven_products WHERE trv_product_id = $productId";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $productName = $row['trv_product_name'];
        $productInfo = $row['trv_product_info'];
        $productPrice = $row['trv_product_price'];
        $productQty = $row['trv_minimum_stock'];
        $productMaxQty = $row['trv_maximum_stock'];
        $categoryName = $row['trv_category_name'];
        $productImage = $row['trv_product_image'];
        $categoryId = $row['trv_category_id'];
    } else {
        echo "basta error";
        exit;
    }
}

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
    <title>Treiven - <?php echo $productName; ?></title>
</head>

<body style="overflow: hidden;">

    <header class="user-nav-container">
        <div class="user-nav-wrapper">
            <ul class="user-link-wrapper">
                <li class="usr-links">
                    <a href="../onboard.php">Explore</a>
                </li>
                <li class="usr-links">
                    <a href="../pages/carts.php">Cart Section</a>
                </li>
                <li class="usr-links">
                    <a href="../pages/orders.php">Orders</a>
                </li>
                <li class="usr-links">
                    <a href="../pages/about.php">Abouts</a>
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
            <div class="modal-option-wrapper" style="display: none; opacity: 0;">
                <li class="modal-links">
                    <a href="../../client/login/index.php">Sign Out</a>
                </li>
                <li class="modal-links">
                    <a href="https://github.com/lash0000/im101" target="_blank">GitHub Repository</a>
                </li>
            </div>
        </div>
    </header>

    <main class="product-container">
        <div class="product-wrapper">
            <div class="product-header">
                <div class="product-title">
                    <h1><?php echo $productName; ?></h1>
                </div>
                <a href="./img-view/?id=<?php echo $productId; ?>" class="product-portrait">
                    <div class="node-one">
                        <img src="../../adminpanel/pages/uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
                    </div>
                    <div class="node-two">
                        <img src="../../adminpanel/pages/uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
                    </div>
                </a>
            </div>
            <div class="product-grid-column">
                <div class="product-description">
                    <span>The Perfect Bite: <?php echo $productName; ?></span>
                    <p><?php echo $productInfo; ?></p>
                </div>
                <div class="product-option">
                    <div class="product-first-column">
                        <div class="product-price">
                            <span class="pricey">₱<?php echo $productPrice; ?></span>
                            <div class="product-status">
                                <div class="just-circle"></div>
                                <span>Minimum Stock: <?php echo $productQty; ?> (Available)</span>
                            </div>
                        </div>
                        <div class="quantity-input">
                            <label>Quantity</label>
                            <input type="number" class="quantity" id="quantity" name="quantity" value="0" min="0">
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                        <input type="hidden" name="category_id" value="<?php echo $categoryId; ?>">
                        <button class="add-to-cart">Proceed</button>
                    </div>
                    <div class="product-last-column">
                        <span class="last-header">Price details</span>
                        <div class="total-price">
                            <span>Total price</span>
                            <span>₱0,000</span>
                        </div>
                        <div class="total-price">
                            <span>VAT fee (12%)</span>
                            <span>₱0,000</span>
                        </div>
                        <div class="total-price">
                            <span>Promo discount fee</span>
                            <span>₱0,000</span>
                        </div>
                        <div class="total-price">
                            <span>Total Amount</span>
                            <span>₱0,000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add to Cart Modal again -->

    <div class="cart-modal-container" style="display: none; opacity: 0;">
        <div class="cart-modal-wrapper">
            <header class="header-modal">
                <span>Add to Cart</span>
                <button class="material-symbols-outlined" id="close-modal">
                    close
                </button>
            </header>
            <form action="" method="post">
                <div class="header-body">
                    <label id="modal-label">Specify Boxes</label>
                    <div class="cart-input-field">
                        <div class="cart-field">
                            <input type="radio" id="box1" name="box" value="box1" required>
                            <label for="box1">Half Dozen</label>
                        </div>
                        <div class="dozen-price">
                            <span>₱100.00</span>
                        </div>
                    </div>
                    <div class="cart-input-field">
                        <div class="cart-field">
                            <input type="radio" id="box2" name="box" value="box2" required>
                            <label for="box2">One Dozen</label>
                        </div>
                        <div class="dozen-price">
                            <span>₱100.00</span>
                        </div>
                    </div>
                    <div class="cart-qty-field">
                        <div class="cart-qty-mode">
                            <label for="cart-qty">Quantity</label>
                            <input type="number" id="box3" name="box" value="box3" required>
                        </div>
                        <div class="dozen-price">
                            <span>Note: You will be allowed to change it later via Cart Section for verifying your orders from scratch before proceeding to checkout.</span>
                        </div>
                    </div>
                </div>
                <footer class="header-options">
                    <button id="submit-modal" class="proceed-active" type="submit">Submit</button>
                    <button id="close-modal">Cancel</button>
                </footer>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        const quantityInput = document.getElementById('quantity');
        const totalPriceElement = document.querySelector('.total-price span:nth-child(2)');
        const vatFeeElement = document.querySelectorAll('.total-price span')[3];
        const promoDiscountElement = document.querySelectorAll('.total-price span')[5];
        const totalAmountElement = document.querySelectorAll('.total-price span')[7];

        function updatePriceDetails() {
            const quantity = parseInt(quantityInput.value);
            const productPrice = <?php echo $productPrice; ?>;

            const totalPrice = productPrice * quantity;
            totalPriceElement.textContent = '₱' + totalPrice.toLocaleString();

            const vatFee = totalPrice * 0.12;
            vatFeeElement.textContent = '₱' + vatFee.toLocaleString();

            const promoDiscount = totalPrice * 0.20;
            promoDiscountElement.textContent = '₱' + promoDiscount.toLocaleString();

            const totalAmount = totalPrice - promoDiscount;
            totalAmountElement.textContent = '₱' + totalAmount.toLocaleString();
        }

        quantityInput.addEventListener('input', updatePriceDetails);

        function validateForm() {
            var quantity = document.getElementById("quantity").value;
            if (quantity <= 0) {
                alert("Please specify a valid quantity.");
                return false;
            }

            var selectedCategoryId = "";
            document.getElementById("category_id").value = selectedCategoryId;
            alert("Product will be added to cart.");

            return true;
        }

        //FOR GSAP LOOL

        document.addEventListener("DOMContentLoaded", function() {
            const modalInfo = document.querySelector(".user-wrapper");
            const modalOptions = document.querySelector(".modal-option-wrapper");

            function closeModal() {
                gsap.to(modalOptions, {
                    duration: 0.1,
                    display: "none",
                    opacity: 0
                });
            }

            modalInfo.addEventListener("click", function() {
                if (modalOptions.style.display === "none") {
                    gsap.to(modalOptions, {
                        duration: 0.1,
                        display: "block",
                        opacity: 1
                    });
                } else {
                    closeModal();
                }
            });

            window.addEventListener("scroll", function() {
                closeModal();
            });
            window.addEventListener("resize", function() {
                closeModal();
            });
        });
    </script>
</body>

</html>