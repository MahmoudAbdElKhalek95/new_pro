
        <button class="custom-btn" onclick="showModal()" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة مدراء المشاريع </span></button>
<!-- Modal -->
 <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="header-modal " style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف مدراء المشاريع</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('project_managers.store') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>

            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	الاسم</div>
                  <input type="text" name="name" value="{{ old('name') }}" class="search form-control" placeholder="	الاسم">
                </div>
                   @error('name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                <div class="selected-option">
                <div class="label">المنطقة   </div>
                <select  class="form-select"  name ="city_id">
                    <option disabled  hidden >  المنطقة   </option>
                   @foreach ( $cities  as  $item )

                    <option value="{{ $item->id }}" {{  old('city_id') == $item->id  ? 'selected' : '' }} > {{  $item->name  }} </option>

                   @endforeach

                  </select>
              </div>
               @error('city_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>

            <div class="col-md-12">
                <div class="selected-option">
                <div class="label">المدينة   </div>
                <select  class="form-select"  name ="state_id">
                    <option disabled  hidden >  المدينة   </option>
                   @foreach ( $states  as  $item  )

                    <option value="{{ $item->id }}" {{  old('state_id') == $item->id  ? 'selected' : '' }} > {{  $item->name  }} </option>

                   @endforeach

                  </select>
              </div>
               @error('state_id')
               <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>


            <div class="col-md-12">
              <div class="input-text">
                <div class="label">البــريد الإلكتروني</div>
                <input type="email"  name="email" value="{{ old('email') }}" class="search form-control" placeholder="البــريد الإلكتروني">
              </div>
              @error('email')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>
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
                  <div class="label">تاريخ الميلاد</div>
                  <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="search form-control" placeholder="تاريخ الميلاد">
                </div>
                @error('birth_date')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="selected-option">
                  <div class="label"> الموهل الدراسي * </div>
                  <select  class="form-select"  name ="qualifacation" id ="qualifacation">
                    <option disabled selected hidden >ابحث ب الموهل من هنا</option>
                    <option value="الإبتدائي" {{  old('qualifacation') == "الإبتدائي" ? 'selected' : '' }} >الإبتدائي</option>
                    <option value="المتوسط" {{  old('qualifacation') == "المتوسط" ? 'selected' : '' }} >المتوسط</option>
                    <option value="الثانوي" {{  old('qualifacation') == "الثانوي" ? 'selected' : '' }} >الثانوي</option>
                    <option value="الجامعي" {{  old('qualifacation') == "الجامعي" ? 'selected' : '' }} >الجامعي</option>
                    <option value="ماجستير" {{  old('qualifacation') == "ماجستير" ? 'selected' : '' }} >ماجستير</option>
                    <option value="دكتوراه" {{  old('qualifacation') == "دكتوراه"  ? 'selected' : '' }} >دكتوراه</option>
                    <option value="أخرى">أخرى</option>
                  </select>
                </div>
                @error('qualifacation')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text" id = "specialization">
                  <div class="label">التخصص  </div>
                  <input type="text" name="specialization"  value="{{ old('specialization') }}" class="search form-control" placeholder="التخصص  ">
                </div>
                @error('specialization')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">العمل الحالي  </div>
                  <input type="text" name="current_work" value="{{ old('current_work') }}" class="search form-control" placeholder="العمل الحالي  ">
                </div>
                @error('current_work')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الصورة الشخصية</div>
                  <input type="file" name="image"  class="search form-control" placeholder="الصورة الشخصية">
                </div>
                @error('image')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">شهادة  </div>
                  <input type="file" name="cert"  class="search form-control" placeholder="الصورة الشخصية">
                </div>
                @error('cert')
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


            <button  type="submit" class="btn btn-success form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
