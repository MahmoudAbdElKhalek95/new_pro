

@extends('layouts.mainapp')
{{-- <title> نموذج طلب حقيبة</title> --}}
@section('title', 'نموذج طلب حقيبة')

@section('content')

<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        نموذج طلب حقيبة
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->

        {{-- <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa fa-plus"></i>
          أضف نموذج طلب حقيبة
        </button> --}}


       
      </div>



     </div>

    <section class="table-requests">
      <div class="search-page">
        <div class="row">
          <div class="col-md-6">
            <div class="search">
              <div class="label">ابحث عن نموذج طلب حقيبة </div>
              <i class="fa fa-search"></i>
              <input class="search form-control" placeholder="ابحث عن نموذج طلب حقيبة ">
              <button>بحث</button>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="way-view mb-4">
        
      </div>
      <div class="table-responsive-xl">
        <table class="table"  style="   display: block;
                                        overflow-x: auto;
         white-space: nowrap;">
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
                النسخ المطلوبة للمدرب
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                النسخ المطلوبة للمتدرب
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
            	اسم الجهة
              <i class="fa fa-exchange" aria-hidden="true"></i>

            <th scope="col">
                	تاريخ التطبيق
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                	الوقت
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                	عدد المشاركين
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                	 المدرب
             <i class="fa fa-exchange" aria-hidden="true"></i>
             </th>


            <th scope="col">
                مستلم الشحنة
             <i class="fa fa-exchange" aria-hidden="true"></i>
              </th>

              <th scope="col">
                	جوال المستلم
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
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->course->name ?? '' }}     </td>
            <td>  {{ $item->trainer_quantity ?? '' }}  </td>
            <td>  {{ $item->student_quantity  ?? ''}}  </td>
            <td>  {{ $item->company->user->name   ?? ''}}  </td>
            <td>  {{ $item->date   ?? ''}}  </td>
            <td>  {{ $item->time   ?? ''}}  </td>
            <td>  {{ $item->subscriber_number   ?? ''}}  </td>
            <td>  {{ $item->trainer->user->name   ?? ''}}  </td>
            <td>  {{ $item->reciever_name   ?? ''}}  </td>
            <td>  {{ $item->reciever_phone   ?? ''}}  </td>
             <td>  {{ $item->status_name()  ?? ''}}  </td>

            <td class="edit-btn ">
                {{-- <a class="btn btn-success " href="{{ route('editCourse', $item->id) }}">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a> --}}
                @if(  auth()->user()-> role_id == 1 || auth()->user()-> role_id == 2 )
                <a class="btn btn-warning " title="نموذج عقد المدرب" href="{{ route('trainer.create_contract', $item->id) }}">
                    نموذج عقد المدرب
                  </a>

                <a  class=" btn btn-success"  data-toggle="modal"  data-target="#edit_status_modal_{{$item->id}}" title="editstatus">
                      تعديل حالة الطلب
                    </a>
                    @include('order_courses.EditStatusModal',  ['id' => $item->id , 'status' => $item->status , 'total_amount' => $item->getTotalAmounts(   $item->course_id  )  ]  )
                    
                    @endif
                </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $order_courses->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

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










