<section class="right-bar right-bar-desktop   active">
    <div class="content-right-bar active">
        <div class="btn-menu-bar">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="logo">
            <div class="image">
                <img src="{{ asset('frontend/image/logo/logo.png') }}" alt="logos">
            </div>
        </div>
        <div class="link-menu">
            <div class="part-link">
                <div class="title">
                    <small>المعلومات العامة</small>
                </div>
                <div class="all-links">
                    <a href="{{ route('home') }}" class="{{ (request()->is('home*')) ? 'activelink' : '' }}">
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

                     {{-- @endif company --}}

                     @if(auth()->user()->role_id == 3  )





                     <a href="{{ route('getCompanyCourses')  }}"  class="{{ (request()->is('companycourses')) ? 'activelink' : '' }}">
                         <div class="link">
                             <i class="fa fa-suitcase" aria-hidden="true"></i>
                             <span>الحقائب </span>
                         </div>
                     </a>


                     <a href="{{ route('getCompanyCoursesDetails')  }}"  class="{{ (request()->is('coursesdetails')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>الحقائب المنفذة </span>
                        </div>
                    </a>


                    <a href="{{ route('getCompanyTrainers')  }}"  class="{{ (request()->is('companytrainer')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> تقرير المدربين </span>
                        </div>
                    </a>

                    <a href="{{ route('getCompanyApplayTrainers')  }}"  class="{{ (request()->is('companytrainer')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> المدربين المتقدمين </span>
                        </div>
                    </a>


                    <a href=" {{ route('companyStudents')  }}"   class="{{ (request()->is('companyStudents')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المتدربين</span>
                        </div>
                    </a>

                    <a href=" {{ route('addStudents')  }}"  class="{{ (request()->is('addStudents')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span> تسجيل المتدربين</span>
                        </div>
                       </a>

                    <a href=" {{ route('payments.index')  }}"  class="{{ (request()->is('payments')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>سداد المبالغ والمتابعة</span>
                        </div>
                       </a>

                       <a href="{{ route('getCourseOrder')  }}"  class="{{ (request()->is('getCourseOrder')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  نموذج طلب حقيبة </span>
                        </div>
                      </a>



                      <a href=" {{ route('company.visit')  }}" class="{{ (request()->is('company_visit*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>الزيارات الميدانية</span>
                        </div>
                       </a>


                       <a href="{{ route('companyAvailableCourses')  }}" class="{{ (request()->is('trainercourses')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> الفرص التدربية  </span>
                        </div>
                       </a>

                       <a href="{{ route('getProject')  }}"  class="{{ (request()->is('projects*')) ? 'activelink' : '' }}" >
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> المشاريع </span>
                        </div>
                    </a>


                    <a href="{{ route('survay.index')  }}"  class="{{ (request()->is('survay*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> عرض الاستبانات </span>
                        </div>
                       </a>

                    <a href="{{ route('trainings.index')  }}"   class="{{ (request()->is('trainings*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الدورات </span>
                        </div>
                    </a>

                    {{-- <a href="{{ route('trainings.registerpage')  }}"   class="{{ (request()->is('trainingregister*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الدورات - طلبات التسجيل </span>
                        </div>
                    </a> --}}


                       <div class="title">
                        <small> التقارير </small>
                    </div>

                    <a href="{{ route('allReport')  }}"   class="{{ (request()->is('allReport')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  التقارير </span>
                        </div>
                    </a>


                    {{-- <a href="{{ route('report_types.index')  }}"   class="{{ (request()->is('report_types')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  انواع التقارير </span>
                        </div>
                    </a> --}}

                    <a href="{{ route('reports.index')  }}"   class="{{ (request()->is('reports')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  رفع التقارير </span>
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


<section class="right-bar rigt-bar-desktop   active cards-number horizental-side">
    <div class="panel-group row" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="col-md-1 col-sm-6"></div>
        <div class="col-md-2 col-sm-6">
            <div class="card">
                  <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="title">
                            <span class="title"><i class="fa fa-home"></i> الرئيسية </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
                            <a href="{{ route('home') }}">
                                <div class="link">
                                <i class="fa fa-home"></i>
                                <span>الرئيسية</span>
                                </div>
                            </a>
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
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card">
                <div class="panel-heading" role="tab" id="headingTow">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTow" aria-expanded="true" aria-controls="collapseTow" class="title">
                            <span class="title"><i class="fa fa-suitcase" aria-hidden="true"></i>  الحقائب     </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseTow" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTow">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3)
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>-  طلب حقيبة</span>
                                </div>
                            </a>

                            @endif
                        </div>
					</div>
                </div>
            </div>
            <div class="card">
                <div class="panel-heading" role="tab" id="headingSix">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="title">
                            <span class="title"><i class="fa fa-suitcase" aria-hidden="true"></i> التقارير والاحصائيات </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseSix" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">

                            @if( auth()->user()->role_id == 3)

                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- الحقائب المنفذة  </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- تقرير المدربين  </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- المتدربين </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- التقارير </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- رفع شواهد التنفيذ </span>
                                </div>
                            </a>

                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="title">
                            <span class="title"><i class="fa fa-users" aria-hidden="true"></i> التدريب</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseThree" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3)
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- المدربين المتقدمين </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- طلب دورة تدريبية </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- طلب مدرب </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- تقييم المدربين  </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- طلب إشراف على تطبيق  </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- طلب لقاء تعريفي </span>
                                </div>
                            </a>


                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card">
                <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="title">
                            <span class="title"><i class="fa fa-users" aria-hidden="true"></i> الشهادات</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseFour" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingFour">
						<div class="panel-body">
                            @if( auth()->user()->role_id == )

                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- شهادات الجهة </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- شهادات اعتماد المدربين </span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- شهادات المتدربين</span>
                                </div>
                            </a>
                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
            <div class="card">
                <div class="panel-heading" role="tab" id="headingFive">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseFive" class="title">
                            <span class="title"><i class="fa fa-users" aria-hidden="true"></i> الاخبار العامة</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseFive" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFive">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 3 )

                             <a href="{{ route('survay.index')  }}"  class="{{ (request()->is('survay*')) ? 'activelink' : '' }}">
                                <div class="link">
                                    <span>- عرض الاستبانات </span>
                                </div>
                            </a>
                           <a href="{{ route('trainings.index')  }}"   class="{{ (request()->is('trainings*')) ? 'activelink' : '' }}">
                                <div class="link">
                                    <span>- الدورات</span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- لقاءات</span>
                                </div>
                            </a>
                            <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                                <div class="link">
                                    <span>- الاخبار</span>
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
