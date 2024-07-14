<button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة الحقائب التدريبية </span></button>
<div class="_modal">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>إضافة الحقائب التدريبية</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>

        <form  method="post" enctype="multipart/form-data" action="{{ route('createCourse') }}">
            @csrf
        <div class="form py-5  px-4">
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>إسم الحقيبة  </label>
                        <input type="text" name="name" value="{{ old('name') }}"  placeholder="إسم الحقيبة ">
                    </div>
                    @error('name')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
               <div class=" w-100 ps-lg-3">
                <div class="input-field w-100">
                    <label>الوصف  </label>
                    <input type="text" name="desc" value="{{ old('desc') }}"  placeholder="الوصف ">
                </div>
                @error('desc')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
               </div>
            </div>
            <div class="d-lg-flex align-items-center ">


                <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>الفئة العمريه</label>
                        <select required   name ="age">
                            <option disabled selected hidden >  الفئة العمريه  </option>
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


               <div class=" w-100 ps-lg-3">
                    <div class="input-field w-100">
                        <label>غلاف الحقيبة  </label>

                        <input type="file" name="image"  class="" placeholder="غلاف الحقيبة ">
                      </div>
                      @error('image')
                      <div class="alert alert-danger" >
                       {{ $message }}
                      </div>
                      @enderror
               </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>سعر نسخة المدرب  </label>

                        <input type="number" name="trainer_price" value="{{ old('trainer_price') }}" class="" placeholder="سعر نسخة المدرب">
                       </div>
                         @error('trainer_price')
                         <div class="alert alert-danger" >
                          {{ $message }}
                         </div>
                         @enderror

                  </div>

               <div class=" w-100 ps-lg-3">

                <div class="input-field w-100">
                    <label>سعر نسخة المتدرب  </label>

                    <input type="number" name="student_price" value="{{ old('student_price') }}" class="" placeholder="سعر نسخة المتدرب">
                   </div>
                     @error('student_price')
                     <div class="alert alert-danger" >
                      {{ $message }}
                     </div>
                     @enderror
               </div>

            </div>

            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>مجال الحقيبة   </label>

                        <input type="text" name="field" value="{{ old('field') }}" class="" placeholder="مجال الحقيبة ">
                       </div>
                         @error('field')
                         <div class="alert alert-danger" >
                          {{ $message }}
                         </div>
                         @enderror

                  </div>

               <div class=" w-100 ps-lg-3">

                <div class="input-field w-100">
                    <label>عدد الساعات  </label>

                    <input type="number" name="hour_number" value="{{ old('hour_number') }}" class="" placeholder="عدد الساعات">
                   </div>
                     @error('hour_number')
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
