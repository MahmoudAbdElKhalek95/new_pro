<section class="cards-number" >
    <div class="row">
        {{-- <div class="col-md-4 col-sm-6">
            <div class="card">
                <span class="title">الجهات</span>
                <div class="chart-value">
                    <div class="value">
                        <h4>{{ $company ?? 0 }}</h4>


                    </div>
                    <div class="number-chart">
                        <canvas id="myChart4" style="width: 80%"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-4 col-sm-6">
            <div class="card">
                <span class="title">المشـرفين</span>
                <div class="chart-value">
                    <div class="value">
                        <h4>{{ $manager ?? 0 }}</h4>


                    </div>
                    <div class="number-chart">
                        <canvas id="myChart6" style="width: 80%"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}



    </div>


      <div class="row">

        {{-- <div class="col-md-4 col-sm-6">
            <div class="card">
                <span class="title">المدربين</span>
                <div class="chart-value">
                    <div class="value">
                        <h4>{{ $trainer ?? 0 }}</h4>


                    </div>
                    <div class="number-chart">
                        <canvas id="myChart5" style="width: 80%"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-md-4 col-sm-6">
            <div class="card">
                <span class="title">المتدربين</span>
                <div class="chart-value">
                    <div class="value">
                        <h4>{{ $student_count ?? 0 }}</h4>
                        {{-- <small style="color: #FA5087">
                            -12.01%
                            <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                        </small> --}}
                    </div>
                    <div class="number-chart">
                        <canvas id="myChart8" style="width: 80%"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6">
            <div class="card">
                <span class="title">الحقائب</span>
                <div class="chart-value">
                    <div class="value">
                        <h4>{{ $course_count ?? 0 }}</h4>

                    </div>
                    <div class="number-chart">
                        <canvas id="myChart4" style="width: 80%"></canvas>
                    </div>
                </div>
            </div>
        </div>




    </div>
</section>
