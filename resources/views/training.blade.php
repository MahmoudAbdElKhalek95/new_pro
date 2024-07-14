
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

                        <div class="row mb-5">
                            <div class="col">
                                <p class="mt-4 fw-bolder text-center" style="font-size: 36px;">الخدمات</p>
                            </div>
                        </div>

                        <div class="row" style="row-gap: 24px;">
                            @foreach (  $training as  $item  )
                            <div class="col-md-4 donate-cat">
                                <a href="{{ route('training.details' , $item->id) }}" >
                                    <img src="{{  asset($item->image ) }}"  height="250px";  class="card-img-top" alt="...">
                                    </a>
                                <div class="col d-flex flex-column text-center align-items-center">
                                    <a href="{{ route('training.details' , $item->id ) }}"  >
                                     <img src="{{ asset('store/assets/img/icon-4.svg')}}" class="" width="104" height="104" alt="quran">
                                    </a>
                                     <span class="fw-bold mt-3" style="font-size: 24px;"> {{ $item->name }} </span>
                                     <span class="fw-bold mt-3" style="font-size: 24px;"> {{ $item->training_type->name ?? '' }} </span>

                                </div>
                                <div class="d-grid gap-2">
                                     <a class="btn fw-bold bg-primary"  href="{{ route('training.details' , $item->id ) }}"  >
                                        شراء الأن
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>

              {{-- pagination --}}
              <div class="row" >

                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >

                 {{ $training->render("pagination::bootstrap-4") }}

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





