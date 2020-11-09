<li>
<div class="user_welcome">
<?php
if(isLoggedIn()){
  $id = isLoggedIn();
  $user_info_s = App::get('database')->userInfo($id);
  foreach ($user_info_s as $user_info){
   $firstname = $user_info->fname;
   $lastname  = $user_info->lname;
  }
  $shortname = substr($firstname,0,1);
echo"
<div  class=\"name_holder  z-depth-1\">$shortname</div>
<div class=\"welcome_holder\">Welcome</div>
<div class=\"fullname_holder\">$firstname $lastname</div>
";

$new_chats_1 = App::get('database')->countUnreadchats_owner($id);
$new_chats_2 = App::get('database')->countUnreadchats_buyer($id);
$plus = $new_chats_1+$new_chats_2;
$count = '';
if($plus > 0){
  $count = "<span class=\"new badge\">$plus</span>";
}

}else {
echo "
<div class=\"register_login\"><span> Hi! </span> <span class=\"sign_in\">Sign in</span> or <span class=\"register_\">register</span></div>
";
}
?>
<input type="hidden"  id="user_loggedin"  value="<?php echo @$id;?>"/>
</div>
</li>
<li>
  <div class="home link"><i class="fa fa-home" aria-hidden="true"></i>Home</div>
</li>
<li>
  <div class="post_ad link"><i class="fa fa-camera" aria-hidden="true"></i>Post ad</div>
</li>
<li>
  <div class="chat link"><i class="fa fa-comment" aria-hidden="true"></i>Chat <?php echo @$count;?></div>
</li>
<li>
  <div class="link">CATEGORIES</i></div>
</li>
<li>
  <div class="link art"><i class="fa fa-plus-circle" aria-hidden="true"></i>Art
   <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  art_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/art">All types</a></li>
      <li><a href="/art/digital-art">Digital art</a></li>
      <li><a href="/art/drawings">Drawings</a></li>
      <li><a href="/art/folk-art">Folk art</a></li>
      <li><a href="/art/mixed-media">Mixed Media</a></li>
      <li><a href="/art/paintings">Paintings</a></li>
      <li><a href="/art/photo-images">Photo Images</a></li>
      <li><a href="/art/posters">Posters</a></li>
      <li><a href="/art/prints">Prints</a></li>
      <li><a href="/art/sculpture">Sculpture</a></li>
      <li><a href="/art/self">Self</a></li>
      <li><a href="/art/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link baby"><i class="fa fa-plus-circle" aria-hidden="true"></i>Baby<i class="fa fa-plus-circle" aria-hidden="true"></i>
    <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  baby_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/baby">All types</a></li>
      <li><a href="/baby/accessories">Accessories</a></li>
      <li><a href="/baby/baby-gear">Baby Gear</a></li>
      <li><a href="/baby/baby-safety">Baby Safety</a></li>
      <li><a href="/baby/bedding">Bedding</a></li>
      <li><a href="/baby/car-seats">Car Seats</a></li>
      <li><a href="/baby/clothing">clothing</a></li>
      <li><a href="/baby/diapering">Diapering</a></li>
      <li><a href="/baby/decor">Decor</a></li>
      <li><a href="/baby/feeding">Feeding</a></li>
      <li><a href="/baby/furniture">Furniture</a></li>
      <li><a href="/baby/potty-training">Potty Training</a></li>
      <li><a href="/baby/shoes">Shoes</a></li>
      <li><a href="/baby/strollers">Strollers</a></li>
      <li><a href="/baby/toys">Toys</a></li>
      <li><a href="/baby/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  books"><i class="fa fa-plus-circle" aria-hidden="true"></i>Books
 <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  book_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/books">All types</a></li>
      <li><a href="/books/audio">Audio</a></li>
      <li><a href="/books/children">Children</a></li>
      <li><a href="/books/computer">Computer</a></li>
      <li><a href="/books/cooking">Cooking</a></li>
      <li><a href="/books/engineering">Engineering</a></li>
      <li><a href="/books/fantasy">Fantasy</a></li>
      <li><a href="/books/fiction">Fiction</a></li>
      <li><a href="/books/finance">Finance</a></li>
      <li><a href="/books/history">History</a></li>
      <li><a href="/books/mystery">Mystery</a></li>
      <li><a href="/books/romance">Romance</a></li>
      <li><a href="/books/science">Science</a></li>
      <li><a href="/books/sci-fi">Sci-Fi</a></li>
      <li><a href="/books/social">Social</a></li>
      <li><a href="/books/nonfiction">Nonfiction</a></li>
      <li><a href="/books/vocational">Vocational</a></li>
      <li><a href="/books/young-adult">Young Adult</a></li>
      <li><a href="/books/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link clothing"><i class="fa fa-plus-circle" aria-hidden="true"></i>Clothing
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  clothing_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/clothing">All types</a></li>
      <li><a href="/clothing/accessories">Accessories</a></li>
      <li><a href="/clothing/children">Children</a></li>
      <li><a href="/clothing/maternity">Maternity</a></li>
      <li><a href="/clothing/men">Men</a></li>
      <li><a href="/clothing/women">Women</a></li>
      <li><a href="/clothing/others">Others</a></li>
   </ul>
</li>
<li>
  <div class="link  computers"><i class="fa fa-plus-circle" aria-hidden="true"></i>Computers
    <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  computers_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/computers">All types</a></li>
      <li><a href="/computers/accessories">Accessories</a></li>
      <li><a href="/computers/components">Components</a></li>
      <li><a href="/computers/desktops">Desktops</a></li>
      <li><a href="/computers/laptops">Laptops</a></li>
      <li><a href="/computers/networking">Networking</a></li>
      <li><a href="/computers/printers">Printers</a></li>
      <li><a href="/computers/software">Software</a></li>
      <li><a href="/computers/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  crafts"><i class="fa fa-plus-circle" aria-hidden="true"></i>Crafts
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  crafts_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/crafts">All types</a></li>
      <li><a href="/crafts/bead-art">Bead art</a></li>
      <li><a href="/crafts/candle-soap">Candle & Soap</a></li>
      <li><a href="/crafts/ceramics">Ceramics</a></li>
      <li><a href="/crafts/fabric">Fabric</a></li>
      <li><a href="/crafts/floral">Floral</a></li>
      <li><a href="/crafts/needlecraft">Needlecraft</a></li>
      <li><a href="/crafts/painting">Painting</a></li>
      <li><a href="/crafts/scrapbooking">Scrapbooking</a></li>
      <li><a href="/crafts/stamping">Stamping</a></li>
      <li><a href="/crafts/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  electronics"><i class="fa fa-plus-circle" aria-hidden="true"></i>Electronics
<span style="color:dimgray; font-size:15px;" class="badge"><?php echo  electronics_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/electronics">All types</a></li>
      <li><a href="/electronics/accessories">Accessories</a></li>
      <li><a href="/electronics/apple-products">Apple Products</a></li>
      <li><a href="/electronics/audio">Audio</a></li>
      <li><a href="/electronics/cameras">Cameras</a></li>
      <li><a href="/electronics/components">Components</a></li>
      <li><a href="/electronics/dvr">DVR</a></li>
      <li><a href="/electronics/household">Household</a></li>
      <li><a href="/electronics/mp3-misc">MP3/Misc</a></li>
      <li><a href="/electronics/phones">Phones</a></li>
      <li><a href="/electronics/photography">Photography</a></li>
      <li><a href="/electronics/software">Software</a></li>
      <li><a href="/electronics/stereo">Stereo</a></li>
      <li><a href="/electronics/toys">Toys</a></li>
      <li><a href="/electronics/tv">Tv</a></li>
      <li><a href="/electronics/video-cameras">Video Cameras</a></li>
      <li><a href="/electronics/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  health_beauty"><i class="fa fa-plus-circle" aria-hidden="true"></i>Health & Beauty
<span style="color:dimgray; font-size:15px;" class="badge"><?php echo  health_beauty_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/health-beauty">All types</a>
      <li><a href="/health-beauty/body-care">Body Care</a></li>
      <li><a href="/health-beauty/cosmetics">Cosmetics</a></li>
      <li><a href="/health-beauty/hair-care">Hair Care</a></li>
      <li><a href="/health-beauty/men">Men</a></li>
      <li><a href="/health-beauty/vitamins">Vitamins</a></li>
      <li><a href="/health-beauty/women">Women</a></li>
      <li><a href="/health-beauty/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  home_garden"><i class="fa fa-plus-circle" aria-hidden="true"></i>Home & Garden
<span style="color:dimgray; font-size:15px;" class="badge"><?php echo  home_garden_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/home-garden">All types</a></li>
      <li><a href="/home-garden/appliances">Appliances</a></li>
      <li><a href="/home-garden/bath">Bath</a></li>
      <li><a href="/home-garden/bedding">Bedding</a></li>
      <li><a href="/home-garden/furniture">Furniture</a></li>
      <li><a href="/home-garden/gardening">Gardening</a></li>
      <li><a href="/home-garden/home-decor">Home Decor</a></li>
      <li><a href="/home-garden/kitchen">Kitchen</a></li>
      <li><a href="/home-garden/office-supplies">Office Supplies</a></li>
      <li><a href="/home-garden/outdoor-equipment">Outdoor Equipment</a></li>
      <li><a href="/home-garden/patio-grill">Patio & Grill</a></li>
      <li><a href="/home-garden/pet-supplies">Pet Supplies</a></li>
      <li><a href="/home-garden/pools-spas">Pools & Spas</a></li>
      <li><a href="/home-garden/rugs-carpet">Rugs & Carpet</a></li>
      <li><a href="/home-garden/tools">Tools</a></li>
      <li><a href="/home-garden/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  jewelry"><i class="fa fa-plus-circle" aria-hidden="true"></i>Jewelry
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  jewelry_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/jewelry">All types</a></li>
      <li><a href="/jewelry/gems">Gems</a></li>
      <li><a href="/jewelry/men">Men</a></li>
      <li><a href="/jewelry/watches">Watches</a></li>
      <li><a href="/jewelry/women">Women</a> </li>
      <li><a href="/jewelry/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  jobs"><i class="fa fa-plus-circle" aria-hidden="true"></i>Jobs & Services
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo jobs_Services();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/jobs-services">All types</a></li>
      <li><a href="/jobs-services/offered-jobs">Offered Jobs</a></li>
      <li><a href="/jobs-services/seeking-work">Seeking Work</a></li>
      <li><a href="/jobs-services/services">Services</a></li>
      <li><a href="/jobs-services/classes-courses">Classes - Courses</a> </li>
      <li><a href="/jobs-services/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  movies"><i class="fa fa-plus-circle" aria-hidden="true"></i>Movies
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  movies_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/movies">All types</a></li>
      <li><a href="/movies/action">Action</a></li>
      <li><a href="/movies/children">Children</a></li>
      <li><a href="/movies/comedy">Comedy</a></li>
      <li><a href="/movies/documentary">Documentary</a></li>
      <li><a href="/movies/drama">Drama</a></li>
      <li><a href="/movies/horror">Horror</a></li>
      <li><a href="/movies/music">Music</a></li>
      <li><a href="/movies/romance">Romance</a></li>
      <li><a href="/movies/sci-fi">Sci-Fi</a></li>
      <li><a href="/movies/tv">TV</a></li>
      <li><a href="/movies/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  pet_animals"><i class="fa fa-plus-circle" aria-hidden="true"></i>Pets & Animals
    <span style="color:dimgray; font-size:15px;" class="badge"><?php echo pets_animals_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/pets-animals">All types</a></li>
      <li><a href="/pets-animals/accessories">Accessories</a></li>
      <li><a href="/pets-animals/adoption">Adoption</a></li>
      <li><a href="/pets-animals/animals">Animals</a></li>
      <li><a href="/pets-animals/supplies">Supplies</a></li>
      <li><a href="/pets-animals/others">Others</a></li>
   </ul>
</li>
<li>
  <div class="link  property"><i class="fa fa-plus-circle" aria-hidden="true"></i>Property
    <span style="color:dimgray; font-size:15px;" class="badge"><?php echo Property();?></span>
  </div>
  <ul  class="submenu">
    <li><a href="/property">All types</a></li>
    <li><a href="/property/apartment-for-rent">Apartments for Rent</a></li>
    <li><a href="/property/apartment-for-sale">Apartments for Sale</a></li>
    <li><a href="/property/commercial-property">Commercial Property</a></li>
    <li><a href="/property/land">Land</a></li>
    <li><a href="/property/office-shop">Office and Shops</a></li>
    <li><a href="/property/new-developments">New Developments</a></li>
    <li><a href="/property/others">Other</a></li>
  </ul>
</li>
<li>
  <div class="link  shoes"><i class="fa fa-plus-circle" aria-hidden="true"></i>Shoes
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo Shoes_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/shoes">All types</a>
      <li><a href="/shoes/accessories">Accessories</a></li>
      <li><a href="/shoes/children">Children</a></li>
      <li><a href="/shoes/maternity">Maternity</a></li>
      <li><a href="/shoes/men">Men</a></li>
      <li><a href="/shoes/oomen">Women</a></li>
      <li><a href="/shoes/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  sport_fitness"><i class="fa fa-plus-circle" aria-hidden="true"></i>Sports & Fitness
 <span style="color:dimgray; font-size:15px;" class="badge"><?php echo sports_fitness_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/sports-fitness">All types</a></li>
      <li><a href="/sports-fitness/accessories">Accessories</a></li>
      <li><a href="/sports-fitness/baseball">Baseball</a></li>
      <li><a href="/sports-fitness/basketball">Basketball</a></li>
      <li><a href="/sports-fitness/camping">Camping</a></li>
      <li><a href="/sports-fitness/equipmentment">Equipments</a></li>
      <li><a href="/sports-fitness/exercise">Exercise</a></li>
      <li><a href="/sports-fitness/football">Football</a></li>
      <li><a href="/sports-fitness/golf">Golf</a></li>
      <li><a href="/sports-fitness/hockey">Hockey</a></li>
      <li><a href="/sports-fitness/soccer">Soccer</a></li>
      <li><a href="/sports-fitness/tennis">Tennis</a></li>
      <li><a href="/sports-fitness/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link  toys"><i class="fa fa-plus-circle" aria-hidden="true"></i>Toys
    <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  toys_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/toys">All types</a></li>
      <li><a href="/toys/boards">Boards</a></li>
      <li><a href="/toys/children">Children</a></li>
      <li><a href="/toys/electronics">Electronics</a></li>
      <li><a href="/toys/figures">Figures</a></li>
      <li><a href="/toys/motorized">Motorized</a></li>
      <li><a href="/toys/puzzles">Puzzles</a></li>
      <li><a href="/toys/sports">Sports</a></li>
      <li><a href="/toys/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link vehicles"><i class="fa fa-plus-circle" aria-hidden="true"></i>Vehicles
   <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  vehicles_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/vehicles">All types</a></li>
      <li><a href="/vehicles/accessories">Accessories</a></li>
      <li><a href="/vehicles/cars">Cars</a></li>
      <li><a href="/vehicles/parts">Parts</a></li>
      <li><a href="/vehicles/motorcycles">Motorcycles</a></li>
      <li><a href="/vehicles/trucks">Trucks</a></li>
      <li><a href="/vehicles/others">Others</a></li>
   </ul>
</li>

<li>
  <div class="link   video_games"><i class="fa fa-plus-circle" aria-hidden="true"></i>Video & Games
  <span style="color:dimgray; font-size:15px;" class="badge"><?php echo  video_games_Counter();?></span>
  </div>
    <ul  class="submenu">
      <li><a href="/video-games">All types</a></li>
      <li><a href="/video-games/accessories">Accessories</a></li>
      <li><a href="/video-games/consoles">Consoles</a></li>
      <li><a href="/video-games/gameboy">Gameboy</a></li>
      <li><a href="/video-games/gameCube">GameCube</a></li>
      <li><a href="/video-games/mobile">Mobile</a></li>
      <li><a href="/video-games/nintendo">Nintendo</a></li>
      <li><a href="/video-games/pc">PC</a></li>
      <li><a href="/video-games/playstation">Playstation</a></li>
      <li><a href="/video-games/psp">PSP</a></li>
      <li><a href="/video-games/sega">Sega</a></li>
      <li><a href="/video-games/vintage">Vintage</a></li>
      <li><a href="/video-games/xbox">Xbox</a></li>
      <li><a href="/video-games/wii">Wii</a></li>
      <li><a href="/video-games/others">Others</a></li>
   </ul>
</li>
<?php if(isLoggedIn()):?>
<li>
  <div  id="mob-logout" class="link"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </div>
    <ul  class="submenu">
   </ul>
</li>
<?php endif;?>
