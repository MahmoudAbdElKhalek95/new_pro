
<button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة المدربين </span></button>
<div class="_modal">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>إضافة المدربين</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>

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
