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
    <title>Treiven - Cart Section</title>
</head>

<body>
    <header class="user-nav-container">
        <div class="user-nav-wrapper">
            <ul class="user-link-wrapper">
                <li class="usr-links">
                    <a href="../onboard.php">Explore</a>
                </li>
                <li class="usr-links">
                    <a href="./carts.php">Cart Section</a>
                </li>
                <li class="usr-links">
                    <a href="">Orders</a>
                </li>
                <li class="usr-links usr-active">
                    <a>Abouts</a>
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

    <main class="about-container">
        <div class="about-wrapper">
            <div class="about-header">
                <span>Fast facts behind development!</span>
            </div>
            <div class="about-grid-wrapper">
                <div class="about-grid">
                    <h1>PHP</h1>
                    <p>is our scripting language.</p>
                </div>
                <div class="about-grid">
                    <h1>Oracle</h1>
                    <p>is our local database management.</p>
                </div>
                <div class="about-grid">
                    <h1>CSS</h1>
                    <p>I mean no Tailwind or Bootstrap we died.</p>
                </div>
                <div class="about-grid">
                    <h1>GSAP</h1>
                    <p>We love animating things with it.</p>
                </div>
            </div>
            <div class="about-space">
                <span>About Us</span>
                <p>We're thrilled to have you embark on this exciting journey into the world of e-commerce! This simulated online store provides a platform for you to explore the fundamentals of building and managing a successful e-commerce business. Here, you'll gain valuable hands-on experience in everything from product selection and marketing to order processing and customer service.</p>
                <p>Within this virtual space, you'll have the opportunity to experiment with different e-commerce strategies, analyze customer behavior, and learn best practices for optimizing your online store's performance. This immersive experience allows you to make real-time decisions with simulated consequences, helping you develop critical thinking and problem-solving skills essential for the e-commerce landscape.</p>
                <p>Whether you aspire to launch your own online business someday or simply want to gain a deeper understanding of this rapidly growing industry, This shop provides the perfect platform to learn, experiment, and succeed. Dive in, explore the possibilities, and discover the exciting world of e-commerce!</p>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
</body>

</html>