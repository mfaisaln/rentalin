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
  <?php $this->load->view('admin/navleft');?> 
    <div class="main-panel">
      <!-- Navbar -->
      <?php $this->load->view('admin/header');?> 
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
              <div class="row">
                <div class="col-9 ">
                  <h4 class="card-title"> Data Admin</h4>
                </div>
                <div class="col-3 d-flex justify-content-end" >
                  <a href="<?php  echo base_url('User/tambah'); ?>">
                    <button type="button" class="btn btn-primary">Tambah</button>
                  </a>
                </div>
                
                
              </div>  
                
              </div>
              <div class="card-body">
              <?php 
                        if($this->session->userdata('pesan') == ""){
                          
                ?>
                <?php
                        }else{        
                ?>    
                          <div class="alert alert-info">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="tim-icons icon-simple-remove"></i>
                            </button>
                            <span><?php echo $this->session->userdata('pesan')?></span>
                          </div>
                <?php
                        $this->session->set_userdata('pesan', '');
                        }
                ?>
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Username</th>
                        <th>Nama Admin</th>
                        <th >Akses</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i =1;
                        if(!empty($admin)){
                          
                          
                            foreach($admin as $data){
                              if ($data->akses==1) {
                                $lvl="Admin";
                              } else {
                                  $lvl="Pegawai";
                              }
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $i++;?></td>
                                <td><?php echo$data->username;?></td>
                                <td><?php echo$data->nama;?></td>
                                <td><?php echo $lvl;?></td>
                                <td class="td-actions text-right">
                                  <!-- <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                      <i class="tim-icons icon-single-02"></i>
                                  </button> -->
                                  <a href="<?php echo base_url("User/cari/".$data->username) ?>">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                  </a>
                                  <a href="#delete<?php echo $data->username;?>" data-toggle="modal">
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                  </a>
                                  
                                </td>
                                <!--Delete Modal -->
                                <div id="delete<?php echo $data->username; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                      <form method="post" action="<?php echo base_url('User/hapus'); ?>">
                                          
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Hapus</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <input type="hidden" name="delete_id" value="<?php echo $data->username; ?>">
                                                  <div class="alert alert-danger">Apakah anda yakin ingin menghapus Barang <strong>
                                                          <?php echo $data->nama; ?>?</strong> </div>
                                                  <div class="modal-footer">
                                                      
                                                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Tidak</button>
                                                      <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ya</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              


                            </tr>
                    <?php
                    
                        }      
                            }else{ 
                                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
                            }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Data User</h4>
              </div>
              <div class="card-body">
              <?php 
                        if($this->session->userdata('pesan') == ""){
                          
                ?>
                <?php
                        }else{        
                ?>    
                          <div class="alert alert-info">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                              <i class="tim-icons icon-simple-remove"></i>
                            </button>
                            <span><?php echo $this->session->userdata('pesan')?></span>
                          </div>
                <?php
                        $this->session->set_userdata('pesan', '');
                        }
                ?>
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th >Alamat</th>
                        <th >Foto</th>
                        <th>KTP</th>
                        <th>KK</th>
                        <th class="text-right">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i =1;
                        if(!empty($users)){
                          
                          
                            foreach($users as $data2){
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $i++;?></td>
                                <td><?php echo$data2->nama_user;?></td>
                                <td><?php echo$data2->email;?></td>
                                <td><?php echo$data2->telp;?></td>
                                <td><?php echo$data2->alamat;?></td>
                                <td><img src="<?php echo base_url('upload/produk/'.$data2->foto_users) ?>" width="64" /></td>
                                <td><img src="<?php echo base_url('upload/produk/'.$data2->ktp) ?>" width="64" /></td>
                                <td><img src="<?php echo base_url('upload/produk/'.$data2->kk) ?>" width="64" /></td>
                                <td class="td-actions text-right">
                                  <!-- <button type="button" rel="tooltip" class="btn btn-info btn-sm btn-round btn-icon">
                                      <i class="tim-icons icon-single-02"></i>
                                  </button> -->
                                  <!-- <a href="<?php echo base_url("Barang/cari/".$data2->id_user) ?>">
                                    <button type="button" rel="tooltip" class="btn btn-success btn-sm btn-round btn-icon">
                                        <i class="tim-icons icon-settings"></i>
                                    </button>
                                  </a> -->
                                  <a href="#delete<?php echo $data2->id_user;?>" data-toggle="modal">
                                    <button type="button" rel="tooltip" class="btn btn-danger btn-sm btn-round btn-icon">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                  </a>
                                  
                                </td>
                                <!--Delete Modal -->
                                <div id="delete<?php echo $data2->id_user; ?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                      <form method="post" action="<?php echo base_url('User/hapusU'); ?>">
                                          
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Hapus</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <input type="hidden" name="delete_id" value="<?php echo $data2->id_user ?>">
                                                  <div class="alert alert-danger">Apakah anda yakin ingin menghapus Barang <strong>
                                                          <?php echo $data2->nama_user; ?>?</strong> </div>
                                                  <div class="modal-footer">
                                                      
                                                      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Tidak</button>
                                                      <button type="submit" name="delete" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Ya</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                              


                            </tr>
                    <?php
                    
                        }      
                            }else{ 
                                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
                            }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <?php $this->load->view('admin/footer');?> 
    </div>
  </div>
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