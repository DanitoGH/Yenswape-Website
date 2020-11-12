<?php
//Required classes
require 'controllers/UsersController.php';
require 'controllers/PagesController.php';
require 'core/App.php';
require 'core/Router.php';
require 'core/Request.php';
require 'core/database/QueryBuilder.php';
require 'core/database/Connection.php';
require 'views/partials/Mobile_Detect.php';
// require 'views/auto-approve.php';
//end  of Required classes

App::bind('config',  require 'config.php');
$config = App::get('config');

//Connecting databse to the Query builder
App::bind('database', new QueryBuilder(
  Connection::make(App::get('config')['database'])
));

// Making view redenring dsynamic
function  view($name, $data = [])
{
  extract($data);
  return require "views/{$name}.view.php";
}

// Redirecting to a pge after performing an operation
 function redirect($path){
  // header("Location: /{$path}");
 }

 // checking for mobile,tablet and computer
 // using mobile dectect.php library
 function  deviceDetector(){
  $detect = new Mobile_Detect;
  $mobile = $detect->isMobile();
  $tablet = $detect->isTablet();

  if($mobile == true){
   return "Mobile";
  }elseif($tablet == true){
   return "Tablet";
  }elseif ($mobile != true && $tablet != true){
   return "Computer";
  }
 }

 function detectMobilebrand()
  {
  $detect = new Mobile_Detect;
  $iPhone = $detect->isiPhone();
  $BlackBerry = $detect->isBlackBerry();
  $HTC = $detect->isHTC();
  $Nexus = $detect->isNexus();
  $Dell = $detect->isDell();
  $Motorola = $detect->isMotorola();
  $Samsung = $detect->isSamsung();
  $LG = $detect->isLG();
  $Sony = $detect->isSony();
  $Asus = $detect->isAsus();
  $NokiaLumia = $detect->isNokiaLumia();
  $Micromax = $detect->isMicromax();
  $Palm = $detect->isPalm();
  $Alcatel = $detect->isAlcatel();
  $Nintendo = $detect->isNintendo();
  $iPad = $detect->isiPad();
  $NexusTablet = $detect->isNexusTablet();
  $SamsungTablet = $detect->isSamsungTablet();
  $Kindle = $detect->isKindle();
  $SurfaceTablet = $detect->isSurfaceTablet();
  $HPTablet = $detect->isHPTablet();
  $AsusTablet = $detect->isAsusTablet();
  $BlackBerryTablet = $detect->isBlackBerryTablet();
  $HTCtablet = $detect->isHTCtablet();
  $MotorolaTablet = $detect->isMotorolaTablet();
  $AcerTablet = $detect->isAcerTablet();
  $ToshibaTablet  = $detect->isToshibaTablet();
  $LGTablet = $detect->isLGTablet();
  $FujitsuTablet = $detect->isFujitsuTablet();
  $LenovoTablet = $detect->isLenovoTablet();
  $DellTablet = $detect->isDellTablet();
  $HuaweiTablet = $detect->isHuaweiTablet();
  $VodafoneTablet = $detect->isVodafoneTablet();
  $NecTablet = $detect->isNecTablet();
  $NokiaLumiaTablet = $detect->isNokiaLumiaTablet();
  $SonyTablet = $detect->isSonyTablet();
  $PhilipsTablet = $detect->isPhilipsTablet();
  $TeclastTablet = $detect->isTeclastTablet();
  $BlaupunktTablet = $detect->isBlaupunktTablet();
  $HisenseTablet = $detect->isHisenseTablet();

  if($iPhone == true){
    return 'iPhone';
  }else if($BlackBerry == true) {
    return 'BlackBerry';
  }elseif ($HTC == true) {
    return 'HTC';
  }elseif ($Dell == true) {
    return 'Dell';
  }elseif ($Motorola == true) {
    return 'Motorola';
  }elseif ($Samsung == true) {
    return 'Samsung';
  }elseif ($Nexus == true) {
    return 'Nexus';
  }elseif ($LG == true) {
    return 'LG';
  }elseif ($Sony == true) {
    return 'Sony';
  }elseif ($Asus == true) {
    return 'Asus';
  }elseif ($NokiaLumia == true) {
    return 'Nokia Lumia';
  }elseif ($Micromax == true) {
    return 'Micromax';
  }elseif ($Palm == true) {
    return 'Palm';
  }elseif ($Alcatel == true) {
    return 'Alcatel';
  }elseif ($Nintendo == true) {
    return 'Nintendo';
  }elseif ($iPad == true) {
    return 'iPad';
  }elseif ($NexusTablet == true) {
    return 'Nexus Tablet';
  }elseif ($SamsungTablet == true) {
    return 'Samsung Tablet';
  }elseif ($SurfaceTablet == true) {
    return 'Surface Tablet';
  }elseif ($HPTablet == true) {
    return 'HP Tablet';
  }elseif ($AsusTablet == true) {
    return 'Asus Tablet';
  }elseif ($BlackBerryTablet == true) {
    return 'BlackBerry Tablet';
  }elseif ($HTCtablet == true) {
    return 'HTC tablet';
  }elseif ($MotorolaTablet == true) {
    return 'Motorola Tablet';
  }elseif ($AcerTablet == true) {
    return 'Acer Tablet';
  }elseif ($ToshibaTablet == true) {
    return 'Toshiba Tablet';
  }elseif ($LGTablet == true) {
    return 'LG Tablet';
  }elseif ($FujitsuTablet == true) {
    return 'Fujitsu Tablet';
  }elseif ($LenovoTablet == true) {
    return 'Lenovo Tablet';
  }elseif ($DellTablet == true) {
    return 'Dell Tablet';
  }elseif ($HuaweiTablet == true) {
    return 'Huawei Tablet';
  }elseif ($VodafoneTablet == true) {
    return 'Vodafone Tablet';
  }elseif ($NecTablet == true) {
    return 'Nec Tablet';
  }elseif ($NokiaLumiaTablet == true) {
    return 'Nokia Lumia Tablet';
  }elseif ($SonyTablet == true) {
    return 'Sony Tablet';
  }elseif ($PhilipsTablet == true) {
    return 'Philips Tablet';
  }elseif ($TeclastTablet == true) {
    return 'Teclast Tablet';
  }elseif ($BlaupunktTablet== true) {
    return 'Blaupunkt Tablet';
  }elseif ($HisenseTablet == true) {
    return 'Hisense Tablet';
  }else {
    return 'Unknown brand';
  }
}


 function detectOS()
  {
  $detect = new Mobile_Detect;
  $AndroidOS = $detect->isAndroidOS();
  $BlackBerryOS = $detect->isBlackBerryOS();
  $PalmOS = $detect->isPalmOS();
  $SymbianOS = $detect->isSymbianOS();
  $WindowsMobileOS = $detect->isWindowsMobileOS();
  $WindowsPhoneOS = $detect->isWindowsPhoneOS();
  $iOS = $detect->isiOS();
  $MeeGoOS = $detect->isMeeGoOS();
  $JavaOS = $detect->isJavaOS();
  $webOS = $detect->iswebOS();
  $badaOS = $detect->isbadaOS();
  $BREWOS = $detect->isBREWOS();

  if ($AndroidOS == true) {
    return 'Android OS';
  }elseif ($BlackBerryOS == true) {
    return 'BlackBerry OS';
  }elseif ($PalmOS == true) {
    return 'Palm OS';
  }elseif ($SymbianOS == true) {
    return 'Symbian OS';
  }elseif ($WindowsMobileOS == true) {
    return 'Windows Mobile OS';
  }elseif ($WindowsPhoneOS == true) {
    return 'Windows Phone OS';
  }elseif ($iOS == true) {
    return 'iOS';
  }elseif ($MeeGoOS == true) {
    return 'MeeGo OS';
  }elseif ($JavaOS == true) {
    return 'Java OS';
  }elseif ($webOS == true) {
    return 'web OS';
  }elseif ($badaOS == true) {
    return 'bada OS';
  }elseif ($BREWOS == true) {
    return 'BREW OS';
  }else {
    return 'Windows';
  }
}


function detectBrowsers()
  {
  $detect = new Mobile_Detect;
  $Chrome = $detect->isChrome();
  $Dolfin = $detect->isDolfin();
  $Opera  = $detect->isOpera();
  $Skyfire = $detect->isSkyfire();
  $Edge    = $detect->isEdge();
  $IE    = $detect->isIE();
  $Firefox = $detect->isFirefox();
  $Bolt  = $detect->isBolt();
  $TeaShark = $detect->isTeaShark();
  $Blazer = $detect->isBlazer();
  $Safari = $detect->isSafari();
  $UCBrowser = $detect->isUCBrowser();
  $Puffin = $detect->isPuffin();
  $Mercury = $detect->isMercury();
  $ObigoBrowser = $detect->isObigoBrowser();
  $NetFront = $detect->isNetFront();
  $GenericBrowser = $detect->isGenericBrowser();
  $PaleMoon    = $detect->isPaleMoon();

  if($Chrome == true) {
    return 'Chrome';
  }elseif ($Dolfin == true) {
    return 'Dolfin';
  }elseif ($Opera == true) {
    return 'Opera';
  }elseif ($Skyfire == true) {
    return 'Skyfire';
  }elseif ($Edge == true) {
    return 'Edge';
  }elseif ($IE == true) {
    return 'IE';
  }elseif ($Firefox == true) {
    return 'Firefox';
  }elseif ($Bolt == true) {
    return 'Bolt';
  }elseif ($TeaShark == true) {
    return 'TeaShark';
  }elseif ($Blazer == true) {
    return 'Blazer';
  }elseif ($Safari == true) {
    return 'Safari';
  }elseif ($UCBrowser == true) {
    return 'UC Browser';
  }elseif ($Puffin == true) {
    return 'Puffin';
  }elseif ($Mercury == true) {
    return 'Mercury';
  }elseif ($ObigoBrowser == true) {
    return 'Obigo Browser';
  }elseif ($NetFront == true) {
    return 'NetFront';
  }elseif ($GenericBrowser == true) {
    return 'Generic Browser';
  }elseif ($PaleMoon == true) {
    return 'Pale Moon';
  }else {
    return 'Unknown';
   }
 }

  // Job Filters (postCategory filter function)
 function postCategory($post_categs){
  if($post_categs[0] > 0){
   $post_category = array();
  foreach($post_categs  as $post_categ){
   if($post_categ == 1){
     $post_category[] = "'offered-jobs'";
   }elseif($post_categ == 2){
     $post_category[] = "'seeking-work'";
   }}
   return implode(",", $post_category); //create comma seperated array
  }else {
   return "'offered-jobs','seeking-work'"; //default
  }}


 // Job Filters (jobTypes filter function)
 function jobTypes($job_type_){
   if($job_type_[0] > 0){
     $job_types = array();
  foreach($job_type_  as $job_type){
    if($job_type == 1){
      $job_types[] = "'Full Time'";
    }elseif($job_type == 2){
      $job_types[] = "'Part Time'";
    }elseif($job_type == 3){
      $job_types[] = "'Contract'";
    }elseif($job_type == 4){
      $job_types[] = "'Internship'";
   }}
     return implode(",", $job_types);  //create comma seperated array
   }else{
     return "'Full Time','Part Time','Contract','Internship'"; //default
   }
 }

 //Job filter function
 function min_max_Exp($min_max_exp_){
  if($min_max_exp_[0] > 0){
    $min_max_Exp = array();
  foreach ($min_max_exp_ as $min_max_exp){
   if($min_max_exp == 1){
     $min_max_Exp[] = "'1'";
   }elseif ($min_max_exp == 2){
     $min_max_Exp[] = "'2'";
   }elseif ($min_max_exp == 3){
     $min_max_Exp[] = "'3'";
   }elseif ($min_max_exp == 4){
     $min_max_Exp[] = "'4'";
   }elseif ($min_max_exp == 5){
     $min_max_Exp[] = " '5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20' ";
   }}
   return implode(",", $min_max_Exp);  //create comma seperated array
  }else {
   return "'1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'";
 }}


 //Job filter function
 function bed_bath_Rooms($bed_bath_rooms){
  if($bed_bath_rooms[0] > 0){
    $bed_bath_Rooms = array();
  foreach ($bed_bath_rooms as $bed_bath_room){
   if($bed_bath_room == 1){
     $bed_bath_Rooms[] = "'1'";
   }elseif ($bed_bath_room == 2){
     $bed_bath_Rooms[] = "'2'";
   }elseif ($bed_bath_room == 3){
     $bed_bath_Rooms[] = "'3'";
   }elseif ($bed_bath_room == 4){
     $bed_bath_Rooms[] = "'4'";
   }elseif ($bed_bath_room == 5){
     $bed_bath_Rooms[] = " '5','6','7','8','9','10' ";
   }}
   return implode(",", $bed_bath_Rooms);  //create comma seperated array
  }else {
   return "'1','2','3','4','5','6','7','8','9','10'";
 }}


 // Job Filters (jobTypes filter function)
 function brokerFee($brokerfee_){
   if($brokerfee_[0] > 0){
     $broker_fee = array();
  foreach($brokerfee_ as $brokerfee){
    if($brokerfee == 1){
      $broker_fee[] = "'Yes'";
    }elseif($brokerfee == 2){
      $broker_fee[] = "'No'";
    }}
     return implode(",", $broker_fee);  //create comma seperated array
   }else{
     return "'Yes','No'"; //default
   }
 }

 //Vehicles Filter
 function carTypes($cartypes){
  if($cartypes[0] > 0){
     $car_types = array();
   foreach($cartypes as $cartype){
    if($cartype == 1){
      $car_types[] = "'2 door'";
    }elseif($cartype == 2){
      $car_types[] = "'4 door'";
    }elseif ($cartype == 3) {
      $car_types[] = "'Convertible'";
    }elseif ($cartype == 4) {
      $car_types[] = "'Van/Minivan'";
    }elseif ($cartype == 5) {
      $car_types[] = "'Sport Utility Vehicle (SUV)'";
    }elseif ($cartype == 6) {
      $car_types[] = "'Pickup truck'";
    }elseif ($cartype == 7) {
      $car_types[] = "'Other'";
    }
  }
     return implode(",", $car_types);  //create comma seperated array
   }else{
     return "'2 door','4 door','Convertible','Van/Minivan','Sport Utility Vehicle (SUV)','Sport Utility Vehicle (SUV)','Other'"; //default
   }
 }

 function carCondition($carcondtions){
   if($carcondtions[0] > 0){
     $car_condition = array();
  foreach($carcondtions as $carcondtion){
    if($carcondtion == 1){
      $car_condition[] = "'New'";
    }elseif($carcondtion== 2){
      $car_condition[] = "'Used'";
    }}
     return implode(",", $car_condition);  //create comma seperated array
   }else{
     return "'New','Used'"; //default
   }
 }

 function carTransmission($transmissons){
   if($transmissons[0] > 0){
     $car_transmisson = array();
  foreach($transmissons as $transmisson){
    if($transmisson == 1 ){
      $car_transmisson[] = "'Automatic'";
    }elseif($transmisson == 2 ){
      $car_transmisson[] = "'Manual'";
    }elseif ($transmisson == 3) {
      $car_transmisson[] = "'Automated Manual'";
    }elseif ($transmisson == 4) {
      $car_transmisson[] = "'Other'";
    }
  }
     return implode(",", $car_transmisson);  //create comma seperated array
   }else{
     return "'Automatic','Manual','Automated Manual','Other'"; //default
   }
 }

//Getting visitors IP
function getIp(){
   $ip = $_SERVER['REMOTE_ADDR'];
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
       $ip = $_SERVER['HTTP_CLIENT_IP'];
   } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
   }
   return $ip;
 }

function isLoggedIn()
  {
   if(isset($_COOKIE['SNID'])){
     if (App::get('database')->query('SELECT user_id  FROM  login_tokens WHERE token=:token',array(':token'=>sha1($_COOKIE['SNID'])))){
            $userid = App::get('database')->query('SELECT user_id  FROM  login_tokens WHERE token=:token',array(':token'=>sha1($_COOKIE['SNID'])))[0]['user_id'];
             if (isset($_COOKIE['SNID_'])){
                return $userid;
                 }
            else {
                 $cstrong = True;
                 $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                 App::get('database')->query('INSERT INTO login_tokens VALUES (id, :token, :user_id)', array(':token'=>sha1($token),':user_id'=>$userid));
                 App::get('database')->query('DELETE FROM login_tokens WHERE token=:token', array(':token'=>sha1('SNID')));
                 }
               }
    }
    return false;
  }

  //Website Traffic Counts
  function countVisitors(){
    $device = deviceDetector();
    $brand = detectMobilebrand();
    $os = detectOS();
    $browser = detectBrowsers();
    $ip = getIp();
    $results = App::get('database')->visitorsCounts();
    if($results > 0){
    if(isLoggedIn()){
       $visits_results = App::get('database')->query('SELECT `user_count` FROM `visitors` WHERE user_ref=:userid', array(':userid'=>isLoggedIn()))[0]['user_count'];
       if(count($visits_results) > 0){
        App::get('database')->query('UPDATE `visitors` SET user_count=:count,ip=:new_ip,datetime=:new_datetime  WHERE  user_ref=:user', array(':count'=>$visits_results + 1,':new_ip'=>ip2long($ip),':new_datetime'=>date('Y-m-d H:i:s'),'user'=>isLoggedIn()));
       }else{
        App::get('database')->query('INSERT INTO  `visitors`  VALUES (id,:device,:brand,:OS,:browser,:ip,:user_ref,user_count,:datetime)',
        array(':device'=>$device,':brand'=>$brand,':OS'=>$os,':browser'=>$browser,':ip'=>ip2long($ip),':user_ref'=>isLoggedIn(),':datetime'=>date('Y-m-d H:i:s')));
      }
     }else{
      /*  Uncomment this block of code only on live server   */
      //  $visitor_results = App::get('database')->query('SELECT `user_count` FROM `visitors` WHERE ip=:user_ip', array(':user_ip'=>ip2long($ip)))[0]['user_count'];
      //  $visitor_id = App::get('database')->query('SELECT `id` FROM `visitors` WHERE ip=:user_ip', array(':user_ip'=>ip2long($ip)))[0]['id'];
      //  if(count($visitor_results) > 0){
      //   App::get('database')->query('UPDATE `visitors` SET user_count=:count,ip=:new_ip,datetime=:new_datetime WHERE id=:visitor', array(':count'=>$visitor_results + 1,':new_ip'=>ip2long($ip),':new_datetime'=>date('Y-m-d H:i:s'),'visitor'=>$visitor_id));
      //  }else{
      //   App::get('database')->query('INSERT INTO  `visitors`  VALUES (id,:device,:brand,:OS,:browser,:ip,user_ref,user_count,:datetime)',
      //   array(':device'=>$device,':brand'=>$brand,':OS'=>$os,':browser'=>$browser,':ip'=>ip2long($ip),':datetime'=>date('Y-m-d H:i:s')));
      // }
     }
   }
 }

  //Ads Views Counts
  function countViews($poster_id,$ad_id){
    if(isLoggedIn()){
       @$views_results = App::get('database')->query('SELECT `ad_views` FROM `views` WHERE user_id=:userid AND ad_id=:ad_id', array(':userid'=>isLoggedIn(),':ad_id'=>$ad_id))[0]['ad_views'];
       if(count($views_results) > 0 ) {
        App::get('database')->query('UPDATE `views` SET ad_views=:count,datetime=:new_datetime WHERE user_id=:user AND	ad_id=:ad_id', array(':count'=>$views_results + 1,':new_datetime'=>date('Y-m-d H:i:s'),'user'=>isLoggedIn(),':ad_id'=>$ad_id));
       }else{
        App::get('database')->query('INSERT INTO `views` VALUES (id,:ad_views,:poster_id,:ad_id,:user_id,status,:datetime)',
        array(':ad_views'=>1,':poster_id'=>$poster_id,':ad_id'=>$ad_id,':user_id'=>isLoggedIn(),':datetime'=>date('Y-m-d H:i:s')));
      }
     }else{
      App::get('database')->query('INSERT INTO `views` VALUES (id,:ad_views,:poster_id,:ad_id,user_id,status,:datetime)',
      array(':ad_views'=>1,':poster_id'=>$poster_id,':ad_id'=>$ad_id,':datetime'=>date('Y-m-d H:i:s')));
    }
  }

 //Views Graph Counter
 function viewsGraph($poster_id,$start_date,$end_date){
   $results = App::get('database')->query("SELECT SUM(ad_views) FROM `views` WHERE poster_id=:id  AND datetime  BETWEEN '$start_date' AND '$end_date'", array(':id'=>$poster_id));
    foreach ($results as $result){
      return $result[0];
  }}

  //Upload images 1 (is for uploading single image files)
  function imageUploader1($file_name,$file_photo_tmp,$file_size,$width,$store_image_path){
    $imgExt = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $valid_formats = array("jpg","JPG", "jpeg","png","PNG","gif");
    if(in_array($imgExt, $valid_formats)){
     if($file_size < 5000000){
      $info = getimagesize($file_photo_tmp);
      $mime = $info['mime'];
      switch($mime){
              case 'image/jpeg':
                      $image_create_func = 'imagecreatefromjpeg';
                      $image_save_func = 'imagejpeg';
                      $new_image_ext = 'jpg';
                      break;
              case 'image/png':
                      $image_create_func = 'imagecreatefrompng';
                      $image_save_func = 'imagepng';
                      $new_image_ext = 'png';
                      break;
              case 'image/gif':
                      $image_create_func = 'imagecreatefromgif';
                      $image_save_func = 'imagegif';
                      $new_image_ext = 'gif';
                      break;
              default:
                      throw new Exception('Unknown image type.');
           }

        $img = $image_create_func($file_photo_tmp);
        //Get new dimensions
         list($width_orig, $height_orig) = getimagesize($file_photo_tmp);
          $ratio_orig = $width_orig/$height_orig;
         $newHeight = ($height_orig / $width_orig) * $width;
          if($width/$newHeight > $ratio_orig){
            $width = $newHeight*$ratio_orig;
          }
       $tmp = imagecreatetruecolor($width,$newHeight);
        imagecopyresampled($tmp,$img, 0, 0, 0, 0, $width,$newHeight,$width_orig,$height_orig);
        if (file_exists($file_name)){
              unlink($file_name);
        }
       $img_rename =  time().'_'.rand(1000,9999).'.'.$new_image_ext;

       $_SESSION["image_new_name"] = $img_rename;
       $image_save_func($tmp, $store_image_path.$img_rename);
      }else{
        $_SESSION['img_errors'] = 'Sorry your selected image is too large,please resize it and try again.';
      }
      }else {
       $_SESSION['img_errors'] = 'Sorry your selected image is not allowed!';
      }
   }

  //Upload images 2 (is for uploading large image files)
  function imageUploader2($file_name,$file_photo_tmp,$file_size,$width,$store_image_path){
       $imgExt = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
       $valid_formats = array("jpg","JPG", "jpeg","png","PNG","gif");
       if(in_array($imgExt, $valid_formats)){
        if($file_size < 5000000){
         $info = getimagesize($file_photo_tmp);
         $orig_width = $info[0];
         if($orig_width < $width){
           $width = $orig_width;
         }
         $mime = $info['mime'];
         switch($mime){
                 case 'image/jpeg':
                         $image_create_func = 'imagecreatefromjpeg';
                         $image_save_func = 'imagejpeg';
                         $new_image_ext = 'jpg';
                         break;
                 case 'image/png':
                         $image_create_func = 'imagecreatefrompng';
                         $image_save_func = 'imagepng';
                         $new_image_ext = 'png';
                         break;
                 case 'image/gif':
                         $image_create_func = 'imagecreatefromgif';
                         $image_save_func = 'imagegif';
                         $new_image_ext = 'gif';
                         break;
                 default:
                        throw new Exception('Unknown image type.');
          }
           $img = $image_create_func($file_photo_tmp);
           //Get new dimensions
            list($width_orig, $height_orig) = getimagesize($file_photo_tmp);
             $ratio_orig = $width_orig/$height_orig;
             if($height_orig > 550 ){
               $newHeight = 550;
             }else {
               $newHeight = ($height_orig / $width_orig) * $width;
             }
             if($width / $newHeight > $ratio_orig){
               $width = $newHeight*$ratio_orig;
             }
          $tmp = imagecreatetruecolor($width,$newHeight);
           imagecopyresampled($tmp,$img, 0, 0, 0, 0, $width,$newHeight,$width_orig,$height_orig);
           if (file_exists($file_name)){
                 unlink($file_name);
           }

         if(isset($_SESSION["image_new_name"]))
          {
            $image_save_func($tmp, $store_image_path.$_SESSION['image_new_name']);
          }
         }else{
           $_SESSION['img_errors'] = 'Sorry your selected image is too large,please resize it and try again.';
         }
         }else {
          $_SESSION['img_errors'] = 'Sorry your selected image is not allowed!';
      }
  }

 //User fullname function
  function fullName(){
    $user_info = App::get('database')->userInfo(isLoggedIn());
    foreach ($user_info as $row){
      $fname =  $row->fname;
      $lname = $row->lname;
      return $fullname = $fname.'  '.$lname;
    }
  }

//User mobile number function
function UserMobile(){
  $user_info = App::get('database')->userInfo(isLoggedIn());
  foreach ($user_info as $row) {
    return $row->mobile;
  }
}

//Url formator
function seoUrl($string){
    $string = strtolower($string);
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    $string = preg_replace("/[\s-]+/", " ", $string);
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
 }

//Fectching LoggedIn Username
function Username($id){
 $username = App::get('database')->query('SELECT fname FROM  users WHERE id=:id',array(':id'=>$id))[0]['fname'];
 return $username;
}

function sms_code(){
   $result = "";
   $chars  = "0123456789";
   $charArray = str_split($chars);
   for($i = 0; $i < 6; $i++){
   $randitem = array_rand($charArray);
   $result .= "" .$charArray[$randitem];
   $final = $result;
   }
   return $final;
 }

 //Special reference code funtion for each user
  function user_ref(){
     $result = "";
     $chars  = "123456789";
     $charArray = str_split($chars);
   for($i = 0; $i < 7; $i++){
     $randitem = array_rand($charArray);
     $result .= "" .$charArray[$randitem];
     $final = $result;
    }
    $results = App::get('database')->validateUserref($final);
    if($results > 0){
      $result = "";
    for($i = 0; $i < 7; $i++){
      $randitem = array_rand($charArray);
      $result .= "" .$charArray[$randitem];
      $final = $result;
     }
     return $final;
    }else{ return $final; }
  }

//Funtion for each ad upload and images insert reference
 function ad_ref(){
    $result = "";
    $chars  = "123456789";
    $charArray = str_split($chars);
  for($i = 0; $i < 6; $i++){
    $randitem = array_rand($charArray);
    $result .= "" .$charArray[$randitem];
    $final = $result;
   }
 $results = App::get('database')->validateUniquecodeadpost($final);
  if($results > 0){
    $result = "";
  for($i = 0; $i < 6; $i++){
    $randitem = array_rand($charArray);
    $result .= "" .$charArray[$randitem];
    $final = $result;
  }
    return $final;
  }else{ return $final; }
 }

/// Chat session reference id
 function chatSession(){
    $result = "";
    $chars  = "0123456789";
    $charArray = str_split($chars);
    for($i = 0; $i < 10; $i++){
    $randitem = array_rand($charArray);
    $result .= "" .$charArray[$randitem];
    $final = $result;
    }
    return $final;
  }

 function url_econder(){
  $result = "";
  $chars  = "AaBbCcDdEeFfGgHhIiJkKLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz";
  $charArray = str_split($chars);
  for($i = 0; $i < 40; $i++){
  $randitem = array_rand($charArray);
  $result .= "" .$charArray[$randitem];
  $final = $result;
  }
  return $final;
  }


   //Format time ago for mobile app
 function formatTimeAgo($value)
  {
  $time = strtotime($value);
  $d = new \DateTime($value);
  if ($time > strtotime('-5 minutes'))
  {
    return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  }elseif ($time > strtotime('-10 minutes'))
  {
    return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  }elseif ($time > strtotime('-20 minutes'))
  {
    return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  }elseif ($time > strtotime('-30 minutes'))
  {
    return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  } elseif ($time > strtotime('-40 minutes'))
  {
    return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  }elseif ($time > strtotime('-50 minutes'))
  {
    return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  }
  elseif ($time > strtotime('-60 minutes'))
  {
     return floor((strtotime('now') - $time)/60) .'&nbsp;min ago';
  }
  else
  {
    return " ";
  }}


 //Formatting price input value
 function number_format_drop_zero_decimals($n, $n_decimals)
 {
 return ((floor($n) == round($n, $n_decimals)) ? number_format($n) : number_format($n, $n_decimals));
 }

//Calculating the number of items in each category ()
function antiques_Counter()
{
  $Items = App::get('database')->counterCategory('antiques','1');
  return $Items;
}

function art_Counter()
{
  $Items = App::get('database')->counterCategory('art','1');
  return $Items;
}

function baby_Counter()
{
  $Items = App::get('database')->counterCategory('baby','1');
  return $Items;
}

function book_Counter()
{
  $Items = App::get('database')->counterCategory('books','1');
  return $Items;
}

function clothing_Counter()
{
  $Items = App::get('database')->counterCategory('clothing','1');
  return $Items;
}

function computers_Counter()
{
  $Items = App::get('database')->counterCategory('computers','1');
  return $Items;
}

function crafts_Counter()
{
  $Items = App::get('database')->counterCategory('crafts','1');
  return $Items;
}

function electronics_Counter()
{
  $Items = App::get('database')->counterCategory('electronics','1');
  return $Items;
}

function health_beauty_Counter()
{
  $Items = App::get('database')->counterCategory('health-beauty','1');
  return $Items;
}

function home_garden_Counter()
{
  $Items = App::get('database')->counterCategory('home-garden','1');
  return $Items;
}

function jewelry_Counter()
{
  $Items = App::get('database')->counterCategory('jewelry','1');
  return $Items;
}

function jobs_Services()
{
  $Items = App::get('database')->counterCategory('jobs-services','1');
  return $Items;
}

function movies_Counter()
{
  $Items = App::get('database')->counterCategory('movies','1');
  return $Items;
}

function pets_animals_Counter()
{
  $Items = App::get('database')->counterCategory('pets-animals','1');
  return $Items;
}

function Property()
{
  $Items = App::get('database')->counterCategory('property','1');
  return $Items;
}

function Shoes_Counter()
{
  $Items = App::get('database')->counterCategory('shoes','1');
  return $Items;
}

function sports_fitness_Counter()
{
  $Items = App::get('database')->counterCategory('sports-fitness','1');
  return $Items;
}

function toys_Counter()
{
  $Items = App::get('database')->counterCategory('toys','1');
  return $Items;
}

function vehicles_Counter()
{
  $Items = App::get('database')->counterCategory('vehicles','1');
  return $Items;
}

function video_games_Counter()
{
  $Items = App::get('database')->counterCategory('video-games','1');
  return $Items;
}
