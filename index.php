<?php
session_start();

//Missing feature: Save to Session Storage (PHP Form) during Sign In and also Sign Up
$host = "localhost";
$username = "root";
$password = "";
$database = "im101";

$con = mysqli_connect($host, $username, $password, $database);

if (!$con) {
  echo 'no mysql / xampp' . mysqli_connect_error();
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email = mysqli_real_escape_string($con, $email);
  $password = mysqli_real_escape_string($con, $password);

  // Check in the administrator table
  $query_admin = "SELECT * FROM administrator WHERE admin_email = '$email' AND admin_pwd = '$password'";
  $result_admin = mysqli_query($con, $query_admin);

  // Check in the resident table
  $query_resident = "SELECT * FROM resident WHERE resident_email = '$email' AND resident_pwd = '$password'";
  $result_resident = mysqli_query($con, $query_resident);

  // Check in the representative table
  $query_representative = "SELECT * FROM representative WHERE kgwd_email = '$email' AND kgwd_pwd = '$password'";
  $result_representative = mysqli_query($con, $query_representative);

  if (mysqli_num_rows($result_admin) == 1) {
    $row = mysqli_fetch_assoc($result_admin);
    $_SESSION['loggedin'] = true;
    $_SESSION['user_type'] = 'administrator';
    $_SESSION['user_email'] = $row['admin_email'];
    header("Location: ./auth/load.php");
    exit();
  } elseif (mysqli_num_rows($result_resident) == 1) {
    $row = mysqli_fetch_assoc($result_resident);
    $_SESSION['loggedin'] = true;
    $_SESSION['user_type'] = 'resident';
    $_SESSION['user_email'] = $row['resident_email'];
    header("Location: ./auth/load.php");
    exit();
  } elseif (mysqli_num_rows($result_representative) == 1) {
    $row = mysqli_fetch_assoc($result_representative);
    $_SESSION['loggedin'] = true;
    $_SESSION['user_type'] = 'representative';
    $_SESSION['user_email'] = $row['kgwd_email'];
    header("Location: ./auth/load.php");
    exit();
  } else {
    echo '<div id="auth-failed" style="
          position: absolute;
          top: 5%;
          left: 50%;
          transform: translate(-50%, -50%);
          background: #FF6347;
          padding: 0.857em;
          font-size: 0.767em;
          color: white;
          border-radius: 4px;
          ">
          <span>Authentication failed. Please check your credentials.</span>
          </div>';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="apple-touch-icon" sizes="180x180" href="./public/assets/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./public/assets/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./public/assets/favicon/favicon-16x16.png">
  <link rel="manifest" href="./public/assets/favicon/site.webmanifest">
  <link rel="mask-icon" href="./public/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./public/assets/index.css" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,300,0,0" />
  <title>IM101 - Sign In</title>

</head>

<body>
  <!-- ayoko sa mobile view -->
  <div class="lg-hidden">
    <div class="lg-wrapper">
      <span>204: No Content</span>
      <p>This website is not applicable to mobile view and lower than 1024px monitor screen size
        kindly adjust the screen size of your browser if you're using mobile then
        quickly enable desktop site mode feature.</p>
    </div>
  </div>
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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div id="email-wrapper">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" required>
              </div>
              <div id="pwd-wrap">
                <label for="password">Password</label>
                <div id="eye-wrapper">
                  <input type="password" id="password" name="password" required />
                  <!-- <span class="material-symbols-outlined" id="eye">
                  visibility
                </span> -->
                </div>
              </div>
              <a class="forgot-password">Forgot password?</a>
          </div>
        </div>
        <div class="divide-wrap">
          <input type="submit" value="Submit">
          <span>Don't have an account?
            <a class="blue-mark" href="./pages/main/register.php">Sign Up</a>
          </span>
        </div>
        </form>
      </div>
    </aside>
  </section>
  <script>
    setTimeout(function() {
      const authFailed = document.getElementById('auth-failed');
      if (authFailed) {
        authFailed.style.display = 'none';
      }
    }, 2000);
  </script>
</body>

</html>