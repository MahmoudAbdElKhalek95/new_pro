

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<section class="right-bar rigt-bar-desktop   active cards-number horizental-side">
    <div class="panel-group row" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="col-md-1 col-sm-6"></div>
        <div class="col-md-2 col-sm-6">
            <div class="card side-card first-card">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="title">
                            <span class="title link-white"><i class="fa fa-home"></i> الرئيسية </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
                            <a href="{{ route('home') }}">
                                <div class="link">
                                <i class="fa fa-home"></i>
                                <span class="link-white">الرئيسية</span>
                                </div>
                            </a>
                            <a href=" {{ route('profile')  }}" class="{{ (request()->is('profile*')) ? 'activelink' : '' }}">
                                <div class="link">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="link-white">تعديل بياناتي</span>
                                </div>
                            </a>
                            <a href="{{ route('user.logout')  }}">
                                <div class="link">
                                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                                    <span class="link-white">تسجيل الخروج </span>
                                </div>
                            </a>
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card side-card">
                <div class="panel-heading" role="tab" id="headingTow">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTow" aria-expanded="true" aria-controls="collapseTow" class="title">
                            <span class="title link-white"><i class="fa fa-suitcase" aria-hidden="true"></i>  الحقائب     </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseTow" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="headingTow">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3)
                            <a href="{{ route('getCourseOrder') }}" >
                                <div class="link">
                                    <span class="link-white">-  طلب حقيبة</span>
                                </div>
                            </a>

                            <a href="{{ route('getCompanyCourses') }}" >
                                <div class="link">
                                    <span class="link-white">-  الحقائب</span>
                                </div>
                            </a>

                            <a href="{{ route('getCompanyCoursesDetails') }}" >
                                <div class="link">
                                    <span class="link-white">-  الحقائب المنفذة</span>
                                </div>
                            </a>

                            @endif
                        </div>
					</div>
                </div>
            </div>
            <div class="card side-card">
                <div class="panel-heading" role="tab" id="headingSix">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="title">
                            <span class="title link-white"><i class="fa fa-suitcase" aria-hidden="true"></i> التقارير والاحصائيات </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseSix" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">

                            @if( auth()->user()->role_id == 3)

                            <a href="{{ route('getCompanyCoursesDetails') }}"  >
                                <div class="link">
                                    <span class="link-white">- الحقائب المنفذة  </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompanyTrainers') }}"  >
                                <div class="link">
                                    <span class="link-white">- تقرير المدربين  </span>
                                </div>
                            </a>
                            <a href="{{ route('companyStudents') }}"  >
                                <div class="link">
                                    <span class="link-white">- المتدربين </span>
                                </div>
                            </a>
                            <a href="{{ route('addStudents') }}"  >
                                <div class="link">
                                    <span class="link-white">- تسجيل المتدربين </span>
                                </div>
                            </a>
                            <a href="{{ route('companyAvailableCourses') }}"  >
                                <div class="link">
                                    <span class="link-white">- الفرص التدربية </span>
                                </div>
                            </a>
                            <a href="{{ route('reports.index') }}"  >
                                <div class="link">
                                    <span class="link-white">- التقارير </span>
                                </div>
                            </a>
                            <a href="{{ route('reports.index') }}"  >
                                <div class="link">
                                    <span class="link-white">- رفع شواهد التنفيذ </span>
                                </div>
                            </a>

                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card side-card">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="title">
                            <span class="title link-white"><i class="fa fa-users" aria-hidden="true"></i> التدريب</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseThree" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3)
                            <a href="{{ route('getCompanyApplayTrainers') }}"  >
                                <div class="link">
                                    <span class="link-white">- المدربين المتقدمين </span>
                                </div>
                            </a>
                            <a href="{{ route('training-request.index')  }}""  >
                                <div class="link">
                                    <span class="link-white">- طلب دورة تدريبية </span>
                                </div>
                            </a>

                          
                            <a href="{{ route('getCompanyTrainers') }}"  >
                                <div class="link">
                                    <span class="link-white">- طلب مدرب </span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- تقييم المدربين  </span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- طلب إشراف على تطبيق  </span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- طلب لقاء تعريفي </span>
                                </div>
                            </a>


                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card side-card">
                <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="title">
                            <span class="title link-white"><i class="fa fa-users" aria-hidden="true"></i> الشهادات</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseFour" class="panel-collapse collapse in " role="tabpanel" aria-labelledby="headingFour">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3)

                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- شهادات الجهة </span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- شهادات اعتماد المدربين </span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- شهادات المتدربين</span>
                                </div>
                            </a>
                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card side-card first-card">
                <div class="panel-heading" role="tab" id="headingFive">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" class="title">
                            <span class="title link-white"><i class="fa fa-users" aria-hidden="true"></i> الاخبار العامة</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3 )

                             <a href="{{ route('survay.index')  }}" >
                                <div class="link">
                                    <span class="link-white">- عرض الاستبانات </span>
                                </div>
                            </a>
                           <a href="{{ route('trainings.index')  }}" >
                                <div class="link">
                                    <span class="link-white">- الدورات</span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- لقاءات</span>
                                </div>
                            </a>
                            <a href="#"  >
                                <div class="link">
                                    <span class="link-white">- الاخبار</span>
                                </div>
                            </a>
                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>

        <div class="col-md-1 col-sm-6"></div>

    </div>

</section>

<section class="right-bar right-bar-mobile ">
    <div class="overlay "></div>
    <div class="content-right-bar active">
        <div class="btn-menu-bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="logo">
            <div class="image">
                <img src=" {{ asset('frontend/image/logo/logo.png') }} " alt="logos">
            </div>
        </div>
        <div class="link-menu">
            <div class="part-link">
                <div class="title">
                    <small>المعلومات العامة</small>
                </div>
                <div class="all-links">
                    <a href="index.html">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>الرئيسية</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="part-link">
                <div class="title">
                    <small>المعلومات العامة</small>
                </div>
                <div class="all-links">



                    @if(auth()->user()->role_id == 3  )





                    <a href="{{ route('getCompanyCourses')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>الحقائب </span>
                        </div>
                    </a>


                    <a href="{{ route('getCompanyCoursesDetails')  }}">
                       <div class="link">
                           <i class="fa fa-suitcase" aria-hidden="true"></i>
                           <span>تفاصيل الحقائب </span>
                       </div>
                   </a>



                   {{-- <a href="{{ route('getCourseOrder')  }}">
                    <div class="link">
                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                        <span>  نموذج طلب حقيبة </span>
                    </div>
                </a> --}}



                   <a href="{{ route('getCompanyTrainers')  }}">
                       <div class="link">
                           <i class="fa fa-suitcase" aria-hidden="true"></i>
                           <span>المدربين</span>
                       </div>
                   </a>

                   <a href=" {{ route('companyStudents')  }}">
                       <div class="link">
                           <i class="fa fa-users" aria-hidden="true"></i>
                           <span>المتدربين</span>
                       </div>
                   </a>

                   <a href=" {{ route('payments.index')  }}">
                    <div class="link">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>سداد المبالغ والمتابعة</span>
                    </div>
                   </a>




                   @endif



                </div>
            </div>
            <div class="part-link">
                <div class="title">
                    <small>إدارة بياناتي</small>
                </div>
                <div class="all-links">
                    <a href=" {{ route('profile')  }}" class="{{ (request()->is('profile*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span>تعديل بياناتي</span>
                        </div>
                       </a>

                    <a href="{{ route('user.logout')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>تسجيل الخروج </span>
                        </div>
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>
