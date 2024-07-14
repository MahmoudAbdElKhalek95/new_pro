

@extends('dashboard.layouts.mainapp')
@section('title', 'الفرص التدربية')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div style="margin-right: 50px;" class="d-md-flex align-items-center justify-content-between mb-4">
            <h3  class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الفرص التدربية</h3>




        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">

               {{-- <div class="filter-selector w-100 ps-lg-3">
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
               </div> --}}
           </div>

           {{-- table -start --}}


           <div class="table-responsive-xl">
            <table class="table">
              <thead>
              <tr class="head-table">
                <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                    إسم الجهة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
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
                </th>
                <th scope="col">
                    تاريخ الإنشاء
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                {{-- <th>  الحاله  </th> --}}

                <th scope="col">

                    متاح للتدريب

                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $courses as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->company->name ?? '' }}  </td>
                <td>  {{ $item->course->name ?? '' }}  </td>
                <td>  {{ $item->course->age ?? '' }}  </td>
                <td>  {{ $item->course->desc  ?? ''}}  </td>
                <td>
                    @if(  !empty( $item->image_path) )
                    <img src="{{  asset($item->image_path)  }}" alt="image" width="50px" height="50px">

                    @else
                    <img src="{{  asset('files/uploads/course/default.png')  }}" alt="image" width="50px" height="50px">

                    @endif
                 </td>

                <td>
                    {{ $item->created_at->format('Y-m-d') ?? '' }}
                </td>

                {{-- <td>  {{   $item->tariner_staus()  }}    </td> --}}

                <td class="edit-btn ">
                    <a class="btn btn-success " href="{{ route('trainercoursesenroll', $item->id) }}">
                     تسجيل
                    </a>
                </td>
              </tr>
              @endforeach

              </tbody>
            </table>

            {{-- end table --}}

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

        </div>
    </div>
</section>

<!-- End page content -->




@endsection



