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
    </div>
   </a>

    <a href="{{ route('profile')  }}" >
     <div class="option d-flex align-items-center">
        <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}" >
        <h3 class="large-aside">
            إدارة بياناتي
        </h3>
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
     </div>
   </a>

     {{--  <a href="{{ route('roles.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        الصلاحيات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>  --}}

  {{--  @can('users-List')

   <a href="{{ route('users.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
           المستخدمين
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  @endcan  --}}



  {{--  @can('slider-List')  --}}
  <a href="{{ route('sliders.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        السليدر
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  {{--  @endcan  --}}

  <a href="{{ route('partiner.index')  }}" >
   <div class="option d-flex align-items-center">
      <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
      <h3 class="large-aside">
       الشركاء
      </h3>
      <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
   </div>
 </a>

  {{--  @can('news-List')  --}}

  <a href="{{ route('news.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        الاخبار
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  {{--  @endcan  --}}

  {{--  @can('news-List')  --}}

  <a href="{{ route('getProject')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        المشاريغ
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>
  {{--  @endcan  --}}

  <a href="{{ route('service.index')  }}" >
   <div class="option d-flex align-items-center">
      <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
      <h3 class="large-aside">
       الخدمات
      </h3>
      <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
   </div>
 </a>




  {{--  @can('about-List')  --}}
  <a href="{{ route('about.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
        من نحن
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>

  {{--  @endcan  --}}

  {{--  @can('about-List')  --}}
  <a href="{{ route('setting.index')  }}" >
    <div class="option d-flex align-items-center">
       <img class="large-aside" src="{{ asset('dashboard/assets/images/setting.png')}}">
       <h3 class="large-aside">
         الاعدادات
       </h3>
       <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png')}} ">
    </div>
  </a>

  {{--  @endcan  --}}


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

