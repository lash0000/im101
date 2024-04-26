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
                <div class="product-item">
                    <div class="product-left-side">
                        <div class="product-hero">
                            <img src="../../../public/product-test/brown1.png" alt="" />
                        </div>
                        <div class="product-first-detail">
                            <span>Brownies W/ Walnuts</span>
                            <p style="color: #A6A6A6;">Category / Special Treats</p>
                            <p>Price: ₱50.00 (discount applied: FALSE)</p>
                        </div>
                    </div>
                    <div class="product-right-side">
                        <button class="edit-item">
                            Edit Item
                        </button>
                        <button class="delete-item">
                            Delete Item
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

    <!-- Create / Add item modal -->
    <div class="create-item-wrapper" style="pointer-events: none; opacity: 0;">
        <div class="create-item-container">
            <div class="left-align">
                <header class="create-item-header">
                    <span>Create / Add New Item</span>
                    <p>Provide the input needed below...</p>
                </header>
                <form action="" class="form-create">
                    <div class="form-create-group">
                        <label for="product-category">Product Category</label>
                        <select id="product-category" name="product-category">
                            <option value="brownies">Brownies</option>
                            <option value="cakes">Cakes</option>
                            <option value="cakes">Cookies</option>
                            <option value="cakes">Specials</option>
                        </select>
                    </div>
                    <div class="form-create-group">
                        <label for="product-name">Product Name</label>
                        <input type="text" id="product-name" name="product-name" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-price">Product Price</label>
                        <input type="number" id="product-price" name="product-price" step="0.01" required>
                    </div>
                    <div class="form-create-group">
                        <label for="product-quantity">Product Quantity / Stocks</label>
                        <input type="number" id="product-quantity" name="product-quantity" required>
                    </div>
                    <div class="form-create-group">
                        <label>Is the product still had some or had many stocks?</label>
                        <div class="">
                            <input type="radio" id="product-available-yes" name="product-available" value="yes" required>
                            <label for="product-available-yes">Yes</label>
                        </div>
                        <div class="m">
                            <input type="radio" id="product-available-no" name="product-available" value="no" required>
                            <label for="product-available-no">No</label>
                        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rightHead = document.querySelector(".right-head");
            const createItemWrapper = document.querySelector(".create-item-wrapper");

            function toggleModal() {
                if (createItemWrapper.style.pointerEvents === "none") {
                    gsap.to(createItemWrapper, {
                        duration: 0.3,
                        pointerEvents: "auto", // Enable pointer events
                        opacity: 1
                    });
                } else {
                    gsap.to(createItemWrapper, {
                        duration: 0.3,
                        pointerEvents: "none", // Disable pointer events
                        opacity: 0
                    });
                }
            }
            rightHead.addEventListener("click", function() {
                toggleModal();
            });

            const closeModalButton = document.querySelector(".close-modal");

            closeModalButton.addEventListener("click", function() {
                toggleModal();
            });
        });
    </script>
</body>

</html>