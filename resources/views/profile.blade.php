@extends('layouts.app')
@section('title')

تعديل المعلومات الشخصية

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
                <li><a href="{!! url('/user/profile') !!}">المعلومات الشخصية</a></li>
              
                
                </ol>
               {!! Form::model($user,['method'=>'PUT','class'=>'form-horizontal','role'=>'form','url'=>url("/user/profile")]) !!}
                  @include('admin.users._form',['notAdmin'=>1])
                {!! Form::close() !!} 
                
                <hr>
                
                {!! Form::open(['method'=>'PUT','class'=>'form-horizontal','role'=>'form','url'=>url("/user/profile/changePassword")]) !!}
                    <div class="form-group{{ $errors->has('OldPassword') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label pull-right">الرقم السرى القديم</label>
                        <div class="col-md-10  pull-left">
                            {!! Form::password('OldPassword',['class'=>'form-control']) !!}
                            @if ($errors->has('OldPassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('OldPassword') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('NewPassword') ? ' has-error' : '' }}">
                        <label class="col-md-2 control-label pull-right"> الرقم السرى الجديد</label>
                        <div class="col-md-10  pull-left">
                            {!! Form::password('NewPassword',['class'=>'form-control']) !!}
                            @if ($errors->has('NewPassword'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('NewPassword') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i>تغيير
                            </button>
                        </div>
                    </div>
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