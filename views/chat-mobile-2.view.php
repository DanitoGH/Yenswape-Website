<!DOCTYPE html>
<html>
<!-- Head section goes here -->
<?php require ('partials/header-combination-1.php'); ?>
<body>
<?php require ('partials/nav-bar.php'); ?>
<!--Main Nevigation STARTS from here-->
<!--Main Nevigation ENDS here-->
<div  class="container">
<div class="row">
<div class="col s12 m12 l8  xl7 offset-l2 offset-xl2 chat_box-div z-depth-1">
<!-- CHAT SESSSION PHP CODES -->
<?php
// Getting user id
$user_id = isLoggedIn();
//This is what is going on: 1. Get the URL FROM THR browser 2. Geta a value of the URL after the  "/" 3. Try to remove hyphins from the URL to make an array  4. Explode the array value on space and get the last data which is the user CUSTOM ID
$explod_url = explode(' ', str_replace('-',' ',substr(strrchr((parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), "/"), 1)));
// Take everything off except numbers
$custom_id = end($explod_url);
?>

<?php
if(isset($custom_id) && $custom_id !== null && $custom_id !== "" && $custom_id !== "chat"){
 $chat_ad_infos = App::get('database')->userad_Info($custom_id);
 foreach ($chat_ad_infos as $chat_ad_info){}
 $chat_user_info = App::get('database')->userInfo($chat_ad_info->user_id);
 foreach ($chat_user_info   as $user_infor){}
 $lastseens = App::get('database')->checkLastseen($user_infor->id);
 foreach ($lastseens as $lastseen) {}
 $images = App::get('database')->singleImage($custom_id);
  foreach ($images as $image){}
}
?>
<input type="hidden" id="owner_id"   value="<?php echo @$chat_ad_info->user_id;?>"/>
<input type="hidden" id="chat_ad-id"  value="<?php echo @$chat_ad_info->custom_id;?>" />
<input type="hidden" id="sender-id"   value="<?php echo @$user_id; ?>"/>
<input type="hidden" id="session_id" value="<?php echo @$_GET['session'];?>"/>
<input type="hidden" id="buyer_id" value="<?php echo @$_GET['port'];?>"/>

<div  class="col s12 m12">
<div class="conversation_div">
  <div class="active_user  z-depth-1  deep-purple darken-1">
    <div class="col s1 m1 arrow-div"><a  style="color:#fff;"  href="/ad-chat"><i  id="close_chat" class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>

    <?php
   if(isset($custom_id) && $custom_id !== null && $custom_id !== "" && $custom_id !== "chat"){

     @$firstname = $user_infor->fname;
     @$shortname = substr($firstname,0,1);

     $time = strtotime($lastseen->datetime); // formatting time
     $myFulldatetime = date("M d, g:i a", $time);

     $myMin  = date("H:i", $time);
     $myHour = date("H", $time);
     $myDate = date("H:i", $time);

     $minNow = date("H:i");
     $hourNow = date("H");
     $dateNow = date("Y-m-d");

     $status = '';
     if ($myHour == $hourNow) {
      $status = 'Online';
     }else{
      $status = 'Last seen on '."".$myFulldatetime;
     }
     echo "
     <div class='col l2 active_name_shortdiv  deep-purple darken-3'>
      <span class='active_shotnamespan'>$shortname</span>
      </div>
       <div class='col l9'  style='padding:0px !important; margin:0px !important'>
       <p class='active_user_name'>
        $user_infor->fname $user_infor->lname
       </p>
       <p class='active_user_status'>
       $status
      </p>
     </div>
     ";
   }
     ?>
  </div>

  <?php
  if(isset($custom_id) && $custom_id !== null && $custom_id !== "" && $custom_id !== "chat"){
  echo "<div class='item-chat z-depth-1'>
     <div class='col s2 m2 item_chat_imgdiv'>
       <img src='https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/$image->images' alt=''  class='item_chat_img'  height='40px' width='40px'>
     </div>
     <div class='col s9'  style='margin:0px !important'>
       <p class='active_chat_item'>
       $chat_ad_info->title
       </p>
       <p class='active_chat_price'>
        GH: $chat_ad_info->value
       </p>
     </div>
  </div>
  ";
 }
 ?>
<?php
@$session = $_GET['session'];
@$port = $_GET['port'];

if(isset($port) && isset($session)){
   if(App::get('database')->query('SELECT * FROM chat_active_users  WHERE session_id=:session_id', array(':session_id'=>$session))){
    App::get('database')->query('UPDATE chat_active_users SET datetime=:datetime WHERE session_id=:session_id', array(':datetime'=>date('Y-m-d H:i:s'),':session_id'=>$session));
   }else {
     App::get('database')->query('INSERT INTO chat_active_users VALUES (id,:owner_id,:buyer_id,:sender_id,:session_id,:datetime)',
     array(':owner_id'=>$chat_ad_info->user_id,':buyer_id'=>$port,':sender_id'=>$user_id,':session_id'=>$session,':datetime'=>date('Y-m-d H:i:s')));
   }
  }
?>
<div  id="conversation" class="conversation_box">
  <?php if(count($cat_logs) > 0 && $session == ''){
  echo"<div style=\"margin-top:220px;\">
  <h5  style='font-size:30px !important; color:dimgray' class=\"center-align\"><i class=\"fa fa-comments\" aria-hidden=\"true\"></i></h5>
  <h6 style='font-size:17px; color:dimgray' class=\"center-align\">Select chat to view convertion</h6>
  </div>
  ";
  }?>
</div>
<?php
if(isset($session) && isset($port)){
  echo "
  <div class='message_box'>
  <div class='col s1 m1 l1 xl1 image'>
    <div class='file-field'>
    <div  style='width:0px !important; height:0px  !important;'>
      <span><i class='fa fa-camera'  aria-hidden='true'></i></span>
      <input type='file' id='pic' accept='image/png, image/jpeg, image/gif' style='width:0px !important; height:10px  !important;'>
    </div>
  </div>
  </div>
  <div class='col s8 m9 l9 xl9 message_input'>
  <input type='text'  autocomplete='off' id='message'  placeholder='Write a message...' />
   </div>
  <div class='col  s2 m2 l1 xl1 sender'>
    <a class='sender_btn'><i class='fa fa-paper-plane'  aria-hidden='true'></i></a>
  </div>
  </div>
  ";
}
?>
</div>
</div>
</div>
</div>
</div>
<!-- Modals goes here -->
<?php require ('partials/modals.php'); ?>
<!-- PC footer goes HERE -->
<?php require ('partials/footer.php'); ?>
<!--==================================================================
                       JAVASCRIPT FILES GOES HERE
===================================================================== -->
<script type="text/javascript" src="../js/javascript-combination-1.js"></script>
</body>
 </html>
