<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف انواع الاستبيانات
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف انواع الاستبيانات</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>



          <form  method="post" enctype="multipart/form-data" action="{{ route('question_types.store') }}">
            @csrf
           <div class="form py-5  px-4">
               <div class="d-lg-flex align-items-center  mb-2 ">
                   <div class="w-100 pe-lg-3">
                       <div class="input-field w-100">
                           <label>نوع الاستبيان </label>
                           <input type="text" name="name" value="{{ old('name') }}"  placeholder="نوع الاستبيان">
                       </div>
                       @error('name')
                       <div class="alert alert-danger" >
                           {{ $message }}
                       </div>
                       @enderror
                   </div>
                   <div class="w-100 pe-lg-3">
                       <div class="input-field w-100">
                          <label>  الحهات </label>
                            <select  name="type"  id ="type">
                           <option  disabled  hidden >   اختر </option>
                           <option   value="company" >    جهة  </option>
                           <option value="trainer" >    مدرب </option>
                           <option value="student" >    متدرب </option>
                           <option value="manager" >    مدير مشروع </option>

                         </select>
                       </div>
                       @error('type')
                       <div class="alert alert-danger" >
                       {{ $message }}
                       </div>
                       @enderror
                   </div>
               </div>
               <div class="d-lg-flex align-items-center  mb-2 ">
               <button type="submit" class="custom-btn">
                   اضافة
               </button>
                </div>
           </div>
       </form>




        </div>
      </div>
    </div>
