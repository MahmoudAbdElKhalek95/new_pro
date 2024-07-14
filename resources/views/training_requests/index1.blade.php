

@extends('layouts.mainapp')
@section('title', ' دورة تدريب المدربين')

@section('content')

<div class="home-page implementingAgencies">

<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
         دورة تدريب المدربين
      </h5>
      <div class="view-type-modal">

      </div>

     </div>

    <section class="table-requests"  >


      <div class="table-responsive-xl" style="min-height: 600px;">

        <div class="row">
            {{-- 1 --}}
            <div class="col col-md-4 col-lg-4" >
                <div class="card" style="height:900px;">
                    <div class="card-header">     دورة تدريب المدربين   </div>
                    <div class="card-body">

                        يتدرب فيها المشترك على مدى ثلاثة أيام ليحصل بعدها على شهادة معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهله لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .

                        <p style="color: red">
                            معايير الترشح للدورة التدريبية :
                          </p>

                          <p>
                            1.	المؤهل العلمي " جامعي" أو ما يعادله .
                          </p>
                          <p>
                            2.	لديه تجربة سابقة في مجال التعليم أو التدريب .
                          </p>

                          <p>
                            3.	العمر لا يقل عن 19 سنة.
                          </p>

                          <p>
                            4.	القدرة على الحوار والمرونة العقلية.
                         </p>

                         <p>
                            5.	الاستقرار واللياقة النفسية.
                         </p>

                         <p>
                            6.	يمتلك التصورات التربوية الجيدة.
                         </p>

                         <p>
                            7.	التفاعل مع البيئة والمتدربين.
                         </p>

                         <p>
                            8.	روح الإيجابية والإبداع.
                         </p>

                         <p>
                            9.	التواصل الجيد مع الآخرين.
                        </p>

                        <p>
                            10.	لديه مهارة في إدارة الصف.
                        </p>


                        <p>
                            11.	الثقة بالنفس.
                        </p>

                        <p>
                            12.	حضور مالا يقل عن ٨٠% من الدورة التدريبية .
                        </p>

                    </div>
                    <div class="card-footer">
                        <p style="color:red">قيمة الدورة شاملة الضريبة :</p>
                        <p>
                            830 ريال فقط للمدرب الواحد
                        </p>
                        <div class="text-center">
                            <a class="btn btn-success" href="{{ route('createTrainingRequest' , 'maile_trainer') }}">
                                شراء
                            </a>
                        </div>
                    </div>
                  </div>
            </div>
            {{-- 1 --}}

            {{-- 2  --}}
            <div class="col col-md-4 col-lg-4">
                <div class="card" style="height:900px;">
                    <div class="card-header"> دورة تدريب المدربين أو المدربات حصرية للجهات التربوية  </div>
                    <div class="card-body">
                        <p>
                            يتم فيها تدريب 20 متدرب أو متدربة في مقر الجهة المستفيدة على مدى ثلاثة أيام ليحصلوا بعدها على شهادات معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهلهم لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .
                        </p>
                        <p style="color:red">
                            شروط إقامة الدورة :
                        </p>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>1.	تقوم الجهة المستفيدة بتجهيز مقر مناسب لإقامة الدورة .
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>2.	تهيئة المقر بتوفير متطلبات وأدوات التدريب ، من قرطاسية وطاولات ومقاعد .
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>3.	تجهيز ضيافة المشتركين في الدورة .
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>معايير الترشح للدورة التدريبية:
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>1.	المؤهل العلمي " جامعي" أو ما يعادلها.
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>2.	لديه تجربة سابقة في مجال التعليم أو التدريب .
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>3.	العمر من 19 سنة فما فوق.
                        </span></li>
                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>4.	إمكانية الاستقرار والاستدامة داخل البيئة التربوية.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>5.	القدرة على الحوار والمرونة العقلية.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>6.	الاستقرار واللياقة النفسية.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>7.	يمتلك التصورات التربوية الجيدة.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>8.	التفاعل مع البيئة والمتدربين.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>9.	روح الإيجابية والإبداع.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>10.	التواصل الجيد مع الآخرين.
                        </span></li>


                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>11.	لديه مهارة في إدارة الصف.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>12.	الثقة بالنفس.
                        </span></li>

                        <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>13.	حضور المتدربة مالا يقل عن ٨٠% من الدورة التدريبية
                        </span></li>

                    </div>

                    <div class="card-footer">

                        <p style="color:red">

                            قيمة الدورة شاملة الضريبة :
                        </p>
                        <p style="color: :red">
                            21080 ريال فقط لإجمالي العدد
                        </p>

                        <div class="text-center">
                            <a class="btn btn-success" href="{{ route('createTrainingRequest' , 'maile_femaile_trainer') }}">
                                شراء
                            </a>
                            </div>

                    </div>
                  </div>
            </div>
            {{-- 2  --}}

            {{-- 3  --}}
            <div class="col col-md-4 col-lg-4">
                <div class="card" style="height:900px;">
                    <div class="card-header"> دورة تدريب المدربات </div>
                    <div class="card-body">
                        <p>
                            تتدرب فيها المشتركة على مدى ثلاثة أيام لتحصل بعدها على شهادة معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهلها لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .
                        </p>
                        <p style="color:red">
                            شروط إقامة الدورة :
                        </p>
                        <p>

                        </p>

                        <p>
                        </p>

                        <p>

                        </p>

                        <p style="color:red">
                            معايير الترشح للدورة التدريبية:
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>

                        <p>
                        </p>


                        <p>

                        </p>
                        <p>
                        </p>

                    </div>
                    <div class="card-footer">
                        <p style="color: red">
                            قيمة الدورة شاملة الضريبة :
                        </p>
                        <p style="color: red">
                            590 ريال فقط للمتدربة الواحدة
                           </p>

                           <div class="text-center">
                            <a class="btn btn-success" href="{{ route('createTrainingRequest' , 'femaile_trainer') }}">
                                شراء
                            </a>
                            </div>
                    </div>
                  </div>
            </div>
            {{-- 3  --}}

        </div>

      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{-- {{ $data->render("pagination::bootstrap-4") }} --}}
        </div>
     </div>

    </section>

  </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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



