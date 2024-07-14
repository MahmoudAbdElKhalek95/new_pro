<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف المدربين
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف انواع المدربين</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>

          <form  method="post" enctype="multipart/form-data" action="{{ route('createTrainer') }}">
            @csrf
        <div class="form py-5  px-4">

            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الإسم  </label>
                        <input type="text" name="name" value="{{ old('name') }}"  placeholder="الإسم ">
                    </div>
                    @error('name')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
               <div class=" w-100 ps-lg-3">
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

            <div class="d-lg-flex align-items-center ">
                <div class=" w-100 pe-lg-3">

                        <div class="input-field w-100">
                            <label>البــريد الإلكتروني  </label>
                            <input type="email" name="email" value="{{ old('email') }}"  placeholder="البــريد الإلكتروني ">
                        </div>

                        @error('email')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror

               </div>
               <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>الجـوال  </label>
                        <input type="text" name="phone" value="{{ old('phone') }}"  placeholder="الجـوال ">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>

            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الصورة الشخصية </label>
                        <input type="file" name ="image" value="{{ old('image') }}" placeholder="الصورة الشخصية">
                    </div>

                    @error('image')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>

               <div class="w-100 pe-lg-3">
                <div class="input-field w-100">
                    <label>شهادة إعتماد التدريب </label>
                    <input type="file" name ="cert_path" value="{{ old('cert_path') }}" placeholder="شهادة إعتماد التدريب">
                </div>

                @error('cert_path')
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




                 <div class="d-lg-flex align-items-center  mb-2 ">


                    <div class="w-100 pe-lg-3">
                      <div class="input-field w-100">
                          <label>تفعيل الحساب    </label>

                          <input class="" name="status" value="{{ old('status') }}" type="checkbox" value="" id="flexCheckDefault8">
                         </div>
                           @error('status')
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
