<div class="profile-sidebar">
@if(Auth::user())
    <div class="profile-usermenu">
        <ul class="nav" style='    padding-right: 0px;'>
              
                <li class="{!! setActive(['user','profile']) !!}">
                        <a href="{!! url('/user/profile') !!}">
                        <i class="fa fa-edit"></i>
                        تعديل المعلومات الشخصية</a>
                </li>
                <li class="{!! setActive(['user','bu','status','1']) !!}">
                        <a href="{!! url('/user/bu/status/1') !!}" >
                        <i class="fa fa-check"></i>
                        عقارات مفعلة </a>
                </li>
                <li class="{!! setActive(['user','bu','status','0']) !!}">
                        <a href="{!! url('/user/bu/status/0') !!}">
                        <i class="fa fa-clock-o"></i>
                        عقارات غير مفعلة </a>
                </li>
                <li class="{!! setActive(['user','bu','create']) !!}">
                        <a href="{!! url('/user/bu/create') !!}">
                        <i class="fa fa-plus"></i>
                        أضف عقار </a>
                </li>
              
        </ul>
    </div>
@endif
    <div class="profile-usertitle">
            <div class="profile-usertitle-name ">
                <h2>بحث متقدم</h2>
            </div>
            {!! Form::open(['url'=>'search','method'=>'get']) !!}
            {!! Form::text('bu_price_from',null,['class'=>'form-control','placeholder'=>'سعر العقار من']) !!}
            {!! Form::text('bu_price_to',null,['class'=>'form-control','placeholder'=>'سعر العقار الى']) !!}
            {!! Form::select('bu_place',getPlace(),null,['class'=>'form-control select2','placeholder'=>'منطقة العقار']) !!}
            {!! Form::select('bu_type',getTypes(),null,['class'=>'form-control','placeholder'=>'نوع العقار']) !!}
            {!! Form::select('bu_rooms',getRooms(),null,['class'=>'form-control select2','placeholder'=>'عدد الغرف']) !!}
            {!! Form::select('bu_rent',['0'=>'تمليك','1'=>'ايجار'],null,['class'=>'form-control','placeholder'=>'نوع العملية']) !!}
            {!! Form::text('bu_square',null,['class'=>'form-control','placeholder'=>'المساحة']) !!}
            {!! Form::submit('بحث',['class'=>'banner_btn']) !!}
            {!! Form::close() !!}
    </div>

<!-- END SIDEBAR BUTTONS -->
<!-- SIDEBAR MENU -->
<div class="profile-usermenu">
        <ul class="nav" style='    padding-right: 0px;'>
                <li class="{!! setActive(['showAllBuildings']) !!}">
                        <a href="{!! url('/showAllBuildings') !!}">
                        <i class="fa fa-building"></i>
                        كل العقارات </a>
                </li>
                <li class="{!! setActive(['forRent']) !!}">
                        <a href="{!! url('/forRent') !!}">
                        <i class="fa fa-calendar"></i>
                        ايجار</a>
                </li>
                <li class="{!! setActive(['forBuy']) !!}">
                        <a href="{!! url('/forBuy') !!}" >
                        <i class="fa fa-building-o"></i>
                        تمليك </a>
                </li>
                <li class="{!! setActive(['type','0']) !!}">
                        <a href="{!! url('/type/0') !!}">
                        <i class="fa fa-home"></i>
                        شقة </a>
                </li>
                <li class="{!! setActive(['type','1']) !!}">
                        <a href="{!! url('/type/1') !!}">
                        <i class="fa fa-bars"></i>
                        عمارة </a>
                </li class="{!! setActive(['showAllBuildings']) !!}">
                <li class="{!! setActive(['type','2']) !!}">
                        <a href="{!! url('/type/2') !!}">
                        <i class="fa fa-institution"></i>
                        فيلا </a>
                </li>
        </ul>
    </div>
<!-- END MENU -->
</div>