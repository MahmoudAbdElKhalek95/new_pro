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
                    <a href="{{ route('home') }}">
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


                    @if(auth()->user()->role_id == 4  )

                    <a href="{{ route('getTrainerCourses')  }}" class="{{ (request()->is('trainercourses')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>الحقائب </span>
                        </div>
                    </a>

                    <a href="{{ route('getTrainerAvlableCourses')  }}" class="{{ (request()->is('trainercourses')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> الفرص التدربية  </span>
                        </div>
                    </a>

                    <a href="{{ route('trainings.index')  }}"  class="{{ (request()->is('trainings')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الدورات </span>
                        </div>
                    </a>

                       <a href=" {{ route('trainer_contract')  }}"  class="{{ (request()->is('trainer_contract')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>نموذج عقد المدرب</span>
                        </div>
                       </a>

                       <a href=" {{ route('trainer_report_data')  }}"  class="{{ (request()->is('trainer_report_data')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span> إحصائيات المدرب </span>
                        </div>
                       </a>

                       <a href="{{ route('survay.index')  }}"  class="{{ (request()->is('survay*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> عرض الاستبانات </span>
                        </div>
                       </a>


                       <a href=" {{ route('trainer_students')  }}"  class="{{ (request()->is('trainer_students')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>  المتدربين</span>
                        </div>
                       </a>







                    <div class="title">
                        <small> التقارير </small>
                    </div>



                    {{-- <a href="{{ route('report_types.index')  }}"   class="{{ (request()->is('report_types')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  انواع التقارير </span>
                        </div>
                    </a> --}}

                     {{-- <a href="{{ route('reports.index')  }}"   class="{{ (request()->is('reports')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>    شواهد التنفيذ </span>
                        </div>
                    </a> --}}


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

{{--  
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
                            <a href="{{ route('user.logout')  }}">
                                <div class="link">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <span>تواصل معنا</span>
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
                            <span class="title"><i class="fa fa-suitcase" aria-hidden="true"></i>  التقارير والاحصائيا ت   </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseTow" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTow">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 4 )
                            <a href="{{ route('getTrainerCourses') }}">
                                <div class="link">
                                    <span>- الحقائب </span>
                                </div>
                            </a>
                            <a href="{{ route('trainer_contract') }}">
                                <div class="link">
                                    <span>- إحصائيا ت المدر ب </span>
                                </div>
                            </a>
                            <a href="{{ route('reports.index') }}">
                                <div class="link">
                                    <span>- رفع شواهد التنفيذ</span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="link">
                                    <span>- التقييمات</span>
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
                            <span class="title"><i class="fa fa-users" aria-hidden="true"></i> الاشراف</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseThree" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 4 )
                            <a href="{{ route('getManager') }}">
                                <div class="link">
                                    <span>- المشرفين </span>
                                </div>
                            </a>
                            <a href="{{ route('getProject') }}">
                                <div class="link">
                                    <span>- المشاريع </span>
                                </div>
                            </a>
                            <a href="{{ route('project_managers.index') }}">
                                <div class="link">
                                    <span>- مدراء المشاريع </span>
                                </div>
                            </a>
                            <a href="{{ route('trainings.index') }}">
                                <div class="link">
                                    <span>- الدورات  </span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="link">
                                    <span>- الدورات – طلبات التسجيل  </span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="link">
                                    <span>- اللقاءات </span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="link">
                                    <span>- التقييمات </span>
                                </div>
                            </a>
                            <a href="{{ route('question_types.index') }}">
                                <div class="link">
                                    <span>- أنواع الاستبانات </span>
                                </div>
                            </a>
                            <a href="{{ route('survay.index') }}">
                                <div class="link">
                                    <span>- الاستبانا ت  </span>
                                </div>
                            </a>
                             <a href="{{ route('allReport')  }}" >
                                <div class="link">
                                    <span>-  التقارير </span>
                                </div>
                            </a>


                            <a href="{{ route('report_types.index')  }}"   class="{{ (request()->is('report_types')) ? 'activelink' : '' }}">
                                <div class="link">
                                    <span>-  انواع التقارير </span>
                                </div>
                            </a>

                            <a href="{{ route('reports.index')  }}"   class="{{ (request()->is('reports')) ? 'activelink' : '' }}">
                                <div class="link">
                                    <span>-  رفع التقارير </span>
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
                            @if( auth()->user()->role_id == 4 )

                            <a href="#">
                                <div class="link">
                                    <span>- شهادات الدورات </span>
                                </div>
                            </a>
                            <a href="#">
                                <div class="link">
                                    <span>- شهادات التدريب</span>
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
                            @if( auth()->user()->role_id == 4 )

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
                            <a href="#">
                                <div class="link">
                                    <span>- لقاءات</span>
                                </div>
                            </a>
                            <a href="#">
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

                   @if(auth()->user()->role_id == 4  )

                   <a href="{{ route('getTrainerCourses')  }}">
                       <div class="link">
                           <i class="fa fa-suitcase" aria-hidden="true"></i>
                           <span>الحقائب </span>
                       </div>
                   </a>


                   <a href="{{ route('survay.index')  }}"  class="{{ (request()->is('survay*')) ? 'activelink' : '' }}">
                    <div class="link">
                        <i class="fa fa-suitcase" aria-hidden="true"></i>
                        <span> عرض الاستبانات </span>
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
  --}}