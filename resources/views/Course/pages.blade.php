 <!-- Modal -->
 <div class="modal fade " style="margin-top: 125px"  id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 style="margin-right: 25px" class="modal-title" id="exampleModalLabel">   اجراء عمليات</h5>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
        </div>
        <hr>

         <div class="modal-body">
          <div class="row">

              {{--  --}}

              {{-- @if( auth()->user()->role_id == 3  )
              <a class="btn btn-success "   style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"  href="{{ route('editdCourseToCompany', $item->id) }}">
                اضافة مدرب
               </a>
               @endif --}}



              {{-- <a class="btn btn-primary "  style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"  title="طلب حقيبة"  href="{{ route('addCourseOrder', $item->id) }}">
                طلب حقيبة
              </a> --}}

              <br>
              <hr>
              <br>

              <a class="btn btn-warning" style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"   title="الحقائب التدريبية" href="{{ route('editdCourseToCompany', $item->id) }}">
                     الحقائب التدريبية
              </a>
              {{--  --}}
              <br>
              <hr>
              <br>









          </div>
        </div>

      </div>
    </div>
  </div>


