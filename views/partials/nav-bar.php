<div class="navbar-fixed">
 <nav class="nav">
    <div class="nav-wrapper">
      <a title="Go home"  href="/" class="brand-logo">
        <img src="../images/glogo.png" alt="yenswape-logo"  id="logo_img"/>
      </a>
      <a href="#!" data-activates="accordion" class="button-collapse"><i class="material-icons">menu</i></a>
       <ul class="right hide-on-med-and-down">
         <?php
         $redirect = '';
         if(isLoggedIn()){
           $id = isLoggedIn();
           $Username = Username($id); // passing current user id to the Username function
           $new_chats_1 = App::get('database')->countUnreadchats_owner($id);
           $new_chats_2 = App::get('database')->countUnreadchats_buyer($id);
           $plus = $new_chats_1+$new_chats_2;
           $count = '';
           if($plus > 0){
             $count = "<span class=\"new badge\">$plus</span>";
           }
          echo"
          <li>
          <!-- Dropdown Trigger -->
          <a class='dropdown-button' href='#' data-activates='dropdown1'>Hi! $Username</a>
          <!-- Dropdown Structure -->
          <ul id='dropdown1' class='dropdown-content login_dropdown'>
          <li><a href='/ad-chat'><i class=\"fa fa-comments\" aria-hidden=\"true\"></i>Chat $count</a></li>
          <li><a href='/user-account#my_ads'><i class=\"fa fa-buysellads\" aria-hidden=\"true\"></i>My ads</a></li>
          <li><a href='/user-account#user_likes'><i class=\"fa fa-thumbs-up\" aria-hidden=\"true\"></i>My likes</a></li>
          <li><a href='/user-account#statistics'><i class=\"fa fa-line-chart\" aria-hidden=\"true\"></i>Statistics</a></li>
          <li><a href='/user-account#setting'><i class=\"fa fa-wrench\" aria-hidden=\"true\"></i>Settings</a></li>
          <li><a id='logout'><i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i>Logout</a></li>
         </ul>
        </li>
        <li><a class='waves-effect waves-light btn  amber darken-2 white-text' href='/post-ad' id='swap-now-btn'>POST AD</a></li>
        ";
       }else {
        echo
        "
        <li><a class='login' href='#login_mod'>Login</a></li>
             <li><a class='waves-effect waves-light btn  amber darken-2 white-text' href='#login_mod' id='swap-now-btn'>POST AD</a></li>
        ";}
        ?>
      </ul>
      <!--- Mobile side menu starts here  -->
      <ul class="side-nav  accordion" id="accordion">
        <!-- Mobile menu goes in here -->
        <?php require ('mobile-menu.php'); ?>
     </ul>
     <!--- End Mobile side menu -->
    </div>
    <input type="hidden"  value="0" id="swap_clicked"  />
  </nav>
<!--Mobile Nevigation ENDS here-->
</div>
