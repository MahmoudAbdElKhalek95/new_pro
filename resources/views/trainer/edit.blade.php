
@extends('dashboard.layouts.mainapp')
@section('content')
<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">


        <h5 class="mb-4 mt-2">
            <i class="fa fa-university" aria-hidden="true"></i>
            إدارة  حسـابات المدربين
          </h5>
    </div>


        <form  method="post"  action="{{ route('updateTrainer' , $users->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">

                <div class="row">
                    <span class="mb-3" style="display: inline-block">معومات عامة</span>
                    <div class="col-md-12">
                        <div class="input-text">
                          <div class="label">الإسم</div>
                          <input type="text" name="name" value="{{ $users->name ?? ''  }}" class="search form-control" placeholder="الإسم">
                        </div>
                           @error('name')
                           <div class="alert alert-danger" >
                            {{ $message }}
                           </div>
                           @enderror
                      </div>
                    {{-- <div class="col-md-12">
                        <div class="selected-option">
                          <div class="label"> النوع </div>
                          <select  class="form-select"  name ="role_id">
                            <option disabled selected hidden >ابحث ب النوع من هنا</option>
                            <option value="1">مشرف رئيسي</option>
                            <option value="2">مشرف فرعي</option>
                          </select>
                        </div>
                        @error('role_id')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div> --}}
                      <div class="col-md-12">
                        <div class="selected-option">
                        <div class="label">المنطقه  </div>
                        <select  class="form-select"  name ="city_id" style="color:black;">
                            <option disabled  hidden >  المنطقه  </option>
                           @foreach ( $cities  as  $item )

                            <option  style="color:black;"  value="{{ $item->id }}" {{ $item->id == $users->trainer->city ? 'selected' : '' }}  > {{  $item->name }} </option>

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
                      <div class="input-text">
                        <div class="label">البــريد الإلكتروني</div>
                        <input type="email"  name="email" value=" {{ $users->email ?? ''  }}" class="search form-control" placeholder="البــريد الإلكتروني">
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
                        <input type="text" name="phone" value=" {{ $users->phone?? ''  }}  " class="search form-control" placeholder="الجـوال">
                      </div>
                      @error('phone')
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

                        {{-- <img src="{{  asset( $users->image)  }}"  alt="image" width="100px" height="100px"> --}}
                        @error('image')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror


                      </div>

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
                        {{-- <img src="{{  asset( $users->cert_path)  }}"  alt="image" width="100px" height="100px"> --}}

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
                    <div class="form-check mx-3">
                      <input class="form-check-input" name="status"  {{ $users->isActive == 1 ? 'checked' : ''  }} type="checkbox"  id="flexCheckDefault8">
                      <label class="form-check-label" for="flexCheckDefault8">
                        تفعيل الحساب
                      </label>
                    </div>
                    <br>
                    <button  type="submit" class="btn  btn-success"> حفظ  </button>
                  </div>


          </form>




  </div>
</div>

@endsection



