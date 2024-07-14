

@extends('dashboard.layouts.mainapp')
@section('title', ' الشركاء')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/trainers_course.css">
@endsection
@section('content')

   <section class="trainers_course">

            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الشركاء</h3>


                @if( auth()->user()->role_id==1)
                @include('slider.create')
                @endif
            </div>

            <div class="row">


             @foreach ( $slider as $item )
                <div class="col-md-6 col-lg-4 p-0 px-md-4" >
                    <div class="course-box" style="overflow-y:scroll !important ">
                        <div class="course-description">
                            <h4 class="course-heading ">{{ $item->title ?? '' }} </h4>
                            <div class="course-price">

                                <div class="justify-content-center" style="text-align: center">
                                    <a style="text-decoration: none " class="custom-btn"  href="{{ route('sliders.activate' , $item->id ) }}" >
                                      
                                            {{ $item->active == 1  ? ' نشط'  : ' غير نشط' }}
      
                                    </a>
                                    </div>
                                <img src="{{ asset( $item->image ) }}"  width="200px" height="200px" class="px-2">
                                
                            </div>

                            <p> {{ $item->description ?? ''  }} </p>


                        </div>

                        <div class="justify-content-center" style="text-align: center">
                            @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id ==  2 )
                            <a   target="_blank" href="{{ route('sliders.edit', $item->id)  }}" class="custom-btn"> تعديل</a>
                            @endif
                        </div>

                    </div>

                </div>

                @endforeach



           </div>


              {{-- pagination --}}
              <div class="row" >

                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >

                 {{ $slider->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}




    </section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/trainers_course.js"></script>
<script>

    $(document).ready(function(){


      $("#type").change(function(){
            $("#question_card").show();
            $(".question_row_all").hide();
            $(".question_row_"+$(this).val()).show();
       });
   });

   </script>
@endsection



