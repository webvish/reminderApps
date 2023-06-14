<!-- {{-- @inject('Route', 'Illuminate\Http\Route') --}} -->
<!DOCTYPE html>
<html lang="en">

<head>
   
   @php
    $title = empty($metaTag['var_meta_title']) ? PROJECT_NAME : PROJECT_NAME . ' | ' . $metaTag['var_meta_title'];
    $description = empty($metaTag['var_meta_description']) ? PROJECT_NAME : $metaTag['var_meta_description'] . ' | ' . PROJECT_NAME;
    //$keywords = empty($var_meta_keyword) ? PROJECT_NAME : $var_meta_keyword . ' | ' . PROJECT_NAME;
   @endphp
  <meta charset="utf-8">
   
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ $description }}">
  <meta name="author" content="">
  
  <title>{{ $title }}</title>
  <link href="{{URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{URL::asset('vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{URL::asset('vendor/select2/dist/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{URL::asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
