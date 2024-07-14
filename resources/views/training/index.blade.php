

@extends('dashboard.layouts.mainapp')
@section('title', ' الخدمات')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/trainers_course.css">
@endsection
@section('content')

   <section class="trainers_course">

            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الخدمات</h3>


                @if( auth()->user()->role_id==1)
                @include('training.create')
                @endif
            </div>

            <div class="row">


             @foreach ( $training as $item )
                <div class="col-md-6 col-lg-4 p-0 px-md-4" >
                    <div class="course-box" style="overflow-y:scroll !important ">
                        <div class="course-description">
                            <h4 class="course-heading ">{{ $item->name ?? '' }} </h4>
                            <div class="course-price">
                                <span class="price">830 ر.س</span>
                                <img src="{{ asset('dashboard') }}/assets/images/_ .png" class="px-2">
                                <span class="price-for"> {{ $item->getSpecilization() ?? '' }} الواحد</span>
                            </div>
                            <p>يتدرب فيها المشترك على مدى ثلاثة أيام ليحصل بعدها على شهادة معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهله لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .</p>
                            <button class="custom-btn">شراء</button>
                                 <hr>


                        </div>
                        <div class="course-standards">

                            {{-- <p>
                                {!! $item->text_editor  !!}
                            </p> --}}
                            {{-- <h4>معايير الترشح للدورة التدريبية :</h4>
                            <ul>
                                @if( !empty(  $item->training_candidate()->get() ) )
                                 @foreach (  $item->training_candidate()->get() as  $can )

                                 <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> {{ $can->candidate ?? '' }}  </span></li>

                                 @endforeach
                                @endif
                            </ul> --}}

                            {{-- <h4>  شروط الدورة :</h4>
                            <ul>
                                @if( !empty(  $item->training_condthion()->get() ) )
                                @foreach (  $item->training_condthion()->get() as  $can )

                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> {{ $can->condthion ?? '' }}  </span></li>

                                @endforeach
                               @endif
                            </ul> --}}

                        </div>







                        <div class="justify-content-center" style="text-align: center">
                            @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id ==  2 )
                            <a   target="_blank" href="{{ route('trainings.edit', $item->id)  }}" class="custom-btn"> تعديل</a>
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

                 {{ $training->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}




    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>




@endsection



