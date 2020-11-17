<!DOCTYPE html>
 <html>
 <!-- Head section goes here -->
 <?php foreach($single_item as $item):?>
 <?php require ('partials/header-combination-2.php'); ?>
 <body>
  <!-- PC nav menu starts here -->
  <?php require ('partials/nav-bar.php'); ?>
  <!-- Search menu goes here -->
  <div class="row">
  <?php require ('partials/search-menu.php'); ?>
 <!-- Counting and getting visitors info -->
 <?php countVisitors();?>
 <div style="margin-left:50px" class="col l12 x112 details-breadcrumb-div-wrapper">
  <a href="https://www.yenswape.com">Home</a> <i class="fa fa-angle-right"></i><a href="/<?php echo $item->main_cat; ?>"><?php echo $item->main_cat; ?></a><i class="fa fa-angle-right"></i><a href="/<?php echo $item->main_cat."/".$item->subcategory; ?>"> <?php echo $item->subcategory; ?></a>
  <i class="fa fa-angle-right"></i><a class="black-text  active-category"> <?php echo $item->title; ?> </a>
 </div>
 <!-- PC side-menu ends here -->
 <div class="col l8 xl8 side_menu">
 <div class="col l6 xl6">
  <input type="hidden"  id="details_hidden"  value="details"/>
 <div class="item-large-img">
  <?php $time = strtotime($item->datetime); //formatting time?>
  <?php $mytimeFormat = date("g:i A ,  d M Y", $time);?>
  <?php @$images = App::get('database')->singleImage($item->custom_id); ?>
  <?php @$thumbs = App::get('database')->allImages($item->custom_id); ?>
  <?php @$userInfo = App::get('database')->fetchUserinfo($item->user_id); ?>
  <?php foreach($userInfo as $user_info):?>
  <?php $ad_likes = App::get('database')->query('SELECT * FROM likes WHERE ad_id=:adid ', array(':adid'=>$item->custom_id)); ?>
  <div class='card'>
   <?php foreach($images as $image){
    echo "<div class='details-card-image'>
          <img  id='det_img'  calss='blur'  src='https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/$image->images' class='responsive-img' alt='$item->title'>
     </div>";
   }?>
  <div class='card-content'>
   <div class=''>
     <?php foreach($thumbs as $thumb){ 
       echo" <a href='https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/$thumb->images' data-lightbox='items' data-title='$item->title'>
         <img class='item_thumb' src='https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/$thumb->images' alt='$item->title'  width='50'  height='50'></a>"; 
      }?>
    </div>
   </div>
  </div>
  </div>
   <?php
   if($item->main_cat =='vehicles' && $item->subcategory =='cars'){
   echo"
   <div class='details-item-specs  z-depth-1'>
    <div class='col l6 xl6'>
      <div class=''><span class=''>Make:</span> $item->make</div>
        <div class=''><span class=''>Type of car:</span> $item->car_type</div>
          <div class=''><span class=''>Mileage:</span>$item->miles km</div>
          <div class=''><span class=''>Condition:</span> $item->item_condit</div>
          </div>
          <div class='col l6 xl6'>
          <div class=''><span class=''>Model:</span> $item->model</div>
        <div class=''><span class=''>Transm:</span> $item->transmission</div>
      <div class=''><span class=''>Year:</span> $item->year</div>
    </div>
  </div>
   ";
 }elseif($item->main_cat =='vehicles' && $item->subcategory =='motorcycles'){
   echo
   "<div class='details-item-specs  z-depth-1'>
    <div class='col l6 xl6'>
     <div class=''><span class=''>Make:</span> $item->moto_make</div>
     <div class=''><span class=''>Condition:</span> $item->item_condit</div>
    </div>
   </div>
    ";
  }else if($item->main_cat =='jobs-services' && $item->subcategory =='offered-jobs' || $item->subcategory == 'seeking-work'){
    echo"
   <div class='details-item-specs  z-depth-1'>
     <div class='col l12 x12'>
     <div class=''><span class=''>Company:</span> $item->company_employer</div>
     <div class=''><span class=''>Min. qualification:</span> $item->min_qualific</div>
    </div>
   <div class='col l6 xl6'>
      <div class=''><span class=''>Min. experience:</span> $item->min_exp yrs</div>
      <div class=''><span class=''>Salary from:</span> $item->salary_from</div>
      <div class=''><span class=''>App deadline:</span> $item->appli_deadline</div>
    </div>
    <div class='col l6 xl6'>
      <div class=''><span class=''>Max. experience:</span> $item->max_exp yrs</div>
      <div class=''><span class=''>Salary to:</span> $item->salary_to</div>
      <div class=''><span class=''>Job type:</span> $item->job_type</div>
    </div>
   </div>
    ";
  }else if($item->main_cat == 'property' && $item->subcategory == 'apartments-for-rent' || $item->subcategory == 'apartments-for-sale'){
    echo"
  <div class='details-item-specs  z-depth-1'>
    <div class='col l12 x12'>
      <div class=''><span class=''>Surface size(m2):</span> $item->surface_size</div>
      <div class=''><span class=''>Bedrooms:</span> $item->bedrooms</div>
      <div class=''><span class=''>Bathrooms:</span> $item->bathrooms</div>
      <div class=''><span class=''>Is there a broker fee?:</span> $item->broker_fee</div>
    </div>
   </div>";
  }else {
   echo
  "<div class='details-item-specs  z-depth-1'>
    <div class='col l6 xl6'>
      <div class=''><span class=''>Condition:</span> $item->item_condit</div>
   </div>
  </div>
   ";
   }
  ?>
 <div class="details-item-desc  z-depth-1">
 <p><?php echo htmlspecialchars_decode(stripslashes($item->description));?></p>
 </div>
 </div>
 <div  style="margin-top:8px;" class="col l6 xl6">
  <div class="details-item-title  z-depth-1">
  <h5><?php echo htmlspecialchars_decode(stripslashes($item->title));?></h5>
  <div class="col l12"><span> <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $item->city_town;?>, <?php echo $item->region;?></span> &nbsp;<span style=""><i class="fa fa-clock-o" aria-hidden="true"></i><span style=""> <?php echo $mytimeFormat;?></span></div>
  </div>
 </div>
 <!-- Hidden input field for ad shares-->
 <input  type="hidden"  id="ad_title" value="<?php echo htmlspecialchars_decode(stripslashes($item->title));?>" />
 <div class="col l6  xl6">
 <div class="details-item-actions  z-depth-1">
 <div class="col l12 price_div actions"><span class="price"> ₵ <?php echo number_format_drop_zero_decimals($item->value, 2);?></span>  <span style='font-style: italic; color: #828485; font-size:12px;'class=""><?php echo $item->negotiable;?></span></div>
 <div  class="col l12 poster_div actions">
   <?php
   $listing_type = $item->listing_type;
   $poster_wish = "Poster is willing to:";
   if ($item->listing_type === 'Job_Offer' || $item->listing_type === 'Job_Offere'){
     $listing_type = "Offer a job";
   } else if ($item->listing_type === 'Job_Seeking'){
     $listing_type = "Looking for a job";
     $poster_wish = "Poster is:";
   }
  ?>
 <span style='color:#828485;'><?php echo $poster_wish; ?> </span><span  style='color:#828485; font-weight:bold;'><?php echo $listing_type;?></span></div>
 <?php
  if($item->listing_type !=='Sell' && $item->listing_type !== 'Job_Offer' && $item->listing_type !== 'Job_Offere'){
    echo "<div  class='col l12 poster_div actions'><span style='color:#828485;'>Wishlist: </span><span  style='color:#828485; font-weight:bold;'>$item->wishes</span>
   </div>";
  }
 ?>
 <div class="col l6 chat_div actions">
 <a class="waves-effect waves-light btn blue chat_btn"><i class="fa fa-comments" aria-hidden="true"></i> &nbsp; Chat</a>
 </div>
 <div class="col l6 call_div actions">
  <a class="waves-effect waves-light btn  call_btn"><i id="call_spinner" class="fa fa-phone" aria-hidden="true"></i> &nbsp; Call</a>
 </div>
 <div class="col l6 like_button actions">
 <a class="like" href="#" ><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><span id="ad_like"></span>
 </a>
 </div>
 <div class="col l6 report_button actions">
 <a class="report" href="#"><i class="fa fa-ban" aria-hidden="true"></i> Report this ad </a>
 </div>
 </div>
 </div>
<?php foreach($userInfo as $user_info):?>
 <div class="col l6  xl6">
 <div class="details-item-poster z-depth-1">
 <div style="white-space:nowrap; overflow:hidden; text-overflow:ellipsis;" class="col l6"><span  style='color:#828485;'>Ad posted by: </span> <span  style='color:#828485; font-weight:bold;'><?php echo $user_info->fname;?> </span></div>
 <div class="col l6"><span  style='color:#828485;'><a class="mob-results_title" href="/shop-id/<?php echo $user_info->user_ref;?>">View all ads from user</a></span></div>
 </div>
 </div>

 <div class="col  l6 xl6">
 <div class="item-likesandviews  z-depth-1">
 <div class="col l3"><span  style='color:#828485; font-weight:bold;'>Views</span></div>
 <div class="col l3"><span  style='color:#828485; font-weight:bold;'>Likes</span></div>
 <div class="col l6"><span  style='color:#828485; font-weight:bold;'>Share this ad</span></div>

 <div class="col l3 values " style="padding-top:5px;"><span  style='color:#828485;'><i class="fa fa-eye" aria-hidden="true"></i>   <?php echo @$views_update;?></span></div>
 <div class="col l3 values" style="padding-top:5px;"><span  style='color:#828485;'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span id="likes_count"><?php echo count($ad_likes);?></span></span></div>
 <div class="col l6 values" id="shares"></div>
  <!-- Google adsense div wrapper -->
 <div style="height:auto"  class="hide-on-med-and-down">
   <!-- Google adsense Code goes here -->
 </div>
 </div>
 </div>
</div>

 <!-- Side div content -->
<div class="col l3 xl3  hide-on-med-and-down">
   <!-- <img  src='../images/side_ad.jpg'  class='responsive-img' alt='$item->title'/> -->
</div>
</div>

<input type="hidden" id="user_id"  value="<?php echo $user = isLoggedIn();?>" />
<input type="hidden" id="ad_poster-id"  value="<?php echo $item->user_id?>" />
<input type="hidden" id="ad_id"  value="<?php echo $item->custom_id?>" />
<?php endforeach; ?>
<?php endforeach; ?>
<?php endforeach; ?>

<!-- Modals goes here -->
<?php require ('partials/modals.php'); ?>
<!-- PC footer goes HERE -->
<?php require ('partials/footer.php'); ?>
<!--==================================================================
                       JAVASCRIPT FILES GOES HERE
===================================================================== -->

<script type="text/javascript" src="../js/javascript-combination-3.js"></script>
<script  type="text/javascript">
        /*=======================================================================
             Changing image src of timeout to help make the page load faster
         ========================================================================== */
setTimeout(function(){
    $("#det_img").attr("src","https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/<?php echo $image->images;?>");
    $("#det_img").removeClass('blur').addClass('noblur');
},3000)

//Js socials sharing plugin for facebook
var ad_title = $("#ad_title").val();
 $("#shares").jsSocials({
   url: "https://yenswape.herokuapp.com<?php echo $get_uri;?>",
   text: ad_title,
   shareIn: "popup",
   showLabel: false,
   showCount: false,
   shares: ["twitter", "facebook", "googleplus"]
 });
</script>
</body>
 </html>
