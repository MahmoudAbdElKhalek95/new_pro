<button style="width: 250px" class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة دورات </span></button>
<div class="_modal">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>إضافة الدورات</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>

        <form  method="post" enctype="multipart/form-data" action="{{ route('trainings.store') }}">
            @csrf
        <div class="form py-5  px-4">
            <div class="row mb-2 ">
                <div class="col-md-6">
                    <div class="input-field w-100">
                        <label>اسم الدورة  </label>
                        <input type="text" name="name" value="{{ old('name') }}"  placeholder="اسم الدورة ">
                    </div>
                    @error('name')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
               <div class="col-md-6">
                    <div class="input-field w-100">
                        <label>المنطقة</label>
                        <select required   name ="city_id">
                            <option disabled selected hidden >  المنطقة  </option>
                            @foreach ( $cities  as  $item )

                            <option value="{{ $item->id }}"> {{  $item->name  }} </option>

                           @endforeach
                          </select>

                    </div>
                    @error('city_id')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                        <div class="input-field w-100">
                            <label>من  </label>
                            <input type="date" name="from" value="{{ old('from') }}"  placeholder="من ">
                        </div>

                        @error('from')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror

               </div>
               <div class="col-md-6">
                    <div class="input-field w-100">
                        <label>إلى  </label>
                        <input type="date" name="to" value="{{ old('to') }}"  placeholder="إلى ">
                    </div>
                    @error('to')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>
            <div class="row mb-2 ">
                <div class="col-md-6">
                    <div class="input-field w-100">
                        <label>عدد الساعات </label>
                        <input type="number" name ="hour_number" value="{{ old('hour_number') }}" placeholder="عدد الساعات">
                    </div>

                    @error('hour_number')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>

               <div class="col-md-6">
                <div class="input-field w-100">
                    <label> التخصص </label>
                    <select type="number" name ="specialization" value="{{ old('specialization') }}" placeholder="عدد الساعات">
                <option value="men">
                    الرجال
                </option>
                <option value="trainer">
                    المدربين
                </option>
                <option value="company">
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

            </div>

            <div class="row">
                {{--  معاير الترشيج --}}
               <div class="col-md-6">

                   <!-- Form repeater section start -->
<div class=" contact-repeater"  id="select">
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

    <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
      <i class="ft-plus"></i>  add new +
    </button>
  </div>
 <!-- // Form repeater section end -->

               </div>

               {{--  condtion --}}

               <div class="col-md-6">

                <!-- Form repeater section start -->
<div class=" contact-repeater"  id="select">
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

 <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
   <i class="ft-plus"></i>  add new +
 </button>
</div>
<!-- // Form repeater section end -->

            </div>

               {{--  end condion  --}}

            </div>


            <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

        </div>
    </form>


    </div>
</div>


</div>
