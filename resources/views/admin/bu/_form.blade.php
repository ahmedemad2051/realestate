
<div class="form-group{{ $errors->has('bu_name') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">اسم العقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('bu_name',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_name'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_rooms') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">عدد الغرف</label>

    <div class="col-md-10  pull-left">
        {!! Form::select('bu_rooms',getRooms(),null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_rooms'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_rooms') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_place') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">المنطقة</label>

    <div class="col-md-10  pull-left">
        {!! Form::select('bu_place',getPlace(),null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_place'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_place') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_price') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">سعر العقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('bu_price',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_price'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_price') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_rent') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">نوع العملية</label>

    <div class="col-md-10  pull-left">
        {!! Form::select('bu_rent',['0'=>'تمليك','1'=>'ايجار'],null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_rent'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_rent') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_square') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">مساحة العقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('bu_square',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_square'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_square') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_type') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">نوع العقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::select('bu_type',getTypes(),null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_type'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_type') }}</strong>
            </span>
        @endif
    </div>
</div>
@unless(isset($user))
<div class="form-group{{ $errors->has('bu_status') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">حالة العقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::select('bu_status',['0'=>'غير مفعل','1'=>'مفعل'],null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_status'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_status') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_small_dis') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">وصف العقار لمحركات البحث</label>

    <div class="col-md-10  pull-left">
        {!! Form::textarea('bu_small_dis',null,['class'=>'form-control','rows'=>'3']) !!}
        @if ($errors->has('bu_small_dis'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_small_dis') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class='col-md-12'>
    <div class='col-md-10  pull-left alert alert-warning'>
        لا يمكن ادخال اكثر من 160 حرف على حسب معايير جوجل
    </div>
</div>
@endunless
<div class="form-group{{ $errors->has('bu_meta') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">الكلمات الدلائلية</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('bu_meta',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_meta'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_meta') }}</strong>
            </span>
        @endif
    </div>
</div>



<div class="form-group{{ $errors->has('bu_longitude') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">خط الطول</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('bu_longitude',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_longitude'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_longitude') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_latitude') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">دائرة العرض</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('bu_latitude',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_latitude'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_latitude') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_large_dis') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">وصف مطول للعقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::textarea('bu_large_dis',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_large_dis'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_large_dis') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('bu_image') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">صورة العقار</label>

    <div class="col-md-10  pull-left">
        {!! Form::file('file',null,['class'=>'form-control']) !!}
        @if ($errors->has('bu_image'))
            <span class="help-block">
                <strong>{{ $errors->first('bu_image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>ادخال
        </button>
    </div>
</div>
