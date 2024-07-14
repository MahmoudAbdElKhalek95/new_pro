
@extends('dashboard.layouts.mainapp')
@section('title', ' الاستبانات')

@section('content')
<section class="supervisors-accounts">
    <div class="container-fluid">
      <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2"> الاستبيانات</h3>


        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>ابحث في  الاستبيانات  </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form>
               </div>
               <div class="filter-selector w-100 ps-lg-3">

               </div>
           </div>


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

        </div>

      </div>



    </section>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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



