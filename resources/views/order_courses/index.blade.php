

@extends('dashboard.layouts.mainapp')

@section('title', 'طلبات الحقائب')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">طلبات الحقائب</h3>


        </div>
        <div class="supervisors">


           {{-- table -start --}}

           <div class="table-responsive-xl">
            <table class="table"  style="  display: block;
                                            overflow-x: auto;
             white-space: nowrap;">
              <thead>
              <tr class="head-table">

                <th scope="col">
                    إسم الحقيبه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    النسخ المطلوبة للمدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    النسخ المطلوبة للمتدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                {{-- <th scope="col">
                    اسم الجهة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}
              {{--
                <th scope="col">
                        تاريخ التطبيق
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}
                {{-- <th scope="col">
                        الوقت
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}
                {{-- <th scope="col">
                        عدد المشاركين
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}

                {{-- <th scope="col">
                         المدرب
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                 </th> --}}

                <th scope="col">
                    نوع الشخن
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                  </th>

                  <th scope="col">
                        السعر الاجمالي
                   <i class="fa fa-exchange" aria-hidden="true"></i>
                  </th>

                   <th scope="col">
                        حالة الطلب
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>

                <th scope="col">
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $order_courses as $item )
              <tr>

                <td>  {{ $item->course->name ?? '' }}     </td>
                <td>  {{ $item->trainer_quantity ?? '' }}  </td>
                <td>  {{ $item->student_quantity  ?? ''}}  </td>
                {{-- <td>  {{ $item->company->user->name   ?? ''}}  </td>
                <td>  {{ $item->date   ?? ''}}  </td>
                <td>  {{ $item->time   ?? ''}}  </td> --}}
                {{-- <td>  {{ $item->subscriber_number   ?? ''}}  </td> --}}
                {{-- <td>  {{ $item->trainer->user->name   ?? ''}}  </td> --}}
                <td>  {{ $item->shipping_way  ==  'from_office' ? 'استلام من المقر' : 'شحن الطلب' }}  </td>
                <td>  {{ $item->total_price   ?? ''}}  </td>
                 <td>  {{ $item->status_name()  ?? ''}}  </td>




                <td class="edit-btn ">

                    @if(  auth()->user()-> role_id == 1 || auth()->user()-> role_id == 2 )
                    {{-- <a class="btn btn-warning " title="نموذج عقد المدرب" href="{{ route('trainer.create_contract', $item->course->id ) }}">
                        نموذج عقد المدرب
                      </a> --}}

                    <a  class=" btn btn-success"  data-bs-toggle="modal"  data-bs-target="#edit_status_modal_{{$item->id}}" title="editstatus">
                          تعديل حالة الطلب
                        </a>
                        @include('order_courses.EditStatusModal',  ['id' => $item->id , 'status' => $item->status , 'total_amount' => $item->getTotalAmounts(   $item->course_id  )  ]  )

                        @endif

                        @if( auth()->user()-> role_id == 3 )

                        <a  class=" btn btn-success"  data-bs-toggle="modal"  data-bs-target="#pay_modal_{{$item->id}}" title="editstatus">
                             سداد المبالغ
                          </a>
                          @include('payments.CreateModel',  ['id' => $item->id , 'item'=>$item  ]  )

                          <a  class=" btn btn-info"  data-bs-toggle="modal"  data-bs-target="#payed_modal_{{$item->id}}" title="editstatus">
                            المبالغ المسدده
                         </a>
                         @include('payments.PayedModel',  ['id' => $item->id , 'item'=>$item  ]  )


                        @endif
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

                 {{ $order_courses->render("pagination::bootstrap-4") }}

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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>

    $(document).ready(function(){


      $("#status").change(function(){

          var status=$(this).val();



             if(status == "pending")
             {
                 // alert ("value in if "+status ) ;
                 // console.log( status );

                 $('#amount').show() ;
                 $('#discount').show() ;



             }
             else{

                 $('#amount').hide() ;
                 $('#discount').hide() ;


             }


       });
   });

   </script>

@endsection



