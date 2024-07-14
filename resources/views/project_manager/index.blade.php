
@extends('dashboard.layouts.mainapp')
@section('title' , 'مدراء المشاريع')
@section('content')
   <section class="supervisors-accounts">
        <div class="container-fluid">
            <div class="d-md-flex align-items-center justify-content-between mb-4">
                <h3 class=""><img src="{{ asset('dashboard') }}/assets/images/header_icon1.png" class="me-2"> إدارة حسـابات مدراء المشاريع  </h3>
                   @include('trainer.CreateModel')
            </div>
            <div class="supervisors">
               <div class="filters d-lg-flex align-items-center border-bottom ">

               </div>
               <div class="supervisors-list">
                <div class="row">
                    @foreach ( $project_manager as $item )
                    <div class="col-md-6 col-lg-3 mb-4">
                        <div class="supervisor-box">
                            <div class="image">


                                <img src="  {{ asset( $item->image ) }} "   loading="lazy" style="width: 100%;" height="150px"  >

                                @if($item->user)
                                <a style="text-decoration: none " href="{{ route('trainer.activate' , $item->user->id ) }}" >
                                <div class="status">

                                    {{ $item->user->status_name() ?? '' }}

                                </div>
                             </a>
                             @endif
                            </div>
                            <div class="supervisor-info">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="d-flex align-items-center pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/users.png" class="pe-1">
                                        <div>
                                            <span class="head">الإسم</span>
                                            <span class="supervisor-data">{{ $item->name ?? ' ' }}</span>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img src="{{ asset('dashboard') }}/assets/images/mobile.png" class="pe-1">
                                        <div>
                                            <span class="head">رقم الجوال</span>
                                            <span class="supervisor-data"> {{ $item->phone  ?? ''}} </span>

                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center pe-3">
                                        <img src="{{ asset('dashboard') }}/assets/images/Icon simple-email.png" class="pe-1">
                                        <div>
                                            <span class="head">الإيميل</span>
                                            <span class="supervisor-data" style="width: 65px;word-break: break-all;"> {{ $item->email  ?? ''}}  </span>

                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center ">
                                        <img src="{{ asset('dashboard') }}/assets/images/calendar.png" class="pe-1">
                                        <div>
                                            <span class="head">تاريخ الانضمام</span>
                                            <span class="supervisor-data">{{ $item->created_at->format('Y-m-d') ?? '' }}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="actions d-flex align-items-center justify-content-evenly py-4">

                                <div class="d-flex align-items-center">
                                    @if( auth()->user()->role_id == 1  || auth()->user()->role_id == 2 )

                                    <a class="btn btn-success " href="{{ route('project_managers.edit', $item->id) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        تعديل
                                      </a>

                                   @endif
                                </div>
                                <div class="d-flex align-items-center">


                                  </div>

                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>
               </div>

               <div class="row" >
                    <div class="md-6"></div>
                    <div class="col-md-6">
                    {{ $project_manager->appends( request()->all() )->render("pagination::bootstrap-4") }}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
    function showModal(){
        $("#exampleModal").modal('show');
    }
        $(document).ready(function(){


          $("#qualifacation").change(function(){


           // alert("Asd" + $(this).val() )
                var value = $(this).val();

                if( value == "الثانوي"  )
                {
                    $("#specialization").hide();

                }else{
                    $("#specialization").show();
                }
           });
       });
       //////////////////////////////////////////////
       $('select[name="city_id"]').on('change',function () {
                    console.log('changeed');
                 //   alert(' changeed ');
                    var City=$(this).val();
                    if(City)
                    {
                       // alert ("value in if "+City ) ;
                         console.log( City );
                        $.ajax({
                            url:'getCityStates/'+City,
                            type:'GET',
                            dataType:'json',
                            success:function (data) {
                            // alert('success') ;
                               console.log(data);
                                $('select[name="state_id"]').empty();
                                $.each(data,function (key,value) {
                                    $('select[name="state_id"]')
                                        .append('<option value="'+key+'">'+value+'</option>')
                                });
                            }
                        });
                    }
                    else{
                        $('select[name="state_id"]').empty();
                    }
                });
       ///////////////////////////////////////////////

       </script>

    @endsection








