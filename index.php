<?php
$oracle_dbname = "im101";
$oracle_pass = "Eyelashmelon01";
$oracle_host = "localhost/orcl";

$conn = oci_connect($oracle_dbname, $oracle_pass, $oracle_host);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} else {
    echo "Connected to Oracle database!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>