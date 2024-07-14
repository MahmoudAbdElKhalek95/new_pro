 <!-- Modal -->
 <div class="modal fade " id="pagesexampleModal_{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



          @if( auth()->user()->role_id == 2 || auth()->user()->role_id == 1 )
          <a class="btn btn-info "  title = " متابعه المشاريع " style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"  href="{{ route('trainer.ProjectsFollow', $item->id) }}">
              {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}
              متابعه المشاريع
            </a>
            @endif

            <br>
            <hr>
            <br>


            @if( auth()->user()->role_id == 2 || auth()->user()->role_id == 1 )

          <a class="btn btn-primary "  style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"    href="{{ route('trainerCompleteCourses', $item->id ?? 0) }}">
              {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}
              الحقائب المنفذه
            </a>

            <br>
            <hr>
            <br>


            <a class="btn btn-warning"  style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"    href="{{ route('trainerCompleteCompanies', $item->id ?? 0) }}">
              {{-- <i class="fa fa-pencil" aria-hidden="true"></i> --}}
              الجهات المنفذة
            </a>

            <br>
            <hr>
            <br>

            <a class="btn btn-success "  style=" width: 250px ; text-align: center;margin: auto;"  target="_blank"  href="{{ route('editTrainer', $item->user_id) }}">
              تعديل
            </a>
            @endif

            <br>
            <hr>
            <br>



              {{--  --}}







          </div>
        </div>

      </div>
    </div>
  </div>


