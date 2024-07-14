

@extends('dashboard.layouts.mainapp')
@section('title', ' من نحن')
@section('styles')
@endsection
@section('content')

   <section class="trainers_course">

            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard/assets/images/header_icon1.png') }}" class="me-2">من نحن</h3>


                {{-- @if( auth()->user()->role_id==1)
                @include('about.create')
                @endif --}}
            </div>

            <div class="row">
                <div class="col-md-10 offset-1 mt-4">
                    <div class="card-body">
                        <form method="post" action="{{ route('about.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <textarea class="ckeditor form-control" name="text"> {!! $about->text  !!}  </textarea>
                            </div>

                            <div class="col-md-4 offset-4 mt-4">
                                <div class="form-group">
                                <input class="btn btn-success" type="submit" value="save">
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

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



