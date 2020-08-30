<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

  <title>@yield('page_name')| {{$settings->site_title}}</title>
    <link rel="icon" href="{{$settings->site_favicon ? '/setting/'.$settings->site_favicon : 'favicon.ico'}}" type="image/x-icon">
  <!-- Custom CSS Files -->
  <link rel="stylesheet" href="/css/custom.css">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">

 
  <!-- Template CSS -->
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/components.css">

  <!-- PACKAGES -->
  <link rel="stylesheet" href="/packages/DataTables/datatables.min.css">
  <link rel="stylesheet" href="/packages/DataTables/DataTables-1.10.20/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="/packages/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/packages/DataTables/DataTables-1.10.20/css/dataTables.foundation.min.css">
  <link rel="stylesheet" href="/packages/DataTables/DataTables-1.10.20/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href="/packages/DataTables/DataTables-1.10.20/css/dataTables.semanticui.min.css">
  <link rel="stylesheet" href="/packages/DataTables/DataTables-1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


 <script src="https://kit.fontawesome.com/5a09bb06be.js" crossorigin="anonymous"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

</head>

<body>
<style>

</style>
<!-- Preloader CSS & JS are in Custom-->
<div class="spinner-wrapper">
<div class="sk-folding-cube">
  <div class="sk-cube1 sk-cube"></div>
  <div class="sk-cube2 sk-cube"></div>
  <div class="sk-cube4 sk-cube"></div>
  <div class="sk-cube3 sk-cube"></div>
</div>
</div>
<!-- Preloader -->
  <div id="app">
    <div class="main-wrapper">
