<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT p.trv_product_id, p.trv_product_name, p.trv_product_price, c.trv_category_name, p.trv_product_image, p.trv_maximum_stock
        FROM treiven_products p
        INNER JOIN treiven_category c ON p.trv_category_id = c.trv_category_id";
$result = mysqli_query($conn, $sql);;


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
    <title>Treiven - Onboarding</title>
</head>

<body>
    <header class="user-nav-container">
        <div class="user-nav-wrapper">
            <ul class="user-link-wrapper">
                <li class="usr-links usr-active">
                    <a>Explore</a>
                </li>
                <li class="usr-links">
                    <a href="./pages/carts.php">Cart Section</a>
                </li>
                <li class="usr-links">
                    <a href="./pages/orders.php">Orders</a>
                </li>
                <li class="usr-links">
                    <a href="./pages/about.php">Abouts</a>
                </li>
            </ul>
            <div class="nav-logo">
                <a href="">
                    <img src="../../public/trieven.svg" alt="" />
                </a>
            </div>
            <div class="right-column">
                <form action="./pages/search-page.php" method="post" class="user-search">
                    <input type="text" name="search" id="search-input" maxlength="60" placeholder="Search...">
                </form>
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
                    <a href="../client/login/index.php">Sign Out</a>
                </li>
                <li class="modal-links">
                    <a href="https://github.com/lash0000/im101" target="_blank">GitHub Repository</a>
                </li>
            </div>
        </div>
    </header>

    <main class="main-content">
        <!-- <div class="category-wrapper">
            <div class="category-btn">
                Categories
            </div>
            <div class="category-tabs">
                <a class="category category-active">
                    Cookies
                </a>
                <a class="category">
                    Brownies
                </a>
                <a class="category">
                    Cakes
                </a>
                <a class="category">
                    Specialty
                </a>
            </div>
            <div class="category-btn">
                Filters
            </div>
        </div> -->
        <div class="grid-items-container">
            <div class="grid-items-wrapper">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $productId = $row['trv_product_id'];
                        $productName = $row['trv_product_name'];
                        $productPrice = $row['trv_product_price'];
                        $categoryName = $row['trv_category_name'];
                        $productImage = $row['trv_product_image'];
                        $maxStock = $row['trv_maximum_stock'];
                        $availabilityClass = ($maxStock == 0) ? 'out-of-stock' : 'available';
                ?>

                        <a href="./product?id=<?php echo $productId; ?>" class="treiven-items">
                            <div class="treiven-pics">
                                <img src="../adminpanel/pages/uploads/<?php echo $productImage; ?>" alt="<?php echo $productName; ?>">
                            </div>
                            <div class="treiven-infos">
                                <div class="treiven-product">
                                    <span><?php echo $productName; ?></span>
                                    <p class="treiven-badge"><?php echo $categoryName; ?></p>
                                </div>
                                <div class="treiven-product-price">
                                    <span><?php echo '₱' . $productPrice; ?></span>
                                    <p class="avail-stocks <?php echo $availabilityClass; ?>"><?php echo ($maxStock == 0) ? 'Out of stock' : 'Available'; ?></p>
                                </div>
                            </div>
                        </a>
                <?php
                    }
                } else {
                    echo "No products found.";
                }
                ?>
            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
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

            //Close your modal automatically lol this good enough.
            window.addEventListener("scroll", function() {
                closeModal();
            });
            window.addEventListener("resize", function() {
                closeModal();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search-input');

            searchInput.addEventListener('input', function(event) {
                const inputValue = event.target.value;
                const sanitizedValue = inputValue.replace(/[^\w\s]/gi, '');

                if (inputValue !== sanitizedValue) {
                    event.target.value = sanitizedValue;
                }
            });
        });
    </script>
</body>

</html>