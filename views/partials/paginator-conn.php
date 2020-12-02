<?php

require __DIR__. '../vendor/autoload.php';

//Load .env file into config file

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
if(file_exists(".env")) {
   $dotenv->load();
   $dotenv->required(['DB_HOST','DB_NAME','DB_USER','DB_PASS']);
}

//Remote Host
$host = $_ENV['DB_HOST']; 
$user = $_ENV['DB_USER']; 
$pass = $_ENV['DB_PASS']; 
$db =   $_ENV['DB_NAME'];