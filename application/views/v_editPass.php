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
        <section class="login_part ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <!-- <a href="<?php echo base_url('Login/User'); ?>" class="btn_3">Login us now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Ubah Password !<br>
                                    Ubah Password Dengan Benar</h3>
                                    <?php
                                            if($this->session->userdata('pesan') == "0"){
                                            
                                    ?>
                                                <div class="alert alert-danger">
                                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                                <span>Inputan Password Lama Anda harus Benar !!</span>
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
                                <form class="row contact_form" action="<?php echo base_url('Akun/aksi_EditPass'); ?>" method="post" novalidate="novalidate"  enctype="multipart/form-data">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="passwordLama" value="" required=""
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="txtPassword" name="password" value=""
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="txtConfirmPassword" name="password" value=""
                                            placeholder="Konfirmasi Password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <!-- <div class="creat_account d-flex align-items-center">
                                            <input type="checkbox" id="f-option" name="selector">
                                            <label for="f-option">Remember me</label>
                                        </div> -->
                                        <button type="submit" value="submit" class="btn_3" id="btnSubmit">
                                            Registrasi
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