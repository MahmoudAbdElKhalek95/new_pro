 <!-- Modal -->
 <div class="modal fade " id="TrainerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">سجل كمـــدرب جديد</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('createTrainer') }}">
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
                <div class="input-text">
                  <div class="label">رقم الهوية    </div>
                  <input type="text" name="national_id" value="{{ old('national_id') }}" class="search form-control" placeholder="رقم الهوية    ">
                </div>
                @error('national_id')
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
                <div class="label">الجنسية   </div>
                <select  class="form-select"  name ="nationality" style="color: black ;">
                    <option disabled selected hidden  style="color: black ;" >  الجنسية   </option>
                   @foreach ( $country  as  $item  )

                    <option  style="color: black ;" value="{{ $item->id }}" {{  old('nationality') == $item->id  ? 'selected' : '' }} > {{  $item->arabic  }} </option>

                   @endforeach

                  </select>
              </div>
               @error('nationality')
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
                <div class="selected-option">
                <div class="label">المنطقه  </div>
                <select  class="form-select"  name ="city_id" style="color: black ;">
                    <option disabled selected hidden >  المنطقه  </option>
                   @foreach ( $cities  as  $item )

                    <option style="color: black ;" value="{{ $item->id }}" {{  old('city_id') == $item->id ? 'selected' : '' }} > {{  $item->name  }} </option>

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
                <select  class="form-select"  name ="state_id" style="color: black ;">
                    <option disabled selected hidden >  المدينة   </option>
                   @foreach ( $states  as  $item  )

                    <option style="color: black ;" value="{{ $item->id }}" {{  old('state_id') == $item->id  ? 'selected' : '' }} > {{  $item->name  }} </option>

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
                  <div class="label">المؤهل الدراسي </div>
                  <input type="text" name="qualifacation" value="{{ old('qualifacation') }}" class="search form-control" placeholder="المؤهل الدراسي ">
                </div>
                @error('qualifacation')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">التخصص  </div>
                  <input type="text" name="specialization" value="{{ old('specialization') }}" class="search form-control" placeholder="التخصص  ">
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



            {{-- <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الصورة الشخصية</div>
                  <input type="file" name="image"  class="search form-control" placeholder="الصورة الشخصية">
                </div>
                @error('image')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div> --}}

              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">شهادة إعتماد التدريب</div>
                  <input type="file" name="cert_path"  class="search form-control" placeholder="الصورة الشخصية">
                </div>
                @error('cert_path')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

                {{--  new add  --}}







                  {{-- <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">الجنسية   </div>
                      <input type="text" name="nationality" value="{{ old('nationality') }}" class="search form-control" placeholder="الجنسية   ">
                    </div>
                    @error('nationality')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                  </div> --}}






                {{--  --}}


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
            <div class="form-check mx-3">
              <input class="form-check-input" name="remote_work"  type="checkbox" value="" id="flexCheckDefault8">
              <label class="form-check-label" for="flexCheckDefault8">
                أوافق على العمل خارج المنطقة
              </label>
            </div>
            <div class="form-check mx-3">
                <input class="form-check-input" name="policy"   type="checkbox" value="" id="flexCheckDefault8">
                <label class="form-check-label" for="flexCheckDefault8">
                  أوافق على
                  <a href="{{ route('terms') }}" target="_blank">الشروط والأحكام</a>
                </label>
              </div>
            <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
