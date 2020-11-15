<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Yenswape Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                    <strong>YENSWAPE MINI ADMIN</strong>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="/yenswape-mini-admin">
                            <i class="now-ui-icons design_app"></i>
                            <p><strong>Dashboard</strong></p>
                        </a>
                    </li>
                    <li>
                      <a href="/send-sms">
                          <i class="now-ui-icons ui-1_email-85"></i>
                          <p>Send Message</p>
                      </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#">Dashboard</a>
                    </div>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="now-ui-icons media-2_sound-wave"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-lg">
                <canvas id="bigDashboardChart"></canvas>
            </div>
            <div class="content">
                <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="card-header">
                            <h5 class="card-category">All Pending Uploads</h5>
                            <h4 class="card-title"> Yenswape Latest Uploads</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th >
                                    <strong>Title</strong>
                                  </th>
                                  <th >
                                    <strong>Status</strong>
                                  </th>
                                  <th >
                                    <strong>Preview</strong>
                                  </th>
                                  <th>
                                    <strong>Approve</strong>
                                  </th>
                                  <th>
                                    <strong>Delete</strong>
                                  </th>
                                </thead>
                                <tbody>
                                <?php foreach($pending_Ads as $pending_ads):?>
                                  <tr>
                                    <td class="text-left">
                                      <?php echo $pending_ads->title; ?>
                                    </td>
                                    <td>
                                      <?php
                                        $status = "";
                                       if($pending_ads->status == 0){
                                         $status = "Pending";
                                       }else if($pending_ads->status == 1){
                                         $status = "Active";
                                       }
                                      echo $status;
                                      ?>
                                    </td>
                                    <td>
                                     <button  onclick="preview('<?php echo $pending_ads->uri;?>')"   type="button" class="btn waves-effect">Preview</button>
                                    </td>
                                    <td>
                                     <button  onclick="Action(<?php echo $pending_ads->custom_id;?>)"  type="button" class="btn bg-primary waves-effect">Approve</button>
                                    </td>
                                    <td>
                                     <button  onclick="deleteAd(<?php echo $pending_ads->custom_id;?>)"  type="button" class="btn bg-secondary waves-effect">Delete</button>
                                    </td>
                                  </tr>
                                </tbody>
                                <script>

                               function Action(customid){
                                  $.ajax({
                                   url: "../change-upload-state",
                                   type: "POST",
                                   data:{custom_id:customid},
                                   success:function(data){
                                    if(data == "success"){
                                       alert("Ad has been approved!");
                                        location.reload();
                                     }else {
                                       alert(data)
                                     }
                                    },
                                   error:function(data) {
                                      alert(data.message)
                                   }
                                 })
                                }

                              function preview(url){
                                  window.open("https://yenswape.herokuapp.com/item/"+url+"",'_blank');
                              }

                              function deleteAd(customid){
                                  $.ajax({
                                   url: "../delete-ad",
                                   type: "POST",
                                   data:{custom_id:customid},
                                   success:function(data){
                                    if(data == "success"){
                                       alert("Ad has been DELETED!");
                                        location.reload();
                                     }else {
                                       alert(data)
                                     }
                                    },
                                   error:function(data) {
                                      alert(data.message)
                                   }
                                 })
                                }

                              </script>
                              <?php endforeach; ?>
                            </table>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, Designed and Coded by
                        <a href="#" target="_blank">Vison 360 IT SOLUTIONS</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>
<script>
  $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
  });

  if(localStorage.newsads == null){
    localStorage.setItem('newsads', 0);
   }

 setInterval(function(){
    $.ajax({
     url:"../count-new-ads",
     type:"POST",
     timeout:20000,
     success:function(data){
        if(data > 0){
          if(data != localStorage.newsads){
            localStorage.setItem('newsads', data);
            location.reload();
          }
        }
      },
     error:function(data) {
       //alert(data.message)
     }
    })
  },180000); // 3 min timer
</script>

</html>
