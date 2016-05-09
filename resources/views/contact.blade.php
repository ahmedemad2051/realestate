@extends('layouts.app')
@section('title')
الرئيسية
@stop
@section('content')

<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    اتصل بنا <small>Feel free to contact us</small></h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
              
            {!! Form::open(['url'=>'/contact']) !!}
                <div class="row">
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الرسالة</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="من فضلك اكتب رسالتك"></textarea>
                        </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                الاسم</label>
                            <input type="text" class="form-control"  id="name" name="name" placeholder="من فضلك ادخل اسمك" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                البريد الالكترونى</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email"  placeholder="من فضلك ادخل البريد" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                الموضوع</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option selected>اختر واحدا</option>
                               @foreach(getSubject() as $key=>$value)
                                <option value="{!! $key !!}">{!! $value !!}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            ارسال</button>
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>


@endsection
