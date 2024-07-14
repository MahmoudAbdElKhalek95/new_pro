

@extends('dashboard.layouts.mainapp')

@section('title', 'سداد المبالغ والمتابعة')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">سداد المبالغ والمتابعة</h3>


            {{-- @if( auth()->user()->role_id == 3  )
            <button   class="btn btn-success"  type="button" class="btn"   data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa fa-plus"></i>
              أضف سداد المبالغ
            </button>

          </div>
          @include('payments.CreateModel')
          @endif --}}


        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">
                {{-- <form>
                    <div class="input-field w-100">
                        <label>ابحث في حسـابات المشرفين  </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form> --}}
               </div>
               <div class="filter-selector w-100 ps-lg-3">

               </div>
           </div>

           {{-- table -start --}}



           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  >
              <thead>
              <tr class="head-table">

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
                    مرفق
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

                {{-- <th scope="col">
                  إجراء حدث
                </th> --}}
              </tr>
              </thead>
              <tbody>

            @foreach ( $payments as $item )
              <tr>

                <td>  {{ $item->course->name ?? '' }}  </td>
                <td>  {{ $item->price ?? '' }}  </td>
                <td>  {{ $item->date ?? '' }}  </td>
                <td>  {{ $item->payment_way_name() ?? '' }}  </td>


                     <td>

                        <a href="{{ asset( $item->file )  }}" download >
                         <img src="  {{ asset( $item->file ) }} "  alt="file" width="100px  " height="100px ;"  >
                        </a>
                    </td>

                    <td>
                        <a href="{{ asset( $item->attachment )  }}" download >
                        <img src="  {{ asset( $item->attachment ) }} "  alt="file" width="100px  " height="100px ;"  >
                        </a>
                     </td>


                    <td>  {{  $item->status_name() ?? '' }}  </td>
                    <td>  {{   $item->note ?? '' }}  </td>


                {{-- <td class="edit-btn ">


                    <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                      تعديل
                    </a>
                      @include('payments.edit',  ['id' => $item->id , 'item' => $item ]  )


                </td> --}}
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>

    $(document).ready(function(){


      $("#course_id").change(function(){

          var course=$(this).val();

             if(course)
             {
               //alert ("value in if "+course ) ;
                 // console.log( course );
                 $.ajax({
                    // url:'getcourseunits/'+course,
                    url: 'course/'+course+'/amount'  ,

                     type:'GET',
                     dataType:'json',
                     success:function (data) {
                     //    alert('success') ;
                       // console.log(data);

                       // $("#total").text( data.total_amount ) ;

                        $("#total").text( data ) ;


                     }

                 });
             }
             else{

              //  $("#total").text( " " ) ;
             }


       });
   });

   </script>



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



