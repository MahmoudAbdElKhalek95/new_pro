

@extends('dashboard.layouts.mainapp')

@section('title', 'انواع التقارير')

@section('content')

  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">انواع التقارير</h3>

            @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id == 4  ||  auth()->user()->role_id ==  3  )
            <button     type="button" class="btn"   data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa fa-plus"></i>
              أضف انواع التقارير
            </button>

            @endif

          </div>
             @if( auth()->user()->role_id == 1 ||  auth()->user()->role_id == 4  ||  auth()->user()->role_id ==  3  )
             @include('report_type.CreateModel')
          @endif
        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>ابحث في   </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form>
               </div>
               <div class="filter-selector w-100 ps-lg-3">
                {{-- <form>
                    <div class="input-field w-100">
                        <label>الدور</label>
                        <select name="drinks" required>
                            <option value="" disabled selected hidden>إختار الدور من هنا</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
                </form> --}}
               </div>
           </div>

           {{-- table -start --}}

           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  >
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
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $report as $item )
              <tr>

                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>

                <td>  {{ $item->name ?? '' }}  </td>

                <td class="edit-btn ">
                    <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                      @include('report_type.edit',  ['id' => $item->id , 'item' => $item ]  )
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

                 {{ $report->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}


          </div>



           {{-- end table --}}


        </div>
    </div>
</section>

<!-- End page content -->




@endsection



