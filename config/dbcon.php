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