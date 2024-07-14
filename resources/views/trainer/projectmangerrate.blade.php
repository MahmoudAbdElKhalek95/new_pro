 <!-- Modal -->
 <div class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">   تقيم المدربين</h5>
          <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>
        <form  method="post" enctype="multipart/form-data" action="{{ route('trainer_project_manager_rate',$item->id) }}">
         @csrf
         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

            <input type="hidden" name="trainer_id" value="{{ $id }}">


                   <div class="col-md-12">
                        <div class="selected-option">
                          <div class="label"> التقيم </div>
                          <select  class="form-select"  name ="rate">

                            <option value="1">
                                1
                                {{-- <i style="color:yellow;font-size:20px;" class="fa fa-star fa-3x"></i>* --}}

                                </option>
                            <option value="2">
                                2
                                 {{-- <i class="fa fa-star fa-3x">**</i>
                                 <i class="fa fa-star fa-3x">*</i> --}}
                            </option>
                            <option value="3">
                                3
                                {{-- <i class="fa fa-star fa-3x">*</i>
                                <i class="fa fa-star fa-3x">*</i>
                                <i class="fa fa-star fa-3x">*</i> --}}
                           </option>
                           <option value="4">
                            4
                            {{-- <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i> --}}
                           </option>
                           <option value="5">
                            5
                            {{-- <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i>
                            <i class="fa fa-star fa-3x">*</i>  --}}
                           </option>
                          </select>
                        </div>
                        @error('rate')
                        <div class="alert alert-danger" >
                         {{ $message }}
                        </div>
                        @enderror
                      </div>

            <div class="col-md-12">
              <div class="input-text">
                <div class="label">الاسم</div>
                <input type="text"  name="text"  class="search form-control" placeholder=" text ">
              </div>
              @error('text')
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


