

@extends('dashboard.layouts.mainapp')

@section('title', 'الاستبانات')

@section('content')

  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الاستبانات</h3>


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
                {{-- <form>
                    <div class="input-field w-100">
                        <label>الدور</label>
                        <select name="drinks" required>
                            <option value="" disabled selected hidden>إختار الدور من هنا</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
                </form> --}}
               </div>
           </div>

           {{-- table -start --}}


           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table">
              <thead>
              <tr class="head-table">

                <th scope="col">
                        نوع الاستبانة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الحقيبه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    السؤال
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                     الإجابات
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    تاريخ الإنشاء
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

              </tr>
              </thead>
              <tbody>

            @foreach ( $survay as $item )
              <tr>
                <td>  {{ $item->question_type->name ?? '' }}  </td>
                <td>  {{ $item->course->name ?? '' }}  </td>

                <td>  {{ $item->question ?? '' }}  </td>
                <td>  {{ $item->answer ?? '' }}  </td>

                <td>
                    {{ $item->date  }}
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

                 {{ $survay->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}
          </div>

           {{-- end table --}}


        </div>
    </div>
</section>

<!-- End page content -->




@endsection



