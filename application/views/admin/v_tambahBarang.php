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
  <script type="text/javascript">
  function valid(theform)
  {
      pola_nama=/^[a-zA-Z]*$/;
      if (!pola_nama.test(theform.nama_merek.value)){
      
      demo.showdilarang('top','right','Hanya Huruf yang diperbolehkan untuk Merek!')
      theform.nama_merek.focus();
      return false;
      }
      return (true);
  }
  </script>
</head>

<body class="">
<div class="wrapper">
  <?php $this->load->view('admin/navleft');?> 
    <div class="main-panel">
      <!-- Navbar -->
      <?php $this->load->view('admin/header');?> 
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-8 col-xl-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Tambah Barang</h5>
              </div>
              <div class="card-body">
                <form name="theform" action="<?php echo base_url('Barang/aksi_tambah'); ?>" class="form" method="post" onSubmit="return valid(this);">
                <?php
                        if($this->session->userdata('pesan') == "0"){
                          
                ?>
                            <div class="alert alert-danger">
                              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                              </button>
                              <span>Data Merek Sudah ada</span>
                            </div>

                <?php
                        $this->session->set_userdata('pesan', '');
                        }else if($this->session->userdata('pesan') == ""){
                            
                ?>
                    
                <?php
                        }else{
                ?>
                            <div class="alert alert-info">
                              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="tim-icons icon-simple-remove"></i>
                              </button>
                              <span><?php echo $this->session->userdata('pesan') ?></span>
                            </div>
                <?php
                        $this->session->set_userdata('pesan', '');
                        }
                ?>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                    <div class="form-group">
                        <label>Nama barang</label>
                        <input type="text" class="form-control" placeholder="Nama Barang" required=""  name="nama_barang">
                      </div>
                    </div>
                    <div class="col-md-6 pl-md-1">
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" style="color:#808080;" required="" name="id_merek">
                        <?php
                          if( ! empty($merek)){ // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
                            foreach($merek as $data){
                        ?>
                              <option value="<?php echo $data->id_merek; ?>"><?php echo $data->nama_merek; ?></option>
                        <?php
                            }
                          }else{ 

                          }
                        ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" placeholder="Harga" required=""  name="harga">
                      </div>
                    </div>
                    <div class="col-md-6 pr-md-1">
                      <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" placeholder="Tahun" required=""  name="tahun">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-12">
                      <div class="form-group">
                        <label>Spesifikasi</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Input Spesifikasi" value="Mike" required="" name="spec"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-12">
                      <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Input description" value="Mike" required="" name="deskripsi"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pr-md-12">
                      <div class="d-flex justify-content-end" >
                        <input type="submit" class="btn btn-fill btn-primary" value="Simpan" />
                      </div>
                    </div>
                  </div>
                  

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php $this->load->view('admin/footer');?> 
    </div>
  </div>
  <?php $this->load->view('admin/plugin');?> 
  <?php $this->load->view('admin/javascript');?> 
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>