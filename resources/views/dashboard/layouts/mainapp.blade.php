<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>الرئيسية</title> --}}
        <title>الرئيسية - @yield('title')</title>
        <link rel="stylesheet" href="{{  asset('frontend/css/bootstrap.rtl.min.css')}}">

        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/bootstrap.rtl.min.css') }} ">
        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/global.css')}}">
        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/supervisors_accounts.css')}}">

        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/tinymce.min.css')}}">


        <link rel="stylesheet" href="{{  asset('dashboard/assets/css/main.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style>

        /* input[type="date"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        }

        input[type="time"]::-webkit-calendar-picker-indicator {
            background: transparent;
            bottom: 0;
            color: transparent;
            cursor: pointer;
            height: auto;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: auto;
        } */

          /* .table-responsive-xl{

            min-height: 2000px;
        } */
        .activelink{

            color: black !important ;

        }
        select.form-select{
            color: black!important ;
        }

         .large-aside a {
            color: black!important ;
            text-decoration: none ;
        }

         a {

            text-decoration: none ;
        }

        .option a:hover {
            color: white!important ;
            text-decoration: none ;
        }
        .large-aside  a:hover {
            color: white!important ;
            text-decoration: none ;
        }



        </style>

  @yield('styles')
	@stack('styles')
</head>

<body>



               @include('dashboard.includes.header')


                 @if( auth()->user()->role_id == 1    )

                    @include('dashboard.includes.AdminSidebar')

                @endif
             
             

            
                @include('dashboard.includes.messages')
                @yield('content')





  <!-- external scripts  -->



 <script src="{{ asset('dashboard/assets/js/bootstrap.min.js')}}"></script>
 <script src="{{ asset('dashboard/assets/js/trainers_course.js')}}"></script>



  <script src="{{ asset('dashboard/assets/js/jquery3.2.1.min.js')}}"></script>
  <script src="{{ asset('dashboard/assets/js/global.js')}}"></script>
  <script src="{{ asset('frontend/js/jquery.repeater.min.js' )}}" type="text/javascript"></script>
  <script src="{{ asset('frontend/js/form-repeater.js' )}} " type="text/javascript"></script>


  <script src="{{ asset('dashboard/assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{ asset('dashboard/assets/js/Chart.js')}}"></script>
  <script src="{{ asset('dashboard/assets/js/main.js')}}"></script>
  <script src="{{ asset('dashboard/assets/js/tinymce.js')}}"></script>
  <script src="{{ asset('dashboard/assets/js/editor-tinymce.js')}}"></script>




  <!-- END PAGE LEVEL JS-->
  @yield('scripts')
	@stack('scripts')

</body>
</html>
