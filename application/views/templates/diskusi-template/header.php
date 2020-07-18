<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title Page
			================================================== -->
  <title><?= $title; ?> | Media Diskusi STIKI Malang</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="<?= base_url('assets/images/icons/stiki.png'); ?>" />

  <!-- CSS 
			================================================== -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style-baru.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/night-mode.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/css/framework.css'); ?>" />

  <!-- Icons
			================================================== -->
  <link rel="stylesheet" href="<?= base_url('assets/css/icons.css'); ?>" />

  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- unicons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">

  <!-- Font
			================================================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- source sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  <!-- VueJS -->
  <!-- development version, includes helpful console warnings -->
  <script src="<?= base_url('assets/js/vue/vue.js'); ?>"></script>

  <!-- AXIOS -->
  <script src="<?= base_url('assets/js/axios/axios.js'); ?>"></script>

  <style>
    #main_header {
      box-shadow: none !important;
    }

    /* solusi untuk modal ketika dibuka tidak bisa diklik / warna hitam transparan */
    .modal-backdrop {
      display: none;
    }
  </style>

</head>

<body>
  <!-- Wrapper -->
  <div id="wrapper">