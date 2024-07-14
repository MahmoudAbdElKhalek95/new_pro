<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>

        <title> @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="href="{{  asset('store/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="href="{{  asset('store/assets/css/slider/dist/sheetslider.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="href="{{  asset('store/assets/css/styles.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

  <body>

     @yield('content')

     @extends('store.includes.header')
     @extends('store.includes.slider')

  <!-- external scripts  -->




 <script src="{{ asset('store/aassets/js/bootstrap.bundle.min.js')}}"></script>

 <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
 <script src="{{ asset('store/assets/css/slider/dist/sheetslider.min.js')}}"></script>

 <script>
     $(".panel-header").click(function() {
         $(".fast-donation-panel").toggleClass("open");
     });
 </script>



  <!-- END PAGE LEVEL JS-->
  @yield('scripts')
	@stack('scripts')

</body>
</html>
