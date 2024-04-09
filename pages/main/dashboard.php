<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "im101";

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT admin_email FROM administrator";
$result = mysqli_query($connection, $query);

if ($result) {
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $admin_email = $row['admin_email'];
    mysqli_free_result($result);
  } else {
    $admin_email = "No admin email found";
  }
} else {
  echo "Error: " . mysqli_error($connection);
}

mysqli_close($connection);
?>


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
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
  <title>dashboard...</title>

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
  <section class="dash-container">
    <div class="dash-wrapper">
      <div class="dash-logo">
        <img src="../../public/img/fern-pout.png" alt="">
      </div>
      <div class="dash-details">
        <h1>Welcome here, <?php echo $admin_email; ?>.</h1>
        <span>ok u may log out naa!</span>
      </div>
      <a href="../../" class="func-out">
        <button>log out</button>
      </a>
    </div>
  </section>
</body>

</html>