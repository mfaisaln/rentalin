<!doctype html>
<html class="no-js" lang="zxx">
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
   <!-- Preloader Start -->
   <div id="preloader-active">
      <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
               <div class="preloader-circle"></div>
               <div class="preloader-img pere-text">
                  <img src="assets/img/logo/logo.png" alt="">
               </div>
            </div>
      </div>
   </div>
   <!-- Preloader Start-->
   <header>
   <?php $this->load->view('header');?> 
      <!-- Header End -->
   </header>
      <main>
      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding" style="padding-bottom: 0px; padding-top: 50px;">
            <div class="container order_box">
               <div class="row">
               <?php foreach($users as $data){?>
                  <div class="col-lg-5 posts-list">
                     <div class="feature-img">
                        <img src="<?php echo base_url('upload/produk/'.$data->foto_users) ?>" style="width:100%" />
                     </div>
                  </div> 
                  <div class="col-lg-7">
                     <div class="single-post">
                        <div class="">
                           <div class="blog_details">
                              <h2 style="font-size:40px"><?php echo $data->nama_user?>
                              </h2>
                              <ul class="blog-info-link mt-3 mb-4">
                                 <li><a href="#"><i class="fa fa-users "></i> Peminjam</a></li>   
                                 <li><a href="#"><i class="fa fa-phone"></i> <?php echo $data->telp?></a></li>
                                 <li><a href="#"><i class="fa fa-envelope"></i> <?php echo $data->email?></a></li>    
                              </ul>
                              <p class="excert">
                              <strong>Alamat: </strong>
                                <?php echo $data->alamat?>
                              </p>
                              <p class="excert">
                              <strong>Deskripsi: </strong>
                              
                                 MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                                 should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                                 fraction of the camp price. However, who has the willpower
                              </p>
                              <p class="excert">
                                    <strong style="padding-right:10px;">KTP: </strong> <img src="<?php echo base_url('upload/produk/'.$data->ktp) ?>" width="64" />
                                    <strong style="padding-right:10px;">KTP: </strong> <img src="<?php echo base_url('upload/produk/'.$data->kk) ?>" width="64" />
                                </p>
                              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                 type="submit">Ubah</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?> 
               </div>
            </div>
      </section>
      
      <!--================ Blog Area end =================-->
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