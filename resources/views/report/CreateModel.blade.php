 <!-- Modal -->
 <div class="modal fade " id="exampleModal"   tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">أضف التقارير</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('question_types.store') }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            <span class="mb-3" style="display: inline-block">معومات عامة</span>

            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">	نوع الاستبانة</div>
                  <input type="text" name="name" value="{{ old('name') }}" class="search form-control" placeholder="	نوع الاستبانة">
                </div>
                   @error('name')
                   <div class="alert alert-danger" >
                    {{ $message }}
                   </div>
                   @enderror
              </div>

              <div class="col-md-12">
                    <div class="selected-option">
                      <div class="label"> عرض  الاستبانة     </div>
                      <select  name="type"  class="form-select"  id ="type">
                        <option  value="null"  >   اختر </option>
                        <option   value="company" >    جهة  </option>
                        <option value="trainer" >    مدرب </option>
                        <option value="student" >    متدرب </option>
                        <option value="manager" >    مشرف </option>

                      </select>
                    </div>
                    @error('type')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror

                  </div>



            <button  type="submit" class="btn save-btn form-control"> حفظ  </button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
