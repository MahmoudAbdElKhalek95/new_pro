
@extends('dashboard.layouts.mainapp')
@section('title', 'الزيارات الميدانية')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الزيارات الميدانية</h3>



        </div>
        <div class="supervisors">


           </div>

           {{-- table -start --}}


           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  >
              <thead>
              <tr class="head-table">
                <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                        الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        المبلغ المسدد
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        تاريخ السداد
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                 <th scope="col">
                        طريقة السداد
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        إيصال السداد
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                       حالة السداد
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th>

                 <th scope="col">
                      الملاحظات
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th>



                <th scope="col">
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $payments as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->course->name ?? '' }}  </td>
                <td>  {{ $item->price ?? '' }}  </td>
                <td>  {{ $item->date ?? '' }}  </td>
                <td>  {{ $item->payment_way_name() ?? '' }}  </td>


                     <td>

                         <img src="  {{ asset( $item->file ) }} "  alt="file" width="100px  " height="100px ;"  >
                    </td>

                    <td>  {{  $item->status_name() ?? '' }}  </td>
                    <td>  {{   $item->note ?? '' }}  </td>


                <td class="edit-btn ">
                    <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                      @include('payments.edit',  ['id' => $item->id , 'item' => $item ]  )
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

                 {{ $payments->render("pagination::bootstrap-4") }}

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



