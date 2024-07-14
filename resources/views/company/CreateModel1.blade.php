
<button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة الجهات التنفيذية </span></button>
<div class="_modal">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>إضافة الجهات التنفيذية</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>

        <form  method="post" enctype="multipart/form-data" action="{{ route('createCompany') }}">
            @csrf
        <div class="form py-5  px-4">
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>اسم الجهة  </label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}"  placeholder="اسم الجهة ">
                    </div>
                    @error('company_name')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
               <div class=" w-100 ps-lg-3">
                <div class="input-field w-100">
                    <label>الجهة المشرفة  </label>
                    <input type="text" name="regulator" value="{{ old('regulator') }}"  placeholder="الجهة المشرفة ">
                </div>
                @error('regulator')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
               </div>
            </div>
            <div class="d-lg-flex align-items-center ">


                <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>المدير التنفيذي</label>

                      <input type="text" name="name" value="{{ old('name') }}"  placeholder="المدير التنفيذي ">

                    </div>
                    @error('age')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>


               <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>رقم التصريح  </label>

                        <input type="text" name="clearance_no"  value="{{ old('clearance_no') }}" class="" placeholder="رقم التصريح ">
                      </div>
                      @error('clearance_no')
                      <div class="alert alert-danger" >
                       {{ $message }}
                      </div>
                      @enderror
               </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
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

               <div class=" w-100 ps-lg-3">

                <div class="input-field w-100">
                    <label>البــريد الإلكتروني  </label>

                    <input type="email" name="email" value="{{ old('email') }}" class="" placeholder="البــريد الإلكتروني">
                   </div>
                     @error('email')
                     <div class="alert alert-danger" >
                      {{ $message }}
                     </div>
                     @enderror
               </div>

            </div>

            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الجـوال    </label>

                        <input type="text" name="phone" value="{{ old('phone') }}" class="" placeholder="الجـوال  ">
                       </div>
                         @error('phone')
                         <div class="alert alert-danger" >
                          {{ $message }}
                         </div>
                         @enderror

                  </div>

                  <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>تفعيل الحساب    </label>

                        <input class="form-check-input" name="status" value="{{ old('status') }}" type="checkbox" value="" id="flexCheckDefault8">
                       </div>
                         @error('status')
                         <div class="alert alert-danger" >
                          {{ $message }}
                         </div>
                         @enderror

                  </div>


            </div>

                  <div class="d-lg-flex align-items-center  mb-2 ">
                    <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>اكتب كلمة السر </label>
                            <input type="password" name="password"  placeholder="اكتب كلمة السر">
                        </div>
                        @error('password')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                   </div>
                   <div class="w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>اعد كتابة كلمة السر </label>
                        <input type="password"  name="password_confirmation" placeholder="اعد كتابة كلمة السر ">
                    </div>
                    @error('password_confirmation')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
                 </div>


            </div>

            <button type="submit" class="custom-btn">
                اضافة
            </button>
        </div>
    </form>


    </div>
</div>
