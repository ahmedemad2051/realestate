@extends('admin.layouts.app')

@section('header')


@stop

@section('content')

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            أضف عضو
          </h1>
          <ol class="breadcrumb">
            <li><a href="{!! url('/adminPanel') !!}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{!! url('/adminPanel/users') !!}">التحكم فى الأعضاء</a></li>
            <li><a href="{!! url('/adminPanel/users/create') !!}">إضافة عضو جديد</a></li>
            
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
                {!! Form::open(['class'=>'form-horizontal','role'=>'form','url'=>url("/adminPanel/users")]) !!}
                  @include('admin.users._form')
                {!! Form::close() !!} 
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

@stop

@section('footer')
    
@stop