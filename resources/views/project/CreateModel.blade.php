<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف المشاريع
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف انواع المشاريع</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>


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
                        <label>الداعم المشروع  </label>
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
            </div>
                {{--  <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label> عدد المدربين </label>
                        <input type="text" name ="trainer_number" value="{{ old('trainer_number') }}" placeholder=" عدد المدربين">
                    </div>

                    @error('trainer_number')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>

            </div>  --}}
            {{--  <div class="d-lg-flex align-items-center  mb-2 ">
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
                </div>  --}}
                {{--  <div class="w-100 pe-lg-3">
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
            </div>  --}}
            {{--  <div class="d-lg-flex align-items-center  mb-2 ">
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
                </div>  --}}
                {{--  <div class="w-100 pe-lg-3">
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
            </div>  --}}
            
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
    </div>
