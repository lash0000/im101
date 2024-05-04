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
        $productPrice2 = $row['trv_product_second_price'];
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
    <link rel="stylesheet" href="../../views/modules/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../../public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../public/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <title>Treiven - <?php echo $productName; ?></title>
</head>

<body style="overflow: auto;">
    <header class="nav-container">
        <nav class="nav-wrapper">
            <div class="nav-logo">
                <a href="../../">
                    <img src="../../public/trieven.svg" alt="" />
                </a>
            </div>
            <div class="nav-search">
                <input type="text" id="search-input" maxlength="60" placeholder="Search..." disabled>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#ffffff" class="nc-icon-wrapper">
                            <line x1="15.25" y1="15.25" x2="11.285" y2="11.285" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" data-color="color-2"></line>
                            <circle cx="7.75" cy="7.75" r="5" fill="none" stroke="#ffffff " stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                        </g>
                    </svg>
                </button>
            </div>
            <div class="right-side-wrapper">
                <div class="modal-info">
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
                <div class="auth-user-options">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <circle cx="9" cy="4.5" r="2.75" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></circle>
                            <path d="M13.762,15.516c.86-.271,1.312-1.221,.947-2.045-.97-2.191-3.159-3.721-5.709-3.721s-4.739,1.53-5.709,3.721c-.365,.825,.087,1.774,.947,2.045,1.225,.386,2.846,.734,4.762,.734s3.537-.348,4.762-.734Z" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="modal-option-wrapper" style="display: none; opacity: 0;">
                <li class="modal-links">
                    <a href="../../views/client/register/">Sign up</a>
                </li>
                <li class="modal-links">
                    <a href="../../views/client/login/">Sign in</a>
                </li>
                <li class="modal-links">
                    <a href="https://github.com/lash0000/im101" target="_blank">GitHub Repository</a>
                </li>
            </div>
        </nav>
    </header>
    <!-- applicable for mobile lol -->
    <div class="appbar-container">
        <div class="appbar-wrapper">
            <button class="app-links" id="app-active">
                <a class="app-root" href="../../">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M9.926,16.11c-.461,.092-.938,.14-1.426,.14-4.004,0-7.25-3.246-7.25-7.25S4.496,1.75,8.5,1.75s7.25,3.246,7.25,7.25c0,.264-.014,.524-.041,.78" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path d="M11.126,10.768l5.94,2.17c.25,.091,.243,.448-.011,.529l-2.719,.87-.87,2.719c-.081,.254-.438,.261-.529,.011l-2.17-5.94c-.082-.223,.135-.44,.359-.359Z" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></path>
                            <path d="M15.75,9c0-1.657-3.246-3-7.25-3S1.25,7.343,1.25,9c0,1.646,3.205,2.983,7.175,3" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path d="M11.486,8.293c-.147-3.672-1.428-6.543-2.986-6.543-1.657,0-3,3.246-3,7.25s1.343,7.25,3,7.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </g>
                    </svg>
                    <span>Explore</span>
                </a>
            </button>
            <button class="app-links">
                <a class="app-root" href="../../views/client/pages/carts.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M1.75,1.75l1.351,.338c.393,.098,.688,.424,.747,.825l1.153,7.838" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path d="M15.25,13.25H4.5c-.69,0-1.25-.56-1.25-1.25h0c0-.69,.56-1.25,1.25-1.25H13.029c.43,0,.813-.275,.949-.684l1.333-4c.216-.648-.266-1.316-.949-1.316H4.118" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <circle cx="3.75" cy="15.75" r="1.25" fill="#212121" data-color="color-2" data-stroke="none" stroke="none"></circle>
                            <circle cx="14.25" cy="15.75" r="1.25" fill="#212121" data-color="color-2" data-stroke="none" stroke="none"></circle>
                        </g>
                    </svg>
                    <span>Carts</span>
                </a>
            </button>
            <button class="app-links">
                <a class="app-root" href="../../views/client/pages/abouts.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <circle cx="9" cy="9" r="7.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                            <line x1="9" y1="12.819" x2="9" y2="8.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <path d="M9,6.75c-.552,0-1-.449-1-1s.448-1,1-1,1,.449,1,1-.448,1-1,1Z" fill="#212121" data-color="color-2" data-stroke="none" stroke="none"></path>
                        </g>
                    </svg>
                    <span>About</span>
                </a>
            </button>
        </div>
    </div>

    <main class="product-container">
        <div class="product-wrapper">
            <div class="product-header">
                <div class="product-title">
                    <h1><?php echo $productName; ?></h1>
                </div>
                <a href="./img-view/?id=<?php echo $productId; ?>" class="product-portrait">
                    <div class="node-one">
                        <img src="../../views/adminpanel/pages/uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
                    </div>
                    <div class="node-two">
                        <img src="../../views/adminpanel/pages/uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
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
                                <?php if ($productMaxQty == 20) : ?>
                                    <div style="background: #e6183f;" class="just-circle"></div>
                                    <span style="color: #e6183f; font-weight: bolder;">Maximum Stock: <?php echo $productMaxQty; ?> (Only a few left...)</span>
                                <?php elseif ($productMaxQty == 0) : ?>
                                    <div style="background: #e6183f;" class="just-circle"></div>
                                    <span style="color: #000; font-weight: bolder; text-decoration: underline;">Maximum Stock: <?php echo $productMaxQty; ?> (Out of stock)</span>
                                <?php else : ?>
                                    <div class="just-circle"></div>
                                    <span>Maximum Stock: <?php echo $productMaxQty; ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="product-status">
                                <!-- <div class="just-circle"></div> -->
                                <?php if ($productMaxQty == 0) : ?>
                                    <span style="color: #0fa968; font-weight: bolder;">Minimum Stock: <?php echo $productQty; ?> per day (Out of stock)</span>
                                <?php else : ?>
                                    <span style="color: #0fa968; font-weight: bolder;">Minimum Stock: <?php echo $productQty; ?> per day (Available)</span>
                                <?php endif; ?>
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

    <!-- Product Out of Stock base on $productMaxQty -->

    <div class="product-unavailable-container" style="display: none; opacity: 0;">
        <div class="product-unavailable-wrapper">
            <header class="header-modal">
                <span>Product Unavailable</span>
            </header>
            <div class="header-body">
                <label id="modal-label">This item has already been out of stock.</label>
            </div>
            <footer class="header-options">
                <a href="../../index.php">
                    <button class="proceed-active">Go Back</button>
                </a>
            </footer>
        </div>
    </div>

    <!-- Sign In First HAHAHAA -->

    <div id="sign-in-required" class="product-unavailable-container" style="display: none; opacity: 0;">
        <div class="product-unavailable-wrapper">
            <header class="header-modal">
                <span>Sign In Required</span>
            </header>
            <div class="header-body">
                <label id="modal-label">You need to be signed in to add items to your cart. Please sign in or create an account to continue.</label>
            </div>
            <footer class="header-options">
                <a href="../index.php">
                    <button class="proceed-active">Go Back</button>
                </a>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="../../views/client/responsive.js"></script>
    <script>
        const quantityInput = document.getElementById('quantity');
        const totalPriceElement = document.querySelector('.total-price span:nth-child(2)');
        const vatFeeElement = document.querySelectorAll('.total-price span')[3];
        const promoDiscountElement = document.querySelectorAll('.total-price span')[5];
        const totalAmountElement = document.querySelectorAll('.total-price span')[7];
        const numberInputs = document.querySelectorAll('input[type="number"]');

        numberInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                // Prevent negative values during INPUT lmfao
                if (this.value < 0) {
                    this.value = 0;
                }
            });
        });

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
            const confirmationModal = document.querySelector(".modal-container");
            const cartModal = document.querySelector(".cart-modal-container");
            const addToCartButton = document.querySelector(".add-to-cart");
            const productUnavailableModal = document.querySelector(".product-unavailable-container");

            function toggleModal(modalWrapper) {
                if (modalWrapper.style.display === "none") {
                    document.body.style.overflow = "hidden";
                    gsap.to(modalWrapper, {
                        duration: 0.1,
                        display: "block",
                        opacity: 1,
                        onComplete: function() {
                            if (modalWrapper === cartModal) {
                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                            }
                        }
                    });
                } else {
                    document.body.style.overflow = "auto";
                    gsap.to(modalWrapper, {
                        duration: 0.3,
                        display: "none",
                        opacity: 0
                    });
                }
            }

            addToCartButton.addEventListener("click", function() {
                toggleModal(cartModal);
            });

            const closeModalButtons = document.querySelectorAll("#close-modal");
            closeModalButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    toggleModal(cartModal);
                });
            });

            if (<?php echo $productMaxQty; ?> === 0) {
                toggleModal(productUnavailableModal);
            }
        });
    </script>
</body>

</html>