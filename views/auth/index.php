<?php
header("Refresh: 3; URL=../client/login/index.php");
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
    <meta http-equiv="refresh" content="3;url=../user/onboard.php">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <title>just a load...</title>
</head>

<body style="overflow: hidden;">

    <main class="auth-container">
        <section class="auth-wrapper">
            <div class="loader">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="grad1" gradientUnits="userSpaceOnUse">
                            <stop offset="-168.14%" stop-color="#F47B37" />
                            <stop offset="425.2%" stop-color="#CC5817" />
                        </linearGradient>
                    </defs>
                    <style>
                        .spinner_rXNP {
                            animation: spinner_YeBj .8s infinite;
                            fill: url(#grad1);
                            /* Added fill property */
                        }

                        @keyframes spinner_YeBj {
                            0% {
                                animation-timing-function: cubic-bezier(0.33, 0, .66, .33);
                                cy: 5px
                            }

                            46.875% {
                                cy: 20px;
                                rx: 4px;
                                ry: 4px
                            }

                            50% {
                                animation-timing-function: cubic-bezier(0.33, .66, .66, 1);
                                cy: 20.5px;
                                rx: 4.8px;
                                ry: 3px
                            }

                            53.125% {
                                rx: 4px;
                                ry: 4px
                            }

                            100% {
                                cy: 5px
                            }
                        }
                    </style>
                    <ellipse class="spinner_rXNP" cx="12" cy="5" rx="4" ry="4" />
                </svg>

            </div>
        </section>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

</html>