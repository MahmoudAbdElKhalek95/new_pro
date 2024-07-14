<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>الرئيسية</title> --}}
        <title>الرئيسية - @yield('title')</title>
        <link rel="stylesheet" href="{{  asset('frontend/css/bootstrap.rtl.min.css')}}">
        <link rel="stylesheet" href="{{  asset('frontend/css/normalize.css')}}">
        {{-- <link rel="stylesheet" href="{{  asset('frontend/css/normalize.css')}}"> --}}
        <link rel="stylesheet" href="{{  asset('frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{  asset('frontend/css/mainStyle.css')}}">
        <link rel="stylesheet" type="text/css" href="{{  asset('frontend/css/checkboxes-radios.css')}}">

       <style>
        input[type="date"]::-webkit-calendar-picker-indicator {
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
        }

          .table-responsive-xl{

            min-height: 2000px;
        }
        .activelink{

            color: black !important ;

        }
        select.form-select{
            color: black!important ;
        }









        </style>

  @yield('styles')
	@stack('styles')
</head>

<body >


  <div class="home-page">
    <div class="sections-page">

        

        <section class="main-content">
            @include('includes.header')

            <section class="content-page">



                @include('includes.messages')
                @yield('content')
            </section>

        </section>
    </div>
</div>


  <!-- external scripts  -->

 <script src="{{ asset('frontend/js/popper.min.js')}}"></script>
 <script src="{{ asset('frontend/js/jquery-3.6.1.min.js')}}"></script>
 <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script src="{{ asset('frontend/js/myCharts.js')}}"></script>
 <script src="{{ asset('frontend/js/mainScript.js')}}"></script>
 <script src="{{ asset('frontend/jscheckbox-radio.js')}}" type="text/javascript"></script>


 <script src="{{ asset('frontend/js/jquery.repeater.min.js' )}}"
  type="text/javascript"></script>
  <script src="{{ asset('frontend/js/form-repeater.js' )}} " type="text/javascript"></script>
  <!-- END PAGE LEVEL JS-->
  @yield('scripts')
	@stack('scripts')

</body>
</html>
