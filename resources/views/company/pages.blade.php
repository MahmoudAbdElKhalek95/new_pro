 <!-- Modal -->
 <div  style="margin-top: 150px" class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">   اجراء عمليات</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>

         <div class="modal-body">
          <div class="row">
            {{-- <span class="mb-3" style="display: inline-block">معومات عامة</span> --}}


            {{-- <a class="btn btn-primary " style=" width: 250px ; text-align: center;margin: auto;"
             target="_blank"   href="{{ route('companyComplteCourse', $item->id ?? 0) }}">

                الحقائب المنفذه
              </a>
              <br>
              <hr>
              <br>
              <a class="btn btn-warning "   style=" width: 250px ; text-align: center;margin: auto;"    target="_blank"   href="{{ route('companyTrainers', $item->id ?? 0) }}">

                المدربين التابعين
              </a>

              <br>
              <hr>
              <br> --}}

              <a class="btn btn-success "  style=" width: 250px ; text-align: center;margin: auto;"   href="{{ route('editCompany', $item->id ) }}">
                تعديل
              </a>

              <br>
              <hr>
              <br>


            {{-- @if( auth()->user()->role_id == 2 || auth()->user()->role_id == 1 )
            <a class="btn btn-info"    style=" width: 250px ; text-align: center;margin: auto;"   target="_blank"   href="{{ route('companyProjectFollow', $item->id ?? 0) }}">

                متابعه المشاريع
              </a>
              @endif --}}






          </div>
        </div>

      </div>
    </div>
  </div>


