@extends('admin.layouts.app')

@section('header')
<style>
    .nav-tabs>li{
        float: right;
    }
</style>

@stop

@section('content')

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            تعديل العضو
          </h1>
          <ol class="breadcrumb">
            <li><a href="{!! url('/adminPanel') !!}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{!! url('/adminPanel/users') !!}">التحكم فى الأعضاء</a></li>
            <li><a href="{!! url('/adminPanel/users',$user->id,'edit') !!}">تعديل عضو</a></li>
            
          </ol>
        </section>

        <div class="col-md-9">
        <section class="content">
            <div class="row">
         
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">عقارات مفعلة</a></li>
                  <li><a href="#timeline" data-toggle="tab">عقارات غير مفعلة</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                      <table class="table table-bordered table-responsive">
                          <tr>
                              <th>الاسم</th>
                              <th>التاريخ</th>
                              <th>إلغاء تفعيل العقار</th>
                          </tr>
                          @foreach($buEnabled as $bu)
                          <tr>
                              <td>{!! $bu->bu_name !!}</td>
                              <td>{!! $bu->created_at !!}</td>
                              <td><a href="{!! url('/adminPanel/user/bu/disabled/'.$bu->id) !!}" class="btn btn-danger"><i class="fa fa-anchor"></i></a></td>
                          </tr>
                          @endforeach
                      </table>
                      {!! $buEnabled->render() !!}
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                   <table class="table table-bordered table-responsive">
                          <tr>
                              <th>الاسم</th>
                              <th>التاريخ</th>
                              <th>تفعيل العقار</th>
                          </tr>
                          @foreach($buDisabled as $bu)
                          <tr>
                              <td>{!! $bu->bu_name !!}</td>
                              <td>{!! $bu->created_at !!}</td>
                              <td><a href="{!! url('/adminPanel/user/bu/enabled/'.$bu->id) !!}" class="btn btn-danger"><i class="fa fa-anchor"></i></a></td>
                          </tr>
                          @endforeach
                      </table>
                      {!! $buDisabled->render() !!}
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
          
     </div>
        </section>
        </div>
 
        <div class="col-lg-3">
        <!-- change user info -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
               
                {!! Form::model($user,['method'=>'PUT','class'=>'form-horizontal','role'=>'form','url'=>url("/adminPanel/users",$user->id)]) !!}
                  @include('admin.users._form')
                {!! Form::close() !!}  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        <!-- change password -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">تغيير الرقم السرى</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                {!! Form::open(['method'=>'PUT','class'=>'form-horizontal','role'=>'form','url'=>url("/adminPanel/users/changePassword",$user->id)]) !!}
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
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        </div>
@stop

@section('footer')
    
@stop