<?php
$productId = isset($_GET['id']) ? $_GET['id'] : null;

if (!$productId) {
    echo "Invalid product ID.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../views/modules/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../../public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../../public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../../public/favicon/favicon-16x16.png">
    <link rel="manifest" href="../../../public/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../../public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@glidejs/glide@3.6.0/dist/glide.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@glidejs/glide@3.6.0/dist/css/glide.core.css" />
    <title>Treiven - Brownies W/ Walnuts</title>
</head>

<body>
    <header class="nav-container">
        <nav class="nav-wrapper">
            <div class="nav-logo">
                <a href="../?id=<?php echo $productId; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <line x1="14" y1="4" x2="4" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <line x1="4" y1="4" x2="14" y2="14" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
                        </g>
                    </svg>
                </a>
            </div>
            <div class="right-side">
                Treiven's Image Viewer
            </div>
        </nav>
    </header>

    <main class="product-container">
        <div class="glide">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    <li class="glide__slide">
                        <img src="../../../../public/login-banner.jpg" alt="">
                    </li>
                    <li class="glide__slide">
                        <img src="../../../../public/signup-banner.jpg" alt="">
                    </li>
                    <li class="glide__slide">
                        <img src="../../../../public/product-test/brown2.png" alt="">
                    </li>
                </ul>
            </div>
            <div class="glide__bullets" data-glide-el="controls[nav]">
                <button class="glide__bullet" data-glide-dir="=0"></button>
                <button class="glide__bullet" data-glide-dir="=1"></button>
                <button class="glide__bullet" data-glide-dir="=2"></button>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script>
        //My carousel slider (Please refer to https://glidejs.com/docs/options/)
        new Glide(".glide", {
            type: "slider",
            focusAt: 'center',
            perView: 2,
            gap: 24,
            breakpoints: {
                1024: {
                    perView: 2,
                },
                768: {
                    perView: 1,
                },
            },
        }).mount();
    </script>
</body>

</html>