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
<div class="col s12 m12 l6  xl6 offset-l3 offset-xl3  chat_box-div z-depth-1">
<div class="">

<div class="chats_box">
<div class="chat_achives-header  deep-purple darken-1">My Chats</div>
 <div class="conversations_achieves">
  <div class="chat_userdiv">
  <?php if(count($cat_logs) > 0){?>
  <?php foreach ($cat_logs as $chat_log):?>
  <?php $ad_infos = App::get('database')->userad_Info($chat_log->ad_id);?>
  <?php foreach ($ad_infos as $ad_info){} ?>
  <?php $user_info = App::get('database')->userInfo($ad_info->user_id);?>
  <?php foreach ($user_info  as $user_infor){}?>
  <?php $chats_ = App::get('database')->countUnread($chat_log->ad_id,$user_infor->id);?>
  <?php $lastseens = App::get('database')->checkLastseen($user_infor->id)?>
  <?php foreach ($lastseens as $lastseen){} ?>
  <?php $images = App::get('database')->singleImage($chat_log->ad_id);
        foreach ($images as $image){} ?>
  <div class="messages">
        <div class="col s3 m2 l3 xl3 chat_item_imgdiv">
            <a  href="../mob-chat-session/<?php echo $ad_info->uri;?>?port=<?php echo $chat_log->user_id;?>&session=<?php echo $chat_log->session_id;?>">
            <img src='../images/user-submitted/thumb/xs/<?php echo $image->images; ?>' alt=""  class="chat_item_img">
           </a>
        </div>
        <div class="col s8 m8"  style="padding:0px !important; margin:0px !important">
          <p class="chat_user_name">
          <a  href="../mob-chat-session/<?php echo $ad_info->uri;?>?port=<?php echo $chat_log->user_id;?>&session=<?php echo $chat_log->session_id;?>">
          <?php echo $user_infor->fname?>  <?php echo $user_infor->lname?>
          </a>
          </p>
          <p class="chat_user_item">
          <?php echo $ad_info->title?>
          </p>
          <p class="chat_time">
          <?php
          @$time = strtotime($lastseen->datetime); // formatting time
          echo @$mytimeFormat = date("g:i a,  d m y", $time);
          ?>
        </p>
      </div>
   </div>
  <?php endforeach; ?>
  <?php }
 else{
    echo "
    <div style='margin-top:70%; font-size:15px;'>
    <h6 class='center-align'>Your chat history will be shown here!</h6>
    <h5 style='font-size:20px;' class='center-align'><i class=\"fa fa-comments\" aria-hidden=\"true\"></i></h5>
    </div>";
  }?>
  </div>
</div>
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
