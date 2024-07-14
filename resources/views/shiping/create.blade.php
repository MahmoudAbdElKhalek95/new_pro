<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف سعر الشحن
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف  سعر الشحن</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>

          <form  method="post" enctype="multipart/form-data" action="{{ route('shiping.store') }}">
            @csrf
        <div class="form py-5  px-4">


            <div class="row mb-2 ">
                <div class="col-md-10">
                    <div class="input-field w-100">
                        <label>
                            عدد النسخ من
                         </label>
                        <input type="text" name="quantity_from" value="{{ old('quantity_from') }}"  placeholder=" عدد النسخ من   ">
                    </div>
                    @error('quantity_from')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>

            <div class="row mb-2 ">
                <div class="col-md-10">
                    <div class="input-field w-100">
                        <label>
                            عدد النسخ الي
                         </label>
                        <input type="text" name="quantity_to" value="{{ old('quantity_to') }}"  placeholder=" عدد النسخ الي   ">
                    </div>
                    @error('quantity_to')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>


            <div class="row mb-2 ">
                <div class="col-md-10">
                    <div class="input-field w-100">
                        <label>
                            سعر الشحن
                         </label>
                        <input type="text" name="price" value="{{ old('price') }}"  placeholder=" سعر الشحن  ">
                    </div>
                    @error('price')
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
