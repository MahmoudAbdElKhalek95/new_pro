

@extends('dashboard.layouts.mainapp')
@section('title', 'أنواع الاستبانات')

@section('content')
<section class="supervisors-accounts">
    <div class="container-fluid">
      <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">انواع الاستبيانات</h3>

            @if( auth()->user()->role_id == 1 || auth()->user()->role_id == 2 )

            @include('question_type.CreateModel')
            @endif
        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
            {{-- <div class="search-box w-100 pe-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>ابحث في انواع الاستبيانات  </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form>
               </div> --}}
               <div class="filter-selector w-100 ps-lg-3">

               </div>
           </div>
           <div class="table-responsive-xl table-responsive" style="min-height: 600px;">
            <table class="table">
          <thead>
          <tr class="head-table">
            <th scope="col">
              <input class="check-all form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </th>
            <th scope="col">
                	نوع الاستبانة
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                عرض الاستبانة
             <i class="fa fa-exchange" aria-hidden="true"></i>
           </th>

            <th scope="col">
                تاريخ الإنشاء
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
              إجراء حدث
            </th>
          </tr>
          </thead>
          <tbody>

        @foreach ( $types as $item )
          <tr>
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->name ?? '' }}  </td>

            <td>  {{ $item->type_name() ?? '' }}  </td>

            <td>
                {{ $item->created_at->format('Y-m-d') ?? '' }}
            </td>
            <td class="edit-btn ">
                <a class="btn btn-success " href="{{ route('question_types.edit', $item->id) }}">
                  <i class="fa fa-pencil" aria-hidden="true"></i>تعديل
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
         {{ $types->render("pagination::bootstrap-4") }}
        </div>
     </div>

    </section>

  </div>
</div>

@endsection



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
function showModal(){
    $("#exampleModal").modal('show');
}
</script>
