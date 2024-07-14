@php

use App\Models\NotifcationRead ;
use App\Models\Notifcation ;

         $user_id = auth()->id() ;
         $read_notificatio_ids = NotifcationRead::where('user_id' , $user_id)->where('read' , 1 )->pluck('notifcation_id')->toArray() ;
         $notifcations = Notifcation::whereNotIn('id' ,   $read_notificatio_ids  )
                ->get();


                $notifcation_arr = [ ] ;

                foreach(  $notifcations as $item  )
                {

                    if( in_array( $user_id , explode(',' , $item->to_user )   )  )
                    {
                        array_push( $notifcation_arr , $item->id  ) ;
                    }

                }


                 $notifcations = Notifcation::whereIn('id' ,  $notifcation_arr )->orderBy('id' , 'desc')->get() ;


@endphp



   <!-- Start Header -->
   {{-- <section class="header p-3">
    <div class="container-fluid">
        <div class=" d-flex align-items-center justify-content-between">
                <div class="logo">
                    <img class="large_screen" src="{{ asset('dashboard/assets/images/logo-header.png')}}">
                </div>
                <div class="welcome-user">
                    <h3>
                     مرحبا بك يا
                        <span>
                            @if( auth()->user()->role_id == 3  )
                            {{ auth()->user()->company->name ?? '' }}
                            @else

                            {{ auth()->user()->name ?? '' }}

                            @endif
                       </span>
                       معنا
                    </h3>
                </div>
                <div class="search-box">
                    <form>
                        <div class="search-input d-none d-md-flex">
                            <input type="text" placeholder="بحث">
                            <button>  <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}"></button>
                        </div>

                    </form>
                </div>

                <div class="notification-messages">
                    <ul>
                        <li class="d-inline-block d-md-none"><img loading="lazy" src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}"></li>
                        <li><img loading="lazy" src="{{ asset('dashboard/assets/images/notifications.png')}}"></li>
                        <li><img loading="lazy" src="{{ asset('dashboard/assets/images/messages.png')}}"></li>

                    </ul>
                </div>
                <div class="user d-flex align-items-center">
                    <div class="image">
                        <img loading="lazy" src="{{ asset('dashboard/assets/images/user.png')}}" class="img-fluid">

                    </div>
                    <div class="name d-none d-lg-block">
                        <h3 >Ibrahim Elmalky</h3>
                    </div>
                    <div class="dropdown d-none d-lg-block">
                       <img src="{{ asset('dashboard/assets/images/Icon ionic-ios-arrow.png')}}">
                    </div>
                </div>
        </div>
    </div>
  </section> --}}


     <section class="header p-3">
        <div class="container-fluid">
            <div class=" d-flex align-items-center justify-content-between">
                    <div class="logo">
                        <img class="large_screen" src="{{ asset('dashboard/assets/images/logo-header.png')}}">
                    </div>
                    <div class="welcome-user">
                         <h3>
                     مرحبا بك يا
                        <span>
                            @if( auth()->user()->role_id == 3  )
                            {{ auth()->user()->name ?? '' }}
                            @else

                            {{ auth()->user()->name ?? '' }}

                            @endif
                       </span>
                       معنا
                    </h3>
                    </div>
                    <div class="search-box">
                        <form>
                            <div class="search-input d-none d-md-flex">
                                <input type="text" placeholder="بحث">
                                <button>  <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}"></button>
                            </div>

                        </form>
                    </div>

                    <div class="notification-messages">
                        <ul>
                            <li class="d-inline-block d-md-none dropdown notification " data-target="#search"><img loading="lazy" src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}">
                                <div class="dropdown-menu" id="search">
                                    <div class="search-box">
                                        <form>
                                            <div class="search-input ">
                                                <input type="text" placeholder="بحث">
                                                <button>  <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}"></button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </li>
                         
                            {{--  <li class="dropdown notification " data-target="#notification"><img loading="lazy" src="{{ asset('dashboard/assets/images/notifications.png')}}">
                                <span class="notification-count">{{ $notifcations ->count() ?? 0 }} </span>
                                <ul class="dropdown-menu" id="notification">

                                   @foreach (  $notifcations as $item )

                                    <li>
                                            <div class="d-flex align-items-center justify-content-start border-bottom p-2">
                                            <div class="">
                                               <span class="name d-block">

                                                <a class="dropdown-item" href="{{  route('markAsRead' ,  $item->id ) }}">

                                                    {{  $item->message  }}
                                                    <br>
                                                    {{  $item->title  }}
                                                    </a>

                                                </span>
                                                <span class="date">
                                                    {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                </span>
                                            </div>
                                            </div>
                                    </li>

                                    @endforeach

                                </ul>
                            </li>  --}}
                          

                        </ul>
                    </div>
                    <div class="user d-flex align-items-center dropdown notification " data-target="#user">
                        <div class="image">
                            <img loading="lazy" src="{{ asset('dashboard/assets/images/user.png')}}" class="img-fluid">

                        </div>
                        <div class="name d-none d-lg-block">
                            <h3 > {{ auth()->user()->name ?? '' }}</h3>
                        </div>

                        <ul class="dropdown-menu" id="user" >
                            <li>
                               <div  class="p-3 mb-3">
                                <a href="{{ route('profile')  }}">
                                    <img src="{{ asset('dashboard/assets/images/users.png')}}" class="img-fluid pe-2" style="width:40px;height: 30px;">
                                    <span class="name">الملف الشخصي</span>

                                 </a>
                               </div>
                            </li>
                            <li>

                                    <a href="{{ route('user.logout')  }}" class="p-3">
                                     <img src="{{ asset('dashboard/assets/images/logout.png')}}" class="img-fluid pe-2"style="width:40px;height: 30px;">
                                    <span class="name"> تسجيل الخروج</span>



                                 </a>
                            </li>
                        </ul>

                    </div>
            </div>
        </div>
    </section>



<!-- End Header -->
