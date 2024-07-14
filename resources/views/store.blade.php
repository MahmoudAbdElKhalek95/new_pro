
{{-- @extends('store.layouts.mainapp') --}}

<!doctype html>
<html lang="ar" dir="rtl">

<head>
    @include('store.includes.head')

<body>



    <div class="container-fluid">

        @include('store.includes.header')
        @include('store.includes.messages')


        @include('store.includes.slider')




        <div class="row mt-5">
            <div class="col">

                <div class="row mb-4">
                    <div class="col">
                        <p class="mt-4 fw-bold text-center" style="font-size: 36px;">الحقائب</p>
                    </div>
                </div>

                <div class="row">

                    @foreach (  $courses as  $item  )

                    <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex justify-content-center">
                        <div class="card donate">
                            <div class="position-relative">
                                <a href="{{ route('courses.details' , $item->id) }}" >
                                <img src="{{  asset($item->image_path ) }}"  height="250px";  class="card-img-top" alt="...">
                                </a>

                                  <span style="float: left">   {{ $item->age }} </span>

                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-bold text-center"> {{ $item->name ?? null   }} </h5>
                                <h5 class="card-title fw-bold text-center"> {{ $item->hours ?? null   }} </h5>
                                <h5 class="card-title fw-bold text-center"> {{ $item->activities ?? null   }} </h5>
                                <h5 class="card-title fw-bold text-center"> {{ $item->units  ?? null  }} </h5>


                                {{-- <span class="text-center">  {{ $item->desc }} </span> --}}
                                <div class="mt-3">

                                    <div class="d-flex">
                                    </div>
                                </div>

                                <div class="d-grid gap-2" >
                                    <a  class="btn fw-bold bg-primary"  href="{{ route('courses.details' , $item->id) }}" >
                                       شراء الأن
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>



        <div class="row mt-5">
            <div class="col">

                <div class="row mb-5">
                    <div class="col">
                        <p class="mt-4 fw-bolder text-center" style="font-size: 36px;">الخدمات</p>
                    </div>
                </div>

                <div class="row" style="row-gap: 24px;">
                    @foreach (  $training as  $item  )
                    <div class="col donate-cat">

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


        {{-- atsrt taps --}}

          {{-- <div class="row" >
            <div class="col">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#menu1">Menu 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#menu2">Menu 2</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  <h3>HOME</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                  <h3>Menu 1</h3>
                  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                  <h3>Menu 2</h3>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                </div>
              </div>

             </div>

          </div> --}}
        {{--  end tabs --}}

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





