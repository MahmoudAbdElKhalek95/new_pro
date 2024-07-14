

@extends('dashboard.layouts.mainapp')

@section('title', 'الحقائب التدريبية')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الحقائب التدريبية</h3>



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
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                    إسم الحقيبه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الفئة العمريه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الوصف
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    غلاف الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                  {{-- <th scope="col">
                    سعر نسخة المدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    سعر نسخة المتدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}
                <th scope="col">
                    مجال الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    مستوى الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    الجهات التي نفذت
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    تاريخ الإنشاء
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>


              </tr>
              </thead>
              <tbody>

            @foreach ( $courses as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->name ?? '' }}  </td>
                <td>  {{ $item->age ?? '' }}  </td>
                <td>  {{ $item->desc  ?? ''}}  </td>
                <td>
                    @if(  !empty( $item->image_path) )
                    <img src="{{  asset($item->image_path)  }}" alt="image" width="50px" height="50px">

                    @else
                    <img src="{{  asset('files/uploads/course/default.png')  }}" alt="image" width="50px" height="50px">

                    @endif
                 </td>

                 {{-- <td>  {{ $item->trainer_price ?? '' }}  </td>
                 <td>  {{ $item->student_price ?? '' }}  </td> --}}
                 <td>  {{ $item->field  ?? ''}}  </td>
                 <td>  {{ $item->level  ?? ''}}  </td>

                 <td>
                      @if(  !empty(  $item->course_company() )  )
                       @foreach ( $item->course_company() as  $c  )
                          {{ $c->user->name  ?? '' }}
                       @endforeach
                      @endif

                    </td>

                <td>
                    {{ $item->created_at->format('Y-m-d') ?? '' }}
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

                 {{ $courses->render("pagination::bootstrap-4") }}

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



