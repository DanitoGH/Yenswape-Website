 <?php
   $q = "";  // Pagination control logic

  if(isset($_GET['order']) && !isset($_GET['listing'])){
    $order = htmlspecialchars($_GET['order']);
    $q = 'order='.$order;
  }elseif (!isset($_GET['order']) && isset($_GET['listing'])){
    $listing = htmlspecialchars($_GET['listing']);
    $q = 'listing='.$listing;
  }else if(isset($_GET['order']) && isset($_GET['listing'])){
    $order = htmlspecialchars($_GET['order']);
    $listing = htmlspecialchars($_GET['listing']);
    $q = 'order='.$order.'&listing='.$listing;
  }

  if (isset($_GET['item']) && isset($_GET['location']) && !isset($_GET['order']) && !isset($_GET['listing'])) {
    $item = htmlspecialchars($_GET['item']);
    $location = htmlspecialchars($_GET['location']);
    $q = 'item='.$item.'&location='.$location;
  }else if (isset($_GET['item']) && isset($_GET['location']) && isset($_GET['order']) && !isset($_GET['listing'])){
    $item = htmlspecialchars($_GET['item']);
    $location = htmlspecialchars($_GET['location']);
    $order = htmlspecialchars($_GET['order']);
    $q = 'item='.$item.'&location='.$location.'&order='.$order;
  }else if (isset($_GET['item']) && isset($_GET['location']) && isset($_GET['listing']) && !isset($_GET['order'])){
    $item = htmlspecialchars($_GET['item']);
    $location = htmlspecialchars($_GET['location']);
    $listing = htmlspecialchars($_GET['listing']);
    $q = 'item='.$item.'&location='.$location.'&listing='.$listing;
  }else if (isset($_GET['item']) && isset($_GET['location']) && isset($_GET['listing']) && isset($_GET['order'])){
    $item = htmlspecialchars($_GET['item']);
    $location = htmlspecialchars($_GET['location']);
    $listing = htmlspecialchars($_GET['listing']);
    $order = htmlspecialchars($_GET['listing']);
    $q = 'item='.$item.'&location='.$location.'&listing='.$listing.'&order='.$order;
  }elseif (isset($_GET['view-all']) && !isset($_GET['order']) && !isset($_GET['listing'])) {
    $q = 'view-all';
  }elseif (isset($_GET['view-all']) && isset($_GET['order']) && !isset($_GET['listing'])) {
    $order = htmlspecialchars($_GET['order']);
    $q = 'view-all'.'&order='.$order;
  }elseif (isset($_GET['view-all']) && !isset($_GET['order']) && isset($_GET['listing'])) {
    $listing = htmlspecialchars($_GET['listing']);
    $q = 'view-all'.'&listing='.$listing;
  }elseif (isset($_GET['view-all']) && isset($_GET['order']) && isset($_GET['listing'])) {
    $listing = htmlspecialchars($_GET['listing']);
    $order = htmlspecialchars($_GET['order']);
    $q = 'view-all'.'&listing='.$listing.'&order='.$order;
  }


 // pagination database connection
 require ('paginator-conn.php');

  $mysqli = new mysqli($host,$user,$pass,$db);
  $limit = (isset( $_GET['limit'] ) ) ? $_GET['limit'] : 15; //items per page
  $page = (isset( $_GET['page'] ) ) ? $_GET['page'] : 1; //starting page
  $links = 15;
  $paginator = new Paginator($mysqli,$results); //__constructor is called
  $results = $paginator->getData($limit, $page,$q);
?>
