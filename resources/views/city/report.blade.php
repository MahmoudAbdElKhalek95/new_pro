

@extends('dashboard.layouts.mainapp')
@section('title', 'تقرير للمناطق')

@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        تقرير للمناطق
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->

      </div>

     {{-- @include('city.CreateModel') --}}
     </div>

    <section class="table-requests">

        <form method="get" action="{{ route('cityReport') }}" >
            <div class="search-page">
              <div class="row">


                <div class="col-md-4">
                  <div class="selected-search">
                      <div class="label"> المنطقة </div>
                      <select  class="form-select"  name="city_id">
                        <option  value="0"  hidden >  المنطقة  </option>
                        @foreach ( $cities  as  $item )
                         <option value="{{ $item->id ?? '' }}"> {{  $item->name ?? ''  }} </option>
                        @endforeach
                      </select>

                    </div>
                </div>

                <div class="col-md-3">
                  <div class="search"  style="margin-top: 25px;" >
                     <button class="btn btn-success rounded">بحث</button>
                  </div>
                 </div>

              </div>
            </div>

           </form>
      <hr>
      <div class="way-view mb-4">

      </div>
      <div class="table-responsive-xl">
        <table class="table">
          <thead>
          <tr class="head-table">

            <th scope="col">
                اسم الجهة
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                عدد المدربين
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
               	عدد المتدربين
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                	عدد الحقائب
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
               	عدد المشاريع
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>
            <th scope="col">
                عدد المشرفين
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

          </tr>
          </thead>
          <tbody>

        @foreach ( $city as $item )
          <tr>
            <td>  {{ $item->name ?? '' }}  </td>
            <td>  {{ $item->trainer_count() ?? '' }}  </td>
            <td>  {{ $item->student_count()  ?? ''}}  </td>
            <td>  {{ $item->course_count() }}  </td>
            <td>  {{ $item->project_count() }}  </td>
            <td>  {{ $item->manager_count() }}  </td>




          </tr>
          @endforeach

          </tbody>
        </table>
      </div>

     <div class="row" >
        <div class="md-6"></div>
        <div class="col-md-6">
         {{ $city->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

@endsection



