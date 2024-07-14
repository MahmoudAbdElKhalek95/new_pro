

@extends('dashboard.layouts.mainapp')
    @section('title', 'تقرير الجهات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">تقرير الجهات</h3>


        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">

               </div>
               <div class="filter-selector w-100 ps-lg-3">

               </div>
           </div>

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
                    عدد المدربين
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                       عدد المتدربين
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                        عدد الحقائب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                       عدد المشاريع
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

              </tr>
              </thead>
              <tbody>

            @foreach ( $company as $item )
              <tr>
                <td>  {{ $item->user->name ?? '' }}  </td>
                <td>  {{ $item->trainer_count() ?? '' }}  </td>
                <td>  {{ $item->student_count()  ?? ''}}  </td>
                <td>  {{ $item->course_count() }}  </td>
                <td>  {{ $item->project_count() }}  </td>

              </tr>
              @endforeach

              </tbody>
            </table>

              {{-- pagination --}}

              <div class="row" >

                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >

                 {{ $company->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

                <div class="col-md-3">
                  {{-- <div class="search">
                     <button class="custom-btn">بحث</button>
                  </div> --}}

              </div>
            </div>

           </form>

    </div>
</section>

<!-- End page content -->




@endsection



