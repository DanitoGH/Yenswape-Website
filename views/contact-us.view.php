<!DOCTYPE html>
 <html>
  <?php require ('partials/header-combination-6.php'); ?>
  <?php require ('partials/nav-bar.php'); ?>
 <body>
<div  class="container">
 <div class="contact-bg z-depth-1">
 <div class="row">

<div class="col s12 m12 l12 xl12">
  <div class="sitemap-header">
    <h5 class="">Contact us</h5>
    <p>Contact us by filling out the form bellow. We will be more than happy to assist you.</p>
  </div>

<div class="col s12 m12 l6 xl6">
  <div class="row">
   <div class="input-field col s12 m12 l12 xl11">
     <input  id="full_name" type="text" class="validate">
     <label for="full_name">Fullname</label>
  </div>
</div>
<label  id="name-error"></label>

<div class="row">
 <div class="input-field col s12 m12 l12 xl11">
   <input  id="email" type="email"  class="validate">
   <label for="email">Your E-Mail</label>
</div>
</div>
<label  id="email-error"></label>

<div class="row">
 <div class="input-field col s12 m12 l12 xl11">
   <input  id="mobile-numb" type="number" min="0" class="validate">
   <label for="mobile-numb">Contact Number</label>
</div>
</div>
<label  id="mobile-error"></label>
</div>

<div class="col s12 m12 l6 xl6">
  <div class="row">
    <div class="input-field col s12">
      <textarea id="contact-message"  class="materialize-textarea" maxlength="1000" data-length="1000"></textarea>
      <label for="contact-message">Enquiry Content</label>
    </div>
  </div>
  <label  id="message-error"></label>
</div>

<div class="col s12 m12 l6 xl6">
  <div class="row">
    <div class="input-field col s12 contact-btn">
   <a class="btn blue contact_us-btn animated">SEND message</a>
 </div>
  </div>
</div>
</div>
</div>
</div>
</div>

<!-- PC footer goes HERE -->
<?php require ('partials/footer.php'); ?>
<!--==================================================================
                       JAVASCRIPT FILES GOES HERE
 ===================================================================== -->
 <script type="text/javascript" src="../js/javascript-combination-6.js"></script>
</body>
 </html>
