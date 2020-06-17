<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('admin/dash/images/favicon.ico')}}" type="image/ico"/>

    <title>Yota</title>

    <!-- Bootstrap -->
    <link href="{{asset('admin/dash/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/dash/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/dash/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/dash/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{asset('admin/dash/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('admin/dash/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('admin/dash/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('admin/dash/build/css/custom.min.css')}}" rel="stylesheet">



</head>

<body class="nav-md" >
<div class="container body" id="app">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><img src="/public/admin/images/logo.png" alt="" style="width: 45px; height: 45px; border-radius: 25px;"> <span>TimCRM</span></a>
                </div>

                <div class="clearfix"></div>

