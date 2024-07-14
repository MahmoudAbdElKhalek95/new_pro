
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
                    إسم الحقيبه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                     المدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    عدد الساعات
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
                <td>  {{ $item->course->name ?? '' }}  </td>
                <td>  {{ $item->trainer->user->name ?? '' }}  </td>

                <td>  {{ $item->hour_number ?? '' }}  </td>

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



