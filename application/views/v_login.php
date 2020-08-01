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
        <section class="login_part section_padding ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_text text-center">
                            <div class="login_part_text_iner">
                                <h2>New to our Shop?</h2>
                                <p>There are advances being made in science and technology
                                    everyday, and a good example of this is the</p>
                                <a href="<?php echo base_url('Register'); ?>" class="btn_3">Create an Account</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="login_part_form">
                            <div class="login_part_form_iner">
                                <h3>Welcome Back ! <br>
                                    Please Sign in now</h3>
                                    
                                    <?php
                                            if($this->session->userdata('pesan') == "0"){
                                            
                                    ?>
                                                <div class="alert alert-danger">
                                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
                                                <span>Gagal Memproses</span>
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
                                <form class="row contact_form" action="<?php echo base_url('login/aksi_loginUser'); ?>" method="post" novalidate="novalidate">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="email" class="form-control" id="name" name="email" value="" required=""
                                            placeholder="Emial">
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="password" class="form-control" id="password" name="password" value="" required=""
                                            placeholder="Password">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        
                                        <button type="submit" value="submit" class="btn_3">
                                            log in
                                        </button>
                                        <a class="lost_pass" href="#">forget password?</a>
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

</body>
    
</html>