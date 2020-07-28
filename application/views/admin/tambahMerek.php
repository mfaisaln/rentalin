<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="icon" type="image/png" href="images/DB_16х16.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Material Dashboard Lite</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">


    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">


    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100,700,900' rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- inject:css -->
    <?php $this->load->view('admin/css');?> 
    <!-- endinject -->
<script type="text/javascript">
function valid(theform)
{
    pola_nama=/^[a-zA-Z]*$/;
    if (!pola_nama.test(theform.nama_merek.value)){
    alert ('Hanya huruf yang diperbolehkan untuk Merek!');
    theform.nama_merek.focus();
    return false;
    }
    return (true);
}
</script>
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
        <?php $this->load->view('admin/header');?> 
        <?php $this->load->view('admin/navleft');?> 
        

        <main class="mdl-layout__content mdl-color--grey-100">
            <div class="mdl-card mdl-shadow--2dp employer-form" action="#">
                <div class="mdl-card__title">
                    <h2>Form</h2>
                    <div class="mdl-card__subtitle">Please complete the form</div>
                </div>
                <?php
                        if($this->session->userdata('pesan') == "0"){
                ?>
                            <div class="materialert danger">
                                <i class="material-icons">error_outline</i> <span>Gagal Menambahkan Data</span>
                            </div>
                <?php
                        $this->session->unset_userdata('pesan');
                        }else if($this->session->userdata('pesan') == ""){
                            
                ?>
                    
                <?php
                        $this->session->unset_userdata('pesan');
                        }else{
                ?>
                            <div class="materialert info">
                                <i class="material-icons">check_circle</i> <span>Berhasil Menambahkan Data</span>
                            </div>
                <?php
                        $this->session->unset_userdata('pesan');
                        }
                ?>
                <!-- <div class="materialert info">
                    <i class="material-icons">check_circle</i> <span>Tambah Barang Berhasil</span>
                </div>
                <div class="materialert danger">
                    <i class="material-icons">error_outline</i> <span>Tambah Barang Berhasil</span>
                </div> -->
                <div class="mdl-card__supporting-text">
                    <form name="theform" action="<?php echo base_url('Merek/aksi_tambah'); ?>" class="form" method="post" onSubmit="return valid(this);">
                        <div class="form__article">
                            <h3>Tambah Merek</h3>
                                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" id="firstName" value="Eiger" name="nama_merek" id="nama_merek" required=""/>
                                    <label class="mdl-textfield__label" for="firstName" name="nama_merek" id="nama_merek">Nama Merek</label>
                                </div>
                        </div>
                        <div class="mdl-card__actions">
                            
                            <input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right"value="Simpan" />
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

<!-- inject:js -->
<?php $this->load->view('admin/javascript');?> 
<!-- endinject -->

</body>
</html>

