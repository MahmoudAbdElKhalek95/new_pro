
@extends('dashboard.layouts.mainapp')
@section('title', 'الاخبار')
@section('content')

     <!-- Start page content -->
<section class="supervisors-accounts">
     <div class="container-fluid">
        <form  method="post"  enctype="multipart/form-data"  action="{{ route('news.update' , $news->id) }}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <span class="mb-3" style="display: inline-block">الاخبار</span>


                <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الاسم</div>
                      <input type="text" name="title" value="{{ $news->title }}" class="search form-control " placeholder="	الاسم">
                    </div>
                       @error('title')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                  </div>


                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الوصف </div>
                      <textarea   name="description"  class="search form-control" placeholder="	الوصف ">{{  $news->description }}</textarea>
                    </div>
                       @error('description')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror
                  </div>


            <div class="row mb-2 ">
                <div class="col-md-12">
               <label>نص الخبر </label>
                 <textarea  class="ckeditor form-control" name ="text" placeholder="نص الخبر">{!! $news->text  !!}</textarea>
                    @error('text')
                    <div class="alert alert-danger" >
                     {{ $message }}
                    </div>
                    @enderror
               </div>
            </div>

                  <div class="col-md-12">
                    <div class="input-text">
                      <div class="label">	الصورة</div>
                      <input type="file" name="image" value="{{ $news->image }}" class="search form-control " placeholder="	الصورة">
                    </div>
                       @error('image')
                       <div class="alert alert-danger" >
                        {{ $message }}
                       </div>
                       @enderror

                       <img src="{{ $news->image }}" width="200px" height="200px">

                  </div>




                <button  style="margin-top: 25px;" type="submit" class="btn btn-success save-btn form-control"> حفظ  </button>
              </div>
          </form>
      </div>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>


@endsection



