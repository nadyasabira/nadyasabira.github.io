<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-alpha.14
* @link https://tabler.io
* Copyright 2018-2020 The Tabler Authors
* Copyright 2018-2020 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
--> 
<link rel="icon" href="<?php echo base_url('assets/icon/logo.gif')?>" type="image/gif">
  <title>OEI Cake Bakery</title>
  <html lang="en">
    <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
      <!-- CSS files -->
      <link href="<?php echo base_url(); ?>assets/dist/libs/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/dist/css/tabler.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/dist/css/tabler-flags.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/dist/css/tabler-payments.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet"/>
      <link href="<?php echo base_url(); ?>assets/dist/css/demo.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->
      <!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" /> -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" />
      <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
      <link href="<?php echo base_url(); ?>assets/dist/libs/flatpickr/dist/flatpickr.min.css" rel="stylesheet"/>
      <style>
        body {
          display: none;
        }
        .help-block{
          color :red;
        }
        .dataTables_filter{
          margin-bottom : 30px;
        }
      </style>
      <!----- Library JS -->
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="<?php echo base_url(); ?>assets/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/dist/libs/jqvmap/dist/jquery.vmap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/dist/libs/jqvmap/dist/maps/jquery.vmap.world.js"></script>
      <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
      <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/dist/libs/flatpickr/dist/flatpickr.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- Tabler Core -->
      <script src="<?php echo base_url(); ?>assets/dist/js/tabler.min.js"></script> 
    </head>
    <body class="antialiased">
      <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img class="image my-3" border="0"src="<?php echo base_url(); ?>assets/static/logo.png" width="110px" alt="Tabler" class="navbar-brand-image">
          </a>
          <div class="navbar-nav flex-row d-lg-none">
            <div class="nav-item dropdown d-none d-md-flex mr-3">
              <a href="#" class="nav-link px-0" data-toggle="dropdown" tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                  <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                </svg>
                <span class="badge bg-red"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                <div class="card">
                  <div class="card-body">
                </div>
              </div>
            </div>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
              <span class="avatar avatar-sm" style="background-image: url(<?php echo base_url(); ?>assets/static/avatars/000m.jpg)"></span>
              <div class="d-none d-xl-block pl-2">
                <div class="mt-1 small text-muted">UI Designer</div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a href="<?php echo site_url("auth2/logout")?>" class="dropdown-item">Logout</a>
            </div>
          </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
          <ul class="navbar-nav pt-lg-3">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>Halutama" >
                <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                  </svg>
                </span>
                <span class="nav-link-title">Home</span>
              </a>
            </li>
            <?php
              if($this->session->userdata('level')=="Pegawai"){ 
            ?> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                  </span>Master Data</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bom/view_data_pr" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Bill of Material
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bahanbaku/view_data_pr" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Bahan Baku
                      </a>
                      <!--<a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bahanbaku/view_data_pr1" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Bahan Baku 1
                      </a>-->
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bahanpenolong/view_data_pr" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Bahan Penolong
                      </a>
                    </div>
                  </div>
                </div>
              </li> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                      <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                      <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                      <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                  </span>Form Permintaan</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/form_permintaan_bb" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Bahan Baku
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/form_permintaan_bp" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Bahan Penolong
                      </a>            
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <a class="nav-link" href="<?php echo base_url(); ?>index.php/pengeluaran_bb">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                      <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                      <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                    </svg>
                  </span>Pengeluaran Bahan Baku</span>
                </a>
              </li> 
              <?php
                }else {
              ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                  </span>Master Data</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/header" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Header Akun
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/akun" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data COA
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/konsumen" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Konsumen
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/beban" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Beban Beban
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bahanbaku/view_data" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Bahan Baku
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bahanpenolong/view_data" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Bahan Penolong
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/peralatan/view_data" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Peralatan
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/supplier/view_data" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Supplier
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/bom" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Bill of Material
                      </a>
                    </div>
                  </div>
                </div>
              </li>     
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-data" viewBox="0 0 16 16">
                      <path d="M4 11a1 1 0 1 1 2 0v1a1 1 0 1 1-2 0v-1zm6-4a1 1 0 1 1 2 0v5a1 1 0 1 1-2 0V7zM7 9a1 1 0 0 1 2 0v3a1 1 0 1 1-2 0V9z"/>
                      <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                      <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                    </svg>
                  </span>Data Permintaan</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/form_permintaan_bb/view_data_pemilik" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Bahan Baku
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/form_permintaan_bp/view_data_pemilik" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Bahan Penolong
                      </a>            
                    </div>
                  </div>  
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="birthday-cake" class="svg-inline--fa fa-birthday-cake fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                      <path fill="currentColor" d="M448 384c-28.02 0-31.26-32-74.5-32-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-43.547 0-46.653 32-74.75 32v-80c0-26.5 21.5-48 48-48h16V112h64v144h64V112h64v144h64V112h64v144h16c26.5 0 48 21.5 48 48v80zm0 128H0v-96c43.356 0 46.767-32 74.75-32 27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 27.488 0 31.252 32 74.5 32v96zM96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40z"></path>
                    </svg>
                  </span>Data Produk</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/menu" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Menu 
                      </a>
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/hargamenu" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> Data Harga Menu
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2" viewBox="0 0 16 16">
                      <path d="M4 10a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 0 1-2 0v-2zm3 0a1 1 0 1 1 2 0v2a1 1 0 0 1-2 0v-2z"/>
                      <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-.623l-1.844 6.456a.75.75 0 0 1-.722.544H3.69a.75.75 0 0 1-.722-.544L1.123 8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.163 8l1.714 6h8.246l1.714-6H2.163z"/>
                    </svg>
                  </span>Transaksi</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-header">Pembelian</div>
                  <a href="<?php echo base_url(); ?>index.php/pembelian" class="dropdown-item">Bahan Baku</a>
                  <a href="<?php echo base_url(); ?>index.php/pembelian_bp" class="dropdown-item">Bahan Penolong</a>
                  <a href="<?php echo base_url(); ?>index.php/pembelian_alat" class="dropdown-item">Peralatan</a>
                  <div class="dropdown-header">Penjualan</div>
                  <a href="<?php echo base_url(); ?>index.php/penjualan" class="dropdown-item">Transaksi Penjualan</a>
                  <a href="<?php echo base_url(); ?>index.php/pembayaran" class="dropdown-item">Konfirmasi Pembayaran</a>
                  <div class="dropdown-header">Lainnya</div>
                  <a href="<?php echo base_url(); ?>index.php/beban_angkut" class="dropdown-item">Biaya Angkut Pembelian</a>
                  <a href="<?php echo base_url(); ?>index.php/transaksi" class="dropdown-item">Pengeluaran Beban</a>
                  <a href="<?php echo base_url(); ?>index.php/modal" class="dropdown-item">Setoran Modal</a>
                </div>
              </li> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice-dollar" class="svg-inline--fa fa-file-invoice-dollar fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                      <path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07z"></path>
                    </svg>
                  </span>Laporan</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-header">Keuangan</div>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/C_Laporan/jurnal" >
                    <span class="d-md-none d-lg-inline-block">Laporan Jurnal Umum
                  </a>                    
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/C_Laporan/bukubesar" >
                    <span class="d-md-none d-lg-inline-block">Laporan Buku Besar
                  </a> 
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/C_Laporan/labarugi" >
                    <span class="d-md-none d-lg-inline-block">Laporan Laba Rugi
                  </a>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/kartu_stok/kartu_stok" >
                    <span class="d-md-none d-lg-inline-block">Kartu Stok
                  </a> 
                  <div class="dropdown-header">Pembelian</div>
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/lap_pembelian/input_periode" >
                    <span class="d-md-none d-lg-inline-block"> Pembelian Bahan Baku
                  </a>                    
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/lap_pembelian/input_periode_bp" >
                    <span class="d-md-none d-lg-inline-block">Pembelian Bahan Penolong
                  </a> 
                  <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/lap_pembelian/input_periode_alat" >
                    <span class="d-md-none d-lg-inline-block">Pembelian Peralatan
                  </a> 
                </div>
              </li> 
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                <span class="nav-link-icon d-md-none d-lg-inline-block"><i class="fa fa-line-chart"></i></span>Grafik 
              </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/chart_bb/input_bulan" >Pembelian Per Bulan</a>                   
                      <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/chart_bb/input" >Pembelian Per Tahun</a>                    
                    </div>
                  </div>       
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                    </svg>
                  </span>User</span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="<?php echo base_url(); ?>C_User/view_data" >
                        <span class="d-md-none d-lg-inline-block"><i class="fa fa-circle-o"></i> View User
                      </a>                    
                    </div>
                  </div>
                </div>
              </li> 
              <?php } ?>
            </aside>
            <div class="page">
              <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
                <div class="container-xl">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown d-none d-md-flex mr-3">
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                        <div class="card"></div>
                      </div>
                    </div>
                    <div class="nav-item dropdown">
                      <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                        <span class="avatar avatar-sm" style="background-image: url(<?php echo base_url(); ?>assets/static/avatars/pp.png)"></span>
                        <div class="d-none d-xl-block pl-2">
                          <?php echo $this->session->userdata('nama_lengkap') ." - " . $this->session->userdata('level')?>
                        </div>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a href="<?php echo site_url("auth2/logout")?>" class="dropdown-item">
                          <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/><path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                            </svg>
                          </span>Logout
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbar-menu"><div>
                </div>
              </div>
            </div>
          </header>
          <div class="page">
            <div class="content">
              <div class="container-fluid">
                <?php echo $contents;?>
              </div>
            </div>
          </div>
          <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">New report</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
                  </div>
                  <label class="form-label">Report type</label>
                  <div class="form-selectgroup-boxes row mb-3">
                    <div class="col-lg-6">
                      <label class="form-selectgroup-item">
                        <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
                          <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="mr-3">
                              <span class="form-selectgroup-check"></span>
                            </span>
                            <span class="form-selectgroup-label-content">
                              <span class="form-selectgroup-title strong mb-1">Simple</span>
                              <span class="d-block text-muted">Provide only basic data needed for the report</span>
                            </span>
                          </span>
                      </label>
                    </div>
                    <div class="col-lg-6">
                      <label class="form-selectgroup-item">
                        <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                          <span class="form-selectgroup-label d-flex align-items-center p-3">
                            <span class="mr-3">
                              <span class="form-selectgroup-check"></span>
                            </span>
                            <span class="form-selectgroup-label-content">
                              <span class="form-selectgroup-title strong mb-1">Advanced</span>
                              <span class="d-block text-muted">Insert charts and additional advanced analyses to be inserted in the report</span>
                            </span>
                          </span>
                      </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8">
                      <div class="mb-3">
                        <label class="form-label">Report url</label>
                          <div class="input-group input-group-flat">
                            <span class="input-group-text">
                              https://tabler.io/reports/
                            </span>
                            <input type="text" class="form-control pl-0"  value="report-01" autocomplete="off">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label">Visibility</label>
                          <select class="form-select">
                            <option value="1" selected>Private</option>
                            <option value="2">Public</option>
                            <option value="3">Hidden</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Client name</label>
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="mb-3">
                          <label class="form-label">Reporting period</label>
                          <input type="date" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div>
                          <label class="form-label">Additional information</label>
                          <textarea class="form-control" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">Cancel</a>
                    <a href="#" class="btn btn-primary ml-auto" data-dismiss="modal">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                      </svg>
                      Create new report
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Libs JS -->
            <script>
              document.body.style.display = "block"
            </script>
  </body>
</html>