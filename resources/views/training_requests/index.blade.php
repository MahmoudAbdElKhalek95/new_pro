

@extends('dashboard.layouts.mainapp')
@section('title', ' دورة تدريب المدربين')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/trainers_course.css">
@endsection
@section('content')

   <section class="trainers_course">
        <div class="container-fluid">
            <h3 class="p-md-2"><img src="{{ asset('dashboard') }}/assets/images/header_icon1.png" class="img-fluid pe-3"> دورة تدريب المدربين
            </h3>
            <div class="row">
                <div class="col-md-6 col-lg-4 p-0 px-md-4">
                    <div class="course-box">
                        <div class="course-description">
                            <h4 class="course-heading ">دورة تدريب المدربين</h4>
                            <div class="course-price">
                                <span class="price">830 ر.س</span>
                                <img src="{{ asset('dashboard') }}/assets/images/_ .png" class="px-2">
                                <span class="price-for">للمدرب الواحد</span>
                            </div>
                            <p>يتدرب فيها المشترك على مدى ثلاثة أيام ليحصل بعدها على شهادة معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهله لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .</p>
                            <button class="custom-btn">شراء</button>
                        </div>
                        <div class="course-standards">
                            <h4>معايير الترشح للدورة التدريبية :</h4>
                            <ul>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>المؤهل العلمي " جامعي" أو ما يعادله.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>لديه تجربة سابقة في مجال التعليم أو التدريب  .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> العمر لا يقل عن 19 سنة </span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>القدرة على الحوار والمرونة العقلية </span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>الاستقرار واللياقة النفسية</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>يمتلك التصورات التربوية الجيدة  </span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>التفاعل مع البيئة والمتدربين</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>روح الإيجابية والإبداع </span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>التواصل الجيد مع الآخرين </span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>  لديه مهارة في إدارة الصف</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> الثقة بالنفس. </span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>  حضور مالا يقل عن ٨٠% من الدورة التدريبية  </span></li>
                            </ul>

                        </div>
                        <div class="show-all-standards d-flex align-items-end justify-content-center">
                            <h4>رؤية جميع الشروط</h4>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4  p-0 px-md-4">
                    <div class="course-box">
                        <div class="course-description">
                            <h4 class="course-heading ">دورة تدريب المدربين</h4>
                            <div class="course-price">
                                <span class="price">21080 ر.س</span>
                                <img src="{{ asset('dashboard') }}/assets/images/_ .png" class="px-2">
                                <span class="price-for">للمدرب الواحد</span>
                            </div>
                            <p> يتم فيها تدريب 20 متدرب أو متدربة في مقر الجهة المستفيدة على مدى ثلاثة أيام ليحصلوا بعدها على شهادات معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهلهم لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .</p>
                            <button class="custom-btn">شراء</button>
                        </div>
                        <div class="course-standards">
                            <h4>معايير الترشح للدورة التدريبية :</h4>
                            <ul>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>تقوم الجهة المستفيدة بتجهيز مقر مناسب لإقامة الدورة .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>تهيئة المقر بتوفير متطلبات وأدوات التدريب ، من قرطاسية وطاولات ومقاعد .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>تجهيز ضيافة المشتركين في الدورة .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>معايير الترشح للدورة التدريبية:</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>المؤهل العلمي " جامعي" أو ما يعادلها.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>لديه تجربة سابقة في مجال التعليم أو التدريب .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>العمر من 19 سنة فما فوق.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>إمكانية الاستقرار والاستدامة داخل البيئة التربوية.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>القدرة على الحوار والمرونة العقلية.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>الاستقرار واللياقة النفسية.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>يمتلك التصورات التربوية الجيدة.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>التفاعل مع البيئة والمتدربين.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>روح الإيجابية والإبداع.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>التواصل الجيد مع الآخرين.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>لديه مهارة في إدارة الصف.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>الثقة بالنفس.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>حضور المتدربة مالا يقل عن ٨٠% من الدورة التدريبية</span></li>
                            </ul>

                        </div>
                        <div class="show-all-standards d-flex align-items-end justify-content-center">
                            <h4>رؤية جميع الشروط</h4>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 col-lg-4  p-0 px-md-4">
                    <div class="course-box">
                        <div class="course-description">
                            <h4 class="course-heading ">دورة تدريب المدربين</h4>
                            <div class="course-price">
                                <span class="price">590 ر.س</span>
                                <img src="{{ asset('dashboard') }}/assets/images/_ .png" class="px-2">
                                <span class="price-for">للمدرب الواحد</span>
                            </div>
                            <p> تتدرب فيها المشتركة على مدى ثلاثة أيام لتحصل بعدها على شهادة معتمدة من المؤسسة العامة للتدريب المهني والتقني بـعدد 15 ساعة تدريبية تؤهلها لتطبيق حقائب بناء الشخصية المتكاملة في المحاضن التربوية .</p>
                            <button class="custom-btn">شراء</button>
                        </div>
                        <div class="course-standards">
                            <h4>معايير الترشح للدورة التدريبية :</h4>
                            <ul>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>انضمام مالا بقل عن 5 متدربات في المقر الواحد .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>تهيئة المقر بتوفير متطلبات وأدوات التدريب ، من قرطاسية </span></li>وطاولات ومقاعد .
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>سيكون التدريب عن بعد لذلك لا بد من توفير متطلبات ذلك من </span></li>انترنت وشاشة مرتبطة بالشبكة ومكبر صوت ومايكروفونات .
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>المؤهل العلمي " جامعي" أو ما يعادله .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>لديها تجربة سابقة في مجال التعليم أو التدريب .</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>العمر لا يقل عن 19 سنة.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>القدرة على الحوار والمرونة العقلية.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>الاستقرار واللياقة النفسية.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>تمتلك التصورات التربوية الجيدة.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>التفاعل مع البيئة والمتدربين.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>روح الإيجابية والإبداع.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span>التواصل الجيد مع الآخرين.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> لديها مهارة في إدارة الصف.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> الثقة بالنفس.</span></li>
                                <li class="d-flex align-items-center"><img src="{{ asset('dashboard') }}/assets/images/check_icon.png"><span> حضور مالا يقل عن ٨٠% من الدورة التدريبية .</span></li>
                            </ul>

                        </div>
                        <div class="show-all-standards d-flex align-items-end justify-content-center">
                            <h4>رؤية جميع الشروط</h4>
                        </div>

                    </div>
                </div>



           </div>
        </div>
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



