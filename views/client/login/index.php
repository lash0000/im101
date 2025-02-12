<?php
$mysql_hostname = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "im101-pastry";

$conn = mysqli_connect($mysql_hostname, $mysql_username, $mysql_password, $mysql_database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashed_password = hash('sha256', $password); // Assuming SHA-256
    $user_query = "SELECT * FROM treiven_user_accounts WHERE trv_user_email = '$email'";
    $user_result = mysqli_query($conn, $user_query);
    $admin_query = "SELECT * FROM treiven_adminpanel WHERE trv_admin_email = '$email'";
    $admin_result = mysqli_query($conn, $admin_query);

    if (mysqli_num_rows($user_result) > 0) {
        $row = mysqli_fetch_assoc($user_result);
        $stored_password = $row['trv_user_pwd'];
        if ($hashed_password === $stored_password) {
            session_start();
            $_SESSION['user_role'] = 'customer';
            header("Location: ../../auth/index.php");
            exit();
        }
    } elseif (mysqli_num_rows($admin_result) > 0) {
        $admin_row = mysqli_fetch_assoc($admin_result);
        $admin_stored_password = $admin_row['trv_admin_pwd'];

        if ($hashed_password === $admin_stored_password) {
            session_start();
            $_SESSION['user_role'] = 'admin/seller';
            header("Location: ../../adminpanel/index.php");
            exit();
        }
    }

    // If no matching user or admin found
    echo "Invalid email or password. Please try again.";

    mysqli_close($conn);
}
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
    <link rel="manifest" href="../../../public/favicon/site.webmanifest">
    <link rel="mask-icon" href="../../../public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <script src="https://unpkg.com/htmx.org@1.9.11" integrity="sha384-0gxUXCCR8yv9FM2b+U3FDbsKthCI66oH5IA9fHppQq9DDMHuMauqq1ZHBpJxQ0J0" crossorigin="anonymous"></script>
    <title>Treiven - Sign In</title>
</head>

<body style="overflow: hidden;">

    <main class="login-grid-wrapper">
        <section class="login-container">
            <div class="brand-logo">
                <a href="../../../">
                    <img src="../../../public/trieven.svg" alt="" />
                </a>
            </div>
            <div class="login-wrapper">
                <header class="login-title">
                    <label>Sign in</label>
                    <p>Nice to see you again!</p>
                </header>
                <form id="loginForm" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" style="margin-bottom: 12px;">Proceed</button>
                    <aside class="login-options">
                        <span>New to Treiven? <a href="../../../views/client/register/">Sign Up</a></span>
                    </aside>
                </form>
                <aside class="login-info">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                        <g fill="#F47B37" class="nc-icon-wrapper">
                            <path d="M9.305,1.848l5.25,1.68c.414,.133,.695,.518,.695,.952v6.52c0,3.03-4.684,4.748-5.942,5.155-.203,.066-.413,.066-.616,0-1.258-.407-5.942-2.125-5.942-5.155V4.48c0-.435,.281-.82,.695-.952l5.25-1.68c.198-.063,.411-.063,.61,0Z" fill="none" stroke="#F47B37" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path>
                            <polyline points="6.497 9.75 8.106 11.25 11.503 6.75" fill="none" stroke="#F47B37" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" data-color="color-2"></polyline>
                        </g>
                    </svg>
                    <span>Agile Security - We ensure your data is secure and private all times.</span>
                </aside>
            </div>
        </section>
        <section class="login-banner">
            <div class="banner-wrap">
                <a href="https://www.facebook.com/permalink.php?story_fbid=pfbid02RfSs8YPx9wh3SZdwkYJwPXu5JscRxixPybKaeRwoQrTGrMoDQP7yG7NUg7AXbsMDl&id=100091824182246" target="_blank" rel="noopener noreferrer"><span>Bento Cake w/ Flower by Tréiven</span></a>
            </div>
        </section>
    </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>

</html>