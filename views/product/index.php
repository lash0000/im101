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
    <title>Treiven - Elevate your celebrations with our delicious pastries</title>
</head>

<body>
    <header class="nav-container">
        <nav class="nav-wrapper">
            <div class="nav-logo">
                <a href="../../">
                    <img src="../../public/trieven.svg" alt="" />
                </a>
            </div>
            <div class="nav-search">
                <input type="text" id="search-input" maxlength="60" placeholder="Search..." disabled>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#ffffff" class="nc-icon-wrapper">
                            <line x1="15.25" y1="15.25" x2="11.285" y2="11.285" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" data-color="color-2"></line>
                            <circle cx="7.75" cy="7.75" r="5" fill="none" stroke="#ffffff " stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                        </g>
                    </svg>
                </button>
            </div>
            <div class="right-side-wrapper">
                <div class="modal-info">
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
                <div class="auth-user-options">
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
                    <a href="../../views/client/register/">Sign up</a>
                </li>
                <li class="modal-links">
                    <a href="../../views/client/login/">Sign in</a>
                </li>
                <li class="modal-links">
                    <a href="https://github.com/lash0000/im101" target="_blank">GitHub Repository</a>
                </li>
            </div>
        </nav>
    </header>
    <!-- applicable for mobile lol -->
    <div class="appbar-container">
        <div class="appbar-wrapper">
            <button class="app-links" id="app-active">
                <a class="app-root app-active" href="../../">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M9.926,16.11c-.461,.092-.938,.14-1.426,.14-4.004,0-7.25-3.246-7.25-7.25S4.496,1.75,8.5,1.75s7.25,3.246,7.25,7.25c0,.264-.014,.524-.041,.78" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path d="M11.126,10.768l5.94,2.17c.25,.091,.243,.448-.011,.529l-2.719,.87-.87,2.719c-.081,.254-.438,.261-.529,.011l-2.17-5.94c-.082-.223,.135-.44,.359-.359Z" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></path>
                            <path d="M15.75,9c0-1.657-3.246-3-7.25-3S1.25,7.343,1.25,9c0,1.646,3.205,2.983,7.175,3" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path d="M11.486,8.293c-.147-3.672-1.428-6.543-2.986-6.543-1.657,0-3,3.246-3,7.25s1.343,7.25,3,7.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                        </g>
                    </svg>
                    <span>Explore</span>
                </a>
            </button>
            <button class="app-links">
                <a class="app-root" href="../../views/client/pages/carts.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <path d="M1.75,1.75l1.351,.338c.393,.098,.688,.424,.747,.825l1.153,7.838" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <path d="M15.25,13.25H4.5c-.69,0-1.25-.56-1.25-1.25h0c0-.69,.56-1.25,1.25-1.25H13.029c.43,0,.813-.275,.949-.684l1.333-4c.216-.648-.266-1.316-.949-1.316H4.118" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <circle cx="3.75" cy="15.75" r="1.25" fill="#212121" data-color="color-2" data-stroke="none" stroke="none"></circle>
                            <circle cx="14.25" cy="15.75" r="1.25" fill="#212121" data-color="color-2" data-stroke="none" stroke="none"></circle>
                        </g>
                    </svg>
                    <span>Carts</span>
                </a>
            </button>
            <button class="app-links">
                <a class="app-root" href="../../views/client/pages/abouts.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#212121" class="nc-icon-wrapper">
                            <circle cx="9" cy="9" r="7.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></circle>
                            <line x1="9" y1="12.819" x2="9" y2="8.25" fill="none" stroke="#212121" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></line>
                            <path d="M9,6.75c-.552,0-1-.449-1-1s.448-1,1-1,1,.449,1,1-.448,1-1,1Z" fill="#212121" data-color="color-2" data-stroke="none" stroke="none"></path>
                        </g>
                    </svg>
                    <span>About</span>
                </a>
            </button>
        </div>
    </div>

    <main class="product-container">
        <div class="product-wrapper">
            <div class="product-header">
                <div class="product-title">
                    <h1>Brownies W/ Walnuts</h1>
                </div>
                <div class="product-portrait">
                    <div class="node-one">
                        <img src="../../public/product-test/brown1.png" alt="">
                    </div>
                    <div class="node-two">
                        <img src="../../public/product-test/brown2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="product-grid-column">
                <div class="product-description">
                    <span>The Perfect Bite: Brownies with Walnuts</span>
                    <p>Brownies, those decadent squares of chocolatey goodness, have been a beloved treat for generations. But what elevates them to pure bliss? The addition of crunchy, toasted walnuts! Our Brownies with Walnuts offer the perfect marriage of textures and flavors, making them an irresistible indulgence.</p>
                    <p>The exact origin of the brownie is a bit of a mystery, with some stories tracing them back to 19th century American kitchens. Perhaps they were a result of a baker accidentally forgetting to add leavening to a chocolate cake batter. Regardless of their origin, brownies quickly rose to fame, and the addition of walnuts became a popular variation, adding a delightful textural contrast.</p>
                    <p>Our Brownies with Walnuts are crafted using only the finest ingredients. Rich, dark chocolate forms the base, delivering a deep, satisfying flavor. We then fold in generous amounts of toasted walnuts, their nutty aroma and satisfying crunch perfectly complementing the chocolatey richness. Every bite is a delightful symphony of textures and flavors.</p>
                    <p>The beauty of our Brownies with Walnuts lies in the perfect balance between the decadent chocolate and the nutty crunch. We use only the finest Belgian chocolate, known for its rich and intense flavor. The toasted walnuts add a delightful textural contrast, creating a truly unforgettable experience.</p>
                    <p>These brownies are more than just a delicious treat. They are perfect for sharing with loved ones, bringing a touch of joy to any occasion. Whether you're celebrating a special event or simply enjoying a quiet moment of self-care, Treiven's Brownies with Walnuts are the perfect indulgence..</p>
                    <p>Here at Treiven, we believe in using only the highest quality ingredients and time-tested techniques to create our baked goods. Each brownie is a labor of love, crafted with passion to deliver a taste sensation that will leave you wanting more. Order yours today and experience the difference Treiven makes!</p>
                </div>
                <div class="product-option">
                    <div class="product-first-column">
                        <div class="product-price">
                            <span class="pricey">₱50.00</span>
                            <div class="product-status">
                                <div class="just-circle"></div>
                                <span>Avaiable stocks</span>
                            </div>
                        </div>
                        <div class="quantity-input">
                            <label>Quantity</label>
                            <input type="number" class="quantity" id="quantity" value="1" min="1">
                        </div>
                        <button class="add-to-cart">
                            Add to Cart
                        </button>
                    </div>
                    <div class="product-last-column">
                        <span class="last-header">Price details</span>
                        <div class="total-price">
                            <span>Total price</span>
                            <span>₱0,000</span>
                        </div>
                        <div class="total-price">
                            <span>VAT fee (12%)</span>
                            <span>₱0,000</span>
                        </div>
                        <div class="total-price">
                            <span>Promo discount fee</span>
                            <span>₱0,000</span>
                        </div>
                        <div class="total-price">
                            <span>Total Amount</span>
                            <span>₱0,000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="../../views/client/responsive.js"></script>
</body>

</html>