

@extends('dashboard.layouts.mainapp')
@section('title', ' سعر الشحن')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard') }}/assets/css/trainers_course.css">
@endsection
@section('content')

   <section class="trainers_course">

            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">سعر الشحن</h3>


                @if( auth()->user()->role_id==1)
                @include('shiping.create')
                @endif
            </div>

            <div class="row">


           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  style =""  >
              <thead>
              <tr class="head-table">


                <th scope="col">
                    سعر الشحن
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    عدد النسخ من
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    عدد النسخ الي
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $Shiping as $item )
              <tr>



                <td>  {{ $item->price ?? '' }}  </td>
                <td>  {{ $item->quantity_from ?? '' }}  </td>

                <td>  {{ $item->quantity_to ?? '' }}  </td>




                <td class="edit-btn ">
                    <a class="btn btn-success "  href="{{ route('shiping.edit' , $item->id) }}" >
                     تعديل
                    </a>

                </td>
              </tr>
              @endforeach

              </tbody>
            </table>


          </div>





           </div>






    </section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('dashboard') }}/assets/js/trainers_course.js"></script>
<script>

    $(document).ready(function(){


      $("#type").change(function(){
            $("#question_card").show();
            $(".question_row_all").hide();
            $(".question_row_"+$(this).val()).show();
       });
   });

   </script>
@endsection



