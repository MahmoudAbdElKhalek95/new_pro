
@extends('dashboard.layouts.mainapp')

@section('title', 'المدربين')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">المدربين</h3>


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
                    الإسم
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    المنطقة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الجوال
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الإيميل
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    حالة الحساب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الصورة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    شهادة الإعتماد
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                    إجراء حدث
                  </th>

              </tr>
              </thead>
              <tbody>

            @foreach ( $users as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->user->name ?? '' }}  </td>
                <td>  {{ $item->cities->name ??  $item->city }}  </td>
                <td>  {{ $item->user->phone ?? '' }}  </td>
                <td>  {{ $item->user->email ?? ''  }}  </td>

                <td class="status-account @if( $item->user->isActive == 1 ) active @endif ">
                    <span>  {{ $item->user->status_name() ?? '' }}  </span>
                </td>
                <td>

                    @if( !empty( $item->image ) )
                    <img src="{{ asset( $item->image ) }}" width="100px" height="100px">
                    @else
                    <img src="{{ asset('files/uploads/default.png' ) }}" width="100px" height="100px">
                    @endif

                 </td>
               <td>
                @if( !empty( $item->cert_path ) )
                <img src="{{ asset( $item->cert_path ) }}" width="100px" height="100px">
                @else
                <img src="{{ asset('files/uploads/default.png' ) }}" width="100px" height="100px">
                @endif
                 </td>

                 <td class="edit-btn ">
                    <a class="btn btn-success " target="_blank" href="{{ route('trainerCourses', $item->id) }}">
                        الحقائب
                    </a>
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

                 {{ $users->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
            {{-- pagination --}}

          </div>




        </div>
    </div>
</section>

<!-- End page content -->




@endsection



