<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="../public/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../public/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../public/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../public/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="../public/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <title>auth...</title>

</head>

<body>
    <section class="login-container">
        <aside class="login-wrapper">
            <div class="login-bubble">
                <div class="login-divide">
                    <div class="login-header">
                        <div class="brand-logo">
                            <svg viewBox="0 0 284 280" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="91.75" y="93.2678" width="70.3571" height="70.3571" transform="rotate(45 91.75 93.2678)" fill="white" />
                                <rect x="191.454" y="93.0643" width="70.3571" height="70.3571" transform="rotate(45 191.454 93.0643)" fill="white" />
                                <rect x="139.092" y="41" width="4.925" height="197" fill="white" />
                            </svg>
                        </div>
                        <div class="detail">
                            <h1>Welcome back</h1>
                            <p>Please enter your credentials to sign in</p>
                        </div>
                    </div>
                    <div class="login-form">
                        <div class="login-loading">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#EFF4F6;" />
                                        <stop offset="100%" style="stop-color:#1A61EC;" />
                                    </linearGradient>
                                </defs>
                                <style>
                                    .spinner_9y7u {
                                        animation: spinner_fUkk 2.4s linear infinite;
                                        animation-delay: -2.4s;
                                        fill: url(#gradient);
                                    }

                                    .spinner_DF2s {
                                        animation-delay: -1.6s;
                                    }

                                    .spinner_q27e {
                                        animation-delay: -.8s;
                                    }

                                    @keyframes spinner_fUkk {
                                        8.33% {
                                            x: 13px;
                                            y: 1px;
                                        }

                                        25% {
                                            x: 13px;
                                            y: 1px;
                                        }

                                        33.3% {
                                            x: 13px;
                                            y: 13px;
                                        }

                                        50% {
                                            x: 13px;
                                            y: 13px;
                                        }

                                        58.33% {
                                            x: 1px;
                                            y: 13px;
                                        }

                                        75% {
                                            x: 1px;
                                            y: 13px;
                                        }

                                        83.33% {
                                            x: 1px;
                                            y: 1px;
                                        }
                                    }
                                </style>
                                <rect class="spinner_9y7u" x="1" y="1" rx="1" width="10" height="10" />
                                <rect class="spinner_9y7u spinner_DF2s" x="1" y="1" rx="1" width="10" height="10" />
                                <rect class="spinner_9y7u spinner_q27e" x="1" y="1" rx="1" width="10" height="10" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="divide-wrap">
                    <input type="submit" value="Submit" disabled>
                    <span>Having a trouble?
                        <a class="blue-mark" href="">Reload</a>
                    </span>
                </div>
            </div>
        </aside>
    </section>
</body>

</html>