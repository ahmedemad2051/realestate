@extends('layouts.app')
@section('title')
العقارات
|
{!! $bu->bu_name !!}
@stop

@section('header')
{!! Html::style('site/css/bu.css') !!}
{!! Html::style('cus/css/select2.min.css') !!}
@stop
@section('content')

<div class="container">
    <div class="row profile">
        <div class='col-md-9'>
            @if($bu->bu_status==1)
        <div class="col-md-12" style="    margin-bottom: 31px;">
  
            <div class="profile-content">
                <ol class="breadcrumb">
                <li><a href="{!! url('/') !!}">الرئيسية</a></li>
                <li><a href="{!! url('/showAllBuildings') !!}">العقارات</a></li>
                <li><a href="{!! url('/singleBuilding',$bu->id) !!}">{!! $bu->bu_name !!}</a></li>
                </ol>
            
                <h1>{!! $bu->bu_name !!}</h1>

                <div class='btn-group' role='group'>
                <a class='btn btn-default' href="{!! url('/search?bu_price='.$bu->bu_price) !!}">السعر : {!! $bu->bu_price !!}</a>
                <a class='btn btn-default' href="{!! url('/search?bu_type='.$bu->bu_type) !!}">نوع العقار : {!! getTypes()[$bu->bu_type] !!}</a>
                <a class='btn btn-default' href="{!! url('/search?bu_rent='.$bu->bu_rent) !!}">نوع العملية : {!! getRent()[$bu->bu_rent] !!}</a>
                <a class='btn btn-default' href="{!! url('/search?bu_rooms='.$bu->bu_rooms) !!}">عدد الغرف : {!! $bu->bu_rooms !!}</a>
                <a class='btn btn-default' href="{!! url('/search?bu_square='.$bu->bu_square) !!}"> المساحة : {!! $bu->bu_square !!}</a>
                

                </div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56e5c96780b62098"></script>
                <!-- Go to www.addthis.com/dashboard to generate a new set of sharing buttons -->
<a href="https://api.addthis.com/oexchange/0.8/forward/facebook/offer?url={!! url('/singleBuilding',$bu->id) !!}&title={!! $bu->bu_name !!}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/facebook.png" border="0" alt="Facebook"/></a>
<a href="https://api.addthis.com/oexchange/0.8/forward/twitter/offer?url={!! url('/singleBuilding',$bu->id) !!}&title={!! $bu->bu_name !!}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/twitter.png" border="0" alt="Twitter"/></a>
<a href="https://api.addthis.com/oexchange/0.8/forward/google_plusone_share/offer?url={!! url('/singleBuilding',$bu->id) !!}&title={!! $bu->bu_name !!}&pco=tbxnj-1.0" target="_blank"><img src="https://cache.addthiscdn.com/icons/v2/thumbs/32x32/google_plusone_share.png" border="0" alt="Google+"/></a>

                <hr>
                <p>
                    {!! nl2br($bu->bu_large_dis) !!}
                </p>
            </div>
        </div>
        <div class="col-md-12">
  
            <div class="profile-content">
                <h3>عقارات مشابهة</h3>
                @include('site._bu',['allBu'=>$sameBu])
            </div>
        </div>
        @else
            <div class="col-md-12">
            <div class="profile-content">
                <h3>تحذير</h3>
                <div class='alert alert-danger'>
                    عذرا هذا العقار فى انتظار الموافقة علية
                </div>
            </div>
            </div>
        @endif
        </div>
         <div class="col-md-3">
                @include('site.sidebar')
            </div>
        
           
	</div>
</div>

<br>
<br>


@endsection


@section('footer')
{!! Html::script('cus/js/select2.min.js') !!}
<script>

$('.select2').select2({dir:'rtl'});

</script>
@stop