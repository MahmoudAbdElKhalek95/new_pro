<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف الروية والفلفسة الخاصة بنا
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف  الروية والفلفسة الخاصة بنا</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>

          <form enctype="multipart/form-data"   method="post" enctype="multipart/form-data" action="{{ route('vision.store') }}">
            @csrf
        <div class="form py-5  px-4">
            <div class="row">
            <div class="d-lg-flex align-items-center  mb-2 ">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الاسم  </label>
                        <input type="text" name="name" value="{{ old('name') }}"  placeholder="الاسم ">
                    </div>
                    @error('name')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>الوصف  </label>
                          <textarea type="text" rows="10" cols="100" name="description"  placeholder="الوصف">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="d-lg-flex align-items-center ">
                <div class=" w-100 pe-lg-3">
                    <div class="input-field w-100">
                        <label>صوره  </label>
                        <input type="file" name="image"  alt="صوره  ">
                    </div>
                    @error('image')
                    <div class="alert alert-danger" >
                        {{ $message }}
                    </div>
                    @enderror
            </div>
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
