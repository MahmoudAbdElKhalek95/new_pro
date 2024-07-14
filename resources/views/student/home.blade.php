
@extends('dashboard.layouts.mainapp')
@section('title', 'المتدربين')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">المتدربين</h3>


        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            <div class="search-box w-100 pe-lg-3">
                @if(  auth()->user()->role_id == 1 )
           <form action="{{ route('getStudent') }}" >
            @endif
            @if(  auth()->user()->role_id == 4 )
            <form action="{{ route('trainer_students') }}" >
             @endif
                    <div class="input-field w-100">
                        <label>المنطقة  </label>
                        <select  class=""  name="city_id">
                            <option  value="0"  hidden >  المنطقة  </option>
                            @foreach ( $cities  as  $item )
                             <option value="{{ $item->id ?? '' }}"> {{  $item->name ?? ''  }} </option>
                            @endforeach
                          </select>
                        {{-- <button class="search-btn">بحث</button> --}}
                    </div>

               </div>
               <div class="filter-selector w-100 ps-lg-3">

                     <div class="input-field w-100">
                        <label>الجهات</label>
                        <select  class=""  name="company_id">
                            <option value="0"  hidden >  الجهات  </option>
                            @foreach ( $company  as  $item )
                             <option value="{{ $item->id ?? '' }}"> {{  $item->user->name ?? ''  }} </option>
                            @endforeach
                          </select>
                       </div>


               </div>

               <div class="filter-selector w-100 ps-lg-3">

                     <div class="input-field w-100">
                        <label>السجل</label>
                        <input type="text"  class=""  name="national">

                       </div>

               </div>

               <div class="filter-selector w-100 ps-lg-3">

                    <input type="submit" style="margin-bottom: 25px;" class="btn btn-success"  value="بحث">

                  </div>

                </form>

            </div>

           </div>

           {{-- table -start --}}


           <div class="table-responsive-xl">
            <table class="table"   style="   display: block;
                                              overflow-x: auto;
                                               white-space: nowrap;">
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
                   الجوال
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   السجل المدني
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   الحقيبة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   الجهة المنفذه
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                {{-- <th scope="col">
                   المدرب
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th> --}}

                <th scope="col">
                   المنطقة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                   التاريخ
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   وسم إنجاز
                 <i class="fa fa-exchange" aria-hidden="true"></i>
               </th>

               @if(  auth()->user()->role_id == 4  )
               <th scope="col">
                   ملتزم

                 <i class="fa fa-exchange" aria-hidden="true"></i>
               </th>
               @endif

                <th scope="col">
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $students as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->user->name ?? '' }}  </td>
                <td>  {{ $item->user->phone ?? '' }}  </td>
                <td>  {{ $item->national  ?? ''}}  </td>
                <td>  {{ $item->companyCourse->course->name  ?? ''}}  </td>
                <td>  {{ $item->company->user->name  ?? ''}}  </td>

                {{-- <td>  {{ $item->companyCourse->trainer_name()  ?? ''}}  </td> --}}
                <td>  {{ $item->company->city->name ?? '' }}  </td>



                <td>  {{ $item->created_at->format('Y-m-d')  ?? ''}}  </td>
                <td>  {{ $item->user->student_course_register_number() ?? '' }}  </td>
               </a>
                @if(  auth()->user()->role_id == 4  )
                   <td>  {{ $item->student_rate_status() ?? '' }}  </td>
                @endif

                <td class="edit-btn ">

                   <a class="btn btn-success"   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                       اجراء عمليات
                   </a>

                     @include('student.pages',  ['id' => $item->id , 'item' => $item ]  )


                     @if( auth()->user()->role_id == 1 )
                     <a class="btn btn-info"   data-bs-toggle="modal" data-bs-target="#editModal_{{ $item->id }}" >
                        تعديل
                    </a>

                    @include('student.editModel',  ['id' => $item->id , 'item' => $item ]  )

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

                 {{ $students->render("pagination::bootstrap-4") }}

                </div>
                <div class=" col-md-4" >
                </div>

             </div>
             {{-- pagination --}}
          </div>



           {{-- end table --}}

           {{-- <div class="pagination" data-numberOfPages="10">
            <ul>

                <!-- pages or li are comes from javascript -->

            </ul>
          </div> --}}
        </div>
    </div>
</section>

<!-- End page content -->




@endsection



