<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./views/modules/index.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="./public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon/favicon-16x16.png">
    <link rel="manifest" href="./public/favicon/site.webmanifest">
    <link rel="mask-icon" href="./public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <title>Treiven - Elevate your celebrations with our delicious pastries</title>
</head>

<body>
    <header class="nav-container">
        <nav class="nav-wrapper">
            <div class="nav-logo">
                <a href="./">
                    <img src="./public/trieven.svg" alt="" />
                </a>
            </div>
            <ul class="nav-link-wrapper">
                <li class="nav-links">
                    <a class="nav-active">Explore</a>
                </li>
                <li class="nav-links">
                    <a>Cart Section</a>
                </li>
                <li class="nav-links">
                    <a>Abouts</a>
                </li>
            </ul>
            <div class="right-side-wrapper">
                <div class="modal-info">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" style="margin-right: 12px;">
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
                        <title>user</title>
                        <g fill="#212121" class="nc-icon-wrapper">
                            <circle cx="9" cy="4.5" r="2.75" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></circle>
                            <path d="M13.762,15.516c.86-.271,1.312-1.221,.947-2.045-.97-2.191-3.159-3.721-5.709-3.721s-4.739,1.53-5.709,3.721c-.365,.825,.087,1.774,.947,2.045,1.225,.386,2.846,.734,4.762,.734s3.537-.348,4.762-.734Z" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="modal-option-wrapper" style="display: none; opacity: 0;">
                <li class="modal-links">
                    <a>Sign up</a>
                </li>
                <li class="modal-links">
                    <a>Sign in</a>
                </li>
                <li class="modal-links">
                    <a>GitHub Repository</a>
                </li>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="./views/client/responsive.js"></script>
</body>

</html>