<div class="results-filters-div-wrapper">
   <div class="card-panel">
     <?php if(@$category !== null && @$sub_category === null):?>
      <div  class="breadcrumb-div-wrapper"><a href="https://yenswape.herokuapp.com">Home</a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($category);?></a></div>
    <?php endif;?>
    <?php if(@$category != null && $sub_category != null):?>
     <div class="breadcrumb-div-wrapper">
      <a href="https://yenswape.herokuapp.com">Home</a> <i class="fa fa-angle-right"></i><a href="/home-garden"><?php echo ucfirst($category);?></a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($sub_category);?></a></div>
     <?php endif; ?>
     <br/>
      <ul class="">
        <li><h5 class="black-text">Category</h5></li>
        <li><h6><a href="/all-latest-ads?view-all">All Categories</a></h6></li>
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
