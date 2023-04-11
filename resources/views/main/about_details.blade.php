@extends('layouts.user-layout')
@section('content')
<main>
    <header class="masthead" style="background-image: url({{ asset('storage/image/about/about2.jpg') }}); height:70vh;">
        <div class="container img-solution">
            <div class="masthead-heading text-uppercase">لماذا تختارنا</div>
            <div class="masthead-subheading"></div>

            {{-- {{route('about',app()->getLocale())}} --}}
            <a class="btn btn-primary btn-xl text-uppercase" href="#sec">@lang('messages.tellMeMore')</a>
        </div>
    </header>
    <div class="card w-100" id="sec">
        <div class="card-body">
          <h5 class="card-text fw-bold">لماذا تختارنا</h5>
          <p class="card-text">
            شـــركة سكنر ماركت إحدى الشــــركات الرائــدة في مجال اجهزة السكنر وحلول الارشفة وتطوير البرمجيات وتطبيقات الويب والمواقع الإلكترونية.

            ننتج حلول تقنية لقطاعات أعمال مختلفة تتميز بواجهة مهنية مرنة وسهلة الاستخدام
            نقدم أيضًا لعملائنا تصميمات فريدة وأنيقة للمواقع الإلكترونية
            نوفر لهم خدمات استضافة عالية الكفاءة، مما يمكنهم من التميز في فضاء الإنترنت
                        .</p>
        </div>
      </div>
</main>
@endsection
