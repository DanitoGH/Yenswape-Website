<div class="results-filters-div-wrapper">
   <div class="card-panel">
     <?php if(@$category !== null && @$sub_category === null):?>
      <div  class="breadcrumb-div-wrapper"><a href="https://yenswape.herokuapp.com">Home</a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($category);?></a></div>
    <?php endif;?>
    <?php if(@$category != null && $sub_category != null):?>
     <div class="breadcrumb-div-wrapper">
      <a href="https://yenswape.herokuapp.com">Home</a> <i class="fa fa-angle-right"></i><a href="/property"><?php echo ucfirst($category);?></a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($sub_category);?></a></div>
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
  </div>
  </div>
