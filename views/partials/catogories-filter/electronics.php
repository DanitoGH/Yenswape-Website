<div class="results-filters-div-wrapper">
   <div class="card-panel">
     <?php if(@$category !== null && @$sub_category === null):?>
      <div  class="breadcrumb-div-wrapper"><a href="https://yenswape.herokuapp.com">Home</a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($category);?></a></div>
    <?php endif;?>
    <?php if(@$category != null && $sub_category != null):?>
     <div class="breadcrumb-div-wrapper">
      <a href="https://yenswape.herokuapp.com">Home</a> <i class="fa fa-angle-right"></i><a href="/electronics"><?php echo ucfirst($category);?></a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($sub_category);?></a></div>
     <?php endif; ?>
     <br/>
      <ul class="">
        <li><h5 class="black-text">Category</h5></li>
        <li><h6><a href="/all-latest-ads?view-all">All Categories</a></h6></li>
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
