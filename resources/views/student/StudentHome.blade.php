
@extends('dashboard.layouts.mainapp')
@section('title', 'المتدربين')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">المتدربين</h3>


        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">

           <form action="{{ route('companyStudents') }}" >



               <div class="filter-selector w-100 ps-lg-3">

                     <div class="input-field w-100">
                        <label>السجل</label>
                        <input type="text"  class=""  name="national">

                        <input type="submit" style="" class="search-btn"  value="بحث">
                       </div>


               </div>



                </form>

            </div>

           </div>

           {{-- table -start --}}


           <div class="table-responsive-xl">
            <table class="table"  style="min-height: 450px ;" >
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
                   الجوال
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   السجل المدني
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                {{-- <th scope="col">
                   الجهة المنفذه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}
                <th scope="col">
                   المدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   التاريخ
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                  الحاله
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                  إجراء حدث
                </th>

              </tr>
              </thead>
              <tbody>

            @foreach ( $students as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->name ?? '' }}  </td>
                <td>  {{ $item->user->phone ?? '' }}  </td>
                <td>  {{ $item->national  ?? ''}}  </td>
                <td>  {{ $item->companyCourse->course->name  ?? ''}}  </td>
                {{-- <td>  {{ $item->student->companyCourse->company->name  ?? ''}}  </td> --}}

                <td>  {{ ( !empty(  $item->companyCourse ) ) ? $item->companyCourse->trainer_name()  : ''}}  </td>
                {{-- <td>  {{  $item->companyCourse->trainer->name   ?? ''}}  </td> --}}
                <td>  {{ $item->created_at->format('Y-m-d')  ?? ''}}  </td>
                <td>
                    <a class="btn btn-success rounded-2" href="{{ route('manger.activate' , $item->user->id  ) }}">
                      {{   $item->user->status_name()    }}
                      </a>
                    </td>
                <td class="edit-btn ">
                    {{-- <a class="btn btn-success " href="{{ route('changeAccountStatus', $item->user_id) }}">
                     التفعيل
                    </a> --}}

                    @if(  $item-> student_rate()->count() > 0  )

                    <a class="btn btn-success " target="_blank" href="{{ route('student_certifcate', $item->id) }}">
                       الشهادة
                    </a>

                    @endif

                    <a class="btn btn-success " target="_blank" href="{{ route('company_student_courses', $item->user_id) }}">
                       الحقائب
                   </a>

                   {{-- <a class="btn btn-success " href="{{ route('company_student_courses', $item->user_id) }}">
                       الحقائب
                   </a> --}}
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

                 {{ $students->render("pagination::bootstrap-4") }}

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



