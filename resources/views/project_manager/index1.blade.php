

@extends('dashboard.layouts.mainapp')
@section('title', 'مدراء المشاريع')
@section('content')
<section class="supervisors-accounts">
    <div class="container-fluid">
      <div class="d-md-flex align-items-center justify-content-between mb-4">
            <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">مدراء المشاريع</h3>

            @if( auth()->user()->role_id == 1  )

            @include('project_manager.CreateModel')
            @endif
        </div>
        <div class="supervisors">
           <div class="filters d-lg-flex align-items-center border-bottom ">
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
           </div>
           <div class="table-responsive-xl table-responsive" style="min-height: 600px;">
            <table class="table">
              <thead>
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
                	تاريخ الميلاد
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                	الجوال
             <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

             <th scope="col">
                	البريد الإلكتروني
              <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
               	المؤهل الدراسي
             <i class="fa fa-exchange" aria-hidden="true"></i>
            </th>

            <th scope="col">
                	التخصص
            <i class="fa fa-exchange" aria-hidden="true"></i>
             </th>

             <th scope="col">
                	العمل الحالي
              <i class="fa fa-exchange" aria-hidden="true"></i>
             </th>

             <th scope="col">
                	المنطقة
               <i class="fa fa-exchange" aria-hidden="true"></i>
             </th>

             <th scope="col">
                	المدينة
              <i class="fa fa-exchange" aria-hidden="true"></i>
              </th>

              <th scope="col">
                	الصورة الشخصية
              <i class="fa fa-exchange" aria-hidden="true"></i>
              </th>

              <th scope="col">
                	الشهادات
                <i class="fa fa-exchange" aria-hidden="true"></i>
               </th>



            <th scope="col">
              إجراء حدث
            </th>
          </tr>
          </thead>
          <tbody>

        @foreach ( $project_manager as $item )
          <tr>
            <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
            <td>  {{ $item->name ?? '' }}  </td>
            <td>  {{ $item->birth_date ?? '' }}  </td>
            <td>  {{ $item->phone ?? '' }}  </td>
            <td>  {{ $item->email ?? '' }}  </td>
            <td>  {{ $item->qualifacation ?? '' }}  </td>
            <td>  {{ $item->specialization ?? '' }}  </td>
            <td>  {{ $item->current_work ?? '' }}  </td>
            <td>  {{ $item->city->name ?? '' }}  </td>
            <td>  {{ $item->state->name ?? '' }}  </td>

                 <td>
                     <img src="  {{ asset( $item->image ) }} "  alt="image" width="100px  " height="100px ;"  >
                </td>
                  <td>
                    <img src="  {{ asset( $item->cert ) }} "  alt="image" width="100px  " height="100px ;"  >
                  </td>

            <td class="edit-btn ">
                <a class="btn btn-success " href="{{ route('project_managers.edit', $item->id) }}">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                  تعديل
                </a>
            </td>
          </tr>
          @endforeach

          </tbody>
        </table>
            <div class="row" >
                <div class=" col-md-4" >
                   </div>
                <div class="col-md-4" >
                 {{ $project_manager->render("pagination::bootstrap-4") }}
                </div>
                <div class=" col-md-4" >
                </div>
             </div>
          </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
function showModal(){
    $("#exampleModal").modal('show');
}
    $(document).ready(function(){


      $("#qualifacation").change(function(){


       // alert("Asd" + $(this).val() )
            var value = $(this).val();

            if( value == "الثانوي"  )
            {
                $("#specialization").hide();

            }else{
                $("#specialization").show();
            }
       });
   });
   //////////////////////////////////////////////
   $('select[name="city_id"]').on('change',function () {
                console.log('changeed');
             //   alert(' changeed ');
                var City=$(this).val();
                if(City)
                {
                   // alert ("value in if "+City ) ;
                     console.log( City );
                    $.ajax({
                        url:'getCityStates/'+City,
                        type:'GET',
                        dataType:'json',
                        success:function (data) {
                        // alert('success') ;
                           console.log(data);
                            $('select[name="state_id"]').empty();
                            $.each(data,function (key,value) {
                                $('select[name="state_id"]')
                                    .append('<option value="'+key+'">'+value+'</option>')
                            });
                        }
                    });
                }
                else{
                    $('select[name="state_id"]').empty();
                }
            });
   ///////////////////////////////////////////////

   </script>

@endsection



