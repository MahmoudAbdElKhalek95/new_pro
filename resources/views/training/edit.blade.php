
@extends('dashboard.layouts.mainapp')
@section('title', 'الخدمات')
@section('content')



     <!-- Start page content -->
<section class="supervisors-accounts">
     <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('trainings.update' , $training->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">الخدمات</span>




               <div class="col-md-8">
                <div class="input-field w-100">
                    <label>انواع الخدمات</label>
                    <select required   name ="training_type_id">
                        <option disabled selected hidden >  انواع الخدمات  </option>
                        @foreach ( $training_types  as  $item )
                        <option value="{{ $item->id }}" {{   $training->training_type_id == $item->id ? 'selected' : '' }}> {{  $item->name  }} </option>
                       @endforeach
                      </select>
                </div>
                @error('training_type_id')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
               </div>

               <div class="col-md-8">
                <div class="input-field w-100">
                    <label>صورة</label>
                   <input type="file" name="image" placeholder="صورة">

                </div>
                @error('image')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
           </div>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	اسم الدورة </div>
                      <input type="text" name="name" value="{{ $training->name }}" class="search form-control " placeholder="	اسم الدورة ">
                    </div>
                       @error('name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>


                  {{-- <div class="col-md-12">
                    <div class="selected-option">
                    <div class="label">المنطقه  </div>
                    <select  class="form-select"  name ="city_id">
                        <option disabled  hidden >  المنطقه  </option>
                       @foreach ( $cities  as  $item )

                        <option value="{{ $item->id }}" {{   $training->city_id == $item->id ? 'selected' : ''   }}> {{  $item->name  }} </option>

                       @endforeach

                      </select>
                  </div>
                   @error('city_id')
                   <div class="alert alert-danger" >
                   {{ $message }}
                  </div>
                  @enderror
                </div> --}}

                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	من </div>
                      <input type="date" name="from" value="{{$training->from}}" class="search form-control" placeholder="	مت ">
                    </div>
                       @error('from')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div> --}}

                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	إلى </div>
                      <input type="date" name="to" value="{{$training->to}}" class="search form-control" placeholder="	الي ">
                    </div>
                       @error('to')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div> --}}


                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الجهة المنفذة </div>
                      <input type="text" name="company_name" value="{{  $training->company_name  }}" class="search form-control" placeholder="	الجهة المنفذة ">
                    </div>
                       @error('company_name')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div> --}}



                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	عدد الساعات </div>
                      <input type="number" name="hour_number" value="{{  $training->hour_number }}" class="search form-control" placeholder="	عدد الساعات ">
                    </div>
                       @error('hour_number')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div> --}}

                  {{-- <div class="col-md-12">
                  <div class="input-field w-100">
                    <label> التخصص </label>
                    <select type="number" name ="specialization" value="{{ old('specialization') }}" placeholder="عدد الساعات">
                <option value="men" {{  $training->specialization == "men" ? 'selected' : ''  }}>
                    المتدربات
                </option>
                <option value="trainer"  {{  $training->specialization == "trainer" ? 'selected' : ''  }}>
                    المدربين
                </option>
                <option value="company" {{  $training->specialization == "company" ? 'selected' : ''  }}>
                    الجهات
                </option>

                    </select>
                    </div>

                @error('specialization')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
           </div>
        </div> --}}



                  @if(  auth()->user()->role_id == 1 )
                  <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label"> 	الحالة  </div>
                      <select  class="form-select"  name ="status">
                        <option disabled  hidden > 	الحالة </option>
                        <option value="pending">قيد المراجعة  </option>
                        <option value="accepted">مقبولة   </option>
                        <option value="rejected">مرفوضة   </option>

                      </select>
                    </div>
                    @error('role_id')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div>

                  @endif



                  <hr>

                  <div class="row">

                    <div class="form-group">
                        <textarea class="ckeditor form-control" name="text_editor"> {!! $training->text_editor  !!}  </textarea>
                    </div>

                </div>


                  <div class="row">
                    {{--  معاير الترشيج --}}
                   <div class="col-md-6">

                       <!-- Form repeater section start -->
    {{-- <div class=" contact-repeater"  id="select">
        <div data-repeater-list="can">
          <div class="input-group mb-1" data-repeater-item>
            <div class="label">	معاير الترشيج  </div>
            <input type="tel" placeholder="معاير الترشيج"  name="candidate"  class="form-control" id="example-tel-input">
            <span class="input-group-append" id="button-addon2">
              <button class="btn btn-danger" type="button" data-repeater-delete><i class="la la-trash"></i>x </button>
            </span>
          </div>
        </div>

        @error('candidate')
        <div class="alert alert-danger" >
         {{ $message }}
        </div>
        @enderror

        <br>
        <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
          <i class="ft-plus"></i>  add new +
        </button>
        <br>
      </div> --}}
     <!-- // Form repeater section end -->

                   </div>

                   {{--  condtion --}}

                   <div class="col-md-6">

                    <!-- Form repeater section start -->
    {{-- <div class=" contact-repeater"  id="select">
     <div data-repeater-list="con">
       <div class="input-group mb-1" data-repeater-item>
         <div class="label">	شروط الدورة  </div>
         <input type="tel" placeholder="شروط الدورة"  name="condthion"  class="form-control" id="example-tel-input">
         <span class="input-group-append" id="button-addon2">
           <button class="btn btn-danger" type="button" data-repeater-delete><i class="la la-trash"></i>x </button>
         </span>
       </div>
     </div>

     @error('question')
     <div class="alert alert-danger" >
      {{ $message }}
     </div>
     @enderror

     <br>

     <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
       <i class="ft-plus"></i>  add new +
     </button>
     <br>
    </div> --}}
    <!-- // Form repeater section end -->

                </div>

                   {{--  end condion  --}}

                </div>

                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
          </form>
      </div>
    </section>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>



@endsection



