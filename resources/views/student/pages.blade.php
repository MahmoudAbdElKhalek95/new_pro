 <!-- Modal -->
 <div style="margin-top: 200px;" class="modal fade " id="editexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
          <h5 class="modal-title" id="exampleModalLabel">   اجراء عمليات</h5>
            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
        </div>
        <hr>

         <div class="modal-body">
          <div class="row">

              {{--  --}}

              @if(  auth()->user()->role_id == 4  )
              <a class="btn btn-info " style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"   href="{{ route('student_rate', $item->id) }}">
                  ملتزم بالبرنامج
             </a>
             @endif

               <a class="btn btn-success " style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"  href="{{ route('company_student_courses', $item->user_id) }}">
                  الحقائب
              </a>


              <br>
              <hr>
              <br>


              {{--  --}}










          </div>
        </div>

      </div>
    </div>
  </div>


