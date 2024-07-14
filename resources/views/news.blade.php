
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

                <div class="row">
                    @foreach (  $news as  $item  )
                    <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex justify-content-center">
                        <div class="card donate">
                            <div class="position-relative">
                                <a href="{{ route('news.details' , $item->id) }}">
                                <img src="{{  asset($item->image ) }}"  height="250px";  class="card-img-top" alt="...">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold"> {{ $item->title  }} </h5>
                                <span>  {{ $item->description }} </span>
                                <div class="mt-3">

                                    <div class="d-flex">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

              {{-- pagination --}}
              <div class="row" >

                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >

                 {{ $news->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}



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





