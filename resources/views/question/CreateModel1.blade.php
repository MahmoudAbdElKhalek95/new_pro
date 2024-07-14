 <!-- Modal -->
        <button class="custom-btn trigger" ><img class="pe-2" src="{{ asset('dashboard/assets/images/pluse.png')}}"><span>اضافة الاستبيانات </span></button>

 <!-- Modal -->
 <div class="_modal"  style="  height:600px;
 overflow-y: scroll; ">
    <div class="_modal-content">
        <div class="_modal-header d-flex align-items-center justify-content-between">
            <h1>أضف  الاستبيانات</h1>
            <span class="close-button"><img src="{{ asset('dashboard/assets/images/close.png')}}"></span>

        </div>
        <form  method="post" enctype="multipart/form-data" action="{{ route('questions.store') }}">
         @csrf
         <div class="form py-5  px-4">
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                  <label class="label"> نوع الاستبانة </label>
                  <select   name ="question_type_id">
                    <option disabled  hidden >ابحث ب نوع الاستبانة من هنا</option>
                    @foreach ( $types as  $item )

                    <option value="{{ $item->id }}" {{  $item->id == old('question_type_id')  }} >
                     {{  $item->name }}  -  {{ $item->type_name()  }}
                     </option>
                    @endforeach

                  </select>
                </div>
                @error('question_type_id')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
                    </div>
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                  <label class="label">   نوع السوال    </label>
                  <select  name="type"   id ="type">
                    <option    >   اختر </option>
                    <option   value="select" >   اختيار من متعدد  </option>
                    <option value="text" >   مقالي </option>

                  </select>
                </div>
                @error('exist')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror

               </div>
            </div>
            <div class="d-lg-flex align-items-center  mb-2 ">
                  <div class="label">	السؤال </div>
                  <input type="text" name="question" value="{{ old('question') }}" class="search form-control" placeholder=" السؤال ">
                </div>
                   @error('question')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>


              {{-- <div class="col-md-12" id="text" style="display: none;">
                <div class="input-text">
                  <div class="label">	الإجابه</div>
                  <input type="text" name="text_answer" value="{{ old('text_answer') }}" class="search form-control" placeholder=" الإجابه ">
                </div>
                   @error('text_answer')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div> --}}

                <!-- Form repeater section start -->

                <div class="form-group col-12 mb-2 contact-repeater"  id="select"  style="display: none;">
                    <div data-repeater-list="repeater-group">
                      <div class="input-group mb-1" data-repeater-item>
                        <div class="label">	الإجابات  </div>
                        <input type="tel" placeholder="الإجابات"  name="answers"  class="form-control" id="example-tel-input">
                        <span class="input-group-append" id="button-addon2">
                          <button class="btn btn-danger" type="button" data-repeater-delete><i class="la la-trash"></i>x </button>
                        </span>
                      </div>
                    </div>

                    @error('question')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                    <button type="button" data-repeater-create class="btn btn-primary" style="margin-right: 75px !important;;">
                      <i class="ft-plus"></i>  add new +
                    </button>
                  </div>
                 <!-- // Form repeater section end -->


                 <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
