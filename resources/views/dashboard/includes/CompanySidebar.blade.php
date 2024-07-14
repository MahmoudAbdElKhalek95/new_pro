<!-- Start aside -->
<aside class="main-menu">
    <div class="expand-aside">
        <img src="{{ asset('dashboard/assets/images/angle-right.png')}}">
    </div>
    <a href="{{ route('home') }}">
    <div class="option active d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/main.png')}}">
        <h3 class="large-aside">الرئيسية</h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/main_sm.png')}}">
    </div></a>
    <a href="{{ route('profile')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            إدارة بياناتي
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>

   {{-- <a href="{{ route('project_follow')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        متابعة المشاريع
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
</a> --}}
@can('company-courses')
   <a href="{{ route('getCompanyCourses')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الحقائب
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
   @endcan


   {{-- <a href="{{ route('getCompanyCoursesDetails')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الحقائب المنفذة
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}

   {{-- <a href="{{ route('getCompanyTrainers')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            تقرير المدربين
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}

   {{-- <a href="{{ route('getCompanyApplayTrainers')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            المدربين المتقدمين
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}
   @can('Student-List')
   <a href="{{ route('companyStudents')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            المتدربين
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
   @endcan


   @can('Student-Create')
   <a href="{{ route('addStudents')  }}" >
     <div class="option d-flex align-items-center">
         <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
         <h3 class="large-aside">
             تسجيل المتدربين
         </h3>
         <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
     </div>
    </a>
    @endcan

   {{-- <a href="{{ route('payments.index')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            سداد المبالغ والمتابعة
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png"')}} ">
    </div>
   </a> --}}

   @can('course_order-List')

   <a href="{{ route('getCourseOrder')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            طلبات الحقائب
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
   @endcan


   @can('payments-List')

   <a href="{{ route('payments.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        سداد المبالغ والمتابعة
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

   {{-- <a href="{{ route('company.visit')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الزيارات الميدانية
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png"')}} ">
    </div>
   </a> --}}


   @can('company-avlable-courses')

   <a href="{{ route('companyAvailableCourses')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الفرص التدربية للجهة
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
   @endcan

   {{-- <a href="{{ route('getProject')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            المشاريع
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}

   {{-- <a href="{{ route('survay.index')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            عرض الاستبانات
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}

   {{-- <a href="{{ route('trainings.index')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الدورات
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}

   {{-- <a href="{{ route('allReport')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            التقارير
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}


   {{-- <a href="{{ route('reports.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        شواهد التنفيذ
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a> --}}

  @can('reports-List')
  <a href="{{ route('allReport')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        التقارير
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('slider-List')
  <a href="{{ route('sliders.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        السليدر
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('news-List')

  <a href="{{ route('news.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        الاخبار
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('shiping-List')
  <a href="{{ route('shiping.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        سعر الشحن
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('about-List')
  <a href="{{ route('about.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        من نحن
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>

  @endcan

  @can('training_types-List')
  <a href="{{ route('training_types.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        انواع الخدمات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('trainings-List')
  <a href="{{ route('trainings.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        الخدمات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan



  @can('question-types-List')
  <a href="{{ route('question_types.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        أنواع الاستبانات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('questions-List')
  <a href="{{ route('questions.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        الاستبانات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan

  @can('survay-List')
  <a href="{{ route('survay.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        عرض الاستبانات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan



   <a href="{{ route('user.logout')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/logout.png')}}">
        <h3 class="large-aside">
                تسجيل الخروج
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/logout_sm.png')}}">
    </div>
   </a>
</aside>
<!-- End aside -->

