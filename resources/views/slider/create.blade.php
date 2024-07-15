<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف السليدر 
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف  السليدر </h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>

          <form  method="post" enctype="multipart/form-data" action="{{ route('sliders.store') }}">
            @csrf
        <div class="form py-5  px-4">
            <div class="row mb-2 ">
                <div class="col-md-6">
                    <div class="input-field w-100">
                        <label>
                            الاسم
                         </label>
                        <input type="text" name="title" value="{{ old('title') }}"  placeholder=" الاسم  ">
                    </div>
                    @error('title')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>


            <div class="row mb-2 ">
                <div class="col-md-6">

                        <label>الوصف </label>
                        <textarea  class="form-control" name ="description" placeholder="الوصف">{{ old('description') }}</textarea>


                    @error('description')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>

            <div class="row mb-2 ">
                <div class="col-md-6">
                    <div class="input-field w-100">
                        <label>الصورة </label>
                        <input  type="file" name ="image" placeholder="الصورة">
                    </div>

                    @error('image')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>






            <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

        </div>
    </form>

        </div>
      </div>
      </div>
    </div>
