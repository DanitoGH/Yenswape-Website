<?php
require '../core/App.php';
require '../core/database/QueryBuilder.php';
require '../core/database/Connection.php';

App::bind('config',  require '../config.php');
$config = App::get('config');
//Connecting databse to the Query builder
App::bind('database', new QueryBuilder(
  Connection::make(App::get('config')['database'])
));

 $Pendings = App::get('database')->query('SELECT user_id,custom_id,poster_name,poster_mobile,uri FROM `ads` WHERE status=:status LIMIT 1', array(':status'=>0));
 foreach($Pendings as $Pending){
  $explod_url = explode(' ', str_replace('-',' ',$Pending[1])); //confirm ad uri validity
  @$Images = App::get('database')->query('SELECT ad_id FROM `images` WHERE ad_id=:ad_id LIMIT 1', array(':ad_id'=>$Pending[1]))[0]['ad_id'];
 if(strlen($Images) === 6 && strlen(end($explod_url)) === 6){
   App::get('database')->query('UPDATE `ads` SET status=:status WHERE custom_id=:ad_id', array(':status'=>1,'ad_id'=>$Pending[1]));
   $number = (int)$Pending[3]; //Poster number
   $new_seven_bit_msg = "Congratulations, your ad is now live on Yenswape.com, you can share it with friends or customers, https://www.yenswape.com/item/".$Pending[4];
   require '../controllers/Messages.php';
 }else{
   $number = (int)$Pending[3]; //Poster number
   $new_seven_bit_msg =  "Hi ".$Pending[2].", We're sorry your ad was not submitted successfully due to slow internet connectivity. We hope you can repost it again and have it approved in minutes. Thanks a lot for your patience.";
   require '../controllers/Messages.php';
   App::get('database')->query('DELETE FROM `ads` WHERE user_id=:userid LIMIT 1', array(':userid'=>$Pending[0]));
   App::get('database')->query('DELETE FROM `images` WHERE user_id=:userid LIMIT 1', array(':userid'=>$Pending[0]));
 }}
?>
