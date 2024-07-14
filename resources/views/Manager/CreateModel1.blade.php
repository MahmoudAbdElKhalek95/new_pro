  <button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard') }}/assets/images/pluse.png"><span>اضافة مشرف </span></button>
    <div class="_modal">
        <div class="_modal-content">
            <div class="_modal-header d-flex align-items-center justify-content-between">
                <h1>إضافة المشرفين</h1>
                <span class="close-button"><img src="{{ asset('dashboard') }}/assets/images/close.png"></span>

            </div>

            <form  method="post" enctype="multipart/form-data" action="{{ route('createManager') }}">
                @csrf
            <div class="form py-5  px-4">
                <div class="d-lg-flex align-items-center  mb-2 ">
                    <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>الإسم </label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="الإسم">
                        </div>
                        @error('name')
                            <div class="alert alert-danger" >
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class=" w-100 ps-lg-3">
                        <div class="input-field w-100">
                            <label>النوع</label>
                            <select    name ="role_id">
                                <option disabled selected hidden >ابحث ب النوع من هنا</option>
                                <option value="1">المشرف العام</option>
                                <option value="2">مدير المشروع</option>
                            </select>
                        </div>
                        @error('role_id')
                       <div class="alert alert-danger" >
                       {{ $message }}
                       </div>
                       @enderror
                    </div>
                </div>
                <div class="d-lg-flex align-items-center ">
                    <div class=" w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>المنطقة</label>
                             <select    name ="city_id">
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
                    <div class=" w-100 ps-lg-3">
                        <div class="input-field w-100">
                            <label>المدينة  </label>
                           <select    name ="state_id">
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
                </div>
                <div class="d-lg-flex align-items-center ">
                     <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>البريد الالكترونى </label>
                            <input type="email"  name="email" value="{{ old('email') }}"  placeholder="البــريد الإلكتروني">
                        </div>
                    </div>
                      <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>الجوال </label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="الجـوال">
                        </div>
                        @error('phone')
                           <div class="alert alert-danger" >
                           {{ $message }}
                           </div>
                        @enderror
                    </div>
                </div>

                <div class="d-lg-flex align-items-center ">
                    <div class=" w-100 ps-lg-3">
                        <div class="input-field w-100">
                            <label>المؤهل</label>
                            <select required name ="qualification" id ="qualifacation">
                                <option disabled selected hidden >ابحث ب الموهل من هنا</option>
                                <option value="الإبتدائي">الإبتدائي</option>
                                <option value="المتوسط">المتوسط</option>
                                <option value="الثانوي">الثانوي</option>
                                <option value="الجامعي">الجامعي</option>
                                <option value="ماجستير">ماجستير</option>
                                <option value="دكتوراه">دكتوراه</option>
                                <option value="أخرى">أخرى</option>
                            </select>
                        </div>
                        @error('qualification')
                           <div class="alert alert-danger" >
                           {{ $message }}
                       </div>
                       @enderror
                    </div>
                    <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>التخصص </label>
                            <input type="text" name="specialization"  value="{{ old('specialization') }}" placeholder="التخصص  ">
                        </div>
                        @error('specialization')
                           <div class="alert alert-danger" >
                           {{ $message }}
                           </div>
                        @enderror
                    </div>
                </div>
                <div class="d-lg-flex align-items-center ">
                    <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label>الصورة </label>
                              <input type="file" name="image" >
                            </div>
                            @error('image')
                               <div class="alert alert-danger" >
                               {{ $message }}
                               </div>
                            @enderror
                    </div>
                </div>
                <div class="d-lg-flex align-items-center ">
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
                        <input type="password" name="password_confirmation"  placeholder="اعد كتابة كلمة السر">
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger" >
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                </div>
                <button  type="submit" class="custom-btn">اضافة
                </button>
            </div>
        </form>
        </div>
    </div>
