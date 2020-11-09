<head>
  <?php
   if(isLoggedIn()){
   $user_id = isLoggedIn();
   if(App::get('database')->query('SELECT * FROM lastseen WHERE user_id=:user_id', array(':user_id'=>$user_id))){
      App::get('database')->query('UPDATE lastseen SET datetime=:datetime WHERE user_id=:user_id', array(':datetime'=>date('Y-m-d H:i:s'),':user_id'=>$user_id));
   }else {
     App::get('database')->query('INSERT INTO lastseen VALUES (id,:user_id,:datetime)',
     array(':user_id'=>$user_id,':datetime'=>date('Y-m-d H:i:s')));
    }
   }
  ?>
  <title>Yenswape.com | Swap and Sell stuff for free.</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="content-language" content="en-uk,en-us">
  <meta name="robots" content="all">
  <meta name="description" content="<?php echo htmlspecialchars_decode(stripslashes($item->description)); ?>">
  <meta name="keywords" content="swap anything in ghana, sell anyting for free, swap phones,swap cars,swap tv,swap in Ghana, sell and swap, phones, olx.com, tonaton.com, swap and sell, sell anything in ghana , Rent, Jobs">
  <!--Import materialize.css-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="icon" href="../images/favicon.png" sizes="16x16 32x32 64x64" type="image/png">
  <link type="text/css" rel="stylesheet" href="../css/css-combination4.css"  media="screen,projection"/>
  <link  href="../ssi-uploader/styles/new-ssi-uploader.css" rel="stylesheet">
  <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
