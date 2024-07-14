 <!-- Modal -->

 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف المتدربين</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('createStudent') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>
            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الإسم</div>
                  <input type="text" name="name" value="{{ old('name') }}" class="search form-control" placeholder="الإسم">
                </div>
                   @error('name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="selected-option">
                <div class="label">الحقيبة  </div>
                <select  class="form-select"  name ="course_id">
                    <option disabled selected hidden >  الحقيبة  </option>
                   @foreach ( $courses  as  $item )

                    <option value="{{ $item->id }}"  {{ $item->id == old('course_id') ? 'selected' : ''  }}> {{  $item->name  }} </option>

                   @endforeach

                  </select>
              </div>
               @error('course_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            {{-- <div class="col-md-12">
              <div class="input-text">
                <div class="label">البــريد الإلكتروني</div>
                <input type="email"  name="email" value="{{ old('email') }}" class="search form-control" placeholder="البــريد الإلكتروني">
              </div>
              @error('email')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div> --}}

            <div class="col-md-12">
              <div class="input-text">
                <div class="label">الجـوال</div>
                <input type="text" name="phone" value="{{ old('phone') }}" class="search form-control" placeholder="الجـوال">
              </div>
              @error('phone')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>


            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">السجل المدني</div>
                  <input type="text" name="national" value="{{ old('national') }}" class="search form-control" placeholder="السجل المدني">
                </div>
                @error('national')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> الفئة العمريه </div>
                  <select  class="form-select"  name ="age">
                    <option disabled selected hidden >ابحث ب الفئة العمريه من هنا</option>
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



            <hr>
            <span class="mb-3"  style="display: inline-block">تعيين كلمة المرور</span>
            <div class="col-md-12">
              <div class="input-text">
                <div class="label" >اكتب كلمة السر</div>
                <input type="password" name="password" class="search password form-control" placeholder="اكتب كلمة السر">
                <span class="input-group-text togglePassword" >
                 <i class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>
              </div>
              @error('password')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>
            <div class="col-md-12">
              <div class="input-text">
                <div class="label" >اعد كتابة كلمة السر</div>
                <input type="password" name="password_confirmation"  class="search password form-control" placeholder="اعد كتابة كلمة السر">
                <span class="input-group-text togglePassword" >
                  <i class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>
              </div>
              @error('password_confirmation')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>
            {{-- <div class="form-check mx-3">
              <input class="form-check-input" name="status" value="{{ old('status') }}"  type="checkbox" value="" id="flexCheckDefault8">
              <label class="form-check-label" for="flexCheckDefault8">
                تفعيل الحساب
              </label>
            </div> --}}
            <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
