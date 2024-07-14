

@extends('dashboard.layouts.mainapp')

@section('title', 'المستخدمين')

@section('content')


  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">المستخدمين</h3>

            {{--  @if( auth()->user()->role_id == 1  )
            @include('company.CreateModel')
            @endif  --}}


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
                    الاسم
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
                    الصلاحية
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

            @foreach ( $users as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->name ?? '' }}  </td>

                <td>  {{ $item->phone }}  </td>

                <td>  {{ $item->email }}  </td>

                <td> {{ $item->roles()->first()->name ?? '' }} </td>


                <td class="" >
                    <a  style="text-decoration: none " href="{{ route('manger.activate' , $item->id ) }}" >
                        @if(  $item->isActive == 1   )
                        <span  style="color: green;"> {{ $item->status_name() ?? '' }} </span>
                        @else
                        <span  style="color: red;"> {{ $item->status_name() ?? '' }} </span>

                        @endif
                    </a>
                </td>

                <td class="edit-btn"  >

                    @if(  auth()->user()->role_id == 1 )

                    {{-- drop --}}

                    <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                         الصلاحيات
                    </a>
                      @include('users.roles',  ['id' => $item->id , 'item' => $item ]  )

                      {{-- end drop --}}

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



