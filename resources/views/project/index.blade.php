

@extends('dashboard.layouts.mainapp')
@section('title' , 'المشاريع')
@section('content')

<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">المشاريع</h3>

            @if( auth()->user()->role_id == 1  )
            {{-- <button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة مشروع </span></button> --}}

            @include('project.CreateModel')
            @endif
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

           {{-- table -start --}}


           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table">
              <thead>
                <tr class="head-table">
                    <th scope="col">
                    <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </th>
                    <th scope="col">
                        إسم المشروع
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    @if(  auth()->user()->role_id == 1 )
                    <th scope="col">
                        رقم المشروع
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    @endif

                    <th scope="col">
                        المنطقة
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>

                    @if(  auth()->user()->role_id == 1 )
                    <th scope="col">
                        الدعم
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    @endif
                    <th scope="col">
                        مدير المشروع
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    @if(  auth()->user()->role_id == 1 )
                    <th scope="col">
                        تاريخ البدايه
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    <th scope="col">
                        تاريخ النهايه
                    <i class="fa fa-exchange" aria-hidden="true"></i>
                    </th>
                    @endif


             

                @if(  auth()->user()->role_id == 1 )
                    <th scope="col">
                    إجراء حدث
                    </th>
                    @endif
                </tr>
              </thead>
              <tbody>

             @foreach ( $projects as $item )
            <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->name ?? '' }}  </td>
                @if(  auth()->user()->role_id == 1 )
                <td>  {{ $item->number ?? '' }}  </td>
                @endif
                <td>  {{ $item->location ?? '' }}  </td>
                @if(  auth()->user()->role_id == 1 )
                <td>  {{ $item->support_company  ?? ''}}  </td>
                @endif
                <td>  {{ $item->project_manager  ?? ''}}  </td>
                @if(  auth()->user()->role_id == 1 )
                <td>  {{ $item->start_date  ?? ''}}  </td>
                <td>  {{ $item->end_date  ?? ''}}  </td>
                @endif
           

                @if(  auth()->user()->role_id == 1 )
                <td class="edit-btn ">
                    <a class="btn btn-success " href="{{ route('editProject', $item->id) }}">
                    تعديل
                    </a>
                </td>
                @endif
            </tr>
            @endforeach
              </tbody>
            </table>
            <div class="row" >
                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >
                 {{ $projects->render("pagination::bootstrap-4") }}
                </div>
                <div class=" col-md-4" >
                </div>
             </div>
          </div>
        </div>
    </div>
</section>





@endsection



