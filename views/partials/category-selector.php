<?php
if(@$category !== null && @$sub_category === null  || @$sub_category !== null){
  switch($category){
    case 'art':
      include ('catogories-filter/art.php');
    break;

    case 'baby':
      include ('catogories-filter/baby.php');
    break;

    case 'books':
      include ('catogories-filter/books.php');
    break;

    case 'clothing':
      include ('catogories-filter/clothing.php');
    break;

    case 'computers':
      include ('catogories-filter/computers.php');
    break;

    case 'electronics':
      include ('catogories-filter/electronics.php');
    break;

    case 'health-beauty':
      include ('catogories-filter/health-beauty.php');
    break;

    case 'home-garden':
      include ('catogories-filter/home-garden.php');
    break;

    case 'jewelry':
      include ('catogories-filter/jewelry.php');
    break;

    case 'jobs-services':
     if(@$sub_category !== null){
      switch($sub_category){
        case 'seeking-work':
          include ('catogories-filter/job-services.php');
        break;

        case 'offered-jobs':
          include ('catogories-filter/job-services.php');
        break;

        default:
          include ('catogories-filter/job-services-simple.php');
       }
     }else {
       include ('catogories-filter/job-services-simple.php');
     }
     break;

    case 'movies':
      include ('catogories-filter/movies.php');
    break;

    case 'pets-animals':
      include ('catogories-filter/pets-animals.php');
    break;

    case 'property':
     if(@$sub_category !== null){
      switch($sub_category){
        case 'apartments-for-rent':
          include ('catogories-filter/property-sale-rent.php');
        break;

        case 'apartments-for-sale':
          include ('catogories-filter/property-sale-rent.php');
        break;

        default:
          include ('catogories-filter/property.php');
       }
     }else {
       include ('catogories-filter/property.php');
     }
     break;

   case 'shoes':
      include ('catogories-filter/shoes.php');
    break;

    case 'sports-fitness':
      include ('catogories-filter/sports-fitness.php');
    break;

    case 'toys':
      include ('catogories-filter/toys.php');
    break;

    case 'vehicles':
    if(@$sub_category !== null){
     switch($sub_category){
       case 'cars':
         include ('catogories-filter/vehicles-main.php');
       break;

       default:
         include ('catogories-filter/vehicles.php');
      }
    }else {
      include ('catogories-filter/vehicles.php');
    }
    break;

    case 'video-games':
      include ('catogories-filter/video-games.php');
    break;
  }
}else {
  include ('catogories-filter/all-categories.php');
}
