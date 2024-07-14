
@extends('dashboard.layouts.mainapp')
@section('title', 'الدورات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الدورات</h3>
            <button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة دورات </span></button>
            <div class="_modal">
                <div class="_modal-content">
                    <div class="_modal-header d-flex align-items-center justify-content-between">
                        <h1>إضافة الدورات</h1>
                        <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

                    </div>

                    <form  method="post" enctype="multipart/form-data" action="{{ route('trainings.store') }}">
                        @csrf
                    <div class="form py-5  px-4">
                        <div class="d-lg-flex align-items-center  mb-2 ">
                            <div class="w-100 pe-lg-3">
                                <div class="input-field w-100">
                                    <label>اسم الدورة  </label>
                                    <input type="text" name="name" value="{{ old('name') }}"  placeholder="اسم الدورة ">
                                </div>
                                @error('name')
                                <div class="alert alert-danger" >
                                 {{ $message }}
                                </div>
                                @enderror
                           </div>
                           <div class=" w-100 ps-lg-3">
                                <div class="input-field w-100">
                                    <label>المنطقة</label>
                                    <select required   name ="city_id">
                                        <option disabled selected hidden >  المنطقة  </option>
                                        @foreach ( $cities  as  $item )

                                        <option value="{{ $item->id }}"> {{  $item->name  }} </option>

                                       @endforeach
                                      </select>

                                </div>
                                @error('city_id')
                                <div class="alert alert-danger" >
                                 {{ $message }}
                                </div>
                                @enderror
                           </div>
                        </div>
                        <div class="d-lg-flex align-items-center ">
                            <div class=" w-100 pe-lg-3">

                                    <div class="input-field w-100">
                                        <label>من  </label>
                                        <input type="date" name="from" value="{{ old('from') }}"  placeholder="من ">
                                    </div>

                                    @error('from')
                                    <div class="alert alert-danger" >
                                     {{ $message }}
                                    </div>
                                    @enderror

                           </div>
                           <div class=" w-100 ps-lg-3">
                                <div class="input-field w-100">
                                    <label>إلى  </label>
                                    <input type="date" name="to" value="{{ old('to') }}"  placeholder="إلى ">
                                </div>
                                @error('to')
                                <div class="alert alert-danger" >
                                 {{ $message }}
                                </div>
                                @enderror
                           </div>
                        </div>
                        <div class="d-lg-flex align-items-center  mb-2 ">
                            <div class="w-100 pe-lg-3">
                                <div class="input-field w-100">
                                    <label>عدد الساعات </label>
                                    <input type="number" name ="hour_number" value="{{ old('hour_number') }}" placeholder="عدد الساعات">
                                </div>

                                @error('hour_number')
                                <div class="alert alert-danger" >
                                 {{ $message }}
                                </div>
                                @enderror
                           </div>

                           <div class=" w-100 ps-lg-3">

                           </div>

                        </div>

                        <button type="submit" class="custom-btn">
                            اضافة
                        </button>
                    </div>
                </form>


                </div>
            </div>


        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>ابحث في حسـابات المشرفين  </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form>
               </div>
               <div class="filter-selector w-100 ps-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>الدور</label>
                        <select name="drinks" required>
                            <option value="" disabled selected hidden>إختار الدور من هنا</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
                </form>
               </div>
           </div>

           {{-- table -start --}}


           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table">
              <thead>
              <tr class="head-table">
                <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                        اسم الدورة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    من
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                  إلى
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        عدد الساعات
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                       المنطقة
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th>

                 <th scope="col">
                        الحالة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                  </th>

                  <th scope="col">
                    تاريخ التنفيذ
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th>




                <th scope="col">
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $training as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->name ?? '' }}  </td>
                <td>  {{ $item->from ?? '' }}  </td>
                <td>  {{ $item->to ?? '' }}  </td>
                <td>  {{ $item->hour_number ?? '' }}  </td>
                <td>  {{ $item->city->name ?? '' }}  </td>

                {{-- <td>
                    <img src=" {{ asset( $item->cert ) }} " alt="cert" width="100px" height="100opx;" >
                 </td> --}}

                  <td>  {{ $item->status_name() ?? '' }}  </td>

                  <td>  {{ $item->created_at->format('Y-m-d') ?? '' }}  </td>

                <td class="edit-btn ">
                    @if(  auth()->user()->role_id == 4 )
                    @if(  $item->print_certifcate_status( ) == 1 )
                      <a class="btn btn-primary "  target="_blank" href="{{ route('trainings.print', $item->id) }}">

                        طباعة الشهادة

                      </a>
                      @endif
                      @endif
                      @if(  auth()->user()->role_id == 1 )
                      <a class="btn btn-success " href="{{ route('trainings.edit', $item->id) }}">

                        تعديل
                      </a>
                      @endif
                      @if(  auth()->user()->role_id == 4 )
                      <a class="btn btn-warning" href="{{ route('trainings.register', $item->id) }}">

                        تسجيل
                      </a>
                      @endif
                </td>
              </tr>
              @endforeach

              </tbody>
            </table>
            {{-- pagination --}}
            <div class="row" >

                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >

                 {{ $training->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}
          </div>



           {{-- end table --}}

           {{-- <div class="pagination" data-numberOfPages="10">
            <ul>

                <!-- pages or li are comes from javascript -->

            </ul>
          </div> --}}
        </div>
    </div>
</section>

<!-- End page content -->




@endsection



