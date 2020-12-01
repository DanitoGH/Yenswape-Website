<?php
 require __DIR__. '../vendor/autoload.php';

 //Load .env file into config file
 $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
 $dotenv->load();
 $dotenv->required(['DB_CONNECTION','DB_HOST','DB_NAME','DB_USER','DB_PASS']);

//Remote Host
 return [
  'database' => [
  'name' => $_ENV['DB_NAME'],
  'username' => $_ENV['DB_USER'],
  'password' => $_ENV['DB_PASS'],
  'connection' => $_ENV['DB_CONNECTION'].':'.'host='.$_ENV['DB_HOST'],
  'options' => [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]
 ] 
];