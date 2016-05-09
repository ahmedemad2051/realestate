@extends('admin.layouts.app')


@section('content')

 <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            تعديل العقار
          </h1>
          <ol class="breadcrumb">
            <li><a href="{!! url('/adminPanel') !!}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{!! url('/adminPanel/bu') !!}">التحكم فى العقارات</a></li>
            <li><a href="{!! url('/adminPanel/bu',$bu->id,'edit') !!}">تعديل العقار</a></li>
            
          </ol>
        </section>

        <!-- change user info -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
               
                {!! Form::model($bu,['method'=>'PUT','class'=>'form-horizontal','role'=>'form','url'=>url("/adminPanel/bu",$bu->id),'files'=>'true']) !!}
                  @include('admin.bu._form')
                {!! Form::close() !!}  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
        
@stop

@section('footer')
    
@stop