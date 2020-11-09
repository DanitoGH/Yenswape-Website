<div class="results-filters-div-wrapper">
   <div class="card-panel">
     <?php if(@$category !== null && @$sub_category === null):?>
      <div  class="breadcrumb-div-wrapper"><a href="https://www.yenswape.com">Home</a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($category);?></a></div>
    <?php endif;?>
    <?php if(@$category != null && $sub_category != null):?>
     <div class="breadcrumb-div-wrapper">
      <a href="https://www.yenswape.com">Home</a> <i class="fa fa-angle-right"></i><a href="/property"><?php echo ucfirst($category);?></a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($sub_category);?></a></div>
     <?php endif; ?>
     <br/>
     <div class="row">
      <ul class="">
        <li><h5 class="black-text">Category</h5></li>
        <li><h6><a href="/all-latest-ads?view-all">All Categories</a></h6></li>
        <li><a href="/property/apartments-for-rent">Apartments for Rent</a></li>
        <li><a href="/property/apartments-for-sale">Apartments for Sale</a></li>
        <li><a href="/property/commercial-property">Commercial Property</a></li>
        <li><a href="/property/land">Land</a></li>
        <li><a href="/property/office-shop">Office and Shops</a></li>
        <li><a href="/property/new-developments">New Developments</a></li>
        <li><a href="/property/others">Other</a></li>
      </ul>
    </div>
    <!-- Reset filters -->
    <?php if(isset($_GET['bedrooms'],$_GET['bathroom'],$_GET['broker_fee'])):?>
    <div class="chip red darken-2 reset-filters-chip">Reset filters <i class="close material-icons">close</i></div>
    <?php endif;?>
    <!-- show chip if bedroom filter is set -->
    <?php if(isset($_GET['bedrooms']) && $_GET['bedrooms'] > 0 ):?>
    <div class="chip"><b>Bedroom</b> <i class="close material-icons  close-bedroom-chip">close</i></div>
    <?php endif;?>
    <!-- show chip if bathroom filter is set -->
    <?php if(isset($_GET['bathroom']) && $_GET['bathroom'] > 0 ):?>
    <div class="chip"><b>Bathroom </b> <i class="close material-icons  close-bathroom-chip">close</i></div>
    <?php endif;?>
    <!-- show chip is if broker fee filter is set -->
    <?php if(isset($_GET['broker_fee']) && $_GET['broker_fee'] > 0 ):?>
    <div class="chip"><b>Broker fee</b> <i class="close material-icons  close-broker_fee-chip">close</i></div>
    <?php endif;?>
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
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Bedrooms</b></h6>
    <div>
     <input  type="checkbox"  class="filled-in" id="bedroom_1"/>
     <label for="bedroom_1">1 (<?php echo App::get('database')->countBedrooms('1');?>)</label>
    </div>
    <div>
     <input type="checkbox"  class="filled-in" id="bedroom_2"/>
     <label for="bedroom_2">2 (<?php echo App::get('database')->countBedrooms('2');?>)</label>
    </div>
    <div>
     <input type="checkbox"  class="filled-in" id="bedroom_3"/>
     <label for="bedroom_3">3 (<?php echo App::get('database')->countBedrooms('3');?>)</label>
    </div>
    <div>
     <input type="checkbox"  class="filled-in" id="bedroom_4"/>
     <label for="bedroom_4">4 (<?php echo App::get('database')->countBedrooms('4');?>)</label>
   </div>
   <div>
    <input type="checkbox"  class="filled-in" id="bedroom_5"/>
    <label for="bedroom_5">5+ (<?php echo App::get('database')->countBedrooms('5');?>)</label>
   </div>
  </div>
  <!-- Bathrooms -->
  <div class="row  filter_row_div">
    <h6 class="black-text"><b>Bathrooms</b></h6>
     <div>
      <input type="checkbox"  class="filled-in" id="bathroom_1"/>
      <label for="bathroom_1">1 (<?php echo App::get('database')->countBathrooms('1');?>)</label>
     </div>
     <div>
      <input type="checkbox"  class="filled-in" id="bathroom_2"/>
      <label for="bathroom_2">2 (<?php echo App::get('database')->countBathrooms('2');?>)</label>
    </div>
    <div>
     <input type="checkbox"  class="filled-in" id="bathroom_3"/>
     <label for="bathroom_3">3 (<?php echo App::get('database')->countBathrooms('3');?>)</label>
   </div>
   <div>
    <input type="checkbox"  class="filled-in" id="bathroom_4"/>
    <label for="bathroom_4">4 (<?php echo App::get('database')->countBathrooms('4');?>)</label>
  </div>
  <div>
   <input type="checkbox"  class="filled-in" id="bathroom_5"/>
   <label for="bathroom_5">5+ (<?php echo App::get('database')->countBathrooms('5');?>)</label>
  </div>
 </div>

 <!-- Is there a broker -->
 <div class="row  filter_row_div">
  <h6 class="black-text"><b>Is there a broker fee?</b></h6>
  <div>
   <input type="checkbox"  class="filled-in" id="broker_fee_1"/>
   <label for="broker_fee_1">Yes (<?php echo App::get('database')->brokerFee('Yes');?>)</label>
  </div>
  <div>
   <input type="checkbox"  class="filled-in" id="broker_fee_2"/>
   <label for="broker_fee_2">No (<?php echo App::get('database')->brokerFee('No');?>)</label>
  </div>
 </div>

</div>
</div>
