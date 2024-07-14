
@extends('dashboard.layouts.mainapp')
@section('title' , 'المدربين')
@section('content')
   <section class="supervisors-accounts">
        <div class="container-fluid">
            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard') }}/assets/images/header_icon1.png" class="me-2"> إدارة حسـابات المدربين  </h3>
                   @include('trainer.CreateModel')
            </div>
            <div class="supervisors">
               <div class="filters d-lg-flex align-items-center border-bottom ">
                {{-- <div class="search-box w-100 pe-lg-3">
                    <form>
                        <div class="input-field w-100">
                            <label>ابحث في حسـابات المدربين  </label>
                            <img src="{{ asset('dashboard') }}/assets/images/Icon feather-search.png" style="padding-left: 5px;">
                            <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                            <button class="search-btn">بحث</button>
                        </div>
                    </form>
                   </div> --}}
                   {{-- <div class="filter-selector w-100 ps-lg-3">
                    <form>
                        <div class="input-field w-100">
                            <label>الدور</label>
                            <select name="role_id" required>
                                <option value="" disabled selected hidden>إختار الدور من هنا</option>
                                <option value="1"> المدرين </option>
                                <option value="2"> المشرقين </option>
                                <option value="3">  الكل</option>
                              </select>
                              <button type= "submit" class="btn btn-info">بحث</button>
                        </div>
                    </form>
                   </div> --}}
               </div>
               <div class="supervisors-list">
                <div class="row">
                    @foreach ( $users as $item )
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="supervisor-box">
                            <div class="image">
                                @if( !empty( $item->cert_path ) )
                                <img src="{{ asset( $item->cert_path ) }}" loading="lazy" style="width: 100%;" height="150px">
                                @else
                                <img src="{{ asset('files/uploads/default.png' ) }}"  loading="lazy" style="width: 100%;" height="150px">
                                @endif
                                
                                <a style="text-decoration: none " href="{{ route('trainer.activate' , $item->user->id ) }}" >
                                <div class="status">

                                    {{ $item->user->status_name() ?? '' }}

                                </div>
                             </a>
                            </div>
                            <div class="supervisor-info">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="d-flex align-items-center pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/users.png" class="pe-1">
                                        <div>
                                            <span class="head">الإسم</span>
                                            <span class="supervisor-data">{{ $item->user->name ?? ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img src="{{ asset('dashboard') }}/assets/images/mobile.png" class="pe-1">
                                        <div>
                                            <span class="head">رقم الجوال</span>
                                            <span class="supervisor-data"> {{ $item->user->phone  ?? ''}} </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/Icon simple-email.png" class="pe-1">
                                        <div>
                                            <span class="head">الإيميل</span>
                                            <span class="supervisor-data" style="width: 65px;word-break: break-all;"> {{ $item->user->email  ?? ''}}  </span>

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
                              
                                <div class="d-flex align-items-center">
                                    @if( auth()->user()->role_id == 2  )
    
                                    <a class="btn btn-success "   data-toggle="modal" data-target="#editexampleModal_{{ $item->id }}" >
                                    التقيم
                                    </a>
                                      @include('trainer.projectmangerrate',  ['id' => $item->id , 'item' => $item ]  )
                    
                                   @endif
                                </div>
                                <div class="d-flex align-items-center">
                                  
                                    @if( auth()->user()->role_id == 1  )
                                       <a class="btn btn-success"   data-bs-toggle="modal" data-bs-target="#pagesexampleModal_{{ $item->id }}" >
                                        اجراء عمليات
                                      </a>
    
                                      @include('trainer.pages',  ['id' => $item->id , 'item' => $item ]  )
                                      @endif
                                  </div>
                               
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




