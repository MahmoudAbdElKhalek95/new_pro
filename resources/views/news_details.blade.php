
{{-- @extends('store.layouts.mainapp') --}}

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('store.includes.head')

<body>

    <div class="container-fluid">
        @include('store.includes.header')
        <div class="row mt-5">
            <div class="col">
                <div class="row mb-4">
                    <div class="col">
                        <p class="mt-4 fw-bold text-center" style="font-size: 36px;">الاخبار</p>
                    </div>
                </div>




            <div class="row" style="margin-top: 72px; margin-bottom: 72px;row-gap: 12px;">
                <div class="col-12 col-lg-7 justify-content-center justify-content-lg-start d-flex">
                    <img src="{{  asset($news->image ) }}" width="546" height="580" alt="">
                </div>
                <div class="col-12 col-lg-5 justify-content-center d-flex flex-column">
                    <h2 class="fw-bold"> {{ $news->title  }} </h2>
                    <P class="mb-1">  {{ $news->description  }}  </P>
                    <div class="mt-3">
                        <p>  {!! $news->text  !!}  </p>

                    </div>





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





