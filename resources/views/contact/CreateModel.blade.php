<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف 
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف  </h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>

          <form enctype="multipart/form-data"   method="post" enctype="multipart/form-data" action="{{ route('contact.store') }}">
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
            </div>

            <div class="row">
                <div class="d-lg-flex align-items-center  mb-2 ">
                    <div class="w-100 pe-lg-3">
                        <div class="input-field w-100">
                            <label> العنوان   </label>
                            <input type="text" name="title" value="{{ old('title') }}"  placeholder=" العنوان  ">
                        </div>
                        @error('title')
                        <div class="alert alert-danger" >
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>

               
                 

                <div class="row">
                    <div class="d-lg-flex align-items-center  mb-2 ">
                        <div class="w-100 pe-lg-3">
                            <div class="input-field w-100">
                                <label> البريد الالكتروني    </label>
                                <input type="text" name="email" value="{{ old('email') }}"  placeholder=" البريد الالكتروني   ">
                            </div>
                            @error('email')
                            <div class="alert alert-danger" >
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
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
     
            
               

            <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

        </div>
    </form>





        </div>
      </div>
    </div>
