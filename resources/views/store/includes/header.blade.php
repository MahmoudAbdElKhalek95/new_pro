
<!--start Header -->

<div class="row main-nav">
    <div class="col">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{ route('store') }}">

                <img  src="{{ asset('store/assets/img/aram-logo.png') }}"  alt="logo">
            </a>
            <div>
                <button data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img class="d-lg-none" src="{{ asset('store/assets/img/cart.svg')}}" alt="">
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"href="{{ route('store') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">المشاريع</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.courses') }}"> الحقائب </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.training') }}">  الخدمات  </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.news') }}">  الاخبار </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.about') }}">من نحن</a>
                    </li>
                    {{-- <li class="nav-item">
                        @if(auth()->check())

                        <a class="nav-link" href=" #"> {{ auth()->user()->name }}  </a>
                        @else

                        <a class="nav-link" href="{{ route('home.getLogin') }}"> تسجيل الدخول </a>

                        @endif
                    </li> --}}
                    <li class="nav-item dropdown">


                        @if(auth()->check())

                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href=" #"> {{ auth()->user()->name }}  </a>
                        @else

                        <a class="nav-link "  href="{{ route('home.getLogin') }}"> تسجيل الدخول </a>

                        @endif

                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{ route('home.logout')  }}"> تسجيل الخروح </a></li>
                          @if(    auth()->check()  && auth()->user()->role_id == 3 )
                          <li><a class="dropdown-item" href="{{ route('getCourseOrder')  }}"> طلبات الحقائب </a></li>
                          @endif

                        </ul>
                      </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="{{asset('store/assets/img/account.svg')}}" width="24" height="24" alt="">
                        </a>
                    </li> --}}
                    <li class="nav-item">
                    <div class="dropdown" >
                        <a class="btn btn-outline-dark" href="{{ route('course.cart') }}" >
                           <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge text-bg-danger"> {{ count((array) session('cart')) }} </span>
                        </a>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">القائمة الرئيسية</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('store') }}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">المشاريع</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.courses') }}"> الحقائب </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.training') }}"> الخدمات </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.news') }}"> الاخبار </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.about') }}">من نحن</a>
                </li>
                <li class="nav-item dropdown">


                    @if(auth()->check())

                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href=" #"> {{ auth()->user()->name }}  </a>
                    @else

                    <a class="nav-link "  href="{{ route('home.getLogin') }}"> تسجيل الدخول </a>

                    @endif

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('home.logout')  }}"> تسجيل الخرود </a></li>
                      {{-- <li><a class="dropdown-item" href="#">Link 2</a></li> --}}

                    </ul>
                  </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="./pages/session/login.html">تسجيل الدخول</a>
                </li> --}}
            </ul>
        </div>

    </div>
</div>


<!-- End Header -->
