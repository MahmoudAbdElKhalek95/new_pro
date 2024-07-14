
@extends('dashboard.layouts.mainapp')
@section('title', 'الحقائب التدريبية')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الحقائب التدريبية</h3>

            @if( auth()->user()->role_id == 1  )
            @include('Course.CreateModel')
            @endif



        </div>
        <div class="supervisors">
         

           {{-- table -start --}}

           <div class="table-responsive-xl">
            <table class="table">
              <thead>
              <tr class="head-table">
                <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                     الحقيبه
                 
                </th>
                <th scope="col">
                    الفئة 
                 
                </th>
                <th scope="col">
                    الوصف
                 
                </th>
                <th scope="col">
                    الغلاف 
                 
                </th>
                <th scope="col">
                    التاريخ 
                 
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

                    <a class="btn btn-success"   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                        اجراء عمليات
                    </a>

                      @include('Course.pages',  ['id' => $item->id , 'item' => $item ]  )


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

                 {{ $courses->render("pagination::bootstrap-4") }}

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



