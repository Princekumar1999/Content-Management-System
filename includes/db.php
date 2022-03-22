<?php 

// Creating an associative array 
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'root';
$db['db_name'] = 'cms';

// Foreach loop for converting all keys to Uppercase letter
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($connection){
    echo "Connection stablished";
}else{
    echo "Not connected to database";
}

?>