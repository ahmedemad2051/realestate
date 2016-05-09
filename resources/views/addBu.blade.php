@extends('layouts.app')
@section('title')

إضافة عقار

@stop

@section('header')
{!! Html::style('site/css/bu.css') !!}
{!! Html::style('cus/css/select2.min.css') !!}
@stop

@section('content')

<div class="container">
    <div class="row profile">
        <div class='col-md-9'>
        <div class="col-md-12" style="    margin-bottom: 31px;">
  
            <div class="profile-content">
                <ol class="breadcrumb">
                <li><a href="{!! url('/') !!}">الرئيسية</a></li>
                <li><a href="{!! url('/showAllBuildings') !!}">العقارات</a></li>
                <li><a href="{!! url('/user/bu/create') !!}">أضف عقار</a></li>
                
                </ol>
                {!! Form::open(['class'=>'form-horizontal','role'=>'form','url'=>url("/user/bu/create"),'files'=>'true']) !!}
                @include('admin.bu._form',['user'=>'1'])
                {!! Form::close() !!} 
            </div>
             
        </div>
         
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