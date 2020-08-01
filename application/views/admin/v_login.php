<!--
=========================================================
* * Black Dashboard - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/black-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)


* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Black Dashboard by Creative Tim
  </title>
  <?php $this->load->view('admin/css');?> 
</head>

<body class="">
  <div class="wrapper">
    <div class="row d-flex justify-content-center align-self-center" style="padding-top:100px;">
      <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 " >
        <div class="card">
          <div class="card-body" style="padding:30px;">
            <h2 class="card-title">Login</h2>
            <?php
                  if($this->session->userdata('pesan') == '0'){
            ?>
                    <div class="alert alert-danger">
                      <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="tim-icons icon-simple-remove"></i>
                      </button>
                      <span>Gagal Login. Silahkan cek username atau password !</span>
                    </div>
            <?php
                  $this->session->set_userdata('pesan', '');
                  }
            ?>
            <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" placeholder="Enter Username" required="">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password "name="password" required="">
              </div>
              <div class="d-flex justify-content-end" >
                <button type="submit" class="btn btn-primary justify-content-center">Submit</button>
              </div>
            </form>
          </div>
        <div>
      </div>
    <div>
  </div>
</body>
<?php $this->load->view('admin/javascript');?> 
</html>