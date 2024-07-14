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

                    @if(auth()->user()->role_id == 1  )

                    <a href="{{ route('getManager') }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المشرفين</span>
                        </div>
                    </a>
                    <a href="{{ route('getCompany') }}">
                        <div class="link">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <span>الجهات المنفذة</span>
                        </div>
                    </a>
                    <a href=" {{ route('getStudent')  }}">
                        <div class="link">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المتدربين</span>
                        </div>
                    </a>
                    <a href="{{ route('getTrainer')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>المدربين</span>
                        </div>
                    </a>
                    {{-- @if(auth()->user()->role_id == 2) --}}
                    <a href="{{ route('getCourse')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>الحقائب </span>
                        </div>
                    </a>
                    @endif
                     {{-- @endif company --}}

                     @if(auth()->user()->role_id == 3  )


                     <a href="{{ route('getCompany') }}">
                         <div class="link">
                             <i class="fa fa-university" aria-hidden="true"></i>
                             <span>الجهات المنفذة</span>
                         </div>
                     </a>


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

                    @endif


                    @if(auth()->user()->role_id == 4  )



                    <a href="{{ route('getTrainerCourses')  }}">
                        <div class="link">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                            <span>الحقائب </span>
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
                    <div class="link">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        <span>تعديل بياناتي</span>
                    </div>
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
                <img src="image/logo/logo.png" alt="logos">
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

                    @if(auth()->user()->role_id == 1  )

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

                    @endif

                    @if(auth()->user()->role_id == 3  )


                    <a href="{{ route('getCompany') }}">
                        <div class="link">
                            <i class="fa fa-university" aria-hidden="true"></i>
                            <span>الجهات المنفذة</span>
                        </div>
                    </a>


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

                   @endif


                   @if(auth()->user()->role_id == 4  )



                   <a href="{{ route('getTrainerCourses')  }}">
                       <div class="link">
                           <i class="fa fa-suitcase" aria-hidden="true"></i>
                           <span>الحقائب </span>
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
                    <div class="link">
                        <i class="fa fa-home"></i>
                        <span>تعديل بياناتي</span>
                    </div>

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
