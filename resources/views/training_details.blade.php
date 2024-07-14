
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
                        <p class="mt-4 fw-bold text-center" style="font-size: 36px;">الخدمات</p>
                    </div>
                </div>


                <div class="row" style="row-gap: 24px;">
                    <div class="col col-lg-4 col-md-4 donate-cat">
                    </div>

                    <div class="col col-lg-4 col-md-4 donate-cat">

                            <img src="{{  asset($training->image ) }}"  height="250px";  class="card-img-top" alt="...">

                        <div class="col d-flex flex-column text-center align-items-center">
                            <img src="{{ asset('store/assets/img/icon-4.svg')}}" class="" width="104" height="104" alt="quran">
                            <span class="fw-bold mt-3" style="font-size: 24px;"> {{ $training->name }} </span>
                            <span class="fw-bold mt-3" style="font-size: 24px;"> {{ $training->training_type->name ?? '' }} </span>

                        </div>

                        <hr>


                        {!! $training->text_editor  !!}
                        {{-- <div class="course-standards">
                            <h4>معايير الترشح للدورة التدريبية :</h4>
                            <ul>
                                @if( !empty(  $training->training_candidate()->get() ) )
                                 @foreach (  $training->training_candidate()->get() as  $can )

                                 <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> {{ $can->candidate ?? '' }}  </span></li>

                                 @endforeach
                                @endif
                            </ul>

                            <hr>
                            <h4>  شروط الدورة :</h4>
                            <ul>
                                @if( !empty(  $training->training_condthion()->get() ) )
                                @foreach (  $training->training_condthion()->get() as  $can )

                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> {{ $can->condthion ?? '' }}  </span></li>

                                @endforeach
                               @endif
                            </ul>

                        </div> --}}

                        <div class="d-grid gap-2">
                            <br>
                            <button class="btn fw-bold bg-primary" type="button">شراء الأن</button>
                        </div>
                    </div>

                    <div class="col col-lg-4 col-md-4 donate-cat">
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





