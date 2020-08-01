<!doctype html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">

    <!-- CSS here -->
    <?php $this->load->view('css');?> 
</head>
<body>
    <header>
        <!-- Header Start -->
        <?php $this->load->view('header');?> 
        <!-- Header End -->
    </header>
    <main>
        
        <!--================login_part Area =================-->
        <?php foreach($users as $data){?>
        <section class="login_part ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                    <div class="feature-img align-items-center">
                        <img src="<?php echo base_url('upload/produk/'.$data->kk) ?>" style="width:100%;  padding-bottom:10px" />
                     </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Ubah Gambar KK ! <br>
                                    Ubah dengan data yang tepat</h3>
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
                                <form class="row contact_form" action="<?php echo base_url('Akun/UbahKK'); ?>" method="post" novalidate="novalidate"  enctype="multipart/form-data">
                                    <div class="col-md-12 form-group p_star">
                                        <div class="input-group mb-3">
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="customFile" name="kk">
                                            <label class="custom-file-label form-control" for="customFile">Pilih file KK</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 form-group">
                                        <!-- <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="selector">
                                            <label for="f-option">Remember me</label>
                                        </div> -->
                                        <button type="submit" value="submit" class="btn_3" id="btnSubmit">
                                            Simpan
                                        </button>
                                        <!-- <a class="lost_pass" href="#">forget password?</a> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?> 
        <!--================login_part end =================-->
    </main>
    <?php $this->load->view('footer');?> 
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->
    
    <!-- JS here -->

    <?php $this->load->view('javascript');?> 
    <script type="text/javascript">
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        $(function () {
            $("#btnSubmit").click(function () {
                var password = $("#txtPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) {
                    alert("Passowrd tidak sama!");
                    return false;
                }
                return true;
            });
        });
    </script>
</body>
    
</html>