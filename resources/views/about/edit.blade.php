
@extends('dashboard.layouts.mainapp')
@section('title', 'من نحن')
@section('content')



     <!-- Start page content -->
<section class="supervisors-accounts">
     <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('about.update' , $Shiping->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">من نحن</span>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	من نحن</div>
                      <input type="text" name="price" value="{{ $about->price }}" class="search form-control " placeholder="	من نحن">
                    </div>
                       @error('price')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>

    
                 

                 

                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
          </form>
      </div>
    </section>



@endsection



