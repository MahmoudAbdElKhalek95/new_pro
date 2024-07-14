

@extends('dashboard.layouts.mainapp')

@section('title', 'الجهات التنفيذية')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الجهات التنفيذية</h3>

            @if( auth()->user()->role_id == 1  )
            @include('company.CreateModel')
            @endif


            {{--  --}}


            {{--  --}}

        </div>
        <div class="supervisors">


           <div class="table-responsive-xl table-responsive">

               <table class="table" >
              <thead>
              <tr class="head-table">
                <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th>
                <th scope="col">
                    اسم الجهة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                    الجهة
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
                    الايميل
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                     المتدربين
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                  حالة
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>
                <th scope="col">
                   الانضمام
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
                <td>  {{ $item->regulator ?? '' }}  </td>
                <td>  {{ $item->city->name  ?? ''}}  </td>
                <td>  {{ $item->user->phone }}  </td>

                <td>  {{ $item->user->email }}  </td>

                <td>  {{ !empty( $item->student ) ? $item->student->count() : 0  }}  </td>

                <td class="status-account @if( $item->user->isActive == 1 ) active @endif ">
                  <span>  {{ $item->user->status_name() ?? '' }}  </span>
                </td>
                <td>
                    {{ $item->created_at->format('Y-m-d') ?? '' }}
                </td>
                <td class="edit-btn " style="min-width: 400px;">

                    @if(  auth()->user()->role_id == 1 )

                    {{-- drop --}}

                    <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                        اجراء عمليات
                    </a>
                      @include('company.pages',  ['id' => $item->id , 'item' => $item ]  )

                      {{-- end drop --}}

                    @endif

                    @if(  auth()->user()->role_id == 2 )

                        <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModa_{{ $item->id }}" >
                          التقيم
                        </a>
                          @include('company.rate',  ['id' => $item->id , 'item' => $item ]  )

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

                 {{ $users->render("pagination::bootstrap-4") }}

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



