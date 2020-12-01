<?php
 session_start();
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
 ini_set('memory_limit','128M'); //Increasing Mysql memory size to handle more data and to avoid future errors

 require 'vendor/autoload.php';
 
 // import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;
	
 class UsersController{

 //PC Load latest ads on index page load
 public function Latestlistings(){
   
   $limit = (deviceDetector() == "Computer") ? 20 : 13;
   $latest_ads = App::get('database')->latestadsInfo($limit);
   if($latest_ads){
       $adInfo = array();
       $adImges = array();
       $postDate = array();
       $priceFormat = array();
    foreach ($latest_ads as $latest){
       $custom_id = $latest->custom_id;
       $adInfo[] = $latest;
       $postDate[] = formatTimeAgo($latest->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
    foreach ($imgs as $img){
        $adImges[] = $img;
      }}
       echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
     }
   }

  //PC Load latest ads on index page load with offset
  public function LatestListingsOffset(){
      $offset = htmlspecialchars($_POST["offset"]);
      if($latest_ads = App::get('database')->Latestadsoffset($offset)){
        $adInfo = array();
        $adImges = array();
        $postDate = array();
        $priceFormat = array();
      foreach ($latest_ads as $latest){
        $custom_id = $latest->custom_id;
        $adInfo[] = $latest;
        $postDate[] = formatTimeAgo($latest->datetime);
        $priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
        $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
      foreach ($imgs as $img){
        $adImges[] = $img;
        }}
        echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
      }
   }

   //Loading user Shop ads (New method)
   public function loadUserads(){
      $user_id = htmlspecialchars($_POST["user_id"]);
      if($userAds = App::get('database')->userAds($user_id)){
        $adInfo = array();
        $adImges = array();
        $postDate = array();
        $priceFormat = array();
      foreach ($userAds as $userAd){
        $custom_id = $userAd->custom_id;
        $adInfo[] = $userAd;
        $postDate[] = formatTimeAgo($userAd->datetime);
        $priceFormat[] = number_format_drop_zero_decimals($userAd->value, 2);
        $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
      foreach ($imgs as $img){
        $adImges[] = $img;
        }}
        echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
      }
   }

  //Loading user Shop ads
  public function loadShopads(){
     $owner_id = htmlspecialchars($_POST["user_id"]);
    if($latest_ads = App::get('database')->loadShopAds($owner_id)){
       $adInfo = array();
       $adImges = array();
       $postDate = array();
       $priceFormat = array();
    foreach ($latest_ads as $latest){
       $custom_id = $latest->custom_id;
       $adInfo[] = $latest;
       $postDate[] = formatTimeAgo($latest->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
    foreach ($imgs as $img){
       $adImges[] = $img;
       }}
       echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
     }
  }

  //Loading user Shop ads
  public function loadShopadsoffset(){
     $id = htmlspecialchars($_POST["user_id"]);
     $offset = htmlspecialchars($_POST["offset"]);
    if($latest_ads = App::get('database')->loadshopAdsOffset($id,$offset)){
       $adInfo = array();
       $adImges = array();
       $postDate = array();
       $priceFormat = array();
    foreach ($latest_ads as $latest){
       $custom_id = $latest->custom_id;
       $adInfo[] = $latest;
       $postDate[] = formatTimeAgo($latest->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
    foreach ($imgs as $img){
       $adImges[] = $img;
       }}
       echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
     }
  }

 // End of PC web app
  public function getLikes(){
  $user = isLoggedIn();
  if($user > 0){
  $dateDay = date("d");
  $dateM = date("m-");
  $dateY = date("Y-");

  //For day likes
  $start = $dateY.$dateM.$dateDay.' '.'00:00:00';
  $enddate = $dateY.$dateM.$dateDay.' '.'23:59:59';

  //Week 1 likes
  $Week_1start = $dateY.$dateM.'01'.' '.'00:00:00';
  $Week_1enddate = $dateY.$dateM.'07'.' '.'23:59:59';

  //Week 2 likes
  $Week_2start = $dateY.$dateM.'08'.' '.'00:00:00';
  $Week_2enddate = $dateY.$dateM.'14'.' '.'23:59:59';

  //Week 3 likes
  $Week_3start = $dateY.$dateM.'15'.' '.'00:00:00';
  $Week_3enddate = $dateY.$dateM.'21'.' '.'23:59:59';

  //Week 4 likes
  $Week_4start = $dateY.$dateM.'22'.' '.'00:00:00';
  $Week_4enddate = $dateY.$dateM.'31'.' '.'23:59:59';

  //Month likes
  $Monthstart = $dateY.$dateM.'01'.' '.'00:00:00';
  $Monthenddate = $dateY.$dateM.'31'.' '.'23:59:59';

  //Year likes
  $Yearstart = $dateY.'01-'.'01'.' '.'00:00:00';
  $Yearenddate = $dateY.'12-'.'31'.' '.'23:59:59';

  // Daily likes query
  $day = App::get('database')->likesGraph($user,$start,$enddate);
  // Weekly likes query
  if($dateDay >= 1 && $dateDay < 8){
  $week = App::get('database')->likesGraph($user,$Week_1start,$Week_1enddate);
  }elseif ($dateDay >= 8  && $dateDay < 15) {
  $week = App::get('database')->likesGraph($user,$Week_2start,$Week_2enddate);
  }elseif ($dateDay >= 15 && $dateDay < 22) {
  $week = App::get('database')->likesGraph($user,$Week_3start,$Week_3enddate);
  }elseif ($dateDay >= 22 && $dateDay < 32) {
  $week = App::get('database')->likesGraph($user,$Week_4start,$Week_4enddate);
  }
  // Monthly likes query
  $month = App::get('database')->likesGraph($user,$Monthstart,$Monthenddate);
  // Yearly likes query
  $year = App::get('database')->likesGraph($user,$Yearstart,$Yearenddate);

  echo $day."\\".$week."\\".$month."\\".$year;
  }}


 public function getViews(){
 $user = isLoggedIn();
 if($user > 0){
 $dateDay = date("d");
 $dateM = date("m-");
 $dateY = date("Y-");

 //Day views
 $start = $dateY.$dateM.$dateDay.' '.'00:00:00';
 $enddate = $dateY.$dateM.$dateDay.' '.'23:59:59';

 //Week 1 views
 $Week_1start = $dateY.$dateM.'01'.' '.'00:00:00';
 $Week_1enddate = $dateY.$dateM.'07'.' '.'23:59:59';

 //Week 2 views
 $Week_2start = $dateY.$dateM.'08'.' '.'00:00:00';
 $Week_2enddate = $dateY.$dateM.'14'.' '.'23:59:59';

 //Week 3 views
 $Week_3start = $dateY.$dateM.'15'.' '.'00:00:00';
 $Week_3enddate = $dateY.$dateM.'21'.' '.'23:59:59';

 //Week 4 views
 $Week_4start = $dateY.$dateM.'22'.' '.'00:00:00';
 $Week_4enddate = $dateY.$dateM.'31'.' '.'23:59:59';

 //Monthly views
 $Monthstart = $dateY.$dateM.'01'.' '.'00:00:00';
 $Monthenddate = $dateY.$dateM.'31'.' '.'23:59:59';

 //Yearly views
 $Yearstart = $dateY.'01-'.'01'.' '.'00:00:00';
 $Yearenddate = $dateY.'12-'.'31'.' '.'23:59:59';
 //Dialy views query
 $day = App::get('database')->viewsGraph($user,$start,$enddate);
 //Weekly views query
 if($dateDay >= 1 && $dateDay < 8){
 $week = App::get('database')->viewsGraph($user,$Week_1start,$Week_1enddate);
 }elseif ($dateDay >= 8  && $dateDay < 15) {
 $week = App::get('database')->viewsGraph($user,$Week_2start,$Week_2enddate);
 }elseif ($dateDay >= 15 && $dateDay < 22) {
 $week = App::get('database')->viewsGraph($user,$Week_3start,$Week_3enddate);
 }elseif ($dateDay >= 22 && $dateDay < 32) {
 $week = App::get('database')->viewsGraph($user,$Week_4start,$Week_4enddate);
 }
 //Monthly views query
 $month = App::get('database')->viewsGraph($user,$Monthstart,$Monthenddate);
 //Yearly views query
 $year = App::get('database')->ViewsGraph($user,$Yearstart,$Yearenddate);
 foreach ($day as $dayViews){}
 foreach ($week as $weekViews){}
 foreach ($month as $monthViews){}
 foreach ($year as $yearViews){}
   echo $dayViews[0]."\\".$weekViews[0]."\\".$monthViews[0]."\\".$yearViews[0];
 }}


 public function listing_Types(){
     $user = isLoggedIn();
     if($user > 0){
     //Getting selling ads
     $sellingaAds = App::get('database')->listingTypes($user,'Sell');
     //Getting Trading ads
     $swappingaAds = App::get('database')->listingTypes($user,'Swap');
     //Getting Trading or Selling ads
     $swaporsellAds = App::get('database')->listingTypes($user,'Swap or Sell');
     //Getting Rent ads
     $rentAds = App::get('database')->listingTypes($user,'Rent');
     //Getting Job Offere ads
     $job_offerAds = App::get('database')->listingTypes($user,'job_Offer');
     //Getting Job Seeking ads
     $job_seekingAds = App::get('database')->listingTypes($user,'Job_Seeking');

     echo $sellingaAds."\\".$swappingaAds."\\".$swaporsellAds."\\".$rentAds."\\".$job_offerAds."\\".$job_seekingAds;
     }
  }


 public function Sold_ad(){
   $user = 0;
   if(isLoggedIn()){
     $user = isLoggedIn();
   }else {
   $user = htmlspecialchars($_POST["user_id"]);
   }
   $adid =  htmlspecialchars($_POST["ad_id"]);

   if($adid != '' && $user != 0){
    App::get('database')->query('UPDATE ads SET status=:status WHERE user_id=:user AND custom_id=:ad_id', array(':status'=>2,'user'=>$user,'ad_id'=>$adid));
    echo "success";
  }else {
    echo "error";
  }
 }

 //Deleting Ad
 public function adDelete(){
   $user = 0;
   $adid =  htmlspecialchars($_POST["ad_id"]);
   if(isLoggedIn()){$user = isLoggedIn();}else {$user = htmlspecialchars($_POST["user_id"]);}
   $delete_img = App::get('database')->query('SELECT * FROM images WHERE user_id=:userid  AND ad_id=:adid', array(':userid'=>$user,':adid'=>$adid));
   $img_count = 0;
    foreach($delete_img as $delete){
    $path_small = 'images/user-submitted/thumb/xs/'.$delete[3];
    $path_big = 'images/user-submitted/thumb/'.$delete[3];
    $img_count++;
    if(unlink($path_small)){
    if(unlink($path_big)){
      /*echo "Deleted"; */
     }else {
      /*echo "fail"; */
     }
     }else{
     /*echo "fail"; */
     }
    }
  if($img_count == sizeof($delete_img)){
      App::get('database')->removeAds2('images',$adid);
      App::get('database')->removeAds2('ads_reports',$adid);
      App::get('database')->removeAds2('chat',$adid);
      App::get('database')->removeAds2('chat_log',$adid);
      App::get('database')->removeAds2('likes',$adid);
      App::get('database')->removeAds2('views',$adid);
      App::get('database')->removeAds1($user,$adid);
      echo "Your ad has been deleted successfully";
    }
 }

 public function adLikes(){
   if(isset($_POST["ad_id"])){
    $adid =  $_POST["ad_id"];
    $poster =  $_POST["poster"];
    $user_id = isLoggedIn();
    if(isLoggedIn()){
    if(!App::get('database')->query('SELECT * FROM likes WHERE user=:userid  AND ad_id=:adid ', array(':userid'=>$user_id,':adid'=>$adid))){
    App::get('database')->query('INSERT INTO likes VALUES (id, :ad_id,:poster_id,:user,:datetime)', array(':ad_id'=>$adid,':poster_id'=>$poster,':user'=>$user_id,'datetime'=>date('Y-m-d H:i:s')));
    echo "success";
    }else {
    App::get('database')->query('DELETE FROM likes WHERE user=:userid  AND ad_id=:adid LIMIT 1', array(':userid'=>$user_id,':adid'=>$adid));
    echo "exist";
    }
    }else {
    echo 'error';
    }
  }}


public function allLikes(){
 if(isset($_POST["ad_id"])){
  $adid =  $_POST["ad_id"];
  $user_id = isLoggedIn();
  if(isLoggedIn()){
  $ad_likes = App::get('database')->query('SELECT * FROM likes WHERE user=:userid  AND ad_id=:adid ', array(':userid'=>$user_id,':adid'=>$adid));
  echo count($ad_likes);
  }
  }}


public function countLikes(){
  if(isset($_POST["ad_id"])){
   $adid =  $_POST["ad_id"];
   $user_id = isLoggedIn();
  if(isLoggedIn()){
   $ad_likes = App::get('database')->query('SELECT * FROM likes WHERE ad_id=:adid ', array(':adid'=>$adid));
   echo count($ad_likes);
  }
  }}


public function insertChat_logs(){
  $session_id = chatSession();
  $user_id = htmlspecialchars(trim($_POST['user']));
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $owner = htmlspecialchars(trim($_POST['owner']));
   if($user_id != '' || $user_id != null && $ad_id != '' || $ad_id != null){
     if(App::get('database')->query('SELECT * FROM chat_log WHERE ad_id=:ad_id AND user_id=:user_id' , array(':ad_id'=>$ad_id,':user_id'=>$user_id))) {
        echo "exist";
      }else {
        App::get('database')->query('INSERT INTO  chat_log VALUES (id,:ad_id,:user_id,:owner_id,:session_id)',
        array(':ad_id'=>$ad_id,':user_id'=>$user_id,':owner_id'=>$owner,':session_id'=>$session_id));
        echo "success";
     }
     }else {
     echo "data-missing";
   }
}


public function Chat(){
  $user_id = isLoggedIn();
  $ownerid = htmlspecialchars(trim($_POST['ownerid']));
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $message = htmlspecialchars(trim($_POST['message']));
  $session = htmlspecialchars(trim($_POST['session']));
  $buyer = htmlspecialchars(trim($_POST['buyer']));
  $time = htmlspecialchars(trim($_POST['time']));
 if($user_id !='' && $ownerid !='' &&  $ad_id!=''){
    App::get('database')->query('INSERT INTO  chat VALUES (id,:ad_id,:sender_id,:owner_id,:message,:photo,:buyer_id,:time,:session_id,:status)',
    array(':ad_id'=>$ad_id,':sender_id'=>$user_id,':owner_id'=>$ownerid,':message'=>$message,':photo'=>'',':buyer_id'=>$buyer,':time'=>$time,':session_id'=>$session,':status'=>0));
  }else {
    echo "Unknown error ahs occurred";
  }
}


public function chatPhoto(){
  $user_id = isLoggedIn();
  $ownerid = htmlspecialchars(trim($_POST['ownerid']));
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $session = htmlspecialchars(trim($_POST['session']));
  $buyer = htmlspecialchars(trim($_POST['buyer_id']));
  $time = htmlspecialchars(trim($_POST['time']));

  //Image upload function 1 (source at boostrap file 'core/boostrap')
  imageUploader1($_FILES['file']['name'],$_FILES['file']['tmp_name'],$_FILES['file']['size'],169,"images/user-submitted/thumb/xs/");

   if(!isset($img_errors)){
       $blank  = '';
      if($user_id !='' && $ownerid !='' &&  $ad_id!=''){
         App::get('database')->query('INSERT INTO  chat VALUES (id,:ad_id,:sender_id,:owner_id,:message,:photo,:buyer_id,:time,:session_id,:status)',
         array(':ad_id'=>$ad_id,':sender_id'=>$user_id,':owner_id'=>$ownerid,':message'=>$blank,':photo'=>$_SESSION['image_new_name'],':buyer_id'=>$buyer,':time'=>$time,':session_id'=>$session,':status'=>0));
         //echo "success";
       }else {
        // echo "error";
       }
     }else {
      //  echo $img_errors;
   }
}

public function fetchChat(){
  $user_id = isLoggedIn();
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $owner = htmlspecialchars(trim($_POST['owner']));
  $session = htmlspecialchars(trim($_POST['session']));
  App::get('database')->query('UPDATE chat SET status=:status WHERE session_id=:session_id  AND sender_id!=:user_id', array(':session_id'=>$session,':status'=>1,':user_id'=>$user_id));
  if(isLoggedIn()){
    if($chats = App::get('database')->getChats($session)){
     foreach ($chats as $chat) {
       echo $chat->ad_id;
       echo "\\";
       echo $chat->sender_id;
       echo "\\";
       echo $chat->owner_id;
       echo "\\";
       echo $chat->buyer_id;
       echo "\\";
       echo $chat->message;
       echo "\\";
       echo $chat->photo;
       echo "\\";
       echo $chat->status;
       echo "\\";
       echo $chat->time;
       echo "\n";
     }
     }else {
       //echo "No";
     }
  }
}


 public function reports()
  {
   $user_id = htmlspecialchars(trim($_POST['user_id']));
   $ad_id = htmlspecialchars(trim($_POST['ad_id']));
   $reason = htmlspecialchars(trim($_POST['reason']));
   $massage = htmlspecialchars(trim($_POST['massage']));
   if(strlen($massage) < 4 || strlen($massage) > 500){
     $errors = "Sorry your comment is too short or too long!";
     }
  if(!isset($errors)){
     App::get('database')->query('INSERT INTO  ads_reports VALUES (id, :user_id, :ad_id, :reason, :comment, :datetime)',
     array(':user_id'=>$user_id,':ad_id'=>$ad_id,':reason'=>$reason, ':comment'=>$massage, ':datetime'=>$time=date('Y-m-d H:i:s')));
     echo  $errors = "success";
  }else {
    echo $errors;
  }
}


public function contactUs()
  {
  $fullname = htmlspecialchars(trim($_POST['fullname']));
  $mobile = htmlspecialchars(trim($_POST['mobile']));
  $email = htmlspecialchars(trim($_POST['email']));
  $message = htmlspecialchars(trim($_POST['message']));

  if(strlen($fullname) < 3){
    $errors = 'error-1';
  }
  if(!empty($mobile) && empty($email) || !empty($email)){
   if(!preg_match('/^[0-9]*$/', $mobile)){
      $errors = 'error-2';
     if(strlen($mobile) < 10 || strlen($mobile) > 10){
      $errors = 'error-2';
     }
   }
  }
if(strlen($email) > 4){
  if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
    $errors = 'error-3';
  }
}
if(empty($email) && empty($mobile)){
  $errors = 'error-4';
 }
if(!strlen($message) < 5){
  if(!isset($errors)){
    App::get('database')->query('INSERT INTO  `enquries` VALUES (id, :senders_fullname,:message,:mobile,:email,:datetime)',
    array(':senders_fullname'=>$fullname,':message'=>$message,':mobile'=>$mobile,':email'=>$email,'datetime'=>date('Y-m-d H:i:s')));
    echo  $errors = "success";
   }else {
   echo $errors;
}
}else {
  $errors = 'error-5';
 }
}



 public function userLogin()
   {
   $mobile = htmlspecialchars(trim($_POST['mobile']));
   $pin = htmlspecialchars(trim($_POST['pin']));
   if(!empty($mobile) && !empty($pin)){
   if(strlen($mobile) == 10) {
     if($mobile !=''){
      if(preg_match('/[0-9_]+/', $mobile)){
          if(strlen($pin) == 6){
            if(App::get('database')->query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))) {
                    if(password_verify($pin, App::get('database')->query('SELECT pin FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['pin'])){
                            $cstrong = True;
                            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                            $user_id = App::get('database')->query('SELECT id FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['id'];
                            App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));

                            if(isset($_POST['remember_me'])){
                             $valid = 60;
                            }else {
                             $valid = 7;
                            }
                            setcookie("SNID", $token, time() + 60 * 60 * 24 * $valid, '/', NULL, NULL, TRUE);
                            setcookie("SNID_", 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                            $browser = detectBrowsers();
                            $ip = getIp();
                            $device = deviceDetector();
                            $brand = detectMobilebrand();
                            $os = detectOS();
                            //login_security
                           if(App::get('database')->query('SELECT * FROM login_security WHERE user_ref=:user_ref', array(':user_ref'=>$user_id))){
                             if(!App::get('database')->query('SELECT * FROM login_security WHERE user_ref=:user_ref  AND ip=:ip', array(':user_ref'=>$user_id,':ip'=>$ip))){
                               if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref AND unknown_device_logins=:unknown_device_logins', array(':user_ref'=>$user_id,':unknown_device_logins'=>1))){
                                 $msg_body = 'Your Yenswape Account was just signed in to from a new'." $os ".' device with '." $browser ".'browser. You\'re getting this SMS to make sure it was you.';  //Sms body
                                 $msg_reciever = $mobile; //SMS sender number
                                 
                                 include_once 'Messages.php';
                                 App::get('database')->query('INSERT INTO login_security VALUES (id, :ip, :device, :brand, :browser, :OS, :user_ref)', array(':ip'=>$ip,':device'=>$device,':brand'=>$brand,':browser'=>$browser,':OS'=>$os, ':user_ref'=>$user_id));
                               }
                             }
                             echo 'Welcome';
                           }else{
                             App::get('database')->query('INSERT INTO login_security VALUES (id, :ip, :device, :brand, :browser, :OS, :user_ref)', array(':ip'=>$ip,':device'=>$device,':brand'=>$brand,':browser'=>$browser,':OS'=>$os, ':user_ref'=>$user_id));
                           }
                     }else{
                       echo'Incorrect pin code!';
                    }
                    } else{
                    echo 'User not registered!';
                    }
          }else {
            echo'Invalid pin code!';
          }
        }else {
           echo 'Invalid mobile number or pin!';
        }
      }else
      {
        echo 'Invalid mobile number or pin code!';
      }
    }else {
        echo'Please check your mobile number!';
    }
  }else{
     echo 'All fields  are required!';
  }
 }

 public function pinSender()
   {
     $mobile =  htmlspecialchars(trim($_POST['mobile']));
    if(!App::get('database')->query('SELECT * FROM users WHERE  mobile=:mobile', array(':mobile'=>$mobile))){
       if(App::get('database')->query('SELECT * FROM codes WHERE mobile=:mobile', array(':mobile'=>$mobile))){
         App::get('database')->query('DELETE FROM codes WHERE mobile=:mobile LIMIT 1', array(':mobile'=>$mobile));
         }
         if(!empty($mobile)){
              if (preg_match('/[0-9_]+/', $mobile)){
                if(strlen($mobile) == 10) {

                  $code = sms_code();
                  $msg_body = 'Your account pin code is,'.' '.$code;  //Sms body
                  $msg_reciever = $mobile; //SMS sender number
                  include_once 'Messages.php';

                   if (!empty($code && $mobile)){
                      App::get('database')->insert('codes',[
                        'code' =>password_hash($code, PASSWORD_BCRYPT),
                        'mobile' =>$mobile
                      ]);
                      echo 'success';
                     }else {
                       echo 'Error occured, please try again.';
                     }
                }else {
                  echo 'Invalid mobile number!';
                }
                }else {
                  echo'Invalid mobile number!';
                }
      }else {
       echo 'Mobile text field is empty!';
     }
 }
 else{
 echo 'Sorry this mobile number already exist on our database!';
}}



 public function userRegister()
  {
  $fname = htmlspecialchars(trim($_POST['fname']));
  $lname = htmlspecialchars(trim($_POST['lname']));
  $mobile = htmlspecialchars(trim($_POST['mobile']));
  $pin = htmlspecialchars(trim($_POST['pin']));
  $user_ref = user_ref();// user reference function

  if(!empty($fname)){
  if(strlen($fname) > 2 && strlen($fname) < 13){
  if(!empty($lname)){
  if(strlen($lname) > 2 && strlen($lname) < 13){
  if(!empty($mobile)){
  if(strlen($mobile) < 11 && strlen($mobile) > 9 && preg_match('/[0-9_]+/', $mobile)){
  if(strlen($pin) > 5 && strlen($pin) < 7  && preg_match('/[0-9_]+/', $pin)){
  if(!empty($pin)){
   if(App::get('database')->query('SELECT * FROM codes WHERE  mobile=:mobile', array(':mobile'=>$mobile))  &&
      password_verify($pin, App::get('database')->query('SELECT code FROM codes WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['code'])
      )
       {
         $device = deviceDetector();
         $brand = detectMobilebrand();
         $os = detectOS();
         App::get('database')->query('INSERT INTO users VALUES (id,:fname,:lname,:mobile,:email,:pin,:device,:brand,:os,:facebook_id,:user_ref,:app_type,:reg_date)', array(':fname'=>$fname,':lname'=>$lname,':mobile'=>$mobile,':email'=>'',':pin'=>password_hash($pin, PASSWORD_BCRYPT),':device'=>$device,':brand'=>$brand,':os'=>$os,':facebook_id'=>'',':user_ref'=>$user_ref,':app_type'=>'web','reg_date'=>$time = date('Y-m-d H:i:s')));
         App::get('database')->query('DELETE FROM codes WHERE mobile=:mobile LIMIT 1', array(':mobile'=>$mobile));
         $cstrong = True;
         $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
         $user_id = App::get('database')->query('SELECT id FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['id'];
         App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
         App::get('database')->query('INSERT INTO notifications VALUES (id, :unknown_device_logins,:approved_ads,:chat_notifications,:general_notifications,:user_ref)', array(':unknown_device_logins'=>1,':approved_ads'=>1,':chat_notifications'=>1,':general_notifications'=>1,':user_ref'=>$user_id));
         setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
         setcookie("SNID_", 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
         echo "Success";
        }
       else
       {
       echo 'Please check your pin code or mobile number!';
       }
     }else {
       echo "pin_error2";
     }

    }else{
       echo "pin_error1";
    }
    }else {
      echo "mobile_error1";
   }
    }else {
     echo 'mobile_error1';
  }
  }
   else {
     echo "last_error2";
   }
  }else {
   echo "last_error1";
  }
   }else{
     echo "first_error2";
  }
   }else
  {
 echo "first_error1";
  }
}


 public function Saveuser_infoUpdate(){
 $user_id = isLoggedIn();
 $fname = ucfirst(trim(htmlspecialchars($_POST['fname'])));
 $lname = ucfirst(trim(htmlspecialchars($_POST['lname'])));
 $mobile = trim(htmlspecialchars($_POST['mobile']));
 $email = trim(htmlspecialchars($_POST['email']));

 if(!strlen($fname) < 3 || !strlen($fname) > 12){
   if(!strlen($lname) < 3 || !strlen($lname) > 12){
     if(!strlen($mobile) < 10 || !strlen($mobile) > 10){
       if(preg_match('/^[0-9]*$/', $mobile)){
        App::get('database')->query('UPDATE `users` SET fname=:fname, lname=:lname, mobile=:mobile, email=:email WHERE id=:user_id', array(':fname'=>$fname,':lname'=>$lname,':mobile'=>$mobile,':email'=>$email,':user_id'=>$user_id));
        echo "done";
       }else {
         echo "Invalid mobile number!";
       }
      }else {
       echo "Invalid mobile number!";
     }
    }else {
     echo "Your Lastname is too short or too long!";
   }
  }else {
    echo "Your Firstname is too short or too long!";
 }
 }

 public function Delete_user(){
   $user_id = isLoggedIn();
   App::get('database')->query('DELETE FROM `ads` WHERE user_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `chat_log` WHERE owner_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `chat` WHERE 	owner_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `images` WHERE user_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `lastseen` WHERE user_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `views` WHERE user_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `login_tokens` WHERE user_id=:userid', array(':userid'=>$user_id));
   App::get('database')->query('DELETE FROM `user` WHERE id=:userid', array(':userid'=>$user_id));
   echo "delected";
  }

  public function recoverPin()
   {
   $code = sms_code();
    $reset_number = htmlspecialchars($_POST['mobile']);
    if(is_numeric($reset_number)){
      if(App::get('database')->query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$reset_number))) {
        App::get('database')->query('UPDATE users SET pin=:pin WHERE mobile=:mobile', array(':mobile'=>$reset_number,':pin'=>password_hash($code, PASSWORD_BCRYPT)));
        $msg_body = 'This is your new PIN to your account  ;' .$code. ' thanks.';  //Sms body
        $msg_reciever = $reset_number; //SMS sender number
        include_once 'Messages.php';
        echo 'New pin has been sent to your phone.';
       }else {
        echo 'Sorry this user do not exist!';
      }
    }
  }

 public function Account_change(){
   $id = htmlspecialchars(trim($_POST['user_id']));
   $account_type = htmlspecialchars(trim($_POST['account_type']));

   if(App::get('database')->query('SELECT * FROM account_types WHERE 	user_ref=:user_ref', array(':user_ref'=>$id))){
      App::get('database')->query('UPDATE account_types SET account_type=:account_type WHERE user_ref=:user_ref ',array('account_type'=>$account_type,':user_ref'=>$id));
      echo "Updated";
    }else {
      App::get('database')->query('INSERT INTO account_types VALUES ( id, :account_type, :user_ref )', array('account_type'=>$account_type,':user_ref'=>$id));
      echo "Saved";
    }
 }

public function Business_info(){
  $id = htmlspecialchars(trim($_POST['id']));
  $business_name = ucfirst(trim(htmlspecialchars($_POST['business_name'])));
  $business_location = ucfirst(trim(htmlspecialchars($_POST['business_location'])));
  $working_days =  trim(htmlspecialchars($_POST['working_days']));
  $working_hours = trim(htmlspecialchars($_POST['working_hours']));
  $contact_1 = htmlspecialchars($_POST['contact_1']);
  $contact_2 = htmlspecialchars($_POST['contact_2']);
  $email_add = htmlspecialchars($_POST['email_add']);
  $about_us = htmlspecialchars(trim($_POST['about_us']));

  @$bannerName = $_FILES['banner_img']['name'];
  @$bannerTmp = $_FILES['banner_img']['tmp_name'];
  @$bannerSize = $_FILES['banner_img']['size'];

  @$fileinfo = getimagesize($bannerTmp);
  @$imgWidth = $fileinfo[0];
  @$imgHeight = $fileinfo[1];

  if(strlen($business_name) < 4 && strlen($business_name) <= 21){
    $error = 'Sorry, your business name is too short or too long!';
   }
  if(strlen($business_location) < 5 && strlen($business_location) <= 80){
    $error = 'Sorry, your business location is too short or too long!';
   }
   if($working_days == null){
     $error = 'Please select a valid working days!';
   }
   if($working_hours == null){
     $error = 'Please select a valid working hours!';
   }
   if(!(preg_match('/^[0-9]*$/', $contact_1)) || empty($contact_1) || strlen($contact_1) < 10 || strlen($contact_1) > 13){
     $error = 'Please enter a valid contact number!';
   }
   if(!(preg_match('/^[0-9]*$/', $contact_2)) || !empty($contact_2) && strlen($contact_2) < 10 || strlen($contact_2) > 13){
     $error = 'Please enter a valid contact number!';
   }
   if(!empty($email_add) && !(filter_input(INPUT_POST,'email_add',FILTER_VALIDATE_EMAIL))){
     $error = 'Please enter a valid contact number!';
   }
   if(empty($about_us) || strlen($about_us) < 10 || strlen($about_us) > 159 ){
     $error = 'Sorry, your business description it too short or too long!';
   }
   if($bannerName != '' || $bannerName != null || $bannerName != false){
    if($imgWidth < 700 || $imgHeight < 350 ){ $error = 'Sorry, your selected image is too small!'; }
     //Image upload function 1 (source at boostrap file 'core/boostrap')
     $img_errors = @$_SESSION['img_errors'];
     imageUploader1($bannerName,$bannerTmp,$bannerSize,750,"images/user-submitted/");
     }
     if(!(App::get('database')->query('SELECT * FROM business_info WHERE 	user_ref=:user_ref', array(':user_ref'=>$id)))){
       if(!isset($error) && !isset($img_errors)){
       App::get('database')->query('INSERT INTO business_info VALUES (id, :business_name, :business_location, :working_days, :working_hours, :contact_1, :contact_2, :email_add, :banner_img, :about_us, :user_ref
       )', array('business_name'=>$business_name,':business_location'=>$business_location,':working_days'=>$working_days,':working_hours'=>$working_hours,':contact_1'=>$contact_1,':contact_2'=>$contact_2,':email_add'=>$email_add,':banner_img'=>$_SESSION['image_new_name'],':about_us'=>$about_us,':user_ref'=>$id));
       echo "Saved";
      }else {
       echo $error;
       }
      }else{
       if(!isset($error) && !isset($img_errors)){
        if($bannerName != '' || $bannerName != null || $bannerName != false){
       App::get('database')->query('UPDATE business_info SET business_name=:business_name, business_location=:business_location, working_days=:working_days, working_hours=:working_hours, contact_1=:contact_1, contact_2=:contact_2 , email_add=:email_add , banner_img=:banner_img, about_us=:about_us  WHERE user_ref=:user_ref',
       array('business_name'=>$business_name,':business_location'=>$business_location,':working_days'=>$working_days,':working_hours'=>$working_hours,':contact_1'=>$contact_1,':contact_2'=>$contact_2,':email_add'=>$email_add,':banner_img'=>$_SESSION['image_new_name'],':about_us'=>$about_us,':user_ref'=>$id));
       echo "Updated";
     }else{
       App::get('database')->query('UPDATE business_info SET business_name=:business_name, business_location=:business_location, working_days=:working_days, working_hours=:working_hours, contact_1=:contact_1, contact_2=:contact_2 , email_add=:email_add , about_us=:about_us  WHERE user_ref=:user_ref',
       array('business_name'=>$business_name,':business_location'=>$business_location,':working_days'=>$working_days,':working_hours'=>$working_hours,':contact_1'=>$contact_1,':contact_2'=>$contact_2,':email_add'=>$email_add,':about_us'=>$about_us,':user_ref'=>$id));
       echo "Updated";
      }
     }else {
       echo $error;
     }
   }}

  public function postAd(){

  if(isset($_POST['negotiable'])){
    $negotiable = ucfirst(trim(htmlspecialchars($_POST['negotiable'])));
  }else {
    $negotiable = ""; 
  }

  $title = ucfirst(strtolower(trim(htmlspecialchars($_POST['title']))));
  $main_cat = strtolower(trim(htmlspecialchars($_POST['main_cat'])));

  $subcategory = strtolower(trim(htmlspecialchars($_POST['subcategory'])));
  $employer = htmlspecialchars($_POST['employer']);
  $application_deadline = htmlspecialchars($_POST['job_expiry_date']);
  $job_type = htmlspecialchars($_POST['job_type']);
  $qualification = htmlspecialchars($_POST['qualification']);
  $min_experience = htmlspecialchars($_POST['min_experience']);
  $max_experience = htmlspecialchars($_POST['max_experience']);
  $salary_from = htmlspecialchars($_POST['salary_from']);
  $salary_to = htmlspecialchars($_POST['salary_to']);

  $surface_size = htmlspecialchars($_POST['surface_size']);
  $bedrooms = htmlspecialchars($_POST['bedrooms']);
  $bathrooms = htmlspecialchars($_POST['bathrooms']);
  $broker_fee = htmlspecialchars($_POST['broker_fee']);

  $listing_type = htmlspecialchars($_POST['listing_type']);
  $city_town = htmlspecialchars($_POST['city_town']);
  $region = htmlspecialchars($_POST['region']);
  $make = htmlspecialchars($_POST['make']);
  $model = htmlspecialchars($_POST['model']);
  $year = htmlspecialchars($_POST['year']);
  $transmission = htmlspecialchars($_POST['transmission']);
  $car_type = htmlspecialchars($_POST['car_type']);
  $miles = htmlspecialchars(trim($_POST['miles']));
  $motomake = htmlspecialchars(trim($_POST['moto_make']));
  $wishes = ucfirst(htmlspecialchars(strtolower(trim($_POST['wishes']))));
  $condition = htmlspecialchars($_POST['condition']);
  $description = htmlspecialchars(ucfirst(strtolower(trim($_POST['description']))));
  $value = htmlspecialchars(trim($_POST['value']));

  $negotiable = ucfirst(trim(htmlspecialchars($_POST['negotiable'])));
  $posterName = htmlspecialchars(trim($_POST['poster_name']));
  $posterMobile = htmlspecialchars(trim($_POST['poster_mobile']));
  $unique_id = htmlspecialchars(trim($_POST['code']));

  //Change from Trade to Swap and from Job_Offere to Job_Offer
  if($listing_type == "Trade"){
    $listing_type = "Swap";
  }else if($listing_type == "Trade or Sell" ){
    $listing_type = "Swap or Sell";
  }else if($listing_type == "Job_Offere"){
    $listing_type = "Job_Offer";
  }
  //Pre processing ad URL
  $upload_time = date('Y-m-d');
  $url = $title.' '.$unique_id;
  $url = seoUrl($url);
  $message = "";

  if(!empty($title)){
  if(strlen($title) >= 6 && strlen($title) <= 45){
  if(!empty($main_cat)){
  if(!empty($subcategory)){
  if(!empty($city_town)){
  if(!empty($region)){
  if(!empty($listing_type)){
  if(!empty($condition)){
  if(strlen($description) > 5 && strlen($description) <= 500){
  if(!empty($value)){
  if(strlen($value) >= 1){
  }else{ $errors = 'Please give your item a price or value!'; }
  }else{ $errors = 'Please the value textbox is empty!'; }
  }else{ $errors = 'Please check your description input!'; }
  }else{ $errors = 'Please select your item current condition from the dropdown below!'; }
  }else{ $errors = 'Please select a valid listing type from below!'; }
  }else{ $errors = 'Please select a valid suburb or town!'; }
  }else{ $errors = 'Please select a valid devision or region!'; }
  }else{ $errors = 'Please select a valid item sub-category!'; }
  }else{ $errors = 'Please select a valid item category!'; }
  }else{ $errors = 'Please check your title length!'; }
  }else{ $errors = 'Please your item title is empty!'; }

  if(!isset($errors)){
  App::get('database')->query('INSERT INTO `ads` VALUES (id,:title,:main_cat,:subcategory,:company_employer,:appli_deadline,:job_type,:min_qualific,:min_exp,
    :max_exp,:salary_from,:salary_to,:surface_size,:bedrooms,:bathrooms,:broker_fee,:make,:model,:year,:transmission,:car_type,:miles,:moto_make,:city_town,:region,
    :listing_type,:wishlist,:item_condit,:description,:value,:negotiable, :datetime, :user_id,:custom_id,:uri,status,:poster_name,:poster_mobile)',
  array(
    ':title'=>$title,':main_cat'=>$main_cat,':subcategory'=>$subcategory,':company_employer'=>$employer,
    ':appli_deadline'=>$application_deadline,':job_type'=>$job_type,':min_qualific'=>$qualification,':min_exp'=>$min_experience,
    ':max_exp'=>$max_experience,':salary_from'=>$salary_from,':salary_to'=>$salary_to,':surface_size'=>$surface_size,':bedrooms'=>$bedrooms,':bathrooms'=>$bathrooms,
    ':broker_fee'=>$broker_fee,':make'=>$make,':model' => $model,':year'=>$year,':transmission'=>$transmission,':car_type'=>$car_type,':miles'=>$miles,
    ':moto_make' =>$motomake, ':city_town' => $city_town,':region'=>$region,':listing_type'=>$listing_type,':wishlist' =>$wishes,':item_condit'=>$condition,
    ':description' => $description, ':value'=> $value,':negotiable'=>$negotiable,':datetime'=>date('Y-m-d H:i:s'),
    ':user_id'=>isLoggedIn(),':custom_id'=>$unique_id,':uri'=>$url,':poster_name' => $posterName,':poster_mobile' => $posterMobile));
     
    echo $unique_id;
  }else{
    print_r($errors);
  }
}



public function Adimages(){
  
 if(isset($_POST['unique'])){
    $Unique_id =  htmlspecialchars(trim($_POST['unique']));
    $_SESSION['ad_id'] = $Unique_id;
  }
  
  require __DIR__. 'vendor/autoload.php';

  //Load AWS Info from .evn
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  $dotenv->required(['AWS_BUCKET','AWS_ACCESS_KEY_ID','AWS_SECRET_ACCESS_KEY','AWS_DEFAULT_REGION']);

  $AWS_BUCKET_NAME = $_ENV['AWS_BUCKET'];
  $AWS_ACCESS_KEY_ID = $_ENV['AWS_ACCESS_KEY_ID'];
  $AWS_SECRET_ACCESS_KEY = $_ENV['AWS_SECRET_ACCESS_KEY'];
  $AWS_DEFAULT_REGION = $_ENV['AWS_DEFAULT_REGION'];
  
  $img_upload_errors = "";

 if(isset($_FILES['files']['tmp_name']) && !empty($_FILES['files']['tmp_name'])){
  foreach($_FILES['files']['tmp_name'] as $key => $image){
    
      $file_name = $_FILES['files']['name'][$key];
      $extension = pathinfo($_FILES['files']['name'][$key], PATHINFO_EXTENSION);
  
    // Connect to AWS
     try {
         // You may need to change the region. It will say in the URL when the bucket is open
         // and on creation.
       // Instantiate an Amazon S3 client.
       $s3 = new Aws\S3\S3Client([
           'version' => 'latest',
           'region'  => $AWS_DEFAULT_REGION,
           'credentials' => array(
               'key' => $AWS_ACCESS_KEY_ID,
               'secret' => $AWS_SECRET_ACCESS_KEY
           )
       ]);
     } catch (Exception $e) {
         // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
         // return a json object.
        //  die("Error: " . $e->getMessage());
         $img_upload_errors = $e->getMessage();
     }
  
   // unqiue random string for the key name.
   $custom_filename = $file_name.'_'.time().'.'.$extension;
   $thumb_keyName = 'ads_images/thumbs/'.$custom_filename;
   $large_keyName = 'ads_images/'.$custom_filename;
   
   //image instance
   $img_thumb = Image::make($image);
   $img_large = Image::make($image);
  
   // resize the image to a width of 311 and constrain aspect ratio (auto height)
   $img_thumb->resize(311, null, function ($constraint) {
     $constraint->aspectRatio();
   })->encode($extension);
  
   // resize the image to a width of 534 and constrain aspect ratio (auto height)
   $img_large->resize(534, null, function ($constraint) {
     $constraint->aspectRatio();
   })->encode($extension);
  
     // Add it to S3
     /**Upload image thumbs */
     try {
         $s3->putObject(
             array(
             'Bucket' => $AWS_BUCKET_NAME,
             'Key'    => $thumb_keyName,
             'Body'   => $img_thumb,
             'ACL'    => 'public-read',
             )
         );
     } catch (Aws\S3\Exception\S3Exception $e) {
        //  die('Error:' . $e->getMessage());
         $img_upload_errors = $e->getMessage();
     }
  
     /**Upload image large*/
     try {
      $s3->putObject(
          array(
          'Bucket' => $AWS_BUCKET_NAME,
          'Key'    => $large_keyName,
          'Body'   => $img_large,
          'ACL'    => 'public-read',
          )
      );
     } catch (Aws\S3\Exception\S3Exception $e) {
        // die('Error:' . $e->getMessage());
        $img_upload_errors = $e->getMessage();
    }

 if($img_upload_errors == ""){
    App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images)',
    array('user_id' => isLoggedIn(),':ad_id' => $_SESSION['ad_id'],':images'=> $custom_filename));
  }else{
     echo $img_upload_errors;
  }} 
 }else {
    $img_upload_errors = 'Please select at least 1 photo for your ad'; 
  }
 }


 public function Changenotifi(){
  $id =  htmlspecialchars(trim($_POST['id']));
  $device_notif =  htmlspecialchars(trim($_POST['device_notif']));
  $approved_ads_notif =  htmlspecialchars(trim($_POST['approved_ads_notif']));
  $unread_chats_notif =  htmlspecialchars(trim($_POST['unread_chats_notif']));
  $gene_alerts_notif =  htmlspecialchars(trim($_POST['gene_alerts_notif']));

  if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref', array(':user_ref'=>$id))){

    App::get('database')->query('UPDATE notifications SET unknown_device_logins=:unknown_device_logins,approved_ads=:approved_ads,chat_notifications=:chat_notifications,general_notifications=:general_notifications  WHERE user_ref=:user_ref',
    array('unknown_device_logins' =>$device_notif,':approved_ads' =>$approved_ads_notif ,':chat_notifications'=>$unread_chats_notif,':general_notifications'=>$gene_alerts_notif,':user_ref'=>$id));
    echo "Updated";
    }else {
    App::get('database')->query('INSERT INTO notifications VALUES (id,:unknown_device_logins,:approved_ads,:chat_notifications,:general_notifications,:user_ref)',
    array('unknown_device_logins' =>$device_notif,':approved_ads' =>$approved_ads_notif ,':chat_notifications'=>$unread_chats_notif,':general_notifications'=>$gene_alerts_notif,':user_ref'=>$id));
    echo "Saved";
  }
}


public function Live_ad_sms(){
  $user = isLoggedIn();
  $title =  htmlspecialchars(trim($_POST['title']));
  $unique =  htmlspecialchars(trim($_POST['unique']));
  $mobile =  htmlspecialchars(trim($_POST['poster_mobile']));

  if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref', array(':user_ref'=>$user))){
    if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref  AND approved_ads=:approved_ads', array(':user_ref'=>$user,':approved_ads'=>1))){
      $url = $title.' '.$unique;
      $url = seoUrl($url);
      $msg_body = 'Congratulations, your ad is now online, you can share it with freinds or customers,'.'  '.'http://www.yenswape.com/item/'.$url;  //Sms body
      $msg_reciever = $mobile; //SMS sender number
      include_once 'Messages.php';
    }
  }else{
    $url = $title.' '.$unique;
    $url = seoUrl($url);
    $msg_body = 'Congratulations, your ad is now online, you can share it with freinds or  ,'.'  '.'http://www.yenswape.com/item'.$url;  //Sms body
    $msg_reciever = $mobile; //SMS sender number
    include_once 'Messages.php';
 }
}

public function unreadChats(){
  $sender_id = 0;
  isLoggedIn();
  if(isLoggedIn() > 0){
    $sender_id = isLoggedIn();
  }else {
    $sender_id = htmlspecialchars(trim($_POST['sender_id']));
   }
  $ownerid = htmlspecialchars(trim($_POST['ownerid']));
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $session = htmlspecialchars(trim($_POST['session']));
  $buyer = htmlspecialchars(trim($_POST['buyer']));

  $chat_datetime =  App::get('database')->query('SELECT * FROM chat_active_users WHERE  session_id=:session_id', array(':session_id'=>$session))[0]['datetime'];
  $owner_lastseen_datetime =  App::get('database')->query('SELECT * FROM lastseen WHERE  user_id=:user_id', array(':user_id'=>$ownerid))[0]['datetime'];
  $buyer_lastseen_datetime =  App::get('database')->query('SELECT * FROM lastseen WHERE  user_id=:user_id', array(':user_id'=>$buyer))[0]['datetime'];

  $chat_time = strtotime($chat_datetime); // formatting time
  $owner_time = strtotime($owner_lastseen_datetime); // formatting time
  $buyer_time = strtotime($buyer_lastseen_datetime); // formatting time
  $chatHour = date("H", $chat_time);
  $ownerhour = date("H", $owner_time);
  $buyerhour = date("H", $buyer_time);
  $dateNow = date("Y-m-d");

  if($sender_id != $ownerid){
    if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref AND chat_notifications=:chat_notifications', array(':user_ref'=>$ownerid,':chat_notifications'=>1))){
    $owner_ =  App::get('database')->owner_unreadChats($ownerid,$session);
    if(count($owner_) > 0 ){
      if($ownerhour != $chatHour){
        $ad_title = App::get('database')->query('SELECT title FROM ads WHERE user_id=:user_id  AND custom_id=:custom_id', array(':user_id'=>$ownerid,':custom_id'=>$ad_id))[0]['title'];
        $fname = App::get('database')->query('SELECT fname FROM users  WHERE id=:id', array(':id'=>$ownerid))[0]['fname'];
        @$mobile = App::get('database')->query('SELECT mobile FROM users WHERE id=:id', array(':id'=>$ownerid))[0]['mobile'];
        if($mobile < 1){
         $mobile = App::get('database')->query('SELECT poster_mobile FROM ads WHERE user_id=:user_id  AND custom_id=:custom_id', array(':user_id'=>$ownerid,':custom_id'=>$ad_id))[0]['poster_mobile'];
        }

       if(App::get('database')->query('SELECT  *  FROM  sent_notifications  WHERE receiver=:receiver AND unread_chats=:unread_chats AND session_id=:session_id', array(':receiver'=>$ownerid,':unread_chats'=> 1,':session_id'=>$session))){
           $notification_status  =  App::get('database')->query('SELECT  datetime  FROM  sent_notifications  WHERE receiver=:receiver AND unread_chats=:unread_chats AND session_id=:session_id', array(':receiver'=>$ownerid,':unread_chats'=> 1,':session_id'=>$session))[0]['datetime'];
           $datefortmated = strtotime($notification_status);// formatting time
           $ownerdate = date("Y-m-d", $datefortmated);
          if($dateNow != $ownerdate){
              $message = "Hi ".$fname .','.' you have received one new chat message regarding your ad '." $ad_title ".' '.', plz login to your account to reply :)'.',  https://www.yenswape.com';
              $msg_body = $message;
              $msg_reciever = $mobile; //SMS sender number
              include_once 'Messages.php';
              App::get('database')->query('UPDATE sent_notifications SET datetime=:datetime WHERE session_id=:session_id  AND  receiver=:receiver', array(':receiver'=>$ownerid,':session_id'=>$session,':datetime'=>date('Y-m-d H:i:s')));
            }
        }else {
          $message = "Hi ".$fname .','.' you have received one new chat message regarding your ad '." $ad_title ".' '.', plz login to your account to reply :)'.',  https://www.yenswape.com';
          $msg_body = $message;
          $msg_reciever = $mobile; //SMS sender number
          include_once 'Messages.php';
          App::get('database')->query('INSERT INTO sent_notifications VALUES (id,:unread_chats,:general_notif,:receiver,:session_id,:datetime)', array(':unread_chats'=>1,':general_notif'=>0,':receiver'=>$ownerid,':session_id'=>$session,':datetime'=>date('Y-m-d H:i:s')));
        }
      }
    }
   }
 }elseif ($sender_id != $buyer) {
    if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref AND chat_notifications=:chat_notifications', array(':user_ref'=>$buyer,':chat_notifications'=>1))){
     $buyer_ =  App::get('database')->buyer_unreadChats($buyer,$session);
     if(count($buyer_) > 0 ){
       if($buyerhour != $chatHour){
         $owner_name = App::get('database')->query('SELECT fname FROM users  WHERE id=:id', array(':id'=>$ownerid))[0]['fname'];
         $ad_title = App::get('database')->query('SELECT title FROM ads WHERE user_id=:user_id  AND custom_id=:custom_id', array(':user_id'=>$ownerid,':custom_id'=>$ad_id))[0]['title'];
         $fname = App::get('database')->query('SELECT fname FROM users  WHERE id=:id', array(':id'=>$buyer))[0]['fname'];
         @$mobile = App::get('database')->query('SELECT mobile FROM users WHERE id=:id', array(':id'=>$buyer))[0]['mobile'];

        if($mobile > 1){

          if(App::get('database')->query('SELECT  *  FROM  sent_notifications  WHERE receiver=:receiver AND unread_chats=:unread_chats AND session_id=:session_id', array(':receiver'=>$ownerid,':unread_chats'=> 1,':session_id'=>$session))){
             $notification_status  =  App::get('database')->query('SELECT  datetime  FROM  sent_notifications  WHERE receiver=:receiver AND unread_chats=:unread_chats AND session_id=:session_id', array(':receiver'=>$ownerid,':unread_chats'=> 1,':session_id'=>$session))[0]['datetime'];
             $datefortmated = strtotime($notification_status);// formatting time
             $buyerdate = date("Y-m-d", $datefortmated);
            if($dateNow != $buyerdate){
              $message = "Hi ".$fname .','.' you have received one new chat message reply from '." $owner_name ".'  regarding the ad '." $ad_title ".' '.', plz login to your account to read :)'.',  https://www.yenswape.com';
              $msg_body = $message;
              $msg_reciever = $mobile; //SMS sender number
              include_once 'Messages.php';
              App::get('database')->query('UPDATE sent_notifications SET datetime=:datetime WHERE session_id=:session_id  AND  receiver=:receiver', array(':receiver'=>$buyer,':session_id'=>$session,':datetime'=>date('Y-m-d H:i:s')));
              }
          }else {
            $message = "Hi ".$fname .','.' you have received one new chat message reply from '." $owner_name ".'  regarding the ad '." $ad_title ".' '.', plz login to your account to read :)'.',  https://www.yenswape.com';
            $msg_body = $message;
            $msg_reciever = $mobile; //SMS sender number
            include_once 'Messages.php';
            App::get('database')->query('INSERT INTO sent_notifications VALUES (id,:unread_chats,:general_notif,:receiver,:session_id,:datetime)', array(':unread_chats'=>1,':general_notif'=>0,':receiver'=>$buyer,':session_id'=>$session,':datetime'=>date('Y-m-d H:i:s')));
          }
        }
       }
  }}}}


  /*==============================================================================
                         UPDATE AD (WEB)
  ================================================================================ */

public function Save_update(){
  $title = ucfirst(strtolower(trim(htmlspecialchars($_POST['title']))));
  $main_cat= strtolower(trim(htmlspecialchars($_POST['main_cat'])));
  $subcategory = strtolower(trim(htmlspecialchars($_POST['subcategory'])));

  $employer = htmlspecialchars($_POST['employer']);
  $application_deadline = htmlspecialchars($_POST['job_expiry_date']);
  $job_type = htmlspecialchars($_POST['job_type']);
  $qualification = htmlspecialchars($_POST['qualification']);
  $min_experience = htmlspecialchars($_POST['min_experience']);
  $max_experience = htmlspecialchars($_POST['max_experience']);
  $salary_from = htmlspecialchars($_POST['salary_from']);
  $salary_to = htmlspecialchars($_POST['salary_to']);

  $surface_size = htmlspecialchars($_POST['surface_size']);
  $bedrooms = htmlspecialchars($_POST['bedrooms']);
  $bathrooms = htmlspecialchars($_POST['bathrooms']);
  $broker_fee = htmlspecialchars($_POST['broker_fee']);

  $make = htmlspecialchars($_POST['make']);
  $make_new = htmlspecialchars($_POST['make_new']);
  $real_make = '';
  if($make == '' && $make_new != ''){ $real_make = $make_new; }else { $real_make = $make; }

  $model = htmlspecialchars($_POST['model']);
  $year = htmlspecialchars($_POST['year']);

  $transmission = htmlspecialchars($_POST['transmission']);
  $car_type = htmlspecialchars($_POST['car_type']);
  $miles = htmlspecialchars(trim($_POST['miles']));
  $motomake = htmlspecialchars(trim($_POST['moto_make']));
  $city_town = htmlspecialchars($_POST['city_town']);
  $region = htmlspecialchars($_POST['region']);
  $listing_type = htmlspecialchars($_POST['listing_type']);

  $wishes = ucfirst(htmlspecialchars(strtolower(trim($_POST['wishes']))));
  $condition = htmlspecialchars($_POST['condition']);
  $description = htmlspecialchars(ucfirst(strtolower(trim($_POST['description']))));
  $value =  htmlspecialchars(trim($_POST['value']));
  $posterName =  htmlspecialchars(trim($_POST['poster_name']));
  $posterMobile =  htmlspecialchars(trim($_POST['poster_mobile']));

  $ad_id =  htmlspecialchars(trim($_POST['ad_id']));
  $poster_id =  htmlspecialchars(trim($_POST['poster_id']));

  $upload_time = date('Y-m-d');

  $url = $title.' '.$ad_id;
  $url = seoUrl($url);
  if(!empty($title)){
  if(strlen($title) > 6 && strlen($title) <= 45){
  if(!empty($main_cat)){
  if(!empty($subcategory)){
  if(!empty($city_town)){
  if(!empty($region)){
  if(!empty($listing_type)){
  if(!empty($condition)){
  if(strlen($description) > 6 && strlen($description) <= 550){
  if(!empty($value)){
  if(strlen($value) >= 1 ){
  }else {
  $errors = 'Please give your item a price or value.';
  }
  }else {
  $errors = 'Please the value textbox is empty.';
  }
  }else {
  $errors = 'Please check your description input.';
  }
  }else {
  $errors = 'Please your item current condition from the dropdown below.';
  }
  }else {
  $errors = 'Please select a valid listing type from below.';
  }
  }else {
  $errors = 'Please select a valid suburb or town.';
  }
  }else {
  $errors = 'Please select a valid devision or region.';
  }
  }else {
  $errors = 'Please select a valid item sub-category.';
  }
  }else {
  $errors = 'Please select a valid item category.';
  }
  }else {
  $errors = 'Please check your title length!';
  }
  }else {
  $errors = 'Please your item title textbox is empty.';
  }

  if(!isset($errors)){

  App::get('database')->query('UPDATE `ads` SET

  title=:title,main_cat=:main_cat,subcategory=:subcategory,company_employer=:company_employer,

  appli_deadline=:appli_deadline,job_type=:job_type,min_qualific=:min_qualific,min_exp=:min_exp,

  max_exp=:max_exp,salary_from=:salary_from,salary_to=:salary_to,surface_size=:surface_size,bedrooms=:bedrooms,

  bathrooms=:bathrooms,broker_fee=:broker_fee,make=:make, model=:model, year=:year,

  transmission=:transmission,car_type=:car_type, miles=:miles,moto_make=:moto_make,city_town=:city_town,

  region=:region, listing_type=:listing_type, wishes=:wishlist, item_condit=:item_condit,

  description=:description, value=:value,uri=:uri,poster_name=:poster_name,poster_mobile=:poster_mobile

  WHERE user_id=:id AND custom_id=:ad_id', array(':title' => $title, ':main_cat' => $main_cat, ':subcategory'=> $subcategory,':company_employer'=>$employer,':appli_deadline'=>$application_deadline,

  ':job_type'=>$job_type,':min_qualific'=>$qualification,':min_exp'=>$min_experience, ':max_exp'=>$max_experience,':salary_from'=>$salary_from,':salary_to'=>$salary_to,

  ':surface_size'=> $surface_size,':bedrooms'=>$bedrooms,':bathrooms'=>$bathrooms,':broker_fee'=>$broker_fee,':make' => $real_make, ':model' => $model, ':year' => $year,

  ':transmission' => $transmission,':car_type' => $car_type, ':miles' => $miles,':moto_make' => $motomake, ':city_town' => $city_town, ':region' => $region,

  ':listing_type' => $listing_type, ':wishlist'=> $wishes, ':item_condit' => $condition, ':description' => $description,

  ':value'=> $value,':uri'=>$url,':poster_name' => $posterName,':poster_mobile' => $posterMobile,':id'=>$poster_id,':ad_id'=>$ad_id));


  @$img1Name = $_FILES['update1_img']['name'];
  @$img1Tmp = $_FILES['update1_img']['tmp_name'];
  @$img1Size = $_FILES['update1_img']['size'];

  @$img2Name = $_FILES['update2_img']['name'];
  @$img2Tmp = $_FILES['update2_img']['tmp_name'];
  @$img2Size = $_FILES['update2_img']['size'];

  @$img3Name = $_FILES['update3_img']['name'];
  @$img3Tmp = $_FILES['update3_img']['tmp_name'];
  @$img3Size = $_FILES['update3_img']['size'];

  @$img4Name = $_FILES['update4_img']['name'];
  @$img4Tmp = $_FILES['update4_img']['tmp_name'];
  @$img4Size = $_FILES['update4_img']['size'];

  @$img5Name = $_FILES['update5_img']['name'];
  @$img5Tmp = $_FILES['update5_img']['tmp_name'];
  @$img5Size = $_FILES['update5_img']['size'];

  @$img6Name = $_FILES['update6_img']['name'];
  @$img6Tmp = $_FILES['update6_img']['tmp_name'];
  @$img6Size = $_FILES['update6_img']['size'];

  $img1_id =  htmlspecialchars($_POST['img1_id']);
  $img2_id =  htmlspecialchars($_POST['img2_id']);
  $im3_id =  htmlspecialchars($_POST['img3_id']);
  $img4_id =  htmlspecialchars($_POST['img4_id']);
  $img5_id =  htmlspecialchars($_POST['img5_id']);
  $img6_id =  htmlspecialchars($_POST['img6_id']);

  $image1 =  htmlspecialchars($_POST['image1']);
  $image2 =  htmlspecialchars($_POST['image2']);
  $image3 =  htmlspecialchars($_POST['image3']);
  $image4 =  htmlspecialchars($_POST['image4']);
  $image5 =  htmlspecialchars($_POST['image5']);
  $image6 =  htmlspecialchars($_POST['image6']);


if($img1Name != ""){
    $imgparts_array = explode('.',$image1);
    $imgExtt = end($imgparts_array);
    $path_small = "images/user-submitted/thumb/xs/".$image1;
    $path_big = "images/user-submitted/thumb/".$image1;
    //Inserting Smaller Image first
    //Image upload function 1 (source at boostrap file 'core/boostrap')
    imageUploader1($img1Name,$img1Tmp,$img1Size,100,"images/user-submitted/thumb/xs/");
    $img_errors = @$_SESSION['img_errors'];
   if($imgExtt != "jpg" || $imgExtt != "png" || $imgExtt != "gif" && $img1Name != ''){
     /*================================================================
                           INSERTING NEW IMAGE
     ===================================================================*/
    if(!isset($img_errors)){
      App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
      )', array('user_id' =>$poster_id,':ad_id' =>$ad_id,
      ':images'=> $_SESSION['image_new_name']));
      $uploaded = 'true';
      if($uploaded == 'true'){
       //Uploading large image
       imageUploader2($img1Name,$img1Tmp,$img1Size,450,"images/user-submitted/thumb/xs/");
      }
      //Unsetting all sessions after upload
     if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {
      echo $img_errors;
     }
   }elseif ($imgExtt == "jpg" || $imgExtt == "png" && $image1 != null && $image1 != '' && $img1Name != null && $img1Name != ''){
     /*================================================================
                            UPDATING EXISTING IMAGE
     ===================================================================*/
    if(!isset($img_errors)){
      App::get('database')->query('UPDATE images SET images=:images  WHERE id=:id AND ad_id=:ad_id', array('id'=>$img1_id,':ad_id'=>$ad_id,':images'=>$_SESSION['image_new_name']));
      $updated = 'true';
      if($updated == 'true'){
       //Uploading large image
       imageUploader2($img1Name,$img1Tmp,$img1Size,450,"images/user-submitted/thumb/");
                       /*DELETING IMAGE FILE FROM THE SERVER */
     if(unlink($path_small)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
       if(unlink($path_big)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
      }
      //Unsetting all sessions after upload
     if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
    }else{
       echo $img_errors;
    }
   }elseif($image1 != null || $image1 != '' && $img1Name == null || $img1Name == '') {
    // Don't do anything to the file
   }
   else {
    echo "No image selected!";
   }
 }

if($img2Name != ""){
    $imgparts_array = explode('.',$image2);
    $imgExtt = end($imgparts_array);
    $path_small = "images/user-submitted/thumb/xs/".$image2;
    $path_big = "images/user-submitted/thumb/".$image2;

   //Inserting smaller image first
   imageUploader1($img2Name,$img2Tmp,$img2Size,100,"images/user-submitted/thumb/xs/");
   $img_errors = @$_SESSION['img_errors'];
  if($imgExtt != "jpg" || $imgExtt != "png" && $img2Name != ''){
    /*================================================================
                          INSERTING NEW IMAGE
    ===================================================================*/
   if(!isset($img_errors)){
     App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
     )', array('user_id' =>$poster_id,':ad_id' =>$ad_id,
     ':images'=> $_SESSION['image_new_name']));
     $uploaded = 'true';
     if($uploaded == 'true'){
      //Uploading large image
      imageUploader2($img2Name,$img2Tmp,$img2Size,450,"images/user-submitted/thumb/");
     }
     //Unsetting all sessions after upload
    if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
    }else{
     echo $img_errors;
    }
  }elseif ($imgExtt != "jpg" || $imgExtt != "png" || $imgExtt != "gif" && $image2 != null && $image2 != '' && $img2Name != null && $img2Name != ''){
     if(!isset($img_errors)){
       App::get('database')->query('UPDATE images SET images=:images  WHERE id=:id AND ad_id=:ad_id', array('id' =>$img2_id,':ad_id' =>$ad_id,':images'=>$_SESSION['image_new_name']));
       if($updated == 'true'){
      //Uploading large image
      imageUploader2($img2Name,$img2Tmp,$img2Size,450,"images/user-submitted/thumb/");
                        /*DELETING IMAGE FILE FROM THE SERVER */
      if(unlink($path_small)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
        if(unlink($path_big)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
       }
       //Unsetting all sessions after upload
       if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {
       echo $img_errors;
     }
   }
   elseif ($image2 != null || $image2 != '' && $img2Name == null || $img2Name == '') {
    // Don't do anything to the file
   }
   else {
    echo "No image selected!";
   }
 }

 if($img3Name != ""){
    $imgparts_array = explode('.',$image3);
    $imgExtt = end($imgparts_array);
    $path_small = "images/user-submitted/thumb/xs/".$image3;
    $path_big = "images/user-submitted/thumb/".$image3;
    //Inserting smaller image first
    imageUploader1($img3Name,$img3Tmp,$img3Size,100,"images/user-submitted/thumb/xs/");
    $img_errors = @$_SESSION['img_errors'];
   if($imgExtt != "jpg" || $imgExtt != "png" && $img3Name != ''){
     /*================================================================
                         INSERTING NEW IMAGE
     ===================================================================*/
    if(!isset($img_errors)){
      App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
      )', array('user_id' =>$poster_id,':ad_id' =>$ad_id,
      ':images'=> $_SESSION['image_new_name']));
      $uploaded = 'true';
      if($uploaded == 'true'){
       //Uploading large image
       imageUploader2($img3Name,$img3Tmp,$img3Size,450,"images/user-submitted/thumb/");
      }
      //Unsetting all sessions after upload
     if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {
      echo $img_errors;
    }
  }elseif ($imgExtt == "jpg"  || $imgExtt != "png" && $image3 != null && $image3 != '' && $img3Name != null && $img3Name != '') {
     /*================================================================
                           UPDATING EXISTING IMAGE
     ===================================================================*/
     if(!isset($img_errors)){
       App::get('database')->query('UPDATE images SET images=:images  WHERE id=:id AND ad_id=:ad_id', array('id' =>$im3_id,':ad_id' =>$ad_id,':images'=>$_SESSION['image_new_name']));
       if($updated == 'true'){
      //Uploading large image
      imageUploader2($img3Name,$img3Tmp,$img3Size,450,"images/user-submitted/thumb/");
                        /*DELETING IMAGE FILE FROM THE SERVER */
      if(unlink($path_small)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
        if(unlink($path_big)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
       }
       //Unsetting all sessions after upload
       if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else{
       echo $img_errors;
     }
   }elseif($image3 != null || $image3 != '' && $img3Name == null || $img3Name == '') {
    // Don't do anything to the file
   }else {echo "No image selected!";}
  }

  if($img4Name != ""){
    $imgparts_array = explode('.',$image4);
    $imgExtt = end($imgparts_array);
    $path_small = "images/user-submitted/thumb/xs/".$image4;
    $path_big = "images/user-submitted/thumb/".$image4;
    //Inserting smaller image first
    imageUploader1($img4Name,$img4Tmp,$img4Size,100,"images/user-submitted/thumb/xs/");
    $img_errors = @$_SESSION['img_errors'];
   if($imgExtt != "jpg" || $imgExtt != "png" && $img4Name != ''){
   if(!isset($img_errors)){
     App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
     )', array('user_id' =>$poster_id,':ad_id' =>$ad_id,
     ':images'=> $_SESSION['image_new_name']));
     $uploaded = 'true';
     if($uploaded == 'true'){
      //Uploading large image
      imageUploader2($img4Name,$img4Tmp,$img4Size,450,"images/user-submitted/thumb/");
     }
     //Unsetting all sessions after upload
    if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
    }else {
     echo $img_errors;
    }
  }elseif($imgExtt == "jpg" || $imgExtt == "png" && $image4 != null && $image4 != '' && $img4Name != null && $img4Name != ''){
    /*================================================================
                          UPDATING EXISTING IMAGE
    ===================================================================*/
   if(!isset($img_errors)){
       App::get('database')->query('UPDATE images SET images=:images  WHERE id=:id AND ad_id=:ad_id', array('id' =>$img4_id,':ad_id' =>$ad_id,':images'=>$_SESSION['image_new_name']));
       if($updated == 'true'){
      //Uploading large image
      imageUploader2($img4Name,$img4Tmp,$img4Size,450,"images/user-submitted/thumb/");
                        /*DELETING IMAGE FILE FROM THE SERVER */
      if(unlink($path_small)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
        if(unlink($path_big)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
       }
      //Unsetting all sessions after upload
      if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {
       echo $img_errors;
     }
  }elseif($image4 != null || $image4 != '' && $img4Name == null || $img4Name == '') {
    // Don't do anything to the file
   }
   else {
    echo "No image selected!";
   }
 }

if($img5Name != ""){
    $imgparts_array = explode('.',$image5);
    $imgExtt = end($imgparts_array);
    $path_small = "images/user-submitted/thumb/xs/".$image5;
    $path_big = "images/user-submitted/thumb/".$image5;
    //Inserting smaller image first
    imageUploader1($img5Name,$img5Tmp,$img5Size,100,"images/user-submitted/thumb/xs/");
    $img_errors = @$_SESSION['img_errors'];
   if($imgExtt != "jpg" || $imgExtt != "png" && $img5Name != ''){
     /*================================================================
                      INSERTING NEW IMAGE
     ===================================================================*/
    if(!isset($img_errors)){
      App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
      )', array('user_id' =>$poster_id,':ad_id' =>$ad_id,
      ':images'=> $_SESSION['image_new_name']));
      $uploaded = 'true';
      if($uploaded == 'true'){
       //Uploading large image
       imageUploader2($img5Name,$img5Tmp,$img5Size,450,"images/user-submitted/thumb/");
      }
    //Unsetting all sessions after upload
    if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {echo $img_errors;}
   }elseif ($imgExtt == "jpg" || $imgExtt == "png" && $image5 != null && $image5 != '' && $img5Name != null && $img5Name != '') {
    /*================================================================
                          UPDATING EXISTING IMAGE
    ===================================================================*/
    if(!isset($img_errors)){
       App::get('database')->query('UPDATE images SET images=:images  WHERE id=:id AND ad_id=:ad_id', array('id' =>$img5_id,':ad_id' =>$ad_id,':images'=>$_SESSION['image_new_name']));
       if($updated == 'true'){
      //Uploading large image
      imageUploader2($img5Name,$img5Tmp,$img5Size,450,"images/user-submitted/thumb/");
                        /*DELETING IMAGE FILE FROM THE SERVER */
      if(unlink($path_small)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
        if(unlink($path_big)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
       }
      //Unsetting all sessions after upload
      if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {
       echo $img_errors;
     }
   }elseif($image5 != null || $image5 != '' && $img5Name == null || $img5Name == ''){
    // Don't do anything to the file
   }else{echo "No image selected!";}
  }

 if($img6Name != ""){
    $imgparts_array = explode('.',$image6);
    $imgExtt = end($imgparts_array);
    $path_small = "images/user-submitted/thumb/xs/".$image6;
    $path_big = "images/user-submitted/thumb/".$image6;
    //Inserting smaller image first
    imageUploader1($img6Name,$img6Tmp,$img6Size,100,"images/user-submitted/thumb/xs/");
    $img_errors = @$_SESSION['img_errors'];
   if($imgExtt != "jpg" || $imgExtt != "png" && $img6Name != ''){
     /*================================================================
                      INSERTING NEW IMAGE
     ===================================================================*/
    if(!isset($img_errors)){
      App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
      )', array('user_id' =>$poster_id,':ad_id' =>$ad_id,
      ':images'=> $_SESSION['image_new_name']));
      $uploaded = 'true';
      if($uploaded == 'true'){
       //Uploading large image
       imageUploader2($img6Name,$img6Tmp,$img6Size,450,"images/user-submitted/thumb/");
      }
     //Unsetting all sessions after upload
     if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
      }else{echo $img_errors;}
     }elseif ($imgExtt == "jpg" && $image6 != null && $image6 != '' && $img6Name != null && $img6Name != ''){
      /*================================================================
                             UPDATING EXISTING IMAGE
       ===================================================================*/
     if(!isset($img_errors)){
       App::get('database')->query('UPDATE images SET images=:images  WHERE id=:id AND ad_id=:ad_id', array('id' =>$img6_id,':ad_id' =>$ad_id,':images'=>$_SESSION['image_new_name']));
       if($updated == 'true'){
      //Uploading large image
      imageUploader2($img6Name,$img6Tmp,$img6Size,450,"images/user-submitted/thumb/");
                        /*DELETING IMAGE FILE FROM THE SERVER */
      if(unlink($path_small)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
        if(unlink($path_big)){/*echo "Deleted"; */} else {/*echo "fail"; */ }
       }
       //Unsetting all sessions after upload
      if(isset($_SESSION["img_errors"])){unset($_SESSION["img_errors"]);}
     }else {
       echo $img_errors;
    }
  }elseif ($image6 != null || $image6 != '' && $img6Name == null || $img6Name == '') {
    // Don't do anything to the file
   }
   else {
    echo "No image selected!";
  }
 }echo "Success";
 }else{
  echo $errors;
 }}

 public function userLogout(){
   if(isset($_COOKIE['SNID'])){
     App::get('database')->query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
  }
  setcookie('SNID','1',time()-3600);
  setcookie('SNID_','1',time()-3600);
  echo "success";
 }

 public function posterNumber(){
   $poster_id = $_POST['poster_id'];
   $custom_id = $_POST['custom_id'];
   $contact_numbers = App::get('database')->query('SELECT poster_mobile FROM  `ads` WHERE user_id=:userid  AND custom_id=:custom_id',array(':userid'=>$poster_id,':custom_id'=>$custom_id))[0]['poster_mobile'];
   echo $contact_numbers;
 }

 //get ad Viewer Tracker contact number
 public function viewerNumber(){
   $id = $_POST['viewer_id'];
   $viewer_numbers = App::get('database')->query('SELECT mobile FROM  `users` WHERE id=:id LIMIT 0,1',array(':id'=>$id))[0]['mobile'];
   echo $viewer_numbers;
 }

 //update ad Viewer Tracker user Status For both PC and App
 public function updateViewer(){
   $ad_id = trim(htmlspecialchars($_POST["ad_id"]));
   $viewer_id = trim(htmlspecialchars($_POST["viewer_id"]));
   App::get('database')->query('UPDATE `views` SET status=:status WHERE user_id=:viewer_id AND ad_id=:ad_id LIMIT 1', array(':status'=>1,':viewer_id'=>$viewer_id,':ad_id'=>$ad_id));
   echo "done";
  }
  /*
  =========================================================================
                          MOBILE APP QUERIES
  =========================================================================
                                                                          */
 //Index page
  public function Latest_postings(){
  if($latest_ads = App::get('database')->App_latest_ads()){
    $adInfo = array();
    $adImges = array();
    $postDate = array();
    $priceFormat = array();
    foreach ($latest_ads as $latest){
    $custom_id = $latest->custom_id;
  	$adInfo[] = $latest;
  	$postDate[] = formatTimeAgo($latest->datetime);
  	$priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
  	$imgs = App::get('database')->App_latest_ads_imgs($custom_id);
  	foreach ($imgs as $img){
  	 $adImges[] = $img;
  	}
	}
   echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
  }
 }

 //Getting items on scroll
 public function ScrollFetch(){
   $offset = trim(htmlspecialchars($_POST["offset"]));
   if($latest_ads = App::get('database')->latestadsInfo_Offset($offset)){
       $adInfo = array();
       $adImges = array();
       $postDate = array();
       $priceFormat = array();
    foreach ($latest_ads as $latest){
       $custom_id = $latest->custom_id;
       $adInfo[] = $latest;
       $postDate[] = formatTimeAgo($latest->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
    foreach ($imgs as $img){
         $adImges[] = $img;
       }
      }
     echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }
 }

 //Fetching ads by category
  public function itemCategory(){
   $category = trim(htmlspecialchars($_POST["main_cat"]));
   //$categoryCounts = App::get('database')->counterCategory($category,1);
  if($item_categories = App::get('database')->appfetchCat($category)){
     $adInfo = array();
     $adImges = array();
     $postDate = array();
     $priceFormat = array();
   foreach ($item_categories as $item_category){
      $custom_id = $item_category->custom_id;
      $adInfo[] = $item_category;
      $postDate[] = formatTimeAgo($item_category->datetime);
      $priceFormat[] = number_format_drop_zero_decimals($item_category->value, 2);
      $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
   foreach ($imgs as $img){
     $adImges[] = $img;
     }
    }
   echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }
 }

 //Getting category items on scroll
  public function Cat_scrollFetch(){
    $category = trim(htmlspecialchars($_POST["main_cat"]));
    $offset = trim(htmlspecialchars($_POST["cat_offset"]));
  if($latest_ads = App::get('database')->appfetchCat_Offset($category,$offset)){
     $adInfo = array();
     $adImges = array();
     $postDate = array();
     $priceFormat = array();
   foreach($latest_ads as $latest){
       $custom_id = $latest->custom_id;
       $adInfo[] = $latest;
       $postDate[] = formatTimeAgo($latest->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($latest->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
   foreach($imgs as $img){
      $adImges[] = $img;
      }
    }
     echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }
 }

//Fetching ads by both category and subcategory
public function itemCatandSub(){
  $category = trim(htmlspecialchars($_POST["main_cat"]));
  $subcategory = trim(htmlspecialchars($_POST["selection_"]));

  $categoryCounts = App::get('database')->counter_Subcategory('ads',$category,$subcategory);
  if($item_categories = App::get('database')->appfetchCat_Sub($category,$subcategory)){
    $adInfo = array();
    $adImges = array();
    $postDate = array();
    $priceFormat = array();
  foreach ($item_categories as $item_category){
     $custom_id = $item_category->custom_id;
     $adInfo[] = $item_category;
     $postDate[] = formatTimeAgo($item_category->datetime);
     $priceFormat[] = number_format_drop_zero_decimals($item_category->value, 2);
     $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
     foreach ($imgs as $img){
       $adImges[] = $img;
     }
    }
   echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
 }}

 //Getting category and subcategory items on scroll
 public function Cat_Sub_scrollFetch(){
   $category = trim(htmlspecialchars($_POST["main_cat"]));
   $subcategory = trim(htmlspecialchars($_POST["selection_"]));
   $offset = trim(htmlspecialchars($_POST["cat_sub_offset"]));

   if($Cat_Sub_ads = App::get('database')->appfetchCat_Sub_Offset($category,$subcategory,$offset)){
     $adInfo = array();
     $adImges = array();
     $postDate = array();
     $priceFormat = array();
   foreach ($Cat_Sub_ads as $Cat_Sub_ad){
       $custom_id = $Cat_Sub_ad->custom_id;
       $adInfo[] = $Cat_Sub_ad;
       $postDate[] = formatTimeAgo($Cat_Sub_ad->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($Cat_Sub_ad->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
       foreach ($imgs as $img){
         $adImges[] = $img;
       }
      }
     echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }}

  //Details page
 public function Ad_details(){

     $info_array = array();  $images_array = array();
     $time = array();         $priceFormat = array();
     $salary_from = array();  $salary_to = array();
     $status = "";

     $custom_id = trim(htmlspecialchars($_POST['custom_id']));
     // Updating and calculating ad views
     $poster_id = App::get('database')->query('SELECT user_id FROM ads WHERE custom_id=:custom_id', array(':custom_id'=>$custom_id))[0]['user_id'];
      //Inserting and Updating ad views (Path/boostrap.php)
     countViews($poster_id,$custom_id);
     $bussines_name = App::get('database')->query('SELECT business_name FROM business_info WHERE user_ref=:user_ref', array(':user_ref'=>$poster_id))[0]['business_name'];
     $views_updates = App::get('database')->viewsCount($poster_id,$custom_id);
     $ad_likes = App::get('database')->query('SELECT * FROM likes WHERE ad_id=:ad_id ', array(':ad_id'=>$custom_id));
     $user_info = App::get('database')->userInfo($poster_id);

    if($details = App::get('database')->fetchItem($custom_id)){
     foreach ($details as $detail){
      $info_array[] = $detail;
      $priceFormat[] = number_format_drop_zero_decimals($detail->value, 2);
      @$salary_from[] = number_format_drop_zero_decimals($detail->salary_from, 2);
      @$salary_to[] = number_format_drop_zero_decimals($detail->salary_to, 2);
      $time = array($mytimeFormat = date("g:i A ,  d M Y", strtotime($detail->datetime)));
     }
    if($details_images = App::get('database')->allImages($custom_id)){
     foreach ($details_images as $details_image){
       $images_array[] = $details_image;
     }
      echo '{"userData":'.json_encode(array($info_array,$images_array,$time,$views_updates,$bussines_name,$user_info,$priceFormat,count($ad_likes),$salary_from,$salary_to)).'}';
     }
 }}
                /*==============================================
                            Saving app Users Data
                 =================================================*/

 public function appactiveUsers(){
  $active_user = trim(htmlspecialchars($_POST["active_user"]));
  App::get('database')->query('INSERT INTO appusers VALUES (id,:activeusers,:datetime)',
  array(':activeusers'=>$active_user,':datetime'=>date('Y-m-d H:i:s')));
 }

 //UniversallinkShop
public function appUniversallinkShop(){
 $user_id = App::get('database')->query('SELECT id FROM `users` WHERE user_ref=:user_ref LIMIT 1', array(':user_ref'=> trim(htmlspecialchars($_POST["shop_id"])) ))[0]['id'];
 $bussines_name = App::get('database')->query('SELECT business_name FROM `business_info` WHERE user_ref=:user_ref', array(':user_ref'=>$user_id))[0]['business_name'];
 $poster_name = App::get('database')->query('SELECT poster_name FROM `ads` WHERE user_id=:user_id', array(':user_id'=>$user_id))[0]['poster_name'];

 echo '{"userData":'.json_encode(array($user_id , $bussines_name , $poster_name)).'}';
}

 //User lastseen
 public function userLastseen(){
  $user_id = trim(htmlspecialchars($_POST["user_id"]));
 if(App::get('database')->query('SELECT * FROM lastseen WHERE user_id=:user_id', array(':user_id'=>$user_id))){
  App::get('database')->query('UPDATE lastseen SET datetime=:datetime WHERE user_id=:user_id', array(':datetime'=>date('Y-m-d H:i:s'),':user_id'=>$user_id));
 }else{
  App::get('database')->query('INSERT INTO lastseen VALUES (id,:user_id,:datetime)',
  array(':user_id'=>$user_id,':datetime'=>date('Y-m-d H:i:s')));
   }
 }

 //Account registration methods for the app
 public function appPinSender()
  {
   $errors = array();
   $mobile =  htmlspecialchars(trim($_POST['mobile']));
   if(!App::get('database')->query('SELECT * FROM users WHERE  mobile=:mobile', array(':mobile'=>$mobile))){
      if(App::get('database')->query('SELECT * FROM codes WHERE mobile=:mobile', array(':mobile'=>$mobile))){
        App::get('database')->query('DELETE FROM codes WHERE mobile=:mobile', array(':mobile'=>$mobile));
        }
        if(!empty($mobile)){
             if (preg_match('/[0-9_]+/', $mobile)){
               if(strlen($mobile) == 10) {
                 $code = sms_code();
                 $msg_body = 'Your account pin code is'.' '.$code;  //Sms body
                 $msg_reciever = $mobile; //SMS sender number
                 include_once 'Messages.php';
                  if (!empty($code && $mobile)){
                    App::get('database')->insert('codes',[
                     'code' =>password_hash($code, PASSWORD_BCRYPT),
                     'mobile' =>$mobile
                    ]);
                    $success =  "success";
                    $message =  "Your pin has been sent to".' '.$mobile.'.';
                    }else {
                    $errors[] = 'Unknwon error occured, please try again.';
                 }
               }else {
                 $errors[] = 'Invalid mobile number!';
               }
               }else {
                 $errors[] = 'Invalid mobile number!';
               }
     }else {
      $errors[] = 'Mobile text field is empty!';
    }
 }
 else{
 $errors[] = 'Mobile number already exist on our database!';
 $errors[] = 'Mobile number already used!';
 }
 if(isset($success)){
   echo '{"Registration":'.json_encode(array($success,$message,$mobile,$code)).'}';
 }else {
   echo '{"Registration":'.json_encode(array($errors)).'}';
 }
}


 public function appUserRegister()
 {
 $fname = htmlspecialchars(trim($_POST['fname']));
 $lname = htmlspecialchars(trim($_POST['lname']));
 $mobile = htmlspecialchars(trim($_POST['mobile']));
 $pin = htmlspecialchars(trim($_POST['pin']));
 $user_ref = user_ref();//user reference function
 $errors = array();
 if(!empty($fname)){
 if(strlen($fname) > 2 && strlen($fname) < 16){
 if(!empty($lname)){
 if(strlen($lname) > 2 && strlen($lname) < 16){
 if(!empty($mobile)){
 if(strlen($mobile) < 11 && strlen($mobile) > 9 && preg_match('/[0-9_]+/', $mobile)){
 if(strlen($pin) > 5 && strlen($pin) < 7  && preg_match('/[0-9_]+/', $pin)){
 if(!empty($pin)){
     if(App::get('database')->query('SELECT * FROM codes WHERE  mobile=:mobile', array(':mobile'=>$mobile))  &&
     password_verify($pin, App::get('database')->query('SELECT code FROM codes WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['code'])
     )
     {
      $device = deviceDetector();
      $brand = detectMobilebrand();
      $os = detectOS();
      App::get('database')->query('INSERT INTO users VALUES (id,:fname,:lname,:mobile,:email,:pin,:device,:brand,:os,:facebook_id,:user_ref,:app_type,:reg_date)', array(':fname'=>$fname,':lname'=>$lname,':mobile'=>$mobile,':email'=>'',':pin'=>password_hash($pin, PASSWORD_BCRYPT),':device'=>$device,':brand'=>$brand,':os'=>$os,':facebook_id'=>'',':user_ref'=>$user_ref,':app_type'=>'mobile','reg_date'=>$time = date('Y-m-d H:i:s')));
      App::get('database')->query('DELETE FROM codes WHERE mobile=:mobile', array(':mobile'=>$mobile));
      $cstrong = True;
      $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
      $user_id = App::get('database')->query('SELECT id FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['id'];
      $user_info = App::get('database')->query('SELECT fname,lname,mobile,user_ref FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile));
      App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
      App::get('database')->query('INSERT INTO notifications VALUES (id, :unknown_device_logins,:approved_ads,:chat_notifications,:general_notifications,:user_ref)', array(':unknown_device_logins'=>1,':approved_ads'=>1,':chat_notifications'=>1,':general_notifications'=>1,':user_ref'=>$user_id));
      $status = "Success";
      }
      else
    {
       $errors[] = 'Please check your pin code or mobile number!';
    }
    }else {
       $errors[] = "Invalid pin code!";
    }
    }else{
       $errors[] = "Pin code text field is empty!";
    }
    }else {
       $errors[] = "Invalid mobile number!";
    }
    }else {
       $errors[] = 'Mobile text field is empty!';
    }
    }
      else {
       $errors[] = "Lastname is too short or long!";
    }
    }else {
       $errors[] = "Lastname is empty!";
    }
    }else{
      $errors[] = "Firstname too short or too long!";
    }
    }else
    {
      $errors[] = "Firstname is empty!";
   }
   if(isset($status)){
   foreach ($user_info as $user_info_){
    $user_infos[] = $user_info_;
   }
   echo '{"Security":'.json_encode(array($user_infos,$user_id,$os)).'}';
   }else {
   echo '{"Security":'.json_encode(array($errors)).'}';
   }
}



 public function appFacebookRegister()
 {
 $fname = htmlspecialchars(trim($_POST['fname']));
 $lname = htmlspecialchars(trim($_POST['lname']));
 $facebook_id = htmlspecialchars(trim($_POST['facebook_user_id']));
 $facebook_email = htmlspecialchars(trim($_POST['facebook_user_email']));
 $user_ref = user_ref();//user reference function
 $errors = array();
 if(!empty($fname)){
 if(strlen($fname) > 2 && strlen($fname) < 16){
 if(!empty($lname)){
 if(strlen($lname) > 2 && strlen($lname) < 16){
   if(App::get('database')->query('SELECT * FROM users WHERE  facebook_id=:facebook_id', array(':facebook_id'=>$facebook_id)))
   {
    $os = detectOS();
    $cstrong = True;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $user_id = App::get('database')->query('SELECT id FROM users WHERE facebook_id=:facebook_id', array(':facebook_id'=>$facebook_id))[0]['id'];
    $user_info = App::get('database')->query('SELECT fname,lname,mobile,user_ref FROM users WHERE facebook_id=:facebook_id', array(':facebook_id'=>$facebook_id));
    App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
    App::get('database')->query('INSERT INTO notifications VALUES (id, :unknown_device_logins,:approved_ads,:chat_notifications,:general_notifications,:user_ref)', array(':unknown_device_logins'=>1,':approved_ads'=>1,':chat_notifications'=>1,':general_notifications'=>1,':user_ref'=>$user_id));
    $status = "Success";
    }else
    {
    $device = deviceDetector();
    $brand = detectMobilebrand();
    $os = detectOS();
    App::get('database')->query('INSERT INTO users VALUES (id,:fname,:lname,:mobile,:email,:pin,:device,:brand,:os,:facebook_id,:user_ref,:app_type,:reg_date)', array(':fname'=>$fname,':lname'=>$lname,':mobile'=>'',':email'=>$facebook_email,':pin'=>'',':device'=>$device,':brand'=>$brand,':os'=>$os,':facebook_id'=>$facebook_id,':user_ref'=>$user_ref,':app_type'=>'mobile','reg_date'=>$time = date('Y-m-d H:i:s')));
    $cstrong = True;
    $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
    $user_id = App::get('database')->query('SELECT id FROM users WHERE facebook_id=:facebook_id', array(':facebook_id'=>$facebook_id))[0]['id'];
    $user_info = App::get('database')->query('SELECT fname,lname,mobile,user_ref FROM users WHERE facebook_id=:facebook_id', array(':facebook_id'=>$facebook_id));
    App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
    App::get('database')->query('INSERT INTO notifications VALUES (id, :unknown_device_logins,:approved_ads,:chat_notifications,:general_notifications,:user_ref)', array(':unknown_device_logins'=>1,':approved_ads'=>1,':chat_notifications'=>1,':general_notifications'=>1,':user_ref'=>$user_id));
    $status = "Success";
    }

    }else {
      $errors[] = "Lastname is too short or too long";
    }
    }else {
      $errors[] = "Lastname is empty!";
    }
    }else{
      $errors[] = "Firstname too short or too long!";
    }
    }else{
      $errors[] = "Firstname is empty!";
    }
   if(isset($status)){
   foreach ($user_info as $user_info_){
    $user_infos[] = $user_info_;
   }
   echo '{"Security":'.json_encode(array($user_infos,$user_id,$os)).'}';
   }else {
   echo '{"Security":'.json_encode(array($errors)).'}';
   }
}


 public function appUserLogin()
 {
  $mobile = trim(htmlspecialchars($_POST['mobile']));
  $pin = trim(htmlspecialchars($_POST['pin']));
  $errors = array();
  //$user_infos = array();
  if(!empty($mobile) && !empty($pin)){
  if(strlen($mobile) == 10) {
    if($mobile !=''){
     if(preg_match('/[0-9_]+/', $mobile)){
         if(strlen($pin) == 6){
           if(App::get('database')->query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))) {
                   if(password_verify($pin, App::get('database')->query('SELECT pin FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['pin'])){
                           $cstrong = True;
                           $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                           $user_id = App::get('database')->query('SELECT id FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile))[0]['id'];
                           $user_info = App::get('database')->query('SELECT fname,lname,mobile,user_ref FROM users WHERE mobile=:mobile', array(':mobile'=>$mobile));
                           App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token),':user_id'=>$user_id));

                           $browser = detectBrowsers();
                           $ip = getIp();
                           $device = deviceDetector();
                           $brand = detectMobilebrand();
                           $os = detectOS();

                           //login_security
                          if(App::get('database')->query('SELECT * FROM login_security WHERE user_ref=:user_ref', array(':user_ref'=>$user_id))){
                            if(!App::get('database')->query('SELECT * FROM login_security WHERE user_ref=:user_ref  AND ip=:ip', array(':user_ref'=>$user_id,':ip'=>$ip))){
                              if(App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref AND unknown_device_logins=:unknown_device_logins', array(':user_ref'=>$user_id,':unknown_device_logins'=>1))){
                                $msg_body = 'Your Yenswape Account was just signed in to from a new'." $os ".' device with '." $browser ".'browser. You\'re getting this SMS to make sure it was you.';  //Sms body
                                $msg_reciever = $mobile; //SMS sender number
                                include_once 'Messages.php';
                                App::get('database')->query('INSERT INTO login_security VALUES (id, :ip, :device, :brand, :browser, :OS, :user_ref)', array(':ip'=>$ip,':device'=>$device,':brand'=>$brand,':browser'=>$browser,':OS'=>$os, ':user_ref'=>$user_id));
                              }
                            }
                          }else{
                            App::get('database')->query('INSERT INTO login_security VALUES (id, :ip, :device, :brand, :browser, :OS, :user_ref)', array(':ip'=>$ip,':device'=>$device,':brand'=>$brand,':browser'=>$browser,':OS'=>$os, ':user_ref'=>$user_id));
                          }
                      $status = 'unlocked';
                   } else {
                      $errors[] = 'Incorrect pin code!';
                  }
                } else{
                   $errors[] =  'User not registered!';
                }
         }else {
           $errors[] = 'Invalid pin code!';
         }
       }else {
         $errors[] = 'Invalid mobile number or pin!';
       }
     }else
     {
       $errors[] = 'Invalid mobile number or pin code!';
     }
   }else {
    $errors[] = 'Please check your mobile number!';
   }
 }else{
  $errors[] = 'All fields  are required!';
 }
if(isset($status)){
  echo '{"Security":'.json_encode(array($user_info,$user_id,$os)).'}';
}else {
 echo '{"Security":'.json_encode(array($errors)).'}';
}

}

public function appRecoverPin()
{
 $code = sms_code();
  $reset_number = htmlspecialchars($_POST['mobile']);
  if(is_numeric($reset_number)){
    if(App::get('database')->query('SELECT mobile FROM users WHERE mobile=:mobile', array(':mobile'=>$reset_number))) {
      App::get('database')->query('UPDATE users SET pin=:pin WHERE mobile=:mobile', array(':mobile'=>$reset_number,':pin'=>password_hash($code, PASSWORD_BCRYPT)));
      $msg_body = 'Your new pin code is, '.$code.'.';  //Sms body
      $msg_reciever = $reset_number; //SMS sender number
      include_once 'Messages.php';
      echo 'Success';
     }else {
      echo 'Error';
    }
  }
}


//Funtion for each ad upload and images insert reference
 function appaAd_refs(){
  $result = "";
  $chars  = "123456789";
  $charArray = str_split($chars);
 for($i = 0; $i < 6; $i++){
   $randitem = array_rand($charArray);
   $result .= "" .$charArray[$randitem];
   $final = $result;
   }
 $results = App::get('database')->validateUniquecodeadpost($final);
  if($results > 0){
    $result = "";
  for($i = 0; $i < 6; $i++){
    $randitem = array_rand($charArray);
    $result .= "" .$charArray[$randitem];
    $final = $result;
    }
    echo $final;
  }else{ echo $final; }
 }


public function appPostAd()
 {
 $title = ucfirst(strtolower(trim(htmlspecialchars($_POST['title']))));
  $main_cat = strtolower(trim(htmlspecialchars($_POST['main_cat'])));
  $subcategory = strtolower(trim(htmlspecialchars($_POST['subcategory'])));
  $employer = htmlspecialchars($_POST['employer']);
  $application_deadline = htmlspecialchars($_POST['application_deadline']);
  $job_type = htmlspecialchars($_POST['job_type']);
  $qualification = htmlspecialchars($_POST['qualification']);
  $min_experience = htmlspecialchars($_POST['min_experience']);
  $max_experience = htmlspecialchars($_POST['max_experience']);
  $salary_from = htmlspecialchars($_POST['salary_from']);
  $salary_to = htmlspecialchars($_POST['salary_to']);
  $surface_size = htmlspecialchars($_POST['surface_size']);
  $bedrooms = htmlspecialchars($_POST['bedrooms']);
  $bathrooms = htmlspecialchars($_POST['bathrooms']);
  $broker_fee = htmlspecialchars($_POST['broker_fee']);
  $condition = htmlspecialchars($_POST['condition']);
  $listing_type = htmlspecialchars($_POST['listing_type']);
  $city_town = htmlspecialchars($_POST['city_town']);
  $region = htmlspecialchars($_POST['region']);
  $make = htmlspecialchars($_POST['make']);
  $model = htmlspecialchars($_POST['model']);
  $year = htmlspecialchars($_POST['year']);
  $transmission = htmlspecialchars($_POST['transmission']);
  $car_type = htmlspecialchars($_POST['car_type']);
  $miles = htmlspecialchars(trim($_POST['miles']));
  $motomake = htmlspecialchars(trim($_POST['motor_make']));
  $wishes = ucfirst(htmlspecialchars(strtolower(trim($_POST['wishlist']))));
  $description = htmlspecialchars(ucfirst(strtolower(trim($_POST['description']))));
  $value = htmlspecialchars(trim($_POST['price']));
  $negotiable = ucfirst(trim(htmlspecialchars($_POST['negotiable'])));
  $posterName = htmlspecialchars(trim($_POST['poster_name']));
  $posterMobile = htmlspecialchars(trim($_POST['poster_mobile']));
  $user_id = htmlspecialchars(trim($_POST['user_id']));
  $unique_id = htmlspecialchars(trim($_POST['code']));

  //Change from Trade to Swap and from Job_Offere to Job_Offer
  if($listing_type == "Trade"){
    $listing_type = "Swap";
  }else if($listing_type == "Trade or Sell" ){
    $listing_type = "Swap or Sell";
  }else if($listing_type == "Job_Offere"){
    $listing_type = "Job_Offer";
  }
  //Pre processing ad URL
  $upload_time = date('Y-m-d');
  $url = $title.' '.$unique_id;
  $url = seoUrl($url);
  $message = "";

if(!empty($title)){
  if(strlen($title) >= 6 && strlen($title) <= 45){
   if(!empty($main_cat)){
    if(!empty($subcategory)){
    if(!empty($city_town)){
    if(!empty($region)){
    if(!empty($listing_type)){
    if(!empty($condition)){
    if(strlen($description) > 5 && strlen($description) <= 500){
    if(!empty($value)){
    if(strlen($value) >= 1 ){
  }else{
   $errors = 'Please give your item a price or value.';
  }
  }else{
   $errors = 'Please the value textbox is empty.';
  }
  }else{
   $errors = 'Please check your description input.';
  }
  }else{
   $errors = 'Please your item current condition from the dropdown below.';
  }
  }else{
   $errors = 'Please select a valid listing type from below.';
  }
  }else{
   $errors = 'Please select a valid suburb or town.';
  }
  }else {
   $errors = 'Please select a valid devision or region.';
  }
  }else{
   $errors = 'Please select a valid item sub-category.';
  }
  }else{
   $errors = 'Please select a valid item category.';
  }
  }else{
   $errors = 'Please check your title length.';
  }
  }else{
   $errors = 'Please your item title textbox is empty.';
  }

if(!isset($errors)){
  if(!App::get('database')->query('SELECT * FROM images WHERE user_id=:userid  AND ad_id=:custom_id',array(':userid'=>$user_id,':custom_id'=>$unique_id))){

    App::get('database')->query('INSERT INTO ads VALUES (

   id,:title,:main_cat,:subcategory,:company_employer,:appli_deadline,
   :job_type,:min_qualific,:min_exp,:max_exp,:salary_from,:salary_to,
   :surface_size,:bedrooms,:bathrooms,:broker_fee,:make,:model,:year,:transmission,
   :car_type,:miles,:moto_make,:city_town,:region,:listing_type,:wishlist,:item_condit,
   :description,:value,:negotiable, :datetime, :user_id,:custom_id,:uri,status,:poster_name,
   :poster_mobile)', array(':title' => $title, ':main_cat' => $main_cat, ':subcategory'=> $subcategory,

   ':company_employer'=>$employer,':appli_deadline'=>$application_deadline,

   ':job_type'=>$job_type,':min_qualific'=>$qualification,':min_exp'=>$min_experience,

   ':max_exp'=>$max_experience,':salary_from'=>$salary_from,':salary_to'=>$salary_to,

   ':surface_size'=>$surface_size,':bedrooms'=>$bedrooms,':bathrooms'=>$bathrooms,

   ':broker_fee'=>$broker_fee,':make' => $make, ':model' => $model, ':year' => $year,

    ':transmission' => $transmission,':car_type' => $car_type, ':miles' => $miles,

    ':moto_make' => $motomake, ':city_town' => $city_town, ':region' => $region,

   ':listing_type' => $listing_type, ':wishlist' => $wishes, ':item_condit' => $condition,

   ':description' => $description, ':value'=> $value,':negotiable'=>$negotiable,':datetime'=>date('Y-m-d H:i:s'),

   ':user_id' => $user_id,':custom_id'=>$unique_id,':uri'=>$url,':poster_name' => $posterName,':poster_mobile' => $posterMobile));
  echo "Success";
 } else {
   $delete_img = App::get('database')->query('SELECT * FROM images WHERE user_id=:userid  AND ad_id=:adid', array(':userid'=>$user_id,':adid'=>$unique_id));
   $img_count = 0;
 foreach($delete_img as $delete){
    $path_small = 'images/user-submitted/thumb/xs/'.$delete[3];
    $path_big = 'images/user-submitted/thumb/'.$delete[3];
    $img_count++;
    if(unlink($path_small)){
     if(unlink($path_big)){/*echo "Deleted"; */}else { /*echo "fail"; */ }
    }else{   /*echo "fail"; */ }
  }
  if($img_count == sizeof($delete_img)){
      App::get('database')->removeAds2('images',$unique_id);
   }
  echo "Error";
}
}else {
 echo $errors;
}}


// public function validateUpload($message){
// if($message == "Success"){
// if(App::get('database')->query('SELECT id FROM ads WHERE user_id=:userid  AND custom_id=:custom_id',array(':userid'=>$user_id,':custom_id'=>$unique_id))){
//   echo  "Success";
//  }else {
//   echo "Error";
//  }}
// }

public function appAdimages(){
  $ad_id =  htmlspecialchars(trim($_POST['ad_id']));
  $user_id =  htmlspecialchars(trim($_POST['user_id']));

  if(isset($_FILES['file']['tmp_name'])  && !empty($_FILES['file']['tmp_name'])){
     $file_name = $_FILES['file']['name'];
     $file_photo_tmp = $_FILES['file']['tmp_name'];
     $image_size = $_FILES['file']['size'];

     $path = "images/user-submitted/thumb/";
     $store_thumb = "images/user-submitted/thumb/xs/";

     //Processing thumb images
     $width = 80;
     $height = 100;

    //Get new dimensions
     list($width_orig, $height_orig) = getimagesize($file_photo_tmp);
     $ratio_orig = $width_orig/$height_orig;
     if ($width/$height > $ratio_orig){
      $width = $height*$ratio_orig;
     } else {
      $height = $width/$ratio_orig;
     }

     // Resample $path
     $image_p = imagecreatetruecolor($width, $height);
     $image = imagecreatefromjpeg($file_photo_tmp);
     imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

    $imgExt = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $valid_formats = array("jpg","JPG", "jpeg", "png", "gif", "bmp");
    $img_rename =  time().'_'.rand(1000,9999).'.'.$imgExt;

    if(in_array($imgExt, $valid_formats)){
    if($image_size < 5000000){
    if(move_uploaded_file($file_photo_tmp, $path.$img_rename)){
      // Output
      imagejpeg($image_p, $store_thumb.$img_rename, 100);
    }else{
      $img_errors = 'Error! Please try again.3';
    }
    }else {
     $img_errors = 'Sorry your selected image is too large,please resize it and try again.';
    }
   }else {
     $img_errors = 'Sorry your selected image is not allowed';
   }

 // Checking to see if ad image has been uploaded already, if it exits then we will remove it and re upload it to avoid conflict
 if(!App::get('database')->query('SELECT id FROM images WHERE user_id=:userid AND ad_id=:ad_id',array(':userid'=>$user_id,':ad_id'=>$ad_id))){
  if(!isset($img_errors)){
    App::get('database')->query('INSERT INTO images VALUES (id,:user_id,:ad_id,:images
    )', array('user_id'=>$user_id,':ad_id'=>$ad_id,':images'=>$img_rename));
   }else {
      echo $img_errors;
   }
  }else {
    $delete_img = App::get('database')->query('SELECT * FROM images WHERE user_id=:userid  AND ad_id=:adid', array(':userid'=>$user_id,':adid'=>$ad_id));
    $img_count = 0;
  foreach($delete_img as $delete){
     $path_small = 'images/user-submitted/thumb/xs/'.$delete[3];
     $path_big = 'images/user-submitted/thumb/'.$delete[3];
     $img_count++;
     if(unlink($path_small)){
      if(unlink($path_big)){/*echo "Deleted"; */}else { /*echo "fail"; */ }
     }else{   /*echo "fail"; */ }
    }
   if($img_count == sizeof($delete_img)){
      App::get('database')->removeAds2('images',$ad_id);
    }
  }
   }else { $img_errors = 'Please select at least 1 photo for your ad'; }
 }



 public function appLikes(){
   if(isset($_POST["ad_id"])){
    $ad_id = trim(htmlspecialchars($_POST["ad_id"]));
    $poster = trim(htmlspecialchars($_POST["poster"]));
    $user_id = trim(htmlspecialchars($_POST["user_id"]));

    if(!App::get('database')->query('SELECT * FROM likes WHERE user=:userid  AND ad_id=:adid ', array(':userid'=>$user_id,':adid'=>$ad_id))){
    App::get('database')->query('INSERT INTO likes VALUES (id, :ad_id,:poster_id,:user,:datetime)',
 array(':ad_id'=>$ad_id,':poster_id'=>$poster,':user'=>$user_id,'datetime'=>date('Y-m-d H:i:s')));
    echo "success";
    }else {
    App::get('database')->query('DELETE FROM likes WHERE user=:userid  AND ad_id=:adid', array(':userid'=>$user_id,':adid'=>$ad_id));
    echo "exist";
    }
   }
  }


 public function appCountLikes(){
   $adid =  trim(htmlspecialchars($_POST["ad_id"]));
   $ad_likes = App::get('database')->query('SELECT * FROM likes WHERE ad_id=:adid', array(':adid'=>$adid));
   echo count($ad_likes);
 }


 //Items Search
 public function appSearch(){
 if(isset($_POST['_keyword']))
   {
   $keyword = htmlspecialchars(trim($_POST['_keyword']));
   if($items_search = App::get('database')->searchItems($keyword,1)){
       $adInfo = array();
       $adImges = array();
       $postDate = array();
       $priceFormat = array();
    foreach($items_search as $item_search){
       $custom_id = $item_search->custom_id;
       $adInfo[] = $item_search;
       $postDate[] = formatTimeAgo($item_search->datetime);
       $priceFormat[] = number_format_drop_zero_decimals($item_search->value, 2);
       $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
    foreach($imgs as $img){
         $adImges[] = $img;
       }}
      echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
     }
  }}

 // Getting searching items on scroll
 public function appSearchScroll(){
   $keyword = htmlspecialchars(trim($_POST['_keyword']));
   $offset = trim(htmlspecialchars($_POST["search_offset"]));
  if($items_search = App::get('database')->searchScroll($keyword,1,$offset)){
      $adInfo = array();
      $adImges = array();
      $postDate = array();
      $priceFormat = array();
   foreach($items_search as $item_search){
      $custom_id = $item_search->custom_id;
      $adInfo[] = $item_search;
      $postDate[] = formatTimeAgo($item_search->datetime);
      $priceFormat[] = number_format_drop_zero_decimals($item_search->value, 2);
      $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
   foreach($imgs as $img){
        $adImges[] = $img;
      }}
     echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }}

 public function appFilters(){
  if(isset($_POST['category']) && isset($_POST['listing_sel']) && isset($_POST['min']) && isset($_POST['max']) && isset($_POST['location']))
  {
  $category     =  htmlspecialchars(trim($_POST['category']));
  $listing_sel  =  htmlspecialchars(trim($_POST['listing_sel']));
  $min          =  htmlspecialchars(trim($_POST['min']));
  $max          =  htmlspecialchars(trim($_POST['max']));
  $location     =  htmlspecialchars(trim($_POST['location']));

  if($category == "" || $category =="view all"){ $category = ""; }
  //Filters
  $data = array(); $data1  = array();

  if($category !=="" && $listing_sel == 'all listing types' && $min == "" && $max == "" && $location == ""){
   $filters_results = App::get('database')->appFilter1($category);
  }elseif ($category ==""  &&  $listing_sel != 'all listing types' && $min == "" && $max == "" && $location == ""){
   $filters_results = App::get('database')->appFilter2($listing_sel); //Only Listing type is set";
  }elseif ($category ==""  && $listing_sel == 'all listing types' && $min != "" && $max != "" && $location == ""){
   $filters_results = App::get('database')->appFilter3($min,$max); // Only price set
  }elseif ($category ==""  &&  $listing_sel == 'all listing types' && $min == "" && $max == "" && $location != ""){
   $filters_results = App::get('database')->appFilter4($location); //Only location  is set";
  }elseif ($category !=""  && $listing_sel != 'all listing types' && $min == "" && $max == "" && $location == ""){
   $filters_results = App::get('database')->appFilter5($category,$listing_sel); //category and listing type  is set
  }elseif ($category !=""  && $listing_sel == 'all listing types' && $min != "" && $max != "" && $location == ""){
   $filters_results = App::get('database')->appFilter6($category,$min,$max); //Only category and price is set
  }elseif ($category !=""  && $listing_sel == 'all listing types' && $min == "" && $max == "" && $location != ""){
   $filters_results = App::get('database')->appFilter7($category,$location);  //Only category and location is set
  }elseif ($category =="" &&  $listing_sel != 'all listing types' && $min !="" && $max !="" && $location == ""){
   $filters_results = App::get('database')->appFilter8($listing_sel,$min,$max); //Only listing type and price is set
  }elseif ($category =="" &&  $listing_sel != 'all listing types' && $min == "" && $max == "" && $location != ""){
   $filters_results = App::get('database')->appFilter9($listing_sel,$location); //echo "Only listing type and location is set
  }elseif ($category =="" && $listing_sel == 'all listing types' && $min != "" && $max != "" && $location != ""){
   $filters_results = App::get('database')->appFilter10($min,$max,$location);  // "Only price and location is set
  }elseif ($category !="" &&  $listing_sel =='all listing types' && $min !="" && $max !="" && $location !=""){
   $filters_results = App::get('database')->appFilter11($min,$max,$location,$category); //All set except listing type
  }elseif ($category !="" &&  $listing_sel !='all listing types' && $min =="" && $max =="" && $location !=""){
   $filters_results = App::get('database')->appFilter12($listing_sel,$location,$category); //All set except price
  }elseif ($category =="" && $listing_sel !='all listing types' && $min !="" && $max !="" && $location !=""){
   $filters_results = App::get('database')->appFilter13($listing_sel,$location,$min,$max);  //All set except category
  }elseif ($category !="" && $listing_sel !='all listing types' && $min !="" && $max !="" && $location ==""){
   $filters_results = App::get('database')->appFilter14($listing_sel,$category,$min,$max);  //All set except location
  }elseif ($category !="" && $listing_sel !='all listing types' && $min !="" && $max !="" && $location !="") {
   $filters_results = App::get('database')->appFilter15($listing_sel,$category,$min,$max,$location);  //"All set..";
  }

  if($filters_results){
     $adInfo = array();
     $adImges = array();
     $postDate = array();
     $priceFormat = array();
  foreach($filters_results as $filters_result){
     $custom_id = $filters_result->custom_id;
     $adInfo[] = $filters_result;
     $postDate[] = formatTimeAgo($filters_result->datetime);
     $priceFormat[] = number_format_drop_zero_decimals($filters_result->value, 2);
     $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
  foreach($imgs as $img){
       $adImges[] = $img;
     }}
    echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }
  }}


  public function appFilters_scroll(){
   if(isset($_POST['category']) && isset($_POST['listing_sel']) && isset($_POST['min']) && isset($_POST['max']) && isset($_POST['location']))
   {
    $category     =  htmlspecialchars(trim($_POST['category']));
    $listing_sel  =  htmlspecialchars(trim($_POST['listing_sel']));
    $min          =  htmlspecialchars(trim($_POST['min']));
    $max          =  htmlspecialchars(trim($_POST['max']));
    $location     =  htmlspecialchars(trim($_POST['location']));
    $offset       =  htmlspecialchars(trim($_POST['filters_offset']));

    if($category == "" || $category =="view all"){ $category = ""; }
    //Filters
    $data = array(); $data1  = array();
    if($category !=="" && $listing_sel == 'all listing types' && $min == "" && $max == "" && $location == ""){
     $filters_results = App::get('database')->appFilter1_scroll($category,$offset);
    }elseif ($category ==""  &&  $listing_sel != 'all listing types' && $min == "" && $max == "" && $location == ""){
     $filters_results = App::get('database')->appFilter2_scroll($listing_sel,$offset); //Only Listing type is set";
    }elseif ($category ==""  && $listing_sel == 'all listing types' && $min != "" && $max != "" && $location == ""){
     $filters_results = App::get('database')->appFilter3_scroll($min,$max,$offset); // Only price set
    }elseif ($category ==""  &&  $listing_sel == 'all listing types' && $min == "" && $max == "" && $location != ""){
     $filters_results = App::get('database')->appFilter4_scroll($location,$offset); //Only location  is set";
    }elseif ($category !=""  && $listing_sel != 'all listing types' && $min == "" && $max == "" && $location == ""){
     $filters_results = App::get('database')->appFilter5_scroll($category,$listing_sel,$offset); //category and listing type  is set
    }elseif ($category !=""  && $listing_sel == 'all listing types' && $min != "" && $max != "" && $location == ""){
     $filters_results = App::get('database')->appFilter6_scroll($category,$min,$max,$offset); //Only category and price is set
    }elseif ($category !=""  && $listing_sel == 'all listing types' && $min == "" && $max == "" && $location != ""){
     $filters_results = App::get('database')->appFilter7_scroll($category,$location,$offset);  //Only category and location is set
    }elseif ($category =="" &&  $listing_sel != 'all listing types' && $min !="" && $max !="" && $location == ""){
     $filters_results = App::get('database')->appFilter8_scroll($listing_sel,$min,$max,$offset); //Only listing type and price is set
    }elseif ($category =="" &&  $listing_sel != 'all listing types' && $min == "" && $max == "" && $location != ""){
     $filters_results = App::get('database')->appFilter9_scroll($listing_sel,$location,$offset); //echo "Only listing type and location is set
    }elseif ($category =="" && $listing_sel == 'all listing types' && $min != "" && $max != "" && $location != ""){
     $filters_results = App::get('database')->appFilter10_scroll($min,$max,$location,$offset);  // "Only price and location is set
    }elseif ($category !="" &&  $listing_sel =='all listing types' && $min !="" && $max !="" && $location !=""){
     $filters_results = App::get('database')->appFilter11_scroll($min,$max,$location,$category,$offset); //All set except listing type
    }elseif ($category !="" &&  $listing_sel !='all listing types' && $min =="" && $max =="" && $location !=""){
     $filters_results = App::get('database')->appFilter12_scroll($listing_sel,$location,$category,$offset); //All set except price
    }elseif ($category =="" && $listing_sel !='all listing types' && $min !="" && $max !="" && $location !=""){
     $filters_results = App::get('database')->appFilter13_scroll($listing_sel,$location,$min,$max,$offset);  //All set except category
    }elseif ($category !="" && $listing_sel !='all listing types' && $min !="" && $max !="" && $location ==""){
     $filters_results = App::get('database')->appFilter14_scroll($listing_sel,$category,$min,$max,$offset);  //All set except location
    }elseif ($category !="" && $listing_sel !='all listing types' && $min !="" && $max !="" && $location !="") {
     $filters_results = App::get('database')->appFilter15_scroll($listing_sel,$category,$min,$max,$location,$offset);  //"All set..";
    }

  if($filters_results){
     $adInfo = array(); $adImges = array(); $postDate = array(); $priceFormat = array();
  foreach($filters_results as $filters_result){
     $custom_id = $filters_result->custom_id;
     $adInfo[] = $filters_result;
     $postDate[] = formatTimeAgo($filters_result->datetime);
     $priceFormat[] = number_format_drop_zero_decimals($filters_result->value, 2);
     $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
  foreach($imgs as $img){
    $adImges[] = $img;
    }}
    echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
  }}}

  //Getting Ads views tracker data
  public function appAdsTracker(){
   $user_id = trim(htmlspecialchars($_POST["poster_id"]));
  if($viewersInfo = App::get('database')->adViewsTracker($user_id)){
    $viewerId = array();
    $adTitle = array();
    $viewerFname = array();
    $posterContact = array();
    $adImges = array();
  foreach($viewersInfo as $viewerInfo){
   if($viewerInfo->user_id > 0 ){
    $viewerId[] = $viewerInfo->user_id;
    $adTitle[] = App::get('database')->query('SELECT `title` FROM `ads` WHERE custom_id=:custom_id', array(':custom_id'=>$viewerInfo->ad_id))[0]['title'];
    $viewerFname[] = App::get('database')->query('SELECT `fname` FROM `users` WHERE id=:id', array(':id'=>$viewerInfo->user_id))[0]['fname'];
    @$viewerContact[] = App::get('database')->query('SELECT `mobile` FROM `users` WHERE id=:id', array(':id'=>$viewerInfo->user_id))[0]['mobile'];
      $imgs = App::get('database')->App_latest_ads_imgs($viewerInfo->ad_id);
  foreach($imgs as $img){
     $adImges[] = $img;
   }
  }}
    echo '{"trackViewers":'.json_encode(array($viewerId,$adTitle,$viewerFname,$viewerContact,$adImges)).'}';
 }}


 //Getting user ads
 public function appUserads(){
   $poster_id = trim(htmlspecialchars($_POST["poster_id"]));
   if($user_ads = App::get('database')->userAds($poster_id)){
      $adInfo = array();
      $adImges = array();
      $postDate = array();
      $priceFormat = array();
   foreach($user_ads as $user_ad){
      $custom_id = $user_ad->custom_id;
      $adInfo[] = $user_ad;
      $postDate[] = formatTimeAgo($user_ad->datetime);
      $priceFormat[] = number_format_drop_zero_decimals($user_ad->value, 2);
      $imgs = App::get('database')->App_latest_ads_imgs($custom_id);
  foreach($imgs as $img){
        $adImges[] = $img;
   }}
    echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }}

  //Getting User Store Info
  public function appUserStoreInfo(){
   $poster_id = trim(htmlspecialchars($_POST["poster_id"]));
   if($stores_info = App::get('database')->userStoreInfo($poster_id)){
     $data = array();
       foreach ($stores_info as $store_info){
          $data[] = array($store_info);
      }
     echo '{"storeInfo":'.json_encode(array($data)).'}';
   }
  }

 //Getting user liked ads
 public function appLikedads(){
   $poster_id = trim(htmlspecialchars($_POST["poster_id"]));
   if($user_likes = App::get('database')->userLikes($poster_id)){
     $adInfo = array();
     $adImges = array();
     $postDate = array();
     $priceFormat = array();
   foreach ($user_likes as $user_like){
     $liked_ads = App::get('database')->fetchAdsinfo($user_like->ad_id);
   foreach ($liked_ads as $liked_ad){
     $adInfo[] = $liked_ad;
     $postDate[] = formatTimeAgo($liked_ad->datetime);
     $priceFormat[] = number_format_drop_zero_decimals($liked_ad->value, 2);
     $imgs = App::get('database')->App_latest_ads_imgs($liked_ad->custom_id);
   foreach ($imgs as $img){
      $adImges[] = $img;
     }
    }}
    echo '{"userData":'.json_encode(array($adInfo,$adImges,$priceFormat,$postDate)).'}';
   }}

 //Get likes graph count
 public function appgetLikes(){
 $user = trim(htmlspecialchars($_POST["user_id"]));
 $dateDay = date("d");
 $dateM = date("m-");
 $dateY = date("Y-");
 //For day likes
 $start = $dateY.$dateM.$dateDay.' '.'00:00:00';
 $enddate = $dateY.$dateM.$dateDay.' '.'23:59:59';
 //Week 1 likes
 $Week_1start = $dateY.$dateM.'01'.' '.'00:00:00';
 $Week_1enddate = $dateY.$dateM.'07'.' '.'23:59:59';
 //Week 2 likes
 $Week_2start = $dateY.$dateM.'08'.' '.'00:00:00';
 $Week_2enddate = $dateY.$dateM.'14'.' '.'23:59:59';
 //Week 3 likes
 $Week_3start = $dateY.$dateM.'15'.' '.'00:00:00';
 $Week_3enddate = $dateY.$dateM.'21'.' '.'23:59:59';
 //Week 4 likes
 $Week_4start = $dateY.$dateM.'22'.' '.'00:00:00';
 $Week_4enddate = $dateY.$dateM.'31'.' '.'23:59:59';
 //Month likes
 $Monthstart = $dateY.$dateM.'01'.' '.'00:00:00';
 $Monthenddate = $dateY.$dateM.'31'.' '.'23:59:59';
 //Year likes
 $Yearstart = $dateY.'01-'.'01'.' '.'00:00:00';
 $Yearenddate = $dateY.'12-'.'31'.' '.'23:59:59';
 //Daily likes query
 $day = App::get('database')->likesGraph($user,$start,$enddate);
 //Weekly likes query
 if($dateDay >= 1 && $dateDay < 8){
 $week = App::get('database')->likesGraph($user,$Week_1start,$Week_1enddate);
 }elseif ($dateDay >= 8  && $dateDay < 15) {
 $week = App::get('database')->likesGraph($user,$Week_2start,$Week_2enddate);
 }elseif ($dateDay >= 15 && $dateDay < 22) {
 $week = App::get('database')->likesGraph($user,$Week_3start,$Week_3enddate);
 }elseif ($dateDay >= 22 && $dateDay < 32) {
 $week = App::get('database')->likesGraph($user,$Week_4start,$Week_4enddate);
 }
 //Monthly likes query
 $month = App::get('database')->likesGraph($user,$Monthstart,$Monthenddate);
 //Yearly likes query
 $year = App::get('database')->likesGraph($user,$Yearstart,$Yearenddate);

 echo '{"likesGraph":'.json_encode(array($day,$week,$month,$year)).'}';
 }


 public function appgetViews(){
  $user = trim(htmlspecialchars($_POST["user_id"]));
  $dateDay = date("d");
  $dateM = date("m-");
  $dateY = date("Y-");
  //day views
  $start = $dateY.$dateM.$dateDay.' '.'00:00:00';
  $enddate = $dateY.$dateM.$dateDay.' '.'23:59:59';
  //Week 1 views
  $Week_1start = $dateY.$dateM.'01'.' '.'00:00:00';
  $Week_1enddate = $dateY.$dateM.'07'.' '.'23:59:59';
  //Week 2 views
  $Week_2start = $dateY.$dateM.'08'.' '.'00:00:00';
  $Week_2enddate = $dateY.$dateM.'14'.' '.'23:59:59';
  //Week 3 views
  $Week_3start = $dateY.$dateM.'15'.' '.'00:00:00';
  $Week_3enddate = $dateY.$dateM.'21'.' '.'23:59:59';
  //Week 4 views
  $Week_4start = $dateY.$dateM.'22'.' '.'00:00:00';
  $Week_4enddate = $dateY.$dateM.'31'.' '.'23:59:59';
  //Monthly views
  $Monthstart = $dateY.$dateM.'01'.' '.'00:00:00';
  $Monthenddate = $dateY.$dateM.'31'.' '.'23:59:59';
  //Yearly views
  $Yearstart = $dateY.'01-'.'01'.' '.'00:00:00';
  $Yearenddate = $dateY.'12-'.'31'.' '.'23:59:59';
  //Dialy views query
  $day = App::get('database')->viewsGraph($user,$start,$enddate);
  //Weekly views query
  if($dateDay >= 1 && $dateDay < 8){
  $week = App::get('database')->viewsGraph($user,$Week_1start,$Week_1enddate);
  }elseif ($dateDay >= 8  && $dateDay < 15) {
  $week = App::get('database')->viewsGraph($user,$Week_2start,$Week_2enddate);
  }elseif ($dateDay >= 15 && $dateDay < 22) {
  $week = App::get('database')->viewsGraph($user,$Week_3start,$Week_3enddate);
  }elseif ($dateDay >= 22 && $dateDay < 32) {
  $week = App::get('database')->viewsGraph($user,$Week_4start,$Week_4enddate);
  }
  //Monthly views query
  $month = App::get('database')->viewsGraph($user,$Monthstart,$Monthenddate);
  //Yearly views query
  $year = App::get('database')->ViewsGraph($user,$Yearstart,$Yearenddate);

  echo '{"viewsGraph":'.json_encode(array($day,$week,$month,$year)).'}';
}

 public function applistingTypes(){
   $user = trim(htmlspecialchars($_POST["user_id"]));
   //Getting selling ads
   $sellingaAds = App::get('database')->listingTypes($user,'Sell');
   //Getting Trading ads
   $tradingaAds = App::get('database')->listingTypes($user,'Swap');
   //Getting Trading or Selling ads
   $tradeorsellAds = App::get('database')->listingTypes($user,'Swap or Sell');
   //Getting Rent ads
   $rentAds = App::get('database')->listingTypes($user,'Rent');
   //Getting Job Offere ads
   $job_offerAds = App::get('database')->listingTypes($user,'job_Offer');
   //Getting Job Seeking ads
   $job_seekingAds = App::get('database')->listingTypes($user,'Job_Seeking');

   echo '{"listingPie":'.json_encode(array($sellingaAds,$tradingaAds,$tradeorsellAds,$rentAds,$job_offerAds,$job_seekingAds)).'}';
  }

public function appTabledisp(){
  $user_id = trim(htmlspecialchars($_POST["user_id"]));
 if($user_ads = App::get('database')->userAds($user_id)){
   $title = ""; $status = ""; $counts = "";
 foreach($user_ads as $user_ad){
   $title = $user_ad->title;
   $status = $user_ad->status;
   $custom_id = $user_ad->custom_id;
   $adsSums = App::get('database')->query('SELECT SUM(ad_views) FROM  `views`  WHERE  poster_id=:id AND  ad_id=:ad_id', array(':id'=>$user_id,':ad_id'=>$custom_id));
 foreach ($adsSums as $adsSum){
  $counts = $adsSum[0];
  }
    echo '{"tableData":'.json_encode(array($title,$status,$counts)).'}';
   }
 }}

 public function appUserinfo(){
   $user_id = trim(htmlspecialchars($_POST["user_id"]));
   if($user_infos = App::get('database')->fetchUserinfo($user_id)){
     foreach($user_infos as $user_info){
      $fname = $user_info->fname;
      $lname = $user_info->lname;
      $mobile = $user_info->mobile;
      $email =  $user_info->email;
    }
   echo '{"userInfo":'.json_encode(array($fname,$lname,$mobile,$email)).'}';
  }
}

public function appUpdateInfo(){
 $user_id = htmlspecialchars($_POST['user_id']);
 $fname = ucfirst(trim(htmlspecialchars($_POST['fname'])));
 $lname = ucfirst(trim(htmlspecialchars($_POST['lname'])));
 $mobile = trim(htmlspecialchars($_POST['mobile']));
 $email = trim(htmlspecialchars($_POST['email']));
if(!strlen($fname) < 3 || !strlen($fname) > 12){
  if(!strlen($lname) < 3 || !strlen($lname) > 15){
    if(!strlen($mobile) < 10 || !strlen($mobile) > 10){
      if(preg_match('/^[0-9]*$/', $mobile)){
       App::get('database')->query('UPDATE `users` SET fname=:fname, lname=:lname, mobile=:mobile, email=:email WHERE id=:user_id', array(':fname'=>$fname,':lname'=>$lname,':mobile'=>$mobile,':email'=>$email,':user_id'=>$user_id));
       echo "done";
      }else {
        echo "Invalid mobile number!";
      }
     }else {
      echo "Invalid mobile number!";
    }
   }else {
    echo "Your Lastname is too short or too long!";
  }
 }else {
   echo "Your Firstname is too short or too long!";
 }}

//Fetching ad data for the update page
public function appgetadUpdate(){
 $user_id = trim(htmlspecialchars($_POST["user_id"]));
 $custom_id = trim(htmlspecialchars($_POST["ad_id"]));
 if($ad_infos = App::get('database')->getAd($custom_id,$user_id)){
   $data = array();
   $data1 = array();
   foreach ($ad_infos as $ad_info){
     $data[] = array($ad_info);
     $imgs = App::get('database')->allImages($custom_id);
    foreach ($imgs as $img){
       $data1[] = array($img);
    }
   }
   echo '{"updateData":'.json_encode(array($data,$data1)).'}';
 }
}

 //app Update ad info
 public function appupdate_AdInfo(){

  $title = ucfirst(strtolower(trim(htmlspecialchars($_POST['title']))));
  $main_cat = strtolower(trim(htmlspecialchars($_POST['main_cat'])));
  $subcategory = strtolower(trim(htmlspecialchars($_POST['subcategory'])));
  $updat_employer = strtolower(trim(htmlspecialchars($_POST['updat_employer'])));
  $applic_deadline = strtolower(trim(htmlspecialchars($_POST['applic_deadline'])));
  $updat_job_type = strtolower(trim(htmlspecialchars($_POST['updat_job_type'])));
  $updat_qualification = strtolower(trim(htmlspecialchars($_POST['updat_qualification'])));
  $updat_min_experience = strtolower(trim(htmlspecialchars($_POST['updat_min_experience'])));
  $updat_max_experience = strtolower(trim(htmlspecialchars($_POST['updat_max_experience'])));
  $updat_salary_from = strtolower(trim(htmlspecialchars($_POST['updat_salary_from'])));
  $updat_salary_to = strtolower(trim(htmlspecialchars($_POST['updat_salary_to'])));
  $updat_surface_size = strtolower(trim(htmlspecialchars($_POST['updat_surface_size'])));
  $updat_bedrooms = strtolower(trim(htmlspecialchars($_POST['updat_bedrooms'])));
  $updat_bathrooms = strtolower(trim(htmlspecialchars($_POST['updat_bathrooms'])));
  $updat_broker_fee = htmlspecialchars($_POST['updat_broker_fee']);
  $condition = htmlspecialchars($_POST['condition']);
  $listing_type = htmlspecialchars($_POST['listing_type']);
  $city_town = htmlspecialchars($_POST['city_town']);
  $region = htmlspecialchars($_POST['region']);
  $make = htmlspecialchars($_POST['make']);
  $model = htmlspecialchars($_POST['model']);
  $year = htmlspecialchars($_POST['year']);
  $transmission = htmlspecialchars($_POST['transmission']);
  $car_type = htmlspecialchars($_POST['car_type']);
  $miles = htmlspecialchars(trim($_POST['miles']));
  $motomake = htmlspecialchars(trim($_POST['motor_make']));
  $wishes = ucfirst(htmlspecialchars(strtolower(trim($_POST['wishlist']))));
  $description = htmlspecialchars(ucfirst(strtolower(trim($_POST['description']))));
  $value = htmlspecialchars(trim($_POST['price']));
  $negotiable = ucfirst(trim(htmlspecialchars($_POST['negotiable'])));
  $posterName = htmlspecialchars(trim($_POST['poster_name']));
  $posterMobile = htmlspecialchars(trim($_POST['poster_mobile']));
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $poster_id = htmlspecialchars(trim($_POST['user_id']));

  $upload_time = date('Y-m-d');
  $url = $title.' '.$ad_id;
  $url = seoUrl($url);

  if(!empty($title)){
  if(strlen($title) > 5 && strlen($title) <= 45){
  if(!empty($main_cat)){
  if(!empty($subcategory)){
  if(!empty($city_town)){
  if(!empty($region)){
  if(!empty($listing_type)){
  if(!empty($condition)){
  if(strlen($description) > 6 && strlen($description) <= 550){
  if(!empty($value)){
  if(strlen($value) >= 1 ){
  }else{
   $errors = 'Please give your item a price or value.';
  }
  }else {
   $errors = 'Please the value textbox is empty.';
  }
  }else{
   $errors = 'Please check your description input.';
  }
  }else{
   $errors = 'Please your item current condition from the dropdown below.';
  }
  }else{
   $errors = 'Please select a valid listing type from below.';
  }
  }else{
   $errors = 'Please select a valid suburb or town.';
  }
  }else{
   $errors = 'Please select a valid devision or region.';
  }
  }else{
   $errors = 'Please select a valid item sub-category.';
  }
  }else{
   $errors = 'Please select a valid item category.';
  }
  }else{
   $errors = 'Please check your title length!';
  }
  }else{
   $errors = 'Please your item title textbox is empty.';
  }

  if(!isset($errors)){
  App::get('database')->query('UPDATE `ads` SET title=:title,main_cat=:main_cat,

  subcategory=:subcategory,company_employer=:company_employer,appli_deadline=:appli_deadline,

  job_type=:job_type,min_qualific=:min_qualific,min_exp=:min_exp,max_exp=:max_exp,salary_from=:salary_from,

  salary_to=:salary_to,surface_size=:surface_size,bedrooms=:bedrooms,

  bathrooms=:bathrooms,broker_fee=:broker_fee,make=:make, model=:model, year=:year,

  transmission=:transmission,car_type=:car_type, miles=:miles,moto_make=:moto_make,city_town=:city_town,

  region=:region, listing_type=:listing_type, wishes=:wishlist, item_condit=:item_condit, description=:description, value=:value,uri=:uri,poster_name=:poster_name,poster_mobile=:poster_mobile

  WHERE user_id=:id AND custom_id=:ad_id', array(':title' => $title, ':main_cat' => $main_cat, ':subcategory'=> $subcategory,

  ':company_employer'=>$updat_employer,':appli_deadline'=>$applic_deadline,':job_type'=>$updat_job_type,':min_qualific'=>$updat_qualification,':min_exp'=>$updat_min_experience,':max_exp'=>$updat_max_experience,

  ':salary_from'=>$updat_salary_from,':salary_to'=>$updat_salary_to,':surface_size'=>$updat_surface_size,':bedrooms'=>$updat_bedrooms,':bathrooms'=>$updat_bathrooms,':broker_fee'=>$updat_broker_fee,

  ':make' => $make, ':model' => $model, ':year' => $year, ':transmission' => $transmission,

  ':car_type' => $car_type, ':miles' => $miles,':moto_make' => $motomake, ':city_town' => $city_town, ':region' => $region,

  ':listing_type' => $listing_type, ':wishlist'=> $wishes, ':item_condit' => $condition, ':description' => $description,

  ':value'=> $value,':uri'=>$url,':poster_name' => $posterName,':poster_mobile' => $posterMobile,':id'=>$poster_id,':ad_id'=>$ad_id));

  echo "success";
 }else {
  echo $errors;
 }}

  //Checking for new unread chat messages in the homepage
  public function appNewchats(){
    $user_id = trim(htmlspecialchars($_POST["user_id"]));
    $new_chats_1 = App::get('database')->countUnreadchats_owner($user_id);
    $new_chats_2 = App::get('database')->countUnreadchats_buyer($user_id);
    echo $new_chats_2;  //$new_chats_1+$new_chats_2;
  }

//Checking for user present Status
public function appChatactiveUsers(){
  $sender_id = trim(htmlspecialchars($_POST["sender_id"]));
  $ownerid = trim(htmlspecialchars($_POST["ownerid"]));
  $session = trim(htmlspecialchars($_POST["session"]));
  $buyer = trim(htmlspecialchars($_POST["buyer"]));

   if(App::get('database')->query('SELECT * FROM chat_active_users  WHERE session_id=:session_id', array(':session_id'=>$session))){
    App::get('database')->query('UPDATE chat_active_users SET datetime=:datetime WHERE session_id=:session_id', array(':datetime'=>date('Y-m-d H:i:s'),':session_id'=>$session));
   }else {
     App::get('database')->query('INSERT INTO chat_active_users VALUES (id,:owner_id,:buyer_id,:sender_id,:session_id,:datetime)',
     array(':owner_id'=>$ownerid,':buyer_id'=>$buyer,':sender_id'=>$sender_id,':session_id'=>$session,':datetime'=>date('Y-m-d H:i:s')));
   }
 }

 //Fetching chat log data
 public function getChatlogs(){
   $user_id = trim(htmlspecialchars($_POST["user_id"]));
   if($chat_logs = App::get('database')->myChats($user_id)){
     $data = array();
     $data1 = array();
     $data2 = array();
     $data3 = array();
     $unreads = array();
     $sumUnread = 0;
     foreach ($chat_logs as $chat_log){
      $data[] = array($chat_log);
      $user_infos = App::get('database')->userad_Info($chat_log->ad_id);
     foreach ($user_infos as $user_info){
      $data1[] = array($user_info);
      $imgs = App::get('database')->singleImage($chat_log->ad_id);
     foreach ($imgs as $img){
      $data2[] = array($img);
      $lastseens = App::get('database')->checkLastseen($user_info->user_id);
     foreach ($lastseens as $lastseen){
      $time = strtotime($lastseen->datetime); //formatting time
      $mytimeFormat = date("g:i a,  d m y", $time);
      $data3[] = array($mytimeFormat);
      }}}}
     echo '{"chatLogs":'.json_encode(array($data,$data1,$data2,$data3,$unreads)).'}';
   }
}

  public function getChatItem(){
   $owner_id = trim(htmlspecialchars($_POST["owner_id"]));
   $custom_id = trim(htmlspecialchars($_POST["custom_id"]));
   if($ad_infos = App::get('database')->getAd($custom_id,$owner_id)){
     foreach ($ad_infos as $ad_info){
      $title = $ad_info->title;
      $poster_name = $ad_info->poster_name;
      $price = $ad_info->value;
     }
     echo '{"chatItem":'.json_encode(array($title,$poster_name,$price)).'}';
   }
 }

public function appSendchat(){
  $user_id = htmlspecialchars(trim($_POST['user_id']));
  $ownerid = htmlspecialchars(trim($_POST['ownerid']));
  $ad_id = htmlspecialchars(trim($_POST['ad_id']));
  $message = htmlspecialchars(trim($_POST['message']));
  $session = htmlspecialchars(trim($_POST['session']));
  $buyer = htmlspecialchars(trim($_POST['buyer']));
  $time = htmlspecialchars(trim($_POST['time']));

 if($user_id !='' && $ownerid !='' &&  $ad_id!=''){
    App::get('database')->query('INSERT INTO  chat VALUES (id,:ad_id,:sender_id,:owner_id,:message,:photo,:buyer_id,:time,:session_id,:status)',
    array(':ad_id'=>$ad_id,':sender_id'=>$user_id,':owner_id'=>$ownerid,':message'=>$message,':photo'=>'',':buyer_id'=>$buyer,':time'=>$time,':session_id'=>$session,':status'=>0));
    echo "sent";
  }else {
    echo "message was unable to send...";
  }
}

 public function appfetchChat(){
    $user_id = htmlspecialchars(trim($_POST['user_id']));
    $ad_id = htmlspecialchars(trim($_POST['ad_id']));
    $owner = htmlspecialchars(trim($_POST['owner']));
    $session = htmlspecialchars(trim($_POST['session']));
    $messages = array();
    App::get('database')->query('UPDATE chat SET status=:status WHERE session_id=:session_id AND sender_id!=:user_id', array(':session_id'=>$session,':status'=>1,':user_id'=>$user_id));
    if($chats = App::get('database')->getChats($session)){
     foreach ($chats as $chat) {
      $messages[] = array($chat);
      }
      echo '{"chatMessages":'.json_encode(array($messages)).'}';
     }
  }

 public function appcheckNotification(){
     $user_id =  htmlspecialchars(trim($_POST['id']));
     $notif_status = array();
     if($notifications_status = App::get('database')->query('SELECT * FROM notifications WHERE user_ref=:user_ref', array(':user_ref'=>$user_id))){
       foreach ($notifications_status as $notification_status) {
         $notif_status[] = array($notification_status);
       }
       echo '{"Notifications":'.json_encode(array($notif_status)).'}';
    }
  }

 // app contact us
 public function appContactus(){
    $reason = htmlspecialchars(trim($_POST['reason']));
    $mobile = htmlspecialchars(trim($_POST['mobile']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['massage']));
    App::get('database')->query('INSERT INTO  `enquries` VALUES (id, :senders_fullname,:message,:mobile,:email,:datetime)',
    array(':senders_fullname'=>"Reason: ".$reason,':message'=>$message,':mobile'=>$mobile,':email'=>$email,'datetime'=>date('Y-m-d H:i:s')));
    echo "success";
  }

  /* ================================================================
                         MINI ADMIN QUERIES
     ================================================================= */

  public function Approve(){
    $ad_id =  htmlspecialchars(trim($_POST['custom_id']));
    App::get('database')->query('UPDATE ads SET status=:status WHERE custom_id=:ad_id', array(':status'=>1,'ad_id'=>$ad_id));
    echo "success";
  }

  public function deleteAd(){
    $ad_id =  htmlspecialchars(trim($_POST['custom_id']));
    App::get('database')->query('DELETE FROM `ads` WHERE custom_id=:ad_id LIMIT 1', array(':ad_id'=>$ad_id));
    echo "success";
  }

  public function checkNewsads(){
    $count = App::get('database')->countLatestPost();
    echo $count;
  }

 public function sendSMS(){
    $mobile =  htmlspecialchars(trim($_POST['mobile']));
    $message =  htmlspecialchars(trim($_POST['message']));
    $msg_body = $message;  //Sms body
    $msg_reciever = $mobile; //SMS sender number
    include_once 'Messages.php';
  }

  public function countTraffic(){
    $dateDay = date("d");
    $dateM = date("m-");
    $dateY = date("Y-");
    //For day likes
    $start = $dateY.$dateM.$dateDay.' '.'00:00:00';
    $enddate = $dateY.$dateM.$dateDay.' '.'23:59:59';

    //Week 1 likes
    $Week_1start = $dateY.$dateM.'01'.' '.'00:00:00';
    $Week_1enddate = $dateY.$dateM.'07'.' '.'23:59:59';

    //Week 2 likes
    $Week_2start = $dateY.$dateM.'08'.' '.'00:00:00';
    $Week_2enddate = $dateY.$dateM.'14'.' '.'23:59:59';

    //Week 3 likes
    $Week_3start = $dateY.$dateM.'15'.' '.'00:00:00';
    $Week_3enddate = $dateY.$dateM.'21'.' '.'23:59:59';

    //Week 4 likes
    $Week_4start = $dateY.$dateM.'22'.' '.'00:00:00';
    $Week_4enddate = $dateY.$dateM.'31'.' '.'23:59:59';

    //Month likes
    $Monthstart = $dateY.$dateM.'01'.' '.'00:00:00';
    $Monthenddate = $dateY.$dateM.'31'.' '.'23:59:59';

    //Year likes
    $Yearstart = $dateY.'01-'.'01'.' '.'00:00:00';
    $Yearenddate = $dateY.'12-'.'31'.' '.'23:59:59';

    // Daily likes query
    $day = App::get('database')->visitorsCounts2($start,$enddate);
    // Weekly likes query
    if($dateDay >= 1 && $dateDay < 8){
    $week = App::get('database')->visitorsCounts2($Week_1start,$Week_1enddate);
    }elseif ($dateDay >= 8  && $dateDay < 15) {
    $week = App::get('database')->visitorsCounts2($Week_2start,$Week_2enddate);
    }elseif ($dateDay >= 15 && $dateDay < 22) {
    $week = App::get('database')->visitorsCounts2($Week_3start,$Week_3enddate);
    }elseif ($dateDay >= 22 && $dateDay < 32) {
    $week = App::get('database')->visitorsCounts2($Week_4start,$Week_4enddate);
    }
    // Monthly likes query
    $month = App::get('database')->visitorsCounts2($Monthstart,$Monthenddate);
    // Yearly likes query
    $year = App::get('database')->visitorsCounts2($Yearstart,$Yearenddate);

    foreach ($day as $dayViews){}
    foreach ($week as $weekViews){}
    foreach ($month as $monthViews){}
    foreach ($year as $yearViews){}
      echo $dayViews[0]."\\".$weekViews[0]."\\".$monthViews[0]."\\".$yearViews[0];
  }
 }
?>
