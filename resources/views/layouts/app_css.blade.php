<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    @php
        $setting = DB::table('settings')->whereSettingId(1)->first();
    @endphp
  <title>@yield('page_name')| {{$setting->site_title}}</title>
    <link rel="icon" href="{{$setting->site_favicon ? '/setting/'.$setting->site_favicon : 'favicon.ico'}}" type="image/x-icon">
  <!-- Custom CSS Files -->
  <link rel="stylesheet" href="/css/custom.css">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
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
  <link rel="stylesheet" href="/packages/toastr/toastr.css">

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
