<div class="results-filters-div-wrapper">
   <div class="card-panel">
     <?php if(@$category !== null && @$sub_category === null):?>
      <div  class="breadcrumb-div-wrapper"><a href="https://yenswape.herokuapp.com">Home</a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($category);?></a></div>
    <?php endif;?>
    <?php if(@$category != null && $sub_category != null):?>
     <div class="breadcrumb-div-wrapper">
      <a href="https://yenswape.herokuapp.com">Home</a> <i class="fa fa-angle-right"></i><a href="/jobs-services"><?php echo ucfirst($category);?></a><i class="fa fa-angle-right"></i><a class="black-text  active-category"><?php echo ucfirst($sub_category);?></a></div>
     <?php endif; ?>
     <br/>
     <div class="row">
      <ul class="">
        <li><h5 class="black-text">Category</h5></li>
        <li><h6><a href="/all-latest-ads?view-all">All Categories</a></h6></li>
        <li><a href="/jobs-services/offered-jobs">Offered Jobs</a></li>
        <li><a href="/jobs-services/seeking-work">Seeking Work</a></li>
        <li><a href="/jobs-services/services">Services</a></li>
        <li><a href="/jobs-services/classes-courses">Classes - Courses</a> </li>
        <li><a href="/jobs-services/others">Others</a></li>
      </ul>
    </div>
    <!-- Reset filters -->
    <?php if(isset($_GET['post_categ'],$_GET['job_type'],$_GET['min_exp'],$_GET['max_exp'])):?>
    <div class="chip red darken-2 reset-filters-chip">Reset filters <i class="close material-icons">close</i></div>
    <?php endif;?>
    <!-- show chip if Post category filter is set -->
    <?php if(isset($_GET['post_categ']) && $_GET['post_categ'] > 0 ):?>
    <div class="chip"><b>Post category</b> <i class="close material-icons  close-post-category-chip">close</i></div>
    <?php endif;?>
    <!-- show chip if bathroom filter is set -->
    <?php if(isset($_GET['job_type']) && $_GET['job_type'] > 0 ):?>
    <div class="chip"><b>Job type </b> <i class="close material-icons  close-job-type-chip">close</i></div>
    <?php endif;?>
    <!-- show chip is if broker fee filter is set -->
    <?php if(isset($_GET['min_exp']) && $_GET['min_exp'] > 0 ):?>
    <div class="chip"><b>Minimum experience</b> <i class="close material-icons  close-minimum-exp-chip">close</i></div>
    <?php endif;?>
    <!-- show chip is if broker fee filter is set -->
    <?php if(isset($_GET['max_exp']) && $_GET['max_exp'] > 0 ):?>
    <div class="chip"><b>Maximum experience</b> <i class="close material-icons  close-maximum-exp-chip">close</i></div>
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
   <!-- Post types -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Post category</b></h6>
     <div>
      <p>
       <input  type="checkbox"  class="filled-in"   name="post-type"  id="post_cat_1" />
       <label  for="post_cat_1">Job Offers (<?php echo App::get('database')->countPostCat("offered-jobs");?>)</label>
      </p>
      <p>
       <input  type="checkbox"  class="filled-in" name="post-type"  id="post_cat_2"/>
       <label  for="post_cat_2">Job Seekers (<?php echo App::get('database')->countPostCat("seeking-work");?>)</label>
      </p>
     </div>
   </div>
   <!-- Job types -->
   <div class="row  filter_row_div">
    <h6 class="black-text"><b>Job type</b></h6>
    <p>
     <input  type="checkbox"  class="filled-in"   value"job-types"  id="job_type_1"/>
     <label  for="job_type_1">Full Time  (<?php echo App::get('database')->countJobtypes("Full Time");?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in"   value"job-types"  id="job_type_2"/>
     <label  for="job_type_2">Part Time  (<?php echo App::get('database')->countJobtypes("Part Time");?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in"    value"job-types"  id="job_type_3"/>
     <label  for="job_type_3">Contract  (<?php echo App::get('database')->countJobtypes("Contract");?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in"    value"job-types"  id="job_type_4"/>
     <label  for="job_type_4">Internship  (<?php echo App::get('database')->countJobtypes("Internship");?>)</label>
    </p>
   </div>
   <!-- Minimum work experience filters -->
  <div  id="mini_work_exp" class="row filter_row_div">
    <h6 class="black-text"><b>Minimum experience</b></h6>
    <p>
     <input  type="checkbox" class="filled-in"  name="min_exp"  value="1" id="min_exp_1"/>
     <label  for="min_exp_1">1 (<?php echo App::get('database')->countMinexp("1");?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="min_exp"  id="min_exp_2" />
     <label  for="min_exp_2">2 (<?php echo App::get('database')->countMinexp("2");?>)</label>
    </p>
    <p>
     <input   type="checkbox"  class="filled-in" name="min_exp" id="min_exp_3" />
     <label   for="min_exp_3">3 (<?php echo App::get('database')->countMinexp("3");?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="min_exp" id="min_exp_4" />
     <label  for="min_exp_4">4 (<?php echo App::get('database')->countMinexp("4");?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="min_exp" id="min_exp_5" />
     <label  for="min_exp_5">5+ (<?php echo App::get('database')->countMinexp("5");?>)</label>
    </p>
   </div>
   <!-- Maximum work experience filters -->
  <div class="row  filter_row_div">
    <h6 class="black-text"><b>Maximum experience</b></h6>
    <p>
     <input  type="checkbox"  class="filled-in" name="max_exp" value="1"  id="max_exp_1"/>
     <label  for="max_exp_1">1 (<?php echo App::get('database')->countMaxexp('1');?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="max_exp" value="2"  id="max_exp_2" />
     <label  for="max_exp_2">2 (<?php echo App::get('database')->countMaxexp('2');?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="max_exp" value="3"  id="max_exp_3" />
     <label  for="max_exp_3">3 (<?php echo App::get('database')->countMaxexp('3');?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="max_exp" value="4"  id="max_exp_4"/>
     <label  for="max_exp_4">4 (<?php echo App::get('database')->countMaxexp('4');?>)</label>
    </p>
    <p>
     <input  type="checkbox"  class="filled-in" name="max_exp" value="5"  id="max_exp_5"/>
     <label  for="max_exp_5">5+ (<?php echo App::get('database')->countMaxexp('5');?>)</label>
    </p>
   </div>
  </div>
  </div>
