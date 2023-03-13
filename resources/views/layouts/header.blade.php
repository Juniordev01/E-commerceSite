<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>

    <!-- General CSS Files -->
    {{-- <link rel="stylesheet" href="{{ asset('/Admin/css/app.min.css') }}"> --}}
    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('/Admin/css/style.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/Admin/css/all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/Admin/css/components.css') }}"> --}}
    
    <link rel="stylesheet" href="{{asset('Admin/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('Admin/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('Admin/css/custom.css')}} assets/css/custom.css">
    <link rel="stylesheet" href="{{asset('Admin/pretty-checkbox.min.css')}}">
    <!-- Custom style CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('/Admin/css/custom.css') }}"> --}}
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('/Admin/img/favicon.ico') }}' />
    {{-- <link rel="stylesheet" --}}
        {{-- href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    {{-- Extra Files --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> --}}

    {{-- Permission Table Library --}}
    {{-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'> --}}

    {{-- Char Js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
</head>
{{-- Roles Form Css --}}


<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.navbar');