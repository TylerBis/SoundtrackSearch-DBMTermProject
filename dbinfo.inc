<?php // Database Connection

define('DB_SERVER', 'dnts-db-1.ci9vn2h0fxjz.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'myadmin');
define('DB_PASSWORD', 'Iamagenius1');
define('DB_DATABASE', 'dnts');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

?>