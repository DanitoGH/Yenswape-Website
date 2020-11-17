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
 <div class="col l3 xl3 side_menu  hide-on-med-and-down">
  <!-- PC side-menu goes in here -->
  <?php require ('partials/category-selector.php'); ?>
 </div>
  <div class="col s9 m8 l8 hide-on-med-and-down">
  <div class="results_deatails z-depth-1">
  <div class="col l8">
  <?php require ('views/partials/results-pagination.php'); // paginator class two has been added?>
  <form>
    <label style="color: #95989A; font-size:15px;"><strong>Results:</strong></label>
    <label style="color: #95989A; font-size:14px;"><strong> <?php echo $paginator->counter($links, 'pagination'); ?></strong></label>
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
    &nbsp;
   <div class="chip">
    <?php
    if(@$location != null || @$location != ''){ echo ucfirst(@$location);}else {  echo $default = 'Whole country';}
     ?>
   </div>
   <div class="chip">
    <?php if( @$category != null || @$category != ''){ echo ucfirst(@$category); }else if(@$item != null || @$item != ''){ echo ucfirst(@$item); }else { echo $default = 'All categories'; } ?>
   </div>
  </div>
  <div class="col l4">
    <a href="#filter_mod"  class=" btn blue"> <strong>Filter results</strong></a>
  </div>
  </form>
  </div>
  <div class="results_table  z-depth-1">
    <?php for($items = 0; $items < count($results->data); $items++): ?>
    <?php $row = $results->data[$items]; ?>
    <?php $images = App::get('database')->resultsImages($row['custom_id']);?>
    <?php foreach ($images as $image){} ?>
    <script>
     //Timeout to load large images making the page load faster
     setTimeout(function(){
        $("#"+<?php echo $image->id ?>).attr("src","https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/<?php echo $image->images;?>");
        $("#"+<?php echo $image->id ?>).removeClass('blur').addClass('noblur');
     },6000)
     </script>
    <table style="" class="bordered">
    <tbody>
    <tr>
    <td>
   <div class="col s12">
    <div class="row results-align valign-wrapper">
    <div  class="results_img">
    <a  title="<?php echo htmlspecialchars_decode(stripslashes($title = $row['title']));?>"  href="../item/<?php echo $row['uri'];?>">
       <img  id="<?php echo $image->id ?>"  src="https://yenswape.s3.eu-west-2.amazonaws.com/ads_images/thumbs/<?php echo $image->images ?>" alt="<?php echo htmlspecialchars_decode(stripslashes($title = $row['title']));?>" width="100%"  height="100%">
    </a>
    </div>
    <div class="inner-text col s10">
     <div  class="col s12">
      <span><a class="results_title" href="../item/<?php echo $uri = $row['uri'];?>"><?php echo htmlspecialchars_decode(stripslashes($title = $row['title']));?> </a></span>
    </div>
    <div  class="col s12">
     <span class="results_price">₵ <?php echo number_format_drop_zero_decimals($value = $row['value'], 2);?></span>
     <br>
    </div>
    <div  class="col s12">
     <br>
     <div style="padding-left:0px" class="col s6">
      <span class="results_category"><?php echo ucfirst($main_category = $row['main_cat']);?> &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i> &nbsp;&nbsp;<?php echo ucfirst($main_category = $row['subcategory']);?></span>
      <br/>
      <span class="resluts_location"><?php echo $value = $row['city_town'];?></span>
     </div>
     <div  class="col s6 center-align">
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
     <span><small class="results_listings"><?php echo $type; ?></small></span>
     <br>
       <small class="timestamp"><?php echo $time = formatDateAgo($row['datetime']);?></small>
     </div>
    </div>
    </div>
    </div>
    </div>
    </td>
    </tr>
  </tbody>
  </table>
<?php endfor; ?>
<?php
 if(count($results->data) > 14){?>
 <div  style="margin-bottom:100px;">
    <?php  echo $paginator->createLinks($links, 'pagination'); ?>
   </div>
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
<!-- Modals goes here -->
<?php require ('partials/modals.php'); ?>
<!-- PC footer goes HERE -->
<?php require ('partials/footer.php'); ?>
<!-- javascript footer goes here -->
<!--==================================================================
                       JAVASCRIPT FILES GOES HERE
===================================================================== -->
<script type="text/javascript" src="../js/javascript-combination-2.js"></script>
</body>
 </html>
