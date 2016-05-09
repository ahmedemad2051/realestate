@extends('layouts.app')
@section('title')
العقارات
@stop



@section('content')

<div class="container">
    <div class="row profile">
		
        <div class="col-md-9">
  
            <div class="profile-content">
                <ol class="breadcrumb">
                <li><a href="{!! url('/') !!}">الرئيسية</a></li>
                @if(isset($map) && !empty($map))
                
                    @foreach($map as $key=>$value)
                    <li><a href="{!! url('/search?'.$key.'='.$value) !!}">{!! transSearch()[$key] !!}->
                            @if($key=='bu_type')
                            {!! getTypes()[$value] !!}
                            @elseif($key=='bu_place')
                            {!! getPlace()[$value] !!}
                            @elseif($key=='bu_rent')
                            {!! getRent()[$value] !!}
                            @else
                            {!! $value !!}
                            @endif
                            
                    </a></li>
                    @endforeach
                @endif
                </ol>
                @if(count($allBu) > 0)
                   @include('site._bu')
                   <div class="pagination col-md-12">
                      {!! $allBu->render() !!}
                   </div>
                @else
                    <div class="alert alert-danger">
                        عذرا لا يوجد عقارات 
                    </div>
                @endif
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


