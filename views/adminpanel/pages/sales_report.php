<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$selectQuery = "SELECT SUM(trv_total_amounts) AS total_sales_amount FROM treiven_orders";
$result = mysqli_query($conn, $selectQuery);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $totalSalesAmount = $row['total_sales_amount'];
} else {
    $totalSalesAmount = 0;
}

$salesTax = $totalSalesAmount * 0.12;
$salesTotal = $totalSalesAmount + $salesTax;

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
    <link rel="manifest" href="../../public/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <title>Treiven - Sales Report</title>
</head>

<body>
    <main class="product-manage-page">
        <div class="product-manage-wrapper">
            <header class="manage-head">
                <div class="left-head">
                    <span>Sales Report</span>
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
                <div class="product-text" id="sales-amount">
                    <span>Sales Amount</span>
                    <p><?php echo $totalSalesAmount; ?></p>
                </div>
                <div class="product-text" id="sales-tax">
                    <span>Sales Tax (12% VAT)</span>
                    <p><?php echo $salesTax; ?></p>
                </div>
                <div class="product-text" id="sales-total">
                    <span>Sales Total</span>
                    <p><?php echo $salesTotal; ?></p>
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

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const salesAmountElement = document.getElementById("sales-amount").querySelector("p");
            const salesTaxElement = document.getElementById("sales-tax").querySelector("p");
            const salesTotalElement = document.getElementById("sales-total").querySelector("p");

            // balagbag na ronnie
            salesAmountElement.textContent = "₱<?php echo $totalSalesAmount; ?>";
            salesTaxElement.textContent = "₱<?php echo $salesTax; ?>";
            salesTotalElement.textContent = "₱<?php echo $salesTotal; ?>";
        });
    </script>
</body>

</html>