<?php
$get_var = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_placeholder = substr(strrchr(($get_var), "/"), 1);

// The pages controller is used to navigate through the site
// Linking to specified method for operations

$router->get('', 'PagesController@home');

$router->get('register','PagesController@register');

$router->get('post-ad','PagesController@postad');

$router->get('ad-chat','PagesController@chat');

$router->get('all-latest-ads','PagesController@viewAll');

$router->get('contact-us','PagesController@contact');

$router->get('sitemap','PagesController@siteMap');

$router->get('file-not-found','PagesController@filenotFound');

$router->get('query-errror','PagesController@queryError');

$router->get('user-agreement','PagesController@agreement');

$router->get('app-user-agreement','PagesController@app_agreement');

$router->get('user-privacy','PagesController@privacy');

$router->get('app-user-privacy','PagesController@app_policy');

$router->get('filters','PagesController@results');

$router->get("update-ad/{$uri_placeholder}",'PagesController@adUpdate');

$router->get('user-account','PagesController@userAccount');

$router->get("shop-id/{$uri_placeholder}",'PagesController@userAccount');

$router->get('search-results','PagesController@search');

$router->get("chat-session/{$uri_placeholder}",'PagesController@chat');

$router->get("mob-chat-session/{$uri_placeholder}",'PagesController@readChat');

$router->get("item/{$uri_placeholder}",'PagesController@details');


$router->get('antiques','PagesController@results');
$router->get("antiques/{$uri_placeholder}",'PagesController@results');

$router->get('art','PagesController@results');
$router->get("art/{$uri_placeholder}",'PagesController@results');

$router->get('baby','PagesController@results');
$router->get("baby/{$uri_placeholder}",'PagesController@results');

$router->get('books','PagesController@results');
$router->get("books/{$uri_placeholder}",'PagesController@results');

$router->get('clothing','PagesController@results');
$router->get("clothing/{$uri_placeholder}",'PagesController@results');

$router->get('computers','PagesController@results');
$router->get("computers/{$uri_placeholder}",'PagesController@results');

$router->get('crafts','PagesController@results');
$router->get("crafts/{$uri_placeholder}",'PagesController@results');

$router->get('electronics','PagesController@results');
$router->get("electronics/{$uri_placeholder}",'PagesController@results');

$router->get('health-beauty','PagesController@results');
$router->get("health-beauty/{$uri_placeholder}",'PagesController@results');

$router->get('home-garden','PagesController@results');
$router->get("home-garden/{$uri_placeholder}",'PagesController@results');

$router->get('jewelry','PagesController@results');
$router->get("jewelry/{$uri_placeholder}",'PagesController@results');

$router->get('jobs-services','PagesController@results');
$router->get("jobs-services/{$uri_placeholder}",'PagesController@results');

$router->get('movies','PagesController@results');
$router->get("movies/{$uri_placeholder}",'PagesController@results');

$router->get('pets-animals','PagesController@results');
$router->get("pets-animals/{$uri_placeholder}",'PagesController@results');

$router->get('property','PagesController@results');
$router->get("property/{$uri_placeholder}",'PagesController@results');

$router->get('shoes','PagesController@results');
$router->get("shoes/{$uri_placeholder}",'PagesController@results');

$router->get('sports-fitness','PagesController@results');
$router->get("sports-fitness/{$uri_placeholder}",'PagesController@results');

$router->get('toys','PagesController@results');
$router->get("toys/{$uri_placeholder}",'PagesController@results');

$router->get('vehicles','PagesController@results');
$router->get("vehicles/{$uri_placeholder}",'PagesController@results');

$router->get('video-games','PagesController@results');
$router->get("video-games/{$uri_placeholder}",'PagesController@results');

//The post method is mostly required for posting to database
$router->post('Load_latest_ads','UsersController@Latestlistings');

$router->post('Load_latest_ads_offset','UsersController@LatestListingsOffset');

$router->post('Load_user_ads','UsersController@loadUserads');

$router->post('Load_shop_ads','UsersController@loadShopads');

$router->post('Load_shop_ads_offset','UsersController@loadShopadsoffset');

$router->post('vehicles','UsersController@cars');

$router->post('final-step','UsersController@submit_ad');

$router->post("login",'UsersController@userLogin');

$router->post("facebook-login",'UsersController@facebookLogin');

$router->post("pinsender",'UsersController@pinSender');

$router->post("register",'UsersController@userRegister');

$router->post("recover-pin",'UsersController@recoverPin');

$router->post("post-ad",'UsersController@postAd');

$router->post("image-upload",'UsersController@Adimages');

$router->post("ad-like",'UsersController@adLikes');

$router->post("all-likes",'UsersController@allLikes');

$router->post("likes-counter",'UsersController@countLikes');

$router->post('report','UsersController@reports');

$router->post('contact-us','UsersController@contactUs');

$router->post('chat-log','UsersController@insertChat_logs');

$router->post('chat','UsersController@Chat');

$router->post('photo','UsersController@chatPhoto');

$router->post('get-chat','UsersController@fetchChat');

$router->post('delete-ad','UsersController@adDelete');

$router->post('sold-ad','UsersController@Sold_ad');

$router->post('change-notifications','UsersController@Changenotifi');

$router->post('login-security_alerts','UsersController@newDevicelogin_alert');

$router->post('ad-notification','UsersController@Live_ad_sms');

$router->post('unread_chats','UsersController@unreadChats');

$router->post('get-likes','UsersController@getLikes');

$router->post('get-views','UsersController@getViews');

$router->post('get-mobile','UsersController@posterNumber');

$router->post('get-views-tracker-mobile','UsersController@viewerNumber');

$router->post('update-views-tracker','UsersController@updateViewer');

$router->post('listing-type','UsersController@listing_Types');

$router->post('save-update','UsersController@Save_update');

$router->post('change-account','UsersController@Account_change');

$router->post('business-info','UsersController@Business_info');

$router->post('update-userinfo','UsersController@Saveuser_infoUpdate');

$router->post('delete-user','UsersController@Delete_user');

$router->post('logout','UsersController@userLogout');

 /*===============================================
                  Mobile App Queries
  =============================================== */

$router->post('Get_new_ads','UsersController@Latest_postings');

$router->post('Get_ads_category','UsersController@itemCategory');

$router->post('Get_cat_scroll_ads','UsersController@Cat_scrollFetch');

$router->post('Get_ads_cat_sub','UsersController@itemCatandSub');

$router->post('Get_cat_sub_scroll_ads','UsersController@Cat_Sub_scrollFetch');

$router->post('Get_scroll_ads','UsersController@ScrollFetch');

$router->post('Get_details','UsersController@Ad_details');

$router->post("app-lastseen",'UsersController@userLastseen');

$router->post('get-Pin','UsersController@appPinSender');

$router->post('app-register','UsersController@appUserRegister');

$router->post('Unlock-me','UsersController@appUserLogin');

$router->post('app_facebook_login','UsersController@appFacebookRegister');

$router->post('app-recover-pin','UsersController@appRecoverPin');

$router->post('app-ads-refcode','UsersController@appaAd_refs');

$router->post('app-ads-info','UsersController@appPostAd');

$router->post("app-search",'UsersController@appSearch');

$router->post("app-filters",'UsersController@appFilters');

$router->post("app-filters-scroll",'UsersController@appFilters_scroll');

$router->post("app-search-scroll",'UsersController@appSearchScroll');

$router->post('app-ads-images','UsersController@appAdimages');

$router->post("app-ad-like",'UsersController@appLikes');

$router->post("app-likes-counter",'UsersController@appCountLikes');

$router->post('app-get-views-tracker','UsersController@appAdsTracker');

$router->post('app-update-views-tracker','UsersController@updateViewer');

$router->post("app-getuser-ads",'UsersController@appUserads');

$router->post("app-store-info",'UsersController@appUserStoreInfo');

$router->post("app-user-liked-ads",'UsersController@appLikedads');

$router->post("app-likes-graph",'UsersController@appgetLikes');

$router->post("app-views-graph",'UsersController@appgetViews');

$router->post("app-listing-pie",'UsersController@applistingTypes');

$router->post("app-table-ads",'UsersController@appTabledisp');

$router->post("app-user-info",'UsersController@appUserinfo');

$router->post("app-update-user-info",'UsersController@appUpdateInfo');

$router->post("app-getad-info",'UsersController@appgetadUpdate');

$router->post("app-update-ad",'UsersController@appupdate_AdInfo');

$router->post("app-check-new-chats",'UsersController@appNewchats');

$router->post("app-chat-log",'UsersController@insertChat_logs');

$router->post("app-fetch-chat-logs",'UsersController@getChatlogs');

$router->post("app-chat-active-users",'UsersController@appChatactiveUsers');

$router->post("app-chat-ad",'UsersController@getChatItem');

$router->post("app-send-chat",'UsersController@appSendchat');

$router->post("app-fetch-chat",'UsersController@appfetchChat');

$router->post("app-check-notif-status",'UsersController@appcheckNotification');

$router->post("get_user_data",'UsersController@appactiveUsers');


    /* ================================================
                     Mini admin routes
     ================================================ */
     
$router->get('yenswape-mini-admin', 'PagesController@yenswapeAdmin');

$router->get('send-sms', 'PagesController@sendSMS');

$router->post("change-upload-state",'UsersController@Approve');

$router->post("send-sms",'UsersController@sendSMS');

$router->post("count-traffic",'UsersController@countTraffic');

$router->post("count-new-ads",'UsersController@checkNewsads');

$router->post("send-emails",'PagesController@sendEmails');
