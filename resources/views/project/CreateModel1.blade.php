 <!-- Modal -->
 <div class="_modal">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>أضف المشاريع</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>

        <form  method="post" enctype="multipart/form-data" action="{{ route('createProject') }}">
            @csrf
        <div class="form py-5  px-4">
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>اسم المشروع  </label>
                        <input type="text" name="name" value="{{ old('name') }}"  placeholder="اسم المشروع ">
                    </div>
                    @error('name')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>رقم المشروع  </label>
                          <input type="text" name="number" value="{{ old('number') }}"  placeholder="رقم المشروع">
                    </div>
                    @error('number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-lg-flex align-items-center ">
                <div class=" w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الدعم المشروع  </label>
                        <input type="text" name="support_company" value="{{ old('support_company') }}"  placeholder="الدعم المشروع ">
                    </div>
                    @error('support_company')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>مدير المشروع</label>
                        <input type="text" name="project_manager" value="{{ old('project_manager') }}"  placeholder="مدير المشروع">
                    </div>
                    @error('project_manager')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>تاريخ البدايه </label>
                        <input type="date" name ="start_date" value="{{ old('start_date') }}" placeholder="تاريخ البدايه">
                    </div>

                    @error('start_date')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>تاريخ النهاية </label>
                        <input type="date" name ="end_date" value="{{ old('end_date') }}" placeholder="تاريخ النهاية">
                    </div>

                    @error('end_date')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> الموقع </label>
                        <input type="text" name ="location" value="{{ old('location') }}" placeholder=" الموقع">
                    </div>

                    @error('location')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> عدد المدربين </label>
                        <input type="text" name ="trainer_number" value="{{ old('trainer_number') }}" placeholder="تاريخ عدد المدربين">
                    </div>

                    @error('trainer_number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> عدد المتدربين </label>
                        <input type="text" name ="student_number" value="{{ old('student_number') }}" placeholder=" عدد المتدربين">
                    </div>
                    @error('student_number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> عدد الحقائب  </label>
                        <input type="text" name ="course_number" value="{{ old('course_number') }}" placeholder=" عدد الحقائب ">
                    </div>
                    @error('course_number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> عدد الجهات المنفذة </label>
                        <input type="text" name ="company_number" value="{{ old('company_number') }}" placeholder=" عدد الجهات المنفذة">
                    </div>
                    @error('company_number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                       <label>  الحهات </label>
                        <select  name ="env_company_ids[]" multiple  >
                            <option disabled  hidden >ابحث ب الحهات   </option>
                            @foreach (  $company  as $item )
                            <option value="{{ $item->id }}"   >  {{  $item->name  }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('age')
                    <div class="alert alert-danger" >
                    {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> الفئة العمريه </label>
                        <select  name ="age[]" multiple>
                            <option disabled  hidden >ابحث ب الفئة العمريه من هنا</option>
                            <option value="الإبتدائي">الإبتدائي</option>
                            <option value="المتوسط">المتوسط</option>
                            <option value="الثانوي">الثانوي</option>
                            <option value="الجامعي">الجامعي</option>
                            <option value="أخرى">أخرى</option>
                        </select>
                        </div>
                        @error('age')
                        <div class="alert alert-danger" >
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @error('company_number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="w-100 pe-lg-3">

                </div>
            </div>

            <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

        </div>
    </form>


    </div>
</div>




 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف المشاريع</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('createProject') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>
            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">إسم المشروع</div>
                  <input type="text" name="name" value="{{ old('name') }}" class="search form-control" placeholder="إسم المشروع">
                </div>
                   @error('name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">رقم المشروع</div>
                  <input type="text" name="number" value="{{ old('number') }}" class="search form-control" placeholder="رقم المشروع">
                </div>
                   @error('number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الدعم المشروع</div>
                  <input type="text" name="support_company" value="{{ old('support_company') }}" class="search form-control" placeholder="الدعم ">
                </div>
                   @error('support_company')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">مدير المشروع</div>
                  <input type="text" name="project_manager" value="{{ old('project_manager') }}" class="search form-control" placeholder="مدير المشروع ">
                </div>
                   @error('project_manager')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">تاريخ البدايه</div>
                  <input type="date" name="start_date" value="{{ old('start_date') }}" class="search form-control" placeholder="مدير المشروع ">
                </div>
                   @error('start_date')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror

                </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">تاريخ النهايه</div>
                  <input type="date" name="end_date" value="{{ old('end_date') }}" class="search form-control" placeholder="مدير المشروع ">
                </div>
                   @error('end_date')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الموقع</div>
                  <input type="text" name="location" value="{{ old('location') }}" class="search form-control" placeholder="الموقع ">
                </div>
                   @error('location')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              {{-- <div class="col-md-12">
                <div class="input-text">
                  <div class="label">عدد البيئات</div>
                  <input type="text" name="env_number" value="{{ old('env_number') }}" class="search form-control" placeholder="عدد البيئات ">
                </div>
                   @error('env_number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div> --}}

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label"> عدد المدربين</div>
                  <input type="text" name="trainer_number" value="{{ old('trainer_number') }}" class="search form-control" placeholder="عدد المدربين ">
                </div>
                   @error('trainer_number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">عدد المتدربين</div>
                  <input type="text" name="student_number" value="{{ old('student_number') }}" class="search form-control" placeholder="عدد المتدربين ">
                </div>
                   @error('student_number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">عدد الحقائب</div>
                  <input type="text" name="course_number" value="{{ old('course_number') }}" class="search form-control" placeholder="عدد الحقائب ">
                </div>
                   @error('course_number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">عدد الجهات المنفذة</div>
                  <input type="text" name="company_number" value="{{ old('company_number') }}" class="search form-control" placeholder="عدد الجهات المنفذة ">
                </div>
                   @error('company_number')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>



              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label">  الحهات </div>
                  <select  class="form-select"  name ="env_company_ids[]" multiple  >
                    <option disabled  hidden >ابحث ب الحهات   </option>
                   @foreach (  $company  as $item )
                    <option value="{{ $item->id }}"   >  {{  $item->name  }}</option>
                    @endforeach
                  </select>
                </div>
                @error('age')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> الفئة العمريه </div>
                  <select  class="form-select"  name ="age[]" multiple>
                    <option disabled  hidden >ابحث ب الفئة العمريه من هنا</option>
                    <option value="الإبتدائي">الإبتدائي</option>
                    <option value="المتوسط">المتوسط</option>
                    <option value="الثانوي">الثانوي</option>
                    <option value="الجامعي">الجامعي</option>
                    <option value="أخرى">أخرى</option>

                  </select>
                </div>
                @error('age')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


            <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
