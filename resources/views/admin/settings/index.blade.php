@extends('admin.layouts.app')



@section('content')

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            تعديل اعدادات الموقع
          </h1>
          <ol class="breadcrumb">
            <li><a href="{!! url('/adminPanel') !!}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{!! url('/adminPanel/settings') !!}">تعديل اعدادات الموقع</a></li>
            
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                {!! Form::open(['action'=>'SettingsController@store','files'=>'true']) !!}
                @foreach($settings as $setting)
                <div  class="col-md-12 form-group{{ $errors->has($setting->settingName) ? ' has-error' : '' }}">
                  
                    <div class="col-md-2 pull-right">
                        {!! $setting->slug !!}
                    </div>
                    <div class="col-md-10  pull-left" >
                        @if($setting->type ==0)
                        {!! Form::text($setting->settingName,$setting->value,['class'=>'form-control']) !!}
                        @elseif($setting->type ==3)
                        {!! Form::file('file',null,['class'=>'form-control']) !!}
                        @else
                        {!! Form::textarea($setting->settingName,$setting->value,['class'=>'form-control']) !!}
                        @endif
                        @if ($errors->has($setting->settingName))
                            <span class="help-block">
                                <strong>{{ $errors->first($setting->settingName) }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="clearfix">
                <br><br>
                @endforeach
                <button class='btn btn-app'>
                    <i class="fa fa-save"></i>
                    حفظ اعدادات الموقع
                </button>
                {!! Form::close() !!}
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@stop
