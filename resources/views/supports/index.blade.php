
@extends('dashboard.layouts.mainapp')
@section('title', 'الداعمين')

@section('content')

  <!-- Start page content -->
<section class="supervisors-accounts">
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">الداعمين</h3>

            @if( auth()->user()->role_id == 1  )
            <button    class="btn btn-success" type="button" class="btn"   data-bs-toggle="modal" data-bs-target="#exampleModal">
              <i class="fa fa-plus"></i>
              أضف الداعمين
            </button>

            @endif

          </div>
          @if( auth()->user()->role_id == 1  )
             @include('supports.CreateModel')
          @endif

        </div>
        <div class="supervisors">

           </div>
           {{-- table -start --}}

           <div class="table-responsive-xl" style="min-height: 600px;">
            <table class="table"  >
              <thead>
              <tr class="head-table">
                {{-- <th scope="col">
                  <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </th> --}}
                <th scope="col">
                        النوع
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        الاسم
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                        رقم الجوال
                 <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                 <th scope="col">
                        العنوان
                  <i class="fa fa-exchange" aria-hidden="true"></i>
                </th>

                <th scope="col">
                  إجراء حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $supports as $item )
              <tr>

                {{-- <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td> --}}

                <td>  {{ $item->type ?? '' }}  </td>
                <td>  {{ $item->name ?? '' }}  </td>
                <td>  {{ $item->phone ?? '' }}  </td>
                <td>  {{ $item->addres ?? '' }}  </td>

                <td class="edit-btn ">
                    <a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal_{{ $item->id }}" >
                      <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                      @include('supports.edit',  ['id' => $item->id , 'item' => $item ]  )
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

                 {{ $supports->render("pagination::bootstrap-4") }}

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



