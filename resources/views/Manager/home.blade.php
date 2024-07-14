
@extends('dashboard.layouts.mainapp')
@section('title' , 'المشرفين')
@section('content')
   <section class="supervisors-accounts">
        <div class="container-fluid">
            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard') }}/assets/images/header_icon1.png" class="me-2"> إدارة حسـابات المشرفين  </h3>
                   @include('Manager.CreateModel')
            </div>
            <div class="supervisors">
               <div class="filters d-lg-flex align-items-center border-bottom ">

               </div>
               <div class="supervisors-list">
                <div class="row">
                    @foreach ( $users as $item )
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="supervisor-box">
                            <div class="image">
                                <img class="" src="{{ asset($item->image) }}" loading="lazy" style="width: 100%;" height="150px">
                                <a style="text-decoration: none " href="{{ route('manger.activate' , $item->id ) }}" >
                                <div class="status">

                                    {{ $item->status_name() ?? '' }}

                                </div>
                             </a>
                            </div>
                            <div class="supervisor-info">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="d-flex align-items-center pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/users.png" class="pe-1">
                                        <div>
                                            <span class="head">الإسم</span>
                                            <span class="supervisor-data">{{ $item->name }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img src="{{ asset('dashboard') }}/assets/images/mobile.png" class="pe-1">
                                        <div>
                                            <span class="head">رقم الجوال</span>
                                            <span class="supervisor-data">{{ $item->phone }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/Icon simple-email.png" class="pe-1">
                                        <div>
                                            <span class="head">الإيميل</span>
                                            <span class="supervisor-data" style="width: 65px;word-break: break-all;">{{ $item->email }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img src="{{ asset('dashboard') }}/assets/images/calendar.png" class="pe-1">
                                        <div>
                                            <span class="head">تاريخ الانضمام</span>
                                            <span class="supervisor-data">{{ $item->created_at->format('Y-m-d') ?? '' }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="actions d-flex align-items-center justify-content-evenly py-4">
                                @if( auth()->user()->role_id == 2 || auth()->user()->role_id == 1 )
                                <div class="d-flex align-items-center">

                                    <a href="{{ route('managerProjectFollow', $item->id ?? 0) }}"><img src="{{ asset('dashboard') }}/assets/images/see_projects.png" class="ps-2">
                                        <span style="color: black;">متابعة المشاريع</span>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center">

                                    <a   href="{{ route('editManager', $item->id) }}"><img src="{{ asset('dashboard') }}/assets/images/edit.png"  class="ps-2">
                                        <span style="color: black;" > تعديل </span>
                                    </a>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>
               </div>

               <div class="row" >
                    <div class="md-6"></div>
                    <div class="col-md-6">
                    {{ $users->appends( request()->all() )->render("pagination::bootstrap-4") }}
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection




