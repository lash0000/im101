<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="../../public/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../../public/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="../../public/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="../../public/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../public/assets/index.css" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
  <title>IM101 - Sign Up</title>

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
              <h1>Welcome here</h1>
              <p>Please enter your details to sign up</p>
            </div>
          </div>
          <div class="login-form">
            <form action="" method="post">
              <div id="email-wrapper">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required>
              </div>
              <div id="pwd-wrap">
                <label for="password">Password</label>
                <div id="eye-wrapper">
                  <input type="password" id="password" name="password" required>
                  <!-- <span class="material-symbols-outlined" id="eye">
                  visibility
                </span> -->
                </div>
              </div>
              <a class="forgot-password" href="" hx-boost>Suggest password?</a>
          </div>
        </div>
        <div class="divide-wrap">
          <input type="submit" value="Submit">
          <span>Have an account?
            <a class="blue-mark" href="../../">Sign In</a>
          </span>
        </div>
        </form>
      </div>
    </aside>
  </section>
  <div class="user-type-wrapper">
    <div class="user-content user-type">
      <button id="drop-select">
        <span>
          Sign Up as Resident
        </span>
        <span class="material-symbols-outlined" id="animate-rotate">
          expand_circle_down
        </span>
      </button>
    </div>
  </div>
  <div id="dropdown" class="user-content" style="opacity: 0; display: none;">
    <button id="select-one" class="drop-selection">
      <span class="material-symbols-outlined" id="drop-round">
        group
      </span>
      <div class="select-desc">
        <span>Sign Up as Resident</span>
        <p>Sign up to access your resident portal.</p>
      </div>
    </button>
    <button id="select-two" class="drop-selection">
      <span class="material-symbols-outlined" id="drop-round">
        person
      </span>
      <div class="select-desc">
        <span>Sign up as Representative</span>
        <p>Sign up to access the resident management portal.</p>
      </div>
    </button>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
  <script src="../../public/assets/js/GSAP.js"></script>
</body>

</html>