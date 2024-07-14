 <!-- Modal -->
 <div  style="margin-top: 150px" class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">   الصلاحية</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>

        <form  method="post" enctype="multipart/form-data" action="{{ route('users.update',$item->id) }}">
            @csrf
            <div class="modal-body">
             <div class="row">
               {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}

               <div class="col-md-12">
                   <div class="selected-option">
                   <div class="label">الصلاحية   </div>
                   <select  class="form-select"  name ="role_id" id="role_id" >
                       <option disabled  hidden >  الصلاحية   </option>

                       @foreach ( $roles  as  $item )

                       <option value="{{ $item->id ?? '' }}"  >  {{ $item->name }}    </option>

                       @endforeach
                     </select>
                 </div>
                  @error('role_id')
                  <div class="alert alert-danger" >
                  {{ $message }}
                 </div>
                 @enderror
               </div>
                <br>
                <hr>
                <br>

               <button  type="submit" class="btn btn-success form-control"> حفظ  </button>
             </div>
           </div>
           </form>

      </div>
    </div>
  </div>


