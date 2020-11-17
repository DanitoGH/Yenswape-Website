<div class="results-filters-div-wrapper">
   <div class="card-panel">
     <?php if(@$category !== null && @$sub_category === null):?>
      <div  class="breadcrumb-div-wrapper"><a href="https://yenswape.herokuapp.com">Home</a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($category);?></a></div>
    <?php endif;?>
    <?php if(@$category != null && $sub_category != null):?>
     <div class="breadcrumb-div-wrapper">
      <a href="https://yenswape.herokuapp.com">Home</a> <i class="fa fa-angle-right"></i><a href="/vehicles"><?php echo ucfirst($category);?></a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($sub_category);?></a></div>
     <?php endif; ?>
     <br/>
     <div class="row">
      <ul class="">
        <li><h5 class="black-text">Category</h5></li>
        <li><h6><a href="/all-latest-ads?view-all">All Categories</a></h6></li>
        <li><a href="/vehicles/accessories">Accessories</a></li>
        <li><a href="/vehicles/cars">Cars</a></li>
        <li><a href="/vehicles/parts">Parts</a></li>
        <li><a href="/vehicles/motorcycles">Motorcycles</a></li>
        <li><a href="/vehicles/trucks">Trucks</a></li>
        <li><a href="/vehicles/others">Others</a></li>
      </ul>
    </div>

    <!-- Reset filters -->
    <?php if(isset($_GET['car_type'],$_GET['condit'],$_GET['transm'])):?>
    <div class="chip red darken-2 reset-filters-chip">Reset filters <i class="close material-icons">close</i></div>
    <?php endif;?>

    <!-- show chip if car types filter is set -->
    <?php if(isset($_GET['car_type']) && $_GET['car_type'] > 0 ):?>
    <div class="chip"><b>Car types</b> <i class="close material-icons  close-car_types-chip">close</i></div>
    <?php endif;?>
    <!-- show chip if condition filter is set -->
    <?php if(isset($_GET['condit']) && $_GET['condit'] > 0):?>
    <div class="chip"><b>Condition </b> <i class="close material-icons  close-condition-chip">close</i></div>
    <?php endif;?>
    <!-- show chip is transmisson filter is set -->
    <?php if(isset($_GET['transm']) && $_GET['transm'] > 0 ):?>
    <div class="chip"><b>Transmisson </b> <i class="close material-icons  close-transmisson-chip">close</i></div>
    <?php endif;?>

    <!-- Price Filters -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Price</b></h6>
      <div class="input-field col s4  price-filter-wrapper">
        <input placeholder="Min" id="price_min" type="number"  min="0">
      </div>
      <div class="input-field col s4  price-filter-wrapper">
        <input placeholder="Max"  id="price_max" type="number" min="0">
      </div>
      <div  class="input-field col s2 price-filter-wrapper">
        <a  class="btn  price_filter_btn"><i class="material-icons">chevron_right</i></a>
     </div>
      <div  class="input-field col s2 price-filter-wrapper  price-clear-filter-wrapper">
        <a  class="btn red darken-3  price_filter_clear_btn  tooltipped"  data-posotion="top"  data-tooltip="Clear Price Filters"  data-delay"20"><i class="material-icons">clear</i></a>
     </div>
   </div>
   <!-- Type of car -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Type of car</b></h6>
     <div>
      <p><input  type="checkbox"  class="filled-in" id="car_type_1" /><label for="car_type_1">2 door (<?php echo App::get('database')->countCartypes("2 door");?>)</label></p>
      <p><input  type="checkbox"  class="filled-in" id="car_type_2"/><label  for="car_type_2">4 door (<?php echo App::get('database')->countCartypes("4 door");?>)</label></p>
      <p><input  type="checkbox"  class="filled-in" id="car_type_3" /><label  for="car_type_3">Convertible (<?php echo App::get('database')->countCartypes("Convertible");?>)</label></p>
      <p><input  type="checkbox"  class="filled-in" id="car_type_4"/><label  for="car_type_4">Van/Minivan  (<?php echo App::get('database')->countCartypes("Van/Minivan");?>)</label></p>
      <span id="car_type_show_more"><strong>Show more</strong></span>
      <div id="car_type_show_more_wrapper" class="visiblity-off">
        <p><input  type="checkbox"  class="filled-in" id="car_type_5" /><label  for="car_type_5">Sport Utility Vehicle (SUV) (<?php echo App::get('database')->countCartypes("Sport Utility Vehicle (SUV)");?>)</label></p>
        <p><input  type="checkbox"  class="filled-in" id="car_type_6"/><label  for="car_type_6">Pickup truck  (<?php echo App::get('database')->countCartypes("Pickup truck");?>)</label></p>
        <p><input  type="checkbox"  class="filled-in" id="car_type_7" /><label  for="car_type_7">Other  (<?php echo App::get('database')->countCartypes("Other");?>)</label></p>
        <span id="car_type_show_less"><strong>Show less</strong></span>
      </div>
     </div>
   </div>
   <!-- Condition -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Condition</b></h6>
     <div class="">
      <p><input  type="checkbox" class="filled-in"  id="cond_1" /><label  for="cond_1">New (<?php echo App::get('database')->countCarcondition("New");?>)</label></p>
      <p><input  type="checkbox"  class="filled-in" id="cond_2"/><label  for="cond_2">Used (<?php echo App::get('database')->countCarcondition("Used");?>)</label></p>
     </div>
   </div>
   <!-- Year Filters -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Year</b></h6>
      <div class="input-field col s4  price-filter-wrapper">
        <input placeholder="Min" id="year_min" type="number"  min="0">
      </div>
      <div class="input-field col s4  price-filter-wrapper">
        <input placeholder="Max"  id="year_max" type="number" min="0">
      </div>
      <div  class="input-field col s2 price-filter-wrapper">
        <a  class="btn  year_filter_btn"><i class="material-icons">chevron_right</i></a>
     </div>
      <div  class="input-field col s2 price-filter-wrapper  price-clear-filter-wrapper">
        <a  class="btn red darken-3  year_filter_clear_btn  tooltipped"  data-posotion="top"  data-tooltip="Clear Year Filters"  data-delay"20"><i class="material-icons">clear</i></a>
     </div>
   </div>
   <!-- Mileage Filters -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Mileage</b></h6>
      <div class="input-field col s4  price-filter-wrapper">
        <input  placeholder="Min" id="millage_min" type="number"  min="0">
      </div>
      <div class="input-field col s4  price-filter-wrapper">
        <input placeholder="Max"  id="millage_max" type="number" min="0">
      </div>
      <div  class="input-field col s2 price-filter-wrapper">
        <a  class="btn  millage_filter_btn"><i class="material-icons">chevron_right</i></a>
     </div>
      <div  class="input-field col s2 price-filter-wrapper  price-clear-filter-wrapper">
        <a  class="btn red darken-3  millage_filter_clear_btn  tooltipped"  data-posotion="top"  data-tooltip="Clear Millage Filters"  data-delay"20"><i class="material-icons">clear</i></a>
     </div>
   </div>
   <!-- Transmisson Filetsr-->
  <div  id="mini_work_exp" class="row filter_row_div">
    <h6 class="black-text"><b>Transmisson</b></h6>
    <p><input  type="checkbox" class="filled-in"  id="trans_1"/><label  for="trans_1">Automatic (<?php echo App::get('database')->countCartransmi("Automatic");?>)</label></p>
    <p><input  type="checkbox"  class="filled-in" id="trans_2" /><label  for="trans_2">Manual (<?php echo App::get('database')->countCartransmi("Manual");?>)</label></p>
    <p><input  type="checkbox" class="filled-in"  id="trans_3"/><label  for="trans_3">Automated Manual (<?php echo App::get('database')->countCartransmi("Automated Manual");?>)</label></p>
    <p><input  type="checkbox"  class="filled-in" id="trans_4" /><label  for="trans_4">Other (<?php echo App::get('database')->countCartransmi("Other");?>)</label></p>
   </div>
   <!-- Car Make -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Make</b></h6>
    <div>
      <ul>
      <?php
        $vehiclemakes = App::get('database')->vehicleMake();
          foreach($vehiclemakes as $vehiclemake){
           $makecount = App::get('database')->vehiclemakeCount($vehiclemake->make);
             echo "<li><a href=\"/vehicles/cars?make=$vehiclemake->make\">$vehiclemake->make <span style=\"color:gray; font-size:15px; font-weight:500;\" class=\"badge\">($makecount)</span></a></li>";
          }
        ?>
      </ul>
    </div>
   </div>
  </div>
  </div>
