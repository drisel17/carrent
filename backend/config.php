
<?php

/* Attempt to connect to MySQL database */
$conn = mysqli_connect('localhost', 'root', '', 'perfektRental');
$conn->error;
mysqli_set_charset($conn, "utf8");
?>