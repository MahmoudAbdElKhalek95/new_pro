
@extends('layouts.mainapp')
@section('title' , 'المدربين')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
           المدربين
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->

      </div>


     </div>

    <section class="table-requests">

      <div class="search-page">

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
                الإسم
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                المنطقة
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                الجوال
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                الإيميل
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                حالة الحساب
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                الصورة
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                شهادة الإعتماد
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                إجراء حدث
              </th>

          </tr>
          </thead>
          <tbody>

        @foreach ( $users as $item )
          <tr>
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->user->name ?? '' }}  </td>
            <td>  {{ $item->cities->name ??  $item->city }}  </td>
            <td>  {{ $item->user->phone ?? '' }}  </td>
            <td>  {{ $item->user->email ?? ''  }}  </td>

            <td class="status-account @if( $item->user->isActive == 1 ) active @endif ">
                <span>  {{ $item->user->status_name() ?? '' }}  </span>
            </td>
            <td>

                @if( !empty( $item->image ) )
                <img src="{{ asset( $item->image ) }}" width="100px" height="100px">
                @else
                <img src="{{ asset('files/uploads/default.png' ) }}" width="100px" height="100px">
                @endif

             </td>
           <td>
            @if( !empty( $item->cert_path ) )
            <img src="{{ asset( $item->cert_path ) }}" width="100px" height="100px">
            @else
            <img src="{{ asset('files/uploads/default.png' ) }}" width="100px" height="100px">
            @endif
             </td>

             <td class="edit-btn ">
                <a class="btn btn-success " target="_blank" href="{{ route('trainerCourses', $item->id) }}">
                    الحقائب
                </a>
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $users->appends( request()->all() )->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

@endsection



