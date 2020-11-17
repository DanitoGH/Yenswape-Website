<!DOCTYPE html>
 <html>
 <?php foreach($single_item as $item):?>
 <!-- Head section goes here -->
  <?php require ('partials/header-combination-2.php'); ?>
 <body>
  <!-- PC nav menu starts here -->
  <?php require ('partials/nav-bar.php'); ?>
  <!-- Search menu goes here -->
  <div class="row">
  <?php require ('partials/search-menu.php'); ?>
  </div>
  <?php countVisitors();?>
<div class="row">
<div class="container">
<?php require('partials/mobile-search-bar.php'); ?>

<!-- Telling javascript we are on the details page -->
<input type="hidden"  id="details_hidden"  value="details"  />

 <?php $time = strtotime($item->datetime); // formatting time?>
 <?php $mytimeFormat = date("g:i A ,  d M Y", $time);?>

 <div class="col s12 m12 l0 xl8 offset-l1 offset-xl2 mobile_deatils">

 <div class="col s12">
   <div class="item-large-img">
  <?php $images = App::get('database')->singleImage($item->custom_id); ?>
  <?php $thumbs = App::get('database')->allImages($item->custom_id); ?>
  <?php $userInfo = App::get('database')->fetchUserinfo($item->user_id); ?>
  <?php foreach($userInfo as $user_info):?>
  <?php $ad_likes = App::get('database')->query('SELECT * FROM likes WHERE ad_id=:adid ', array(':adid'=>$item->custom_id)); ?>
  <div class='card  mob-details-card'>
   <div class='mob-deatails-image'>
    <?php foreach ($images as $image):?>
    <div class='card-image'>
      <?php $item_title = htmlspecialchars_decode(stripslashes($item->title));?>
      <a href='https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/<?php echo $image->images;?>' data-lightbox='items' data-title=''>
       <img  id='det_img'  calss='blur'  alt="<?php echo htmlspecialchars_decode(stripslashes($item->title));?>" src='../images/user-submitted/thumb/xs/<?php echo $image->images;?>' style="width:100%;  height:90%;">
    </a>
    <?php
     $listing_type = $item->listing_type;
     if ($item->listing_type === 'Job_Offer' || $item->listing_type === 'Job_Offere'){
        $listing_type = "Job Offer";
      } else if ($item->listing_type === 'Job_Seeking'){
        $listing_type = "Job Search";
      }elseif ($item->listing_type === 'Sell') {
        $listing_type = "For Sale";
      }elseif ($item->listing_type === 'Swap') {
        $listing_type = "For Swap";
      }elseif ($item->listing_type === 'Rent') {
        $listing_type = "For Rent";
      }
     ?>
      <span class="card-title home-card">₵ <?php echo number_format_drop_zero_decimals($item->value,2); ?> [<?php echo $listing_type;?>]</span>
    </div>
  <?php endforeach;?>
  <?php foreach ($thumbs as $thumb){ echo "<a href='https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/$thumb->images' data-lightbox='items' data-title='$item_title'></a>"; } ?>
   <div class='mob-details-item-title'>
    <h5><?php echo htmlspecialchars_decode(stripslashes($item->title));?></h5>
    <?php if($item->listing_type !=='Sell' && $item->listing_type !== 'Job_Offer' && $item->listing_type !== 'Job_Offere' && $item->listing_type !== 'Rent'){ echo "<span style='color:#828485;'>Wishlist: </span><span  style='color:#828485; font-weight:bold;'>$item->wishes</span>";}?>
    <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $item->city_town;?>, <?php echo $item->region;?></p>
    <p><i class="fa fa-clock-o" aria-hidden="true"></i><span> <?php echo $mytimeFormat;?></p>
    <div style="overflow:hidden" class=''><span style='color:dimgray; font-weight:bold;'>Posted by:</span> <?php echo $user_info->fname;?>      <span style='float:right'> <span style='color:#828485; margin-right:10px;'> <i class="fa fa-eye" aria-hidden="true"></i>  <?php echo @$views_update;?></span> <span style='color:#828485;'><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span id="mob_likes_count"><?php echo count($ad_likes);?></span></span></div>
    </div>
    </div>
   </div>
   </div>
  </div>
  <!-- Horizontal buttons click activated -->
  <div class="fixed-action-btn click-to-toggle">
    <a class="btn-floating btn-large blue">
      <i class="material-icons">menu</i>
    </a>
   <ul>
     <li><a id="call_owner_btn" class="btn-floating green call_btn external"><i class="material-icons">call</i></a></li>
     <li><a class="btn-floating blue chat_btn"><i class="material-icons">chat</i></a></li>
     <li><span class="visiblity-off" id="mob_likes"></span><a class="btn-floating  purple darken-1 like"><i class="material-icons">favorite</i></a></li>
     <li><a class="btn-floating red report"><i class="material-icons"><i class="material-icons">flag</i></i></a></li>
   </ul>
   </div>
  <?php
   if(@$item->main_cat =='vehicles' && @$item->subcategory =='cars'){
    echo"
    <div class=\"col s12  m12\">
    <div class='details-item-specs z-depth-1'>
    <div class='col s6 m6'>
     <div class=''><span class=''>Make:</span> $item->make</div>
     <div class=''><span class=''>Type of car:</span> $item->car_type</div>
     <div class=''><span class=''>Mileage:</span>$item->miles km</div>
   </div>
    <div class='col s6 m6'>
    <div class=''><span class=''>Model:</span> $item->model</div>
    <div class=''><span class=''>Transm:</span> $item->transmission</div>
    <div class=''><span class=''>Year:</span> $item->year</div>
    </div>
   </div>
   </div>
   ";
 }else if(@$item->main_cat =='jobs-services' && $item->subcategory =='offered-jobs' || @$item->subcategory =='seeking-work'){
  echo"
 <div class=\"col s12  m12\">
   <div class='details-item-specs  z-depth-1'>
     <div class='col s12 m12'>
     <div class=''><span class=''>Company:</span> $item->company_employer</div>
     <div class=''><span class=''>Min. qualification:</span> $item->min_qualific</div>
  </div>
   <div class='col s12 m12'>
    <div class=''><span class=''>Job type:</span> $item->job_type</div>
    <div class=''><span class=''>Min. experience:</span> $item->min_exp yrs</div>
    <div class=''><span class=''>Max. experience:</span> $item->max_exp yrs</div>
    <div class=''><span class=''>Salary from:</span> $item->salary_from</div>
    <div class=''><span class=''>Salary to:</span> $item->salary_to</div>
    <div class=''><span class=''>App deadline:</span> $item->appli_deadline</div>
    </div>
   </div>
   </div>
    ";
  }else if($item->main_cat == 'property' && $item->subcategory == 'apartments-for-rent' || $item->subcategory == 'apartments-for-sale'){
   echo"
  <div class=\"col s12  m12\">
   <div class='details-item-specs  z-depth-1'>
    <div class='col l12 x12'>
      <div class=''><span class=''>Surface size(m2):</span> $item->surface_size</div>
      <div class=''><span class=''>Bedrooms:</span> $item->bedrooms</div>
      <div class=''><span class=''>Bathrooms:</span> $item->bathrooms</div>
      <div class=''><span class=''>Is there a broker fee?:</span> $item->broker_fee</div>
    </div>
    </div>
   </div>";
  }elseif ($item->main_cat =='vehicles' && $item->subcategory =='motorcycles'){
   echo "
   <div class=\"col s12  m12\">
   <div class='details-item-specs z-depth-1'>
    <div class='col s6 m6'>
     <div class=''><span class=''>Make:</span> $item->moto_make</div>
   </div>
  </div>
  </div>
   ";}
  ?>
 <div class="col s12  m12">
  <div class="mob-details-item-desc z-depth-1">
    <p class="details-show-more-paragraph">
    <?php
     if(strlen($item->description) > 150){ echo substr(htmlspecialchars_decode(stripslashes($item->description)),0,150)."... <a class=\"show_more_btn\">Show more </a>";
     }else { echo htmlspecialchars_decode(stripslashes($item->description));}
     ?>
    </p>
    <p  class="details-show-less-paragraph  visiblity-off">
    <?php echo htmlspecialchars_decode(stripslashes($item->description)).". <a class=\"show_less_btn\">Show less </a>"; ?>
    </p>
    <?php if($item->main_cat !== "jobs-services" && $item->main_cat !== "property"){echo "<p><span style=\"font-weight:bold;\">Condition:</span>  $item->item_condit </p>";}?>
    <div class='' style="margin-bottom:5px;"><span style='color:dimgray; font-weight:bold;'>Share this ad:</span> <div class="center-align" style="display:inline-block;" id="mobile_shares"></div></div>
    <h6  class="center-align user_ads"><a href="/shop-id/<?php echo $user_info->user_ref;?>">View all ads from user</a></h6>
   </div>
 </div>
 </div>
 </div>
 </div>
<input type="hidden" id="user_id"  value="<?php echo @$user = isLoggedIn();?>" />
<input type="hidden" id="ad_poster-id"  value="<?php echo @$item->user_id?>" />
<input type="hidden" id="ad_id"  value="<?php echo @$item->custom_id?>" />
<input  type="hidden"  id="ad_title" value="<?php echo htmlspecialchars_decode(stripslashes($item->title));?>" />
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
<script>
/*=======================================================================
     Changing image src of timeout to help make the page load faster
 ========================================================================== */
setTimeout(function() {
  $("#det_img").attr("src","https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/<?php echo $image->images;?>");
  $("#det_img").removeClass('blur').addClass('noblur');
},3000)

  var ad_title = $("#ad_title").val();
  $("#mobile_shares").jsSocials({
    text: ad_title,
    url: "https://www.yenswape.com<?php echo $get_uri;?>",
    shareIn: "popup",
    showLabel:false,
    showCount:false,
    shares: ["whatsapp","email","twitter", "facebook", "googleplus"]
  });
  // control description length
  $('.show_more_btn').click(function(){
    $('.details-show-more-paragraph').addClass('visiblity-off');
    $('.details-show-less-paragraph').removeClass('visiblity-off');
  })

  $('.show_less_btn').click(function(){
   $('.details-show-less-paragraph').addClass('visiblity-off');
   $('.details-show-more-paragraph').removeClass('visiblity-off');
  })


 //Close action btns on click
  $('.like,.chat_btn,.call_btn,.report').click(function(){
     $('.fixed-action-btn').closeFAB();
  })
</script>
</body>
 </html>
