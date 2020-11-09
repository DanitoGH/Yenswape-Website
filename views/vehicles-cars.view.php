<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

     <link type="text/css" rel="stylesheet" href="css/custom.css"  media="screen,projection"/>

     <link href="css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">

     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

   </head>

   <body>

   <!--Main Nevigation STARTS from here-->


     <nav class="nav white">
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo">
            <img src="../img/glogo.png"  width="200"  height="35"/>
          </a>
          <a href="#!" data-activates="accordion" class="button-collapse"><i class="material-icons">menu</i></a>
          <ul class="right hide-on-med-and-down">
            <li><a class="login" href="sass.html" >Login</a></li>
            <li><a class="waves-effect waves-light btn  amber darken-2 white-text" href="badges.html">Swap Now</a></li>
          </ul>

          <ul class="side-nav  accordion" id="accordion">

          <!-- Mobile Nav -->

         </ul>

        </div>
      </nav>


  <!--Main Nevigation ENDS here-->



 <div class="row">

 <div  class="container">

 <div class="cover_img_placehoder z-depth-1">

<form method="post"  name="form2" action="/final-step"  id="form2" enctype="multipart/form-data"  role="form">
 <div class="col l6 xl6 s12 m12 display:block;">
  <div class="row">
  <label>Make</label>
  <select class="browser-default"  id="make">
  <option value="" disabled selected>Select make</option>
  </select>
  </div>


  <!-- Hidden make text field -->
  <input type="hidden"  name="make"  id="hidden_make" />


  <div class="row">
  <label>Model</label>
  <select name="model" class="browser-default" id="model">
  <option  disabled selected>Select model</option>
  </select>
  </div>


  <div class="row">
  <label>Year</label>
  <select name="year" class="browser-default">
  <option value="" disabled selected>Select</option>
  <option value="1987" >1987</option>
  <option value="1988">1988</option>
  <option value="1989">1989</option>
  <option value="1990">1990</option>
  <option value="1991">1991</option>
  <option value="1992">1992</option>
  <option value="1993">1993</option>
  <option value="1994">1994</option>
  <option value="1995">1995</option>
  <option value="1996">1996</option>
  <option value="1997">1997</option>
  <option value="1998">1998</option>
  <option value="1999">1999</option>
  <option value="2000">2000</option>
  <option value="2001">2001</option>
  <option value="2002">2002</option>
  <option value="2003">2003</option>
  <option value="2004">2004</option>
  <option value="2005">2005</option>
  <option value="2006">2006</option>
  <option value="2007">2007</option>
  <option value="2008">2008</option>
  <option value="2009">2009</option>
  <option value="2010">2010</option>
  <option value="2011">2011</option>
  <option value="2012">2012</option>
  <option value="2013">2013</option>
  <option value="2014">2014</option>
  <option value="2015">2015</option>
  <option value="2016">2016</option>
  <option value="2017">2017</option>
  </select>
  </div>



  <div class="row">
  <label>Transmission</label>
  <select name="transmission-type" class="browser-default">
  <option value="" disabled selected>Select</option>
  <option value="Automatic">Automatic</option>
  <option value="Manual">Manual</option>
  <option value="Automated Manual">Automated Manual</option>
  <option value="other">Other</option>
  </select>
  </div>


  <div class="row">
  <label>Type of car</label>
  <select name="car-type" class="browser-default">
  <option value="" disabled selected>Select</option>
  <option value="1">2 door</option>
  <option value="2">4 door</option>
  <option value="3">Convertible</option>
  <option value="3">Van/Minivan</option>
  <option value="3">Sport Utility Vehicle (SUV)</option>
  <option value="3">Pickup truck</option>
  <option value="3">Other</option>
  </select>
  </div>

  <div class="row">
    <div class="input-field">
    <input   id="input_text" type="text" data-length="40">
    <label  for="input_text">Millage</label>
  </div>
  </div>

  <div class="row">
  <div class="continue">
    <a  id="next_2"  class="cars_btn btn blue">continue</a>
  </div>
</div>

  <input type="text" name="title" value="<?php echo $fname = $_POST['title'];?>" />
  <input type="text" name="main-cat" value="<?php echo $lname = $_POST['main-cat'];?>" />
  <input type="text" name="sub-category" value="<?php echo $fname = $_POST['sub-category'];?>" />
  <input type="text" name="region" value="<?php echo $fname = $_POST['region'];?>" />
  <input type="text" name="listing-type" value="<?php echo $fname = $_POST['listing-type'];?>" />

</form>

</div>
 </div>
 </div>
 </div>
 </div>
 </div>


<!--PC footer starts HERE -->

<footer class="page-footer white">

  <div class="_container white">

    <div class="row">

      <div class="col  l1">

      </div>

      <div   class="col s12 m12 l2">
        <h6 class="footer_headings grey-text text-darken-2">Legal</h6>
        <ul>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">User Agreement</a></li>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col s12 m6 l2">
        <h6 class="footer_headings grey-text text-darken-2">Help & Contact</h6>
        <ul>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">Contact Us</a></li>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">Help Center</a></li>
        </ul>
      </div>


      <div class="col s12 m6 l2">
        <h6 class="footer_headings grey-text text-darken-2">Tool & Business</h6>
        <ul>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">Advertise with Us</a></li>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">Sitemap</a></li>
        </ul>
      </div>



      <div class="col s12 m6 l2">
        <h6 class="footer_headings grey-text text-darken-2">Stay connected</h6>
        <ul>
          <li  class="footer_links"><a class="grey-text text-darken-2"  target="_blank"  href="https://web.facebook.com/Yenswapecom-317306532038236/">Facebook</a></li>
          <li  class="footer_links"><a class="grey-text text-darken-2"  target="_blank" href="https://twitter.com/YenswapeGh">Twitter</a></li>
          <li  class="footer_links"><a class="grey-text text-darken-2" href="#!">Google+</a></li>
        </ul>
      </div>

      <div class="col s12 m6 l3">
        <h6 class="footer_headings grey-text text-darken-2">Downlaod our app</h6>
        <ul>
          <li><img src="../img/appstore.png"  width="180"   height="45"/></li>
          <li><img src="../img/google-playbadge.png"  width="180"   height="45"/></li>
        </ul>
      </div>

    </div>
  </div>


    <div style="margin-left:9%"  class="_container">
    <div class="col s2 m2 l2 ">
    © Yenswape 2017. All Rights Reserved.
    </div>
   </div>

</footer>






<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jssor.slider-21.1.5.min.js"></script>
<script  type="text/javascript">

$(document).ready(function() {


Materialize.updateTextFields();

$(".button-collapse").sideNav();

$('select').material_select();

$('.carousel').carousel();

/*
// Next slide
$('.carousel').carousel('next');
$('.carousel').carousel('next', 2); // Move next n times.
// Previous slide
$('.carousel').carousel('prev');
$('.carousel').carousel('prev', 2); // Move prev n times.
// Set to nth slide
$('.carousel').carousel('set', 2);

$('.carousel.carousel-slider').carousel({
  fullWidth:true
});


*/




$('input.autocomplete').autocomplete({
    data: {
      "Apple": null,
      "Microsoft": null,
      "Google": 'http://placehold.it/250x250',
      "Ashanti": null,
      "Accra": null
    },
    limit: 20, // The max amount of results that can be shown at once. Default: Infinity.
    onAutocomplete: function(val) {

    },
    minLength: 2, // The minimum length of the input for the autocomplete to start. Default: 1.
  });





  $('.collapsible').collapsible({
   accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
   onOpen: function(el) {
     $(this).find('.fa-user,.fa-folder-open').toggleClass('.fa-folder').toggleClass('fa-folder-open');

  },
  // Callback for Collapsible open
    onClose: function(el) {


  } // Callback for Collapsible close
 });




   $('.collapsible-header').click(function(event) {

   if($(this).find($(".fa")).hasClass('fa-folder'))
   {

   $(this).find($(".fa-folder")).toggleClass('.fa-folder').toggleClass('fa-folder-open');

   }

   else if($(this).find($(".fa")).hasClass('fa-folder-open'))
   {

    $(this).find($(".fa-folder-open")).toggleClass('.fa-folder-open').toggleClass('fa-folder');

  }

  });





//$('.link').click(function(){

 ///$(this).find('.fa-user,.fa-folder-open').toggleClass('.fa-folder').toggleClass('fa-folder-open');
//});



/*$('.collapsible-header').click(function(){

var  currentFolder = $(this).find('.fa-folder-open,.fa-folder');
var  openFolders =   $(this).parents('.collapsible').find('.fa-folder-open');
var  currentFolderAlreadySwitched = false;



openFolders.each(function() {

$(this).toggleClass('fa-folder-open fa-folder');

if($(this).get(0) === currentFolder.get(0)){

   currentFolderAlreadySwitched = true;


}


});

});


if(!currentFolderAlreadySwitched){
   currentFolder.toggleClass('fa-folder fa-folder-open');
}

*/

});
  </script>


</body>
 </html>
