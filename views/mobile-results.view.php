<!DOCTYPE html>
<html>
  <!-- Head section goes here -->
  <?php  require ('partials/header-combination-1.php'); ?>
  <?php  require ('partials/time.php'); ?>
  <?php  require ('paginator.php'); ?>
 <body>
  <!-- PC nav menu starts here -->
 <?php require ('partials/nav-bar.php'); ?>
 <!-- Search menu goes here -->
 <div class="row">
 <?php require ('partials/search-menu.php'); ?>
 </div>
<!-- Mobile Version HTML STARTS from here-->
<div class="row">
  <div class="container">
  <?php require('partials/mobile-search-bar.php'); ?>
  <div class="col s12 m12  l7 xl7 offset-l2 offset-xl2 items-display">
    <div class="mob-results_deatails z-depth-1">
    <div class="col s6 m6 resu_lab">
       <?php require ('views/partials/results-pagination.php'); // paginator class two has been added?>
      <label class="result_lab" style="color: #95989A;"><strong>Results:</strong></label>
      <label class="result_text" style="color: #95989A;"><strong> <?php echo $paginator->counter($links, 'pagination'); ?></strong></label>
    </div>
    <div id="filter" class="col s6  m6">
     <a   href="#filter_mod" class=" btn blue"> <strong>Filters</strong></a>
    </div>
   </div>
      <div class="mob-results_table">
        <?php for($items = 0; $items < count($results->data); $items++): ?>
        <?php $row = $results->data[$items];?>
        <?php $images = App::get('database')->resultsImages($row['custom_id']);?>
        <?php foreach ($images as $image){} ?>
        <script>
         //Timeout to load large images making the page load faster
         setTimeout(function(){
            $("#"+<?php echo $image->id ?>).attr("src","https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/<?php echo $image->images;?>");
            $("#"+<?php echo $image->id ?>).removeClass('blur').addClass('noblur');
         },6000)
         </script>
        <table  class="bordered">
         <tbody>
         <tr>
         <td>
         <div class="col s12">
         <div class="row  results-align valign-wrapper">
         <div  class="mob-results_img">
          <a   title="<?php echo $row['title'];?>"  href="../item/<?php echo $row['uri'];?>">
            <img  id="<?php echo $image->id ?>"  src="https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/<?php echo $image->images ?>" alt="<?php echo $row['title'];?>" width="100%"  height="100%"></a>
         </div>
         <div class="mob-inner-text col s12">
         <div class="col s12">
         <span><a class="mob-results_title" href="../item/<?php echo htmlspecialchars_decode(stripslashes($row['uri']));?>"><?php echo  htmlspecialchars_decode(stripslashes($row['title']));?></a></span>
        </div>
        <div class="col s12">
        <span class="mob-results_price">₵ <?php echo number_format_drop_zero_decimals($row['value'], 2);?></span>
       </div>
        <?php
        $type = '';
         if($row['listing_type'] == 'Sell'){
           $type = 'For Sale';
         }elseif ($row['listing_type']== 'Swap'){
           $type = 'For Swap';
         }else if($row['listing_type'] == 'Swap or Sell'){
           $type = "Swap or Sell";
         }elseif ($row['listing_type'] == 'Job_Offer' || $row['listing_type'] == 'Job_Offere'){
           $type = 'Job Offer';
         }elseif ($row['listing_type'] == 'Rent'){
           $type = 'For Rent';
         }elseif ($row['listing_type'] == 'Job_Seeking'){
           $type = 'Job Search';
         }
        ?>
       <div   class="col s12">
        <span><small class="mob-results_listings"><?php echo $type; ?></small></span>
       </div>
        <div  class="col s12">
          <span class="mob-resluts_location"><?php echo $value = $row['city_town'];?></span>, <span class="mob-results_category"><?php echo $main_category = $row['main_cat'];?> &nbsp;&nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo $main_category = $row['subcategory'];?></span>
       </div>
       <div  class="col s12 align-right">
         <small class="mob-timestamp"><?php echo $time = formatDateAgo($row['datetime']);?></small>
       </div>
       </div>
       </div>
       </div>
      </td>
    </tr>
    <!-- Dynamic Google Ads -->
    <?php if($items == 1): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div  style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
      <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif; ?>
    <?php if($items == 3): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
      <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif; ?>
    <?php if($items == 5): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
      <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif;?>
    <?php if($items == 7): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
     <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif;?>
    <?php if($items == 9): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
     <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif;?>
    <?php if($items == 11): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
      <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif;?>
    <?php if($items == 13): ?>
    <tr>
    <td>
    <div class="col s12 m12 l12">
    <div style="margin-top:25px;margin-bottom:25px;"  class="row results-align  center-align">
     <!-- Google adsense Code goes here -->
    </div>
    </div>
    </tr>
    </td>
    <?php endif;?>
    <!-- Dynamic Google Ads  ends here-->
  </tbody>
 </table>
 <?php endfor; ?>
 <?php
  if(count($results->data) > 14){?>
  <div  style="margin-bottom:100px;"><?php  echo $paginator->createLinks($links, 'pagination'); ?></div>
 <?php }?>
  </div>
 <?php
  if(count($results->data) < 1){
   echo "<div style='margin-top:60px;'>
   <h1 class='center-align' style='color:#ffa000'><i class='fa fa-frown-o'  aria-hidden'true'></i></h1>
   <h5 style='color:#000;' class='center-align'>Sorry, no item matches your search term.</h5>
   <h6 class='center-align'>Please make sure your search term is not less than 2 characters, make search more general or check for spelling mistakes</h6>
   </div>
   ";
  }
  ?>
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
<script type="text/javascript" src="../js/javascript-combination-2.js"></script>
</body>
 </html>
