<?php

class QueryBuilder
  {
  protected  $pdo;

  public function  __construct($pdo)
  {
  $this->pdo = $pdo;
  }

  public function validateUserref($uniqueCode) // Check if the code has been used in user registation
  {
  $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE user_ref={$uniqueCode}");
  $statement->execute();
  return $statement->rowCount();
  }

  public function validateUniquecodeadpost($uniqueCode) //Check if the code has been used in ad post
  {
    $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE custom_id={$uniqueCode}");
    $statement->execute();
    return $statement->rowCount();
  }

  public function latestadsInfo($limit) // displaying current ads on the homepage
  {
    $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE status=1 order by datetime desc LIMIT 0,{$limit}");
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function Latestadsoffset($offset) // displaying current ads in the homepage with offset
  {
  $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE status='1' order by datetime desc LIMIT 11 OFFSET {$offset}");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function countLatestPost()
  {
  $statement = $this->pdo->prepare("SELECT * FROM  `ads` WHERE status=0");
  $statement->execute();
  return $statement->rowCount();
  }

  public function Views_all() // Views_all latest ads
  {
  $statement = ("SELECT * FROM `ads` WHERE status=1  order by datetime desc");
  return $statement;
  }

  public function view_allFilters_1($order) // View all filtres 1
  {
   $statement = ("SELECT * FROM `ads` WHERE status=1  $order");
   return $statement;
  }

  public function view_allFilters_2($listings,$order) // View all filters 2
  {
   $statement = ("SELECT * FROM `ads` WHERE  listing_type='$listings' AND status=1 $order");
   return $statement;
  }

  public function singleImage($custom_id)  //Returns only the fisrt image
  {
  $statement = $this->pdo->prepare("SELECT * FROM `images` WHERE  ad_id='{$custom_id}' ORDER by id LIMIT 1");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function allImages($custom_id) // all user ad images
  {
  $statement = $this->pdo->prepare("SELECT * FROM `images` WHERE  ad_id='{$custom_id}' ORDER by id LIMIT 6");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function fetchItem($custom_id) // fetching user ad for details page
  {
  $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE custom_id='{$custom_id}' LIMIT 1");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function fetchUserinfo($id) // fetching user ad for details page
  {
  $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE id='{$id}' LIMIT 1");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }


  public function Views($user_id, $ad_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM views WHERE user_id='{$user_id}' AND status=1");
  $statement->execute();
  return $statement->rowCount();
  }


  public function viewsCounter($user_id,$ad_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM views WHERE user_id='{$user_id}' AND ad_id='{$ad_id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }


  public function viewsTotal($user)
  {
  $statement = $this->pdo->prepare("SELECT * FROM views WHERE user_id='{$user}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
 }

  public function resultsImages($custom_id) // search results images
  {
  $statement = $this->pdo->prepare("SELECT * FROM `images` WHERE ad_id='{$custom_id}' order by id desc");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }


  public function fetchCat($category) // Items categories only
  {
  $statement = ("SELECT * FROM `ads` WHERE `main_cat`='{$category}' AND `status`=1  order by datetime desc");
  return $statement;
  }

  public function Cat_filters1($category,$listing,$order) // Items categories only with filters
  {
  $statement = ("SELECT * FROM `ads` WHERE main_cat='$category' AND  listing_type='$listing' AND status=1 $order");
  return $statement;
  }

  public function Cat_filters2($category,$order) // Items categories only with filters
  {
  $statement = ("SELECT * FROM `ads` WHERE main_cat='$category' AND status=1 $order");
  return $statement;
  }

  public function fetchCat_Sub($category,$subcategory) // Items categories and subcategory
  {
  $statement = ("SELECT * FROM `ads` WHERE main_cat='$category' AND 	subcategory='$subcategory' AND  status=1 ");
  return $statement;
  }

  public function Cat_Sub_filters1($category,$subcategory,$listing,$order) // Items categories and subcategory
  {
  $statement = ("SELECT * FROM `ads` WHERE main_cat='$category' AND	subcategory='$subcategory' AND  listing_type='$listing' AND status=1  $order");
  return $statement;
  }

  public function Cat_Sub_filters2($category,$subcategory,$order) // Items categories and subcategory
  {
  $statement = ("SELECT * FROM `ads` WHERE main_cat='$category' AND subcategory='$subcategory' AND status=1  $order");
  return $statement;
  }

  public function fetchbyPrice($category,$min_price,$max_price) // Fetch items between min nad max price and category only
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND value BETWEEN '{$min_price}' AND '{$max_price}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function fetchbyPrice2($category,$subcategory,$min_price,$max_price) // Fetch items between min nad max price and category only
  {
   $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND value BETWEEN '{$min_price}' AND '{$max_price}' AND status=1 order by datetime desc");
   return $statement;
  }

  public function fetchJobs($postCategory,$jobtypes,$min_exp,$max_exp) // Fetch items between min nad max price and category only
  {
   $statement = ("SELECT * FROM  `ads` WHERE `subcategory` IN ($postCategory) AND `job_type` IN ($jobtypes)  AND `min_exp` IN ($min_exp) AND `max_exp` IN ($max_exp) AND status=1 order by datetime desc");
   return $statement;
  }

  public function fetchJobsandPrice($postCategory,$jobtypes,$min_exp,$max_exp,$min_price,$max_price) // Fetch items between min nad max price and category only
  {
   $statement = ("SELECT * FROM  `ads` WHERE `subcategory` IN ($postCategory)  AND `job_type` IN ($jobtypes)  AND `min_exp` IN ($min_exp) AND `max_exp` IN ($max_exp)  AND value BETWEEN '{$min_price}' AND '{$max_price}' AND status=1 order by datetime desc");
   return $statement;
  }

  public function fetchPropertyandPrice($bedrooms,$bathroom,$broker_fee,$min_price,$max_price) // Fetch items between min nad max price and category only
  {
   $statement = ("SELECT * FROM  `ads` WHERE `bedrooms` IN ($bedrooms) AND `bathrooms` IN ($bathroom) AND `broker_fee` IN ($broker_fee) AND value BETWEEN '{$min_price}' AND '{$max_price}' AND status=1 order by datetime desc");
   return $statement;
  }

  public function fetchProperty($bedrooms,$bathroom,$broker_fee) // Fetch items between min nad max price and category only
  {
   $statement = ("SELECT * FROM  `ads` WHERE `bedrooms` IN ($bedrooms) AND `bathrooms` IN ($bathroom) AND `broker_fee` IN ($broker_fee) AND status=1 order by datetime desc");
   return $statement;
  }

           /*===============================================================================
                                      VEHICLES FILTERS
           =================================================================================== */

  public function vehiclesYear($category,$subcategory,$minYear,$maxYear) // Fetch items between min nad max price and category only
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND year BETWEEN '{$minYear}' AND  '{$maxYear}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesMillage($category,$subcategory,$min_mil,$max_mil) // Fetch items between min nad max price and category only
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesPrice_Year($category,$subcategory,$min_price,$max_price,$minYear,$maxYear) // Fetch items between min nad max price and category only
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND value BETWEEN '{$min_price}' AND '{$max_price}' AND year BETWEEN '{$minYear}' AND '{$maxYear}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesPrice_Millage($category,$subcategory,$min_price,$max_price,$min_mil,$max_mil) // Fetch items between min nad max price and category only
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND value BETWEEN '{$min_price}' AND '{$max_price}' AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesPrice_Year_Millage($category,$subcategory,$min_price,$max_price,$minYear,$maxYear,$min_mil,$max_mil) // Fetch items between min nad max price and category only
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND value BETWEEN '{$min_price}' AND '{$max_price}' AND year BETWEEN '{$minYear}' AND '{$minYear}' AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesYear_Millage($category,$subcategory,$minYear,$maxYear,$min_mil,$max_mil)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND year BETWEEN '{$minYear}' AND '{$minYear}' AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission($category,$subcategory,$cartypes,$transm,$carcondition)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission_Price($category,$subcategory,$cartypes,$transm,$carcondition,$min_price,$max_price)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND value BETWEEN '{$min_price}' AND '{$max_price}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission_Year($category,$subcategory,$cartypes,$transm,$carcondition,$minYear,$maxYear)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND year BETWEEN '{$minYear}' AND '{$minYear}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission_Millage($category,$subcategory,$cartypes,$transm,$carcondition,$min_mil,$max_mil)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission_Price_Year($category,$subcategory,$cartypes,$transm,$carcondition,$min_price,$max_price,$minYear,$maxYear)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND value BETWEEN '{$min_price}' AND '{$max_price}' AND year BETWEEN '{$minYear}' AND '{$minYear}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission_Year_Millage($category,$subcategory,$cartypes,$transm,$carcondition,$minYear,$maxYear,$min_mil,$max_mil)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND year BETWEEN '{$minYear}' AND '{$minYear}' AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehiclesCartypes_Condition_Transmission_Price_Year_Millage($category,$subcategory,$cartypes,$transm,$carcondition,$min_price,$max_price,$minYear,$maxYear,$min_mil,$max_mil)
  {
  $statement = ("SELECT * FROM  `ads` WHERE main_cat='{$category}' AND subcategory='$subcategory' AND `car_type` IN ($cartypes) AND `transmission` IN ($transm) AND `item_condit` IN ($carcondition) AND value BETWEEN '{$min_price}' AND '{$max_price}' AND year BETWEEN '{$minYear}' AND '{$minYear}' AND miles BETWEEN '{$min_mil}' AND '{$max_mil}' AND status=1 order by datetime desc");
  return $statement;
  }

  public function vehicleMake() // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT DISTINCT make FROM `ads` WHERE main_cat='vehicles' AND subcategory='cars' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function vehiclemakeCount($make) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE make='{$make}' AND main_cat='vehicles' AND subcategory='cars' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countCartypes($type) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE car_type='{$type}' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countCarcondition($condition) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='vehicles' AND subcategory='cars' AND item_condit='{$condition}' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countCartransmi($transm) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='vehicles' AND subcategory='cars' AND transmission='{$transm}' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }


  public function fatchMake($make) // displaying current ads on the homepage
  {
  $statement = ("SELECT * FROM `ads` WHERE make='{$make}' AND main_cat='vehicles' AND subcategory='cars' AND status=1 order by datetime desc ");
  return $statement;
  }

   /*===============================================================================
                                JOBS AND SERVICES FILTERS
   =================================================================================== */

  public function countPostCat($category) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='jobs-services' AND subcategory='{$category}' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countJobtypes($type) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='jobs-services' AND job_type='{$type}' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countMinexp($minYear) // displaying current ads on the homepage
  {
  if($minYear == 5){ $minYear = " '5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'";}
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='jobs-services' AND min_exp IN ($minYear) AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countMaxexp($maxYear) // displaying current ads on the homepage
  {
  if($maxYear == 5){ $maxYear = " '5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20'";}
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='jobs-services' AND min_exp IN ($maxYear) AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  /*===============================================================================
                               PROPERTY FILTERS
  =================================================================================== */


  public function countBedrooms($bedrooms) // displaying current ads on the homepage
  {
  if($bedrooms == 5){ $bedrooms = " '5','6','7','8','9','10'";}
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='property' AND bedrooms IN ($bedrooms) AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function countBathrooms($bathrooms) // displaying current ads on the homepage
  {
  if($bathrooms == 5){ $bathrooms = " '5','6','7','8','9','10'";}
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='property' AND bathrooms IN ($bathrooms) AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }

  public function brokerFee($brokerfee) // displaying current ads on the homepage
  {
  $statement = $this->pdo->prepare("SELECT id FROM `ads` WHERE main_cat='property' AND broker_fee='{$brokerfee}' AND status=1 order by datetime desc ");
  $statement->execute();
  return $statement->rowCount();
  }


  /*===============================================================================
                           END OF FILTERS FUNCTIONS
  =================================================================================== */


  public function fetchLocation($location,$status)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(city_town,region) AGAINST('{$location}' IN BOOLEAN MODE) AND status='$status'  order by datetime desc");
  return $statement;
  }

  public function fetchLocation_f1($location,$order)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(city_town,region) AGAINST('{$location}' IN BOOLEAN MODE) AND status=1 $order");
  return $statement;
  }

  public function fetchLocation_f2($location,$listings,$order)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(city_town,region) AGAINST('{$location}' IN BOOLEAN MODE) AND listing_type='$listings'  AND status=1 $order");
  return $statement;
  }


  public function fetchItems($item,$status)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`) AGAINST('{$item}' IN BOOLEAN MODE) AND status='$status'  order by datetime desc");
  return $statement;
  }

  public function fetchItems_f1($item,$order)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`) AGAINST('{$item}' IN BOOLEAN MODE) AND status=1  $order");
  return $statement;
  }

  public function fetchItems_f2($item,$listings,$order)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`) AGAINST('{$item}' IN BOOLEAN MODE) AND  listing_type='$listings' AND status=1  $order");
  return $statement;
  }

  public function fetchAll($item,$location,$status)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`,`city_town`,`region`) AGAINST('{$item},{$location}' IN BOOLEAN MODE) AND status='$status'  order by datetime desc");
  return $statement;
  }

  public function fetchAll_f1($item,$location,$status,$order)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`,`city_town`,`region`) AGAINST('{$item},{$location}' IN BOOLEAN MODE) AND status='$status'  $order");
  return $statement;
  }

  public function fetchAll_f2($item,$location,$listings,$status,$order)
  {
  $statement = ("SELECT * FROM `ads` WHERE MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`,`city_town`,`region`) AGAINST('{$item},{$location}' IN BOOLEAN MODE) AND  listing_type='{$listings}'  AND status='$status'  $order");
  return $statement;
  }

  public function userad_Info($user_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE custom_id='{$user_id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function myChats($user_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM chat_log  WHERE user_id='{$user_id}' OR owner_id='{$user_id}' order by id desc");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function getSession($session_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM chat_log  WHERE session_id='{$session_id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function checkLastseen($user_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM lastseen WHERE user_id='{$user_id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }


  public function countUnread($ad_id,$user_id){
  $statement = $this->pdo->prepare("SELECT * FROM chat WHERE ad_id='{$ad_id}' AND sender_id!='{$user_id}' AND status=1");
  $statement->execute();
  return $statement->rowCount();
  }


  public function appCountUnread($session_id,$ad_id,$user_id){
  $statement = $this->pdo->prepare("SELECT * FROM chat WHERE  session_id='{$session_id}' AND  ad_id='{$ad_id}' AND sender_id!='{$user_id}' AND status=1");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }


  public function getChats($session_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM chat WHERE  session_id='{$session_id}' order by id asc");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function shopAds($ref_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  `users` WHERE 	user_ref='{$ref_id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function userAds($id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  `ads` WHERE user_id='{$id}' AND `status` IN (0,1,2) order by datetime desc");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function userShopAds($id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  `ads`  WHERE user_id='{$id}' AND status=1 order by datetime desc");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function loadShopAds($id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  `ads` WHERE user_id='{$id}' AND status=1 order by datetime desc  LIMIT 15");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function loadshopAdsOffset($id,$offset)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  `ads` WHERE user_id='{$id}' AND status=1 order by datetime desc LIMIT 15 OFFSET {$offset}");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function fetchAdsinfo($custom_id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  ads  WHERE custom_id='{$custom_id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function adViewsTracker($id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM `views` WHERE  user_id!='{$id}'");
  $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function userLikes($id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM  likes  WHERE user='{$id}'");
  $statement->execute();
  return  $statement->fetchAll(PDO::FETCH_CLASS);
  }

  public function removeAds1($user,$ad_id)
  {
  $statement = $this->pdo->prepare("DELETE FROM ads WHERE user_id='{$user}' AND custom_id='{$ad_id}'");
  $statement->execute();
  }


  public function removeAds2($table,$ad_id)
  {
  $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE ad_id='{$ad_id}'");
  $statement->execute();
  }


  //Get user Info
   public function userInfo($id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE id={$id} LIMIT 0,1");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Counting visitors 1
   public function visitorsCounts()
   {
   $statement = $this->pdo->prepare("SELECT * FROM  `visitors`");
   $statement->execute();
   return $statement->rowCount();
   }

   //Counting visitors 2
   public function visitorsCounts2($datestart,$dateend)
   {
   $statement = $this->pdo->prepare("SELECT SUM(user_count) FROM  `visitors`  WHERE datetime  BETWEEN '{$datestart}' AND  '{$dateend}'");
   $statement->execute();
   return $statement->fetchAll();
   }


   public function likesGraph($id,$datestart,$dateend)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `likes` WHERE 	poster_id={$id}  AND  datetime  BETWEEN '{$datestart}' AND  '{$dateend}'");
   $statement->execute();
   return $statement->rowCount();
   }


   public function viewsCount($id,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `views` WHERE 	poster_id='{$id}' AND ad_id='{$ad_id}'");
   $statement->execute();
   return $statement->rowCount();
   }

   public function viewsGraph($id,$datestart,$dateend)
   {
   $statement = $this->pdo->prepare("SELECT SUM(ad_views) FROM `views` WHERE poster_id={$id} AND datetime  BETWEEN '{$datestart}' AND  '{$dateend}'");
   $statement->execute();
   return $statement->fetchAll();
   }

   public function listingTypes($user,$type)
   {
   $statement = $this->pdo->prepare("SELECT * FROM ads WHERE user_id='{$user}' AND  listing_type='{$type}'");
   $statement->execute();
   return $statement->rowCount();
   }

   public function fectUpdateimge_1($user,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM images WHERE user_id='{$user}' AND  ad_id='{$ad_id}'  order by id asc  LIMIT 0,1");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function fectUpdateimge_2($user,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM images WHERE user_id='{$user}' AND  ad_id='{$ad_id}'  order by id asc  LIMIT 1,1");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function fectUpdateimge_3($user,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM images WHERE user_id='{$user}' AND  ad_id='{$ad_id}'   order by id asc  LIMIT 2,1");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function fectUpdateimge_4($user,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM images WHERE user_id='{$user}' AND  ad_id='{$ad_id}' order by id asc LIMIT 3,1");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function fectUpdateimge_5($user,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM images WHERE  user_id='{$user}' AND  ad_id='{$ad_id}' order by id asc LIMIT 4,1");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function fectUpdateimge_6($user,$ad_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM images WHERE  user_id='{$user}' AND  ad_id='{$ad_id}' order by id asc LIMIT 5,1");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function counterCategory($category,$status)
   {
   $statement = $this->pdo->prepare("SELECT main_cat FROM `ads` WHERE main_cat='{$category}' AND status='{$status}'");
   $statement->execute();
   return $statement->rowCount();
   }


   public function counter_Subcategory($table,$category,$subcategory)
   {
   $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE  main_cat='{$category}' AND subcategory='{$subcategory}' AND status='1'");
   $statement->execute();
   return $statement->rowCount();
   }

   public function checkNotifications($id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM  `notifications` WHERE  user_ref='{$id}' ");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function fetchbusinessInfo($id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM  `business_info` WHERE  user_ref='{$id}' ");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function owner_unreadChats($owner_id,$session_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM  `chat` WHERE  owner_id='{$owner_id}' AND session_id='{$session_id}' AND status=0");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function buyer_unreadChats($buyer_id,$session_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM  `chat` WHERE  buyer_id='{$buyer_id}' AND session_id='{$session_id}' AND status=0");
   $statement->execute();
   return $statement->fetchAll(PDO::FETCH_CLASS);
   }


   public function countUnreadchats_owner($id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM chat WHERE sender_id !='{$id}' AND  owner_id={$id}  AND  buyer_id !={$id} AND status=0");
   $statement->execute();
   return $statement->rowCount();
  }

  public function countUnreadchats_buyer($id)
  {
  $statement = $this->pdo->prepare("SELECT * FROM chat WHERE sender_id !='{$id}' AND 	buyer_id={$id} AND  owner_id!={$id} AND status=0");
  $statement->execute();
  return $statement->rowCount();
 }

   //New Yenswape functions ends here

   //Mobile app queries
   public function App_latest_ads()
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads`  WHERE status='1' order by datetime desc LIMIT 20");
   $statement->execute();
    return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   public function latestadsInfo_Offset($offset) // displaying current ads in the homepage with offset
   {
    $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE status='1' order by datetime desc LIMIT 20  OFFSET {$offset}");
    $statement->execute();
    return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   public function appfetchCat($category) //Items categories only
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='$category' AND status='1'  order by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   public function appfetchCat_Offset($category,$offset) //Items categories with offset
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads`  WHERE main_cat='$category' AND status='1' order by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   public function appfetchCat_Sub($category,$subcategory) //Items categories and subcategory
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='$category' AND subcategory='$subcategory' AND  status=1  order by datetime desc LIMIT 20 ");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   public function appfetchCat_Sub_Offset($category,$subcategory,$offset) //Items categories and subcategory with offset
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='$category' AND subcategory='$subcategory' AND status=1  order by datetime desc LIMIT 20  OFFSET {$offset} ");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   public function App_latest_ads_imgs($custom_id)//Returns only the fisrt image
   {
    $statement = $this->pdo->prepare("SELECT * FROM `images` WHERE ad_id='{$custom_id}' ORDER by id LIMIT 1");
    $statement->execute();
    return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Items search
   public function searchItems($Search_keyword,$status)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE
   MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`,`city_town`,`region`) AGAINST('{$Search_keyword}}' IN BOOLEAN MODE) AND
   status='$status' order by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

  //Items search on scroll
   public function searchScroll($Search_keyword,$status,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE
   MATCH(`title`,`main_cat`,`subcategory`,`make`,`model`,`moto_make`,`wishes`,`description`,`city_town`,`region`) AGAINST('{$Search_keyword}}' IN BOOLEAN MODE) AND
   status='$status' order by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with only category set
   public function appFilter1($category)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR 	subcategory='{$category}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   //Filter with only category set with offset
   public function appFilter1_scroll($category,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR 	subcategory='{$category}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with only listingType set
   public function appFilter2($listing_sel)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   //Filter with only listingType set with offset
   public function appFilter2_scroll($listing_sel,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   //Filter with only price set
   public function appFilter3($min,$max)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with only price set with offset
   public function appFilter3_scroll($min,$max,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with only location set
   public function appFilter4($location)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with only location set with offset
   public function appFilter4_scroll($location,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with category and listing type set
   public function appFilter5($category,$listing_sel)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR subcategory='{$category}' AND listing_type='{$listing_sel}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with category and listing type set with offset
   public function appFilter5_scroll($category,$listing_sel,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR subcategory='{$category}' AND listing_type='{$listing_sel}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   //Filter with category,min,max set
   public function appFilter6($category,$min,$max)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR subcategory='{$category}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with category,min,max set with offset
   public function appFilter6_scroll($category,$min,$max,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR subcategory='{$category}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with category and location set
   public function appFilter7($category,$location)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR subcategory='{$category}' AND region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with category and location set  with offset
   public function appFilter7_scroll($category,$location,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE main_cat='{$category}' OR subcategory='{$category}' AND region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with listing type and price set
   public function appFilter8($listing_sel,$min,$max)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with listing type and price set with offset
   public function appFilter8_scroll($listing_sel,$min,$max,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with listing type and location set
   public function appFilter9($listing_sel,$location)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with listing type and location set  with offset
   public function appFilter9_scroll($listing_sel,$location,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with price and location set
   public function appFilter10($min,$max,$location)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE  value BETWEEN '{$min}' AND '{$max}' AND  region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter with price and location set  with offset
   public function appFilter10_scroll($min,$max,$location,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE  value BETWEEN '{$min}' AND '{$max}' AND  region='{$location}' OR city_town='{$location}' AND status='1' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except listing type
   public function appFilter11($min,$max,$location,$category)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE  value BETWEEN '{$min}' AND '{$max}' AND  region='{$location}' OR city_town='{$location}' AND  main_cat='{$category}' OR subcategory='{$category}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except listing type with offset
   public function appFilter11_scroll($min,$max,$location,$category,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE  value BETWEEN '{$min}' AND '{$max}' AND  region='{$location}' OR city_town='{$location}' AND  main_cat='{$category}' OR subcategory='{$category}' AND status='1' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except price
   public function appFilter12($listing_sel,$location,$category)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  region='{$location}' OR city_town='{$location}' AND  main_cat='{$category}' OR subcategory='{$category}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except price  with offset
   public function appFilter12_scroll($listing_sel,$location,$category,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  region='{$location}' OR city_town='{$location}' AND  main_cat='{$category}' OR subcategory='{$category}' AND status='1' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except category
   public function appFilter13($listing_sel,$location,$min,$max)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  region='{$location}' OR city_town='{$location}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   //Filter All set except category with offset
   public function appFilter13_scroll($listing_sel,$location,$min,$max,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  region='{$location}' OR city_town='{$location}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20 OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except location
   public function appFilter14($listing_sel,$category,$min,$max)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  main_cat='{$category}' OR subcategory='{$category}' AND value
   BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set except location with offset
   public function appFilter14_scroll($listing_sel,$category,$min,$max,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  main_cat='{$category}' OR subcategory='{$category}' AND value BETWEEN '{$min}' AND '{$max}' AND status='1' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set
   public function appFilter15($listing_sel,$category,$min,$max,$location)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  main_cat='{$category}' OR subcategory='{$category}' AND value
   BETWEEN '{$min}' AND '{$max}' AND region='{$location}' OR city_town='{$location}' AND status='0' ORDER by datetime desc LIMIT 20");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Filter All set with offset
   public function  appFilter15_scroll($listing_sel,$category,$min,$max,$location,$offset)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE listing_type='{$listing_sel}' AND  main_cat='{$category}' OR subcategory='{$category}' AND value
   BETWEEN '{$min}' AND '{$max}' AND region='{$location}' OR city_town='{$location}' AND status='0' ORDER by datetime desc LIMIT 20  OFFSET {$offset}");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }

   //Getting User Store Info
   public function userStoreInfo($id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM  `business_info`  WHERE user_ref='{$id}'");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }


   //Get ad by custom id for update
   public function getAd($custom_id,$user_id)
   {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` WHERE custom_id='{$custom_id}' AND user_id='{$user_id}' LIMIT 1");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
   }
  //Mobile app queries ends here

  
  /*=========================================
             MINI ADMIN CODES
   ==========================================  */

  public function getNewsads()
  {
   $statement = $this->pdo->prepare("SELECT * FROM `ads` ORDER by datetime desc");
   $statement->execute();
   return  $statement->fetchAll(PDO::FETCH_CLASS);
  }


  /*========================================================
                    MASTER QUERIES
   ==========================================================*/

    public function query($query, $params = array()) {
     try {
       $statement = $this->pdo->prepare($query);
       $statement->execute($params);
      if (explode(' ', $query)[0] == 'SELECT') {
        return $statement->fetchAll();
       }
      }catch (Exception $e){
         return  redirect('query-errror');  //Display error message page to the user
      }
    }

   public function insert($table, $parameters)
    {
     $sql = sprintf('insert into %s (%s)  values (%s) ', $table,
     implode(', ', array_keys($parameters)),':' . implode(',  :', array_keys($parameters)));
     try{
      $statement = $this->pdo->prepare($sql);
      $statement->execute($parameters);
     }catch (Exception $e){
       return  redirect('query-errror');  //Display error message page to the user
     }
   }
  }
