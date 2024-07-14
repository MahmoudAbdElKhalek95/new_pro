

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
            <div class="filters d-lg-flex align-items-center border-bottom ">
            {{-- <div class="search-box w-100 pe-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>ابحث في حسـابات المشرفين  </label>
                        <img src="{{ asset('dashboard/assets/images/Icon feather-search.png')}}" style="padding-left: 5px;">
                        <input type="text" placeholder="ابحث بالاسم او اي شي أخر">
                        <button class="search-btn">بحث</button>
                    </div>
                </form>
               </div> --}}
               <div class="filter-selector w-100 ps-lg-3">
                <form>
                    <div class="input-field w-100">
                        <label>الفئة العمريه</label>
                        <select required   name ="age">
                            <option disabled selected hidden >  الفئة العمريه  </option>
                            <option value="الإبتدائي">الإبتدائي</option>
                            <option value="المتوسط">المتوسط</option>
                            <option value="الثانوي">الثانوي</option>
                            <option value="الجامعي">الجامعي</option>
                            <option value="أخرى">أخرى</option>
                          </select>
                          <button class=" btn btn-success search-btn">بحث</button>
                    </div>
                </form>
               </div>
           </div> 

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
                  {{-- <th scope="col">
                    سعر نسخة المدرب
                </th>
                <th scope="col">
                    سعر نسخة المتدرب
                </th> --}}
                <th scope="col">
                    المجال
                </th>
                <th scope="col">
                    المستوي
                </th>
                <th scope="col">
                    التاريخ
                </th>

                <th scope="col">
                   حدث
                </th>
              </tr>
              </thead>
              <tbody>

            @foreach ( $courses as $item )
              <tr>
                <td>  <input class="form-check-input" type="checkbox" value=""  id="flexCheckDefault1"></td>
                <td>  {{ $item->name ?? '' }}  </td>
                <td>  {{ $item->age ?? '' }}  </td>
                {{-- <td>  {{ $item->desc  ?? ''}}  </td> --}}
                <td>   {!!   $item->desc   !!}  </td>

                
                <td>
                    @if(  !empty( $item->image_path) )
                    <a href="{{ asset($item->image_path) }}"  download >
                    <img src="{{  asset($item->image_path)  }}" alt="image" width="50px" height="50px">
                    </a>

                    @else
                    <img src="{{  asset('files/uploads/course/default.png')  }}" alt="image" width="50px" height="50px">

                    @endif
                 </td>

                 {{-- <td>  {{ $item->trainer_price ?? '' }}  </td>
                 <td>  {{ $item->student_price ?? '' }}  </td> --}}
                 <td>  {{ $item->field  ?? ''}}  </td>
                 <td>  {{ $item->level  ?? ''}}  </td>

                <td>
                    {{ $item->created_at->format('Y-m-d') ?? '' }}
                </td>
               
                <td class="edit-btn ">

                    @if(  auth()->user()->role_id == 5 )

                    <a class="btn btn-info" href="{{ route('course_subscribe', $item->id) }}">
                        اشتراك
                    </a>

                    @endif

                    @if(  auth()->user()->role_id == 1 )

                    <a class="btn btn-success " href="{{ route('editCourse', $item->id) }}">
                        تعديل

                    </a>

                    <a class="btn btn-danger " onclick="return confirm('Are you sure you want to delete this item?');" href="{{ route('deleteCourse', $item->id) }}">
                        حذف

                    </a>

                    {{-- <a class="btn btn-info "  title = " متابعه المشاريع " target="_blank" href="{{ route('projects.follow', $item->id) }}">

                        متابعه المشاريع
                      </a> --}}
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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection



