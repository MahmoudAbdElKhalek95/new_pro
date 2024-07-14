

@extends('layouts.mainapp')
@section('title', ' الاستبانات')

@section('content')

<div class="home-page implementingAgencies">

<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
         الاستبانات
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}


      </div>



     </div>

    <section class="table-requests"  >
      <div class="search-page">
        <div class="row">
          <div class="col-md-6">
            <div class="search">
              <div class="label">ابحث عن  الاستبانات </div>
              <i class="fa fa-search"></i>
              <input class="search form-control" placeholder="ابحث عن  الاستبانات ">
              <button>بحث</button>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="way-view mb-4">

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
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $survay->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>



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



