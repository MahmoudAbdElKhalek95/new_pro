


<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <span>اضافة الحقائب التدريبية </span>
  </button>
<!-- Modal -->
 <div class="modal fade " style="margin-top: 75" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="header-modal " style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف الحقائب التدريبية</h5>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>

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
                    <textarea type="text" class="ckeditor" name="desc" value="{{ old('desc') }}"  placeholder="الوصف " rows="5" cols="60" ></textarea>
                </div>
                @error('desc')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
               </div>
            </div>
            <div class="d-lg-flex align-items-center ">


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

            </div>

            {{--  --}}

            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>كمية المدرب  </label>

                        <input type="number" name="trainer_quantity" value="{{ old('trainer_quantity') }}"  required  class="" placeholder="كمية المدرب">
                       </div>
                         @error('trainer_quantity')
                         <div class="alert alert-danger" >
                          {{ $message }}
                         </div>
                         @enderror

                  </div>

               <div class=" w-100 ps-lg-3">

                <div class="input-field w-100">
                    <label>كمية المتدرب  </label>

                    <input type="number" name="student_quantity" value="{{ old('student_quantity') }}"  required class="" placeholder="كمية المتدرب">
                   </div>
                     @error('student_quantity')
                     <div class="alert alert-danger" >
                      {{ $message }}
                     </div>
                     @enderror
               </div>

            </div>


            {{--  --}}


            {{--  element start --}}
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
            {{-- element-end  --}}
             {{--  element start --}}
             <div class="d-lg-flex align-items-center  mb-2 ">
              <div class="w-100 pe-lg-3">
                  <div class="input-field w-100">
                      <label> الانشطه   </label>

                      <input type="text" name="activities" value="{{ old('activities') }}" class="" required  placeholder=" الانشطه ">
                     </div>
                       @error('activities')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                </div>

             <div class=" w-100 ps-lg-3">

              <div class="input-field w-100">
                  <label> الساعات  </label>

                  <input type="text" name="hours" value="{{ old('hours') }}" class="" required  placeholder=" الساعات">
                 </div>
                   @error('hours')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
             </div>

          </div>
          {{-- element-end  --}}

            {{--  element start --}}
            <div class="d-lg-flex align-items-center  mb-2 ">
              <div class="w-100 pe-lg-3">
                  <div class="input-field w-100">
                      <label> الوجدات   </label>

                      <input type="text" name="units" value="{{ old('units') }}" class="" required  placeholder=" الوجدات ">
                     </div>
                       @error('units')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                </div>

             <div class=" w-100 ps-lg-3">

              <div class="input-field w-100">
                  <label> فكرة البرنامج  </label>

                  <input type="text" name="ideas" value="{{ old('ideas') }}" class="" required placeholder=" فكرة البرنامج">
                 </div>
                   @error('ideas')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
             </div>

          </div>
          {{-- element-end  --}}

          
            {{--  element start --}}
            <div class="d-lg-flex align-items-center  mb-2 ">
              <div class="w-100 pe-lg-3">
                  <div class="input-field w-100">
                      <label> اهداف البرنامج   </label>

                      <input type="text" name="goals" value="{{ old('goals') }}" class="" required  placeholder=" اهداف البرنامج ">
                     </div>
                       @error('goals')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                </div>

             <div class=" w-100 ps-lg-3">

              <div class="input-field w-100">
                  <label> الكفابات  </label>

                  <input type="text" name="kfayat" value="{{ old('kfayat') }}" class="" required  placeholder=" الكفابات">
                 </div>
                   @error('kfayat')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
             </div>

          </div>
          {{-- element-end  --}}

            <button  type="submit" class="btn btn-success form-control"> حفظ  </button>
        </div>
    </form>

      </div>
    </div>
  </div>

