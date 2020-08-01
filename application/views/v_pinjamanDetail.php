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
      <!-- Hero Area Start-->
      <!-- <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
               <div class="container">
                  <div class="row">
                        <div class="col-xl-12">
                           <div class="hero-cap text-center">
                              <h2>Blog details</h2>
                           </div>
                        </div>
                  </div>
               </div>
            </div>
      </div> -->
      
      <!--================Blog Area =================-->
      <section class="blog_area single-post-area section-padding" style="padding-bottom: 0px; padding-top: 50px;">
            <div class="container order_box">
               <div class="row">
               <?php foreach($barang as $data){?>
                  <div class="col-lg-5 posts-list">
                     <div class="feature-img">
                        <img src="<?php echo base_url('upload/produk/'.$data->image1) ?>" style="width:100%" />
                     </div>
                  </div> 
                  <div class="col-lg-7">
                     <div class="single-post">
                        <div class="">
                           <div class="blog_details">
                              <h2 style="font-size:40px"><?php echo $data->nama_barang?>
                              </h2>
                              <ul class="blog-info-link mt-3 mb-4">
                                 <li><a href="#"><i class="fa fa-list-alt"></i> Travel</a></li>   
                                 <li><a href="#"><i class="fa fa-map-marker"></i> Kiaracondong, Bandung</a></li>  
                              </ul>
                              <h5 style="font-size:25px">
                                 <strong>
                                    <?php
                                       $hasil_rupiah = "Rp " . number_format($data->harga,2,',','.');
                                       echo $hasil_rupiah;
                                    ?>
                                 
                                 </strong> /Hari
                           
                              </h5>
                              <div class=" text-center">
                                 <div class="card_area">
                                    <div class="product_count_area" style="justify-content: left;">
                                       
                                       <div class="product_count d-inline-block" style="margin-left: 0px;">
                                          <span class="product_count_item inumber-decrement"> <i class="ti-minus"></i></span>
                                          <input class="product_count_item input-number" type="text" value="1" min="0" max="10">
                                          <span class="product_count_item number-increment"> <i class="ti-plus"></i></span>
                                       </div>
                                       <p >Jumlah</p>
                                    </div>
                                 </div>
                              </div>
                              <p class="excert">
                              
                                 MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                                 should have to spend money on boot camp when you can get the MCSE study materials yourself at a
                                 fraction of the camp price. However, who has the willpower
                              </p>
                              <?php
                                 if($this->session->userdata('status') == "login"){
                              ?>
                              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                 type="submit">Pinjam</button>
                              <?php
                                 }else{

                              ?>
                              <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                 type="submit">Login Untuk Meminjam</button>
                              <?php
                                 }
                              ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?> 
               </div>
            </div>
      </section>
      <section class="popular-items latest-padding" style="padding-top: 50px;padding-bottom: 0px;">
            <div class="container ">
                <div class="row product-btn justify-content-between mb-40" style="margin-bottom: 0px;">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>                                                      
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Spesifikasi</a>
                                <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Most populer </a> -->
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                    <!-- Grid and List view -->
                    <div class="grid-list-view">
                    </div>
                    <!-- Select items -->
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                           <div class="blog_details" style="padding-top:10px; width:100%">
                              <h2>Deskripsi
                              </h2>
                              <ul class="blog-info-link mt-3 mb-4">
                                 <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                 <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                              </ul>
                              <p class="excert">
                                 <?php echo $data->deskripsi ?>
                              </p>
                              
                           </div>
                        </div>
                    </div>
                    <!-- Card two -->
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                           <div class="blog_details" style="padding-top:10px;">
                                 <h2>Spesifikasi
                                 </h2>
                                 <ul class="blog-info-link mt-3 mb-4">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                 </ul>
                                 <p class="excert">
                                    <?php echo $data->spec ?>
                                 </p>
                                 
                              </div>
                        </div>
                    </div>
                    <!-- Card three -->
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/gallery/popular1.png" alt="">
                                        <div class="img-cap">
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                        <span>$ 45,743</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/gallery/popular2.png" alt="">
                                        <div class="img-cap">
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                        <span>$ 45,743</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/gallery/popular3.png" alt="">
                                        <div class="img-cap">
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                        <span>$ 45,743</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/gallery/popular4.png" alt="">
                                        <div class="img-cap">
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                        <span>$ 45,743</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/gallery/popular5.png" alt="">
                                        <div class="img-cap">
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                        <span>$ 45,743</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="single-popular-items mb-50 text-center">
                                    <div class="popular-img">
                                        <img src="assets/img/gallery/popular6.png" alt="">
                                        <div class="img-cap">
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="favorit-items">
                                            <span class="flaticon-heart"></span>
                                        </div>
                                    </div>
                                    <div class="popular-caption">
                                        <h3><a href="product_details.html">Thermo Ball Etip Gloves</a></h3>
                                        <span>$ 45,743</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                     <h4>03 Ulasan</h4>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="<?php echo site_url('assets2/img/comment/comment_1.png') ?>" alt="">
                              </div>
                              <div class="desc">
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <p class="date" style="margin-left: 0px;"><strong>Emilly Blun - </strong> December 4, 2017 at 3:12 pm </p>
                                    </div>
                                 </div>
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="<?php echo site_url('assets2/img/comment/comment_2.png') ?>" alt="">
                              </div>
                              <div class="desc">
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <p class="date" style="margin-left: 0px;"><strong>Emilly Blun - </strong> December 4, 2017 at 3:12 pm </p>
                                    </div>
                                 </div>
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                           <div class="user justify-content-between d-flex">
                              <div class="thumb">
                                 <img src="<?php echo site_url('assets2/img/comment/comment_3.png') ?>" alt="">
                              </div>
                              <div class="desc">
                                 <div class="d-flex justify-content-between">
                                    <div class="d-flex align-items-center">
                                       <p class="date" style="margin-left: 0px;"><strong>Emilly Blun - </strong> December 4, 2017 at 3:12 pm </p>
                                    </div>
                                 </div>
                                 <p class="comment">
                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                <!-- End Nav Card -->
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