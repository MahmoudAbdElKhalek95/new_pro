
{{-- @extends('store.layouts.mainapp') --}}

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>            شركة ارام المستقبل</title>
    <link href="{{ asset('store/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('store/assets/css/slider/dist/sheetslider.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{  asset('store/assets/css/styles.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

<body>

    <div class="container-fluid">
        @include('store.includes.header')
        <div class="row mt-5">
            <div class="col">
                <div class="row mb-4">
                    <div class="col">
                        <p class="mt-4 fw-bold text-center" style="font-size: 36px;">من نحن</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col mt-4 d-flex justify-content-center">
                        <div style="width: 400px; margin:auto;"   >

                            {!! $about->text  !!}

                        </div>
                    </div>

                </div>
            </div>





        </div>


        @include('store.includes.footer')



    </div>




    <script src="{{ asset('store/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="{{ asset('store/assets/css/slider/dist/sheetslider.min.js')}}"></script>

    <script>
        $(".panel-header").click(function() {
            $(".fast-donation-panel").toggleClass("open");
        });
    </script>

</body>

</html>





