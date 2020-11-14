<!DOCTYPE html>
 <html>
 <!-- Head section goes here -->
 <?php require ('partials/header-combination-4.php'); ?>
 <body>
  <!-- PC nav menu starts here -->
  <?php require ('partials/nav-bar.php'); ?>
  <!-- Search menu goes here -->
 <div  class="container">
 <div class="row">
 <div class="cover_img_placehoder  form_wrapper z-depth-1">
 <div class="col l7 xl7  s12 m12"  style="padding:0px !important">
 <div class="col l12 xl12 s12 m12"  style="padding:0px !important;  margin:0px !important;">
 <form method="post"  name="form1" action="/image-upload"  id="form1" enctype="multipart/form-data"  role="form">
  <input type="file"  class="images"  name="files[]" multiple  accept="image/png, image/jpeg,image/jpg"  capture="environment" id="ssi-upload"/>
 </form>
</div>
<label  class="errors-imageupload"  id="images_error"></label>
</div>
<div class="col l5 xl5 s12 m12"  style="padding:0px !important;  margin:0px !important;">
<div class="row">
<div  class="input-field col l12 xl12 s12 m12">
<input name="title" autocomplete="off" class="title"  id="title" type="text" data-length="45">
<label for="title">Give your ad a title *</label>
</div>
<label  class="errors-adinfo"  id="title_error"></label>
</div>
<div class="row">
<div  class="input-field col l12 xl12 s12 m12">
<input  id="category" autocomplete="off" type="text" data-length="50">
<label for="category">Category *</label>
</div>
<label  class="errors-adinfo"  id="category_error"></label>
</div>
<label style="font-size:14px">Listing type *</label>
<div class="row">
<div class="input-field col l12 xl12 s12 m12">
  <select  name="listing-type" id="listing-type" class="browser-default">
    <option value="null" disabled selected>select</option>
    <option id="swap_or_sell_option"  value="Swap or Sell">Sell or Swap</option>
    <option id="sell_option" value="Sell">Sell</option>
    <option id="swap_option" value="Swap">Swap</option>
    <option id="rent_option" value="Rent">Rent</option>
    <option id="job_offere_option" value="Job_Offer">Offering a job</option>
    <option id="job_seeking_option"  value="Job_Seeking">Looking for a job</option>
  </select>
</div>
<label  class="errors-adinfo" id="listing-type_error" ></label>
</div>
<div class="row">
<div class="input-field col  l12 xl12 s12 m12">
<input type="text" placeholder="Enter part of town or city"   autocomplete="off"  name="location" id="city" class="autocomplete">
<label for="city">City/Town *</label>
</div>
<label  class="errors-adinfo"  id="location_error"></label>
</div>
<div class="continue_btn col l12 xl12 s12  m12">
<a  id="next_1"  class="add_more btn blue">continue</a>
</div>

<input type="hidden" name="main-cat"  id="main_cat" />
<input type="hidden" name="sub-category" id="sub_cat" />
<input type="hidden" name="region"  id="region" />
<input type="hidden" id="upload" />

<!-- This line calls ad_ref funtion that generates unique codes for all ad posting #PATH core/bootrap.php -->
<input type="hidden" value="<?php echo ad_ref();?>" id="unique_code" />

<label style="display:none" id="category_selection"></label>
<label style="display:none" id="subcategory_selection"></label>
</div>
</div>

  <!--Categores Modal -->
  <div  id="maincat_model" class="modal  maincat_model">
    <div class="modal-content" style="padding-top:5px !important;">
     <div class="col l6 xl6  s6 m6"><h5 class="left-align categories">Categories</h5></div>
     <div class="col l6 xl6  s6 m6"><h5 class="right-align"><span class="exit_main"><i class="fa fa-times"  aria-hidden="true"></i></span></h5></div>
      <div class="col l6 xl6  s12 m12">
      <h6 id="2" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Art</span></h6>
      <h6 id="3" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Baby</span></h6>
      <h6 id="4" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Books</span></h6>
      <h6 id="5" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Clothing</span></h6>
      <h6 id="6" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Computers</span></h6>
      <h6 id="8" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Electronics</span></h6>
      <h6 id="9" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Health and Beauty</span></h6>
      <h6 id="10" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Home and Garden</span></h6>
      <h6 id="11" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Jewelry</span></h6>
      <h6 id="1" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Jobs and Services</h6>
      <h6 id="12" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Movies</span></h6>
      <h6 id="13" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Pets and Animals</span></h6>
      <h6 id="7" class="categ"><i class="fa fa-plus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="cat">Property</span></h6>
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
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Digital-Art</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Drawings</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Folk-Art</span></h6>
   <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Mixed Media</span></h6>
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
 <h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Car-Seats</span></h6>
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
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Young-Adult</span></h6>
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
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Apartments for Rent</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Apartments for Sale</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Commercial Property</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Land</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">New Developments</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Office and Shops</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Other</span></h6>
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
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Body-Care</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Cosmetics</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Hair-Care</span></h6>
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
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Home-Decor</span></h6>
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
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Intage</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Xbox</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Wii</span></h6>
<h6 class="categ"><i class="fa fa-minus-circle"  aria-hidden="true"></i> &nbsp;&nbsp;<span class="sub">Others</span></h6>
<br>
</div>
</div>
</div>
<div class="col l12 xl12 prohibited_items z-depth-1">
   <div class="prohibited_items">
   <h5>Prohibited Items</h5>
    <p>Yenswape.com prohibits users from utilizing our website for illegal purposes. In addition, Yenswape.com does not permit the following items and services to be listed or posted on Yenswape.com website:</p>
    <li> Firearms, firearm parts, firearm ammunition, silencers, tear gas, bombs, explosives or incendiary devices, or parts, chemicals and products that could be combined to produce bombs, explosives or incendiary devices</li>
    <li>Hazardous substances</li>
    <li> Counterfeit currency, debit cards or credit cards</li>
    <li>Prescription, controlled or illegal drugs or substances</li>
    <li> Obscene materials</li>
    <li>Illegal telecommunications equipment</li>
    <li>Stolen property</li>
    <li> Anything meant to harass or embarrass individuals</li>
    <h6  class="right-align"><a   target="_blank" href="/user-agreement">Read more of our Terms of Use</a></h6>
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
<script type="text/javascript" src="../ssi-uploader/js/ssi-uploader.min.js"></script>
<script  type="text/javascript">
$(document).ready(function(){
  function Congratulations_alert(){
  swal({
    title:"Congratulations",
    text:"Your ad has been submitted successfully, you will be notified via SMS when it goes live.",
    type:"success",
    showCancelButton: true,
    confirmButtonColor:"#DD6B55",
    confirmButtonText:"Post new ad",
    cancelButtonText:"No",
    closeOnConfirm: true,
    closeOnCancel: true
  },
  function(isConfirm){
  if (isConfirm) {
    location.reload();
    return true;
  } else {
    window.location.href='/user-account';
    return true;
  }
});
}

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
 $('.carousel').carousel();
 $('.slider').slider();

 //Datepicker
 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 0, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });

 $('#ssi-upload').ssi_uploader({
   url:'image-upload',
   maxFileSize:5,
   allowed:["jpg","JPG","jpeg","png"]
   ,onEachUpload:function(file){

   },onUpload:function(e){
     $("#post-ad_spinner").removeClass("fa-spin fa-spinner");
     $('.post_ad-btn').removeAttr('disabled');
     $('#form-2').modal('close');
     //sendAlert(); //sending SMS alert...
     if(localStorage.callback === ""){
       Congratulations_alert(); // alert user when upload is complete
     }else{
      swal("Post Ad Error","Unknwon error has occured, please try again!","error");
     }
   }
 });
});
</script>
</body>
</html>
