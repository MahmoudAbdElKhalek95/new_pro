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
        <img class="small-aside" src="{{ asset('dashboard/assets/images/setting_sm.png"')}} ">
    </div>
   </a>

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

