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


                 $notifcations = Notifcation::whereIn('id' ,  $notifcation_arr )->get() ;


@endphp

<section class="top-bar-page">
    <div class="container-fluid">
        <div class="right-section">
            <div class="btn-menu-mobile">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
            <div class="name-user">مرحبا بك يا
                <span>
                   @if( auth()->user()->role_id == 3  )
                   {{ auth()->user()->name ?? '' }}
                   @else
                   {{ auth()->user()->name ?? '' }}
                   @endif
                   </span>
                    معنا
            </div>
        </div>
        <div class="left-section">
            <div class="search">
                <i class="fa fa-search"></i>
                <input type="search" class="form-control" placeholder="بحث"/>
            </div>
            <div class="alert-notification">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownNotifaction" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell-o" aria-hidden="true" style="color: red"> {{ $notifcations->count()  ?? 0  }}</i>
                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownNotifaction" style="z-index: 10;max-height: 250px;overflow: auto">
                       @forelse ( $notifcations as  $notify  )
                       <li>
                        <a href="{{ $notify->link  }}" target="_blank">
                        <a class="dropdown-item" href="{{  route('markAsRead' ,  $notify->id ) }}">
                            {{  $notify->message  }}
                            <br>
                            {{  $notify->title  }}
                            </a>
                        </a>
                       </li>
                       <hr style="color: black;">
                       @empty
                       <li>
                        <a class="dropdown-item" href="#">
                         لا يوجد اشعارات جديده
                       </a>
                       </li>
                       @endforelse
                    </ul>
                </div>
                {{--  --}}
            </div>
            <div class="user-btn">
                <div class="dropdown">
                    <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('frontend/image/Mask%20Group%202.png')}}" alt="image user">
                        {{  auth()->user()->name  }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        {{-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Action</a></li> --}}
                        <li><a class="dropdown-item" href=" {{ route('user.logout') }}"> تسجيل الخروج </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
