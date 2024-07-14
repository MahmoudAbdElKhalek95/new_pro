
@extends('dashboard.layouts.mainapp')
@section('title', 'الاستبانات')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الاستبانات</h3>

          

          </div>
       

        </div>
        <div class="supervisors">


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



