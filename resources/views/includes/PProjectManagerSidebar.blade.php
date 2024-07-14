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
                               <span class="link-white"></span>الرئيسية</span>
                                </div>
                            </a>
                            <a href=" {{ route('profile')  }}" class="{{ (request()->is('profile*')) ? 'activelink' : '' }}">
                                <div class="link">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                   <span class="link-white">تعديل بياناتي</span>
                                </div>
                            </a>

                            <a href="#" class="">
                                <div class="link">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                   <span class="link-white">
                                            تواصل معنا
                                    </span>
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
            <div class="card side-card first-card">
                <div class="panel-heading" role="tab" id="headingTow">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTow" aria-expanded="true" aria-controls="collapseTow" class="title">
                            <span class="title link-white"><i class="fa fa-suitcase" aria-hidden="true"></i>  التقارير والاحصائيا ت   </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseTow" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTow">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 1   ||  auth()->user()->role_id == 2 )
                             <div class="title">
                                <b>• الجهات المنفذة</b>
                            </div>

                            <a href="{{ route('companyReport') }}" >
                                <div class="link">
                                   <span class="link-white"> إحصائيات الجهات</span>
                                </div>
                            </a>

                            <a href="{{ route('getTrainer') }}" >
                                <div class="link">
                                   <span class="link-white"> إحصائيات المدربين </span>
                                </div>
                            </a>

                            <a href="{{ route('getCourse') }}" >
                                <div class="link">
                                   <span class="link-white">  الحقائب </span>
                                </div>
                            </a>

                            <a href="{{ route('getCourseOrder')  }}"   class="{{ (request()->is('getCourseOrder*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- نموذج طلب حقيبة</span>
                                </div>
                            </a>

                            <a href="{{ route('trainings.index') }}" >
                                <div class="link">
                                   <span class="link-white"> طلب الدورات </span>
                                </div>
                            </a>



                            <a href="#" >
                                <div class="link">
                                   <span class="link-white"> طلب الإشراف </span>
                                </div>
                            </a>


                            <a href="{{ route('getStudent')  }}" >
                                <div class="link">
                                   <span class="link-white">- المتدربين</span>
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
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree" class="title">
                            <span class="title link-white"><i class="fa fa-users" aria-hidden="true"></i> ***</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
                            @if(  auth()->user()->role_id == 2 )
                            <a href="{{ route('survay.index') }}" >
                                <div class="link">
                                   <span class="link-white">	عرض الاستبانات </span>
                                </div>
                            </a>

                            <a href="{{ route('trainings.index') }}" >
                                <div class="link">
                                   <span class="link-white">	الدورات </span>
                                </div>
                            </a>
                            <a href="#" >
                                <div class="link">
                                   <span class="link-white">	لقاءات </span>
                                </div>
                            </a>


                            <a href="#" >
                                <div class="link">
                                   <span class="link-white"> -	أي أخبار تضاف من الادمن أو المشرف العام </span>
                                </div>
                            </a>

                            <a href="{{ route('question_types.index') }}" >
                                <div class="link">
                                   <span class="link-white">- أنواع الاستبانات </span>
                                </div>
                            </a>
                            <a href="{{ route('questions.index') }}" >
                                <div class="link">
                                   <span class="link-white">- الاستبانات  </span>
                                </div>
                            </a>

                            <a href="{{ route('survay.index') }}" >
                                <div class="link">
                                   <span class="link-white">- عرض الاستبانات  </span>
                                </div>
                            </a>

                             <a href="{{ route('allReport')  }}"  >
                                <div class="link">
                                   <span class="link-white">-  التقارير </span>
                                </div>
                            </a>




                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-2 col-sm-6">
            <div class="card side-card first-card">
                <div class="panel-heading" role="tab" id="headingFour">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour" class="title">
                            <span class="title link-white"><i class="fa fa-users" aria-hidden="true"></i> الشهادات</span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseFour" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingFour">
						<div class="panel-body">
                            @if( auth()->user()->role_id == 1   ||  auth()->user()->role_id == 2 )

                            <a href="#" >
                                <div class="link">
                                   <span class="link-white">- شهادات الدورات </span>
                                </div>
                            </a>
                            <a href="#" >
                                <div class="link">
                                   <span class="link-white">- شهادات التدريب</span>
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
                            @if( auth()->user()->role_id == 1   ||  auth()->user()->role_id == 2 )

                             <a href="{{ route('survay.index')  }}"  class="{{ (request()->is('survay*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- عرض الاستبانات </span>
                                </div>
                            </a>
                           <a href="{{ route('trainings.index')  }}"   class="{{ (request()->is('trainings*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- الدورات</span>
                                </div>
                            </a>

                            <a href="{{ route('getCourseOrder')  }}"   class="{{ (request()->is('getCourseOrder*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- نموذج طلب حقيبة</span>
                                </div>
                            </a>

                            <a href="{{ route('payments.index')  }}"   class="{{ (request()->is('payments*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- سداد المبالغ والمتابعةة</span>
                                </div>
                            </a>

                            <a href="{{ route('supports.index')  }}"   class="{{ (request()->is('supports*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- الداعمين</span>
                                </div>
                            </a>

                            <a href="{{ route('visits.index')  }}"   class="{{ (request()->is('visits*')) ? 'activelink' : '' }}">
                                <div class="link">
                                   <span class="link-white">- الزيارات الميدانية</span>
                                </div>
                            </a>

                            <a href="#" >
                                <div class="link">
                                   <span class="link-white">- لقاءات</span>
                                </div>
                            </a>
                            <a href="#" >
                                <div class="link">
                                   <span class="link-white">- الاخبار</span>
                                </div>
                            </a>
                            @endif
                        </div>
					</div>
                </div>
            </div>
        </div> --}}

        <div class="col-md-2 col-sm-6">

            <div class="card side-card first-card" style="width:250px">
                <div class="panel-heading" role="tab" id="headingSix">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="true" aria-controls="collapseSix" class="title">
                            <span class="title link-white"><i class="fa fa-suitcase" aria-hidden="true"></i> الإشراف </span>
                        </a>
                    </h4>
                </div>
                <div class="chart-value card-links">
                    <div id="collapseSix" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">

                            @if( auth()->user()->role_id == 1   ||  auth()->user()->role_id == 2 )

                            <a href="{{ route('getCompany') }}" >
                                <div class="link">
                                   <span class="link-white"> 	تقييم الجهات المنفذة   </span>
                                </div>
                            </a>
                            <a href="{{ route('getTrainer') }}" >
                                <div class="link">
                                   <span class="link-white"> 	تقييم المدربين </span>
                                </div>
                            </a>
                            <a href="#" >
                                <div class="link">
                                   <span class="link-white">  محاضر الورش واللقاءات    </span>
                                </div>
                            </a>

                            <a href="{{ route('reports.index') }}" >
                                <div class="link">
                                   <span class="link-white"> 	رفع شواهد التنفيذ    </span>
                                </div>
                            </a>

                            <a href="{{ route('getCompany') }}" >
                                <div class="link">
                                   <span class="link-white"> 	اعتماد الجهات    </span>
                                </div>
                            </a>

                            @endif
                        </div>
					</div>
                </div>
            </div>

        </div>

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

                    @if(  auth()->user()->role_id == 2 )


                    <a href="{{ route('getCompany') }}">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>الجهات المنفذة</span>
                        </div>
                    </a>
                    <a href=" {{ route('getStudent')  }}">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>المتدربين</span>
                        </div>
                    </a>
                    <a href="{{ route('getTrainer')  }}">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>المدربين</span>
                        </div>
                    </a>

                    <a href="{{ route('getCourse')  }}">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>الحقائب</span>
                        </div>
                    </a>


                    <a href="{{ route('getProject')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> المشاريع </span>
                        </div>
                    </a>

                    {{-- <a href="{{ route('country.create')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> country  </span>
                        </div>
                    </a> --}}




                    <a href="{{ route('project_managers.index')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  مدراء المشاريع </span>
                        </div>
                    </a>

                    <a href="{{ route('trainings.index')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الدورات </span>
                        </div>
                    </a>


                    <a href=" {{ route('payments.index')  }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>سداد المبالغ والمتابعة</span>
                        </div>
                       </a>

                    <a href="{{ route('getCourseOrder')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  نموذج طلب حقيبة </span>
                        </div>
                    </a>



                       <a href=" {{ route('visits.index')  }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>الزيارات الميدانية</span>
                        </div>
                       </a>


                    <a href="{{ route('companyReport')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  تقرير الجهات </span>
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
