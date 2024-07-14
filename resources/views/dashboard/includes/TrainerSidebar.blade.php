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

  @can('trainer-courses')
   <a href="{{ route('getTrainerCourses')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الحقائب
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
 @endcan


 @can('trainer-avlable-courses')

   <a href="{{ route('getTrainerAvlableCourses')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            الفرص التدربية
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


  @can('trainer-contract')

   <a href="{{ route('trainer_contract')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            نموذج عقد المدرب
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
   @endcan


   @can('trainer-report-data')

   <a href="{{ route('trainer_report_data')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            إحصائيات المدرب
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a>
   @endcan


   {{-- <a href="{{ route('survay.index')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            عرض الاستبانات
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
   </a> --}}


   @can('Student-List')

   <a href="{{ route('trainer_students')  }}" >
    <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
        <h3 class="large-aside">
            المتدربين
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

