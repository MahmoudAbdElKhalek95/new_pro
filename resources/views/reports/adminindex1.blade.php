

@extends('layouts.mainapp')
@section('title', 'الزيارات الميدانية')

@section('content')

<div class="home-page implementingAgencies">

<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        الزيارات الميدانية
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->
      {{-- @if( auth()->user()->role_id == 3  )
        <button     type="button" class="btn"   data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa fa-plus"></i>
          أضف سداد المبالغ
        </button> --}}

      </div>
      {{-- @include('payments.CreateModel') --}}
      {{-- @endif --}}


     </div>

    <section class="table-requests"  >
      <div class="search-page">
        <div class="row">
          <div class="col-md-6">
            <div class="search">
              <div class="label">ابحث عن الزيارات الميدانية </div>
              <i class="fa fa-search"></i>
              <input class="search form-control" placeholder="ابحث عن الزيارات الميدانية ">
              <button>بحث</button>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="way-view mb-4">

      </div>
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
                <a class="btn btn-success "   data-toggle="modal" data-target="#editexampleModal_{{ $item->id }}" >
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
                  @include('payments.edit',  ['id' => $item->id , 'item' => $item ]  )
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $payments->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

@endsection



