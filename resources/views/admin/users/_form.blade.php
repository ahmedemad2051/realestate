
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">الاسم</label>

    <div class="col-md-10  pull-left">
        {!! Form::text('name',null,['class'=>'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">عنوان البريد</label>

    <div class="col-md-10  pull-left">
        {!! Form::email('email',null,['class'=>'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
@unless(isset($notAdmin))
<div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">الحالة</label>

    <div class="col-md-10  pull-left">
        {!! Form::select('admin',['0'=>'user','1'=>'admin'],null,['class'=>'form-control']) !!}
        @if ($errors->has('admin'))
            <span class="help-block">
                <strong>{{ $errors->first('admin') }}</strong>
            </span>
        @endif
    </div>
</div>
@endunless
@if(!isset($user))
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">الرقم السرى</label>

    <div class="col-md-10  pull-left">
        {!! Form::password('password',['class'=>'form-control']) !!}
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <label class="col-md-2 control-label pull-right">تأكيد الرقم السرى</label>

    <div class="col-md-10  pull-left">
        {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </span>
        @endif
    </div>
</div>
@endif
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>حفظ
        </button>
    </div>
</div>
