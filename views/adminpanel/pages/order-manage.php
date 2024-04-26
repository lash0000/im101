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
                    <span>Ordering List (Pendings)</span>
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
                <div class="product-item">
                    <div class="product-left-side">
                        <div class="product-hero">
                            <img src="../../../public/product-test/brown1.png" alt="" />
                        </div>
                        <div class="product-first-detail">
                            <span>Brownies W/ Walnuts</span>
                            <p style="color: #A6A6A6;">Quantity: 12 (Ordered by user_id: 1234567890)</p>
                            <p>Total Amount: ₱1194.00 (no discount)</p>
                        </div>
                    </div>
                    <div class="product-right-side">
                        <span>Status: Waiting to be shipped...</span>
                        <button class="view-item" style="color: black;">
                            View Item
                        </button>
                    </div>
                </div>
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
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
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
                    <p style="color: #8e8e8e;">#1234567890</p>
                </li>
                <li class="generated-number">
                    <span>Reference tracking number</span>
                    <p style="color: #8e8e8e;">#1234567890</p>
                </li>
                <li class="generated-number">
                    <span>Date ordered</span>
                    <p style="color: #8e8e8e;">DD/MM/YYYY at TIMESTAMP</p>
                </li>
            </ul>
            <div class="view-item-options">
                <a href="" class="update-item">
                    <button>Update Item</button>
                </a>
                <a href="" class="cancel">
                    <button>Cancel</button>
                </a>
            </div>
        </div>
    </div>

    <!-- Another Modal lool -->

    <div class="view-item-wrapper" style="pointer-events: none; opacity: 0;">
        <div class="view-item-container">
            <header class="view-item-header">
                <div class="view-item-detail">
                    <span>Update Item</span>
                    <p>Tell us what's going in...</p>
                </div>
                <div class="order-close-modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
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
                    <a href="" class="cancel">
                        <button>Cancel</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
</body>

</html>