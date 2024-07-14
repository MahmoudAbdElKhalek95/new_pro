<a class="btn btn-success "   data-bs-toggle="modal" data-bs-target="#editexampleModal" >
    <i class="fa fa-pencil" aria-hidden="true"></i>
    أضف شواهد التنفيذ
  </a>


     <!-- Modal -->
   <div style="margin-top:75px; wudth:550px: overflow-y:scroll;"   class="modal fade " id="editexampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="header-modal" style="display: flex;justify-content: space-between;align-items: center">
            <h5 class="modal-title" id="exampleModalLabel">أضف انواع شواهد التنفيذ</h5>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">اغلاق</button>
          </div>
          <hr>

          <form  method="post" enctype="multipart/form-data" action="{{ route('reports.store') }}">
            @csrf

            <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الاسم</div>
                  <input type="text"  name="title" value="{{ old('title') }}" class="search form-control" placeholder="الاسم">
                </div>
                @error('title')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>


              <div class="col-md-12">
                <div class="input-text">
                  <div class="label">الاسم</div>
                  <textarea type="text"  name="text"  class="search form-control" placeholder="الوصف">{{ old('text') }}</textarea>
                </div>
                @error('text')
                <div class="alert alert-danger" >
                 {{ $message }}
                </div>
                @enderror
              </div>

            <div class="col-md-12">
              <div class="input-text">
                <div class="label">التقارير</div>
                <input type="file"  name="report" value="{{ old('report') }}" class="search form-control" placeholder="التقارير">
              </div>
              @error('name')
              <div class="alert alert-danger" >
               {{ $message }}
              </div>
              @enderror
            </div>
                <button  style="margin-bottom: 50px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>

            </div>
        </form>



        </div>
      </div>
    </div>
