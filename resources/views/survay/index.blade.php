

@extends('dashboard.layouts.mainapp')
@section('title', ' الاستبانات')

@section('content')
<section class="supervisors-accounts">
    <div class="container-fluid">
      <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2"> الاستبيانات</h3>

            {{-- @if( auth()->user()->role_id == 1 || auth()->user()->role_id == 2 ) --}}

            @include('survay.CreateModel')
        {{-- </div> --}}
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
           <div class="table-responsive-xl table-responsive" style="min-height: 600px;">
            <table class="table">
          <thead>
          <tr class="head-table">
            <th scope="col">
              <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </th>
            <th scope="col">
                	نوع الاستبانة
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                الحقيبه
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>


            <th scope="col">
                تاريخ الإنشاء
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
              إجراء حدث
            </th>
          </tr>
          </thead>
          <tbody>

        @foreach ( $survay as $item )
          <tr>
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->question_type->name ?? '' }}  -  {{ $item->question_type->type_name() ?? ''   }} </td>
            <td>  {{ $item->course->name ?? '' }}  </td>

            <td>
                {{ $item->date  }}
            </td>
            <td class="edit-btn ">
                <a class="btn btn-success "  target="_blank" href="{{ route('survay.show', $item->question_type_id ) }}">
                  <i class="fa fa-pencil" aria-hidden="true"></i>تعديل
                </a>
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

             {{-- {{ $survay->render("pagination::bootstrap-4") }} --}}

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



