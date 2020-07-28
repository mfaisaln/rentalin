<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
    <?php $this->load->view('admin/header');?> 
    <?php $this->load->view('admin/navleft');?> 

    <main class="mdl-layout__content ">

        <div class="mdl-grid ui-tables">
            <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone">
                <div class="mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                        <div class="mdl-card__actions">
                            <h1 class="mdl-card__title-text pull-left">Kelola Merek</h1>
                            <a href="<?php $this->session->set_userdata('pesan', ''); echo base_url('Merek/tambah'); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-green pull-right">
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="mdl-card__supporting-text no-padding">
                        <table class="mdl-data-table mdl-js-data-table">
                            <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">#</th>
                                <th class="mdl-data-table__cell--non-numeric">Nama Merek</th>
                                <th class="mdl-data-table__cell--non-numeric">Tanggal Buat</th>
                                <th class="mdl-data-table__cell--non-numeric">Tanggal Update</th>
                                <th class="mdl-data-table__cell--non-numeric">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i =1;
                                if(!empty($merek)){
                                    
                                    foreach($merek as $data){
                            ?>
                                    <tr>
                                        <td class="mdl-data-table__cell--non-numeric"><?php echo $i++;?></td>
                                        <td class="mdl-data-table__cell--non-numeric"><?php echo$data->nama_merek;?></td>
                                        <td class="mdl-data-table__cell--non-numeric"><?php echo$data->CreationDate;?></td>
                                        <td class="mdl-data-table__cell--non-numeric"><?php echo$data->UpdationDate;?></td>
                                        <td class="mdl-data-table__cell--non-numeric">
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-orange">Edit</button>
                                            <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red" href="#modal1">Delete</button>
                                        </td>
                                    </tr>

                                <!-- <tr>
                                    <td class="mdl-data-table__cell--non-numeric">5</td>
                                    <td class="mdl-data-table__cell--non-numeric">Life of Pi</td>
                                    <td class="mdl-data-table__cell--non-numeric">Yann Martel</td>
                                    <td class="mdl-data-table__cell--non-numeric"><span class="label label--mini color--green">Fiction</span> </td>
                                    <td class="mdl-data-table__cell--non-numeric">
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">Edit</button>
                                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal">Delete</button>
                                    </td>
                                </tr> -->
                                <!-- Modal Structure -->
                                <div id="modal1" class="modal">
                                    <div class="modal-content">
                                    <h4>Modal Header</h4>
                                    <p>A bunch of text</p>
                                    </div>
                                    <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                                    </div>
                                </div>
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
    </main>
</div>

<!-- inject:js -->
<?php $this->load->view('admin/javascript');?> 
<!-- endinject -->

</body>
</html>