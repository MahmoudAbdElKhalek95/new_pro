

@extends('dashboard.layouts.mainapp')
@section('title' , 'التقارير ')

@section('content')

<style>
body {
    font-family: 'Cairo';font-size: 22px;
}
</style>

<div class="home-page implementingAgencies">
<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        بياناتي
      </h5>
      <div class="view-type-modal">



      </div>



      </div>


     </div>

    <section class="table-requests">


      <div class="table-responsive-xl" >
        <div class="container">

        <div class="row">

            <div class="col-md-4" >


              <div class="card">
                <div class="card-header"></div>
                <div class="card-body" style="text-align: center;">

                         عدد الساعات

                </div>
                <div class="card-footer" style="text-align: center;">

                    {{  $trainer->trainer_contract()->sum('hour_number') ?? 0   }}

                </div>
              </div>
            </div>

            <div class="col-md-4">


                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body" style="text-align: center;">

                            عدد   المتدربين

                    </div>
                    <div class="card-footer" style="text-align: center;">
                        {{  $trainer->student_count() ?? 0  }}

                    </div>
                  </div>
              </div>

              <div class="col-md-4">
                <div class="card">
                    <div class="card-header">   </div>
                    <div class="card-body" style="text-align: center;">

                        الجهات


                    </div>
                    <div class="card-footer" style="text-align: center;">
                        @if(  is_null(  $trainer->trainer_companies()) == false   )
                        @foreach (  $trainer->trainer_companies() as $tr )
                        {{  $tr->name ?? 0  }} <br>

                        @endforeach
                        @endif

                    </div>
                  </div>
              </div>



        </div>








      </div>
    </div>


    </section>

  </div>
</div>

@endsection



