<!DOCTYPE html>
 <html>
  <!-- Head section goes here -->
  <?php require ('partials/header-combination-1.php'); ?>
   <body>
    <!-- PC nav menu starts here -->
   <?php require ('partials/nav-bar.php'); ?>
   <!-- Search menu goes here -->
   <div class="row">
   <?php require ('partials/search-menu-home.php'); ?>
  <!-- pc menu starts here -->
  <div class="col l3 xl3 side_menu  hide-on-med-and-down">
   <!-- PC side-menu goes in here -->
   <?php require ('partials/side-menu.php'); ?>
  </div>
 <!-- Counting and getting visitors info -->
 <?php countVisitors();?>
  <div class="col s12 m12 l8">
   <!-- Mobile search-menu ( hidden on larger devices) -->
   <?php require('partials/mobile-search-bar.php'); ?>
   <!-- Mobile search-menu ends here -->
   <!-- Banner slides ( hidden on smaller devices) -->
   <div class="slider_resizer hide-on-med-and-down">
     <div class="slider">
       <ul class="slides">
        <li>
          <img id="banner_img" class="blur" src="https://yenswape.s3.eu-west-2.amazonaws.com/static_images/_Front-banner_.png"  alt="" style="height:275px; width:100%;">
        </li>
      </ul>
    </div>
  </div>
  <!-- Banner slides  ends here -->
  <!-- Newest listings label (hidden on smaller devices)-->
 <div class="row  latest  hide-on-med-and-down">
     <div  class="listings card blue darken-2">
       <div class="card-content white-text">
         <span class="card-title">Newest Listings</span>
       </div>
   </div>
  </div>
  <!-- Newest listings label ends here-->
  <!-- Latest ads loader wrapper for both PC and Mobile-->
  <div class="center-align">
    <div id="latest_ads_wrapper" class="row">
      <!-- Latest ads content -->
   </div>
   <div class="center-align center-align index_spinner_div visiblity-off">
     <i id="" class="fa fa-spin fa-spinner" aria-hidden="true"></i>
   </div>
  <div class="center-align more-ads-loading-div  visiblity-off">
    <a class="btn load-more-btn"><i class="fa fa-spin load-more-spinner" aria-hidden="true"></i> <span id="load-more-label-span">Load more</span></a>
  </div>
  <!-- Google ads div-->
  <br/>
  <div class="center-align">
    <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- homepage-ad -->
 <!-- <ins class="adsbygoogle"
    style="display:inline-block;width:728px;height:90px"
    data-ad-client="ca-pub-8233825381055176"
    data-ad-slot="2478454102">
  </ins>
  <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
  </script> -->
  </div>
  <div class="retry-ads-load visiblity-off">
    <a class="btn-floating  reload-ads-btn waves-effect"><i class="material-icons">refresh</i></a>
    <h6>Retry</h6>
 </div>
 </div>
</div>
</div>
<!-- Goto top div -->
<div style="display:none;" id="goto-top" class="fixed-action-btn">
  <a class="btn-floating  goto-top-btn  blue"><i class="large material-icons">arrow_upward</i></a>
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
<script>
  $(document).ready(function(){
  /* LATEST ADS POST AUTO LOADER */
  let get_ad = document.getElementById('latest_ads_wrapper');
  let offset = 0;
  let card = "";
  let listing_type = "";
  loadLatestpost();
  function loadLatestpost(){
   $('.index_spinner_div').removeClass('visiblity-off');
   $.ajax({
     url:"../Load_latest_ads",
     type:"POST",
     data:"",
     timeout:20000,
     success:function(data){
       get_ad.innerHTML = "";
       $('.index_spinner_div').addClass('visiblity-off');
       $('.more-ads-loading-div').removeClass('visiblity-off');
       offset += 20;
       var _data = jQuery.parseJSON(data);
       var info_ = _data.userData[0];
       var image = _data.userData[1];
       var priceFormat = _data.userData[2];
       var timeStamp = _data.userData[3];

       console.log("Info:" +info_ + "Images:" + image + "Format:" +priceFormat + "TimeStamp:" + timeStamp)
       for(var i=j=t=p=0; i < info_.length && j < image.length && t < timeStamp.length && p < priceFormat.length; i++,j++,t++,p++){
        var info = info_[i];
        var img = image[j];
        var formatPrice = priceFormat[i];
        var time = timeStamp[t];
        if(info.listing_type == 'Sell'){
          listing_type = "For Sale";
        }else if(info.listing_type == 'Swap or Sell'){
          listing_type = "Swap or Sell";
        }else if(info.listing_type == 'Job_Offere' || info.listing_type == 'Job_Offer'){
          listing_type = "Job Offer";
        }else if(info.listing_type == 'Job_Seeking'){
          listing_type = "Job Search";
        }else if (info.listing_type == "Swap" || info.listing_type == "Trade"){
          listing_type = "For Swap";
        }else if (info.listing_type == "Rent") {
          listing_type = "For Rent";
        }
        if(time =="" || time ==" "){
          card +="<div class='col l4 xl3'><div class='thumbs card mason-item'><div  class='card-image'><a href='item/"+info.uri+"'><img  id='"+img.id+"' class=\"blur\" alt=\""+info.title+"\"  src='images/user-submitted/thumb/xs/"+img.images+"'  style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a title=\""+info.title+"\" href='item/"+info.uri+"'>"+info.title+"</a></p><p class='item-price'>₵ "+formatPrice+"</p></div></div></div>";
        }else {
          card +="<div class='col l4 xl3'><div class='thumbs card mason-item'><div  class='card-image'><a href='item/"+info.uri+"'><img id='"+img.id+"' class=\"blur\" alt=\""+info.title+"\" src='images/user-submitted/thumb/xs/"+img.images+"'  style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a title=\""+info.title+"\" href='item/"+info.uri+"'>"+info.title+"</a></p><p class='item-price'>₵ "+formatPrice+"<small  class='time_stamp'  style='float:right;text-align:right;'><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> "+time+"</small></p></div></div></div>";
        }}
        get_ad.innerHTML += card;
        card = ""; //clear card varible
       //layout Masonry after each image loads
       var $grid = $('#latest_ads_wrapper').masonry({
        itemSelector:'.card',
        columnWidth:'.mason-item',
        percentPosition: true
       });
       $grid.imagesLoaded().progress(function(){
       $grid.masonry('reloadItems');
       $grid.masonry('layout');
      })

    setTimeout(function() {
        for(var i=j=0; i < info_.length && j < image.length; i++, j++){
          $("#"+image[j].id).attr("src","images/user-submitted/thumb/"+image[j].images);
          $("#"+image[j].id).removeClass('blur').addClass('noblur');
          }
          var $grid = $('#latest_ads_wrapper').masonry({
           itemSelector:'.card',
           columnWidth:'.mason-item',
           percentPosition: true
          });
          $grid.imagesLoaded().progress(function(){
          $grid.masonry('reloadItems');
          $grid.masonry('layout');
         })
      }, 2000)
     },
     error:function(data){
       get_ad.innerHTML = "";
       $('.index_spinner_div').addClass('visiblity-off');
       $('.retry-ads-load').removeClass('visiblity-off');
       Materialize.toast("Ads loading timeout, please try again",5000);
     }
   });
   }

  //Loading more ads on scroll
  let working = false;
  $('.load-more-btn').click(function(){
     let scroll_card = "";
     working = true;
     let btn_status = document.getElementById('load-more-label-span');
     btn_status.innerHTML = "Loading...";
     $(this).attr('disabled', 'disabled');
     $('.load-more-spinner').addClass('fa-spinner');
     $.ajax({
        url:"../Load_latest_ads_offset",
        type:"POST",
        data:{offset:offset},
        timeout:20000,
        success:function(data){
         if(data.length > 0){
         $('.load-more-spinner').removeClass('fa-spinner');
         $('.load-more-btn').removeAttr('disabled');
         btn_status.innerHTML = "Load more";
         offset += 11;
         var data = jQuery.parseJSON(data);
          var info_ = data.userData[0];
          var image = data.userData[1];
          var priceFormat = data.userData[2];
          var timeStamp = data.userData[3];
        for(var i=j=t=p=0; i < info_.length && j < image.length && t < timeStamp.length && p < priceFormat.length; i++,j++,t++,p++){
           var info = info_[i];
           var img = image[j];
           var formatPrice = priceFormat[i];
           var time = timeStamp[t];
         if(info.listing_type == 'Sell'){
           listing_type = "For Sale";
         }else if(info.listing_type == 'Swap or Sell'){
           listing_type = "Swap or Sell";
         }else if(info.listing_type == 'Job_Offere' || info.listing_type == 'Job_Offer'){
           listing_type = "Job Offer";
         }else if(info.listing_type == 'Job_Seeking'){
           listing_type = "Job Search";
         }else if (info.listing_type == "Swap" || info.listing_type == "Trade"){
           listing_type = "For Swap";
         }else if (info.listing_type == "Rent") {
           listing_type = "For Rent";
         }
           if(time =="" || time ==" "){
             scroll_card += "<div class='col l4 xl3'><div class='thumbs card mason-item'><div  class='card-image'><a href='item/"+info.uri+"'><img id='"+img.id+"' class=\"blur\"  alt=\""+info.title+"\"  src='images/user-submitted/thumb/xs/"+img.images+"'  style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a title=\""+info.title+"\" href='item/"+info.uri+"'>"+info.title+"</a></p><p class='item-price'>₵ "+formatPrice+"</p></div></div></div>";
           }else {
             scroll_card += "<div class='col l4 xl3'><div class='thumbs card mason-item'><div  class='card-image'><a href='item/"+info.uri+"'><img id='"+img.id+"' class=\"blur\"  alt=\""+info.title+"\" src='images/user-submitted/thumb/xs/"+img.images+"'  style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a title=\""+info.title+"\" href='item/"+info.uri+"'>"+info.title+"</a></p><p class='item-price'>₵ "+formatPrice+"<small  class='time_stamp'  style='float:right;text-align:right;'><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> "+time+"</small></p></div></div></div>";
           }}
           get_ad.innerHTML += scroll_card;
           scroll_card = "";
          //layout Masonry after each image loads
          var $grid = $('#latest_ads_wrapper').masonry({
           itemSelector:'.card',
           columnWidth:'.mason-item',
           percentPosition: true
          });
          $grid.imagesLoaded().progress(function(){
          $grid.masonry('reloadItems');
          $grid.masonry('layout');
         })

        setTimeout(function() {
          for(var i=j=0; i < info_.length && j < image.length; i++, j++){
             $("#"+image[j].id).attr("src","images/user-submitted/thumb/"+image[j].images);
             $("#"+image[j].id).removeClass('blur').addClass('noblur');
           }
         var $grid = $('#latest_ads_wrapper').masonry({
          itemSelector:'.card',
          columnWidth:'.mason-item',
          percentPosition: true
         });
         $grid.imagesLoaded().progress(function(){
         $grid.masonry('reloadItems');
         $grid.masonry('layout');
        })
         }, 2000)
        setTimeout(function(){
           working = false;
         },10000);
      }else {
       btn_status.innerHTML = "No ad found!";
       Materialize.toast("Sorry,no ad was found!",3000);
      }
    },error:function (data){
      btn_status.innerHTML = "Try again!";
      Materialize.toast("Ads loading timeout, please try again",5000);
   }})})

   //Reload ads on loading timeout
   $('.reload-ads-btn').click(function(){
     loadLatestpost();
   });

  //Goto Scroll top function
  window.onscroll = function(ev){
  if((window.innerHeight + window.scrollY) >= document.body.scrollHeight){
    //you're at the bottom of the page
  }else if($(window).width() > 950){
   if(document.body.scrollTop > 1200 || document.documentElement.scrollTop > 1200){
    document.getElementById("goto-top").style.display = "block";
  }else{
    document.getElementById("goto-top").style.display = "none";
   }
 }else if($(window).width() < 500){
  if(document.body.scrollTop > 450 || document.documentElement.scrollTop > 450){
   document.getElementById("goto-top").style.display = "block";
  }else{
   document.getElementById("goto-top").style.display = "none";
  }
 }else if ($(window).width() < 1100 && $(window).width() >= 500) {
  if(document.body.scrollTop > 550 || document.documentElement.scrollTop > 550){
   document.getElementById("goto-top").style.display = "block";
  }else{
   document.getElementById("goto-top").style.display = "none";
 }}};

 //Goto top button
 $('.goto-top-btn').click(function(){
   $('body,html').animate({ scrollTop: 0, }, 700);
 })

 //Changing banner image size for faster loading time
 setTimeout(function() {
       $("#banner_img").attr("src","images/_Front-banner_.png");
       $("#banner_img").removeClass('blur').addClass('noblur');
   },1000)

  });
 </script>
 </body>
 </html>
