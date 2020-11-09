<!DOCTYPE html>
 <html>
 <!-- Head section goes here -->
 <?php require ('partials/header.php'); ?>
 <body>
  <!-- PC nav menu starts here -->
<?php require ('partials/nav-bar.php'); ?>
  <!-- Search menu goes here -->
<div  class="container">
<div class="row">
<div class="cover_img_placehoder  form_wrapper z-depth-1">
<div class="col l7 xl7  s12 m12"  style="padding:0px !important">
<div class="col l12 xl12 s12 m12"  style="padding:0px !important;  margin:0px !important;">
<?php
$user_id;// user id
$get_uri = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$url_parts = explode('/',$get_uri);
$url_path = $url_parts[1];
@$url_value = $url_parts[2];

@$ad_datails = App::get('database')->userad_Info($url_value);

@$image_1 = App::get('database')->fectUpdateimge_1($user_id,$url_value);
@$image_2 = App::get('database')->fectUpdateimge_2($user_id,$url_value);
@$image_3 = App::get('database')->fectUpdateimge_3($user_id,$url_value);
@$image_4 = App::get('database')->fectUpdateimge_4($user_id,$url_value);
@$image_5 = App::get('database')->fectUpdateimge_5($user_id,$url_value);
@$image_6 = App::get('database')->fectUpdateimge_6($user_id,$url_value);

foreach ($ad_datails as $ad_datail):
?>
<input type="hidden"  id="_poster_id"  value="<?php echo @$ad_datail->user_id;?>"  />
<input type="hidden"  id="ad_id"  value="<?php echo @$ad_datail->custom_id;?>" />

<form method="post"  name="form1" action="/image-upload"  id="form1" enctype="multipart/form-data"  role="form">
<!--<input type="file"  class="images"  name="files[]" multiple  id="ssi-upload"/>-->
<input  type="hidden" id="hidden"  value="hidden"  />

<?php
if($image_1 != null && $image_1 != ''){
foreach ($image_1 as $image_1_){
echo
"<input type='hidden' id='img1_id'  value='$image_1_->id' />
<input  type='hidden' id='hidden_img1'  value='$image_1_->images' />
<div class='col s6 m4 l4 xl4 thumb_1'>
  <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
    <img id='file1_img' src='../images/user-submitted/thumb/xs/$image_1_->images' alt='your image' />
     <div class='file-field input-field'>
       <div class='btn'>
         <span id='btn1_label'>change photo</span>
         <input type='file'  id='file1_id' class='file1_class update1_img'  accept='image/png, image/jpeg, image/gif' style='width:0px !important; height:0px  !important;'>
       </div>
       <div class='file-path-wrapper'>
         <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
       </div>
     </div>
  </div>
</div>
";
}
}else {
  echo"
  <div class='col s6 m4 l4 xl4 thumb_1'>
    <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
      <img id='file1_img' src='../images/upload_small.png' alt='your image' />
       <div class='file-field input-field'>
         <div class='btn'>
           <span'>upload photo</span>
           <input type='file'  id='file1_id' class='file1_class update1_img'  accept='image/png, image/jpeg, image/gif' style='width:0px !important; height:0px  !important;'>
         </div>
         <div class='file-path-wrapper'>
           <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
         </div>
       </div>
    </div>
  </div>
  ";
}


if($image_2 != null && $image_2 != ''){
foreach ($image_2 as $image_2_){
echo"
<input type='hidden' id='img2_id'  value='$image_2_->id' />
<input  name='img2_hidden' type='hidden' id='hidden_img2'  value='$image_2_->images' />
<div class='col s6 m4 l4 xl4 thumb_2'>
  <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
    <img id='file2_img' src='../images/user-submitted/thumb/xs/$image_2_->images' alt='your image' />
     <div class='file-field input-field'>
       <div class='btn'>
         <span id='btn2_label'>change photo</span>
         <input type='file'  value='' id='file2_id' class='file2_class update2_img'   accept='image/png, image/jpeg, image/gif'  style='width:0px !important; height:0px  !important;'>
       </div>
       <div class='file-path-wrapper'>
         <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
       </div>
     </div>
  </div>
</div>
";
}
}else {
  echo"
  <div class='col s6 m4 l4 xl4 thumb_2'>
    <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
      <img id='file2_img' src='../images/upload_small.png' alt='your image' />
       <div class='file-field input-field'>
         <div class='btn'>
           <span>upload photo</span>
           <input type='file'  id='file2_id' class='file2_class update2_img'   accept='image/png, image/jpeg, image/gif'  style='width:0px !important; height:0px  !important;'>
         </div>
         <div class='file-path-wrapper'>
           <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
         </div>
       </div>
    </div>
  </div>
  ";
}

if($image_3 != null && $image_3 != ''){
foreach ($image_3 as $image_3_){
echo"
<input type='hidden' id='img3_id'  value='$image_3_->id' />
<input  name='img3_hidden' type='hidden' id='hidden_img3'  value='$image_3_->images' />
<div class='col s6 m4 l4 xl4 thumb_3'>
  <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
    <img id='file3_img' src='../images/user-submitted/thumb/xs/$image_3_->images' alt='your image' />
     <div class='file-field input-field'>
       <div class='btn'>
         <span id='btn3_label'>change photo</span>
         <input type='file'  id='file3_id' class='file3_class update3_img'   accept='image/png, image/jpeg, image/gif'   style='width:0px !important; height:0px  !important;'>
       </div>
       <div class='file-path-wrapper'>
         <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
       </div>
     </div>
  </div>
</div>
";
}
}else {
  echo "
  <div class='col s6 m4 l4 xl4 thumb_3'>
    <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
      <img id='file3_img' src='../images/upload_small.png' alt='your image' />
       <div class='file-field input-field'>
         <div class='btn'>
           <span>upload photo</span>
           <input type='file'  id='file3_id' class='file3_class update3_img'   accept='image/png, image/jpeg, image/gif'   style='width:0px !important; height:0px  !important;'>
         </div>
         <div class='file-path-wrapper'>
           <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
         </div>
       </div>
    </div>
  </div>
  ";
}

if($image_4 != null && $image_4 != ''){
foreach ($image_4 as $image_4_){
echo"
<input type='hidden' id='img4_id'  value='$image_4_->id' />
<input  name='img4_hidden' type='hidden' id='hidden_img4'  value='$image_4_->images' />
<div class='col s6 m4 l4 xl4 thumb_4'>
  <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
    <img id='file4_img' src='../images/user-submitted/thumb/xs/$image_4_->images' alt='your image' />
     <div class='file-field input-field'>
       <div class='btn'>
         <span id='btn4_label'>change photo</span>
         <input type='file'  id='file4_id' class='file4_class update4_img'   accept='image/png, image/jpeg, image/gif'  style='width:0px !important; height:0px  !important;'>
       </div>
       <div class='file-path-wrapper'>
         <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
       </div>
     </div>
  </div>
</div>
";
}
}else {
  echo"
  <div class='col s6 m4 l4 xl4 thumb_4'>
    <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
      <img id='file4_img' src='../images/upload_small.png' alt='your image' />
       <div class='file-field input-field'>
         <div class='btn'>
           <span'>upload photo</span>
           <input type='file'  id='file4_id' class='file4_class update4_img'   accept='image/png, image/jpeg, image/gif'  style='width:0px !important; height:0px  !important;'>
         </div>
         <div class='file-path-wrapper'>
           <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
         </div>
       </div>
    </div>
  </div>
  ";
}

if($image_5 != null && $image_5 != ''){
foreach ($image_5 as $image_5_){
echo"
<input type='hidden' id='img5_id'  value='$image_5_->id' />
<input name='img5_hidden' type='hidden' id='hidden_img5'  value='$image_5_->images' />
<div class='col s6 m4 l4 xl4 thumb_5'>
  <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
    <img id='file5_img' src='../images/user-submitted/thumb/xs/$image_5_->images' alt='your image' />
     <div class='file-field input-field'>
       <div class='btn'>
         <span id='btn5_label'>change photo</span>
         <input type='file'  id='file5_id' class='file5_class update5_img'    accept='image/png, image/jpeg, image/gif'   style='width:0px !important; height:0px  !important;'>
       </div>
       <div class='file-path-wrapper'>
         <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
       </div>
     </div>
  </div>
</div>
";
}
}else {
  echo"
  <div class='col s6 m4 l4 xl4 thumb_5'>
    <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
      <img id='file5_img' src='../images/upload_small.png' alt='your image' />
       <div class='file-field input-field'>
         <div class='btn'>
           <span'>upload photo</span>
           <input type='file'  id='file5_id' class='file5_class update5_img'    accept='image/png, image/jpeg, image/gif'   style='width:0px !important; height:0px  !important;'>
         </div>
         <div class='file-path-wrapper'>
           <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
         </div>
       </div>
    </div>
  </div>
  ";
}

if($image_6 != null && $image_6 != ''){
foreach ($image_6 as $image_6_){
echo"
<input type='hidden' id='img6_id'  value='$image_6_->id' />
<input  name='img6_hidden' type='hidden'  id='hidden_img6'  value='$image_6_->images' />
<div class='col s6 m4 l4 xl4 thumb_6'>
  <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
    <img id='file6_img'  src='../images/user-submitted/thumb/xs/$image_6_->images'' alt='your image' />
     <div class='file-field input-field'>
       <div class='btn'>
         <span id='btn6_label'>change photo</span>
         <input type='file'  id='file6_id' class='file6_class update6_img'    accept='image/png, image/jpeg, image/gif'   style='width:0px !important; height:0px  !important;'>
       </div>
       <div class='file-path-wrapper'>
         <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
       </div>
     </div>
  </div>
</div>
";
}
}else {
  echo"
  <div class='col s6 m4 l4 xl4 thumb_6'>
    <div style='padding:0px !important; margin:0px !important;' class='file-field input-field'>
      <img id='file6_img' src='../images/upload_small.png' alt='your image' />
       <div class='file-field input-field'>
         <div class='btn'>
           <span>upload photo</span>
           <input type='file'  id='file6_id' class='file6_class update6_img'    accept='image/png, image/jpeg, image/gif'   style='width:0px !important; height:0px  !important;'>
         </div>
         <div class='file-path-wrapper'>
           <input style='width:0px !important; height:0px  !important;' class='file-path validate' type='text'>
         </div>
       </div>
    </div>
  </div>
  ";
}
?>
</form>
</div>
<label  class="errors-imageupload"  id="images_error"></label>
</div>
<div class="col l5 xl5 s12 m12"  style="padding:0px !important;  margin:0px !important;">
<div class="row">
<div  class="input-field col l12 xl12 s12 m12">
<input name="title" autocomplete="off" class="title" value="<?php echo $ad_datail->title;?>" id="title" type="text" data-length="45">
<label for="title">Give your ad a title *</label>
</div>
<label  class="errors-adinfo"  id="title_error"></label>
</div>
<div class="row">
<div  class="input-field col l12 xl12 s12 m12">
<input  id="category" autocomplete="off" type="text" value="<?php echo $ad_datail->main_cat.' --> '.$ad_datail->subcategory;?>"data-length="50">
<label for="category">Category *</label>
</div>
<label  class="errors-adinfo"  id="category_error"></label>
</div>
<label style="font-size:14px">Listing type *</label>
<div class="row">
<div class="input-field col l12 xl12 s12 m12">
<select  name="listing-type" id="listing-type" class="browser-default">
  <option value="<?php echo $ad_datail->listing_type;?>" selected><?php echo $ad_datail->listing_type;?></option>
  <option id="swap_or_sell_option" value="Swap or Sell">Sell or Swap</option>
  <option id="sell_option" value="Sell">Sell</option>
  <option id="swap_option" value="Swap">Swap</option>
  <option id="rent_option" value="Rent">Rent</option>
  <option id="job_offere_option" value="Job_Offer">Offering a job</option>
  <option id="job_seeking_option"  value="Job_Seeking">Looking for a job</option>
</select>
</div>
<label  class="errors-adinfo"  id="listing-type_error" ></label>
</div>
<div class="row">
<div class="input-field col  l12 xl12 s12 m12">
<input type="text" placeholder="Enter part of town or city" value="<?php echo $ad_datail->city_town;?>"  autocomplete="off"  name="location" id="city" class="autocomplete">
<label for="city">City/Town *</label>
</div>
<label  class="errors-adinfo"  id="location_error"></label>
</div>
<div class="continue_btn col l12 xl12 s12  m12">
<a  id="update_cont"  class="add_more btn blue">continue</a>
</div>

<input type="hidden"  value="<?php echo @$ad_datail->main_cat;?>" name="main-cat"  id="main_cat" />
<input type="hidden"  value="<?php echo @$ad_datail->subcategory;?>" name="sub-category"  id="sub_cat" />
<input type="hidden"  value="<?php echo @$ad_datail->region;?>" name="region"  id="region" />

<label style="display:none" id="category_selection"></label>
<label style="display:none" id="subcategory_selection"></label>
</div>
</div>
<?php endforeach;?>
  <!--Categores Modal -->

<div id="maincat_model"  class="modal  maincat_model">
    <div class="modal-content" style="padding-top:5px !important;">
     <div class="col l6 xl6  s6 m6"><h5 class="left-align categories">Categories</h5></div>
     <div class="col l6 xl6  s6 m6"><h5 class="right-align"><span class="exit_main"><i class="fa fa-times"  aria-hidden="true"></i></span></h5></div>
      <div class="col l6 xl6  s12 m12">
      <h6 id="2" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Art</span></h6>
      <h6 id="3" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Baby</span></h6>
      <h6 id="4" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Books</span></h6>
      <h6 id="5" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Clothing</span></h6>
      <h6 id="6" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Computers</span></h6>
      <h6 id="7" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Crafts</span></h6>
      <h6 id="8" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Electronics</span></h6>
      <h6 id="9" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Health and Beauty</span></h6>
      <h6 id="10" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Home and Garden</span></h6>
      <h6 id="11" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Jewelry</span></h6>
      <h6 id="1" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Jobs and Services</h6>
      <h6 id="12" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Movies</span></h6>
      <h6 id="13" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Pets and Animals</span></h6>
      <h6 id="19" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Property</span></h6>
      <h6 id="14" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Shoes</span></h5>
      <h6 id="15" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Sports and Fitness</span></h6>
      <h6 id="16" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Toys</span></h6>
      <h6 id="17" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Vehicles</span></h6>
      <h6 id="18" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Video Games</span></h6>
      <br>
    </div>
  </div>
 </div>


 <!--Sub_categories Modal -->
 <div id="submodal1" class="modal  category_submodal">
   <div class="modal-content" style="padding-top:5px !important;">
    <div class="col l6 xl6  s6 m6"><h5 class="left-align categories">Sub-category</h5></div>
    <div class="col l6 xl6  s6 m6"><h5 class="right-align"><span class="exit_sub"><i class="fa fa-times"  aria-hidden="true"></i></span></h5></div>

    <div id="sub_hidden_1"class="col l6 xl6  s12 m12">
     <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Offered Jobs</span></h6>
     <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Seeking Work</span></h6>
     <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Services</span></h6>
     <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Classes and Courses</span></h6>
     <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
    <br>
    </div>

   <div id="sub_hidden_2" class="col l6 xl6 s12 m12">
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Digital Art</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Drawings</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Folk-Art</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Mixed-Media</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Paintings</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Photo-Images</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Posters</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Prints</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Sculpture</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Self</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
  <br>
 </div>

 <div id="sub_hidden_3" class="col l6 xl6  s12 m12">
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Baby-Gear</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Baby-Safety</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Bathing</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Bedding</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Car Seats</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Clothing</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Diapering</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Decor</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Feeding</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Furniture</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Potty-Training</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Shoes</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Strollers</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Toys</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_4" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Audio</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Children</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Computer</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Cooking</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Engineering</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Fantasy</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Fiction</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Finance</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">History</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Mystery</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Nonfiction</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Romance</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Science</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Sci-Fi</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Social</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Vocational</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Young Adult</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_5" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Children</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Maternity</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Men</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Women</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_6" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Components</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Desktops</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Laptops</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Networking</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Printers</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Software</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_7" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Bead Art</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Candle-Soap</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Ceramics</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Fabric</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Floral</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Needlecraft</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Painting</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Scrapbooking</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Stamping</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_8" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Apple Products</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Audio</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Cameras</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Components</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">DVR</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Household</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">MP3/Misc</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Phones</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Photography</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Stereo</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Toys</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Tv</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Video-Cameras</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_9" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Body Care</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Cosmetics</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Hair Care</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Men</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Vitamins</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Women</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>



<div id="sub_hidden_10" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Appliances</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Bath</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Bedding</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Furniture</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Gardening</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Home Decor</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Kitchen</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Office-Supplies</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Outdoor-Equipment</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Patio-Grill</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Pet-Supplies</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Pools-Spas</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Rugs-Carpet</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Tools</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_11" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Gems</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Men</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Watches</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Women</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_12" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Action</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Children</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Comedy</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Documentary</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Drama</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Horror</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Local-English</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Local-Twi</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Local-Other</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Music-Video</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Romance</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Sci-Fi</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">TV</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_13" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Adoption</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Animals</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Supplies</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_14" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Children</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Men</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Women</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_15" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Baseball</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Basketball</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Camping</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Equipments</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Exercise</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Football</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Golf</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Hockey</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Soccer</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Tennis</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>


<div id="sub_hidden_16" class="col l6 xl6  s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Boards</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Children</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Electronics</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Figures</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Motorized</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Puzzles</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Sports</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_17" class="col l6 xl6 s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Cars</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Parts</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Motorcycles</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Trucks</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>

<div id="sub_hidden_18" class="col l6 xl6 s12 m12">
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Accessories</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Consoles</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Gameboy</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">GameCube</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Mobile</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Nintendo</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">PC</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Playstation</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">PSP</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Sega</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">intage</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Xbox</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Wii</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
 </div>

 <div id="sub_hidden_19" class="col l6 xl6  s12 m12">
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Apartments for Rent</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Apartments for Sale</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Commercial Property</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Land</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">New Developments</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Office and Shops</span></h6>
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Other</span></h6>
 <br>
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
<script type="text/javascript" src="../js/javascript-combination-5.js"></script>
<script  type="text/javascript">
  $(document).ready(function(){
    // Modal initialization
    $('.login_modal,.report_modal,.mobile_filter,.results_modal').modal({
        dismissible:true, // Modal can be dismissed by clicking outside of the modal
        opacity:.7 // Opacity of modal background
     });

     $('.register_user,.maincat_model,.category_submodal,.upload_form').modal({
         dismissible:false, // Modal can be dismissed by clicking outside of the modal
         opacity:.7 // Opacity of modal background
     });

    Materialize.updateTextFields();
    $(".button-collapse").sideNav();
    $('select').material_select();

    //Datepicker
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 0, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
      });
    });
 </script>

</body>
</html>
