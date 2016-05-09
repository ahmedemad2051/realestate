@extends('layouts.app')

@section('header')
<style>
    .banner{
        background-image:"{!! url('uploads/'.getSetting('main_image')) !!}" !important;
        
    }
</style>

  {!! Html::style('cus/css/reset.css') !!}
  {!! Html::style('cus/css/style.css') !!}
  {!! Html::script('cus/js/modernizr.js') !!}

@stop

@section('content')
<div class="banner text-center" style=" ">
  <div class="container">
    <div class="banner-info">
      <h1>مرحبا بك فى {!! getSetting() !!}</h1>
      <p>
        {!! Form::open(['url'=>'search','method'=>'get']) !!}
        
      <div class='col-lg-3'>
        {!! Form::text('bu_price_from',null,['class'=>'form-control','placeholder'=>'سعر العقار من']) !!}
        </div>
      <div class='col-lg-3'>
        {!! Form::text('bu_price_to',null,['class'=>'form-control','placeholder'=>'سعر العقار الى']) !!}
           </div>
      <div class='col-lg-3'>
        {!! Form::select('bu_place',getPlace(),null,['class'=>'form-control select2','placeholder'=>'منطقة العقار']) !!}
           </div>
      <div class='col-lg-3'>
        {!! Form::select('bu_type',getTypes(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
           </div>
      <br><br>
      <div class='col-lg-3'>
        {!! Form::submit('بحث',['class'=>'btn','style'=>'width:100%']) !!}
           </div>
      <div class='col-lg-3'>
        {!! Form::select('bu_rooms',getRooms(),null,['class'=>'form-control select2','placeholder'=>'عدد الغرف']) !!}
           </div>
      <div class='col-lg-3'>
        {!! Form::select('bu_rent',['0'=>'تمليك','1'=>'ايجار'],null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
           </div>
      <div class='col-lg-3'>
        {!! Form::text('bu_square',null,['class'=>'form-control','placeholder'=>'المساحة']) !!}
           </div>
      
      
        {!! Form::close() !!}
      </p>
      <a class="banner_btn" href="{!! url('/showAllBuildings') !!}">المزيد</a> </div>
  </div>
</div>
<div class="main">


<ul class="cd-items cd-container">
    @foreach(App\Bu::where('bu_status',1)->get() as $bu)
    <li class="cd-item">
        <img src="{!! url('uploads/'.$bu->bu_image) !!}" alt="Item Preview">
            <a href="#0" data_id='{!! $bu->id !!}' class="cd-trigger">نبذة سريعة</a>
    </li> <!-- cd-item -->
    @endforeach
</ul> <!-- cd-items -->

    
<div class="cd-quick-view">
        <div class="cd-slider-wrapper">
                <ul class="cd-slider">
                    <li><img src="" alt="Product 1"></li>
                </ul> <!-- cd-slider -->
        </div> <!-- cd-slider-wrapper -->

        <div class="cd-item-info">
                <h2></h2>
                <p></p>

                <ul class="cd-item-action">
                        <li><a href="" class="add-to-cart"></a></li>					
                        <li><a href="" class="link">أقرأ المزيد</a></li>	
                </ul> <!-- cd-item-action -->
        </div> <!-- cd-item-info -->
        <a href="#0" class="cd-close">Close</a>
</div> <!-- cd-quick-view -->
    
</div>
@endsection

@section('footer')
{!! Html::script('cus/js/jquery-2.1.1.js') !!}
  {!! Html::script('cus/js/velocity.min.js') !!}
  <script>
      function getUrl()
      {
          return '{!! Request::root() !!}';
      }
  </script>
  {!! Html::script('cus/js/main.js') !!}
@stop
