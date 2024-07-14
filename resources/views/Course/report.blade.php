

@extends('dashboard.layouts.mainapp')
@section('title', 'تقرير الحقائب')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">تقرير الحقائب</h3>

        



        </div>
        <div class="supervisors">
           {{-- <div class="filters d-lg-flex align-items-center border-bottom ">
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
           </div> --}}

           {{-- table -start --}}

           <div class="table-responsive-xl">
            <table class="table">
              <thead>
              <tr class="head-table">

                <th scope="col">
                    اسم الجهة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    عدد مرات التنفيذ
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الجهات التي نفذت
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    عدد المدربين
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                       عدد المتدربين
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>



              </tr>
              </thead>
              <tbody>

            @foreach ( $course as $item )
              <tr>
                <td>  {{ $item->name ?? '' }}  </td>

                <td>  {{ $item->order_course()->where('status' , 'completed') ->count() ?? 0  }}  </td>
                  <td>
                    @if(  !empty(  $item->course_company() )  )
                     @foreach ( $item->course_company() as  $c  )
                     {{ $c->user->name  ?? '' }}
                     @endforeach

                     @endif


                    </td>

                <td>  {{ $item->trainers()->count() ?? 0 }}  </td>
                <td>  {{ $item->students()->count()  ??  0 }}  </td>



              </tr>
              @endforeach

              </tbody>
            </table>

             {{-- pagination --}}

             <div class="row" >

                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >

                 {{ $course->render("pagination::bootstrap-4") }}

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



