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
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
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
                    <li>
                        <a href="/yenswape-mini-admin">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="/send-sms">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p><strong>Send Message</strong></p>
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
                        <a class="navbar-brand" href="#">Send Message</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
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
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Send SMS to User</h5>
                            </div>
                            <div class="card-body">
                                  <div class="row">
                                        <div class="col-md-12">
                                          <label><strong>Yenswape Uri:</strong>    http://www.yenswape.com/</label>
                                          <br/>
                                          <label><strong>Yeswape Android App Uri:</strong>      https://play.google.com/store/apps/details?id=yenswape.android.app&hl=en </label>
                                          <br/>
                                          <hr/>
                                            <div class="form-group">
                                                <label>Message Body</label>
                                                <textarea id="message"  rows="4" cols="80" class="form-control" placeholder="Message body"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input  id="mobile"   type="number" class="form-control" placeholder="Mobile">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                              <button  onclick="sendDraft()" type="button" class="btn waves-effect">Save Draft</button>
                                              <button   id="send-sms-btn"  onclick="sendSMS()" type="button" class="btn bg-primary waves-effect"><i class="now-ui-icons ui-1_email-85"></i> Send Message</button>
                                            </div>
                                        </div>
                                  </div>
                                 <script>

                                 if(localStorage.draft!= null){
                                   document.getElementById('message').value = localStorage.draft;
                                 }

                                function sendDraft(){
                                  let message = document.getElementById('message').value;
                                  if(message == false || message.length < 10) {
                                     alert("Message body is invalid!");
                                  }else {
                                     localStorage.setItem('draft', message);
                                     alert("Draft saved...");
                                  }
                                 }

                                function sendSMS(){
                                   let sendbutton = document.getElementById('send-sms-btn');
                                   let mobile = document.getElementById('mobile').value;
                                   let message = document.getElementById('message').value;
                                   if(mobile == false || mobile.length < 10 || mobile.length > 10){
                                      alert("Please enter a valid mobile number!");
                                   }else if (message == false || message.length < 10) {
                                       alert("Message body is invalid!");
                                   }else {
                                     sendbutton.innerHTML = "Sending SMS...";
                                     $('#send-sms-btn').attr('disabled', 'disabled');
                                     $.ajax({
                                      url: "../send-sms",
                                      type: "POST",
                                      data:{mobile:mobile,message:message},
                                      success:function(data){
                                       if(data == "success"){
                                          alert("SMS has been sent!");
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
                                 }
                               </script>
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
                        <a href="#" target="_blank">Vison 360 IT SOLUTIONS</a>.
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
</html>
