

@extends('dashboard.layouts.mainapp')
@section('title', 'استعراض العقد')

@section('content')

<div class="home-page implementingAgencies">

<div class="container">
    <div class="header-title-page">
      <h5 class="mb-4 mt-2">
        <i class="fa fa-university" aria-hidden="true"></i>
        استعراض العقد
      </h5>
      <div class="view-type-modal">
        {{-- <div class="view-type">
          <i class="fa fa-list"></i>
          <i class="fa fa-th-large" aria-hidden="true"></i>
        </div> --}}
        <!-- Button trigger modal -->


      </div>

     </div>

    <section class="table-requests"  style="
                border: 5px solid black;
                border-radius: 75px; " >



      <div class="table-responsive-xl">


        <p style="margin-top: 75px;">  إنه بعون الله وتوفيقه تم الاتفاق وتوقيع عقد تدريب، بين كل من:  </p>
        <p>  1-	{{ $contracts->company->user->name ?? '' }} الجهة المنفذة، ويشار إليه فيما يلي بـ (الطرف الأول)  </p>

        <p>   2-	المدرّب/    {{ $contracts->trainer->user->name ?? '' }}، ويشار إليه فيما يلي بـ (الطرف الثاني).       </p>

        <h4>   وقد اتفق الطرفان على ما يلي: </h4>

        <p>    1.	يقوم الطرف الثاني بالتدريب بعدد ساعات (  {{ $contracts->hour_number }}  ) على الحقيبة التالية:       </p>
        <p>   -	{{ $contracts->course->name ?? '' }}      </p>
        <p>     2.	يلتزم الطرف الثاني بالضوابط والمعايير والمنهجية والخطة الزمنية التي يحددها الطرف الأول وهي مدة {{ $contracts->duration }} أسابيع.      </p>
        <p>    3.	يلتزم الطرف الثاني بتطبيق وحدات الحقائب التدريبية خلال المدة الزمنية المتفق عليها.       </p>
        <p>    4.	يلتزم الطرف الثاني بعدم تسريب محتوى الحقائب، ويقتصر استخدامها داخل البرنامج التدريبي فقط.       </p>
        <p>     5.	يلتزم الطرف الأول بتهيئة المقر وتجهيز متطلبات التدريب.      </p>
        <p>     6.	يدفع الطرف الأول للطرف الثاني مبلغ ( {{ $contracts->price }} ) لا يقل عنه مقابل التدريب على كل ساعة تدريبية بعد الانتهاء من المدة الزمنية المحددة للتدريب.      </p>
        <p>   7.	حقوق الملكية الفكرية للحقائب التدريبية تتبع بشكل كامل الجهة المشرفة على البرنامج (شركة آرام المستقبل).        </p>



         <div class="col-md-6 text-center "  style="width: 500px ; margin:auto;">
           <div class="row text-center">

              <div class="col-md-4" style="color: green">  أوافق        </div>
             <div class="col-md-4"  style="color: red">    لا أوافق  </div>

          </div>

        </div>

      </div>



    </section>

  </div>
</div>

@endsection



