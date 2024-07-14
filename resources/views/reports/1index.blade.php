

@extends('layouts.mainapp')
@section('title', ' التقارير')

@section('content')

<div class="home-page implementingAgencies">

<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
         التقارير
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->
      @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id == 4  ||  auth()->user()->role_id ==  3  )
        <button     type="button" class="btn"   data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus"></i>
          أضف التقارير
        </button>

        @endif

      </div>
      @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id == 4  ||  auth()->user()->role_id ==  3  )
         @include('reports.CreateModel')
      @endif


     </div>

    <section class="table-requests"  >
      <div class="search-page">
        <div class="row">
          <div class="col-md-6">
            <div class="search">
              <div class="label">ابحث عن  التقارير </div>
              <i class="fa fa-search"></i>
              <input class="search form-control" placeholder="ابحث عن  التقارير ">
              <button>بحث</button>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="way-view mb-4">

      </div>
      <div class="table-responsive-xl" style="min-height: 600px;">
        <table class="table"  style =""  >
          <thead>
          <tr class="head-table">
            <th scope="col">
              <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </th>


            <th scope="col">
                	الاسم
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                التقارير
            <i class="fa fa-exchange" aria-hidden="true"></i>
           </th>




            <th scope="col">
              إجراء حدث
            </th>
          </tr>
          </thead>
          <tbody>

        @foreach ( $report as $item )
          <tr>

            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>

            <td>  {{ $item->title ?? '' }}  </td>

            <td>


                <a  class="btn btn-info" target="_blank" href="{{ asset( $item->report ) }}" alt=" repots"  >
                    <i class="fa fa-file">
                    </i>
                </a>


            </td>

            <td class="edit-btn ">
                <a class="btn btn-success "   data-toggle="modal" data-target="#editexampleModal_{{ $item->id }}" >
                 تعديل
                </a>
                  @include('reports.edit',  ['id' => $item->id , 'item' => $item ]  )
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $report->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}

{{-- <script>

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

                        $("#total").text( data.total_amount ) ;

                     }

                 });
             }
             else{

              //  $("#total").text( " " ) ;
             }


       });
   });

   </script> --}}
@endsection






