

@extends('layouts.mainapp')
@section('title', ' الحقائب التدريبية')

@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        الحقائب التدريبية
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->
        @if( auth()->user()->role_id == 1  )
        <button type="button" class="btn " data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus"></i>
          أضف الحقائب التدريبية
        </button>
        @endif
      </div>
        @include('Course.CreateModel')
     </div>

    <section class="table-requests">
      <div class="search-page">
        <div class="row">
          <div class="col-md-6">
            <div class="search">
              <div class="label">ابحث عن الحقائب التدريبية </div>
              <i class="fa fa-search"></i>
              <input class="search form-control" placeholder="ابحث عن الحقائب التدريبية ">
              <button>بحث</button>
            </div>
          </div>

        </div>
      </div>
      <hr>
      <div class="way-view mb-4">

      </div>
      <div class="table-responsive-xl">
        <table class="table">
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
                الفئة العمريه
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                الوصف
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                غلاف الحقيبة
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

        @foreach ( $courses as $item )
          <tr>
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->name ?? '' }}  </td>
            <td>  {{ $item->age ?? '' }}  </td>
            <td>  {{ $item->desc  ?? ''}}  </td>
            <td>
                @if(  !empty( $item->image_path) )
                <img src="{{  asset($item->image_path)  }}" alt="image" width="50px" height="50px">

                @else
                <img src="{{  asset('files/uploads/course/default.png')  }}" alt="image" width="50px" height="50px">

                @endif
             </td>

            <td>
                {{ $item->created_at->format('Y-m-d') ?? '' }}
            </td>
            <td class="edit-btn ">

                <a class="btn btn-success"   data-toggle="modal" data-target="#editexampleModal_{{ $item->id }}" >
                    اجراء عمليات
                </a>

                  @include('Course.pages',  ['id' => $item->id , 'item' => $item ]  )


            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $courses->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

@endsection



