<!DOCTYPE html>
 <html>
  <head>
  <?php
  if(isLoggedIn()){
    $user_id = isLoggedIn();
   if(App::get('database')->query('SELECT * FROM lastseen WHERE user_id=:user_id', array(':user_id'=>$user_id))){
        App::get('database')->query('UPDATE lastseen SET datetime=:datetime WHERE user_id=:user_id', array(':datetime'=>date('Y-m-d H:i:s'),':user_id'=>$user_id));
   }else{
       App::get('database')->query('INSERT INTO lastseen VALUES (id,:user_id,:datetime)',
       array(':user_id'=>$user_id,':datetime'=>date('Y-m-d H:i:s')));
    }
   }
    ?>
    <title>Yenswape.com | Swap and Sell stuff for free.</title>
    <meta name="keywords" content="swap anything in ghana, sell anyting for free, swap phones,swap cars,swap tv,swap in Ghana, sell and swap, phones, olx.com, tonaton.com, swap and sell, sell anything in ghana , Rent, Jobs">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" href="../images/favicon.png" sizes="16x16 32x32 64x64" type="image/png">
    <link type="text/css" rel="stylesheet" href="../css/css-combination3.css"  media="screen,projection"/>
    <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--  Facebook sharing properties  -->
    <?php
     $get_uri = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
     $url_parts = explode('/',$get_uri);
     @$Shop_id = $url_parts[2];

     @$owner_ = App::get('database')->query('SELECT id FROM users WHERE user_ref=:user_ref LIMIT 1', array(':user_ref'=>$Shop_id))[0]['id'];
     $query_id = ""; $business_name = ""; $about_business = ""; $message = ""; $shop_banner_img = "";
     if($user_id > 0 && $Shop_id < 1){ $query_id = $user_id; }else if($Shop_id > 0){ $query_id = $owner_; }
     @$user_account_type = App::get('database')->query('SELECT * FROM account_types WHERE user_ref=:user_ref AND account_type=:account_type LIMIT 1', array(':user_ref'=>$query_id,':account_type'=>'business'))[0]['id'];
     @$check_account_state = App::get('database')->query('SELECT * FROM business_info WHERE user_ref=:user_ref LIMIT 1', array(':user_ref'=>$query_id))[0]['id'];
    if($user_account_type > 0 && $check_account_state > 0){ // Checking account type i.e Business or personal
     @$businessInfos = App::get('database')->fetchbusinessInfo($query_id);
     foreach ($businessInfos as $businessInfo){
      $business_name = $businessInfo->business_name;
      $about_business = ucfirst(strtolower(trim($businessInfo->about_us)));
      $message = "Check"." ".$business_name." page out on Yenswape.com.";
      $shop_banner_img = "user-submitted/".$businessInfo->banner_img;
     }
    }else{
     $message = "Check out my page on Yenswape.com";
     $shop_banner_img = "_Front-banner_.png";
     $about_business = "Swap, Buy, Sell, Find Jobs and Rent for free on Yenswape.com.";
    }
    ?>
    <meta property="og:url"         content="https://www.yenswape.com<?php echo $get_uri;?>" />
    <meta property="og:type"        content="https://www.yenswape.com" />
    <meta property="og:title"       content="<?php echo $message ?>" />
    <meta property="og:description" content="<?php echo $about_business; ?>" />
    <meta property="og:image"       content="https://www.yenswape.com/../images/<?php echo $shop_banner_img; ?>" />
  </head>
   <body>
  <?php require ('partials/nav-bar.php'); ?>
   <!--Main Nevigation STARTS from here-->
  <!--Main Nevigation ENDS here-->
<div class="top-header"></div>
<!-- Jquery has been placed here as a dependent of the ajax call -->
<!--==================================================================================
      JQUERY AND MASONRY PACKAGE HAS BEEN ADDED TO DISPLAY USER ADS WITH JAVASCRIPT
=========================================================================================-->
<script type="text/javascript" src="../js/javascript-combination-1.js"></script>
<div  class="container">
   <!-- Google adsense block -->
   <!-- End of google adsense -->
 <div class="row">
  <!-- Counting and getting visitors info -->
  <?php countVisitors();?>
  <?php if($user_account_type > 0 && $check_account_state > 0){?>
  <!-- Business banner -->
  <?php @$businessInfos = App::get('database')->fetchbusinessInfo($query_id);?>
  <?php foreach ($businessInfos as $businessInfo){
   $contacts = '';
  if($businessInfo->contact_2 != ''){
     $contacts = $businessInfo->contact_1.' or '.$businessInfo->contact_2;
  }else { $contacts = $businessInfo->contact_1; }
  $new_email = '';
  /* Getting user email */
  $new_email = $businessInfo->email_add ? $businessInfo->email_add : "Not available";
  ?>
 <!-- Bussines account-->
 <div  class="col s12  content">
  <div class="card">
   <div class="card-image  bussiness_custom-banner">
     <img class="circle" src="../images/user-submitted/<?php echo $businessInfo->banner_img ?>">
   </div>
 <div id="bussines-info-wrapper" class="col l4 xl4 s8 m5">
  <div class="card user_info_wrapper  busines_account_wrapper">
    <div class="card-content  user_information_card_content">
      <h5><?php echo $businessInfo->business_name; ?></h5>
      <h6><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo ucfirst(strtolower(trim($businessInfo->business_location)));?></h6>
      <h6><i class="fa fa-phone" aria-hidden="true"></i><?php echo $contacts;?></h6>
      <h6><i class="fa fa-envelope-open" aria-hidden="true"></i><?php echo $new_email;?></h6>
      <h6><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $businessInfo->working_days;  $businessInfo->working_hours;?></h6>
      <h6 class="mobile-about-bussiness-desc"><?php echo ucfirst(strtolower(trim($businessInfo->about_us))); ?></h6>
      <h6 class="shop_shares"></h6>
    </div>
   </div>
  </div>
  <div class="card-content card-tabs">
  <h6  class="pc-about-bussiness-desc"><?php echo ucfirst(strtolower(trim($businessInfo->about_us))); ?></h6>
   <!-- Tabs list -->
   <?php
  if($user_id > 0 && $Shop_id < 1){ ?>
  <!-- Tabs list -->
   <ul class="tabs">
     <li  class="tab col s3 shop_home_tab"><a href="#my_ads"><i class="material-icons">store</i> <span  class="my_ads"> My ads</span></a></li>
     <li id="_likes" class="tab col s3"><a href="#user_likes"><i class="like_icon material-icons">thumb_up</i><span class="liked"> Liked</span></a></li>
     <li id="_statistics" class="tab col s3"><a href="#statistics"><i class="material-icons">pie_chart</i><span class="statistics"> Statistics</span></a></li>
     <li id="_settings" class="tab col s3"><a href="#setting"><i class="material-icons">build</i><span class="settings"> Settings</span></a></li>
  </ul>
   <!-- Tabs list ends -->
 <?php }else if($Shop_id > 0 && $owner_ == $user_id){?>
   <!-- Tabs list -->
    <ul class="tabs">
      <li  class="tab col s3"><a href="#my_ads"><i class="material-icons">store</i> <span  class="my_ads"> My ads</span></a></li>
      <li id="_likes" class="tab col s3"><a href="#user_likes"><i class="like_icon material-icons">thumb_up</i><span class="liked"> Liked</span></a></li>
      <li id="_statistics" class="tab col s3"><a href="#statistics"><i class="material-icons">pie_chart</i><span class="statistics"> Statistics</span></a></li>
      <li id="_settings" class="tab col s3"><a href="#setting"><i class="material-icons">build</i><span class="settings"> Settings</span></a></li>
   </ul>
    <!-- Tabs list ends -->
  <?php }?>
    <!-- Tabs list ends -->
  </div>
  </div>
 </div>
<?php } ?>
<?php }else{ ?>
 <!-- Default banner -->
 <?php
  $poster_info = App::get('database')->userInfo($query_id);
  foreach ($poster_info as $poster_info_){
   $userName = $poster_info_->fname." ".$poster_info_->lname;
   $userMobile = $poster_info_->mobile ? $poster_info_->mobile : "Not available";
   $userEmail = $poster_info_->email ? $poster_info_->email : "Not available";
  }
  ?>
 <div  class="col s12  content">
  <div class="card">
  <div class="card-image">
    <img class="" src="../images/_Front-banner_.png">
  </div>
  <div class="col l3 xl3 s7 m6">
   <div class="card user_info_wrapper_personal">
   <div class="card-content  user_information_card_content">
     <h5><?php echo $userName;?></h5>
     <h6><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $userMobile;?></h6>
     <h6><i class="fa fa-envelope-open" aria-hidden="true"></i> <?php echo $userEmail; ?></h6>
   </div>
  </div>
 </div>
  <div class="card-content card-tabs">
   <!-- Tabs list -->
   <?php if($owner_ > 0 && isset($user_id) && $owner_ == $user_id){?>
    <ul class="tabs">
     <li class="tab col s3"><a href="#my_ads"><i class="material-icons">store</i> <span  class="my_ads"> My ads</span></a></li>
     <li id="_likes" class="tab col s3"><a href="#user_likes"><i class="like_icon material-icons">thumb_up</i><span class="liked"> Liked</span></a></li>
     <li id="_statistics" class="tab col s3"><a href="#statistics"><i class="material-icons">pie_chart</i><span class="statistics"> Statistics</span></a></li>
     <li id="_settings" class="tab col s3"><a href="#setting"><i class="material-icons">build</i><span class="settings"> Settings</span></a></li>
   </ul>
 <?php }else if(isset($user_id) && $user_id > 0 && $owner_ < 1){ ?>
   <ul class="tabs">
     <li  class="tab col s3"><a href="#my_ads"><i class="material-icons">store</i> <span  class="my_ads"> My ads</span></a></li>
     <li id="_likes" class="tab col s3"><a href="#user_likes"><i class="like_icon material-icons">thumb_up</i><span class="liked"> Liked</span></a></li>
     <li id="_statistics" class="tab col s3"><a href="#statistics"><i class="material-icons">pie_chart</i><span class="statistics"> Statistics</span></a></li>
     <li id="_settings" class="tab col s3"><a href="#setting"><i class="material-icons">build</i><span class="settings"> Settings</span></a></li>
  </ul>
 <?php } ?>
    <!-- Tabs list ends -->
  </div>
  </div>
 </div>
<?php } ?>
 <!-- All ads content starts here-->
 <div id="my_ads" class="col s12 m12 l12 xl12  center-align">
  <div id="shop_ads">
   <div id="loading_spinner" class="center-align index_spinner_div">
     <i  class="fa fa-spin fa-spinner" aria-hidden="true"></i>
   </div>
   <!-- Goto top div -->
   <div style="display:none;" id="goto-top" class="fixed-action-btn">
     <a class="btn-floating blue"><i class="large material-icons">arrow_upward</i></a>
   </div>
 <!-- Load more ads on scroll -->
  <?php if($Checkstatus === 'user'){?>
  <?php if(count($userads) > 0 && $Checkstatus === 'user'){?>
  <script type="text/javascript">
  let my_ads = document.getElementById('shop_ads');
  let loading = document.getElementById('loading_spinner');
  let card = "";
  let listing_type = "";
   $.ajax({
      url:"../Load_user_ads",
      type:"POST",
      data:{user_id:<?php echo $query_id;?>},
      timeout:20000,
      success:function(data){
        loading.innerHTML = "";
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

        switch(info.listing_type){
          case 'Sell':
              listing_type = "For Sale";
              break;
          case "Swap or Sell":
              listing_type = "Swap or Sell";
              break;
          case "Job_Offer":
              listing_type = "Job Offer";
              break;
          case "Swap":
              listing_type = "For Swap";
              break;
          case "Rent":
              listing_type = "For Rent";
              break;
          case "Job_Seeking":
              listing_type = "Job Search";
              break;
          default:
             listing_type = "Error";
           }

         let item_status = "";
        switch(info.status){
           case '0':
               item_status = "Pending";
               break;
           case "1":
               item_status = "Active";
               break;
           case "2":
               item_status = "Sold";
               break;
           default:
               text = "Status Error";
           }
            card += "<div class=\"col l5 xl6 user_ads_div\"><div class=\"thumbs card shop-mason-item\"><div class=\"card-image  waves-effect waves-block waves-light\"><a href=\"../item/"+info.uri+"\"><img id="+img.id+" class=\"activator  blur\" src='../images/user-submitted/thumb/xs/"+img.images+"' alt=\""+info.title+"\" style=\"width:100%;\"></a><span class=\"card-title home-card\">₵ "+formatPrice+"</span></div><div class=\"card-content\"><span class=\"card-title activator item-title\"><a href=\"../item/"+info.uri+"\"> "+info.title+"</a><i class=\"material-icons right\">more_vert</i></span><span class=\"item-price\">"+item_status+"</span><span class=\"item-price\"><small></small></span></div><div class=\"card-reveal thumbs\"><div class=\"card-title grey-text text-darken-4\"><span class=\"card-reveal-listing-type-span\">"+listing_type+"</span> <span class=\"close-reveal-span\"><i class=\"material-icons right\">close</i></span></div><div class=\"row\"><div  class=\"col s12 user_actions_div\"><div  class=\"col s12 user_actions_div-holder\"><a  id='"+info.custom_id+"' class=\"btn update user_ad_action1\"><i class=\"fa fa-edit\" aria-hidden=\"true\"></i> <span>Update</span></a></div><div  class=\"col s12 user_actions_div-holder\"><a  id='"+info.custom_id+"' class=\"btn delete user_ad_action2\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i> <span>Delete</span></a></div><div  class=\"col s12  user_actions_div-holder\"><a  id='"+info.custom_id+"' class=\" btn sold user_ad_action4\"><i class=\"fa fa-cart-arrow-down\" aria-hidden=\"true\"></i> <span>Sold</span></a></div></div></div></div></div></div>";
           }
         my_ads.innerHTML += card;


        var update = document.getElementsByClassName('update');
         for(i = 0; i < update.length; i++){
           update[i].addEventListener('click', Update);
         }
        function Update(){
         var id = $(this)[0].id;
         window.location.href="/update-ad/"+id+"";
         return true;
        }

       var sold = document.getElementsByClassName('sold');
        for(i = 0; i < sold.length; i++){
          sold[i].addEventListener('click', Sold);
        }
      function Sold(){
         var id = $(this)[0].id;
         swal({
           title:"CONGRATULATIONS!!!",
           text:"Please confirm your action",
           type: "success",
           showCancelButton: true,
           confirmButtonColor: "#DD6B55",
           confirmButtonText: "Confirm",
           closeOnConfirm: true
         },
       function(){
           $.ajax({
            url:"../sold-ad",
            timeout:200000,
            type:"POST",
            data:{ad_id:id},
            success:function(data){
              Materialize.toast(data,5000,'rounded');
              location.reload();
             },
            error:function (data){
             Materialize.toast("Unknown error has occurred, please try again.",5000,'rounded');
            }
         });
        });
       }

      var _delete = document.getElementsByClassName('delete');
      for(i = 0; i < _delete.length; i++){
         _delete[i].addEventListener('click', Delete);
        }
      function Delete(){
        var id = $(this)[0].id;
        swal({
          title:"WARNING",
          text:"Do you really want to delete this ad?",
          type: "warning",
          showCancelButton:true,
          confirmButtonColor:"#DD6B55",
          confirmButtonText:"Yes",
          closeOnConfirm: true
        },
     function(){
          $.ajax({
           url: "../delete-ad",
           timeout:200000,
           type: "POST",
           data:{ad_id:id},
           success:function(data){
             Materialize.toast(data,5000,'rounded');
             location.reload();
            },
           error:function (data) {
            Materialize.toast("Unknown error has occurred, please try again.",5000,'rounded');
           }
        });
        });
       }
      //layout Masonry after each image loads
      var $grid = $('#my_ads').masonry({
        itemSelector:'.card',
        columnWidth:'.shop-mason-item',
        percentPosition: true
      });
      $grid.imagesLoaded().progress(function(){
      $grid.masonry('reloadItems');
      $grid.masonry('layout');
      })

   /*===========================================================================
       Changing item image sources on timeout to help make the page load faster
    ============================================================================= */
  setTimeout(function(){
      for(var i=j=0; i < info_.length && j < image.length; i++, j++){
         $("#"+image[j].id).attr("src","../images/user-submitted/thumb/"+image[j].images);
         $("#"+image[j].id).removeClass('blur').addClass('noblur');
       }
     var $grid = $('#my_ads').masonry({
       itemSelector:'.card',
       columnWidth:'.shop-mason-item',
       percentPosition: true
     });
     $grid.imagesLoaded().progress(function(){
     $grid.masonry('reloadItems');
     $grid.masonry('layout');
     })
    },2500)

     },
    error:function(data){
      alert(data.message);
     }
    });
  </script>
  <?php }else{
     echo "<div style='height:170px; margin-top:130px;  font-size:18px;'class=\"center-align\">
     You haven't publish any ad yet.
     <br/>
     <i  style=\"font-size:30px\" class=\"fa fa-buysellads\" aria-hidden=\"true\"></i>
     </div>";
   }?>
 <?php } else if($Checkstatus === 'shop'){ ?>
  <input  type="hidden" value="<?php echo $shop_owner_id; ?>" id="shop_id" />
  <script type="text/javascript">

    /*=============================================================
                Loading Owner Items with javascript
    =============================================================== */

     let shop = document.getElementById('shop_id').value;
     let my_ads = document.getElementById('shop_ads');
     let loading = document.getElementById('loading_spinner');
     let offset = 0;
     let card = "";
     let working = true; // for scroll function
     let listing_type = "";
     $.ajax({
        url:"../Load_shop_ads",
        type:"POST",
        data:{user_id:shop},
        timeout:20000,
        success:function(data){
          loading.innerHTML = "";
          offset += 20;
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

        switch(info.listing_type){
           case 'Sell':
               listing_type = "For Sale";
               break;
           case "Swap or Sell":
               listing_type = "Swap or Sell";
               break;
           case "Job_Offer":
               listing_type = "Job Offer";
               break;
           case "Swap":
               listing_type = "For Swap";
               break;
           case "Rent":
               listing_type = "For Rent";
               break;
           case "Job_Seeking":
               listing_type = "Job Search";
               break;
           default:
              listing_type = "Error";
            }

           if(time =="" || time ==" "){
             card +="<div class=\"col l5 xl4\"><div class='thumbs card shop-mason-item'><div  class='card-image'><a href='../item/"+info.uri+"'><img id="+img.id+" class=\"blur\"  src='../images/user-submitted/thumb/xs/"+img.images+"'  alt=\""+info.title+"\" style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a href='../item/"+info.uri+"'>"+info.title+"</a></p><span class='item-price'>₵ "+formatPrice+"</span></div></div></div>";
           }else{
             card +="<div class=\"col l5 xl4\"><div class='thumbs card shop-mason-item'><div  class='card-image'><a href='../item/"+info.uri+"'><img id="+img.id+" class=\"blur\" src='../images/user-submitted/thumb/xs/"+img.images+"'  alt=\""+info.title+"\"  style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a href='../item/"+info.uri+"'>"+info.title+"</a></p><span class='item-price'>₵ "+formatPrice+"<small  class='time_stamp'  style='float:right; padding-top:4px; text-align:right;'><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> "+time+"</small></span></div></div></div>";
           }}
           my_ads.innerHTML += card;
           card = "";
          //layout Masonry after each image loads
          var $grid = $('#my_ads').masonry({
           itemSelector:'.card',
           columnWidth:'.shop-mason-item',
           percentPosition: true
          });
          $grid.imagesLoaded().progress(function(){
          $grid.masonry('reloadItems');
          $grid.masonry('layout');
         })

         /*===========================================================================
             Changing item image sources on timeout to help make the page load faster
          ============================================================================= */
      setTimeout(function(){
        for(var i=j=0; i < info_.length && j < image.length; i++, j++){
            $("#"+image[j].id).attr("src","../images/user-submitted/thumb/"+image[j].images);
            $("#"+image[j].id).removeClass('blur').addClass('noblur');
          }
       var $grid = $('#my_ads').masonry({
          itemSelector:'.card',
          columnWidth:'.shop-mason-item',
          percentPosition: true
       });
       $grid.imagesLoaded().progress(function(){
       $grid.masonry('reloadItems');
       $grid.masonry('layout');
       })
      },2500)

    setTimeout(function(){
           working = false;
         },10000);
        },
      error:function(data){
        alert(data.message);
       }
    });

    //Loading more Shop ads on scroll
    let scroll_card = "";
    window.onscroll = function(ev){
     if((window.innerHeight + window.scrollY) >= document.body.scrollHeight - 100){
        if(working === false && offset >= 20){
        working = true;
        Materialize.toast("Loading new ads, please wait...",3000);
         $.ajax({
          url:"../Load_shop_ads_offset",
          type:"POST",
          data:{user_id:shop,offset:offset},
          timeout:20000,
          success:function(data){
           if(data.length > 0){
            offset += 15;
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
         switch(info.listing_type){
            case 'Sell':
                listing_type = "For Sale";
                break;
            case "Swap or Sell":
                listing_type = "Swap or Sell";
                break;
            case "Job_Offer":
                listing_type = "Job Offer";
                break;
            case "Swap":
                listing_type = "For Swap";
                break;
            case "Rent":
                listing_type = "For Rent";
                break;
            case "Job_Seeking":
                listing_type = "Job Search";
                break;
                default:
                   listing_type = "Error";
              }
             if(time =="" || time ==" "){
               card +="<div class=\"col l5 xl4\"><div class='thumbs card shop-mason-item'><div  class='card-image'><a href='../item/"+info.uri+"'><img id="+img.id+" class=\"blur\" src='../images/user-submitted/thumb/"+img.images+"'  alt=\""+info.title+"\" style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a href='../item/"+info.uri+"'>"+info.title+"</a></p><span class='item-price'>₵ "+formatPrice+"</span></div></div></div>";
             }else{
               card +="<div class=\"col l5 xl4\"><div class='thumbs card shop-mason-item'><div  class='card-image'><a href='../item/"+info.uri+"'><img id="+img.id+" class=\"blur\"  src='../images/user-submitted/thumb/"+img.images+"'  alt=\""+info.title+"\"  style='width:100%;'> </a><span class=\"card-title home-card\">"+listing_type+"</span></div><div class='card-content'><p class='item-title'><a href='../item/"+info.uri+"'>"+info.title+"</a></p><span class='item-price'>₵ "+formatPrice+"<small  class='time_stamp'  style='float:right; padding-top:4px; text-align:right;'><i class=\"fa fa-clock-o\" aria-hidden=\"true\"></i> "+time+"</small></span></div></div></div>";
             }}
             my_ads.innerHTML += card;
             card = ""; // clearing varible to prevent duplicate ad loads
            //layout Masonry after each image loads
            var $grid = $('#my_ads').masonry({
             itemSelector:'.card',
             columnWidth:'.shop-mason-item',
             percentPosition: true
            });
            $grid.imagesLoaded().progress(function(){
            $grid.masonry('reloadItems');
            $grid.masonry('layout');
            })

           /*===========================================================================
               Changing item image sources on timeout to help make the page load faster
            ============================================================================= */
        setTimeout(function(){
          for(var i=j=0; i < info_.length && j < image.length; i++, j++){
              $("#"+image[j].id).attr("src","../images/user-submitted/thumb/"+image[j].images);
              $("#"+image[j].id).removeClass('blur').addClass('noblur');
            }
         var $grid = $('#my_ads').masonry({
            itemSelector:'.card',
            columnWidth:'.shop-mason-item',
            percentPosition: true
         });
          $grid.imagesLoaded().progress(function(){
          $grid.masonry('reloadItems');
          $grid.masonry('layout');
          })
        },2500)

      setTimeout(function(){
        working = false;
        },10000);
     }else{
        Materialize.toast("Sorry,no ad was found!",3000);
       }
      },
       error:function (data){
         Materialize.toast("Ads loading timeout, please reload the page!",3000);
          }
         });
       }} else if($(window).width() > 950){
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
       }}
      };
    </script>
   <?php } ?>
    <!-- Userid stored in hidden textfield for reference in the custom.js file -->
    <input type="hidden" id="user_id_" value="<?php echo @$user_id;?>"/>
   </div>
 </div>
  <!-- All ads content ends here-->
  <!-- User likes content starts here-->
 <div id="user_likes" class="s12 likes-content  likes-content_disp1">
   <?php
   if($userLikes != null || count($userLikes) > 0 || $userLikes != ''){
   foreach($userLikes as $userLike){
     $ads = App::get('database')->fetchAdsinfo($userLike->ad_id);
     foreach($ads as $ad){
      $likeImages = App::get('database')->singleImage($userLike->ad_id);
      $valueFormat = number_format_drop_zero_decimals($ad->value, 2);
      foreach($likeImages as $likeImage){}
        $type = '';
        if($ad->listing_type == 'Sell'){
          $type = 'For Sale';
        }elseif ($ad->listing_type == 'Swap') {
          $type = 'For Swap';
        }else if($ad->listing_type == 'Swap or Sell'){
          $type = $ad->listing_type;
        }elseif ($ad->listing_type == 'Job_Offer' || $ad->listing_type == 'Job_Offere'){
          $type = 'Job Offer';
        }elseif ($ad->listing_type == 'Rent') {
          $type = 'For Rent';
        }elseif ($ad->listing_type == 'Job_Seeking'){
          $type = 'Job Search';
        }
         echo "<div class='col s6 m6 l4 xl3'>
         <div class='thumbs card'>
          <div class='card-image'>
          <a href='../item/$ad->uri'><img src='../images/user-submitted/thumb/$likeImage->images' style='width:100%; height:120px;'></a>
          </div>
          <div class='card-content'>
            <p class='item-title'><a href='../item/$ad->uri'>$ad->title</a></p>
            <span class='item-price'>₵ $valueFormat<small style='font-size:13px; float:right; padding-top:4px; color:#95989A; text-align:right;'>$type</small></span>
          </div>
        </div>
        </div>
       ";
     }
   }
 }else {
   echo "<div style='height:170px; margin-top:130px;  font-size:18px;'class=\"center-align\">
   You haven't liked any ad yet.
   <br>
   <i  style=\"font-size:30px\" class=\"fa fa-thumbs-up\" aria-hidden=\"true\"></i>
   </div>";
 }?>
 </div>
 <!-- User likes content ends here-->
 <!-- User ad statistics content starts here-->
 <div id="statistics" class="s12 m12 l12 xl12 statistics_disp1">
 <div class="col s12 m12 l6 xl6 user_ad-overview  statics-divs-wrapper  ad-tracker-div">
   <div class="card">
    <span>Ad(s) Views Tracker</span>
    <div class="ad_over-view x_panel">
     <table class="striped ads-overview_table">
        <thead>
          <tr>
            <th>Ad Image</th>
            <th>Viewer</th>
            <th>Date</th>
            <th>Mobile</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
         <?php if($viewsTracker > 0 || $viewsTracker != null || $viewsTracker != ''):?>
         <?php foreach($viewsTracker as $viewsTracker_):?>
          <?php if($viewsTracker_->user_id != null && $viewsTracker_->user_id > 0):?>
         <?php $Ad_image = App::get('database')->query('SELECT `images` FROM `images` WHERE ad_id=:ad_id LIMIT 0,1', array(':ad_id'=>$viewsTracker_->ad_id));?>
          <?php foreach($Ad_image as $ad_image){}?>
          <?php $Viewer_fname = App::get('database')->query('SELECT `fname` FROM `users` WHERE id=:id', array(':id'=>$viewsTracker_->user_id));?>
           <?php foreach($Viewer_fname as $viewer_fname){}?>
          <tr>
            <td><img src="../images/user-submitted/thumb/xs/<?php echo $ad_image[0];?>" alt="<?php echo $viewer_fname[0];?>"/></td>
            <td><?php echo $viewer_fname[0];?></td>
            <td><?php $time = strtotime($viewsTracker_->datetime); echo $mytimeFormat = date("d M Y", $time);?></td>
            <td><a class="btn-floating btn-small" onClick="callViewer(<?php echo $viewsTracker_->user_id;?>)" href="#"><i class=" material-icons">phone</i></a></td>
            <td><a class="btn-floating btn-small  red darken-3" onClick="updateViewer(<?php echo $viewsTracker_->user_id;?>,<?php echo $viewsTracker_->ad_id;?>)" href="#"><i class=" material-icons">delete</i></a></td>
          </tr>
        <?php endif;?>
        <?php endforeach;?>
        <?php endif;?>
    <script type="text/javascript">
      function callViewer(user_id){
        //Call validation button
        Materialize.toast("Please wait...",1000);
        $.ajax({
           url:"../get-views-tracker-mobile",
           timeout:200000,
           type:"POST",
           data:{viewer_id:user_id
        },success:function(data){
           $("#contact-owner").val(data);
           $('#contact_info').modal('open');
        },error:function(data){
           alert(data.message)
          }});
        }

     function updateViewer(user_id,ad_id){
        //Call validation button
        Materialize.toast("Please wait...",1000);
        $.ajax({
         url:"../update-views-tracker",
         timeout:200000,
         type:"POST",
         data:{viewer_id:user_id,ad_id:ad_id
        },success:function(data){
          if(data === "done"){
             location.reload();
           }else{
             alert(data);
           }
        },error:function(data){
             alert(data.message)
            }
          });
        }
      </script>
       </tbody>
      </table>
    </div>
   </div>
  </div>
 <div class="col s12 m12 l6 xl6 user_ad-views  statics-divs-wrapper">
   <div class="card">
    <span>Ad(s) Views Line Chart</span>
   <div class="x_panel z-depth-1">
      <div class="x_content">
        <canvas id="lineChart"></canvas>
      </div>
   </div>
  </div>
 </div>
 <div class="col s12 m12 l6 xl6 user_ad-overview  statics-divs-wrapper">
    <div class="card">
     <span>Ad(s) Stats Breakdown</span>
     <div class="ad_over-view x_panel z-depth-1">
      <table class="striped ads-overview_table">
         <thead>
           <tr>
             <th>Ad title</th>
             <th>Views</th>
             <th>Status</th>
           </tr>
         </thead>
         <tbody>
          <?php if($userads > 0 || $userad != null || $userad != ''):?>
          <?php foreach($userads as $userad):?>
          <?php
             $_status = '';
             if($userad->status == '0'){
              $_status = 'Pending';
             }elseif ($userad->status == '1'){
              $_status = 'Active';
             }elseif ($userad->status == '2'){
              $_status = 'Sold';
             }
           ?>
          <?php $adsSum = App::get('database')->query('SELECT SUM(ad_views) FROM `views` WHERE poster_id=:id AND ad_id=:ad_id', array(':id'=>$userad->user_id,':ad_id'=>$userad->custom_id));?>
           <?php foreach ($adsSum as $sum) {
           }
           ?>
           <tr>
             <td><?php echo $userad->title;?></td>
             <td><?php echo $sum[0];?></td>
             <td><?php echo $_status;?></td>
           </tr>
          <?php endforeach; ?>
         <?php endif; ?>
         </tbody>
       </table>
     </div>
    </div>
  </div>
<div class="col s12 m12 l6 xl6 user_ad-views  statics-divs-wrapper">
  <div class="card">
   <span>Ad(s) Likes Bar Chart</span>
  <div class="x_panel z-depth-1">
     <div class="x_content">
       <canvas id="mybarChart"></canvas>
     </div>
  </div>
 </div>
</div>

 <div  class="col s12 m12 l6 xl6 user_all_ads-stats  statics-divs-wrapper">
   <div class="card">
    <span>Ad(s) Categories Pie Chart</span>
    <div class="x_panel z-depth-1">
      <div class="x_content">
        <canvas id="pieChart"></canvas>
      </div>
    </div>
  </div>
  </div>
 </div>
<!-- Settings Div tab -->
 <div id="setting" class="s12  settings_disp1">
  <?php
  if($user_id > 0){
  $userInfo = App::get('database')->userInfo($user_id);
  foreach ($userInfo as $userInfo_) {}
  }
  ?>
 <div class="col s12 m12 l6 xl6">
  <div class="user_update-info-div z-depth-1">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s12">
          <input id="user_first_name"  value="<?php echo @$userInfo_->fname;?>" type="text" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s12">
          <input id="user_last_name" value="<?php echo @$userInfo_->lname;?>" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
        <div class="input-field col s12">
          <input id="user_mobile" value="<?php echo @$userInfo_->mobile;?>" type="number" class="validate">
          <label for="user_mobile">Mobile</label>
        </div>
        <div class="input-field col s12">
          <input id="user_email" value="<?php echo @$userInfo_->email;?>" type="email" class="validate">
          <label for="user_email">E-mail</label>
        </div>
      </div>
      <div class="upadte_name-info-btndiv">
        <a  class="btn blue"  id="update_info-btn">Save update</a>
      </div>
    </form>
  </div>
  <?php
  if($user_id > 0){
   $notifications = App::get('database')->checkNotifications($user_id);
   if(count($notifications) > 0){
        foreach ($notifications as $notification) {}
        $device = '';
        $approved = '';
        $unread = '';
        $general = '';
        if($notification->unknown_device_logins == 1){
          $device = 'checked';
        }else {
          $device = '';
        }
        if($notification->approved_ads == 1){
          $approved = 'checked';
        }else {
          $approved = '';
        }
        if($notification->chat_notifications == 1){
           $unread = 'checked';
        }else {
          $unread = '';
        }
        if($notification->general_notifications == 1){
          $general = 'checked';
        }else {
          $general = '';
        }
    }else{
      $device =   'checked';
      $approved = 'checked';
      $unread =   'checked';
      $general =  'checked';
    }
  }
  ?>
  <div class="notifications_div z-depth-1">
    <label id="notif">Notifications</label>
    <div  class="col s12">
    <div class="switch">
     <span id="switch_title">New device logins</span>
     <label>
      Off
     <input   id="new_device"  type="checkbox"  <?php echo @$device;?>>
     <span class="lever"></span>
     On
     </label>
    </div>
  </div>
  <div  class="col s12">
    <div class="switch">
     <span id="switch_title">Approved ads</span>
     <label>
      Off
     <input  id="approved_ads"  type="checkbox"  <?php echo @$approved;?>>
     <span class="lever"></span>
     On
     </label>
    </div>
  </div>
  <div  class="col s12">
    <div class="switch">
           <span id="switch_title">Unread chat messages</span>
         <label id="lever">
          Off
         <input   id="unread_chats"  type="checkbox"  <?php echo @$unread;?>>
         <span class="lever"></span>
         On
         </label>
    </div>
  </div>
  <div  class="col s12">
    <div class="switch">
     <span id="switch_title">General notifications</span>
     <label>
      Off
     <input   id="general_notif"  type="checkbox"  <?php echo @$general;?>>
     <span class="lever"></span>
     On
     </label>
    </div>
    <div class="save-btn_div">
     <a  class="btn blue"  id="notification_btn"><i id="notifications_spinner" class="fa"  aria-hidden="true"></i><span id="notif-btn_interhtml">Save changes</span></a>
   </div>
   </div>
  </div>
 </div>
<div class="col s12 m12 l6 xl6">
  <?php if($user_id > 0):?>
  <?php
  $default = 'personal';
  $checked_personal = '';
  $checked_business = '';

  @$user_account_type = App::get('database')->query('SELECT * FROM  account_types  WHERE user_ref=:user_ref', array(':user_ref'=>$user_id))[0]['account_type'];
  if($user_account_type != ''){
    $default = $user_account_type;
  }
  if($user_account_type == 'personal'){
    $checked_personal = 'checked';
  }else if($user_account_type == 'business'){
    $checked_business = 'checked';
  }else{
    $checked_personal = 'checked';
  }
  ?>
  <div class="user_accountype_div z-depth-1">
    <div  id="account_type_lab"><label>Account type</label></div>
   <div class="row">
    <div  class="col s6">
     <input class="with-gap" name="group1" type="radio" id="personal" <?php echo @$checked_personal;?>/>
     <label for="personal">Personal account</label>
   </div>
   <div  class="col s6">
    <input class="with-gap"  name="group1" type="radio" id="business" <?php echo @$checked_business;?> />
    <label for="business">Business account</label>
  </div>
 </div>
  <div class="save-btn_div">
   <a  class="btn blue"  id="change_account_type-btn"><i id="accounttype_spinner" class="fa"  aria-hidden="true"></i>Save changes</a>
 </div>
</div>

<?php @$businessInfos = App::get('database')->fetchbusinessInfo($user_id);?>
<input type="hidden"  id="account_value-hidden"  value="<?php echo $default;?>" />
<?php if(count($businessInfos) > 0){?>
<?php foreach ($businessInfos as $businessInfo):?>
<div class="business-info_div  bussines_hidden z-depth-1">
  <label id="bussiness_lab">Business Info</label>
  <div class="input-field col s12">
    <input id="busi-name"  type="text" class="validate" value="<?php echo @$businessInfo->business_name;?>" data-length="21">
    <label for="busi-name">Business name</label>
  </div>
  <div class="input-field col s12">
    <input id="busi-locat" type="text" class="validate" value="<?php echo @$businessInfo->business_location;?>"  data-length="80">
    <label for="busi-locat">Location</label>
  </div>
  <div class="row">
  </div>
  <div class="input-field col s6 ">
   <select  id="work-days" class="browser-default">
   <?php
    echo "<option>$businessInfo->working_days</option>";
   ?>
   <option>Monday - Friday</option>
   <option>Monday - Saturday</option>
   <option>Always Available</option>
   <option>Other</option>
   </select>
  </div>
  <div class="input-field col s6 ">
  <select  id="work-hours" class="browser-default">
  <?php
   echo"
   <option>$businessInfo->working_hours</option>
   ";
   ?>
  <option>06:00 am - 05:00 pm</option>
  <option>06:30 am - 05:30 pm</option>
  <option>07:00 am - 05:00 pm</option>
  <option>07:30 am - 05:30 pm</option>
  <option>08:00 am - 05:00 pm</option>
  <option>08:00 am - 05:30 pm</option>
  <option>24/7</option>
  <option>Other</option>
  </select>
  </div>
  <div class="input-field col s6">
    <input id="busi-contact-1" type="number" min="0"  value="<?php echo @$businessInfo->contact_1;?>" class="validate"  data-length="13">
    <label for="busi-contact-1">Contact number</label>
  </div>
  <div class="input-field col s6">
    <input id="busi-contact-2"  type="number" placeholder="optional"  value="<?php echo @$businessInfo->contact_2;?>" min="0" class="validate"  data-length="13">
    <label for="busi-contact-2">Other contact number</label>
  </div>
  <div class="input-field col s12">
    <input id="busi_email"  type="email"  value="<?php echo @$businessInfo->email_add;?>" placeholder="optional" class="validate">
    <label for="busi_email">E-mail address</label>
  </div>
  <div class="row">
  </div>
  <div class="file-field input-field banner-img col s12">
    <div class="btn blue">
      <span>Update banner image</span>
      <input  id='banner_image' type="file">
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" id="busi-img_path"  value="<?php echo @$businessInfo->banner_img;?>"  type="text">
    </div>
  </div>
  <div class="row">
  </div>
  <div class="input-field col s12 m12 l12">
    <textarea id="about-us" class="materialize-textarea" data-length="250"  placeholder="a brief description of your business"><?php echo @$businessInfo->about_us;?></textarea>
    <label for="about-us">About us</label>
  </div>
  <div class="row">
  </div>
  <div class="col s12">
    <label  id="busi-errors"></label>
    <div class="row">
    </div>
  </div>
  <div class="col s12">
    <a  class="btn blue" id="submit_busi-btn"><i id="business_spinner" class="fa"  aria-hidden="true"></i><span id="submiting_info_">Update info</span></a>
  </div>
  <div class="row">
  </div>
 </div>
</div>
<?php endforeach;?>
<?php }else { ?>
<div class="business-info_div  bussines_hidden z-depth-1">
    <label id="bussiness_lab">Business Info</label>
    <div class="input-field col s12">
      <input id="busi-name"  type="text" class="validate" data-length="21">
      <label for="busi-name">Business name</label>
    </div>
    <div class="input-field col s12">
      <input id="busi-locat" type="text" class="validate" data-length="80">
      <label for="busi-locat">Location</label>
    </div>
    <div class="row">
    </div>
    <div class="input-field col s6 ">
     <select  id="work-days" class="browser-default">
     <option value="" disabled selected>Working days</option>
     <option>Monday - Friday</option>
     <option>Monday - Saturday</option>
     <option>Always Available</option>
     <option>Other</option>
     </select>
    </div>
    <div class="input-field col s6 ">
    <select  id="work-hours" class="browser-default">
    <option value="" disabled selected>Working hours</option>
    <option>06:00 am - 05:00 pm</option>
    <option>06:30 am - 05:30 pm</option>
    <option>07:00 am - 05:00 pm</option>
    <option>07:30 am - 05:30 pm</option>
    <option>08:00 am - 05:00 pm</option>
    <option>08:00 am - 05:30 pm</option>
    <option>24/7</option>
    <option>Other</option>
    </select>
    </div>
    <div class="input-field col s6">
      <input id="busi-contact-1" type="number" min="0"  class="validate"  data-length="13">
      <label for="busi-contact-1">Contact number</label>
    </div>
    <div class="input-field col s6">
      <input id="busi-contact-2"  type="number" placeholder="optional" min="0" class="validate"  data-length="13">
      <label for="busi-contact-2">Other contact number</label>
    </div>
    <div class="input-field col s12">
      <input id="busi_email"  type="email"  placeholder="optional" class="validate">
      <label for="busi_email">E-mail address</label>
    </div>
    <div class="row">
    </div>
    <div class="file-field input-field banner-img col s12">
      <div class="btn blue">
        <span>Upload banner image</span>
        <input  id='banner_image' type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" id="busi-img_path"   type="text">
      </div>
    </div>
    <div class="row">
    </div>
    <div class="input-field col s12 m12 l12">
      <textarea id="about-us" class="materialize-textarea" data-length="250"  placeholder="a brief description of your business"></textarea>
      <label for="about-us">About us</label>
    </div>
    <div class="row">
    </div>
    <div class="col s12">
      <label  id="busi-errors"></label>
      <div class="row">
      </div>
    </div>
    <div class="col s12">
      <a  class="btn blue" id="submit_busi-btn"><i id="business_spinner" class="fa"  aria-hidden="true"></i> <span id="submiting_info_">Submit info</span></a>
    </div>
    <div class="row">
    </div>
    </div>
<?php }?>
</div>
<?php endif; ?>
 </div>
</div>
</div>
 </div>
 </div>
 <!-- Modals goes here -->
 <?php require ('partials/modals.php'); ?>
 <!-- PC footer goes HERE -->
 <?php require ('partials/footer.php'); ?>
 <!-- javascript footer goes here -->
 <script type="text/javascript">
 if($(window).width() < 380)
  {
   $('#bussines-info-wrapper').removeClass('s8').addClass('s12')
  }else{
    $('#bussines-info-wrapper').removeClass('s12').addClass('s8')
  }
 </script>
 <input  id="device_type" type="hidden" value="<?php echo deviceDetector();?>"  />

 <script type="text/javascript" src="../js/javascript-combination-4.js"></script>

 <script type="text/javascript">
  let device_type = document.getElementById('device_type').value;
  if(device_type === "Computer"){
  $(".shop_shares").jsSocials({
    url:"https://www.yenswape.com<?php echo $get_uri;?>",
    text:"<?php echo $message;?>",
    shareIn: "popup",
    showLabel: false,
    showCount: false,
    shares:["twitter", "facebook", "googleplus"]
  });
 }else if(device_type === "Mobile" || device_type === "Tablet"){
   $(".shop_shares").jsSocials({
     url:"https://www.yenswape.com<?php echo $get_uri;?>",
     text:"<?php echo $message;?>",
     shareIn: "popup",
     showLabel: false,
     showCount: false,
     shares: ["whatsapp","twitter", "facebook", "googleplus"]
   });
  }

  //Goto top button
$('.btn-floating').click(function(){
  $('body,html').animate({ scrollTop: 0, }, 700);
})
 </script>
 </body>
 </html>
