 <div id="login_mod" class="modal login_modal">
  <div class="modal-content">
    <h5>Log in</h5>
    <div class="row">
    <div class="input-field">
        <input id="mobile" name="mobile" type="text" autocomplete="off" class="validate">
        <label for="mobile">Mobile</label>
    </div>
    <label class="errors" id="mobile_error"></label>
    </div>
    <div class="row">
    <div class="input-field">
        <input id="pin" name="pin" type="password" autocomplete="off" class="validate">
        <label for="pin">Pin</label>
    </div>
    <label id="pin_error" class="errors"></label>
    </div>
    <div class="input-field"> <span> 
        <input type="checkbox" id="remember_me" checked="checked"/>
        <label for="remember_me">Stay signed in</label> </span> 
    </div>
    <div class="login_div"> <a id="login" class="btn blue">
        <i id="login_spinner" class="fa" aria-hidden="true">
        </i>Log in</a> 
    </div>
    <section class="login_bottom">
    <p>
        <a href="#" id="recover_acc" class="recover_account">Forgot your Pin?</a>
    </p>
    <p>Don't have an account? <a href="#" id="register">Register now</a></p>
    </section>
  </div>
 </div>

<div id="register_mod" class="modal login_modal register_user">
 <div class="modal-content" style="padding-top:5px;">
  <div class="col s12 m12">
   <h6 class="right-align"><span class="close_account_model"><i class="fa fa-times" aria-hidden="true"></i></span></h6></div>
   <h5 class="left-align">Register</h5>
   <div><span id="pin-sent" style="color:#7cb342;"></span></div>
    <section class="pin_sender animated">
    <div class="row">
        <div class="input-field">
            <input id="mob_register" type="text" autocomplete="off" class="validate">
            <label for="mob_register">Mobile number</label>
        </div>
        <label id="pin_sender-error" class="errors"></label>
    </div>
    <div class="send_pin"> <a style="text-transform:none;" class="btn blue send-pinbtn"><i id="spinner" class="fa" aria-hidden="true"></i>Send my pin</a> </div>
    </section>
    <section class="register animated">
    <div class="row">
        <div class="input-field">
            <input id="first_name" type="text" autocomplete="off" class="validate">
            <label for="first_name">Firstname *</label>
        </div>
        <label id="fname-error" class="errors"></label>
    </div>
    <div class="row">
        <div class="input-field">
            <input id="last_name" type="text" autocomplete="off" class="validate">
            <label for="last_name">Lastname *</label>
        </div>
        <label id="lname-error" class="errors"></label>
    </div>
    <div class="row">
        <div class="input-field">
            <input id="reg_mobile" type="text" autocomplete="off" class="validate">
            <label for="reg_mobile">Mobile number</label>
        </div>
        <label id="remob-error" class="errors"></label>
    </div>
    <div class="row">
        <div class="input-field">
            <input id="reg_pin" type="password" autocomplete="off" class="validate">
            <label for="reg_pin">Pin</label>
        </div>
        <label id="repin-error" class="errors"></label>
    </div>
    <div class="input-field">
        <p>Didn't get your Pin? <a id="resend" href="#">resend</a></p>
    </div>
    <div class="login_div">
        <a class="btn blue register-btn"> <i id="register-spinner" class="fa" aria-hidden="true"></i>Register</a>
    </div>
    </section>
    <section class="register_bottom">
        <p>Already have an account ?<a href="#" id="rec_login"> Login</a></p>
    </section>
    <section class="register_agreement">
        <p>Creating an account means you've agreed to all Yenswape's <a href="/user-agreement">Terms of Use</a> and <a href="/user-privacy">Privacy Policy</a></p>
    </section>
    </div>
 </div>

 <div id="recover_mod" class="modal login_modal">
  <div class="modal-content">
  <h5>Recover your Pin</h5>
  <div class="row">
  <div class="input-field">
      <input id="recover_mobile" type="text" autocomplete="off" class="validate" data-length="10">
      <label for="recover_mobile">Mobile number</label>
  </div>
  <label id="recoverpin-error" class="errors"></label>
  </div>
  <div class="send_pin"> <a class="btn blue recover-btn"><i id="pin-rec_spinner" class="fa" aria-hidden="true"></i>Send my pin</a> </div>
  </div>
 </div>

 <div id="mob-filter_mod" class="modal login_modal mobile_filter">
  <div class="modal-content">
  <h5>Filters</h5>
   <form method="get" action="/search-results" id="mob_form">
   <div class="row">
      <div class="input-field filter_inputs"> <i class="fa fa-search" aria-hidden="true"></i>
        <input name="item" id="mob_items" autocomplete="off" placeholder="What are you looking for?" type="text" /> </div>
    </div>
    <div class="row">
        <div class="input-field filter_inputs"> <i class="fa fa-map-marker" aria-hidden="true"></i>
            <input name="location" id="mob_location" type="text" autocomplete="off" class="auto search-auto" placeholder="Find thousands of items near you.." /> </div>
    </div>
    <div class="send_pin"> 
        <a class="btn blue mobi_search">Search</a>
     </div>
    </form>
   </div>
 </div>

  <div id="report_ad" class="modal report_modal">
  <div class="modal-content" style="padding-top:5px !important;">
  <div class="col s12 m12">
  <h6 class="right-align"><span class="exit_report"><i class="fa fa-times" aria-hidden="true"></i></span></h6></div>
  <div class="col l12 xl12 s12 m12">
  <div class="row">
      <label class="message_labels">Select reason:</label>
      <div class="row">
          <div class="input-field">
              <select id="report_reason" class="browser-default">
                  <option disabled selected>Select</option>
                  <option value="Fraud/Scam/Offensive">Fraud/Scam/Offensive</option>
                  <option value="Prohibited">Prohibited</option>
                  <option value="Spam">Spam</option>
                  <option value="Outdated">Outdated</option>
                  <option value="Violation">Violation</option>
              </select>
          </div>
          <label id="reason-error"></label>
      </div>
      <div class="row">
          <div class="input-field">
              <textarea id="comment" class="materialize-textarea"></textarea>
              <label id="report-txtarea-lab" for="comment">Comments*</label>
          </div>
          <label id="comments-error"></label>
      </div>
      <div class="row"> </div>
      <h6 class="center-align report-header hide-on-small-only">Reporting An Issue</h6>
      <p class="report-content hide-on-small-only"> Reporting an issue helps insure the members of Yenswape.com are following correct procedures. It is your way to protect yourself as well. This is a confidential process. The member whose listing is reported will not know who reported it. Additionally, Yenswape's investigation will be handled privately, you will not receive a personal response to your reporting message. In most cases, Yenswape will work with a member privately to remedy the problem. If a seller or trader does not respond to Yenswape's communication or requests in a timely manner, the item may be removed, and the shop's selling privileges may be suspended and/or terminated. In some extreme cases, listings will be removed immediately. Please do not abuse the use of the reporting system by means of raising repeated, unjustified reports. </p>
      <div class="right-align report_btn"><a class="btn send-report_btn blue">Send report</a></div>
    </div>
   </div>
   </div>
  </div>

  <div id="filter_mod" class="modal results_modal">
  <div class="modal-content" style="padding-top:5px !important;">
  <div class="col l12 xl12">
      <h6 class="right-align"><span class="exit_filters"><i class="fa fa-times" aria-hidden="true"></i></span></h6></div>
  <h5 class="left-align categories">Filter search results</h5>
  <div class="row">
   <p>Sort results by:</p>
    <form method="get" action="/<?php echo $category;?>" id="filt_form">
      <?php if(isset($_GET['item'])):?>
        <input type="hidden" value="<?php echo $item;?>" name="item" />
        <input type="hidden" value="<?php echo $location;?>" name="location" />
        <?php endif;?>
            <?php if(isset($_GET['view-all'])): ?>
                <input type="hidden" name="view-all" />
                <?php endif;?>
    <p>
        <input class="with-gap" name="order" type="radio" value="date-new" id="lab1" />
        <label for="lab1">Date: Newest on top</label>
    </p>
    <p>
            <input class="with-gap" name="order" type="radio" value="date-old" id="lab2" />
            <label for="lab2">Date: Oldest on top</label>
        </p>
        <p>
            <input class="with-gap" name="order" type="radio" value="price-high" id="lab3" />
            <label for="lab3">Price: High to low</label>
        </p>
        <p>
            <input class="with-gap" name="order" type="radio" id="lab4" value="price-low" />
            <label for="lab4">Price : Low to high</label>
        </p>
        <p>Listing type:</p>
        <p>
            <input class="with-gap" name="listing" type="radio" value="swap" id="lab5" />
            <label for="lab5">Swap</label>
        </p>
        <p>
            <input class="with-gap" name="listing" type="radio" value="sell" id="lab6" />
            <label for="lab6">Sell</label>
        </p>
        <p>
            <input class="with-gap" name="listing" type="radio" value="swap or sell" id="lab7" />
            <label for="lab7">Swap or Sell</label>
        </p>
      </form>
      <div class="send_pin"> <a class="btn blue apply_filters">Apply Filters</a> </div>
  </div>
  </div>
</div>

<div id="form-2" class="modal upload_form">
 <div class="modal-content" style="padding-top:5px !important;">
  <div class="col s12 m12">
      <h6 class="right-align"><span class="ad_post_modal"><i class="fa fa-times" aria-hidden="true"></i></span></h6></div>
  <section id="cars-section" class="vehicle-cars animated">
      <div>
          <h6>Vehicles <i class="fa fa-long-arrow-right" aria-hidden="true"></i> cars</h6></div>
      <div class="row">
          <label id="make_error" class="make_label">Make*</label>
          <select class="browser-default" id="make">
              <option disabled selected>Select make</option>
          </select>
      </div>
      <input type="hidden" name="make" id="hidden_make" />
      <div class="row">
          <label id="model_error" class="model_label">Model*</label>
          <select name="model" class="browser-default" id="model">
              <option disabled selected>Select model</option>
          </select>
      </div>
      <div class="row">
          <label id="year_error" class="">Year*</label>
          <select id="year" class="browser-default">
              <option disabled selected>Select</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
          </select>
      </div>
      <div class="row">
          <label id="transm_error" class="transmn_label">Transmission*</label>
          <select id="transmission-type" name="transmission-type" class="browser-default">
              <option disabled selected>Select</option>
              <option value="Automatic">Automatic</option>
              <option value="Manual">Manual</option>
              <option value="Automated Manual">Automated Manual</option>
              <option value="other">Other</option>
          </select>
      </div>
      <div class="row">
          <label id="car_type_error" class="car-type_label">Type of car*</label>
          <select id="car-type" name="car-type" class="browser-default">
              <option disabled selected>Select</option>
              <option value="2 door">2 door</option>
              <option value="4 door">4 door</option>
              <option value="Convertible">Convertible</option>
              <option value="Van/Minivan">Van/Minivan</option>
              <option value="Sport Utility Vehicle (SUV)">Sport Utility Vehicle (SUV)</option>
              <option value="Pickup truck">Pickup truck</option>
              <option value="Other">Other</option>
          </select>
      </div>
      <div class="row">
          <div class="input-field">
              <input id="millage" type="text" data-length="12">
              <label for="millage">Millage*</label>
          </div>
          <label id="millage_error" class="errors-3"></label>
      </div>
      <div class="continue"> <a id="cars_continue" class="cars_btn btn blue">continue</a> </div>
  </section>
  <section class="vehicle-motocycles animated">
      <div class="row">
          <label style="margin-bottom:20px;">Motorcycle Make*</label>
          <select id="motorcycle-make" class="browser-default">
              <option disabled selected>select</option>
              <option>Aprilia</option>
              <option>Benzhou</option>
              <option>BMW</option>
              <option>Ducati</option>
              <option>Harley-Davidson</option>
              <option>Hadjin</option>
              <option>Honda</option>
              <option>Jialing</option>
              <option>Kawasaki</option>
              <option>Loncin</option>
              <option>Lifan</option>
              <option>Moto Guzzi</option>
              <option>Qingqi</option>
              <option>Sukida</option>
              <option>Suzuki</option>
              <option>Triumph</option>
              <option>Yamaha</option>
              <option>Zongshen</option>
              <option>Yingang</option>
              <option value="unknown">Other</option>
          </select>
          <label id="moto_error" class="errors-3"></label>
      </div>
      <div class="row">
          <div class="continue"> <a id="moto_continue" class="moto_btn btn blue">continue</a> </div>
      </div>
  </section>
  <section id="jobs-and-services-section" class="jobs-services animated">
      <div class="row company_employer_div_wrapper">
          <div class="input-field">
              <input id="employer" type="text" data-length="50">
              <label for="employer">Company / Employer*</label>
          </div>
          <div class="input-field deadline_wrapper">
              <input id="job_expiry_date" type="text" class="datepicker">
              <label for="job_expiry_date">Application deadline(optional)</label>
          </div>
      </div>
      <div class="row">
          <label id="job_type_error" class="make_label">Job type*</label>
          <select class="browser-default" id="job_type">
              <option value="null" disabled selected>Select job type</option>
              <option value="Full Time">Full Time</option>
              <option value="Part Time">Part Time</option>
              <option value="Contract">Contract</option>
              <option value="Internship">Internship</option>
          </select>
      </div>
      <div class="row">
          <label id="qualification_error" class="model_label">Minimum qualification*</label>
          <select class="browser-default" id="qualification">
              <option value="null" disabled selected>Select qualification</option>
              <option value="Ordinary Level">Ordinary Level</option>
              <option value="Advanced Level">Advanced Level</option>
              <option value="Higher National Diploma">Higher National Diploma</option>
              <option value="WASSCE / SHS">WASSCE / SHS</option>
              <option value="NTVI">NVTI</option>
              <option value="Degree">Degree</option>
              <option value="Masters">Masters</option>
              <option value="Doctorate">Doctorate</option>
              <option value="None">None</option>
          </select>
      </div>
      <div class="row">
          <label id="min_experience_error" class="">Minimum experience (years)*</label>
          <select id="min_experience" class="browser-default">
              <option value="null" disabled selected>Minimum experience</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
          </select>
      </div>
      <div class="row">
          <label id="max_experience_error" class="max_experience_label">Maximum experience (years)*</label>
          <select id="max_experience" class="browser-default">
              <option value="null" disabled selected>Maximum experience</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
          </select>
      </div>
      <div class="row">
          <div class="input-field col s12 m6 l6">
              <input id="salary_from" placeholder="GHS" min="0" type="text" data-length="10">
              <label for="salary_from">Salary From*</label>
          </div>
          <div class="input-field col s12 m6 l6">
              <input id="salary_to" type="text" min="0" placeholder="GHS" data-length="10">
              <label for="salary_to">Salary To*</label>
          </div>
      </div>
      <div class="continue"> <a id="jobs_continue" class="jobs_btn btn blue">continue</a> </div>
  </section>
  <section id="properties-section" class="property animated">
      <div class="row company_employer_div_wrapper">
          <div class="input-field">
              <input id="surface_size" type="number" min="0" data-length="20">
              <label for="surface_size">Surface size (m2)*</label>
          </div>
      </div>
      <div class="row select-label-div">
          <label class="">Bedrooms *</label>
          <br/>
          <select class="browser-default" id="bedrooms">
              <option value="null" disabled selected>Select bedrooms</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
      </div>
      <div class="row select-label-div">
          <label class="">Bathrooms *</label>
          <br/>
          <select class="browser-default" id="bathrooms">
              <option value="null" disabled selected>Select bathrooms</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
          </select>
      </div>
      <div class="row select-label-div">
          <label class="">Is there a broker fee? *</label>
          <select class="browser-default" id="broker_fee">
              <option value="null" disabled selected>Select</option>
              <option value="Yes">Yes</option>
              <option value="No">No</option>
          </select>
      </div>
      <br/>
      <div class="continue"> <a id="property_continue" class="property_btn btn blue">continue</a> </div>
  </section>
  <section class="final-step animated">
      <div class="row wishlist-holder">
          <div class="input-field col l12 s12 m12 ">
              <input id="wishlist" placeholder="Iphone 7, Tv, Ladies Wear, Movies, Books etc." type="text" data-length="25">
              <label for="wishlist">Wishlist *</label>
          </div>
          <label id="wislist" class="errors-4"></label>
      </div>
      <div class="row item_conditon_div_wrapper">
          <label style="margin-left:12px !important; font-size:14px;">Item Condition*</label>
          <div class="input-field col l12 s12 m12">
              <select id="item-condition" class="browser-default">
                  <option disabled selected>select</option>
                  <option value="New">New</option>
                  <option value="Used">Used</option>
                  <option value="Other">Other</option>
              </select>
          </div>
          <label id="item_cond-error" class="errors-4"></label>
      </div>
      <div class="row description-div">
          <div class="row">
              <div class="input-field col l12 s12 m12">
                  <textarea id="description" class="materialize-textarea" placeholder="" maxlength="500" data-length="500"></textarea>
                  <label id="job_description" for="description">Description*</label>
              </div>
              <label id="descrip_error" class="errors-4"></label>
          </div>
      </div>
      <div class="row price_div_wrapper">
          <div class="price input-field col l7 s7 m7">
              <input id="price" type="text" placeholder="GHS" data-length="9">
              <label id="forprice" for="price">Price*</label>
          </div>
          <div class="input-field col l5 s5 m5">
              <p>
                  <input type="checkbox" id="negotiation" checked="checked" />
                  <label for="negotiation">Negotiable</label>
              </p>
          </div>
          <label id="price_error" class="errors-4"></label>
      </div>
      <div class="row">
          <div class="input-field col l12 s12 m12">
              <input id="poster-name" value="<?php if(isLoggedIn()){echo fullName();}?>" type="text" data-length="24">
              <label for="input_text">Name*</label>
          </div>
          <label id="name_error" class="errors-4"></label>
      </div>
      <div class="row">
          <div class="input-field col l12 s12 m12">
              <input id="poster-mobile" value="<?php if(isLoggedIn()){echo UserMobile();}?>" type="number" data-length="10">
              <label for="mobile">Mobile*</label>
          </div>
          <label id="mobile-error" class="errors-4"></label>
      </div>
      <div class="col xl12 s12 m12 submit"> <a class="add_more btn blue post_ad-btn"><i id="post-ad_spinner" class="fa" aria-hidden="true"></i><span id="post_ad_span">Post ad</span></a>
          <br><span class="legal-agreement-span">By clicking 'Post ad' you agree to our <a target="_blank" href="/user-agreement">Terms of Use</a></span> </div>
  </section>
  <!-- Post update modal section blocks -->

  <section id="cars-section" class="update-vehicle-cars animated">
      <div>
          <h6>Vehicles <i class="fa fa-long-arrow-right" aria-hidden="true"></i> cars</h6></div>
      <div class="row">
          <label id="up_make_error" class="make_label">Make*</label>
          <select class="browser-default" id="make_update">
              <option disabled selected>Select make</option>
          </select>
      </div>
      <input type="hidden" name="make" id="hidd_make_update" />
      <input type="hidden" name="new_make" id="hidd_make" value="<?php echo @$ad_datail->make;?>" />
      <div class="row">
          <label id="up_model_error" class="model_label">Model*</label>
          <select name="model" class="browser-default" id="model_update">
              <option value="<?php echo @$ad_datail->model;?>" selected>
                  <?php echo @$ad_datail->model;?>
              </option>
          </select>
      </div>
      <div class="row">
          <label id="up_year_error" class="">Year*</label>
          <select id="year_update" class="browser-default">
              <option value="<?php echo @$ad_datail->year;?>" selected>
                  <?php echo @$ad_datail->year;?>
              </option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
              <option value="1996">1996</option>
              <option value="1997">1997</option>
              <option value="1998">1998</option>
              <option value="1999">1999</option>
              <option value="2000">2000</option>
              <option value="2001">2001</option>
              <option value="2002">2002</option>
              <option value="2003">2003</option>
              <option value="2004">2004</option>
              <option value="2005">2005</option>
              <option value="2006">2006</option>
              <option value="2007">2007</option>
              <option value="2008">2008</option>
              <option value="2009">2009</option>
              <option value="2010">2010</option>
              <option value="2011">2011</option>
              <option value="2012">2012</option>
              <option value="2013">2013</option>
              <option value="2014">2014</option>
              <option value="2015">2015</option>
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2017">2018</option>
              <option value="2017">2019</option>
              <option value="2017">2020</option>
          </select>
      </div>
      <div class="row">
          <label id="up_transm_error" class="transmn_label">Transmission*</label>
          <select id="transmission-type_update" name="transmission-type" class="browser-default">
              <option value="<?php echo @$ad_datail->transmission;?>" selected>
                  <?php echo @$ad_datail->transmission;?>
              </option>
              <option value="Automatic">Automatic</option>
              <option value="Manual">Manual</option>
              <option value="Automated Manual">Automated Manual</option>
              <option value="other">Other</option>
          </select>
   
  <div id="contact_info" class="modal call_modal login_modal">
  <div class="modal-content">
    <div class="right-align">
        <span class="copy-number" style="color:#fff; float:left; cursor:pointer;">Copy to clipboard</span><span style="color:#fff;" class="exit_ownerbumber"><i class="fa fa-times" aria-hidden="true"></i></span>
    </div>
    <div class="center-align">
       <input style="color:dimgray; font-size:15px;" type="text" id="contact-owner" /> 
    </div>
   </div>
  </div>
