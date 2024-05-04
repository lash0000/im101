<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

// Check if form is submitted

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
    <title>Treiven - Place Order Now</title>
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
                <div class="user-search" style="opacity: 0; pointer-events: none;">
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
                <div class="modal-option-wrapper" style="display: none; opacity: 0;">
                    <li class="modal-links">
                        <a href="../../client/login/index.php">Sign Out</a>
                    </li>
                    <li class="modal-links">
                        <a href="https://github.com/lash0000/im101" target="_blank">GitHub Repository</a>
                    </li>
                </div>
            </div>
        </div>
    </header>

    <main class="main-content">
        <div class="main-wrapper">
            <div class="cart-checkout-progress">
                <div class="cart-mode">
                    <div class="cart-logo session-active"></div>
                    <label>Carts</label>
                </div>
                <a class="cart-mode" href="./shipment.php">
                    <div class="cart-logo session-active"></div>
                    <label>Shipment</label>
                </a>
                <div class="cart-mode">
                    <div class="cart-logo session-active"></div>
                    <label>Place Order</label>
                </div>
            </div>
            <form action="" method="post">
                <div class="cart-catalog">
                    <div class="form-group-cart">
                        <div class="cart-input">
                            <label>First Name</label>
                            <input type="text" id="first-name" class="char-field" value="" disabled />
                        </div>
                        <div class="cart-input">
                            <label>Last Name</label>
                            <input type="text" id="last-name" class="char-field" value="" disabled />
                        </div>
                        <div class="cart-input">
                            <label>Full Address</label>
                            <input type="text" id="recipent-address" class="char-field" value="" disabled />
                        </div>
                        <div class="cart-input">
                            <label>Contact Number (PH)</label>
                            <div class="cart-input-absolute">
                                <span class="country-code">
                                    (+63)
                                </span>
                                <input type="tel" id="contact-number" class="contact-field" value="" disabled />
                            </div>
                        </div>
                        <div class="cart-input">
                            <label>Reference Tracking Number</label>
                            <input type="number" id="reference-track" class="ref-number-field" value="" disabled />
                        </div>
                        <div class="cart-input">
                            <label>Order ID Number</label>
                            <input type="number" id="order-number" class="ref-number-field" value="" disabled />
                        </div>
                        <div class="cart-input">
                            <label>Payment Method</label>
                            <input type="text" id="payment-method" class="ref-number-field" value="COD" disabled />
                        </div>
                        <div class="cart-input">
                            <label for="payment-date">Date Ordered</label>
                            <input type="date" id="payment-date" class="ref-number-field" value="<?php echo date('Y-m-d'); ?>" disabled />
                        </div>
                        <div class="cart-input-checkbox">
                            <div class="checkmate">
                                <input type="checkbox" id="affirmation-checkbox" required />
                            </div>
                            <label for="affirmation-checkbox">We are committed to protecting your privacy. Your information will be used only in accordance with our Privacy Policy, which adheres to the Cybercrime Prevention Act of 2012.</label>
                        </div>
                    </div>
                </div>
                <!-- confirmation modal -->
                <div class="modal-container" style="display: none; opacity: 0;">
                    <div class="modal-wrapper">
                        <header class="header-modal">
                            <span>Place Order Confirm?</span>
                            <button class="material-symbols-outlined" id="close-modal">
                                close
                            </button>
                        </header>
                        <main class="header-body">
                            <label id="modal-label">This action is irreversible.</label>
                        </main>
                        <footer class="header-options">
                            <button id="confirm-modal-button" class="proceed-active" type="submit">Proceed</button>
                            <button id="close-modal">Cancel</button>
                        </footer>
                    </div>
                </div>
            </form>
            <div class="cart-total-amount" id="cart-total-amount">
                <span>This is the partial pre-ordered..</span>
            </div>
            <div class="cart-checkout">
                <button class="cart-proceed">
                    Proceed
                </button>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="./PlaceOrder.js"></script>
</body>

</html>