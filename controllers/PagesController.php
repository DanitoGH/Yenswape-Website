<?php
class PagesController {

  public function home(){
    return view('index');
  }

   public function postad(){
   $user_id = isLoggedIn();
   if($user_id > 0){
   return view('post-ad');
  }else {
    // redirecting to homepge if not loggedin
  if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
    $latestAds = App::get('database')->mob_latestadsInfo();
   return view('index-mobile',['latestAds' => $latestAds]);
   }else{
     $latestAds = App::get('database')->latestadsInfo(11);
    return view('index',['latestAds' => $latestAds]);
   }
   }}

  public function details(){
   $new_route = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
   $ad_id = substr(strrchr($new_route, "/"), 1);
   $explod_url = explode('-',$ad_id);
   $custom_id = end($explod_url);
   $user_id = isLoggedIn();// Logged in user id
   
   // Ad poster id
   @$poster_id = App::get('database')->query('SELECT user_id FROM ads WHERE custom_id=:custom_id', array(':custom_id'=>$custom_id))[0]['user_id'];
   
   //Inserting and Updating ad views
   countViews($poster_id, $custom_id);

   $counts = 0;
   $adsSums = App::get('database')->query('SELECT SUM(ad_views) FROM `views` WHERE user_id=:user_id AND ad_id=:ad_id', array(':user_id'=>$poster_id,':ad_id'=>$custom_id));
   
   foreach ($adsSums as $adsSum){
     $counts = $adsSum[0];
    }

   // Ad details array
   $Ad_details = App::get('database')->fetchItem($custom_id);

   if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
    return view('mobile-details',['single_item' => $Ad_details,'views_update'=>$counts]);
   }else{
    return view('details',['single_item' => $Ad_details,'views_update'=>$counts]);
   }
  }


 public function viewAll(){
    if(isset($_GET['view-all'])){
    $all_ads = htmlspecialchars($_GET['view-all']);

    if(isset($_GET['view-all'])){
      $results = App::get('database')->Views_all();
    }

    if(isset($_GET['order']) || isset($_GET['listing'])){
    @$orders = htmlspecialchars($_GET['order']);
    @$listings = htmlspecialchars($_GET['listing']);

    $order = ''; //global varible

    if($orders == 'date-new'){
     $order = 'order by datetime desc';
    }else if($orders == 'date-old'){
     $order = 'order by datetime asc';
    }else if($orders == 'price-high'){
     $order = 'order by value desc';
    }else if($orders == 'price-low'){
     $order = 'order by value asc';
    }else {
     $order = 'order by datetime desc';
    }
    }
    // Filters
   if(isset($_GET['view-all']) && isset($_GET['order']) && !isset($_GET['listing'])){
    $results = App::get('database')->view_allFilters_1($order);
   }else if (isset($_GET['view-all']) && !isset($_GET['order']) && isset($_GET['listing'])){
    $results = App::get('database')->view_allFilters_2($listings,$order);
   }else if (isset($_GET['view-all']) && isset($_GET['order']) && isset($_GET['listing'])){
    $results = App::get('database')->view_allFilters_2($listings,$order);
   }

   if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
     return  view('mobile-results',['results'=>$results]);
   }else {
     return  view('results',['results'=>$results]);
    }
   }
  }


  public function search(){
    if(isset($_GET['item']) && isset($_GET['location']))
    {
    $item = htmlspecialchars(trim($_GET['item']));
    $location = htmlspecialchars(trim($_GET['location']));

    if(isset($_GET['order']) || isset($_GET['listing'])){
    @$orders = htmlspecialchars($_GET['order']);
    @$listings = htmlspecialchars($_GET['listing']);

    $order = ''; // global varible

    if($orders == 'date-new'){
    $order = 'order by datetime desc';
    }else if($orders == 'date-old'){
    $order = 'order by datetime asc';
    }else if($orders == 'price-high'){
    $order = 'order by value desc';
    }else if($orders == 'price-low'){
    $order = 'order by value asc';
    }else {
    $order = 'order by datetime desc';
    }
    }
    if($item !='' && $location ==''){
    $results = App::get('database')->fetchItems($item,1);
    }elseif($item =='' && $location !=''){
     $results = App::get('database')->fetchLocation($location,1);
    }elseif($item !='' && $location !=''){
     $results = App::get('database')->fetchAll($item,$location,1);
   }
   //Filters
   if($item !='' && $location =='' && isset($_GET['order']) && !isset($_GET['listing'])){
    $results = App::get('database')->fetchItems_f1($item,$order,1);
   }else if ($item !='' && $location =='' && isset($_GET['listing']) && !isset($_GET['order'])) {
    $results = App::get('database')->fetchItems_f2($item,$listings,$order);
   }else if ($item !='' && $location =='' && isset($_GET['listing']) && isset($_GET['order'])){
    $results = App::get('database')->fetchItems_f2($item,$listings,$order);
   }else if($item =='' && $location !='' && isset($_GET['order']) && !isset($_GET['listing'])){
    $results = App::get('database')->fetchLocation_f1($location,$order);
   }else if ($item =='' && $location !='' && isset($_GET['listing']) && !isset($_GET['order'])) {
    $results = App::get('database')->fetchLocation_f2($location,$listings,$order);
   }else if ($item =='' && $location !='' && isset($_GET['listing']) && isset($_GET['order'])){
    $results = App::get('database')->fetchLocation_f2($location,$listings,$order);
   }else if($item !='' && $location !='' && isset($_GET['order']) && !isset($_GET['listing'])){
   $results = App::get('database')->fetchAll_f1($item,$location,1,$order);
   }else if ($item !='' && $location !='' && !isset($_GET['order']) && isset($_GET['listing'])) {
   $results = App::get('database')->fetchAll_f2($item,$location,$listings,1,$order);
   }else if ($item !='' && $location !='' && isset($_GET['listing']) && isset($_GET['order'])){
   $results = App::get('database')->fetchAll_f2($item,$location,$listings,1,$order);
   }
  }
   if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
     return  view('mobile-results',['results'=>$results,':location'=>$location,':item'=>$item]);
   }else {
     return  view('results',['results'=>$results,':location'=>$location,':item'=>$item]);
   }
   }


   public function results()
    {
     $url_parts = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
     $category = $url_parts[1];
     @$subcategory = $url_parts[2];
    if(isset($_GET['order']) || isset($_GET['listing'])){
     @$orders = htmlspecialchars($_GET['order']);
     @$listings = htmlspecialchars($_GET['listing']);
     $order = ''; //global varible
    if($orders == 'date-new'){
      $order = 'order by datetime desc';
    }else if($orders == 'date-old'){
      $order = 'order by datetime asc';
    }else if($orders == 'price-high'){
      $order = 'order by value desc';
    }else if($orders == 'price-low'){
      $order = 'order by value asc';
    }else{
      $order = 'order by datetime desc';
    }
   }elseif(isset($_GET['min_price'],$_GET['max_price'])){
      $min_price = htmlspecialchars($_GET['min_price']);
      $max_price = htmlspecialchars($_GET['max_price']);
    }

     @$post_categ_ = explode(',',$_GET['post_categ']);
     @$job_type_ = explode(',',$_GET['job_type']);
     @$min_exp_ = explode(',',$_GET['min_exp']);
     @$max_exp_ = explode(',',$_GET['max_exp']);
     @$bedrooms = explode(',',$_GET['bedrooms']);
     @$bathroom = explode(',',$_GET['bathroom']);
     @$broker_fee = explode(',',$_GET['broker_fee']);
     // Vehicles filters
     @$minYear = htmlspecialchars($_GET['min_y']);
     @$maxYear = htmlspecialchars($_GET['max_y']);
     @$min_mil = htmlspecialchars($_GET['min_mil']);
     @$max_mil = htmlspecialchars($_GET['max_mil']);
     @$cartypes = explode(',',$_GET['car_type']);
     @$condit = explode(',',$_GET['condit']);
     @$transm = explode(',',$_GET['transm']);


    if(isset($category) && $subcategory == null && !isset($_GET['order']) && !isset($_GET['listing']) && !isset($_GET['post_categ'],$_GET['job_type'])){
      $results = App::get('database')->fetchCat($category);// Fetching categories only..
     }elseif (isset($category) && $subcategory == null && isset($_GET['order']) && isset($_GET['listing'])){
      $results = App::get('database')->Cat_filters1($category,$listings,$order);// Fetching categories only..
     }elseif (isset($category) && $subcategory == null && isset($_GET['order'])){
      $results = App::get('database')->Cat_filters2($category,$order);// Fetching categories only..
     }elseif (isset($category) && $subcategory == null && isset($_GET['listing'])){
      $results = App::get('database')->Cat_filters1($category,$listings,$order);// Fetching categories only..
     }elseif(isset($category) && isset($subcategory) && $subcategory != null && !isset($_GET['post_categ'],$_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type']) &&  !isset($_GET['max_y']) && !isset($_GET['max_mil'])){
      $results = App::get('database')->fetchCat_Sub($category,$subcategory);
     }

     if(isset($category) && isset($subcategory) && $subcategory != null && isset($_GET['order']) && isset($_GET['listing'])){
      $results = App::get('database')->Cat_Sub_filters1($category,$subcategory,$listings,$order);
     }elseif (isset($category) && isset($subcategory) && $subcategory != null && isset($_GET['order'])) {
      $results = App::get('database')->Cat_Sub_filters2($category,$subcategory,$order);// Fetching categories only..
     }elseif (isset($category) && isset($subcategory) && $subcategory != null && isset($_GET['listing'])) {
      $results = App::get('database')->Cat_Sub_filters1($category,$subcategory,$listings,$order); // Fetching categories only..
     }elseif (isset($category,$min_price,$max_price) && !isset($subcategory)){
       //Only price filter set 1
      $results = App::get('database')->fetchbyPrice($category,$min_price,$max_price); // Fetch items between min and max price
     }elseif (isset($category,$subcategory,$min_price,$max_price) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type']) && !isset($_GET['min_y']) && !isset($_GET['min_mil'])){
       //Only price filter set 2
      $results = App::get('database')->fetchbyPrice2($category,$subcategory,$min_price,$max_price); // Fetch items between min nad max price by category and subcategories
     }else if(isset($_GET['min_price'],$_GET['max_price'],$_GET['post_categ'],$_GET['job_type'],$_GET['min_exp'],$_GET['max_exp']) && !isset($_GET['bedrooms'])){
      $results = App::get('database')->fetchJobsandPrice( postCategory($post_categ_) ,jobTypes($job_type_) , min_max_Exp($min_exp_) , min_max_Exp($max_exp_) , $min_price,$max_price);
     }elseif (isset($_GET['post_categ'],$_GET['job_type'],$_GET['min_exp'],$_GET['max_exp']) && !isset($_GET['bedrooms'])){
      $results = App::get('database')->fetchJobs( postCategory($post_categ_) , jobTypes($job_type_) , min_max_Exp($min_exp_) , min_max_Exp($max_exp_));
     }elseif (isset($_GET['min_price'],$_GET['max_price'],$_GET['bedrooms'],$_GET['bathroom'],$_GET['broker_fee'])) {
      $results = App::get('database')->fetchPropertyandPrice( bed_bath_Rooms($bedrooms) , bed_bath_Rooms($bathroom) , brokerFee($broker_fee) ,$min_price,$max_price);
     }elseif (isset($_GET['bedrooms'],$_GET['bathroom'],$_GET['broker_fee'])) {
      $results = App::get('database')->fetchProperty( bed_bath_Rooms($bedrooms) , bed_bath_Rooms($bathroom) , brokerFee($broker_fee));
     }elseif (isset($category,$subcategory) && isset($_GET['min_y'],$_GET['max_y']) && !isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['max_mil']) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type'])){
      //Only car year filter set
      $results = App::get('database')->vehiclesYear($category,$subcategory,$minYear,$maxYear);
     }elseif (isset($category,$subcategory) && isset($_GET['max_mil']) && !isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['max_y']) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type'])){
      //Only millage car filter set
      $results = App::get('database')->vehiclesMillage($category,$subcategory,$min_mil,$max_mil);
     }elseif (isset($category,$subcategory) && isset($_GET['min_price'],$_GET['max_price']) && isset($_GET['max_y']) && !isset($_GET['max_mil']) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type'])){
     //Only year and price filter set
     $results = App::get('database')->vehiclesPrice_Year($category,$subcategory,$min_price,$max_price,$minYear,$maxYear);
     }elseif (isset($category,$subcategory) && isset($_GET['min_price'],$_GET['max_price']) && isset($_GET['max_mil']) && !isset($_GET['max_y']) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type'])){
      //Only main car filter set no price,year and millage set
      $results = App::get('database')->vehiclesPrice_Millage($category,$subcategory,$min_price,$max_price,$min_mil,$max_mil);
     }elseif (isset($category,$subcategory) && isset($_GET['min_price'],$_GET['max_price']) && isset($_GET['max_mil']) && isset($_GET['max_y']) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type'])){
     //Price,Year and Millage car filter set
      $results = App::get('database')->vehiclesPrice_Year_Millage($category,$subcategory,$min_price,$max_price,$minYear,$maxYear,$min_mil,$max_mil);
     }elseif ( isset($category,$subcategory) && isset($_GET['max_mil']) && isset($_GET['max_y']) && !isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['post_categ']) && !isset($_GET['job_type']) && !isset($_GET['bedrooms']) && !isset($_GET['car_type'])){
      //Year and millage car filters set
      $results = App::get('database')->vehiclesYear_Millage($category,$subcategory,$minYear,$maxYear,$min_mil,$max_mil);
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && !isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['max_y']) && !isset($_GET['max_mil'])){
      //Only main car filter set no price,year and millage set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit));
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['max_y']) && !isset($_GET['max_mil'])) {
      //Only main car filter and price set no year and millage set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Price($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$min_price,$max_price);
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['max_y']) && !isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['max_mil'])){
      //Only main car filter and year set price and millage not set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Year($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$minYear,$maxYear);
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['max_mil']) && !isset($_GET['min_price'],$_GET['max_price']) && !isset($_GET['max_y'])){
      //Only main car filter and year set price and millage not set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Millage($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$min_mil,$max_mil);
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['min_price'],$_GET['max_price']) && isset($_GET['max_y']) && !isset($_GET['max_mil'])){
      // Only main car filter and year set price and millage not set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Price_Year($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$min_price,$max_price,$minYear,$maxYear);
     }elseif ( isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['min_price'],$_GET['max_price']) && isset($_GET['max_mil']) && !isset($_GET['max_y'])){
      // Only main car filter and year set price and millage not set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Price_Millage($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$min_price,$max_price,$minYear,$maxYear);
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['max_y']) && isset($_GET['max_mil']) && !isset($_GET['min_price'],$_GET['max_price'])){
      // Only main car filter and year and millage set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Year_Millage($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$minYear,$maxYear,$min_mil,$max_mil);
     }elseif (isset($category,$subcategory) && isset($_GET['car_type'],$_GET['condit'],$_GET['transm']) && isset($_GET['min_price'],$_GET['max_price']) && isset($_GET['max_y']) && isset($_GET['max_mil'])){
      // Only main car filter and year set price and millage not set
      $results = App::get('database')->vehiclesCartypes_Condition_Transmission_Price_Year_Millage($category,$subcategory,carTypes($cartypes),carTransmission($transm),carCondition($condit),$min_price,$max_price,$minYear,$maxYear,$min_mil,$max_mil);
     }elseif (isset($category,$subcategory) && isset($_GET['make'])){
       // Car make filter
      $results = App::get('database')->fatchMake(htmlspecialchars($_GET['make']));
     }

     if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
       return  view('mobile-results',['results'=>$results,'category'=>$category,'sub-category'=>$subcategory]);
     }else {
       return  view('results',['results'=>$results,'category'=>$category,'sub_category'=>$subcategory]);
     }
   }


    public function userAccount(){

     $user_id = isLoggedIn();// Login user id
     
     $get_uri = (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
     $url_parts = explode('/',$get_uri);
     $category = $url_parts[1]; @$subcategory = $url_parts[2];
     $CheckStatus = ""; $shop_owner_id = ""; $viewsTracker = "";
   if($user_id > 0 || $subcategory != null){
    if(strlen($subcategory) > 5){
      $shopId = App::get('database')->shopAds($subcategory);
     foreach($shopId as $shopid){
      $Fname = $shopid->fname;
      $Lname = $shopid->lname;
      $fullname = $Fname.' '.$Lname;
     }
     if($shopid->id == $user_id){
       $CheckStatus = 'user';
       $userads = App::get('database')->userAds($user_id);
       $userLikes = App::get('database')->userLikes($user_id);
       $viewsTracker = App::get('database')->adViewsTracker($user_id);
     }else{
       $shop_owner_id = $shopid->id;
       $CheckStatus = 'shop';
       $userads = App::get('database')->userShopAds($shopid->id);
       $userLikes = App::get('database')->userLikes($shopid->id);
     }
     }else{
       $CheckStatus = 'user';
       $userads = App::get('database')->userAds($user_id);
       $userLikes = App::get('database')->userLikes($user_id);
       $viewsTracker = App::get('database')->adViewsTracker($user_id);
     }
     if(count($userLikes) > 0){
      foreach ($userLikes as $userLike){
       $likesads = App::get('database')->userAds($userLike->user,1);
      }
     }else {
      $userLikes = null;
      $likesads = null;
     }
     return view('user-account',['userads'=>$userads,'userLikes'=>$userLikes,'user_id'=>$user_id,'likesads'=>$likesads,'viewsTracker'=>$viewsTracker,'Checkstatus'=>$CheckStatus,'shop_owner_id'=>$shop_owner_id]);
    }else{
     return view('index',['latestAds']);
    }}

   public function chat(){
    $user_id = isLoggedIn();// Login user id
    if($user_id > 0){
     $chats_log = App::get('database')->myChats($user = isLoggedIn());

    if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
      return view('chat-mobile-1',['cat_logs'=>$chats_log]);
    }else{
      return view('chat',['cat_logs'=>$chats_log]);
    }
   }else {
     // If not logged in and tries to get here
     // you will be take back home
     if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
       $latestAds = App::get('database')->mob_latestadsInfo();
      return view('index-mobile',['latestAds' => $latestAds]);
      }else{
        $latestAds = App::get('database')->latestadsInfo(11);
       return view('index',['latestAds' => $latestAds]);
      }
    }
   }

   public function readChat(){
    $user_id = isLoggedIn();// Login user id
    if($user_id > 0){
    $chats_log = App::get('database')->myChats($user = isLoggedIn());
    return view('chat-mobile-2',['cat_logs'=>$chats_log]);
    }else {
    // If not logged in and tries to get here
    // you will be taken back home
    if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
      $latestAds = App::get('database')->mob_latestadsInfo();
     return view('index-mobile',['latestAds' => $latestAds]);
     }else{
       $latestAds = App::get('database')->latestadsInfo();
      return view('index',['latestAds' => $latestAds]);
     }
    }
   }


   public function adUpdate(){
   $user_id = isLoggedIn();
   if($user_id > 0){
    return  view('update', [':user_id'=>$user_id]);
   }else {
     // If not logged in and tries to get here
     // you will be taken back home
     if(deviceDetector() == 'Mobile' || deviceDetector() == 'Tablet'){
       $latestAds = App::get('database')->mob_latestadsInfo();
      return view('index-mobile',['latestAds' => $latestAds]);
      }else{
        $latestAds = App::get('database')->latestadsInfo();
       return view('index',['latestAds' => $latestAds]);
     }
   }
  }

  // Contact us view(page) method
   public function contact()
   {
    return view('contact-us');
   }

   // Privacy view(page) method
   public function privacy()
   {
    return view('privacy-policy');
   }

   public function agreement()
   {
    return view('user-agreement');
   }

   public function siteMap()
   {
    return view('sitemap');
   }

   //App pages controller
   public function app_agreement()
   {
    return view('app-user-agreement');
   }

   public function app_policy()
   {
    return view('app-privacy-policy');
   }

   public function filenotFound()
   {
    return view('404');
   }

   public function queryError()
   {
    return view('Errors');
   }

  //Mini Admin menthods
   public function yenswapeAdmin(){
     $pending_ads = App::get('database')->getNewsads();
     return view('admin',['pending_Ads' =>$pending_ads]);
    }

   //Mini Admin menthods
   public function sendSMS(){
    return view('send-message');
   }

}
