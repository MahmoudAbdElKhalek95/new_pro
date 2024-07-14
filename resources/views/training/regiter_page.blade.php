

@extends('dashboard.layouts.mainapp')
@section('title', 'الدورات - طلبات التسجيل ')

@section('content')

<div class="home-page implementingAgencies">

<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        الدورات
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}


      </div>


     </div>


      <div class="supervisors">
           {{-- <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>ابحث في حسـابات المشرفين  </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form>
               </div>
               <div class="filter-selector w-100 ps-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>الدور</label>
                        <select name="drinks" required>
                            <option value="" disabled selected hidden>إختار الدور من هنا</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                    </div>
                </form>
               </div>
           </div> --}}
           <div class="table-responsive-xl table-responsive" style="min-height: 600px;">
            <table class="table">
          <thead>
          <tr class="head-table">
            <th scope="col">
              <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </th>
            <th scope="col">
                	اسم الدورة
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                المدرب
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>



             <th scope="col">
                	الحالة
              <i class="fa fa-exchange" aria-hidden="true"></i>
              </th>

            <th scope="col">
              إجراء حدث
            </th>
          </tr>
          </thead>
          <tbody>

        @foreach ( $training as $item )
          <tr>
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->training->name ?? '' }}  </td>
            <td>  {{ $item->trainer->user->name ?? '' }}  </td>
            <td>  {{ $item->status_name() ?? '' }}  </td>




            <td class="edit-btn ">
                @if(  auth()->user()->role_id == 1 )
                <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                  تعديل
                </a>

                   @include('training.editStatus',  ['id' => $item->id , 'item' => $item ]  )
                  @endif
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

             {{ $training->render("pagination::bootstrap-4") }}

            </div>
            <div class=" col-md-4" >
            </div>

         </div>
         {{-- pagination --}}
       
      </div>

   

    </div>

  </div>
</div>

@endsection



