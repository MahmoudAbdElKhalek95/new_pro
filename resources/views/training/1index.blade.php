

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

                    <form>
                    <div class="form py-5  px-4">
                        <div class="d-lg-flex align-items-center  mb-2 ">
                            <div class="w-100 pe-lg-3">
                                <div class="input-field w-100">
                                    <label>الإسم </label>
                                    <input type="text" placeholder="الإسم">
                                </div>
                           </div>
                           <div class=" w-100 ps-lg-3">
                                <div class="input-field w-100">
                                    <label>النوع</label>
                                    <select name="gender" required>
                                        <option value="" disabled selected hidden>إختار النوع  </option>
                                        <option value="male">ذكر</option>
                                        <option value="female">أنثي</option>
                                      </select>
                                </div>
                           </div>
                        </div>
                        <div class="d-lg-flex align-items-center ">
                            <div class=" w-100 pe-lg-3">
                                <div class="input-field w-100">
                                    <label>المنطقة</label>
                                    <select name="drinks" required>
                                        <option value="" disabled selected hidden>المنطقة </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                      </select>
                                </div>
                           </div>
                           <div class=" w-100 ps-lg-3">
                                <div class="input-field w-100">
                                    <label>المدينة  </label>
                                    <select required>
                                        <option value="" disabled selected hidden>المدينة </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                      </select>
                                </div>
                           </div>
                        </div>
                        <div class="d-lg-flex align-items-center  mb-2 ">
                            <div class="w-100 pe-lg-3">
                                <div class="input-field w-100">
                                    <label>الجوال </label>
                                    <input type="text" placeholder="الجوال">
                                </div>
                           </div>
                           <div class=" w-100 ps-lg-3">
                                <div class="input-field w-100">
                                    <label>المؤهل</label>
                                    <select required>
                                        <option value="" disabled selected hidden>المؤهل </option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                      </select>
                                </div>
                           </div>
                        </div>
                        <div class="d-lg-flex align-items-center  mb-2 ">
                            <div class="w-100 pe-lg-3">
                                <div class="input-field w-100">
                                    <label>اكتب كلمة السر </label>
                                    <input type="password" placeholder="اكتب كلمة السر">
                                </div>
                           </div>
                           <div class="w-100 ps-lg-3">
                            <div class="input-field w-100">
                                <label>اعد كتابة كلمة السر </label>
                                <input type="password" placeholder="اعد كتابة كلمة السر ">
                            </div>
                       </div>
                        </div>
                        <button class="custom-btn">اضافة
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

           {{--  --}}

           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  style=""  >
              <thead>
              <tr class="head-table">
                <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                        مدير المشروع
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        الجهة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        تاريخ الزيارة

                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                 <th scope="col">

                        سبب الزيارة
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

                <td>  {{ $item->project_manager->name ?? '' }}  </td>
                <td>  {{ $item->company->user->name ?? '' }}  </td>
                <td>  {{ $item->date ?? '' }}  </td>
                <td>  {{ $item->reason ?? '' }}  </td>

                <td class="edit-btn ">
                    <a class="btn btn-success "   data-toggle="modal" data-target="#editexampleModal_{{ $item->id }}" >
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                      @include('visit.edit',  ['id' => $item->id , 'item' => $item ]  )
                </td>
              </tr>
              @endforeach

              </tbody>
            </table>
          </div>

           {{--  --}}

           <div class="pagination" data-numberOfPages="10">
            <ul><!-- pages or li are comes from javascript --> </ul>
          </div>
        </div>
    </div>
</section>

<!-- End page content -->




@endsection



