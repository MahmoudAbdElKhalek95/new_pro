<section class="right-bar right-bar-desktop   active cards-number">
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

                    @if( auth()->user()->role_id == 1   ||  auth()->user()->role_id == 2 )

                    <a href="{{ route('getManager') }}"   class="{{ (request()->is('manager*')) ? 'activelink' : '' }}" >
                        <div class="link"  >
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المشرفين</span>
                        </div>
                    </a>
                    <a href="{{ route('getCompany') }}" class="{{ (request()->is('company*')) ? 'activelink' : '' }}" >
                        <div class="link">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <span>الجهات المنفذة</span>
                        </div>
                    </a>
                    @if( auth()->user()->role_id == 1)
                    <a href=" {{ route('getStudent')  }}" class="{{ (request()->is('getStudent*')) ? 'activelink' : '' }}" >
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المتدربين</span>
                        </div>
                    </a>
                    @endif
                    <a href="{{ route('getTrainer')  }}"    class="{{ (request()->is('trainer*')) ? 'activelink' : '' }}" >
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>المدربين</span>
                        </div>
                    </a>
                    {{-- @if(auth()->user()->role_id == 2) --}}
                    <a href="{{ route('getCourse')  }}"  class="{{ (request()->is('course*')) ? 'activelink' : '' }}" >
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>الحقائب </span>
                        </div>
                    </a>

                    <a href="{{ route('getProject')  }}"  class="{{ (request()->is('projects*')) ? 'activelink' : '' }}" >
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


                    <a href="{{ route('question_types.index')  }}" class="{{ (request()->is('question_types*')) ? 'activelink' : '' }}" >
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> أنواع الاستبانات </span>
                        </div>
                    </a>

                    <a href="{{ route('questions.index')  }}"  class="{{ (request()->is('question*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الاستبانات </span>
                        </div>
                    </a>


                    {{-- <a href="{{ route('survay.create')  }}" class="{{ (request()->is('question*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> أضف الاستبانات </span>
                        </div>
                    </a> --}}

                    <a href="{{ route('survay.index')  }}"  class="{{ (request()->is('survay*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> عرض الاستبانات </span>
                        </div>
                    </a>

                    <a href="{{ route('project_managers.index')  }}"  class="{{ (request()->is('project_managers*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  مدراء المشاريع </span>
                        </div>
                    </a>

                    <a href="{{ route('trainings.index')  }}"   class="{{ (request()->is('trainings*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الدورات </span>
                        </div>
                    </a>

                    <a href="{{ route('trainings.registerpage')  }}"   class="{{ (request()->is('trainingregister*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الدورات - طلبات التسجيل </span>
                        </div>
                    </a>

                    <a href="{{ route('getCourseOrder')  }}"   class="{{ (request()->is('getCourseOrder*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  نموذج طلب حقيبة </span>
                        </div>
                    </a>



                    <a href=" {{ route('payments.index')  }}" class="{{ (request()->is('payments*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>سداد المبالغ والمتابعة</span>
                        </div>
                       </a>


                    <a href=" {{ route('supports.index')  }}" class="{{ (request()->is('supports*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>الداعمين</span>
                        </div>
                       </a>

                       <a href=" {{ route('visits.index')  }}" class="{{ (request()->is('visits*')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>الزيارات الميدانية</span>
                        </div>
                       </a>




                    <div class="title">
                        <small> التقارير </small>
                    </div>

                    <a href="{{ route('allReport')  }}"   class="{{ (request()->is('allReport')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  التقارير </span>
                        </div>
                    </a>


                    <a href="{{ route('report_types.index')  }}"   class="{{ (request()->is('report_types')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  انواع التقارير </span>
                        </div>
                    </a>

                    <a href="{{ route('reports.index')  }}"   class="{{ (request()->is('reports')) ? 'activelink' : '' }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>    شواهد التنفيذ </span>
                        </div>
                    </a>


                    {{-- <a href="{{ route('projects.follow')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>   متابعه المشاريع <span>
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

                    @if( auth()->user()->role_id == 1   || auth()->user()->role_id == 2 )

                    <a href="{{ route('getManager') }}">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>المشرفين</span>
                        </div>
                    </a>
                    <a href="{{ route('getCompany') }}">
                        <div class="link">
                            <i class="fa fa-home"></i>
                            <span>الجهات المنفذة</span>
                        </div>
                    </a>
                    <a href=" {{ route('getStudent')  }}"">
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


                    <a href="{{ route('question_types.index')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span> أنواع الاستبانات </span>
                        </div>
                    </a>

                    <a href="{{ route('questions.index')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>  الاستبانات </span>
                        </div>
                    </a>

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


                    <a href=" {{ route('supports.index')  }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>الداعمين</span>
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
